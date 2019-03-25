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
	<div class="ui grid">
	<div class="five wide column">
		<div class="ui center aligned card segment">
			<div class="ui image"><img src="${path}/image.ll?no=${fifa.personal.profile}"></div>
			<div class="ui header f k r">
				<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.name}">${fifa.name}</a>
			</div>
			<div class="ui meta f k r"><i class="${f:toLowerCase(fifa.personal.country)} flag"></i><a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.personal.country}">${fifa.personal.country}</a></div>
			<div class="ui meta f k r"><img class="ui avatar mini image" src="${path}/image.ll?role=Club&name=${fifa.personal.club}"><a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.personal.club}">${fifa.personal.club}</a></div>
			<div class="ui container">
				<div class="ui active inverted ${fifa.personal.icon} progress" style="margin-top:10px;margin-bottom:0;">
					<div class="bar" style="width:${fifa.personal.ovr}%;">
						<div class="progress"><div class="ui meta f k r">${fifa.personal.position}<i class="dot circle outline ${fifa.personal.icon} icon"></i>${fifa.personal.ovr}</div></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="eleven wide column">
		<div class="ui grid black segment">
			<div class="ui sixteen wide column center aligned">
				<h3 class="f k r"><a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.name}">Profile</a></h3>
				<div class="ui divider"></div>
			</div>
			<div class="six wide column">
				<div class="ui center aligned segment f k r">
					<div class="ui header f k r"><a class="link f k r" href="${path}/fifa/detail.ll?role=${fifa.role}&name=${fifa.name}">Information</a></div>
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
			</div>
			<div class="ten wide column">
				<div class="ui center aligned segment f k r">
					<div class="ui header f k r"><a class="link f k r" href="${path}/fifa/title.ll?role=${fifa.role}&name=${fifa.name}">Title</a></div>
					<div class="ui divider"></div>
					<div class="ui one statistics">
						<div class="statistic">
							<div class="value"><h2 class="f k r">${fifa.profile.award.countchampion}</h2></div>
							<div class="label"><h5 class="f k r">Champion</h5></div>
						</div>
					</div>
				</div>
				<div class="ui center aligned segment f k r">
					<div class="ui header f k r"><a class="link f k r" href="${path}/fifa/award.ll?role=${fifa.role}&name=${fifa.name}">Award</a></div>
					<div class="ui divider"></div>
					<div class="ui three statistics">
						<div class="statistic">
							<div class="value"><h2 class="f k r">${fifa.profile.award.countballondor}</h2></div>
							<div class="label"><h5 class="f k r">Ballon Dor</h5></div>
						</div>
						<div class="statistic">
							<div class="value"><h2 class="f k r">${fifa.profile.award.countgoalscorer}</h2></div>
							<div class="label"><h5 class="f k r">Goal Scorer</h5></div>
						</div>
						<div class="statistic">
							<div class="value"><h2 class="f k r">${fifa.profile.award.countassistprovider}</h2></div>
							<div class="label"><h5 class="f k r">Assist Provider</h5></div>
						</div>
					</div>
				</div>
			</div>
			<div class="sixteen wide column">
			<div class="ui center aligned segment f k r">
				<div class="ui header f k r"><a class="link f k r" href="${path}/fifa/record.ll?role=${fifa.role}&name=${fifa.name}">Record</a></div>
				<table class="ui center aligned table">
					<thead>
						<tr class="f k r">
							<th style="width:10%">${fifa.profile.record[0].season}/${f:substring(fifa.profile.record[0].season+1, 2, 4)}</th>
							<th style="width:10%"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${fifa.profile.record[0].club}"></th>
							<th style="width:40%">${fifa.profile.record[0].club}</th>
							<th style="width:10%">${fifa.profile.record[0].countround} 경기</th>
							<th style="width:10%">
								<c:if test="${fifa.profile.record[0].avgrating < 100}">${f:substring(fifa.profile.record[0].avgrating, 0, 1)}.${f:substring(fifa.profile.record[0].avgrating, 1, 2)} 점</c:if>
								<c:if test="${fifa.profile.record[0].avgrating > 99}">10.0 점</c:if>
							</th>
							<th style="width:10%">${fifa.profile.record[0].sumgoal} 골</th>
							<th style="width:10%">${fifa.profile.record[0].sumassist} 도움</th>
						</tr>
					</thead>
					<tbody>
						<c:forEach var="record" items="${fifa.profile.record}" begin="1" end="2">
							<tr>
								<td style="width:10%">${record.season}/${f:substring(record.season+1, 2, 4)}</td>
								<td style="width:10%"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${record.club}"></td>
								<td style="width:40%">${record.club}</td>
								<td style="width:10%">${record.countround} 경기</td>
								<td style="width:10%">
									<c:if test="${record.avgrating < 100}">${f:substring(record.avgrating, 0, 1)}.${f:substring(record.avgrating, 1, 2)} 점</c:if>
									<c:if test="${record.avgrating > 99}">10.0 점</c:if>
								</td>
								<td style="width:10%">${record.sumgoal} 골</td>
								<td style="width:10%">${record.sumassist} 도움</td>
							</tr>
						</c:forEach>
					</tbody>
				</table>
			</div>
			</div>
		</div>
	</div>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>
