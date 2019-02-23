package com.lessism.legendleague.dao;

import java.util.Map;

import org.apache.ibatis.session.SqlSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class EditDAO {
	
	@Autowired
	private SqlSession db;
	
	
//	클럽 로스터 리스트
	
	public Map<String, Object> rosterlistclub(Map<String, Object> map) {
		
		map = db.selectOne("FIFA.infoclub", map);
		map.put("listmanager", db.selectList("FIFA.listmanager"));
		map.put("listplayer", db.selectList("FIFA.listplayer"));
		
		return map;
	}
	
//	클럽 편집
	
		public int editclub(Map<String, Object> map) {
			return db.update("Edit.updaterosterclub", map);
		}
}
