package com.lessism.legendleague.dao;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.apache.ibatis.session.SqlSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class LeagueDAO {
	
	@Autowired
	private SqlSession db;
	
	
//	League Main system
	
		public Map<String, Object> league() {
			
			Map<String, Object> league = db.selectOne("League.season");
			league.put("title", db.selectList("League.title"));
			league.put("match", match(league));
			league.put("ranking", db.selectList("League.club_ranking"));
			if (league.containsKey("round") && checkRound(league) > 0) {
				league.put("end", 1);
				Map<String, Object> champion = champion();
				champion.replace("manager", db.selectOne("FIFA.info_manager", champion.get("manager")));
				champion.put("role", "Player");
				champion.put("lineup", db.selectList("League.lineup", champion));
				league.put("champion", champion);
			}
			if (league.get("round") != null && (int)league.get("round") > 1) {
				league.put("score", "goal");
				league.put("goalscorer", db.selectList("League.player_ranking", league));
				league.replace("score", "assist");
				league.put("assistprovider", db.selectList("League.player_ranking", league));
				league.replace("score", "rating");
				league.put("toprating", db.selectList("League.player_ranking", league));
			} else {
				List<Map<String, Object>> information = db.selectList("League.information");
				for (Map<String, Object> map : information) {
					map.put("keyplayer", db.selectOne("League.keyplayer", map.get("name")));
				}
				league.put("information", information);
			}
			
			return league;
		}
		
		
//	Season Preview
		
		public Map<String, Object> seasonPreview(Map<String, Object> map) {
			
			map.put("club", db.selectList("League.information"));
			map.put("manager", db.selectOne("League.notable_manager"));
			map.put("player", db.selectList("League.notable_player"));
			
			return map;
		}
		
		
//	Season Ranking
	
		public Map<String, Object> seasonRanking(Map<String, Object> map) {
			
			map.put("club", db.selectList("League.club_ranking"));
			map.put("score", "goal");
			map.put("goalscorer", db.selectList("League.player_ranking", map));
			map.replace("score", "assist");
			map.put("assistprovider", db.selectList("League.player_ranking", map));
			map.replace("score", "rating");
			map.put("toprating", db.selectList("League.player_ranking", map));
			
			return map;
		}
		
		
//	Season Match
	
		public Map<String, Object> seasonMatch(Map<String, Object> map) {
			
			int maxRound = db.selectOne("League.recency_max_round");
			int nowRound = db.selectOne("League.recency_now_round");
			List<List<Map<String, Object>>> round = new ArrayList<>();
			for (int i = 1; i <= maxRound; i++) {
				map.put("round", i);
				List<Map<String, Object>> match = (db.selectList("League.recency_season_round", map));
				for (int ii = 0; ii < match.size(); ii++) {
					match.get(ii).put("goal", db.selectList("League.recency_season_round_score", map));
				}
				round.add(match);
			}
			map.put("round", round);
			map.put("maxRound", maxRound);
			map.put("nowRound", nowRound+1);
			
			return map;
		}
		
		
//	Match schedule
		
		public int matchSchedule(Map<String, Object> map) {
			return db.insert("League.match_schedule", map);
		}
		
		
//	Match
		
		public List<Map<String, Object>> match(Map<String, Object> map) {
			return db.selectList("League.match", map);
		}
		
		
//	Lineup
		
		public Map<String, Object> lineup(Map<String, Object> map) {
			
			Map<String, Object> home = new HashMap<>(map);
			home.put("name", map.get("versus").toString().split("_")[0]);
			home.put("role", "Manager");
			home.put("manager", db.selectOne("League.lineup", home));
			home.replace("role", "Player");
			home.put("lineup", db.selectList("League.lineup", home));
			map.put("home", home);
			
			Map<String, Object> away = new HashMap<>(map);
			away.put("name", map.get("versus").toString().split("_")[1]);
			away.put("role", "Manager");
			away.put("manager", db.selectOne("League.lineup", away));
			away.replace("role", "Player");
			away.put("lineup", db.selectList("League.lineup", away));
			map.put("away", away);
			
			return map;
		}
		
		
//	Update Season
		
		public int startSeason(Map<String, Object> map) {
			return db.update("League.start_season", map);
		}
		
//	Insert Score
		
		public int insertScore(Map<String, Object> map) {
			return db.insert("League.insert_score", map);
		}
		
//	Update Round
	
		public int updateRound(Map<String, Object> map) {
			return db.update("League.update_round", map);
		}
		
//	Update Ranking
		
		public int updateRanking(Map<String, Object> map) {
			return db.update("League.update_ranking", map);
		}
		
		
//	Check Round
		
		public int checkRound(Map<String, Object> map) {
			return db.selectOne("League.check_round", map);
		}
		
		
//	Next Round
		
		public int nextRound(Map<String, Object> map) {
			return db.update("League.next_round", map);
		}
		
		
//	Next Ranking
		
		public int nextRanking(Map<String, Object> map) {
			return db.update("League.next_ranking", map);
		}
		
		
//	Result Game
		
		public Map<String, Object> resultGame(Map<String, Object> map) {
			map.put("result", db.selectList("League.result_game", map));
			map.put("score", db.selectList("League.result_score", map));
			return map;
		}
		
		
//	Champion
		
		public Map<String, Object> champion() {
			return db.selectOne("League.champion");
		}
		
		
//	Ending
		
		public int ending(Map<String, Object> map) {
			return db.update("League.ending", map);
		}
}
