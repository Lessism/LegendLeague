<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment text container">
	<form class="ui form" id="loginForm" action="${path}/account/login_process" method="post">
		<h1 class="ui center aligned header f k r">로그인</h1>
		<hr>
		<div class="ui field">
			<div class="ui labeled input">
				<label class="ui basic label llab f k r" for="id">아이디</label>
				<input type="text" name="id" id="id" placeholder="ID">
			</div>
		</div>
		<div class="ui field">
			<div class="ui labeled input">
				<label class="ui basic label llab f k r" for="pw">암호</label>
				<input type="password" name="pw" id="pw" placeholder="Password">
			</div>
		</div>
		<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}">
	</form>
	<form id="masterForm" method="post" action="${path}/account/login_process">
		<input type="hidden" name="id" value="Master">
		<input type="hidden" name="pw" value="Master">
		<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}">
	</form>
	<hr>
	<div class="ui center aligned container">
		<input class="ui black button f k r" id="login" type="button" value="로그인">
		<a class="ui button f k r" href="${path}">메인</a>
		<input class="ui black button f k r" id="master" type="button" value="Master">
	</div>
</section>
<script>
$(function(){
	
	$('#login').click(function(){
		$('#loginForm').submit()
	})
		
	$('#master').click(function(){
		$('#masterForm').submit()
	})
	
})
</script>
<jsp:include page="../include/footer.jsp"/>
