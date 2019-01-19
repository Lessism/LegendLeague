<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment text container">
	<form class="ui form" action="${path}/fifa/login.ll" method="post">
		<h1 class="ui center aligned header f k r">로그인</h1>
		<hr>
		<div class="ui field">
			<div class="ui labeled input">
				<label class="ui basic label llab f k r" for="id">아이디</label>
				<input type="text" name="id" id="id" placeholder="ID"/>
			</div>
		</div>
		<div class="ui field">
			<div class="ui labeled input">
				<label class="ui basic label llab f k r" for="pw">암호</label>
				<input type="password" name="pw" id="pw" placeholder="Password"/>
			</div>
		</div>
		<hr>
		<div class="ui center aligned container">
			<input class="ui black button f k r" type="submit" value="로그인">
			<a class="ui button f k r" href="${path}">메인</a>
		</div>
	</form>
</section>
<jsp:include page="../include/footer.jsp"/>
