<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib prefix="s" uri="http://www.springframework.org/security/tags" %>
<div class="ui vertical inverted menu sidebar f k r">
<s:authorize access="isAnonymous()">
	<div style="padding-top:400px; text-align:center;">
		<a class="item" href="${path}/account/login.ll">
			로그인이 필요합니다.<br>
			<button class="ui inverted black button f k r" style="margin-top:25px;">
				Login
			</button>
		</a>
	</div>
</s:authorize>
<s:authorize access="isAuthenticated()">
	<a class="item" href="${path}/edit/roster.ll">리그 편집</a>
	<a class="item" href="${path}/edit/club.ll">구단 편집</a>
</s:authorize>
</div>