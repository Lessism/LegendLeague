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
		<div class="ui header f k r"><a class="link f k r" href="${path}/fifa/award.ll?role=${fifa.role}&name=${fifa.name}">Award</a></div>
		<div class="ui divider"></div>
		<div class="ui three statistics">
			<div class="statistic">
				<div class="value"><h2 class="f k r">${fifa.award.awardcount.countballondor}</h2></div>
				<div class="label"><h5 class="f k r">Ballon Dor</h5></div>
			</div>
			<div class="statistic">
				<div class="value"><h2 class="f k r">${fifa.award.awardcount.countgoalscorer}</h2></div>
				<div class="label"><h5 class="f k r">Goal Scorer</h5></div>
			</div>
			<div class="statistic">
				<div class="value"><h2 class="f k r">${fifa.award.awardcount.countassistprovider}</h2></div>
				<div class="label"><h5 class="f k r">Assist Provider</h5></div>
			</div>
		</div>
		<table class="ui striped center aligned table">
			<thead>
				<tr class="ui inverted center aligned table f k r">
					<th>시즌</th>
					<th>수상</th>
					<th>소속</th>
					<th>경기</th>
					<th>평점</th>
					<th>득점</th>
					<th>도움</th>
				</tr>
			</thead>
			<tbody>
				<c:forEach var="award" items="${fifa.award.award}">
					<tr>
						<td style="width:20%; border-right:1px solid rgba(34,36,38,.1)"><a class="link f k r" href="${path}/league/review.ll?season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></td>
						<td style="width:20%; border-right:1px solid rgba(34,36,38,.1)">
							<a class="link f k r" href="${path}/fifa/awards.ll?role=Player&award=
								<c:choose>
									<c:when test="${award.awards eq 'Ballon Dor'}">ballondor</c:when>
									<c:when test="${award.awards eq 'Goal Scorer'}">goalscorer</c:when>
									<c:otherwise>assistprovider</c:otherwise>
								</c:choose>
							&season=${award.season}">
							${award.awards}
							</a>
						</td>
						<td style="width:35%; border-right:1px solid rgba(34,36,38,.1)"><a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${award.club}"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${award.club}">${award.club}</a></td>
						<td style="width:10%">${award.countround}</td>
						<td style="width:5%">
							<c:if test="${award.avgrating < 100}">${f:substring(award.avgrating, 0, 1)}.${f:substring(award.avgrating, 1, 2)}</c:if>
							<c:if test="${award.avgrating > 99}">10.0</c:if>
						</td>
						<td style="width:5%">${award.sumgoal}</td>
						<td style="width:5%">${award.sumassist}</td>
					</tr>
				</c:forEach>
			</tbody>
		</table>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>
