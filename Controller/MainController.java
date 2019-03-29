package com.lessism.legendleague;

import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpStatus;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import com.lessism.legendleague.dao.FifaDAO;
import com.lessism.legendleague.dao.LeagueDAO;

@Controller
public class MainController {
	
	@Autowired
	private FifaDAO fDAO;
	@Autowired
	private LeagueDAO lDAO;
	
	
//	Main
	
		@RequestMapping("/")
		public String home() {
			return "redirect:league.ll";
		}
		
		
//	Account
	
		@RequestMapping("account.ll")
		public String account() {
			return "redirect:/account/login.ll";
		}
		
		
//	League
	
		@RequestMapping("league.ll")
		public ModelAndView main() {
			return new ModelAndView("league/league", "league", lDAO.league());
		}
		
		
//	FIFA
	
		@RequestMapping("fifa.ll")
		public ModelAndView fifa() {
			return new ModelAndView("fifa/fifa", "fifa", fDAO.fifa());
		}
		
		
//	Image Convert
	
		@RequestMapping("image.ll")
		public ResponseEntity<byte[]> imageConvert(@RequestParam Map<String, Object> map) {
			
			HttpHeaders header = new HttpHeaders();
			header.setContentType(MediaType.IMAGE_JPEG);
			
			return  new ResponseEntity<byte[]>(fDAO.imageConvert(map), header, HttpStatus.OK);
		}
		
		
//	에러페이지
		
		@RequestMapping("/error_403.ll")
		public String errorpage() {
			
			return "error_403";
		}
}
