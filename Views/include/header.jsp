<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ taglib prefix="f" uri="http://java.sun.com/jsp/jstl/functions" %>
<%-- <div class="item" data-value="af"><i class="${f:toLowerCase('Afghanistan')} flag"></i>Afghanistan</div> --%>
<%@ taglib prefix="s" uri="http://www.springframework.org/security/tags" %>
<c:set var="path" value="${pageContext.request.contextPath}" />
<!DOCTYPE html>
<html>
<head>
	<title>Legend League</title>
	<meta charset="UTF-8">
	<meta id="csrf_token" name="csrf_token" content="${_csrf.token}">
	<meta id="csrf_header" name="csrf_header" content="${_csrf.headerName}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="${path}/resources/css/Lcss.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif+KR:500&amp;subset=korean">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.0/semantic.min.css">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.0/semantic.min.js"></script>
</head>
<body>
<header class="ui inverted vertical segment">
	<div class="ui inverted menu container">
		<div class="ui inverted left menu">
			<a class="ui inverted button" href="https://github.com/Lessism">Lessism</a>
		</div>
		<div class="ui inverted right menu">
			<s:authorize access="isAnonymous()">
				<a class="item" href="${path}/fifa/login.ll">Login</a>
				<a class="item" href="${path}/fifa/join.ll">Join</a>
			</s:authorize>
			<s:authorize access="isAuthenticated()">
				<form id="logout_form" method="post" action="${path}/fifa/logout.ll">
					<a class="item" id="logout">Logout</a>
					<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}">
				</form>
				<a class="item" href="${path}/fifa/info.ll"><s:authentication property="principal.username"/></a>
			</s:authorize>
		</div>
	</div>
	<nav class="ui inverted secondary pointing menu container">
		<a class="nav item" href="${path}/">League</a>
		<div class="ui dropdown item">
			FIFA
			<i class="dropdown icon"></i>
			<div class="menu">
				<a class="nav item" href="${path}/fifa/fifa_list.ll">Club</a>
				<a class="nav item" href="${path}">Manager</a>
				<a class="nav item" href="${path}">Player</a>
				<div class="divider"></div>
				<div class="item">Stadium</div>
			</div>
		</div>
<div class="ui button" id="popup">Show flowing popup</div>
	<div class="ui flowing popup top left transition hidden">
		<div class="ui three column divided center aligned grid">
			<div class="column">
				<h4 class="ui header">Basic Plan</h4>
				<p><b>2</b> projects, $10 a month</p>
				<div class="ui button">Choose</div>
			</div>
			<div class="column">
				<h4 class="ui header">Business Plan</h4>
				<p><b>5</b> projects, $20 a month</p>
				<div class="ui button">Choose</div>
			</div>
			<div class="column">
				<h4 class="ui header">Premium Plan</h4>
				<p><b>8</b> projects, $25 a month</p>
				<div class="ui button">Choose</div>
			</div>
		</div>
	</div>
	</nav>
</header>
<s:authorize access="isAuthenticated()">
	<div class="ui visible vertical menu inverted sidebar">
		<a class="item" href="${path}/fifa/league_roster.ll">리그 편집</a>
		<a class="item" href="${path}/edit/list_club.ll">구단 편집</a>
	</div>
</s:authorize>