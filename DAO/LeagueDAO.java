package com.lessism.legendleague.dao;

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
			
			return league;
		}
		
		
//	Match schedule
		
		public int matchSchedule(Map<String, Object> map) {
			return db.insert("League.match_schedule", map);
		}
		
		
//	Update Season
		
		public int updateSeason(Map<String, Object> map) {
			return db.update("League.update_season", map);
		}
		
		
//	시즌 정보
	
		public Map<String, Object> infoSeason(Map<String, Object> map) {
			return db.selectOne("League.info_season", map);
		}
		
		
//	라운드 생성
		
		public int insertRound(Map<String, Object> map) {
			return db.insert("League.insert_round", map);
		}
		
		
//	라운드 정보
		
		public Map<String, Object> infoRound(Map<String, Object> map) {
			return db.selectOne("League.info_round", map);
		}
		
		
//	라운드 업데이트
		
		public int updateRound(Map<String, Object> map) {
			return db.update("League.update_round", map);
		}
}
