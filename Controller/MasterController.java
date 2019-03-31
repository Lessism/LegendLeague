package com.lessism.legendleague.controller;

import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import com.lessism.legendleague.dao.MasterDAO;

@Controller
@RequestMapping("master")
public class MasterController {
	
	@Autowired
	private MasterDAO mDAO;
	
	
//	Visit
	
		@RequestMapping("visit.ll")
		public ModelAndView visit(@RequestParam Map<String, Object> map) {
			return new ModelAndView("master/visit", "master", mDAO.visit(map));
		}
		
		
//	Visit Date
	
		@RequestMapping("date.ll")
		public ModelAndView date(@RequestParam Map<String, Object> map) {
			return new ModelAndView("master/date", "master", mDAO.date(map));
		}
		
}
