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
	
	
//	Visit Total
	
		public Map<String, Object> total(Map<String, Object> map) {
			
			Map<String, Object> visit = new HashMap<>(map);
			visit.put("total", db.selectOne("Master.visit_total"));
			visit.put("today", db.selectOne("Master.visit_today"));
			visit.put("todaytotal", db.selectOne("Master.visit_today_total"));
			visit.put("listtotal", db.selectOne("Master.visit_list_total"));
			
			map.put("visit", visit);
			
			return map;
		}
		
		
//	Visit Date
		
		public Map<String, Object> date(Map<String, Object> map) {
			
			Map<String, Object> visit = new HashMap<>(map);
			visit.put("list", db.selectList("Master.visit_list"));
			visit.put("avgtotal", db.selectOne("Master.visit_avg_total"));
			
			map.put("visit", visit);
			
			return map;
		}
		
		
//	Visit Menu
			
		public Map<String, Object> menu(Map<String, Object> map) {
			
			Map<String, Object> visit = new HashMap<>(map);
			
			visit.put("type", "master");
			visit.put("master", db.selectOne("Master.visit_stay_menu", visit));
			visit.put("mastersub", db.selectList("Master.visit_stay_submenu", visit));
			visit.put("type", "account");
			visit.put("account", db.selectOne("Master.visit_stay_menu", visit));
			visit.put("accountsub", db.selectList("Master.visit_stay_submenu", visit));
			visit.put("type", "league");
			visit.put("league", db.selectOne("Master.visit_stay_menu", visit));
			visit.put("leaguesub", db.selectList("Master.visit_stay_submenu", visit));
			visit.put("type", "fifa");
			visit.put("fifa", db.selectOne("Master.visit_stay_menu", visit));
			visit.put("fifasub", db.selectList("Master.visit_stay_submenu", visit));
			
			map.put("visit", visit);
			
			return map;
		}
		
		
//	Edit
			
		public Map<String, Object> edit(Map<String, Object> map) {
			
			Map<String, Object> edit = new HashMap<>(map);
			
			map.put("list", db.selectList("FIFA.list", map));
			map.put("edit", edit);
			
			return map;
		}
		
		
//	Edit Roster
			
		public Map<String, Object> roster(Map<String, Object> map) {
			
			Map<String, Object> roster = new HashMap<>(map);
			roster.put("list", db.selectList("Master.roster", map));
			roster.put("unlisted", db.selectList("Master.unrosted", map));
			
			map.put("roster", roster);
			
			return map;
		}
		
		public Map<String, Object> editRoster(Map<String, Object> map) {
			
			Map<String, Object> roster = new HashMap<>(map);
			roster.put("list", db.selectList("Master.roster", map));
			roster.put("unlisted", db.selectList("Master.unrosted", map));
			
			map.put("roster", roster);
			
			return map;
		}
		
		
}
