package com.lessism.legendleague.controller;

import java.io.IOException;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.multipart.MultipartHttpServletRequest;

import com.lessism.legendleague.dao.FifaDAO;

@Controller
@RequestMapping("account")
public class AccountController {
	
	@Autowired
	private FifaDAO fDAO;
	@Autowired
	private BCryptPasswordEncoder pw;
	
	
//	Login
	
		@RequestMapping("login.ll")
		public String login() {
			return "account/login";
		}
		
		
//	Join
	
		@RequestMapping(value="join.ll", method=RequestMethod.GET)
		public String join() {
			return "account/join";
		}
		
		@RequestMapping(value="join.ll", method=RequestMethod.POST)
		public String join(
				@RequestParam Map<String, Object> map,
				MultipartHttpServletRequest img
				) throws IOException {
			
			map.replace("pw", pw.encode((String)map.get("pw")));
			if (!img.getFile("img").isEmpty()) {
				map.put("img", img.getFile("img").getBytes());
			}
			if (map.get("role").equals("Club") && !img.getFile("img").isEmpty()) {
				map.put("img1", img.getFile("img1").getBytes());
			}
			fDAO.join(map);
			
			return "redirect:login.ll";
		}
		
}
