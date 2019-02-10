<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<script>
$(function(){
	
	var token = $("meta[name='_csrf']").attr("content");
	var header = $("meta[name='_csrf_header']").attr("content");
	
	$(function() {
	    $(document).ajaxSend(function(e, xhr, options) {
	        xhr.setRequestHeader(header, token);
	    });
	});
	
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