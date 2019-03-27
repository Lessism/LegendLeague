<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="fifa"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r"><a href="${path}/fifa.ll" style="color:black;">FIFA</a></h1>
	<h4 class="f k r">
		${fifa.award.season}/${f:substring(fifa.award.season+1, 2, 4)} Season
		<c:choose>
			<c:when test="${fifa.award.award eq 'champion'}">Legend League Champion</c:when>
			<c:when test="${fifa.award.award eq 'manager'}">FIFA World Manager</c:when>
			<c:otherwise>FIFA World Player Award</c:otherwise>
		</c:choose>
	</h4>
	<div class="ui divider"></div>
	<c:if test="${fifa.award.role eq 'Club'}">
		<div class="ui grid">
			<div class="eleven wide column">
				<div class="ui center aligned black segment">
					<div class="content">
						<h3 class="f k r">Legend League Champion</h3>
						<div class="ui divider"></div>
					</div>
					<div><img class="ui centered rounded image" src="${path}/image.ll?no=${fifa.award.champion.emblem}" style="max-height:500px"></div>
					<div class="ui divider"></div>
					<div class="ui header f k r">
						<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.award.champion.name}">
							${fifa.award.champion.name}
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.award.champion.country}">
							<i class="${f:toLowerCase(fifa.award.champion.country)} flag"></i>
							${fifa.award.champion.country}
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${fifa.award.champion.name}">
							<img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=${fifa.award.champion.stadium}">
							${fifa.award.champion.stadium}
						</a>
					</div>
					<div class="ui divider"></div>
					<div class="ui segment">
						<div class="ui active inverted black progress">
							<div class="bar" style="width:${fifa.award.champion.ovr}%;">
								<div class="progress">${fifa.award.champion.ovr}</div>
							</div>
							<div class="label f k r" style="color:black">OVR</div>
						</div>
						<div class="ui divider"></div>
						<h4 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${fifa.award.season}">
								${fifa.award.season}/${f:substring(fifa.award.season+1, 2, 4)} Season
							</a>
						</h4>
						<div class="ui five statistics">
							<div class="statistic">
								<div class="value"><h2 class="f k r">${fifa.award.champion.odds.game}</h2></div>
								<div class="label"><h5 class="f k r">경기</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r">${fifa.award.champion.odds.maxgoalfor}</h2></div>
								<div class="label"><h5 class="f k r">득점</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r">${fifa.award.champion.odds.maxgoalagainst}</h2></div>
								<div class="label"><h5 class="f k r">실점</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r">${fifa.award.champion.odds.maxgoalfor - fifa.award.champion.score.maxgoalagainst}</h2></div>
								<div class="label"><h5 class="f k r">득실차</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r">${fifa.award.champion.odds.maxpoint}</h2></div>
								<div class="label"><h5 class="f k r">승점</h5></div>
							</div>
						</div>
						<div class="ui divider"></div>
						<div class="ui active progress" data-percent="100" style="display:flex;">
							<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.champion.odds.winodds}" type="percent"/>; background-color:#2ecc40;">
								<div class="progress">${fifa.award.champion.odds.win} 승</div>
							</div>
							<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.champion.odds.drawodds}" type="percent"/>; background-color:#ffe21f;">
								<div class="progress">${fifa.award.champion.odds.draw} 무</div>
							</div>
							<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.champion.odds.loseodds}" type="percent"/>; background-color:#ff695e;">
								<div class="progress">${fifa.award.champion.odds.lose} 패</div>
							</div>
							<div class="label f k r">승률 <fmt:formatNumber value="${fifa.award.champion.odds.winodds}" type="percent"/></div>
						</div>
					</div>
					<div class="ui segment f k r">
						<div class="ui header f k r">
							<a class="link f k r" href="${path}/fifa/squad.ll?role=Club&name=${fifa.award.champion.name}">
								Squad
							</a>
						</div>
						<table class="ui left aligned table">
							<tr>
								<th class="ui center aligned">Manager</th>
								<td>
									<div class="ui image header f k r">
										<img class="ui rounded image" src="${path}/image.ll?no=${fifa.award.champion.manager.profile}" style="height:50px; width:42.5px">
										<div class="content">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Manager&name=${fifa.award.champion.manager.name}">
												${fifa.award.champion.manager.name}
											</a>
											<div class="sub header">
												<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.award.champion.manager.country}">
													<i class="dot circle outline icon"></i><i class="${f:toLowerCase(fifa.award.champion.manager.country)} flag"></i>
													${fifa.award.champion.manager.country}
												</a>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="ui one statistics">
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.champion.manager.tactic}</h2></div>
											<div class="label"><h5 class="f k r">전술</h5></div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<th rowspan="11" class="ui center aligned" style="border-top:1px solid rgba(34,36,38,.1);">Player</th>
								<td>
									<div class="ui image header f k r">
										<img class="ui rounded image" src="${path}/image.ll?no=${fifa.award.champion.roster[0].profile}" style="height:50px">
										<div class="content">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${fifa.award.champion.roster[0].name}">
												${fifa.award.champion.roster[0].name}
											</a>
											<div class="sub header">
												<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.award.champion.roster[0].country}">
													<i class="dot circle outline ${fifa.award.champion.roster[0].icon} icon"></i>
													<i class="${f:toLowerCase(fifa.award.champion.roster[0].country)} flag"></i>
													${fifa.award.champion.roster[0].country}
												</a>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="ui three statistics">
										<div class="statistic">
											<div class="value">
												<h2 class="f k r">
													<c:if test="${fifa.award.champion.roster[0].avgrating < 100}">${f:substring(fifa.award.champion.roster[0].avgrating, 0, 1)}.${f:substring(fifa.award.champion.roster[0].avgrating, 1, 2)}</c:if>
													<c:if test="${fifa.award.champion.roster[0].avgrating > 99}">10.0</c:if>
												</h2>
											</div>
											<div class="label"><h5 class="f k r">평점</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.champion.roster[0].sumgoal}</h2></div>
											<div class="label"><h5 class="f k r">득점</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.champion.roster[0].sumassist}</h2></div>
											<div class="label"><h5 class="f k r">도움</h5></div>
										</div>
									</div>
								</td>
							</tr>
							<c:forEach var="player" items="${fifa.award.champion.roster}" begin="1">
								<tr>
									<td>
										<div class="ui image header f k r">
											<img class="ui rounded image" src="${path}/image.ll?no=${player.profile}" style="height:50px">
											<div class="content">
												<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${player.name}">
													${player.name}
												</a>
												<div class="sub header">
													<a class="link f k r" href="${path}/fifa/country.ll?country=${player.country}">
														<i class="dot circle outline ${player.icon} icon"></i>
														<i class="${f:toLowerCase(player.country)} flag"></i>
														${player.country}
													</a>
												</div>
											</div>
										</div>
									</td>
									<td>
										<div class="ui three statistics">
											<div class="statistic">
												<div class="value">
													<h2 class="f k r">
														<c:if test="${player.avgrating < 100}">${f:substring(player.avgrating, 0, 1)}.${f:substring(player.avgrating, 1, 2)}</c:if>
														<c:if test="${player.avgrating > 99}">10.0</c:if>
													</h2>
												</div>
												<div class="label"><h5 class="f k r">평점</h5></div>
											</div>
											<div class="statistic">
												<div class="value"><h2 class="f k r">${player.sumgoal}</h2></div>
												<div class="label"><h5 class="f k r">득점</h5></div>
											</div>
											<div class="statistic">
												<div class="value"><h2 class="f k r">${player.sumassist}</h2></div>
												<div class="label"><h5 class="f k r">도움</h5></div>
											</div>
										</div>
									</td>
								</tr>
							</c:forEach>
						</table>
					</div>
					<c:if test="${fifa.award.champion.history ne null}">
						<div class="ui segment f k r">
							<div class="ui header f k r">
								<a class="link f k r" href="${path}/fifa/title.ll?role=Club&name=${fifa.award.champion.name}">
									History
								</a>
							</div>
							<div class="ui center aligned statistic">
								<div class="value"><h2 class="f k r">${fifa.award.champion.countchampion}</h2></div>
								<div class="label"><h5 class="f k r">Champion</h5></div>
							</div>
							<div class="ui segment f k r">
								<div class="ui middle aligned relaxed divided list">
									<c:forEach var="history" items="${fifa.award.champion.history.split(',')}">
										<div class="item">
											<h5 class="f k r">${f:substring(history, 0, 7)} Season</h5>
											<div>${f:substring(history, 7, f:length(history))}</div>
										</div>
									</c:forEach>
								</div>
							</div>
						</div>
					</c:if>
				</div>
			</div>
			<div class="five wide column">
				<div class="ui center aligned black segment">
					<h3 class="f k r">년도별 우승팀</h3>
					<div class="ui divider"></div>
					<table class="ui striped center aligned table">
						<c:forEach var="award" items="${fifa.award.list}" varStatus="idx">
							<c:if test="${!empty award.name}">
								<c:if test="${fifa.award.season eq award.season}">
									<thead>
										<tr class="f k r">
											<th style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></th>
											<th><a class="link" href="">${award.name}</a></th>
											<th><a class="link" href="${path}/league/review.ll?season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></th>
										</tr>
									</thead>
								</c:if>
								<c:if test="${fifa.award.season ne award.season}">
									<tr>
										<td style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></td>
										<td><a class="link" href="${path}/fifa/awards.ll?role=${fifa.award.role}&award=${fifa.award.award}&season=${award.season}">${award.name}</a></td>
										<td><a class="link" href="${path}/league/review.ll?season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></td>
									</tr>
								</c:if>
							</c:if>
						</c:forEach>
					</table>
				</div>
			</div>
		</div>
	</c:if>
	<c:if test="${fifa.award.role eq 'Manager'}">
		<div class="ui grid">
			<div class="eleven wide column">
				<div class="ui center aligned black segment">
					<div class="content">
						<h3 class="f k r">FIFA World Manager</h3>
						<div class="ui divider"></div>
					</div>
					<div><img class="ui centered rounded image" src="${path}/image.ll?no=${fifa.award.manager.profile}" style="max-height:500px"></div>
					<div class="ui divider"></div>
					<div class="ui header f k r">
						<a class="link f k r" href="${path}/fifa/profile.ll?role=Manager&name=${fifa.award.manager.name}">
							${fifa.award.manager.name}
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.award.manager.country}">
							<i class="${f:toLowerCase(fifa.award.manager.country)} flag"></i>
							${fifa.award.manager.country}
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.award.manager.club}">
							<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.award.manager.club}">
							${fifa.award.manager.club}
						</a>
					</div>
					<div class="ui divider"></div>
					<div class="ui segment">
						<div class="ui active inverted black progress">
							<div class="bar" style="width:${fifa.award.manager.ovr}%;">
								<div class="progress">${fifa.award.manager.ovr}</div>
							</div>
							<div class="label f k r" style="color:black">OVR</div>
						</div>
						<div class="ui divider"></div>
						<h4 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${fifa.award.season}">
								${fifa.award.season}/${f:substring(fifa.award.season+1, 2, 4)} Season
							</a>
						</h4>
						<div class="ui five statistics">
							<div class="statistic">
								<div class="value"><h2 class="f k r">${fifa.award.manager.odds.game}</h2></div>
								<div class="label"><h5 class="f k r">경기</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r">${fifa.award.manager.odds.maxgoalfor}</h2></div>
								<div class="label"><h5 class="f k r">득점</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r">${fifa.award.manager.odds.maxgoalagainst}</h2></div>
								<div class="label"><h5 class="f k r">실점</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r">${fifa.award.manager.odds.maxgoalfor - fifa.award.manager.score.maxgoalagainst}</h2></div>
								<div class="label"><h5 class="f k r">득실차</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r">${fifa.award.manager.odds.maxpoint}</h2></div>
								<div class="label"><h5 class="f k r">승점</h5></div>
							</div>
						</div>
						<div class="ui divider"></div>
						<div class="ui active progress" data-percent="100" style="display:flex;">
							<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.manager.odds.winodds}" type="percent"/>; background-color:#2ecc40;">
								<div class="progress">${fifa.award.manager.odds.win} 승</div>
							</div>
							<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.manager.odds.drawodds}" type="percent"/>; background-color:#ffe21f;">
								<div class="progress">${fifa.award.manager.odds.draw} 무</div>
							</div>
							<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.manager.odds.loseodds}" type="percent"/>; background-color:#ff695e;">
								<div class="progress">${fifa.award.manager.odds.lose} 패</div>
							</div>
							<div class="label f k r">승률 <fmt:formatNumber value="${fifa.award.manager.odds.winodds}" type="percent"/></div>
						</div>
					</div>
					<div class="ui segment f k r">
						<div class="ui header f k r">
							<a class="link f k r" href="${path}/fifa/detail.ll?role=Manager&name=${fifa.award.manager.name}">
								Information
							</a>
						</div>
						<table class="ui center aligned table">
							<tr>
								<th>Birth</th>
								<td>${fifa.award.manager.birth}</td>
							</tr>
							<tr>
								<th>Physical</th>
								<td>${fifa.award.manager.height} cm ${fifa.award.manager.weight} kg</td>
							</tr>
							<tr>
								<th>Tactic</th>
								<td>${fifa.award.manager.tactic}</td>
							</tr>
						</table>
					</div>
					<c:if test="${fifa.award.manager.history ne null}">
						<div class="ui segment f k r">
							<div class="ui header f k r">
								<a class="link f k r" href="${path}/fifa/award.ll?role=Manager&name=${fifa.award.manager.name}">
									History
								</a>
							</div>
							<div class="ui two statistics">
								<div class="statistic">
									<div class="value"><h2 class="f k r">${fifa.award.manager.countchampion}</h2></div>
									<div class="label"><h5 class="f k r">Champion</h5></div>
								</div>
								<div class="statistic">
									<div class="value"><h2 class="f k r">${fifa.award.manager.countchampion}</h2></div>
									<div class="label"><h5 class="f k r">FIFA World Manager</h5></div>
								</div>
							</div>
							<div class="ui segment f k r">
								<div class="ui middle aligned relaxed divided list">
									<c:forEach var="history" items="${fifa.award.manager.history.split(',')}">
										<div class="item">
											<h5 class="f k r">${f:substring(history, 0, 7)} Season</h5>
											<div>${f:substring(history, 7, f:length(history))}</div>
											<div>FIFA World Manager</div>
										</div>
									</c:forEach>
								</div>
							</div>
						</div>
					</c:if>
				</div>
			</div>
			<div class="five wide column">
				<div class="ui center aligned black segment">
					<h3 class="f k r">년도별 수상자</h3>
					<div class="ui divider"></div>
					<table class="ui striped center aligned table">
						<c:forEach var="award" items="${fifa.award.list}" varStatus="idx">
							<c:if test="${!empty award.name}">
								<c:if test="${fifa.award.season eq award.season}">
									<thead>
										<tr class="f k r">
											<th style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></th>
											<th><a class="link" href="">${award.name}</a></th>
											<th><a class="link" href="${path}/league/review.ll?season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></th>
										</tr>
									</thead>
								</c:if>
								<c:if test="${fifa.award.season ne award.season}">
									<tr>
										<td style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></td>
										<td><a class="link" href="${path}/fifa/awards.ll?role=${fifa.award.role}&award=${fifa.award.award}&season=${award.season}">${award.name}</a></td>
										<td><a class="link" href="${path}/league/review.ll?season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></td>
									</tr>
								</c:if>
							</c:if>
						</c:forEach>
					</table>
				</div>
			</div>
		</div>
	</c:if>
	<c:if test="${fifa.award.role eq 'Player'}">
		<div class="ui black segment">
			<div class="ui pointing secondary ${!empty fifa.award.assistprovider ? 'three' : 'two'} item menu">
				<a class="tabular item f k r ${fifa.award.award eq 'ballondor' ? 'active' : ''}" data-tab="ballondor">Ballon Dor</a>
				<c:if test="${!empty fifa.award.goalscorer}">
					<a class="tabular item f k r ${fifa.award.award eq 'goalscorer' ? 'active' : ''}" data-tab="goalscorer">Goal Scorer</a>
				</c:if>
				<c:if test="${!empty fifa.award.assistprovider}">
					<a class="tabular item f k r ${fifa.award.award eq 'assistprovider' ? 'active' : ''}" data-tab="assistprovider">Assist Provider</a>
				</c:if>
			</div>
			<div class="ui tab segment ${fifa.award.award eq 'ballondor' ? 'active' : ''}" data-tab="ballondor">
				<div class="ui grid">
					<div class="eleven wide column">
						<div class="ui center aligned black segment">
							<div class="content">
								<h3 class="f k r">Ballon Dor</h3>
								<div class="ui divider"></div>
							</div>
							<div><img class="ui centered rounded image" src="${path}/image.ll?no=${fifa.award.ballondor.profile}" style="max-height:500px"></div>
							<div class="ui divider"></div>
							<div class="ui header f k r">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${fifa.award.ballondor.name}">
									${fifa.award.ballondor.name}
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.award.ballondor.country}">
									<i class="${f:toLowerCase(fifa.award.ballondor.country)} flag"></i>
									${fifa.award.ballondor.country}
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.award.ballondor.club}">
									<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.award.ballondor.club}">
									${fifa.award.ballondor.club}
								</a>
							</div>
							<div class="ui divider"></div>
							<div class="ui segment">
								<div class="ui active ${fifa.award.ballondor.icon} progress">
									<div class="bar" style="width:${fifa.award.ballondor.ovr}%;">
										<div class="progress"><div class="ui meta f k r">${fifa.award.ballondor.type} ${fifa.award.ballondor.ovr}</div></div>
									</div>
									<div class="label f k r" style="color:black">OVR</div>
								</div>
								<div class="ui divider"></div>
								<h4 class="f k r">
									<a class="link f k r" href="${path}/league/review.ll?season=${fifa.award.season}">
										${fifa.award.season}/${f:substring(fifa.award.season+1, 2, 4)} Season
									</a>
								</h4>
								<div class="ui four statistics">
									<div class="statistic">
										<div class="value"><h2 class="f k r">${fifa.award.ballondor.score.countround}</h2></div>
										<div class="label"><h5 class="f k r">경기</h5></div>
									</div>
									<div class="statistic">
										<div class="value">
											<h2 class="f k r">
												<c:if test="${fifa.award.ballondor.score.avgrating < 100}">${f:substring(fifa.award.ballondor.score.avgrating, 0, 1)}.${f:substring(fifa.award.ballondor.score.avgrating, 1, 2)}</c:if>
												<c:if test="${fifa.award.ballondor.score.avgrating > 99}">10.0</c:if>
											</h2>
										</div>
										<div class="label"><h5 class="f k r">평점</h5></div>
									</div>
									<div class="statistic">
										<div class="value"><h2 class="f k r">${fifa.award.ballondor.score.sumgoal}</h2></div>
										<div class="label"><h5 class="f k r">골</h5></div>
									</div>
									<div class="statistic">
										<div class="value"><h2 class="f k r">${fifa.award.ballondor.score.sumassist}</h2></div>
										<div class="label"><h5 class="f k r">어시스트</h5></div>
									</div>
								</div>
								<div class="ui divider"></div>
								<div class="ui active progress" data-percent="100" style="display:flex;">
									<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.ballondor.odds.winodds}" type="percent"/>; background-color:#2ecc40;">
										<div class="progress">${fifa.award.ballondor.odds.win} 승</div>
									</div>
									<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.ballondor.odds.drawodds}" type="percent"/>; background-color:#ffe21f;">
										<div class="progress">${fifa.award.ballondor.odds.draw} 무</div>
									</div>
									<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.ballondor.odds.loseodds}" type="percent"/>; background-color:#ff695e;">
										<div class="progress">${fifa.award.ballondor.odds.lose} 패</div>
									</div>
									<div class="label f k r">승률 <fmt:formatNumber value="${fifa.award.ballondor.odds.winodds}" type="percent"/></div>
								</div>
							</div>
							<div class="ui segment f k r">
								<div class="ui header f k r">
									<a class="link f k r" href="${path}/fifa/detail.ll?role=Player&name=${fifa.award.ballondor.name}">
										Information
									</a>
								</div>
								<table class="ui center aligned table">
									<tr>
										<th>Birth</th>
										<td>${fifa.award.ballondor.birth}</td>
									</tr>
									<tr>
										<th>Physical</th>
										<td>${fifa.award.ballondor.height} cm ${fifa.award.ballondor.weight} kg</td>
									</tr>
									<tr>
										<th>Position</th>
										<td><i class="dot circle outline ${fifa.award.ballondor.icon} icon"></i>${fifa.award.ballondor.position}</td>
									</tr>
								</table>
							</div>
							<c:if test="${fifa.award.ballondor.history ne null}">
								<div class="ui segment f k r">
									<div class="ui header f k r">
										<a class="link f k r" href="${path}/fifa/award.ll?role=Player&name=${fifa.award.ballondor.name}">
											History
										</a>
									</div>
									<div class="ui four statistics">
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.ballondor.countchampion}</h2></div>
											<div class="label"><h5 class="f k r">Champion</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.ballondor.countballondor}</h2></div>
											<div class="label"><h5 class="f k r">Ballon Dor</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.ballondor.countgoalscorer}</h2></div>
											<div class="label"><h5 class="f k r">Goal Scorer</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.ballondor.countassistprovider}</h2></div>
											<div class="label"><h5 class="f k r">Assist Provider</h5></div>
										</div>
									</div>
									<div class="ui segment f k r">
										<div class="ui middle aligned relaxed divided list">
											<c:forEach var="history" items="${fifa.award.ballondor.history.split(',')}" varStatus="idx">
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
					</div>
					<div class="five wide column">
						<div class="ui center aligned black segment">
							<h3 class="f k r">년도별 수상자</h3>
							<div class="ui divider"></div>
							<table class="ui striped center aligned table">
								<c:forEach var="award" items="${fifa.award.ballondor.list}" varStatus="idx">
									<c:if test="${!empty award.name}">
										<c:if test="${fifa.award.season eq award.season}">
											<thead>
												<tr class="f k r">
													<th style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></th>
													<th><a class="link" href="">${award.name}</th>
													<th><a class="link" href="${path}/league/review.ll?season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></th>
												</tr>
											</thead>
										</c:if>
										<c:if test="${fifa.award.season ne award.season}">
											<tr>
												<td style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></td>
												<td><a class="link" href="${path}/fifa/awards.ll?role=${fifa.award.role}&award=ballondor&season=${award.season}">${award.name}</a></td>
												<td><a class="link" href="${path}/league/review.ll?season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></td>
											</tr>
										</c:if>
									</c:if>
								</c:forEach>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="ui tab segment ${fifa.award.award eq 'goalscorer' ? 'active' : ''}" data-tab="goalscorer">
				<div class="ui grid">
					<div class="eleven wide column">
						<div class="ui center aligned black segment">
							<div class="content">
								<h3 class="f k r">Goal Scorer</h3>
								<div class="ui divider"></div>
							</div>
							<div><img class="ui centered rounded image" src="${path}/image.ll?no=${fifa.award.goalscorer.profile}" style="max-height:500px"></div>
							<div class="ui divider"></div>
							<div class="ui header f k r">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${fifa.award.goalscorer.name}">
									${fifa.award.goalscorer.name}
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.award.goalscorer.country}">
									<i class="${f:toLowerCase(fifa.award.goalscorer.country)} flag"></i>
									${fifa.award.goalscorer.country}
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.award.goalscorer.club}">
									<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.award.goalscorer.club}">
									${fifa.award.goalscorer.club}
								</a>
							</div>
							<div class="ui divider"></div>
							<div class="ui segment">
								<div class="ui active ${fifa.award.goalscorer.icon} progress">
									<div class="bar" style="width:${fifa.award.goalscorer.ovr}%;">
										<div class="progress"><div class="ui meta f k r">${fifa.award.goalscorer.type} ${fifa.award.goalscorer.ovr}</div></div>
									</div>
									<div class="label f k r" style="color:black">OVR</div>
								</div>
								<div class="ui divider"></div>
								<h4 class="f k r">
									<a class="link f k r" href="${path}/league/review.ll?season=${fifa.award.season}">
										${fifa.award.season}/${f:substring(fifa.award.season+1, 2, 4)} Season
									</a>
								</h4>
								<div class="ui four statistics">
									<div class="statistic">
										<div class="value"><h2 class="f k r">${fifa.award.goalscorer.score.countround}</h2></div>
										<div class="label"><h5 class="f k r">경기</h5></div>
									</div>
									<div class="statistic">
										<div class="value">
											<h2 class="f k r">
												<c:if test="${fifa.award.goalscorer.score.avgrating < 100}">${f:substring(fifa.award.goalscorer.score.avgrating, 0, 1)}.${f:substring(fifa.award.goalscorer.score.avgrating, 1, 2)}</c:if>
												<c:if test="${fifa.award.goalscorer.score.avgrating > 99}">10.0</c:if>
											</h2>
										</div>
										<div class="label"><h5 class="f k r">평점</h5></div>
									</div>
									<div class="statistic">
										<div class="value"><h2 class="f k r">${fifa.award.goalscorer.score.sumgoal}</h2></div>
										<div class="label"><h5 class="f k r">골</h5></div>
									</div>
									<div class="statistic">
										<div class="value"><h2 class="f k r">${fifa.award.goalscorer.score.sumassist}</h2></div>
										<div class="label"><h5 class="f k r">어시스트</h5></div>
									</div>
								</div>
								<div class="ui divider"></div>
								<div class="ui active progress" data-percent="100" style="display:flex;">
									<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.goalscorer.odds.winodds}" type="percent"/>; background-color:#2ecc40;">
										<div class="progress">${fifa.award.goalscorer.odds.win} 승</div>
									</div>
									<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.goalscorer.odds.drawodds}" type="percent"/>; background-color:#ffe21f;">
										<div class="progress">${fifa.award.goalscorer.odds.draw} 무</div>
									</div>
									<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.goalscorer.odds.loseodds}" type="percent"/>; background-color:#ff695e;">
										<div class="progress">${fifa.award.goalscorer.odds.lose} 패</div>
									</div>
									<div class="label f k r">승률 <fmt:formatNumber value="${fifa.award.goalscorer.odds.winodds}" type="percent"/></div>
								</div>
							</div>
							<div class="ui segment f k r">
								<div class="ui header f k r">
									<a class="link f k r" href="${path}/fifa/detail.ll?role=Player&name=${fifa.award.goalscorer.name}">
										Information
									</a>
								</div>
								<table class="ui center aligned table">
									<tr>
										<th>Birth</th>
										<td>${fifa.award.goalscorer.birth}</td>
									</tr>
									<tr>
										<th>Physical</th>
										<td>${fifa.award.goalscorer.height} cm ${fifa.award.goalscorer.weight} kg</td>
									</tr>
									<tr>
										<th>Position</th>
										<td><i class="dot circle outline ${fifa.award.goalscorer.icon} icon"></i>${fifa.award.goalscorer.position}</td>
									</tr>
								</table>
							</div>
							<c:if test="${fifa.award.goalscorer.history ne null}">
								<div class="ui segment f k r">
									<div class="ui header f k r">
										<a class="link f k r" href="${path}/fifa/award.ll?role=Player&name=${fifa.award.goalscorer.name}">
											History
										</a>
									</div>
									<div class="ui four statistics">
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.goalscorer.countchampion}</h2></div>
											<div class="label"><h5 class="f k r">Champion</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.goalscorer.countballondor}</h2></div>
											<div class="label"><h5 class="f k r">Ballon Dor</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.goalscorer.countgoalscorer}</h2></div>
											<div class="label"><h5 class="f k r">Goal Scorer</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.goalscorer.countassistprovider}</h2></div>
											<div class="label"><h5 class="f k r">Assist Provider</h5></div>
										</div>
									</div>
									<div class="ui segment f k r">
										<div class="ui middle aligned relaxed divided list">
											<c:forEach var="history" items="${fifa.award.goalscorer.history.split(',')}" varStatus="idx">
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
					</div>
					<div class="five wide column">
						<div class="ui center aligned black segment">
							<h3 class="f k r">년도별 수상자</h3>
							<div class="ui divider"></div>
							<table class="ui striped center aligned table">
								<c:forEach var="award" items="${fifa.award.goalscorer.list}" varStatus="idx">
									<c:if test="${!empty award.name}">
										<c:if test="${fifa.award.season eq award.season}">
											<thead>
												<tr class="f k r">
													<th style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></th>
													<th><a class="link" href="">${award.name}</th>
													<th><a class="link" href="${path}/league/review.ll?season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></th>
												</tr>
											</thead>
										</c:if>
										<c:if test="${fifa.award.season ne award.season}">
											<tr>
												<td style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></td>
												<td><a class="link" href="${path}/fifa/awards.ll?role=${fifa.award.role}&award=goalscorer&season=${award.season}">${award.name}</a></td>
												<td><a class="link" href="${path}/league/review.ll?season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></td>
											</tr>
										</c:if>
									</c:if>
								</c:forEach>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="ui tab segment ${fifa.award.award eq 'assistprovider' ? 'active' : ''}" data-tab="assistprovider">
				<div class="ui grid">
					<div class="eleven wide column">
						<div class="ui center aligned black segment">
							<div class="content">
								<h3 class="f k r">Assist Provider</h3>
								<div class="ui divider"></div>
							</div>
							<div><img class="ui centered rounded image" src="${path}/image.ll?no=${fifa.award.assistprovider.profile}" style="max-height:500px"></div>
							<div class="ui divider"></div>
							<div class="ui header f k r">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${fifa.award.assistprovider.name}">
									${fifa.award.assistprovider.name}
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.award.assistprovider.country}">
									<i class="${f:toLowerCase(fifa.award.assistprovider.country)} flag"></i>
									${fifa.award.assistprovider.country}
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.award.assistprovider.club}">
									<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.award.assistprovider.club}">
									${fifa.award.assistprovider.club}
								</a>
							</div>
							<div class="ui divider"></div>
							<div class="ui segment">
								<div class="ui active ${fifa.award.assistprovider.icon} progress">
									<div class="bar" style="width:${fifa.award.assistprovider.ovr}%;">
										<div class="progress"><div class="ui meta f k r">${fifa.award.assistprovider.type} ${fifa.award.assistprovider.ovr}</div></div>
									</div>
									<div class="label f k r" style="color:black">OVR</div>
								</div>
								<div class="ui divider"></div>
								<h4 class="f k r">
									<a class="link f k r" href="${path}/league/review.ll?season=${fifa.award.season}">
										${fifa.award.season}/${f:substring(fifa.award.season+1, 2, 4)} Season
									</a>
								</h4>
								<div class="ui four statistics">
									<div class="statistic">
										<div class="value"><h2 class="f k r">${fifa.award.assistprovider.score.countround}</h2></div>
										<div class="label"><h5 class="f k r">경기</h5></div>
									</div>
									<div class="statistic">
										<div class="value">
											<h2 class="f k r">
												<c:if test="${fifa.award.assistprovider.score.avgrating < 100}">${f:substring(fifa.award.assistprovider.score.avgrating, 0, 1)}.${f:substring(fifa.award.assistprovider.score.avgrating, 1, 2)}</c:if>
												<c:if test="${fifa.award.assistprovider.score.avgrating > 99}">10.0</c:if>
											</h2>
										</div>
										<div class="label"><h5 class="f k r">평점</h5></div>
									</div>
									<div class="statistic">
										<div class="value"><h2 class="f k r">${fifa.award.assistprovider.score.sumgoal}</h2></div>
										<div class="label"><h5 class="f k r">골</h5></div>
									</div>
									<div class="statistic">
										<div class="value"><h2 class="f k r">${fifa.award.assistprovider.score.sumassist}</h2></div>
										<div class="label"><h5 class="f k r">어시스트</h5></div>
									</div>
								</div>
								<div class="ui divider"></div>
								<div class="ui active progress" data-percent="100" style="display:flex;">
									<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.assistprovider.odds.winodds}" type="percent"/>; background-color:#2ecc40;">
										<div class="progress">${fifa.award.assistprovider.odds.win} 승</div>
									</div>
									<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.assistprovider.odds.drawodds}" type="percent"/>; background-color:#ffe21f;">
										<div class="progress">${fifa.award.assistprovider.odds.draw} 무</div>
									</div>
									<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.assistprovider.odds.loseodds}" type="percent"/>; background-color:#ff695e;">
										<div class="progress">${fifa.award.assistprovider.odds.lose} 패</div>
									</div>
									<div class="label f k r">승률 <fmt:formatNumber value="${fifa.award.assistprovider.odds.winodds}" type="percent"/></div>
								</div>
							</div>
							<div class="ui segment f k r">
								<div class="ui header f k r">
									<a class="link f k r" href="${path}/fifa/detail.ll?role=Player&name=${fifa.award.assistprovider.name}">
										Information
									</a>
								</div>
								<table class="ui center aligned table">
									<tr>
										<th>Birth</th>
										<td>${fifa.award.assistprovider.birth}</td>
									</tr>
									<tr>
										<th>Physical</th>
										<td>${fifa.award.assistprovider.height} cm ${fifa.award.assistprovider.weight} kg</td>
									</tr>
									<tr>
										<th>Position</th>
										<td><i class="dot circle outline ${fifa.award.assistprovider.icon} icon"></i>${fifa.award.assistprovider.position}</td>
									</tr>
								</table>
							</div>
							<c:if test="${fifa.award.assistprovider.history ne null}">
								<div class="ui segment f k r">
									<div class="ui header f k r">
										<a class="link f k r" href="${path}/fifa/award.ll?role=Player&name=${fifa.award.assistprovider.name}">
											History
										</a>
									</div>
									<div class="ui four statistics">
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.assistprovider.countchampion}</h2></div>
											<div class="label"><h5 class="f k r">Champion</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.assistprovider.countballondor}</h2></div>
											<div class="label"><h5 class="f k r">Ballon Dor</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.assistprovider.countgoalscorer}</h2></div>
											<div class="label"><h5 class="f k r">Goal Scorer</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r">${fifa.award.assistprovider.countassistprovider}</h2></div>
											<div class="label"><h5 class="f k r">Assist Provider</h5></div>
										</div>
									</div>
									<div class="ui segment f k r">
										<div class="ui middle aligned relaxed divided list">
											<c:forEach var="history" items="${fifa.award.assistprovider.history.split(',')}" varStatus="idx">
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
					</div>
					<div class="five wide column">
						<div class="ui center aligned black segment">
							<h3 class="f k r">년도별 수상자</h3>
							<div class="ui divider"></div>
							<table class="ui striped center aligned table">
								<c:forEach var="award" items="${fifa.award.assistprovider.list}" varStatus="idx">
									<c:if test="${!empty award.name}">
										<c:if test="${fifa.award.season eq award.season}">
											<thead>
												<tr class="f k r">
													<th style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></th>
													<th><a class="link" href="">${award.name}</th>
													<th><a class="link" href="${path}/league/review.ll?season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></th>
												</tr>
											</thead>
										</c:if>
										<c:if test="${fifa.award.season ne award.season}">
											<tr>
												<td style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></td>
												<td><a class="link" href="${path}/fifa/awards.ll?role=${fifa.award.role}&award=assistprovider&season=${award.season}">${award.name}</a></td>
												<td><a class="link" href="${path}/league/review.ll?season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></td>
											</tr>
										</c:if>
									</c:if>
								</c:forEach>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</c:if>
</section>
<script>
$(function(){
	var role = '${fifa.award.role}'
	if (role == 'Club'){
		$('.rail.item.awards.club').addClass('active')
		
	}
	if (role == 'Manager'){
		$('.rail.item.awards.manager').addClass('active')
	}
	if (role == 'Player'){
		$('.rail.item.awards.player').addClass('active')
	}
})
</script>
<jsp:include page="../include/footer.jsp"/>