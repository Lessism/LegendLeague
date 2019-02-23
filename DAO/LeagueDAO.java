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
	
	
// 	시즌 라운드
	
		public Map<String, Object> season() {
			
			Map<String, Object> season = db.selectOne("League.season");
			List<Map<String, Object>> list = db.selectList("League.info_roster");
			
			for (Map<String, Object> map : list) {
				map.put("keyplayer", db.selectOne("League.keyplayer", map.get("name")));
			}

			season.replace("roster", list);
			
			return season;
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
