<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="league"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r">Season Ranking</h1>
	<div class="ui divider"></div>
	<div class="ui black segment">
		<div class="ui center aligned container"><h3 class="f k r">순위표</h3></div>
		<div class="ui divider"></div>
		<div class="ui pointing secondary two item menu">
			<a class="tabular active item f k r" data-tab="club">팀 순위</a>
			<a class="tabular item f k r" data-tab="player">개인 순위</a>
		</div>
		<div class="ui tab segment active" data-tab="club">
			<div class="ui grid">
				<div class="eight wide column">
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
							<c:forEach var="club" items="${ranking.club}" varStatus="idx">
								<tr>
									<td style="width:10%; border-right:1px solid rgba(34,36,38,.1)">${idx.count}</td>
									<td style="width:10%"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${club.club}"></td>
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
				<div class="eight wide column">
					<div id="rankchart"></div>
				</div>
			</div>
		</div>
		<div class="ui tab segment" data-tab="player">
			<div class="ui horizontal segments">
				<c:if test="${!empty ranking.toprating}">
					<div class="ui black segment items">
						<div class="ui center aligned dividing header f k r">평점</div>
						<div class="item">
							<div class="image" style="max-width:125px; max-height:100px;">
								<img src="${path}/image.ll?role=Player&name=${ranking.toprating[0].player}" style="height:100px; border-radius:10px;">
							</div>
							<div class="middle aligned content">
								<div class="header">${ranking.toprating[0].player}</div>
								<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${ranking.toprating[0].club}"> ${ranking.toprating[0].club}</div>
								<div class="description" style="text-align:right;"><h3>
									<c:if test="${ranking.toprating[0].toprating < 100}">${f:substring(ranking.toprating[0].toprating, 0, 1)}.${f:substring(ranking.toprating[0].toprating, 1, 2)} 점</c:if>
									<c:if test="${ranking.toprating[0].toprating > 99}">10.0 점</c:if></h3>
								</div>
							</div>
						</div>
						<div class="ui divider"></div>
						<div class="ui middle aligned divided list">
							<c:forEach var="rating" items="${ranking.toprating}" begin="1" varStatus="idx">
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
				</c:if>
				<c:if test="${!empty ranking.goalscorer}">
					<div class="ui black segment items">
						<div class="ui center aligned dividing header f k r">득점</div>
						<div class="item">
							<div class="image" style="max-width:125px; max-height:100px;">
								<img src="${path}/image.ll?role=Player&name=${ranking.goalscorer[0].player}" style="height:100px; border-radius:10px;">
							</div>
							<div class="middle aligned content">
								<div class="header">${ranking.goalscorer[0].player}</div>
								<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${ranking.goalscorer[0].club}"> ${ranking.goalscorer[0].club}</div>
								<div class="description" style="text-align:right;"><h3>${ranking.goalscorer[0].goalscorer} 골</h3></div>
							</div>
						</div>
						<div class="ui divider"></div>
						<div class="ui middle aligned divided list">
							<c:forEach var="goal" items="${ranking.goalscorer}" begin="1">
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
				<c:if test="${!empty ranking.assistprovider}">
					<div class="ui black segment items">
						<div class="ui center aligned dividing header f k r">도움</div>
						<div class="item">
							<div class="image" style="max-width:125px; max-height:100px;">
								<img src="${path}/image.ll?role=Player&name=${ranking.assistprovider[0].player}" style="height:100px; border-radius:10px;">
							</div>
							<div class="middle aligned content">
								<div class="header">${ranking.assistprovider[0].player}</div>
								<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${ranking.assistprovider[0].club}"> ${ranking.assistprovider[0].club}</div>
								<div class="description" style="text-align:right;"><h3>${ranking.assistprovider[0].assistprovider} 어시스트</h3></div>
							</div>
						</div>
						<div class="ui divider"></div>
						<div class="ui middle aligned divided list">
							<c:forEach var="assist" items="${ranking.assistprovider}" begin="1">
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
	</div>
</section>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>

new Morris.Line({
	element		: 'rankchart',
	xkey		: 'round',
	ykeys		: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
	postUnits	: ' p',
	labels		: ['RealMadrid', 'Barcelona', 'Manchester United', 'Bayern Munchen', 'a', 'b', 'c', 'd', 'e', 'f'],
	hideHover	: true,
	parseTime	: false,
	data		: [
		{round : 1, 1 : 3, 2 : 1, 3 : 1, 4 : 1, 5 : 1, 6 : 1, 7 : 3, 8 : 1, 9 : 0, 10 : 3},
		{round : 2, 1 : 6, 2 : 2, 3 : 3, 4 : 4, 5 : 2, 6 : 4, 7 : 6, 8 : 1, 9 : 3, 10 : 3},
		{round : 3, 1 : 7, 2 : 5, 3 : 4, 4 : 7, 5 : 5, 6 : 5, 7 : 9, 8 : 4, 9 : 3, 10 : 3},
		{round : 4, 1 : 8, 2 : 6, 3 : 5, 4 : 10, 5 : 8, 6 : 8, 7 : 9, 8 : 7, 9 : 6, 10 : 4},
		{round : 5, 1 : 11, 2 : 9, 3 : 6, 4 : 13, 5 : 11, 6 : 9, 7 : 9, 8 : 10, 9 : 6, 10 : 5},
		{round : 1, 1 : 14, 2 : 10, 3 : 11, 4 : 21, 5 : 21, 6 : 11, 7 : 3, 8 : 1, 9 : 0, 10 : 3},
		{round : 2, 1 : 15, 2 : 12, 3 : 13, 4 : 24, 5 : 22, 6 : 14, 7 : 6, 8 : 1, 9 : 3, 10 : 3},
		{round : 3, 1 : 16, 2 : 15, 3 : 14, 4 : 27, 5 : 25, 6 : 15, 7 : 9, 8 : 4, 9 : 3, 10 : 3},
		{round : 4, 1 : 19, 2 : 16, 3 : 15, 4 : 30, 5 : 28, 6 : 18, 7 : 9, 8 : 7, 9 : 6, 10 : 4},
		{round : 5, 1 : 20, 2 : 19, 3 : 16, 4 : 33, 5 : 31, 6 : 19, 7 : 9, 8 : 10, 9 : 6, 10 : 5},
		{round : 1, 1 : 23, 2 : 21, 3 : 21, 4 : 31, 5 : 31, 6 : 21, 7 : 3, 8 : 1, 9 : 0, 10 : 3},
		{round : 2, 1 : 26, 2 : 22, 3 : 23, 4 : 34, 5 : 32, 6 : 24, 7 : 6, 8 : 1, 9 : 3, 10 : 3},
		{round : 3, 1 : 27, 2 : 25, 3 : 24, 4 : 37, 5 : 35, 6 : 25, 7 : 9, 8 : 4, 9 : 3, 10 : 3},
		{round : 4, 1 : 28, 2 : 26, 3 : 25, 4 : 40, 5 : 38, 6 : 28, 7 : 9, 8 : 7, 9 : 6, 10 : 4},
		{round : 5, 1 : 29, 2 : 29, 3 : 26, 4 : 43, 5 : 41, 6 : 29, 7 : 9, 8 : 10, 9 : 6, 10 : 5},
		{round : 1, 1 : 32, 2 : 31, 3 : 31, 4 : 41, 5 : 41, 6 : 31, 7 : 3, 8 : 1, 9 : 0, 10 : 3},
		{round : 2, 1 : 36, 2 : 32, 3 : 33, 4 : 44, 5 : 42, 6 : 34, 7 : 6, 8 : 1, 9 : 3, 10 : 3},
		{round : 3, 1 : 37, 2 : 35, 3 : 34, 4 : 47, 5 : 45, 6 : 35, 7 : 9, 8 : 4, 9 : 3, 10 : 3},
		{round : 4, 1 : 38, 2 : 36, 3 : 35, 4 : 50, 5 : 48, 6 : 38, 7 : 9, 8 : 7, 9 : 6, 10 : 4},
		{round : 5, 1 : 41, 2 : 39, 3 : 36, 4 : 53, 5 : 51, 6 : 39, 7 : 9, 8 : 10, 9 : 6, 10 : 5},
		{round : 1, 1 : 43, 2 : 41, 3 : 41, 4 : 51, 5 : 51, 6 : 41, 7 : 3, 8 : 1, 9 : 0, 10 : 3},
		{round : 2, 1 : 46, 2 : 42, 3 : 43, 4 : 54, 5 : 52, 6 : 44, 7 : 6, 8 : 1, 9 : 3, 10 : 3},
		{round : 3, 1 : 47, 2 : 45, 3 : 44, 4 : 57, 5 : 55, 6 : 45, 7 : 9, 8 : 4, 9 : 3, 10 : 3},
		{round : 4, 1 : 48, 2 : 46, 3 : 45, 4 : 60, 5 : 58, 6 : 48, 7 : 9, 8 : 7, 9 : 6, 10 : 4},
		{round : 5, 1 : 51, 2 : 49, 3 : 46, 4 : 63, 5 : 61, 6 : 49, 7 : 9, 8 : 10, 9 : 6, 10 : 5},
		{round : 1, 1 : 53, 2 : 51, 3 : 51, 4 : 61, 5 : 61, 6 : 51, 7 : 3, 8 : 1, 9 : 0, 10 : 3},
		{round : 2, 1 : 56, 2 : 52, 3 : 53, 4 : 64, 5 : 62, 6 : 54, 7 : 6, 8 : 1, 9 : 3, 10 : 3},
		{round : 3, 1 : 57, 2 : 55, 3 : 54, 4 : 67, 5 : 65, 6 : 55, 7 : 9, 8 : 4, 9 : 3, 10 : 3},
		{round : 4, 1 : 58, 2 : 56, 3 : 55, 4 : 70, 5 : 68, 6 : 58, 7 : 9, 8 : 7, 9 : 6, 10 : 4},
		{round : 5, 1 : 61, 2 : 59, 3 : 56, 4 : 73, 5 : 71, 6 : 59, 7 : 9, 8 : 10, 9 : 6, 10 : 5},
		{round : 1, 1 : 63, 2 : 61, 3 : 61, 4 : 71, 5 : 71, 6 : 61, 7 : 3, 8 : 1, 9 : 0, 10 : 3},
		{round : 2, 1 : 66, 2 : 62, 3 : 63, 4 : 74, 5 : 72, 6 : 64, 7 : 6, 8 : 1, 9 : 3, 10 : 3},
		{round : 3, 1 : 67, 2 : 65, 3 : 64, 4 : 77, 5 : 75, 6 : 65, 7 : 9, 8 : 4, 9 : 3, 10 : 3},
		{round : 4, 1 : 68, 2 : 66, 3 : 65, 4 : 80, 5 : 78, 6 : 68, 7 : 9, 8 : 7, 9 : 6, 10 : 4},
		{round : 5, 1 : 71, 2 : 69, 3 : 66, 4 : 83, 5 : 81, 6 : 69, 7 : 9, 8 : 10, 9 : 6, 10 : 5},
		{round : 1, 1 : 73, 2 : 71, 3 : 71, 4 : 81, 5 : 81, 6 : 71, 7 : 3, 8 : 1, 9 : 0, 10 : 3},
		{round : 2, 1 : 76, 2 : 72, 3 : 73, 4 : 84, 5 : 82, 6 : 74, 7 : 6, 8 : 1, 9 : 3, 10 : 3},
		{round : 3, 1 : 77, 2 : 75, 3 : 74, 4 : 87, 5 : 85, 6 : 75, 7 : 9, 8 : 4, 9 : 3, 10 : 3},
		{round : 4, 1 : 78, 2 : 76, 3 : 75, 4 : 90, 5 : 88, 6 : 78, 7 : 9, 8 : 7, 9 : 6, 10 : 4},
		{round : 5, 1 : 76, 2 : 79, 3 : 76, 4 : 93, 5 : 91, 6 : 79, 7 : 9, 8 : 10, 9 : 6, 10 : 5}
	]
})
</script>
<jsp:include page="../include/footer.jsp"/>