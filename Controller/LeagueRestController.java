package com.lessism.legendleague.restcontroller;

import java.util.List;
import java.util.Map;

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
			
			for (Map<String, Object> match : lDAO.match(map)) {
				match = lDAO.lineup(match);
				Map<String, Object> home = (Map<String, Object>)match.get("home");
				Map<String, Object> away = (Map<String, Object>)match.get("away");
				Map<String, Object> homeManager = (Map<String, Object>)home.get("manager");
				Map<String, Object> awayManager = (Map<String, Object>)away.get("manager");
				for (int i = 0; i < 11; i++) {
					List<Map<String, Object>> homeLineup = (List<Map<String, Object>>) home.get("lineup");
					List<Map<String, Object>> awayLineup = (List<Map<String, Object>>) away.get("lineup");
					System.out.println(homeLineup.toArray()[i]);
				}
				
				
				
			}
			return map;
		}
}
