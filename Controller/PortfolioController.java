package com.lessism.legendleague.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("portfolio")
public class PortfolioController {
	
	
//	Introduce
	
	@RequestMapping("introduce.ll")
	public String introduce() {
		return "portfolio/introduce";
	}
			
			
//	Project
			
	@RequestMapping("project.ll")
	public String project() {
		return "portfolio/project";
	}
		
}
