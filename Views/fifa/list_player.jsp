<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
	<h1 class="ui center aligned header f k r">선수 목록</h1>
	<hr>
	<table class="ui striped center aligned table">
		<thead>
		<tr class="ui inverted center aligned table f k r">
			<th>프로필</th>
			<th>선수명</th>
			<th>F ovr</th>
			<th>M ovr</th>
			<th>D ovr</th>
			<th>G ovr</th>
		</tr>
		</thead>
		<tbody>
		<c:forEach var="player" items="${list}">
			<tr>
				<td style="width:10%"><img src="${path}/image.ll?role=Player&img=profile&name=${player.name}" height="50px" width="75px"></td>
				<td style="width:30%"><a href="${path}/fifa/player.ll?name=${player.name}">${player.name}</a></td>
				<td style="width:15%">${player.fovr}</td>
				<td style="width:15%">${player.movr}</td>
				<td style="width:15%">${player.dovr}</td>
				<td style="width:15%">${player.govr}</td>
			</tr>
		</c:forEach>
		</tbody>
	</table>
</section>
<jsp:include page="../include/footer.jsp"/>