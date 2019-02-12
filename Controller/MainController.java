package com.lessism.legendleague;

import java.io.IOException;
import java.io.UnsupportedEncodingException;
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
	
		@RequestMapping(value = "/", method = RequestMethod.GET)
		public ModelAndView main() throws UnsupportedEncodingException {
			return new ModelAndView("main", "league", lDAO.season());
		}
		
		@RequestMapping(value = "test", method = RequestMethod.GET)
		public String test() {
			
			return "test";
		}
		
		
//	Image convert
		
		@RequestMapping(value = "image.ll", method = RequestMethod.GET)
		public ResponseEntity<byte[]> imageConvert(@RequestParam Map<String, Object> map) throws IOException {
			
			byte[] img = null;
			String role = (String)map.get("role");
			
			map = fDAO.selectImg(map);
			
			if(role.equals("Club")) {
				img = (byte[])map.get("emblem");
			}
			if(!role.equals("Club")) {
				img = (byte[])map.get("profile");
			}
			
			HttpHeaders header = new HttpHeaders();
			header.setContentType(MediaType.IMAGE_JPEG);
			
			return  new ResponseEntity<byte[]>(img, header, HttpStatus.OK);
		}
		
		
//	에러페이지
		
		@RequestMapping(value="/error_403.ll")
		public String errorpage() {
			
			return "error_403";
		}
}
