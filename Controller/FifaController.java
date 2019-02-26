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
	
	
//	Login
	
		@RequestMapping("login.ll")
		public String login() {
			return "fifa/login";
		}
		
		
//	Join
	
		@RequestMapping(value="join.ll", method=RequestMethod.GET)
		public String join() {
			return "fifa/join";
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
			if (!img.getFile("img1").isEmpty()) {
				map.put("img1", img.getFile("img1").getBytes());
			}
			fDAO.join(map);
			
			return "redirect:login.ll";
		}
		
	
//	FIFA List
		
		@RequestMapping(value="list.ll")
		public ModelAndView listClub(@RequestParam Map<String, Object> map) {
			return new ModelAndView("fifa/list", "list", fDAO.listFIFA(map));
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
			
			Map<String, Object> map = null;
			List<Map<String, Object>> clublist = fDAO.listFIFA(map);
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
