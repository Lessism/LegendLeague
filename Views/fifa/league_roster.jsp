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
		<div class="ui header f k r"><a class="link f k r" href="${path}/fifa/record.ll?role=${fifa.role}&name=${fifa.name}">Record</a></div>
		<div class="ui divider"></div>
		<div class="ui segment f k r">
			<div class="ui header f k r">Stat</div>
			<div class="ui divider"></div>
			<div class="ui four statistics">
				<div class="statistic">
					<div class="value"><h2 class="f k r">${fifa.record.stat.sumcountgame}</h2></div>
					<div class="label"><h5 class="f k r">경기</h5></div>
				</div>
				<div class="statistic">
					<div class="value">
						<h2 class="f k r">
							<c:if test="${fifa.record.stat.avgrating < 100}">${f:substring(fifa.record.stat.avgrating, 0, 1)}.${f:substring(fifa.record.stat.avgrating, 1, 2)}</c:if>
							<c:if test="${fifa.record.stat.avgrating > 99}">10.0</c:if>
						</h2>
					</div>
					<div class="label"><h5 class="f k r">평점</h5></div>
				</div>
				<div class="statistic">
					<div class="value"><h2 class="f k r">${fifa.record.stat.sumgoal}</h2></div>
					<div class="label"><h5 class="f k r">골</h5></div>
				</div>
				<div class="statistic">
					<div class="value"><h2 class="f k r">${fifa.record.stat.sumassist}</h2></div>
					<div class="label"><h5 class="f k r">어시스트</h5></div>
				</div>
			</div>
			<div class="ui divider"></div>
			<div class="ui active progress" data-percent="100" style="display:flex;">
				<div class="bar" style="width:<fmt:formatNumber value="${fifa.record.stat.winodds}" type="percent"/>; background-color:#2ecc40;">
					<div class="progress">${fifa.record.stat.summaxwin} 승</div>
				</div>
				<div class="bar" style="width:<fmt:formatNumber value="${fifa.record.stat.drawodds}" type="percent"/>; background-color:#ffe21f;">
					<div class="progress">${fifa.record.stat.summaxdraw} 무</div>
				</div>
				<div class="bar" style="width:<fmt:formatNumber value="${fifa.record.stat.loseodds}" type="percent"/>; background-color:#ff695e;">
					<div class="progress">${fifa.record.stat.summaxlose} 패</div>
				</div>
				<div class="label f k r">승률 <fmt:formatNumber value="${fifa.record.stat.winodds}" type="percent"/></div>
			</div>
		</div>
		<table class="ui striped center aligned table">
			<thead>
				<tr class="ui inverted center aligned table f k r">
					<th>시즌</th>
					<th>소속</th>
					<th>경기</th>
					<th>평점</th>
					<th>득점</th>
					<th>도움</th>
				</tr>
			</thead>
			<tbody>
				<c:forEach var="stat" items="${fifa.record.statseason}">
					<tr>
						<td style="width:20%; border-right:1px solid rgba(34,36,38,.1)"><a class="link f k r" href="${path}/league/review.ll?season=${stat.season}">${stat.season}/${f:substring(stat.season+1, 2, 4)}</a></td>
						<td style="width:55%; border-right:1px solid rgba(34,36,38,.1)"><a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${stat.club}"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${stat.club}">${stat.club}</a></td>
						<td style="width:10%">${stat.countgame}</td>
						<td style="width:5%">
							<c:if test="${stat.avgrating < 100}">${f:substring(stat.avgrating, 0, 1)}.${f:substring(stat.avgrating, 1, 2)}</c:if>
							<c:if test="${stat.avgrating > 99}">10.0</c:if>
						</td>
						<td style="width:5%">${stat.sumgoal}</td>
						<td style="width:5%">${stat.sumassist}</td>
					</tr>
				</c:forEach>
			</tbody>
		</table>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>
