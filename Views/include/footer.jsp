<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<script>
$(function(){
	
	$(document).ajaxSend(function(e, xhr, options) {
		xhr.setRequestHeader($('meta[name="csrf_header"]').attr('content'), $('meta[name="csrf_token"]').attr('content'))
	})
	
	$('.dropdown').dropdown()
	
	$('#popup_fifa').popup({
		hoverable  : true
	})
	
	$('#menu').click(function(){
		$('.sidebar').sidebar('toggle')
	})
	
	$('#logout').click(function(){
		$('#logout_form').submit()
	})
	
	for (i = 0; i < $('.nav.item').length; i++){
		if ($('.nav.item').eq(i).attr('href') == window.location.pathname){
			$('.nav.item').eq(i).addClass('active')
		}
	}
	
	
})
</script>
</body>
</html>