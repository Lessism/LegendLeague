package com.lessism.legendleague.controller;

import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import com.lessism.legendleague.dao.LeagueDAO;

@Controller
@RequestMapping("league")
public class LeagueController {
	
	@Autowired
	private LeagueDAO lDAO;
	
	
//	Preview
	
		@RequestMapping("preview.ll")
		public ModelAndView preview(@RequestParam Map<String, Object> map) {
			return new ModelAndView("league/preview", "league", lDAO.preview(map));
		}
		
		
//	Ranking
	
		@RequestMapping("ranking.ll")
		public ModelAndView ranking(@RequestParam Map<String, Object> map) {
			return new ModelAndView("league/ranking", "league", lDAO.ranking(map));
		}
		
		
//	Round Match
	
		@RequestMapping("match.ll")
		public ModelAndView match(@RequestParam Map<String, Object> map) {
			return new ModelAndView("league/match", "league", lDAO.roundMatch(map));
		}
		
		
//	Review
		
		@RequestMapping("review.ll")
		public ModelAndView review(@RequestParam Map<String, Object> map) {
			return new ModelAndView("league/review", "league", lDAO.review(map));
		}
		
		
//	Award
	
		@RequestMapping("award.ll")
		public ModelAndView award(@RequestParam Map<String, Object> map) {
			return new ModelAndView("league/award", "league", lDAO.award(map));
		}
		
		
//	History
	
		@RequestMapping("history.ll")
		public ModelAndView history(@RequestParam Map<String, Object> map) {
			
			if (!map.get("history").equals("League") && !map.get("history").equals("Season")) {
				map.put("history", "League");
			}
			
			return new ModelAndView("league/history", "league", lDAO.history(map));
		}
}