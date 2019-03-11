package com.lessism.legendleague.dao;

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
			
			Map<String, Object> league = db.selectOne("League.season_round");
			
			List<Map<String, Object>> information = db.selectList("League.information", league);
			for (Map<String, Object> map : information) {
				map.put("keyplayer", db.selectOne("League.keyplayer", map.get("name")));
			}

			league.put("information", information);
			league.put("ranking", db.selectList("League.ranking", league));
			league.put("match", match(league));
			
			return league;
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
		
		public int updateSeason(Map<String, Object> map) {
			return db.update("League.update_season", map);
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
		
		
//	Result Game
		
		public Map<String, Object> resultGame(Map<String, Object> map) {
			map.put("result", db.selectList("League.result_game", map));
			return map;
		}
		
		
		
}
