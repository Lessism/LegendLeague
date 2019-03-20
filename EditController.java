package com.lessism.legendleague.controller;

import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
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
	
	
//	Edit Roster
	
		@RequestMapping(value="roster.ll", method=RequestMethod.GET)
		public ModelAndView roster(@RequestParam Map<String, Object> map) {
			return new ModelAndView("edit/roster", "rosterlist", eDAO.listRoster(map));
		}
		
		@RequestMapping(value="roster.ll", method=RequestMethod.POST)
		public String roster(
				@RequestParam Map<String, Object> map,
				@RequestParam(value="rosterlist", required=false) String rosterlist
				) {
			
			if (rosterlist != null) {
				map.put("roster", rosterlist);
				map.put("rosterlist", rosterlist.split(","));
			}
			eDAO.updateRoster(map);
			
			return "redirect:/";
		}
	
//	Edit Club list
	
		@RequestMapping(value="club.ll", method=RequestMethod.GET)
		public ModelAndView editClub() {
			return new ModelAndView("edit/club", "list", fDAO.listFIFA(null));
		}
		
		
}