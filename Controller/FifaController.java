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
import org.springframework.web.servlet.ModelAndView;

import com.lessism.legendleague.dao.FifaDAO;

@Controller
@RequestMapping("fifa")
public class FifaController {
	
	@Autowired
	private FifaDAO fDAO;
	@Autowired
	private BCryptPasswordEncoder pw;
	
	
//	로그인
	
		@RequestMapping(value="login.ll", method=RequestMethod.GET)
		public String login() {
			
			return "fifa/login";
		}
		
		
//	가입 유형
	
		@RequestMapping(value="join_select.ll")
		public String joinSelect() {
			
			return "fifa/join_select";
		}
		
		
//	구단 가입
		
		@RequestMapping(value="join_club.ll", method=RequestMethod.GET)
		public String joinClub() {
			
			return "fifa/join_club";
		}
		
		@RequestMapping(value="join_club.ll", method=RequestMethod.POST)
		public String joinClub(
				@RequestParam Map<String, Object> map,
				MultipartHttpServletRequest img) throws IOException {
			
			map.replace("pw", pw.encode((String)map.get("pw")));
			map.put("emblem", img.getFile("emblem").getBytes());
			fDAO.insertClub(map);
			
			return "redirect:/";
		}
		
	
//	감독 생성
	
		@RequestMapping(value="join_manager.ll", method=RequestMethod.GET)
		public String joinManager() {
			
			return "fifa/join_manager";
		}
		
		@RequestMapping(value="join_manager.ll", method=RequestMethod.POST)
		public String joinManager(
				@RequestParam Map<String, Object> map,
				MultipartHttpServletRequest img) throws IOException {
			
			map.replace("pw", pw.encode((String)map.get("pw")));
			map.put("profile", img.getFile("profile").getBytes());
			fDAO.insertManager(map);
			
			return "redirect:/";
		}
		
		
//	선수 생성
		
		@RequestMapping(value="join_player.ll", method=RequestMethod.GET)
		public String joinPlayer() {
			
			return "fifa/join_player";
		}
		
		@RequestMapping(value="join_player.ll", method=RequestMethod.POST)
		public String joinPlayer(
				@RequestParam Map<String, Object> map,
				MultipartHttpServletRequest img) throws IOException {
			
			map.replace("pw", pw.encode((String)map.get("pw")));
			map.put("profile", img.getFile("profile").getBytes());
			fDAO.insertPlayer(map);
			
			return "redirect:/";
		}
		
		
//	클럽 리스트
		
		@RequestMapping(value="/list_club.w9")
		public ModelAndView list() {
			
			return new ModelAndView("fifa/list_club", "list", fDAO.listClub());
		}
		
		
		
}
