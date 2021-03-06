<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ taglib prefix="s" uri="http://www.springframework.org/security/tags" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ taglib prefix="f" uri="http://java.sun.com/jsp/jstl/functions" %>
<%@ taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt" %>
<c:set var="path" value="${pageContext.request.contextPath}" />
<!DOCTYPE html>
<html>
<head>
	<title>Legend League</title>
	<meta charset="UTF-8">
	<meta name="csrf_token" content="${_csrf.token}">
	<meta name="csrf_header" content="${_csrf.headerName}">
	<link rel="stylesheet" href="${path}/resources/css/Lcss.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif+KR:500&amp;subset=korean">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
	<script src="https://semantic-ui.com/javascript/library/tablesort.js"></script>
</head>
<body>
<header class="ui inverted vertical segment f k r">
	<div class="ui inverted menu container">
		<div class="ui inverted left menu">
			<a class="ui inverted button" href="https://github.com/Lessism">Lessism</a>
		</div>
		<div class="ui inverted secondary pointing right menu f k r">
			<s:authorize access="isAnonymous()">
				<a class="nav item" href="${path}/account/login.ll">Login</a>
				<a class="nav item" href="${path}/account/join.ll">Join</a>
			</s:authorize>
			<s:authorize access="isAuthenticated()">
				<form id="logout_form" method="post" action="${path}/account/logout.ll">
					<a class="item" id="logout">Logout</a>
					<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}">
				</form>
				<s:authorize access="hasAuthority('Master')">
					<a class="ui inverted nav item" href="${path}/master.ll">Master</a>
				</s:authorize>
				<s:authorize access="!hasAuthority('Master')">
					<a class="nav item" href="${path}/account/information.ll">
						<s:authentication var="id" property="principal.username"/>
						<s:authentication property="principal.username"/>
					</a>
				</s:authorize>
			</s:authorize>
		</div>
	</div>
	<nav class="ui inverted secondary pointing menu container f k r">
		<a class="item" id="menu">Menu</a>
		<a class="nav item" href="${path}/league.ll">League</a>
		<a class="nav item" href="${path}/fifa.ll">FIFA</a>
		<a class="nav item" href="${path}/fifa/profile.ll?role=Club&name=Barcelona">Club</a>
		<a class="nav item" href="${path}/fifa/profile.ll?role=Manager&name=Pep Guardiola">Manager</a>
		<a class="nav item" href="${path}/fifa/profile.ll?role=Player&name=Lionel Messi">Player</a>
	</nav>
</header>
<%@ include file="../include/sidebar.jsp" %>
