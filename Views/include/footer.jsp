<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<div style="margin-top:150px"><br></div>
<script>
$(function(){
	
	$(document).ajaxSend(function(e, xhr, options) {
		xhr.setRequestHeader($("meta[name='csrf_header']").attr("content"), $("meta[name='csrf_token']").attr("content"))
	})
	
	$('#rail, #subrail').sticky()
	
	$('.dropdown').dropdown()
	
	$('.ui.modal').modal()
	
	$('.tabular.item').tab()
	
	$('#menu').click(function(){
		$('.sidebar').sidebar('toggle')
	})
	
	$('#logout').click(function(){
		$('#logout_form').submit()
	})
	
	for (i = 0; i < $('.nav.item').length; i++){
		
		var menu = $('.nav.item').eq(i)
		var path = window.location.pathname
		
		if (menu.attr('href') == path || menu.attr('href') == '/'+path.split('/')[1]+'/'+path.split('/')[2]+'.ll'){
			menu.addClass('active')
			if (menu.attr('href') == path){
				if (menu.text() == 'Login' || menu.text() == 'Join'){
					$.post('/legendleague/visit', {menu : path.split('/')[2], submenu : path.split('/')[3].split('.')[0]})
				} else{
					$.post('/legendleague/visit', {menu : path.split('/')[2].split('.')[0]})
				}
			}
			if (menu.attr('href') == '/'+path.split('/')[1]+'/'+path.split('/')[2]+'.ll'){
				$.post('/legendleague/visit', {menu : path.split('/')[2], submenu : path.split('/')[3].split('.')[0]})
			}
			$.post('/legendleague/stay', function(data){
				$('#visit_now').text(data)
			})
		}
	}
	
	setInterval(function(){
		$.post('/legendleague/stay', function(data){
			$('#visit_now').text(data)
		})
	}, 5000)
	
})
</script>
</body>
</html>