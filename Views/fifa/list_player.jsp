<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
	<h1 class="ui center aligned header f k r">선수 목록</h1>
	<hr>
	<table class="ui striped center aligned table">
		<thead>
		<tr class="ui inverted center aligned table f k r">
			<th colspan="2">선수명</th>
			<th>Overall</th>
		</tr>
		</thead>
		<tbody>
		<c:forEach var="player" items="${list}">
			<tr>
				<td style="width:10%"><a class="link" href="${path}/fifa/player.ll?name=${player.name}"><img class="ui rounded fluid image" src="${path}/image.ll?role=Player&img=profile&name=${player.name}"></a></td>
				<td style="width:65%"><a class="link" href="${path}/fifa/player.ll?name=${player.name}">${player.name}</a></td>
				<td style="width:25%">${player.ovr}</td>
			</tr>
		</c:forEach>
		</tbody>
	</table>
</section>
<jsp:include page="../include/footer.jsp"/>