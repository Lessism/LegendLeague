<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="league"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r">${league.season}/${f:substring(league.season+1, 2, 4)} Season Ranking</h1>
	<div class="ui divider"></div>
	<div class="ui black segment">
		<div class="ui center aligned container"><h3 class="f k r">순위표</h3></div>
		<div class="ui divider"></div>
		<c:if test="${empty league.ranking.club}">
			<div class="ui center aligned container f k r">지금은 Free Season 입니다.</div>
		</c:if>
		<c:if test="${!empty league.ranking.club}">
			<div class="ui pointing secondary two item menu">
				<a class="tabular active item f k r" data-tab="club">팀 순위</a>
				<c:if test="${!empty league.ranking.toprating}">
					<a class="tabular item f k r" data-tab="player">개인 순위</a>
				</c:if>
			</div>
			<div class="ui tab segment active" data-tab="club">
				<c:if test="${!empty league.ranking.toprating}">
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
							<th>득점</th>
							<th>실점</th>
							<th>득실차</th>
							<th>승점</th>
						</tr>
					</thead>
					<tbody>
						<c:forEach var="club" items="${league.ranking.club}" varStatus="idx">
							<tr>
								<td style="width:10%; border-right:1px solid rgba(34,36,38,.1)">${idx.count}</td>
								<td style="width:10%"><img class="ui rounded fluid mini image" src="${path}/image.ll?role=Club&name=${club.club}"></td>
								<td style="width:25%">${club.club}</td>
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
			<c:if test="${!empty league.ranking.toprating}">
				<div class="ui tab segment" data-tab="player">
					<div class="ui horizontal segments">
						<div class="ui black segment items">
							<div class="ui center aligned dividing header f k r">평점</div>
							<div class="item">
								<div class="image" style="max-width:125px; max-height:100px;">
									<img src="${path}/image.ll?role=Player&name=${league.ranking.toprating[0].player}" style="height:100px; border-radius:10px;">
								</div>
								<div class="middle aligned content">
									<div class="header">${league.ranking.toprating[0].player}</div>
									<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.ranking.toprating[0].club}"> ${league.ranking.toprating[0].club}</div>
									<div class="description" style="text-align:right;"><h3>
										<c:if test="${league.ranking.toprating[0].toprating < 100}">${f:substring(league.ranking.toprating[0].toprating, 0, 1)}.${f:substring(league.ranking.toprating[0].toprating, 1, 2)} 점</c:if>
										<c:if test="${league.ranking.toprating[0].toprating > 99}">10.0 점</c:if></h3>
									</div>
								</div>
							</div>
							<div class="ui divider"></div>
							<div class="ui middle aligned divided list">
								<c:forEach var="rating" items="${league.ranking.toprating}" begin="1" varStatus="idx">
									<div class="item" style="vertical-align:middle;">
										<div class="right floated content">
											<c:if test="${rating.toprating < 100}">${f:substring(rating.toprating, 0, 1)}.${f:substring(rating.toprating, 1, 2)} 점</c:if>
											<c:if test="${rating.toprating > 99}">10.0 점</c:if>
										</div>
										<img class="ui avatar image" src="${path}/image.ll?role=Player&name=${rating.player}">
										<div class="content">
											<div class="header">${rating.player}</div>
											<div class="description">
												<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${rating.club}">${rating.club}
											</div>
										</div>
									</div>
								</c:forEach>
							</div>
						</div>
						<c:if test="${!empty league.ranking.goalscorer}">
							<div class="ui black segment items">
								<div class="ui center aligned dividing header f k r">득점</div>
								<div class="item">
									<div class="image" style="max-width:125px; max-height:100px;">
										<img src="${path}/image.ll?role=Player&name=${league.ranking.goalscorer[0].player}" style="height:100px; border-radius:10px;">
									</div>
									<div class="middle aligned content">
										<div class="header">${league.ranking.goalscorer[0].player}</div>
										<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.ranking.goalscorer[0].club}"> ${league.ranking.goalscorer[0].club}</div>
										<div class="description" style="text-align:right;"><h3>${league.ranking.goalscorer[0].goalscorer} 골</h3></div>
									</div>
								</div>
								<div class="ui divider"></div>
								<div class="ui middle aligned divided list">
									<c:forEach var="goal" items="${league.ranking.goalscorer}" begin="1">
										<div class="item">
											<div class="right floated content">${goal.goalscorer} 골</div>
											<img class="ui avatar image" src="${path}/image.ll?role=Player&name=${goal.player}">
											<div class="content">
												<div class="header">${goal.player}</div>
												<div class="description">
													<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${goal.club}">${goal.club}
												</div>
											</div>
										</div>
									</c:forEach>
								</div>
							</div>
						</c:if>
						<c:if test="${!empty league.ranking.assistprovider}">
							<div class="ui black segment items">
								<div class="ui center aligned dividing header f k r">도움</div>
								<div class="item">
									<div class="image" style="max-width:125px; max-height:100px;">
										<img src="${path}/image.ll?role=Player&name=${league.ranking.assistprovider[0].player}" style="height:100px; border-radius:10px;">
									</div>
									<div class="middle aligned content">
										<div class="header">${league.ranking.assistprovider[0].player}</div>
										<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.ranking.assistprovider[0].club}"> ${league.ranking.assistprovider[0].club}</div>
										<div class="description" style="text-align:right;"><h3>${league.ranking.assistprovider[0].assistprovider} 어시스트</h3></div>
									</div>
								</div>
								<div class="ui divider"></div>
								<div class="ui middle aligned divided list">
									<c:forEach var="assist" items="${league.ranking.assistprovider}" begin="1">
										<div class="item">
											<div class="right floated content">${assist.assistprovider} 어시스트</div>
											<img class="ui avatar image" src="${path}/image.ll?role=Player&name=${assist.player}">
											<div class="content">
												<div class="header">${assist.player}</div>
												<div class="description">
													<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${assist.club}">${assist.club}
												</div>
											</div>
										</div>
									</c:forEach>
								</div>
							</div>
						</c:if>
		 			</div>
				</div>
			</c:if>
		</c:if>
	</div>
</section>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
$(function(){
	$.get('/legendleague/rank', function(chart){
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