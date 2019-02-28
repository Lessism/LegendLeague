package com.lessism.legendleague.dao;

import java.util.Map;

import org.apache.ibatis.session.SqlSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class EditDAO {
	
	@Autowired
	private SqlSession db;
	
	
//	Roster list
	
		public Map<String, Object> listRoster(Map<String, Object> map) {
	
			map.put("roster", db.selectList("FIFA.roster_list", map));
			map.put("role", "Club");
			
			if (map.get("name") == null) {
				map.put("club", db.selectList("FIFA.list", map));
			}
			else {
				map.replace("role", "Manager");
				map.put("manager", db.selectList("FIFA.list", map));
				map.replace("role", "Player");
				map.put("player", db.selectList("FIFA.list", map));
			}
			
			return map;
		}
	
	
//	Roster update
	
		public int updateRoster(Map<String, Object> map) {
			return db.update("Edit.update_roster", map);
		}
	
	
}
