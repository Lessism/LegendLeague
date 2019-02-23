<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
	<h1 class="ui center aligned header f k r">
		<c:if test="${param.role eq 'Club' or empty param.role}">구단 목록</c:if>
		<c:if test="${param.role eq 'Manager'}">감독 목록</c:if>
		<c:if test="${param.role eq 'Player'}">선수 목록</c:if>
	</h1>
	<hr>
	<c:if test="${param.role eq 'Club' or empty param.role}">
		<table class="ui striped center aligned table">
			<thead>
			<tr class="ui inverted center aligned table f k r">
				<th colspan="2">클럽명</th>
				<th>경기장</th>
				<th>연고지</th>
				<th>창단일자</th>
			</tr>
			</thead>
			<tbody>
			<c:forEach var="club" items="${list}">
				<tr>
					<td style="width:10%"><a class="link" href="${path}/fifa/club.ll?name=${club.name}"><img class="ui rounded fluid image" src="${path}/image.ll?img_no=${club.emblem}"></a></td>
					<td style="width:30%"><a class="link" href="${path}/fifa/club.ll?name=${club.name}">${club.name}</a></td>
					<td style="width:30%"><a class="link" href="${path}/fifa/stadium.ll?name=${club.stadium}">${club.stadium}</a></td>
					<td style="width:10%">${club.anchorage}</td>
					<td style="width:20%"><fmt:formatDate value="${club.regdate}" pattern="yyyy-MM-dd"/></td>
				</tr>
			</c:forEach>
			</tbody>
		</table>
	</c:if>
	<c:if test="${param.role eq 'Manager'}">
		<table class="ui striped center aligned table">
			<thead>
			<tr class="ui inverted center aligned table f k r">
				<th colspan="2">감독명</th>
				<th>국적</th>
				<th>OVR</th>
				<th>전술</th>
				<th>소속구단</th>
			</tr>
			</thead>
			<tbody>
			<c:forEach var="manager" items="${list}">
				<tr>
					<td style="width:10%"><a class="link" href="${path}/fifa/manager.ll?name=${manager.name}"><img class="ui rounded fluid image" src="${path}/image.ll?img_no=${manager.profile}"></a></td>
					<td style="width:40%"><a class="link" href="${path}/fifa/manager.ll?name=${manager.name}">${manager.name}</a></td>
					<td style="width:10%"><i class="${f:toLowerCase(manager.country)} flag"></i>${manager.country}</td>
					<td style="width:10%">${manager.ovr}</td>
					<td style="width:10%">${manager.tactic}</td>
					<td style="width:20%"><c:if test="${empty manager.club}">Free</c:if><a class="link" href="${path}/fifa/club.ll?name=${manager.club}">${manager.club}</a></td>
				</tr>
			</c:forEach>
			</tbody>
		</table>
	</c:if>
	<c:if test="${param.role eq 'Player'}">
		<table class="ui striped center aligned table">
			<thead>
			<tr class="ui inverted center aligned table f k r">
				<th colspan="2">선수명</th>
				<th>국적</th>
				<th>OVR</th>
				<th>포지션</th>
				<th>소속구단</th>
			</tr>
			</thead>
			<tbody>
			<c:forEach var="player" items="${list}">
				<tr>
					<td style="width:10%"><a class="link" href="${path}/fifa/player.ll?name=${player.name}"><img class="ui rounded fluid image" src="${path}/image.ll?img_no=${player.profile}"></a></td>
					<td style="width:40%"><a class="link" href="${path}/fifa/player.ll?name=${player.name}">${player.name}</a></td>
					<td style="width:10%"><i class="${f:toLowerCase(player.country)} flag"></i>${player.country}</td>
					<td style="width:10%">${player.ovr}</td>
					<td style="width:10%">${player.position}</td>
					<td style="width:20%"><c:if test="${empty player.club}">Free</c:if><a class="link" href="${path}/fifa/club.ll?name=${player.club}">${player.club}</a></td>
				</tr>
			</c:forEach>
			</tbody>
		</table>
	</c:if>
</section>
<jsp:include page="../include/footer.jsp"/>