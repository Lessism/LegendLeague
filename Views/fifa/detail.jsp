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
	<div class="ui center aligned black segment">
		<div class="content">
			<h3 class="f k r">Detail</h3>
			<div class="ui divider"></div>
		</div>
		<div><img class="ui centered rounded image" src="${path}/image.ll?no=${fifa.personal.profile}" style="max-height:500px"></div>
		<div class="ui divider"></div>
		<div class="ui header f k r"><a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.name}">${fifa.name}</a></div>
		<div class="ui meta f k r"><a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.personal.country}"><i class="${f:toLowerCase(fifa.personal.country)} flag"></i>${fifa.personal.country}</a></div>
		<div class="ui meta f k r"><a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.personal.club}"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.personal.club}">${fifa.personal.club}</a></div>
		<div class="ui divider"></div>
		<div class="ui segment">
			<div class="ui active ${fifa.personal.icon} progress">
				<div class="bar" style="width:${fifa.personal.ovr}%;">
					<div class="progress"><div class="ui meta f k r">${fifa.personal.type} ${fifa.personal.ovr}</div></div>
				</div>
				<div class="label f k r" style="color:black">OVR</div>
			</div>
		</div>
		<div class="ui segment f k r">
			<div class="ui header f k r">Information</div>
			<table class="ui center aligned table">
				<tr>
					<th>Birth</th>
					<td>${fifa.personal.birth}</td>
				</tr>
				<tr>
					<th>Physical</th>
					<td>${fifa.personal.height} cm ${fifa.personal.weight} kg</td>
				</tr>
				<tr>
					<th>OVR</th>
					<td><i class="futbol icon"></i>${fifa.personal.ovr}</td>
				</tr>
				<tr>
					<th>Type</th>
					<td>${fifa.personal.fulltype}</td>
				</tr>
				<tr>
					<th>Position</th>
					<td><i class="dot circle outline ${fifa.personal.icon} icon"></i>${fifa.personal.position}</td>
				</tr>
			</table>
		</div>
		<div class="ui segment f k r">
			<div class="ui header f k r">Stat</div>
			<div class="ui divider"></div>
			<div class="ui four statistics">
				<div class="statistic">
					<div class="value"><h2 class="f k r">${fifa.detail.stat.sumcountgame}</h2></div>
					<div class="label"><h5 class="f k r">경기</h5></div>
				</div>
				<div class="statistic">
					<div class="value">
						<h2 class="f k r">
							<c:if test="${fifa.detail.stat.avgrating < 100}">${f:substring(fifa.detail.stat.avgrating, 0, 1)}.${f:substring(fifa.detail.stat.avgrating, 1, 2)}</c:if>
							<c:if test="${fifa.detail.stat.avgrating > 99}">10.0</c:if>
						</h2>
					</div>
					<div class="label"><h5 class="f k r">평점</h5></div>
				</div>
				<div class="statistic">
					<div class="value"><h2 class="f k r">${fifa.detail.stat.sumgoal}</h2></div>
					<div class="label"><h5 class="f k r">골</h5></div>
				</div>
				<div class="statistic">
					<div class="value"><h2 class="f k r">${fifa.detail.stat.sumassist}</h2></div>
					<div class="label"><h5 class="f k r">어시스트</h5></div>
				</div>
			</div>
			<div class="ui divider"></div>
			<div class="ui active progress" data-percent="100" style="display:flex;">
				<div class="bar" style="width:<fmt:formatNumber value="${fifa.detail.stat.winodds}" type="percent"/>; background-color:#2ecc40;">
					<div class="progress">${fifa.detail.stat.summaxwin} 승</div>
				</div>
				<div class="bar" style="width:<fmt:formatNumber value="${fifa.detail.stat.drawodds}" type="percent"/>; background-color:#ffe21f;">
					<div class="progress">${fifa.detail.stat.summaxdraw} 무</div>
				</div>
				<div class="bar" style="width:<fmt:formatNumber value="${fifa.detail.stat.loseodds}" type="percent"/>; background-color:#ff695e;">
					<div class="progress">${fifa.detail.stat.summaxlose} 패</div>
				</div>
				<div class="label f k r">승률 <fmt:formatNumber value="${fifa.detail.stat.winodds}" type="percent"/></div>
			</div>
		</div>
		<c:if test="${fifa.personal.history ne null}">
			<div class="ui segment f k r">
				<div class="ui header f k r">History</div>
				<div class="ui divider"></div>
				<div class="ui four statistics">
					<div class="statistic">
						<div class="value"><h2 class="f k r">${fifa.detail.award.countchampion}</h2></div>
						<div class="label"><h5 class="f k r">Champion</h5></div>
					</div>
					<div class="statistic">
						<div class="value"><h2 class="f k r">${fifa.detail.award.countballondor}</h2></div>
						<div class="label"><h5 class="f k r">Ballon Dor</h5></div>
					</div>
					<div class="statistic">
						<div class="value"><h2 class="f k r">${fifa.detail.award.countgoalscorer}</h2></div>
						<div class="label"><h5 class="f k r">Goal Scorer</h5></div>
					</div>
					<div class="statistic">
						<div class="value"><h2 class="f k r">${fifa.detail.award.countassistprovider}</h2></div>
						<div class="label"><h5 class="f k r">Assist Provider</h5></div>
					</div>
				</div>
				<div class="ui segment f k r">
					<div class="ui middle aligned relaxed divided list">
						<c:forEach var="history" items="${fifa.personal.history.split(',')}" varStatus="idx">
							<c:if test="${idx.index == 0 || historySeason ne f:substring(history, 0, 7)}">
								<div class="item">
									<h5 class="f k r">${f:substring(history, 0, 7)} Season</h5>
							</c:if>
									<div>${f:substring(history, 7, f:length(history))}</div>
							<c:if test="${idx.index == 0 || historySeason ne f:substring(history, 0, 7)}">
								</div>
							</c:if>
							<c:set var="historySeason" value="${f:substring(history, 0, 7)}"/>
						</c:forEach>
					</div>
				</div>
			</div>
		</c:if>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>
