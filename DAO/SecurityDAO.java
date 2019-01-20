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
import org.springframework.security.crypto.factory.PasswordEncoderFactories;
import org.springframework.security.crypto.password.PasswordEncoder;

import com.lessism.legendleague.vo.SecurityVO;

public class SecurityDAO implements UserDetailsService {
	
	@Autowired
	private SqlSession db;
	private PasswordEncoder password = PasswordEncoderFactories.createDelegatingPasswordEncoder();
	
	public SecurityDAO(SqlSession db) {
		super();
		this.db = db;
	}
	
	
		@Override
		public UserDetails loadUserByUsername(String id) throws UsernameNotFoundException {
			
			Map<String, Object> map = db.selectOne("FIFA.login", id);
			Collection<SimpleGrantedAuthority> role = new ArrayList<>();
			role.add(new SimpleGrantedAuthority(map.get("role").toString()));
			
			return new SecurityVO(
					map.get("id").toString(),
					password.encode(map.get("pw").toString()),
					map.get("name").toString(),
					role);
		}

}
