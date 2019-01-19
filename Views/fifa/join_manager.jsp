<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
	<form class="ui form" method="post" action="${path}/fifa/join_manager.ll">
		<h1 class="ui center aligned header f k r">감독 생성</h1>
		<hr>
		<div class="ui field">
			<div class="ui labeled input">
				<label class="ui basic label llab f k r" for="id">아이디</label>
				<input type="text" name="id" id="id" placeholder="ID">
				<label class="ui left pointing basic label llab chk"></label>
			</div>
		</div>
		<div class="ui field">
			<div class="ui labeled input">
				<label class="ui basic label llab f k r" for="pw">암호</label>
				<input type="password" name="pw" id="pw" placeholder="Password">
				<label class="ui left pointing basic label llab chk"></label>
			</div>
		</div>
		<div class="ui field">
			<div class="ui labeled input field">
				<label class="ui basic label llab f k r" for="name">감독명</label>
				<input type="text" name="name" id="name" placeholder="Manager Name">
				<label class="ui left pointing basic label llab chk"></label>
			</div>
		</div>
		<input type="hidden" name="role" value="Manager">
		<hr>
		<div class="ui center aligned container">
			<input class="ui black button f k r" type="submit" value="가입">
			<a class="ui button f k r" href="${path}">취소</a>
		</div>
	</form>
</section>
<jsp:include page="../include/footer.jsp"/>