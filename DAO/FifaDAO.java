package com.lessism.legendleague.dao;

import java.util.Map;

import org.apache.ibatis.session.SqlSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class FifaDAO {
	
	@Autowired
	private SqlSession db;
	
	
//	구단 생성
	
	public int insertClub(Map<String, Object> map) {
		return db.insert("FIFA.insertclub", map);
	}
	
	
//	감독 생성
	
	public int insertManager(Map<String, Object> map) {
		return db.insert("FIFA.insertmanager", map);
	}
	
	
//	선수 생성
	
	public int insertPlayer(Map<String, Object> map) {
		return db.insert("FIFA.insertplayer", map);
	}
	
	

}
