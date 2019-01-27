<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
	<h1 class="ui center aligned header f k r">구단 목록</h1>
	<hr>
	<table class="ui striped center aligned table">
		<thead>
		<tr class="ui inverted center aligned table f k r">
			<th colspan="2">클럽명</th>
			<th>연고지</th>
			<th>경기장</th>
			<th>창단일자</th>
		</tr>
		</thead>
		<tbody>
		<c:forEach var="club" items="${list}">
			<tr>
				<td style="width:10%"><a class="link" href="${path}/fifa/club.ll?name=${club.name}"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&img=emblem&name=${club.name}"></a></td>
				<td style="width:40%"><a class="link" href="${path}/fifa/club.ll?name=${club.name}">${club.name}</a></td>
				<td style="width:30%">${club.stadium}</td>
				<td style="width:10%">${club.anchorage}</td>
				<td style="width:10%">${club.regdate}</td>
			</tr>
		</c:forEach>
		</tbody>
	</table>
</section>
<jsp:include page="../include/footer.jsp"/>