package com.lessism.legendleague;

import javax.servlet.http.HttpSessionEvent;
import javax.servlet.http.HttpSessionListener;

public class Visit implements HttpSessionListener{
	
	static private int sessions;
	
	
		public static int getSessions() {
			return sessions;
		}
		
		@Override
		public void sessionCreated(HttpSessionEvent se) {
			sessions++;
		}
		
		@Override
		public void sessionDestroyed(HttpSessionEvent se) {
			sessions--;
		}	
}