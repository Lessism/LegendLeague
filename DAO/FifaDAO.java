package com.lessism.legendleague.dao;

import java.io.UnsupportedEncodingException;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.apache.ibatis.session.SqlSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class FifaDAO {
	
	@Autowired
	private SqlSession db;
	
	
//	Image Convert

		public byte[] imageConvert(Map<String, Object> map){
			return db.selectOne("FIFA.image_convert", map);
		}
		
	
//	Join
	
		public int join(Map<String, Object> map) {
			return db.insert("FIFA.join", map);
		}
	
	
//	Award
	
		public Map<String, Object> award(Map<String, Object> map) {

			Map<String, Object> award = new HashMap<>(map);
			
			if (award.get("role").equals("Club")) {

				Map<String, Object> champion = db.selectOne("FIFA.award_club", award);;
				
				champion.put("score", db.selectOne("FIFA.award_score", champion));
				champion.put("odds", db.selectOne("FIFA.award_odds", champion));
				champion.put("list", db.selectList("FIFA.award_list", champion));
				champion.replace("manager", db.selectOne("FIFA.info_manager", champion.get("manager")));
				champion.replace("roster", db.selectList("FIFA.award_lineup", champion));
				
				award.put("champion", champion);
				award.put("list", db.selectList("League.award", award));
				
			} else if (award.get("role").equals("Manager")) {
				
				Map<String, Object> manager = db.selectOne("FIFA.award_manager", award);
				
				manager.put("score", db.selectOne("FIFA.award_score", manager));
				manager.put("odds", db.selectOne("FIFA.award_odds", manager));
				
				award.put("manager", manager);
				award.put("list", db.selectList("FIFA.award_list", award));
				
				
			} else if (award.get("role").equals("Player")) {
				
				Map<String, Object> season = db.selectOne("FIFA.award_player", award);
				
				if (season.get("ballondor") != null) {
					Map<String, Object> ballondor = db.selectOne("FIFA.award_ballondor", award);
					ballondor.put("score", db.selectOne("FIFA.award_score_player", ballondor));
					ballondor.put("odds", db.selectOne("FIFA.award_odds", ballondor));
					ballondor.put("list", db.selectList("FIFA.award_list", ballondor));
					award.put("ballondor", ballondor);
				}
				
				if (season.get("goalscorer") != null) {
					Map<String, Object> goalscorer = db.selectOne("FIFA.award_goalScorer", award);
					goalscorer.put("score", db.selectOne("FIFA.award_score_player", goalscorer));
					goalscorer.put("odds", db.selectOne("FIFA.award_odds", goalscorer));
					goalscorer.put("list", db.selectList("FIFA.award_list", goalscorer));
					award.put("goalscorer", goalscorer);
				}
				
				if (season.get("assistprovider") != null) {
					Map<String, Object> assistprovider = db.selectOne("FIFA.award_assistProvider", award);
					assistprovider.put("score", db.selectOne("FIFA.award_score_player", assistprovider));
					assistprovider.put("odds", db.selectOne("FIFA.award_odds", assistprovider));
					assistprovider.put("list", db.selectList("FIFA.award_list", assistprovider));
					award.put("assistprovider", assistprovider);
				}
			}

			map.put("season", db.selectOne("League.recency_season"));
			map.put("award", award);
			
			return map;
		}
	
	
//	FIFA List
	
		public List<Map<String, Object>> listFIFA(Map<String, Object> map) {
			return db.selectList("FIFA.list", map);
		}
	
	
//	구단 정보
	
	public Map<String, Object> infoClub(Map<String, Object> map) {
		
		return db.selectOne("FIFA.infoclub", map);
	}
	
	
//	감독 정보
	
	public Map<String, Object> infoManager(Map<String, Object> map) {
		
		return db.selectOne("FIFA.infomanager", map);
	}
	
	
//	선수 정보
	
	public Map<String, Object> infoPlayer(Map<String, Object> map) throws UnsupportedEncodingException {
		return  db.selectOne("FIFA.infoplayer", map);
	}
	
	
//	리그 로스터
	
	public Map<String, Object> infoLeague() {
		
		return db.selectOne("FIFA.infoleague");
	}
	
	
//	로스터 등록
	
	public int updateRoster(String rosterlist) {

		db.update("FIFA.updaterosterclubclear");
		
		if (rosterlist != null) {
			for (int i = 0; i < rosterlist.split(",").length; i++) {
				db.update("FIFA.updaterosterclub", rosterlist.split(",")[i]);
			}
		}
		
		return db.update("FIFA.updateroster", rosterlist);
	}
}
