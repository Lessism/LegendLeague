package com.lessism.legendleague.controller;

import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
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
}
