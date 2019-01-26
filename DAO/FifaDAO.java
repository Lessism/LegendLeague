package com.lessism.legendleague.dao;

import java.util.List;
import java.util.Map;

import org.apache.ibatis.session.SqlSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class FifaDAO {
	
	@Autowired
	private SqlSession db;
	
	
// 이미지 셀렉트

	public Map<String, Object> selectImg(Map<String, Object> map){
		return db.selectOne("FIFA.selectimg", map);
	}
	
	
//	구단 생성
	
	public int insertClub(Map<String, Object> map) {
		db.insert("FIFA.insertfifa", map);
		return db.insert("FIFA.insertclub", map);
	}
	
	
//	감독 생성
	
	public int insertManager(Map<String, Object> map) {
		db.insert("FIFA.insertfifa", map);
		return db.insert("FIFA.insertmanager", map);
	}
	
	
//	선수 생성
	
	public int insertPlayer(Map<String, Object> map) {
		db.insert("FIFA.insertfifa", map);
		return db.insert("FIFA.insertplayer", map);
	}
	
	
//	클럽 리스트
	
	public List<Map<String, Object>> listClub() {
		return db.selectList("FIFA.listclub");
	}
	
	
}
