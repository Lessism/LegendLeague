<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="personal"/>
<%@ include file="../include/rail.jsp" %>
	<div class="ui image header f k r">
		<img class="ui rounded image" src="${path}/image.ll?role=${fifa.role}&name=${fifa.name}" style="height:50px;${fifa.role eq 'Club' ? 'width:50px;' : ''}">
		<div class="content">
			<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.name}">${fifa.name}</a>
			<div class="sub header">
				<c:if test="${fifa.role eq 'Player'}">
					<i class="dot circle outline ${fifa.personal.icon} icon" style="margin-right:0"></i> ${fifa.personal.position} / ${fifa.personal.fulltype}
				</c:if>
				<c:if test="${fifa.role ne 'Player'}">
					<i class="dot circle outline black icon" style="margin-right:0"></i> ${fifa.role}
				</c:if>
			</div>
			<div class="sub header">
				<i class="futbol icon" style="margin-right:0"></i> ${fifa.personal.ovr}
			</div>
		</div>
	</div>
	<div class="ui divider"></div>
<c:if test="${fifa.role eq 'Player'}">
	<div class="ui grid">
	<div class="five wide column" style="padding:30px;">
		<div class="ui center aligned card segment">
			<div class="ui image">
				<img src="${path}/image.ll?no=${fifa.personal.profile}" style="background-color:white; border-bottom:1px solid #d4d4d5;">
			</div>
			<div class="ui header f k r">
				<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.name}">
					${fifa.name}
				</a>
			</div>
			<div class="ui meta f k r">
				<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.personal.country}">
					<i class="${f:toLowerCase(fifa.personal.country)} flag"></i>
					${fifa.personal.country}
				</a>
			</div>
			<div class="ui meta f k r">
				<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.personal.club}">
					<img class="ui avatar mini image" src="${path}/image.ll?role=Club&name=${fifa.personal.club}" style="height:17.5px;width:17.5px">
					${fifa.personal.club}
				</a>
			</div>
			<div class="ui container">
				<div class="ui active inverted ${fifa.personal.icon} progress" style="margin-top:10px;margin-bottom:0;">
					<div class="bar" style="width:${fifa.personal.ovr}%;">
						<div class="progress">
							<div class="ui meta f k r">
								${fifa.personal.position}<i class="dot circle outline ${fifa.personal.icon} icon"></i>${fifa.personal.ovr}
							</div>
						</div>
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
							<th>OVR</th>
							<td><i class="futbol icon"></i>${fifa.personal.ovr}</td>
						</tr>
						<tr>
							<th>Birth</th>
							<td>${fifa.personal.birth}</td>
						</tr>
						<tr>
							<th>Physical</th>
							<td>${fifa.personal.height} cm ${fifa.personal.weight} kg</td>
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
							<th style="width:10%">
								<a class="link f k r" href="${path}/league/review.ll?season=${fifa.profile.record[0].season}">
									${fifa.profile.record[0].season}/${f:substring(fifa.profile.record[0].season+1, 2, 4)}
								</a>
							</th>
							<th style="width:10%">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.profile.record[0].club}">
									<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${fifa.profile.record[0].club}">
								</a>
							</th>
							<th style="width:40%">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.profile.record[0].club}">
									${fifa.profile.record[0].club}
								</a>
							</th>
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
								<td style="width:10%">
									<a class="link f k r" href="${path}/league/review.ll?season=${record.season}">
										${record.season}/${f:substring(record.season+1, 2, 4)}
									</a>
								</td>
								<td style="width:10%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${record.club}">
										<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${record.club}">
									</a>
								</td>
								<td style="width:40%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${record.club}">
										${record.club}
									</a>
								</td>
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
</c:if>
<c:if test="${fifa.role eq 'Manager'}">
	<div class="ui grid">
	<div class="five wide column" style="padding:30px;">
		<div class="ui center aligned card segment">
			<div class="ui image"><img src="${path}/image.ll?no=${fifa.personal.profile}" style="background-color:white; border-bottom:1px solid #d4d4d5;"></div>
			<div class="ui header f k r">
				<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.name}">
					${fifa.name}
				</a>
			</div>
			<div class="ui meta f k r">
				<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.personal.country}">
					<i class="${f:toLowerCase(fifa.personal.country)} flag"></i>
					${fifa.personal.country}
				</a>
			</div>
			<div class="ui meta f k r">
				<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.personal.club}">
					<img class="ui avatar mini image" src="${path}/image.ll?role=Club&name=${fifa.personal.club}">
					${fifa.personal.club}
				</a>
			</div>
			<div class="ui container">
				<div class="ui active inverted black progress"style="margin-top:10px;">
					<div class="bar" style="width:${fifa.personal.ovr}%;">
						<div class="progress">${fifa.personal.ovr}</div>
					</div>
					<div class="label f k r" style="color:black">OVR</div>
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
							<th>OVR</th>
							<td><i class="futbol icon"></i>${fifa.personal.ovr}</td>
						</tr>
						<tr>
							<th>Birth</th>
							<td>${fifa.personal.birth}</td>
						</tr>
						<tr>
							<th>Physical</th>
							<td>${fifa.personal.height} cm ${fifa.personal.weight} kg</td>
						</tr>
						<tr>
							<th>Tactic</th>
							<td>${fifa.personal.tactic}</td>
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
					<div class="ui one statistics">
						<div class="statistic">
							<div class="value"><h2 class="f k r">${fifa.profile.award.countchampion}</h2></div>
							<div class="label"><h5 class="f k r">FIFA World Manager</h5></div>
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
							<th style="width:10%">
								<a class="link f k r" href="${path}/league/review.ll?season=${fifa.profile.record[0].season}">
									${fifa.profile.record[0].season}/${f:substring(fifa.profile.record[0].season+1, 2, 4)}
								</a>
							</th>
							<th style="width:10%">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.profile.record[0].club}">
									<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${fifa.profile.record[0].club}">
								</a>
							</th>
							<th style="width:40%">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.profile.record[0].club}">
									${fifa.profile.record[0].club}
								</a>
							</th>
							<th style="width:10%">${fifa.profile.record[0].maxgame} 경기</th>
							<th style="width:10%">${fifa.profile.record[0].maxwin} 승</th>
							<th style="width:10%">${fifa.profile.record[0].maxdraw} 무</th>
							<th style="width:10%">${fifa.profile.record[0].maxlose} 패</th>
						</tr>
					</thead>
					<tbody>
						<c:forEach var="record" items="${fifa.profile.record}" begin="1" end="2">
							<tr>
								<td style="width:10%">
									<a class="link f k r" href="${path}/league/review.ll?season=${record.season}">
										${record.season}/${f:substring(record.season+1, 2, 4)}
									</a>
								</td>
								<td style="width:10%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${record.club}">
										<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${record.club}">
									</a>
								</td>
								<td style="width:40%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${record.club}">
										${record.club}
									</a>
								</td>
								<td style="width:10%">${record.maxgame} 경기</td>
								<td style="width:10%">${record.maxwin} 승</td>
								<td style="width:10%">${record.maxdraw} 무</td>
								<td style="width:10%">${record.maxlose} 패</td>
							</tr>
						</c:forEach>
					</tbody>
				</table>
			</div>
			</div>
		</div>
	</div>
	</div>
</c:if>
<c:if test="${fifa.role eq 'Club'}">
	<div class="ui grid">
	<div class="five wide column" style="padding:30px;">
		<div class="ui center aligned black card segment">
			<div class="ui image">
				<img src="${path}/image.ll?no=${fifa.personal.emblem}" style="background-color:white; border-bottom:1px solid #d4d4d5;">
			</div>
			<div class="ui header f k r">
				<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.name}">
					${fifa.name}
				</a>
			</div>
			<div class="ui meta f k r">
				<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.personal.country}">
					<i class="${f:toLowerCase(fifa.personal.country)} flag"></i>
					${fifa.personal.country}
				</a>
			</div>
			<div class="ui meta f k r">
				<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${fifa.personal.name}">
					<img class="ui avatar mini image" src="${path}/image.ll?role=Stadium&name=${fifa.personal.stadium}">
					${fifa.personal.stadium}
				</a>
			</div>
			<div class="ui container">
				<div class="ui active inverted black progress"style="margin-top:10px;">
					<div class="bar" style="width:${fifa.personal.ovr}%;">
						<div class="progress">${fifa.personal.ovr}</div>
					</div>
					<div class="label f k r" style="color:black">OVR</div>
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
							<th>OVR</th>
							<td><i class="futbol icon"></i>${fifa.personal.ovr}</td>
						</tr>
						<tr>
							<th>Founding</th>
							<td><fmt:formatDate value="${fifa.personal.regdate}" pattern="yyyy년 MM월 dd일"/></td>
						</tr>
						<tr>
							<th>Roster</th>
							<td>${fifa.personal.roster eq 1 ? '등록' : '미등록'}</td>
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
					<div class="ui one statistics">
						<div class="statistic">
							<div class="value"><h2 class="f k r">${fifa.profile.award.countmanager}</h2></div>
							<div class="label"><h5 class="f k r">FIFA World Manager</h5></div>
						</div>
					</div>
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
							<th style="width:10%">
								<a class="link f k r" href="${path}/league/review.ll?season=${fifa.profile.record[0].season}">
									${fifa.profile.record[0].season}/${f:substring(fifa.profile.record[0].season+1, 2, 4)}
								</a>
							</th>
							<th style="width:10%">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.profile.record[0].club}">
									<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${fifa.profile.record[0].club}">
								</a>
							</th>
							<th style="width:40%">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.profile.record[0].club}">
									${fifa.profile.record[0].club}
								</a>
							</th>
							<th style="width:10%">${fifa.profile.record[0].maxgame} 경기</th>
							<th style="width:10%">${fifa.profile.record[0].maxwin} 승</th>
							<th style="width:10%">${fifa.profile.record[0].maxdraw} 무</th>
							<th style="width:10%">${fifa.profile.record[0].maxlose} 패</th>
						</tr>
					</thead>
					<tbody>
						<c:forEach var="record" items="${fifa.profile.record}" begin="1" end="2">
							<tr>
								<td style="width:10%">
									<a class="link f k r" href="${path}/league/review.ll?season=${record.season}">
										${record.season}/${f:substring(record.season+1, 2, 4)}
									</a>
								</td>
								<td style="width:10%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${record.club}">
										<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${record.club}">
									</a>
								</td>
								<td style="width:40%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${record.club}">
										${record.club}
									</a>
								</td>
								<td style="width:10%">${record.maxgame} 경기</td>
								<td style="width:10%">${record.maxwin} 승</td>
								<td style="width:10%">${record.maxdraw} 무</td>
								<td style="width:10%">${record.maxlose} 패</td>
							</tr>
						</c:forEach>
					</tbody>
				</table>
			</div>
			</div>
		</div>
	</div>
	</div>
</c:if>
</section>
<jsp:include page="../include/footer.jsp"/>
