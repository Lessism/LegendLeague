<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="personal"/>
<%@ include file="../include/rail.jsp" %>
	<div class="ui image header f k r">
		<img class="ui rounded image" src="${path}/image.ll?role=${fifa.role}&name=${fifa.name}" style="height:50px">
		<div class="content">
			<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.name}">${fifa.name}</a>
			<div class="sub header">
				<i class="dot circle outline ${fifa.personal.icon} icon" style="margin-right:0"></i> ${fifa.personal.position} / ${fifa.personal.fulltype}
			</div>
			<div class="sub header">
				<i class="futbol icon" style="margin-right:0"></i> ${fifa.personal.ovr}
			</div>
		</div>
	</div>
	<div class="ui divider"></div>
	<div class="ui center aligned black segment f k r">
		<div class="ui header f k r"><a class="link f k r" href="${path}/fifa/title.ll?role=${fifa.role}&name=${fifa.name}">Title</a></div>
		<div class="ui divider"></div>
		<div class="ui one statistics">
			<div class="statistic">
				<div class="value"><h2 class="f k r">${fifa.title.award.countchampion}</h2></div>
				<div class="label"><h5 class="f k r">Champion</h5></div>
			</div>
		</div>
		<table class="ui striped center aligned table">
			<thead>
				<tr class="ui inverted center aligned table f k r">
					<th>시즌</th>
					<th>타이틀</th>
					<th>클럽</th>
					<th>경기</th>
					<th>승</th>
					<th>무</th>
					<th>패</th>
					<th>승점</th>
				</tr>
			</thead>
			<tbody>
				<c:forEach var="title" items="${fifa.title.title}">
					<tr>
						<td style="width:20%; border-right:1px solid rgba(34,36,38,.1)"><a class="link f k r" href="${path}/league/review.ll?season=${title.season}">${title.season}/${f:substring(title.season+1, 2, 4)}</a></td>
						<td style="width:20%; border-right:1px solid rgba(34,36,38,.1)"><a class="link f k r" href="${path}/fifa/awards.ll?role=Club&award=champion&season=${title.season}">Champion</a></td>
						<td style="width:35%; border-right:1px solid rgba(34,36,38,.1)"><a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${title.club}"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${title.club}">${title.club}</a></td>
						<td style="width:5%">${title.maxgame}</td>
						<td style="width:5%">${title.maxwin}</td>
						<td style="width:5%">${title.maxdraw}</td>
						<td style="width:5%">${title.maxlose}</td>
						<td style="width:5%">${title.maxpoint}</td>
					</tr>
				</c:forEach>
			</tbody>
		</table>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>
