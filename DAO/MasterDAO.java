package com.lessism.legendleague.dao;

import java.util.HashMap;
import java.util.Map;

import org.apache.ibatis.session.SqlSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class MasterDAO {
	
	@Autowired
	private SqlSession db;
	
	
//	Visit
	
		public Map<String, Object> visit(Map<String, Object> map) {
			
			Map<String, Object> visit = new HashMap<>(map);
			visit.put("total", db.selectOne("Master.visit_total"));
			visit.put("today", db.selectOne("Master.visit_today"));
			
			map.put("visit", visit);
			
			return map;
		}
		
		
//	Visit Date
		
		public Map<String, Object> date(Map<String, Object> map) {
			
			Map<String, Object> date = new HashMap<>(map);
			
			map.put("date", date);
			
			return map;
		}
	
	
}
