package com.lessism.legendleague.dao;

import java.io.UnsupportedEncodingException;
import java.util.List;
import java.util.Map;

import org.apache.ibatis.session.SqlSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.util.Base64Utils;

@Service
public class FifaDAO {
	
	@Autowired
	private SqlSession db;
	
	
//	Image Convert

		public byte[] imageConvert(int no){
			return db.selectOne("FIFA.image_convert", no);
		}
		
	
//	Join
	
		public int join(Map<String, Object> map) {
			return db.insert("FIFA.join", map);
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
		map = db.selectOne("FIFA.infoplayer", map);
		map.replace("profile", new String(Base64Utils.encode((byte[])map.get("profile")), "UTF-8"));
		return map;
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
