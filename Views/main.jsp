<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="include/header.jsp" %>
<c:set var="seasonround" value="Season ${league.round} Round"/>
<section class="ui black segment container">
	<div class="ui grid">
		<div class="twelve wide column">
			<h1 style="display:inline-block;">Legend League</h1>
			<h3 style="display:block;">${league.season}/${f:substring(league.season+1, 2, 4)} ${!empty league.round ? seasonround : 'Free Season'}</h3>
		</div>
		<div class="four wide column" style="display:flex; align-items:center;">
			<input class="ui fluid black button f k r ${!empty league.round ? 'playing' : 'opening'}" id="${!empty league.round ? 'playing' : 'opening'}" type="button" value="${!empty league.round ? '진행' : '개막'}" style="height:75%;">
		</div>
	</div>
	<hr>
	<div class="ui grid" id="rank">
		<c:if test="${empty league.round}">
			<div class="ten wide column">
				<table class="ui striped center aligned table">
					<thead>
						<tr class="ui inverted center aligned table f k r">
							<th colspan="2">예상순위</th>
							<th>클럽</th>
							<th>OVR</th>
						</tr>
					</thead>
					<tbody>
						<c:forEach var="club" items="${league.information}" varStatus="idx">
							<tr>
								<td style="width:5%">${idx.count}</td>
								<td style="width:10%"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${club.name}"></td>
								<td style="width:60%">${club.name}</td>
								<td style="width:25%">
									<div class="ui active inverted black progress" style="margin-bottom:0;">
										<div class="bar" style="width:${club.ovr}%;">
											<div class="progress">${club.ovr}</div>
										</div>
									</div>
								</td>
							</tr>
						</c:forEach>
					</tbody>
				</table>
			</div>
		</c:if>
		<c:if test="${!empty league.round}">
			<div class="ten wide column">
				<table class="ui striped center aligned table">
					<thead>
						<tr class="ui inverted center aligned table f k r">
							<th colspan="2">순위</th>
							<th>클럽</th>
							<th>경기</th>
							<th>승</th>
							<th>무</th>
							<th>패</th>
							<th>승점</th>
						</tr>
					</thead>
					<tbody>
						<c:forEach var="rank" items="${league.ranking}" varStatus="idx">
							<tr>
								<td style="width:10%">${idx.count}</td>
								<td style="width:10%"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${rank.club}"></td>
								<td style="width:45%">${rank.club}</td>
								<td style="width:10%">${rank.game}</td>
								<td style="width:5%">${rank.win}</td>
								<td style="width:5%">${rank.draw}</td>
								<td style="width:5%">${rank.lose}</td>
								<td style="width:10%">${rank.point}</td>
							</tr>
						</c:forEach>
					</tbody>
				</table>
			</div>
		</c:if>
		<c:if test="${empty league.score}">
			<div class="six wide column">
				<div class="ui black fluid card segment">
					<div class="ui header">
						<div class="ui center aligned black segment"><h3 class="f k r">우승후보</h3></div>
						<div><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${league.information[0].name}"></div>
						<div class="ui center aligned header f k r">${league.information[0].name}</div>
						<div class="ui center aligned meta f k r">${league.information[0].stadium}</div>
					</div>
					<div class="ui relaxed grid content">
						<div class="five wide column">
							<h5 class="ui center aligned f k r">Manager</h5>
						</div>
						<div class="eleven wide column">
							<img class="ui avatar image" src="${path}/image.ll?role=Manager&name=${league.information[0].manager}">
							${league.information[0].manager}
						</div>
						<div class="five wide column">
							<h5 class="ui center aligned f k r">Key Player</h5>
						</div>
						<div class="eleven wide column">
							<img class="ui avatar image" src="${path}/image.ll?role=Player&name=${league.information[0].keyplayer.name}">
							${league.information[0].keyplayer.name}
						</div>
					</div>
				</div>
			</div>
		</c:if>
		<c:if test="${!empty league.score}">
			<div class="ui six wide column">
				<div class="ui center aligned dividing header f k r">최고 평점</div>
					<div class="ui black segment items">
						<div class="item">
							<div class="image">
								<img src="${path}/image.ll?role=Player&name=${league.toprating[0].player}" style="max-height:100px">
							</div>
							<div class="middle aligned content">
								<div class="header">${league.toprating[0].player}</div>
								<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.toprating[0].club}"> ${league.toprating[0].club}</div>
								<div class="description" style="text-align:right;"><h3>
									<c:if test="${league.toprating[0].toprating < 100}">${f:substring(league.toprating[0].toprating, 0, 1)}.${f:substring(league.toprating[0].toprating, 1, 2)} 점</c:if>
									<c:if test="${league.toprating[0].toprating > 99}">10.0 점</c:if></h3>
								</div>
							</div>
						</div>
					</div>
				<div class="ui middle aligned divided list">
					<c:forEach var="rating" items="${league.toprating}" begin="1">
						<div class="item">
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
				<c:if test="${!empty league.goalscorer}">
					<div class="ui center aligned dividing header f k r">최다 득점</div>
						<div class="ui black segment items">
							<div class="item">
								<div class="image">
									<img src="${path}/image.ll?role=Player&name=${league.goalscorer[0].player}" style="max-height:100px">
								</div>
								<div class="middle aligned content">
									<div class="header">${league.goalscorer[0].player}</div>
									<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.goalscorer[0].club}"> ${league.goalscorer[0].club}</div>
									<div class="description" style="text-align:right;"><h3>${league.goalscorer[0].goalscorer} 골</h3></div>
								</div>
							</div>
						</div>
					<div class="ui middle aligned divided list">
						<c:forEach var="goal" items="${league.goalscorer}" begin="1">
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
				</c:if>
				<c:if test="${!empty league.assistprovider}">
					<div class="ui center aligned dividing header f k r">최다 어시스트</div>
						<div class="ui black segment items">
							<div class="item">
								<div class="image">
									<img src="${path}/image.ll?role=Player&name=${league.assistprovider[0].player}" style="max-height:100px;">
								</div>
								<div class="middle aligned content">
									<div class="header">${league.assistprovider[0].player}</div>
									<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.assistprovider[0].club}"> ${league.assistprovider[0].club}</div>
									<div class="description" style="text-align:right;"><h3>${league.assistprovider[0].assistprovider} 어시스트</h3></div>
								</div>
							</div>
						</div>
					<div class="ui middle aligned divided list">
						<c:forEach var="assist" items="${league.assistprovider}" begin="1">
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
				</c:if>
 			</div>
		</c:if>
	</div>
	<c:if test="${empty league.round}">
		<div class="ui transition hidden center aligned black segment" id="openingSection">
			<h3 class="f k r">${league.season}/${f:substring(league.season+1, 2, 4)} Season</h3>
			<div class="ui centered grid segment">
				<c:forEach var="club" items="${league.information}">
					<div class="column">
						<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${club.name}">
					</div>
				</c:forEach>
			</div>
			<div class="ui container f k r">
				총 ${f:length(league.information)} 개의 팀이 ${(f:length(league.information)-1)*2} round 동안 경기를 치루게 됩니다. 
			</div>
			<div class="ui center aligned container" style="margin-top:10px">
				<input class="ui black button f k r" id="start" type="button" value="시작">
				<input class="ui button f k r opening" type="button" value="취소">
			</div>
		</div>
	</c:if>
	<c:if test="${!empty league.round}">
		<div class="ui transition hidden center aligned black segment" id="matchSection">
			<h3 class="f k r">${league.round} Round</h3>
				<c:forEach var="match" items="${league.match}">
					<div class="ui middle aligned centered grid segment">
						<div class="one wide column"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${f:split(match.versus,'_')[0]}"></div>
						<div class="left floated right aligned five wide column"><span class="f k r">${f:split(match.versus,'_')[0]}</span></div>
						<div class="center aligned four wide column" ><span class="versus f k r ${f:replace(match.versus, ' ', '_')}">VS</span></div>
						<div class="right floated left aligned five wide column"><span class="f k r">${f:split(match.versus,'_')[1]}</span></div>
						<div class="one wide column"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${f:split(match.versus,'_')[1]}"></div>
					</div>
				</c:forEach>
			<div class="ui center aligned container" style="margin-top:10px">
				<button class="ui black button f k r" id="match">경기 시작</button>
				<input class="ui button f k r playing" type="button" value="취소">
			</div>
		</div>
	</c:if>
</section>
<script>

$(function(){
	
	$('.opening').click(function(){
		if ($('#rank').hasClass('hidden')) {
			$('#openingSection').transition({
				animation  : 'fade up',
				onComplete : function(){
					$('#rank').transition('fade up')
				}
			})
		} else{
			$('#rank').transition({
				animation  : 'fade up',
				onComplete : function(){
					$('#openingSection').transition('fade up')
				}
			})
		}
	})
	
	$('.playing').click(function(){
		if ($('#rank').hasClass('hidden')) {
			$('#matchSection').transition({
				animation  : 'fade left',
				onComplete : function(){
					$('#rank').transition('fade right')
				}
			})
		} else {
			$('#rank').transition({
				animation  : 'fade right',
				onComplete : function(){
					$('#matchSection').transition('fade left')
				}
			})
		}
	})
	
	$('#start').click(function(){
		$.post('opening', {season : '${league.season}', roster : '${league.roster}'}, function(data){},'json')
		window.location.reload()
	})
	
	$('#match').click(function(){
		$(this).addClass('loading')
		$.post('matching', {season : '${league.season}', round : '${league.round}'}, function(data){
			$('.versus').transition({
				animation  : 'horizontal flip',
				onComplete : function(){
					for (var i = 0; i < data.result.length; i++){
						$('.'+data.result[i].versus.replace(/ /gi, '_')).text(data.result[i].score)
					}
				}
			})
			$('.versus').transition('horizontal flip')
			$('#match').removeClass('loading')
		}, 'json')
	})
	
})

</script>
<jsp:include page="include/footer.jsp"/>