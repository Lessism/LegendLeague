package com.lessism.legendleague;

import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpStatus;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
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
	
		@RequestMapping(value = "/", method = RequestMethod.GET)
		public String home() {
			return "redirect:league.ll";
		}
		
		
//	Account
	
		@RequestMapping(value = "account.ll", method = RequestMethod.GET)
		public String account() {
			return "redirect:/account/login.ll";
		}
		
		
//	League
	
		@RequestMapping(value = "league.ll", method = RequestMethod.GET)
		public ModelAndView main() {
			return new ModelAndView("league/league", "league", lDAO.league());
		}
		
		
//	FIFA
	
		@RequestMapping(value = "fifa.ll", method = RequestMethod.GET)
		public String fifa() {
			return "redirect:/fifa/list.ll";
		}
		
		
//	Image Convert
	
		@RequestMapping(value = "image.ll", method = RequestMethod.GET)
		public ResponseEntity<byte[]> imageConvert(@RequestParam Map<String, Object> map) {
			
			HttpHeaders header = new HttpHeaders();
			header.setContentType(MediaType.IMAGE_JPEG);
			
			return  new ResponseEntity<byte[]>(fDAO.imageConvert(map), header, HttpStatus.OK);
		}
		
		
//	에러페이지
		
		@RequestMapping(value="/error_403.ll")
		public String errorpage() {
			
			return "error_403";
		}
}
