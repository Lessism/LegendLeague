package com.lessism.legendleague.dao;

import java.util.ArrayList;
import java.util.Collection;
import java.util.Map;

import org.apache.ibatis.session.SqlSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;

import com.lessism.legendleague.vo.SecurityVO;

public class SecurityDAO implements UserDetailsService {
	
	@Autowired
	private SqlSession db;
	
	public SecurityDAO(SqlSession db) {
		super();
		this.db = db;
	}
	
	
		@Override
		public UserDetails loadUserByUsername(String id) throws UsernameNotFoundException {
			
			Map<String, Object> map = db.selectOne("FIFA.login", id);
			Collection<SimpleGrantedAuthority> role = new ArrayList<>();
			role.add(new SimpleGrantedAuthority((String)map.get("role")));
			
			return new SecurityVO(
					(String)map.get("id"),
					(String)map.get("pw"),
					(String)map.get("name"),
					role
					);
		}

}
