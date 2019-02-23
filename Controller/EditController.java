package com.lessism.legendleague.controller;

import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import com.lessism.legendleague.dao.EditDAO;
import com.lessism.legendleague.dao.FifaDAO;

@Controller
@RequestMapping("edit")
public class EditController {
	
	@Autowired
	private EditDAO eDAO;
	@Autowired
	private FifaDAO fDAO;
	
	
//	리그 로스터
	
		@RequestMapping(value="roster_league.ll", method=RequestMethod.GET)
		public String leagueRoster(Model model) {
			
			Map<String, Object> map = null;
			List<Map<String, Object>> clublist = fDAO.list(map);
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
	
//	클럽 리스트
	
		@RequestMapping(value="list_club", method=RequestMethod.GET)
		public ModelAndView editListClub() {
			
			return new ModelAndView("edit/list_club", "list", fDAO.list(null));
		}
		
		
//	클럽 로스터 리스트
		
		@RequestMapping(value="roster_club", method=RequestMethod.GET)
		public ModelAndView editRosterClub(@RequestParam Map<String, Object> map) {
			map = eDAO.rosterlistclub(map);
			if(map.get("player") != null) {
				map.replace("player", map.get("player").toString().split(","));
			}
			if(map.get("ovr") != null) {
				map.replace("ovr", map.get("ovr").toString().split(","));
			}
			
			return new ModelAndView("edit/roster_club", "info", map);
		}
		
		@RequestMapping(value="roster_club", method=RequestMethod.POST)
		public String editRosterClub(
				@RequestParam Map<String, Object> map,
				@RequestParam(value="player", required=false) String player,
				@RequestParam(value="ovr", required=false) String ovr
				) {

			if(ovr != null) {
				int average = 0;
				for (int i = 0; i < ovr.toString().split(",").length; i++) {
					average += Integer.parseInt(ovr.toString().split(",")[i]);
				}
				map.put("player", player);
				map.put("ovr", average/ovr.toString().split(",").length);
				System.out.println(map);
			}
			
			eDAO.editclub(map);
			
			return "redirect:/";
		}
}