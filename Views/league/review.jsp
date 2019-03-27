<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="league"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r" style="margin-top:24px">
		<a class="link f k r" href="${path}/league.ll">
			Legend League
		</a>
	</h1>
	<h4 class="f k r">${league.review.season.season}/${f:substring(league.review.season.season+1, 2, 4)} Season Review</h4>
	<div class="ui divider"></div>
	<div class="ui black segment">
		<div class="ui pointing secondary two item menu">
			<a class="tabular active item f k r" data-tab="season">Season</a>
			<a class="tabular item f k r" data-tab="round">Round</a>
		</div>
		<div class="ui tab segment active" data-tab="season">
			<div class="ui horizontal black segments">
				<c:if test="${!empty league.review.season.champion}">
					<div class="ui center aligned card segment">
						<div class="content">
							<h3 class="f k r">
								<a class="link f k r" href="${path}/fifa/awards.ll?role=Club&award=champion&season=${league.review.season.season}">
									Champion
								</a>
							</h3>
							<div class="ui divider"></div>
						</div>
						<div>
							<a class="image" href="${path}/fifa/profile.ll?role=Club&name=${league.review.season.champion.name}">
								<img class="ui centered rounded image" src="${path}/image.ll?no=${league.review.season.champion.emblem}" style="max-height:150px; max-width:150px">
							</a>
						</div>
						<div class="ui divider"></div>
						<div class="ui header f k r">
							<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.review.season.champion.name}">
								${league.review.season.champion.name}
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="${path}/fifa/country.ll?country=${league.review.season.champion.country}">
								<i class="${f:toLowerCase(league.review.season.champion.country)} flag"></i>
								${league.review.season.champion.country}
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${league.review.season.champion.name}">
								<img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=${league.review.season.champion.stadium}" style="max-width:20px; max-height:20px;">
								${league.review.season.champion.stadium}
							</a>
						</div>
						<div class="ui segment" style="border:none;">
							<div class="ui active inverted black progress">
								<div class="bar" style="width:${league.review.season.champion.ovr}%;">
									<div class="progress">${league.review.season.champion.ovr}</div>
								</div>
								<div class="label f k r" style="color:black">OVR</div>
							</div>
						</div>
					</div>
				</c:if>
				<c:if test="${!empty league.review.season.manager}">
					<div class="ui center aligned card segment">
						<div class="content">
							<h3 class="f k r">
								<a class="link f k r" href="${path}/fifa/awards.ll?role=Manager&award=manager&season=${league.review.season.season}">
									FIFA World Manager
								</a>
							</h3>
							<div class="ui divider"></div>
						</div>
						<div>
							<a class="image" href="${path}/fifa/profile.ll?role=Manager&name=${league.review.season.manager.name}">
								<img class="ui centered rounded image" src="${path}/image.ll?no=${league.review.season.manager.profile}" style="height:150px; width:150px">
							</a>
						</div>
						<div class="ui divider"></div>
						<div class="ui header f k r">
							<a class="link f k r" href="${path}/fifa/profile.ll?role=Manager&name=${league.review.season.manager.name}">
								${league.review.season.manager.name}
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="${path}/fifa/country.ll?country=${league.review.season.manager.country}">
								<i class="${f:toLowerCase(league.review.season.manager.country)} flag"></i>
								${league.review.season.manager.country}
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.review.season.manager.club}">
								<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.review.season.manager.club}" style="max-width:20px; max-height:20px;">
								${league.review.season.manager.club}
							</a>
						</div>
						<div class="ui segment" style="border:none;">
							<div class="ui active inverted black progress">
								<div class="bar" style="width:${league.review.season.manager.ovr}%;">
									<div class="progress">${league.review.season.manager.ovr}</div>
								</div>
								<div class="label f k r" style="color:black">OVR</div>
							</div>
						</div>
					</div>
				</c:if>
				<c:if test="${!empty league.review.season.ballondor}">
					<div class="ui center aligned card segment">
						<div class="content">
							<h3 class="f k r">
								<a class="link f k r" href="${path}/fifa/awards.ll?role=Player&award=ballondor&season=${league.review.season.season}">
									Ballon Dor
								</a>
							</h3>
							<div class="ui divider"></div>
						</div>
						<div>
							<a class="image" href="${path}/fifa/profile.ll?role=Player&name=${league.review.season.ballondor.name}">
								<img class="ui centered rounded image" src="${path}/image.ll?no=${league.review.season.ballondor.profile}" style="height:150px; width:150px">
							</a>
						</div>
						<div class="ui divider"></div>
						<div class="ui header f k r">
							<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${league.review.season.ballondor.name}">
								${league.review.season.ballondor.name}
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="${path}/fifa/country.ll?country=${league.review.season.ballondor.country}">
								<i class="${f:toLowerCase(league.review.season.ballondor.country)} flag"></i>
								${league.review.season.ballondor.country}
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.review.season.ballondor.club}">
								<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.review.season.ballondor.club}" style="max-width:20px; max-height:20px;">
								${league.review.season.ballondor.club}
							</a>
						</div>
						<div class="ui segment" style="border:none;">
							<div class="ui active inverted ${league.review.season.ballondor.icon} progress" style="margin-bottom:0;bottom:0;">
								<div class="bar" style="width:${league.review.season.ballondor.ovr}%;">
									<div class="progress"><div class="ui meta f k r">${league.review.season.ballondor.position}<i class="dot circle outline ${league.review.season.ballondor.icon} icon"></i>${league.review.season.ballondor.ovr}</div></div>
								</div>
							</div>
						</div>
					</div>
				</c:if>
				<c:if test="${!empty league.review.season.goalscorer}">
					<div class="ui center aligned card segment">
						<div class="content">
							<h3 class="f k r">
								<a class="link f k r" href="${path}/fifa/awards.ll?role=Player&award=goalscorer&season=${league.review.season.season}">
									Goal Scorer
								</a>
							</h3>
							<div class="ui divider"></div>
						</div>
						<div>
							<a class="image" href="${path}/fifa/profile.ll?role=Player&name=${league.review.season.goalscorer.name}">
								<img class="ui centered rounded image" src="${path}/image.ll?no=${league.review.season.goalscorer.profile}" style="height:150px; width:150px">
							</a>
						</div>
						<div class="ui divider"></div>
						<div class="ui header f k r">
							<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${league.review.season.goalscorer.name}">
								${league.review.season.goalscorer.name}
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="${path}/fifa/country.ll?country=${league.review.season.goalscorer.country}">
								<i class="${f:toLowerCase(league.review.season.goalscorer.country)} flag"></i>
								${league.review.season.goalscorer.country}
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.review.season.goalscorer.club}">
								<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.review.season.goalscorer.club}" style="max-width:20px; max-height:20px;">
								${league.review.season.goalscorer.club}
							</a>
						</div>
						<div class="ui segment" style="border:none;">
							<div class="ui active inverted ${league.review.season.goalscorer.icon} progress" style="margin-bottom:0;bottom:0;">
								<div class="bar" style="width:${league.review.season.goalscorer.ovr}%;">
									<div class="progress"><div class="ui meta f k r">${league.review.season.goalscorer.position}<i class="dot circle outline ${league.review.season.goalscorer.icon} icon"></i>${league.review.season.goalscorer.ovr}</div></div>
								</div>
							</div>
						</div>
					</div>
				</c:if>
				<c:if test="${!empty league.review.season.assistprovider}">
					<div class="ui center aligned card segment">
						<div class="content">
							<h3 class="f k r">
								<a class="link f k r" href="${path}/fifa/awards.ll?role=Player&award=assistprovider&season=${league.review.season.season}">
									Assist Provider
								</a>
							</h3>
							<div class="ui divider"></div>
						</div>
						<div>
							<a class="image" href="${path}/fifa/profile.ll?role=Player&name=${league.review.season.assistprovider.name}">
								<img class="ui centered rounded image" src="${path}/image.ll?no=${league.review.season.assistprovider.profile}" style="height:150px; width:150px">
							</a>
						</div>
						<div class="ui divider"></div>
						<div class="ui header f k r">
							<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${league.review.season.assistprovider.name}">
								${league.review.season.assistprovider.name}
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="${path}/fifa/country.ll?country=${league.review.season.assistprovider.country}">
								<i class="${f:toLowerCase(league.review.season.assistprovider.country)} flag"></i>
								${league.review.season.assistprovider.country}
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.review.season.assistprovider.club}">
								<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.review.season.assistprovider.club}" style="max-width:20px; max-height:20px;">
								${league.review.season.assistprovider.club}
							</a>
						</div>
						<div class="ui segment" style="border:none;">
							<div class="ui active inverted ${league.review.season.assistprovider.icon} progress" style="margin-bottom:0;bottom:0;">
								<div class="bar" style="width:${league.review.season.assistprovider.ovr}%;">
									<div class="progress"><div class="ui meta f k r">${league.review.season.assistprovider.position}<i class="dot circle outline ${league.review.season.assistprovider.icon} icon"></i>${league.review.season.assistprovider.ovr}</div></div>
								</div>
							</div>
						</div>
					</div>
				</c:if>
			</div>
			<div class="ui grid segment">
				<div class="five wide column">
					<div class="ui center aligned black segment">
						<h3 class="f k r">Roster</h3>
						<div class="ui divider"></div>
						<table class="ui striped center aligned table">
							<thead>
								<tr class="ui inverted center aligned table f k r">
									<th colspan="2">Club</th>
								</tr>
							</thead>
							<tbody>
								<c:forEach var="club" items="${league.review.season.roster}" varStatus="idx">
									<tr>
										<td style="width:25%">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${club}">
												<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${club}">
											</a>
										</td>
										<td>
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${club}">
												${club}
											</a>
										</td>
									</tr>
								</c:forEach>
							</tbody>
						</table>
					</div>
				</div>
				<div class="eleven wide column">
					<div class="ui center aligned black segment">
						<c:if test="${!empty league.review.ranking}">
						<h3 class="f k r">최종 순위</h3>
						<div class="ui divider"></div>
							<div class="ui segment">
								<div id="rankchart"></div>
							</div>
						</c:if>
						<table class="ui striped center aligned table">
							<thead>
								<tr class="ui inverted center aligned table f k r">
									<th colspan="2">순위</th>
									<th>클럽</th>
									<th>경기</th>
									<th>승</th>
									<th>무</th>
									<th>패</th>
									<th>득</th>
									<th>실</th>
									<th>득실차</th>
									<th>승점</th>
								</tr>
							</thead>
							<tbody>
								<c:forEach var="club" items="${league.review.ranking}" varStatus="idx">
									<tr>
										<td style="width:10%; border-right:1px solid rgba(34,36,38,.1)">${idx.count}</td>
										<td style="width:10%">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${club.club}">
												<img class="ui rounded fluid mini image" src="${path}/image.ll?role=Club&name=${club.club}">
											</a>
										</td>
										<td style="width:25%">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${club.club}">
												${club.club}
											</a>
										</td>
										<td style="width:10%">${club.game}</td>
										<td style="width:5%">${club.win}</td>
										<td style="width:5%">${club.draw}</td>
										<td style="width:5%">${club.lose}</td>
										<td style="width:5%">${club.goalfor}</td>
										<td style="width:5%">${club.goalagainst}</td>
										<td style="width:10%">${club.goalfor - club.goalagainst}</td>
										<td style="width:10%">${club.point}</td>
									</tr>
								</c:forEach>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="ui tab segment" data-tab="round">
			<c:if test="${!empty league.review.season.round}">
				<c:forEach begin="0" end="${league.review.season.round}" varStatus="idx" step="10">
					<div class="ui tabular ten item menu">
						<c:forEach begin="0" end="9" varStatus="indx">
							<c:if test="${league.review.season.round >= idx.index+indx.count}">
								<a class="tabular item f k r ${league.review.season.round == idx.index+indx.count ? 'active' : ''}" data-tab="round${idx.index+indx.count}">${idx.index+indx.count} Round</a>
							</c:if>
						</c:forEach>
					</div>
				</c:forEach>
				<c:forEach var="round" items="${league.review.round}">
					<c:forEach var="match" items="${round}" varStatus="idx">
						<c:if test="${idx.index == 0}">
							<div class="ui center aligned black segment tab ${league.review.season.round == match.round ? 'active' : ''}" data-tab="round${match.round}">
								<h3 class="f k r">${match.round} Round</h3>
						</c:if>
								<div class="ui segment">
									<div class="ui middle aligned grid">
										<div class="one wide column">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${f:split(match.versus, '_')[0]}">
												<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${f:split(match.versus, '_')[0]}">
											</a>
										</div>
										<div class="left floated right aligned five wide column">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${f:split(match.versus, '_')[0]}">
												${f:split(match.versus, '_')[0]}
											</a>
										</div>
										<div class="ui center aligned four wide column">
											<span class="f k r">
												${match.score}
											</span>
										</div>
										<div class="right floated left aligned five wide column">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${f:split(match.versus, '_')[1]}">
												${f:split(match.versus, '_')[1]}
											</a>
										</div>
										<div class="one wide column">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${f:split(match.versus, '_')[1]}">
												<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${f:split(match.versus, '_')[1]}">
											</a>
										</div>
									</div>
									<c:if test="${!empty match.goal}">
										<div class="ui grid">
											<div class="sixteen wide column" style="padding:5px"><div class="ui fitted divider"></div></div>
											<div class="right aligned seven wide column">
												<c:forEach var="goal" items="${match.goal}">
													<div>
														<a class="link" href="${path}/fifa/profile.ll?role=Player&name=${f:split(match.versus,'_')[0] eq goal.club ? goal.player : ''}">
															${f:split(match.versus,'_')[0] eq goal.club ? goal.player : ''}
														</a>
													</div>
												</c:forEach>
											</div>
											<div class="center aligned two wide column">
												<c:forEach var="goal" items="${match.goal}" varStatus="idx">
													<c:if test="${idx.count <= (f:split(match.score, ' : ')[0] >= f:split(match.score, ' : ')[1] ? f:split(match.score, ' : ')[0] : f:split(match.score, ' : ')[1])}">
														<div><i class="futbol icon"></i></div>
													</c:if>
												</c:forEach>
											</div>
											<div class="left aligned seven wide column">
												<c:forEach var="goal" items="${match.goal}">
													<div>
														<a class="link" href="${path}/fifa/profile.ll?role=Player&name=${f:split(match.versus,'_')[1] eq goal.club ? goal.player : ''}">
															${f:split(match.versus,'_')[1] eq goal.club ? goal.player : ''}
														</a>
													</div>
												</c:forEach>
											</div>
										</div>
									</c:if>
								</div>
					</c:forEach>
							</div>
				</c:forEach>
			</c:if>
		</div>
	</div>
</section>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
$(function(){
	$.get('/legendleague/rank?season=${league.review.season.season}', function(chart){
		if (!jQuery.isEmptyObject(chart)){
			var rankchart = new Morris.Line({
				element		: 'rankchart',
				xkey		: 'round',
				ykeys		: chart.labels,
				labels		: chart.labels,
				postUnits	: ' p',
				hideHover	: true,
				parseTime	: false,
				data		: chart.data
			})
		}
	}, 'json')
})
</script>
<jsp:include page="../include/footer.jsp"/>