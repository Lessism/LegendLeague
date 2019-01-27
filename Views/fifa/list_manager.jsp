<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
	<h1 class="ui center aligned header f k r">감독 목록</h1>
	<hr>
	<table class="ui striped center aligned table">
		<thead>
		<tr class="ui inverted center aligned table f k r">
			<th colspan="2">감독명</th>
			<th>OVR</th>
			<th>전술</th>
		</tr>
		</thead>
		<tbody>
		<c:forEach var="manager" items="${list}">
			<tr>
				<td style="width:10%"><a class="link" href="${path}/fifa/manager.ll?name=${manager.name}"><img class="ui rounded fluid image" src="${path}/image.ll?role=Manager&img=profile&name=${manager.name}"></a></td>
				<td style="width:40%"><a class="link" href="${path}/fifa/manager.ll?name=${manager.name}">${manager.name}</a></td>
				<td style="width:20%">${manager.ovr}</td>
				<td style="width:30%">${manager.tactic}</td>
			</tr>
		</c:forEach>
		</tbody>
	</table>
</section>
<jsp:include page="../include/footer.jsp"/>
