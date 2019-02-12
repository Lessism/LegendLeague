<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<script>
$(function(){
	
	$(document).ajaxSend(function(e, xhr, options) {
		xhr.setRequestHeader($("meta[name='csrf_header']").attr("content"), $("meta[name='csrf_token']").attr("content"))
	})
	
	$('#logout').click(function(){
		$('#logout_form').submit()
	})
	
})
/*	
	$('#progress').click(function(){
		$('.ui.sidebar')
		  .sidebar('setting', 'transition', 'overlay')
		  .sidebar('toggle')
	})
 */
</script>
</body>
</html>