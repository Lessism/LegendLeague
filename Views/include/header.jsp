<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
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
			<%-- <c:if test="${info eq null}"> --%>
				<a class="item" href="${path}/fifa/login.ll">Login</a>
				<a class="item" href="${path}/fifa/join_select.ll">Join</a>
			<%-- </c:if> --%>
			<%-- <c:if test="${info ne null}">
				<a class="item" href="${path}/member/logout.w9">Logout</a>
				<a class="item" href="${path}/member/info.w9">Info</a>
			</c:if> --%>
		</div>
	</div>
	<nav class="ui inverted secondary pointing menu container">
		<a class="active item" href="${path}">Home</a>
		<a class="item" href="${path}/board/list.w9?page=1">Board</a>
	</nav>
</header>
