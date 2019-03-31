<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<script>
$(function(){
	
	$(document).ajaxSend(function(e, xhr, options) {
		xhr.setRequestHeader($("meta[name='csrf_header']").attr("content"), $("meta[name='csrf_token']").attr("content"))
	})
	
	$('.opening, .playing, .ending').transition('set looping').transition('pulse', '2500ms')
	
	$('#rail, #subrail').sticky()
	
	$('.dropdown').dropdown()
	
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
				$.post('/legendleague/visit', {menu : path.split('/')[2].split('.')[0]})
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