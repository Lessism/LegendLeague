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
		if ($('.nav.item').eq(i).attr('href') == window.location.pathname || $('.nav.item').eq(i).attr('href') == '/'+window.location.pathname.split('/')[1]+'/'+window.location.pathname.split('/')[2]+'.ll'){
			$('.nav.item').eq(i).addClass('active')
		}
	}
	
})
</script>
</body>
</html>