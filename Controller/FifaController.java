package com.lessism.legendleague.controller;

import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
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
	
		@RequestMapping("login.ll")
		public String login() {
			return "fifa/login";
		}
		
		
//	가입 유형
	
		@RequestMapping("join.ll")
		public String join() {
			return "fifa/join";
		}
		
		
//	구단 생성
		
		
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
		
		@RequestMapping(value="list_club.ll")
		public ModelAndView listClub() {
			
			return new ModelAndView("fifa/list_club", "list", fDAO.listClub());
		}
		
		
//	감독 리스트
		
		@RequestMapping(value="list_manager.ll")
		public ModelAndView listManager() {
			
			return new ModelAndView("fifa/list_manager", "list", fDAO.listManager());
		}
			
			
//	선수 리스트
	
		@RequestMapping(value="list_player.ll")
		public ModelAndView listPlayer() {
			
			return new ModelAndView("fifa/list_player", "list", fDAO.listPlayer());
		}
		
		
//	구단 정보
		
		@RequestMapping(value="club.ll")
		public ModelAndView infoClub(@RequestParam Map<String, Object> map) {
			
			return new ModelAndView("fifa/club", "info", fDAO.infoClub(map));
		}

		
//	감독 정보
			
		@RequestMapping(value="manager.ll")
		public ModelAndView infoManager(@RequestParam Map<String, Object> map) {
			
			return new ModelAndView("fifa/manager", "info", fDAO.infoManager(map));
		}
		
		
//	선수 정보
		
		@RequestMapping(value="player.ll")
		public ModelAndView infoPlayer(@RequestParam Map<String, Object> map) throws UnsupportedEncodingException {
			
			return new ModelAndView("fifa/player", "info", fDAO.infoPlayer(map));
		}
		
		
//	리그 로스터
		
		@RequestMapping(value="league_roster.ll", method=RequestMethod.GET)
		public String leagueRoster(Model model) {
			
			List<Map<String, Object>> clublist = fDAO.listClub();
			Map<String, Object> roster = fDAO.infoLeague();
			if(roster.get("roster") != null) {
				roster.replace("roster", roster.get("roster").toString().split(","));
			}
			
			model.addAttribute("roster", roster);
			model.addAttribute("list", clublist);
			
			return "fifa/league_roster";
		}
		
		@RequestMapping(value="league_roster.ll", method=RequestMethod.POST)
		public String leagueRoster(@RequestParam(value="rosterlist", required=false) String rosterlist) {
			
			fDAO.updateRoster(rosterlist);
			
			return "redirect:/";
		}
}
