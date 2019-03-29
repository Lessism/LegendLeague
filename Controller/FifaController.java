package com.lessism.legendleague.controller;

import java.io.UnsupportedEncodingException;
import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import com.lessism.legendleague.dao.FifaDAO;

@Controller
@RequestMapping("fifa")
public class FifaController {
	
	@Autowired
	private FifaDAO fDAO;
	

//	Personal Profile
	
		@RequestMapping("profile.ll")
		public ModelAndView profile(@RequestParam Map<String, Object> map) {
			return new ModelAndView("fifa/profile", "fifa", fDAO.profile(map));
		}
	

//	Personal Detail
	
		@RequestMapping("detail.ll")
		public ModelAndView info(@RequestParam Map<String, Object> map) {
			return new ModelAndView("fifa/detail", "fifa", fDAO.detail(map));
		}
		

//	Personal Title
	
		@RequestMapping("title.ll")
		public ModelAndView title(@RequestParam Map<String, Object> map) {
			return new ModelAndView("fifa/title", "fifa", fDAO.title(map));
		}
		

//	Personal Award
	
		@RequestMapping("award.ll")
		public ModelAndView award(@RequestParam Map<String, Object> map) {
			return new ModelAndView("fifa/award", "fifa", fDAO.award(map));
		}
		

//	Personal Record
	
		@RequestMapping("record.ll")
		public ModelAndView record(@RequestParam Map<String, Object> map) {
			return new ModelAndView("fifa/record", "fifa", fDAO.record(map));
		}
		

//	Personal Stadium
	
		@RequestMapping("stadium.ll")
		public ModelAndView stadium(@RequestParam Map<String, Object> map) {
			return new ModelAndView("fifa/stadium", "fifa", fDAO.stadium(map));
		}
		

//	Personal Squad
			
			@RequestMapping("squad.ll")
			public ModelAndView squad(@RequestParam Map<String, Object> map) {
				return new ModelAndView("fifa/squad", "fifa", fDAO.squad(map));
			}
		

//	Country
		
		@RequestMapping("country.ll")
		public ModelAndView country(@RequestParam Map<String, Object> map) {
			return new ModelAndView("fifa/country", "fifa", fDAO.country(map));
		}
	

//	Information
	
		@RequestMapping("information.ll")
		public ModelAndView information(@RequestParam Map<String, Object> map) {
			return new ModelAndView("fifa/information", "fifa", fDAO.information(map));
		}
	

//	Awards
	
		@RequestMapping("awards.ll")
		public ModelAndView awards(@RequestParam Map<String, Object> map) {
			return new ModelAndView("fifa/awards", "fifa", fDAO.awards(map));
		}
		
		
//	FIFA List
		
		@RequestMapping(value="list.ll")
		public ModelAndView list(@RequestParam Map<String, Object> map) {
			return new ModelAndView("fifa/list", "fifa", fDAO.list(map));
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
