package com.lessism.legendleague.restcontroller;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Random;

import org.apache.ibatis.session.SqlSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import com.lessism.legendleague.dao.LeagueDAO;

@RestController
public class LeagueRestController {
	
	@Autowired
	private LeagueDAO lDAO;
	@Autowired
	private SqlSession db;
	
	
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
			
			lDAO.startSeason(map);
			
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
					
					if (dice.nextInt(25) < (int) homePlayer.get("ovr") * 2 - (int) awayPlayer.get("ovr") - (int) awayManager.get("ovr")) {
						
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
					if (dice.nextInt(50) < (int) awayPlayer.get("ovr") * 2 - (int) homePlayer.get("ovr") - (int) homeManager.get("ovr")) {
						
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
				
				home.put("goalfor", homescore);
				home.put("goalagainst", awayscore);
				away.put("goalfor", awayscore);
				away.put("goalagainst", homescore);
				
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

				if (lDAO.checkRound(home) < 1) {
					lDAO.nextRanking(home);
					lDAO.nextRanking(away);
				}
				
			}
			
			if (lDAO.checkRound(map) < 1) {
				lDAO.nextRound(map);
			}
			
			return lDAO.resultGame(map);
			
		}
		
		
//	Ending

		@RequestMapping(value="ending", produces="application/json")
		public int ending(@RequestParam Map<String, Object> map) {
			
			Map<String, Object> champion = lDAO.champion();
			String lineup = champion.get("player0").toString();
			for (int i = 1; i < 11; i++) {
				lineup += "," + champion.get("player"+i).toString();
			}
			champion.put("lineup", lineup.split(","));
			champion.put("history", map.get("history").toString());
			
			return lDAO.ending(champion);
		}
			
			
//	Chart Rank
		
		@RequestMapping(value="rank", produces="application/json")
		public Map<String,Object> rank(@RequestParam Map<String, Object> map) {
			
			if (map.isEmpty()) {
				
				String nowRound = db.selectOne("League.recency_result_round");
				List<String> labels = db.selectList("League.labels");
				List<Map<String,Object>> datas = new ArrayList<>();
				
				if (nowRound != null) {
					for (int i = 1; i <= Integer.parseInt(nowRound); i++) {
						Map<String,Object> data = new HashMap<>();
						data.put("round", i);
						for (int ii = 0; ii < labels.size(); ii++) {
							data.put("name", labels.get(ii));
							data.put(labels.get(ii), (int)db.selectOne("League.point", data));
						}
						datas.add(data);
					}
				} else {
					return map;
				}
				
				map.put("data", datas);
				map.put("labels", labels);
				
			} else {
				
				Map<String, Object> season = db.selectOne("League.before_season", map);
				
				if (season != null) {
					
					String label = season.get("roster").toString();
					List<String> labels = new ArrayList<>();
					List<Map<String,Object>> datas = new ArrayList<>();
					
					for (int i = 0; i <label.split(",").length; i++) {
						labels.add(i, label.split(",")[i]);
					}
					
					for (int i = 1; i <= (int)season.get("round"); i++) {
						Map<String,Object> data = new HashMap<>();
						data.put("season", season.get("season"));
						data.put("round", i);
						for (int ii = 0; ii < labels.size(); ii++) {
							data.put("name", labels.get(ii));
							data.put(labels.get(ii), (int)db.selectOne("League.point", data));
						}
						data.remove("season");
						datas.add(data);
					}
				
					map.put("data", datas);
					map.put("labels", labels);
					
				} else {
					return map;
				}
			}
			
			return map;
		}
		
		
}
