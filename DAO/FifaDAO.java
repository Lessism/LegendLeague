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
		
		
//	FIFA Main System
	
		public Map<String, Object> fifa() {
			
			Map<String, Object> fifa = new HashMap<>();
			fifa.put("fifaBestClub", db.selectOne("FIFA.fifa_best_club"));
			fifa.put("fifaBestManager", db.selectOne("FIFA.fifa_best_manager"));
			fifa.put("fifaBestEleven", db.selectList("FIFA.fifa_best_eleven"));
			
			fifa.put("season", db.selectOne("League.recency_season"));
			fifa.put("countrylist", db.selectList("FIFA.country_list"));
			
			return fifa;
		}
		
		
//	Personal Profile
	
		public Map<String, Object> profile(Map<String, Object> map) {
			
			Map<String, Object> profile = new HashMap<>(map);
			profile.put("award", db.selectOne("FIFA.personal_award_count", profile));
			profile.put("record", db.selectList("FIFA.personal_record", profile));
			
			map.put("personal", db.selectOne("FIFA.personal", map));
			map.put("profile", profile);
			
			return map;
		}
		
		
//	Personal Detail
	
		public Map<String, Object> detail(Map<String, Object> map) {
			
			Map<String, Object> detail = new HashMap<>(map);
			detail.put("stat", db.selectOne("FIFA.personal_stat", detail));
			detail.put("award", db.selectOne("FIFA.personal_award_count", detail));
			detail.put("record", db.selectList("FIFA.personal_record", detail));

			map.put("personal", db.selectOne("FIFA.personal", map));
			map.put("detail", detail);
			
			return map;
		}
		
		
//	Personal Title
	
		public Map<String, Object> title(Map<String, Object> map) {
			
			Map<String, Object> title = new HashMap<>(map);
			title.put("award", db.selectOne("FIFA.personal_award_count", title));
			title.put("title", db.selectList("FIFA.personal_title", title));

			map.put("personal", db.selectOne("FIFA.personal", map));
			map.put("title", title);
			
			return map;
		}
		
		
//	Personal Award
	
		public Map<String, Object> award(Map<String, Object> map) {
			
			Map<String, Object> award = new HashMap<>(map);
			award.put("awardcount", db.selectOne("FIFA.personal_award_count", award));
			award.put("award", db.selectList("FIFA.personal_award", award));

			map.put("personal", db.selectOne("FIFA.personal", map));
			map.put("award", award);
			
			return map;
		}
		
		
//	Personal Record
	
		public Map<String, Object> record(Map<String, Object> map) {

			Map<String, Object> record = new HashMap<>(map);
			record.put("stat", db.selectOne("FIFA.personal_stat", record));
			record.put("statseason", db.selectList("FIFA.personal_stat_season", record));
			record.put("record", db.selectList("FIFA.personal_record", record));

			map.put("personal", db.selectOne("FIFA.personal", map));
			map.put("record", record);
			
			return map;
		}
		
		
//	Personal Stadium
	
		public Map<String, Object> stadium(Map<String, Object> map) {

			map.put("personal", db.selectOne("FIFA.personal", map));
			map.put("stadium", db.selectOne("FIFA.personal_stadium", map));
			
			return map;
		}
		
		
//	Personal Squad
	
		public Map<String, Object> squad(Map<String, Object> map) {

			Map<String, Object> squad = db.selectOne("FIFA.personal", map);
			squad.put("manager", db.selectOne("FIFA.info_manager", squad.get("manager")));
			squad.put("squad", db.selectList("FIFA.club_lineup", squad));
			
			map.put("personal", db.selectOne("FIFA.personal", map));
			map.put("squad", squad);
			
			return map;
		}
	
		
//	Information
	
		public Map<String, Object> information(Map<String, Object> map) {
			
			Map<String, Object> information = new HashMap<>(map);
			information.put("rank", db.selectList("FIFA.information_rank", map));
			information.put("ranktitle", db.selectList("FIFA.information_rank_title", map));
			information.put("rankold", db.selectList("FIFA.information_rank_old", map));
			information.put("ranknew", db.selectList("FIFA.information_rank_new", map));
			
			map.put("season", db.selectOne("League.recency_season"));
			map.put("countrylist", db.selectList("FIFA.country_list"));
			map.put("information", information);
			
			return map;
		}
	
	
//	Awards
	
		public Map<String, Object> awards(Map<String, Object> map) {

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
			map.put("countrylist", db.selectList("FIFA.country_list"));
			map.put("award", award);
			
			return map;
		}
		
		
//	Country
	
		public Map<String, Object> country(Map<String, Object> map) {

			Map<String, Object> country = new HashMap<>(map);
			country.put("count", db.selectOne("FIFA.country_count", map));
			country.put("rankclub", db.selectList("FIFA.country_rank_club", map));
			country.put("rankmanager", db.selectList("FIFA.country_rank_manager", map));
			country.put("rankplayer", db.selectList("FIFA.country_rank_player", map));

			map.put("season", db.selectOne("League.recency_season"));
			map.put("countrylist", db.selectList("FIFA.country_list"));
			map.put("countryinfo", country);
			
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
