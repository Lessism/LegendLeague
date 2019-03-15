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
			<c:if test="${empty league.end}">
				<input class="ui fluid black button f k r ${!empty league.round ? 'playing' : 'opening'}" type="button" value="${!empty league.round ? '진행' : '개막'}" style="height:75%;">
			</c:if>
			<c:if test="${!empty league.end}">
				<input class="ui fluid black button f k r ending" type="button" value="폐막" style="height:75%;">
			</c:if>
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
			<div class="ui six wide column segment">
				<div class="ui black segment items">
					<div class="ui center aligned dividing header f k r">최고 평점</div>
					<div class="item">
						<div class="image">
							<img src="${path}/image.ll?role=Player&name=${league.toprating[0].player}" style="height:100px">
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
					<div class="ui divider"></div>
					<div class="ui middle aligned divided list">
						<c:forEach var="rating" items="${league.toprating}" begin="1" end="3">
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
				</div>
				<c:if test="${!empty league.goalscorer}">
					<div class="ui black segment items">
						<div class="ui center aligned dividing header f k r">최다 득점</div>
						<div class="item">
							<div class="image">
								<img src="${path}/image.ll?role=Player&name=${league.goalscorer[0].player}" style="height:100px">
							</div>
							<div class="middle aligned content">
								<div class="header">${league.goalscorer[0].player}</div>
								<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.goalscorer[0].club}"> ${league.goalscorer[0].club}</div>
								<div class="description" style="text-align:right;"><h3>${league.goalscorer[0].goalscorer} 골</h3></div>
							</div>
						</div>
						<div class="ui divider"></div>
						<div class="ui middle aligned divided list">
							<c:forEach var="goal" items="${league.goalscorer}" begin="1" end="3">
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
				<c:if test="${!empty league.assistprovider}">
					<div class="ui black segment items">
						<div class="ui center aligned dividing header f k r">최다 어시스트</div>
						<div class="item">
							<div class="image">
								<img src="${path}/image.ll?role=Player&name=${league.assistprovider[0].player}" style="height:100px;">
							</div>
							<div class="middle aligned content">
								<div class="header">${league.assistprovider[0].player}</div>
								<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.assistprovider[0].club}"> ${league.assistprovider[0].club}</div>
								<div class="description" style="text-align:right;"><h3>${league.assistprovider[0].assistprovider} 어시스트</h3></div>
							</div>
						</div>
						<div class="ui divider"></div>
						<div class="ui middle aligned divided list">
							<c:forEach var="assist" items="${league.assistprovider}" begin="1" end="3">
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
				<input class="ui black button f k r" id="opening" type="button" value="시작">
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
						<div class="ui center aligned four wide column">
							<span class="versus f k r ${f:replace(match.versus, ' ', '_')}">VS</span>
							<div class="ui middle aligned centered three grid">
								<div class="row">
								<div class="right floated column ${f:replace(match.versus, ' ', '_')}">VS</div>
								<div class="column ${f:replace(match.versus, ' ', '_')}">VS</div>
								<div class="left floated column ${f:replace(match.versus, ' ', '_')}">VS</div>
								</div>
							</div>
						</div>
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
	<c:if test="${!empty league.end}">
		<div class="ui transition hidden center aligned" id="endingSection">
			<div class="ui segment">
				<div class="ui center aligned container f k r">
					${league.season}/${f:substring(league.season+1, 2, 4)} Season 이 종료되었습니다.<br>우승팀은 ${league.champion.name} 입니다.<br>
				</div>
				<div class="ui divider"></div>
				<div class="ui center aligned grid black segment">
					<div class="ui five wide column card">
						<div class="center aligned floated content" style="background-color:#545454; color:white"><h3 class="f k r">Champion</h3></div>
						<div class="ui fitted divider"></div>
						<div class="image" style="background-color:white;"><img src="${path}/image.ll?role=Club&name=${league.champion.name}"></div>
						<div class="ui center aligned content f k r" style="border-top:none;">${league.champion.name}</div>
						<div><i class="${f:toLowerCase(league.champion.country)} flag"></i>${league.champion.country}</div>
						<div><img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=${league.champion.stadium}">${league.champion.stadium}</div>
						<div class="ui divider"></div>
						<div class="ui segment">
								<div class="label f k r">${league.season}/${f:substring(league.season+1, 2, 4)} Season ${league.ranking[0].game} Round</div>
							<div class="ui active progress" data-percent="100" style="display:flex;">
								<div class="bar" style="width:${league.ranking[0].win / league.ranking[0].game * 100}%; background-color:#2ecc40;">
									<div class="progress">${league.ranking[0].win} 승</div>
								</div>
								<div class="bar" style="width:${league.ranking[0].draw / league.ranking[0].game * 100}%; background-color:#ffe21f;">
									<div class="progress">${league.ranking[0].draw} 무</div>
								</div>
								<div class="bar" style="width:${league.ranking[0].lose / league.ranking[0].game * 100}%; background-color:#ff695e;">
									<div class="progress">${league.ranking[0].lose} 패</div>
								</div>
								<div class="label f k r">승률 <fmt:formatNumber value="${league.ranking[0].win / league.ranking[0].game}" type="percent"/></div>
							</div>
						</div>
					</div>
					<div class="ui eleven wide column">
						<table class="ui table">
							<thead>
								<tr class="ui center aligned">
									<th style="border-right:1px solid rgba(34,36,38,.1)">Club</th>
									<th><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.champion.name}"></th>
									<th>${league.champion.name}</th>
									<th style="border-left:1px solid rgba(34,36,38,.1)">
										<div class="ui active inverted black progress" style="margin-bottom:0;">
											<div class="bar" style="width:${league.champion.ovr}%;">
												<div class="progress">${league.champion.ovr}</div>
											</div>
										</div>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr class="ui center aligned">
									<td style="border-right:1px solid rgba(34,36,38,.1)">Manager</td>
									<td><img class="ui avatar image" src="${path}/image.ll?role=Manager&name=${league.champion.manager.name}"></td>
									<td>${league.champion.manager.name}</td>
									<td style="border-left:1px solid rgba(34,36,38,.1)">
										<div class="ui active inverted black progress" style="margin-bottom:0;">
											<div class="bar" style="width:${league.champion.manager.ovr}%;">
												<div class="progress">${league.champion.manager.ovr}</div>
											</div>
										</div>
									</td>
								</tr>
								<c:forEach var="player" items="${league.champion.lineup}" varStatus="idx">
									<tr class="ui center aligned">
										<c:if test="${idx.index < 1}"><td rowspan="11" style="width:15%; border-right:1px solid rgba(34,36,38,.1)">Player</td></c:if>
										<td style="width:10%"><img class="ui avatar image" src="${path}/image.ll?role=Player&name=${player.name}"></td>
										<td style="width:50%">${player.name}</td>
										<td style="width:25%; border-left:1px solid rgba(34,36,38,.1)">
											<div class="ui active inverted black progress" style="margin-bottom:0;">
												<div class="bar" style="width:${player.ovr}%;">
													<div class="progress">${player.ovr}</div>
												</div>
											</div>
										</td>
									</tr>
								</c:forEach>
							</tbody>
						</table>
					</div>
				</div>
				<div class="ui horizontal segments">
					<div class="ui black segment items">
						<div class="ui center aligned dividing header f k r">Ballon Dor</div>
						<div class="item">
							<div class="image" style="max-width:125px; max-height:100px;">
								<img src="${path}/image.ll?role=Player&name=${league.toprating[0].player}" style="height:100px;">
							</div>
							<div class="middle aligned content">
								<div class="header">${league.toprating[0].player}</div>
								<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.toprating[0].club}"> ${league.toprating[0].club}</div>
								<div class="description" style="text-align:right;"><h3>${league.ranking[0].game} 경기 
									<c:if test="${league.toprating[0].toprating < 100}">${f:substring(league.toprating[0].toprating, 0, 1)}.${f:substring(league.toprating[0].toprating, 1, 2)} 점</c:if>
									<c:if test="${league.toprating[0].toprating > 99}">10.0 점</c:if></h3>
								</div>
							</div>
						</div>
						<div class="ui divider"></div>
						<div class="ui middle aligned divided list">
							<c:forEach var="rating" items="${league.toprating}" begin="1" varStatus="idx">
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
					<div class="ui black segment items">
						<div class="ui center aligned dividing header f k r">득점왕</div>
						<div class="item">
							<div class="image" style="max-width:125px; max-height:100px;">
								<img src="${path}/image.ll?role=Player&name=${league.goalscorer[0].player}" style="height:100px;">
							</div>
							<div class="middle aligned content">
								<div class="header">${league.goalscorer[0].player}</div>
								<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.goalscorer[0].club}"> ${league.goalscorer[0].club}</div>
								<div class="description" style="text-align:right;"><h3>${league.ranking[0].game} 경기 ${league.goalscorer[0].goalscorer} 골</h3></div>
							</div>
						</div>
						<div class="ui divider"></div>
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
					</div>
					<div class="ui black segment items">
						<div class="ui center aligned dividing header f k r">도움왕</div>
						<div class="item">
							<div class="image" style="max-width:125px; max-height:100px;">
								<img src="${path}/image.ll?role=Player&name=${league.assistprovider[0].player}" style="height:100px;">
							</div>
							<div class="middle aligned content">
								<div class="header">${league.assistprovider[0].player}</div>
								<div class="meta"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.assistprovider[0].club}"> ${league.assistprovider[0].club}</div>
								<div class="description" style="text-align:right;"><h3>${league.ranking[0].game} 경기 ${league.assistprovider[0].assistprovider} 어시스트</h3></div>
							</div>
						</div>
						<div class="ui divider"></div>
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
					</div>
	 			</div>
	 		</div>
			<div class="ui center aligned container" style="margin-top:10px">
				<input class="ui black button f k r" id="ending" type="button" value="${league.season+1}/${f:substring(league.season+1, 2, 4)+1} Season">
				<input class="ui button f k r ending" type="button" value="취소">
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
	
	$('.ending').click(function(){
		if ($('#rank').hasClass('hidden')) {
			$('#endingSection').transition({
				animation  : 'fade up',
				onComplete : function(){
					$('#rank').transition('fade up')
				}
			})
		} else {
			$('#rank').transition({
				animation  : 'fade up',
				onComplete : function(){
					$('#endingSection').transition('fade up')
				}
			})
		}
	})
	
	$('#opening').click(function(){
		$.post('opening', {season : '${league.season}', roster : '${league.roster}'}, function(data){
			window.location.reload()
		},'json')
	})
	
	$('#match').click(function(){
		if ($('#match').text() == '확인'){
			window.location.reload()
		} else {
			$(this).addClass('loading')
			$.post('matching', {season : '${league.season}', round : '${league.round}'}, function(data){
				$('.versus').transition({
					animation  : 'horizontal flip',
					onComplete : function(){
						console.log(data)
						for (var i = 0; i < data.result.length; i++){
							$('.'+data.result[i].versus.replace(/ /gi, '_')).text(data.result[i].score)
						}
						for (var i = 0; i < data.score.length; i++){
							
						}
					}
				})
				$('.versus').transition('horizontal flip')
				$('#match').removeClass('loading').text('확인')
			}, 'json')
		}
	})
	
	$('#ending').click(function(){
		$.post('ending', {history : '${league.season}/${f:substring(league.season+1, 2, 4)}'}, function(data){
			window.location.reload()
		},'json')
	})
	
})

</script>
<jsp:include page="include/footer.jsp"/>