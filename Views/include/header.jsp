<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ taglib prefix="s" uri="http://www.springframework.org/security/tags" %>
<c:set var="path" value="${pageContext.request.contextPath}" />

<!DOCTYPE html>
<html>
<head>
	<title>Legend League</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="${path}/resources/css/Lcss.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif+KR:500&amp;subset=korean" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.0/semantic.min.css">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.0/semantic.min.js"></script>
</head>
<body>
<div class="relative height">
<header class="ui inverted vertical segment">
	<div class="ui inverted menu container">
		<div class="ui inverted left menu">
			<a class="ui inverted button" href="https://github.com/Lessism">Legend League</a>
		</div>
		<div class="ui inverted right menu">
			<s:authorize access="isAnonymous()">
				<a class="item" href="${path}/login.ll">Login</a>
				<a class="item" href="${path}/fifa/join_select.ll">Join</a>
			</s:authorize>
			<s:authorize access="isAuthenticated()">
				<form id="logout_form" method="post" action="${path}/logout.ll">
					<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}">
					<a class="item" id="logout">Logout</a>
				</form>
				<a class="item" href="${path}/member/info.w9"><s:authentication property="principal.name"/></a>
			</s:authorize>
		</div>
	</div>
	<nav class="ui inverted secondary pointing menu container">
		<a class="active item" href="${path}">Home</a>
		<a class="item" href="${path}/board/list.w9?page=1">Board</a>
	</nav>
<script>
$(function(){
	$('#logout').click(function(){
		$('#logout_form').submit()
	})
})
</script>
</header>
