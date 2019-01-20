package com.lessism.legendleague.vo;

import java.util.Collection;

import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.userdetails.User;

public class SecurityVO extends User{

	private static final long serialVersionUID = 1L;
	private String username;
	private String password;
	private String name;
	
	
		public SecurityVO(
				String username,
				String password,
				String name,
				Collection<? extends GrantedAuthority> authorities) {
			
			super(
					username,
					password,
					authorities);
			
			this.username = username;
			this.password = password;
			this.name = name;
		}


		public String getUsername() {
			return username;
		}


		public void setUsername(String username) {
			this.username = username;
		}


		public String getPassword() {
			return password;
		}


		public void setPassword(String password) {
			this.password = password;
		}


		public String getName() {
			return name;
		}


		public void setName(String name) {
			this.name = name;
		}


		
}
