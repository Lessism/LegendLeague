package com.lessism.legendleague.restcontroller;

import java.util.List;
import java.util.Map;
import java.util.Random;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import com.lessism.legendleague.dao.LeagueDAO;

@RestController
public class LeagueRestController {
	
	@Autowired
	private LeagueDAO lDAO;
	
	
//	Opening
	
		@RequestMapping(value="opening", produces="application/json")
		public Map<String, Object> opening(
				@RequestParam Map<String, Object> map,
				@RequestParam("roster") String[] roster
				) {
			
			map.put("club", roster);
			
			for (int round = 1; round <= (roster.length-1)*2; round++) {
				
				String versus = null;
				int home = 0;
				int away = round-1;
				
				for (int i = 0; i < roster.length/2; i++) {
					
					if (away == 0) {
						away = roster.length-1;
					}
					if (away >= roster.length) {
						away = round - roster.length;
					}
					
					if (round <= roster.length-1) {
						
						if (versus == null) {
							versus = roster[home]+"_"+roster[away];
						} else {
							versus += ","+roster[home]+"_"+roster[away]; 
						}
						if (home < round) {
							home = round-1;
						}
					}
					if (round > roster.length-1) {
						
						if (versus == null) {
							versus = roster[away]+"_"+roster[home];
						} else {
							versus += ","+roster[away]+"_"+roster[home];
						}
						if (home < round-(roster.length-1)) {
							home = round-roster.length;
						}
						
					}
					
					if (home >= roster.length-1) {
						home = 0;
					}

					home++;
					away--;
					
				}

				map.put("round", round);
				map.put("versus", versus.split(","));
				lDAO.matchSchedule(map);
				
			}
			
			lDAO.updateSeason(map);
			
			return map;
		}
		
		
//	Matching

		@SuppressWarnings("unchecked")
		@RequestMapping(value="matching", produces="application/json")
		public Map<String, Object> matching(@RequestParam Map<String, Object> map) {
			
			Random dice = new Random();
			
			for (Map<String, Object> match : lDAO.match(map)) {
				
				match = lDAO.lineup(match);
				Map<String, Object> home = (Map<String, Object>) match.get("home");
				Map<String, Object> away = (Map<String, Object>) match.get("away");
				Map<String, Object> homeManager = (Map<String, Object>) home.get("manager");
				Map<String, Object> awayManager = (Map<String, Object>) away.get("manager");
				List<Map<String, Object>> homeLineup = (List<Map<String, Object>>) home.get("lineup");
				List<Map<String, Object>> awayLineup = (List<Map<String, Object>>) away.get("lineup");
				
				int homescore = 0;
				int awayscore = 0;
				String roundLineupHome = "home:";
				String roundLineupAway = "away:";
				
				for (int i = 0; i < 11; i++) {
					
					Map<String, Object> homePlayer = (Map<String, Object>) homeLineup.toArray()[i];
					Map<String, Object> awayPlayer = (Map<String, Object>) awayLineup.toArray()[i];

					int homerating = 50 + dice.nextInt(9);
					int awayrating = 50 + dice.nextInt(9);
					int homegoal = 0;
					int awaygoal = 0;
					int homeassist = 0;
					int awayassist = 0;
					roundLineupHome += homePlayer.get("name") + ",";
					roundLineupAway += awayPlayer.get("name") + ",";
					
					if (dice.nextInt(100) < (int) homePlayer.get("ovr") * 2 - (int) awayPlayer.get("ovr") - (int) awayManager.get("ovr")) {
						
						if (!homePlayer.get("position").equals("GK")) {
							
							homescore += 1;
							homegoal += 1;
							homerating += 20;
							
							int chk = dice.nextInt(11);
							if (homescore > homegoal && chk > 5) {
								
								homeassist += 1;
								homerating += 10;
								
							}
						}
					} else {
						awayrating += 20 + dice.nextInt(9);
					}
					if (dice.nextInt(75) < (int) awayPlayer.get("ovr") * 2 - (int) homePlayer.get("ovr") - (int) homeManager.get("ovr")) {
						
						if (!awayPlayer.get("position").equals("GK")) {
							
							awayscore += 1;
							awaygoal += 1;
							awayrating += 20;
							
							int chk = dice.nextInt(11); 
							if (awayscore > awaygoal && chk > 5) {
								
								awayassist += 1;
								awayrating += 10;
								
							}
						}
					} else {
						homerating += 20 + dice.nextInt(9);
					}
					
					homePlayer.put("rating", homerating);
					homePlayer.put("goal", homegoal);
					homePlayer.put("assist", homeassist);
					homePlayer.put("opponent", away.get("name"));
					homePlayer.put("season", map.get("season"));
					homePlayer.put("round", map.get("round"));
					lDAO.insertScore(homePlayer);
					
					awayPlayer.put("rating", awayrating);
					awayPlayer.put("goal", awaygoal);
					awayPlayer.put("assist", awayassist);
					awayPlayer.put("opponent", home.get("name"));
					awayPlayer.put("season", map.get("season"));
					awayPlayer.put("round", map.get("round"));
					lDAO.insertScore(awayPlayer);
					
				}
				
				match.put("lineup", roundLineupHome + "_" + roundLineupAway);
				match.put("score", homescore + " : " + awayscore);
				lDAO.updateRound(match);
				
				if (homescore > awayscore) {
					home.put("win", 1);
					away.put("lose", 1);
				}
				if (homescore < awayscore) {
					home.put("lose", 1);
					away.put("win", 1);
				}
				if (homescore == awayscore) {
					home.put("draw", 1);
					away.put("draw", 1);
				}
				
				lDAO.updateRanking(home);
				lDAO.updateRanking(away);
				
			}
			
			if (lDAO.checkRound(map) != 1) {
				lDAO.nextRound(map);
			}
			
			return lDAO.resultGame(map);
			
		}
}
