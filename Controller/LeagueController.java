package com.lessism.legendleague.controller;

import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import com.lessism.legendleague.dao.LeagueDAO;

@Controller
@RequestMapping("league")
public class LeagueController {
	
	@Autowired
	private LeagueDAO lDAO;
	
	
//	Season Preview
	
		@RequestMapping(value="season_preview.ll", method=RequestMethod.GET)
		public ModelAndView seasonPreview(@RequestParam Map<String, Object> map) {
			return new ModelAndView("league/season_preview", "preview", lDAO.seasonPreview(map));
		}
		
		
//	Season Ranking
	
		@RequestMapping(value="season_ranking.ll", method=RequestMethod.GET)
		public ModelAndView seasonRanking(@RequestParam Map<String, Object> map) {
			return new ModelAndView("league/season_ranking", "ranking", lDAO.seasonRanking(map));
		}
		
		
//	Season Match
	
		@RequestMapping(value="season_match.ll", method=RequestMethod.GET)
		public ModelAndView seasonMatch(@RequestParam Map<String, Object> map) {
			System.out.println(lDAO.seasonMatch(map));
			return new ModelAndView("league/season_match", "season", lDAO.seasonMatch(map));
		}
		
		
}