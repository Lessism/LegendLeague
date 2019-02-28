<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="include/header.jsp" %>
<section class="ui black segment container">
	<div class="ui grid">
		<c:if test="${league.round == 'Free'}">
			<div class="twelve wide column">
				<h1 style="display:inline-block;">Legend League</h1>
				<h3 style="display:block;">${league.season} ${league.round} Season</h3>
			</div>
			<div class="four wide column" style="display: flex; align-items: center;">
				<input class="ui fluid black button f k r" id="opening" type="button" value="개막" style="height:75%;">
			</div>
	</div>
	<hr>
	<div id="testd">
		<div class="ui grid" id="test">
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
						<c:forEach var="club" items="${league.roster}" varStatus="idx">
							<tr>
								<td style="width:15%">${idx.count}</td>
								<td style="width:10%"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&img=emblem&name=${club.name}"></td>
								<td style="width:65%">${club.name}</td>
								<td style="width:10%">${club.ovr}</td>
							</tr>
						</c:forEach>
					</tbody>
				</table>
			</div>
			<div class="six wide column">
				<div class="ui black fluid card segment">
					<div class="ui header">
						<div class="ui center aligned black segment"><h3 class="f k r">우승후보</h3></div>
						<div><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&img=emblem&name=${league.roster[0].name}"></div>
						<div class="ui center aligned header f k r">${league.roster[0].name}</div>
						<div class="ui center aligned meta f k r">${league.roster[0].stadium}</div>
					</div>
					<div class="ui relaxed grid content">
						<div class="five wide column">
							<h5 class="ui center aligned f k r">Manager</h5>
						</div>
						<div class="eleven wide column">
							<img class="ui avatar image" src="${path}/image.ll?role=Manager&img=profile&name=${league.roster[0].manager}">
							${league.roster[0].manager}
							<div class="description" style="display:inline-block;">
							</div>
						</div>
						<div class="five wide column">
							<h5 class="ui center aligned f k r">Key Player</h5>
						</div>
						<div class="eleven wide column">
							<img class="ui avatar image" src="${path}/image.ll?role=Player&img=profile&name=${league.roster[0].keyplayer.name}">
							${league.roster[0].keyplayer.name}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		</c:if>
	<c:if test="${league.round != 'Free'}">
		<div class="ui grid">
			<div class="twelve wide column">
				<h1 style="display:inline-block;">Legend League</h1>
				<h3 style="display:block;">${league.season} Season ${league.round} Round</h3>
			</div>
			<div class="four wide column" style="display: flex; align-items: center;">
				<input class="ui fluid black button f k r" id="progress" type="button" value="진행" style="height:75%;">
			</div>
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
						<c:forEach var="club" items="${league.roster}" varStatus="idx">
							<tr>
								<td style="width:15%">${idx.count}</td>
								<td style="width:10%"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&img=emblem&name=${club.name}"></td>
								<td style="width:65%">${club.name}</td>
								<td style="width:10%">0</td>
								<td style="width:10%">0</td>
								<td style="width:10%">0</td>
								<td style="width:10%">0</td>
								<td style="width:10%">0</td>
							</tr>
						</c:forEach>
					</tbody>
				</table>
			</div>
		<div class="six wide column">
			<div class="ui black fluid card row">
				<div class="header">
					최고 평점
				</div>
				<div class="ui grid content">
					<img class="ui left floated image five wide column" src="#">
					<div class="eleven wide column">
						<div class="header">
							Kaka
						</div>
						<div class="meta">
							<img class="ui left floated image" src="#">
							Real Madrid
						</div>
						<div class="description" style="display:inline-block;">
							9.5점
						</div>
					</div>
				</div>
			</div>
			<div class="ui black fluid card row">
				<div class="header">
					최다 득점
				</div>
				<div class="ui grid content">
					<img class="ui left floated image five wide column" src="#">
					<div class="eleven wide column">
						<div class="header">
							Kaka
						</div>
						<div class="meta">
							<img class="ui left floated image" src="#">
							Real Madrid
						</div>
						<div class="description" style="display:inline-block;">
							25골
						</div>
					</div>
				</div>
			</div>
			<div class="ui black fluid card row">
				<div class="header">
					최다 어시스트
				</div>
				<div class="ui grid content">
					<img class="ui left floated image five wide column" src="#">
					<div class="eleven wide column">
						<div class="header">
							Kaka
						</div>
						<div class="meta">
							<img class="ui left floated image" src="#">
							Real Madrid
						</div>
						<div class="description" style="display:inline-block;">
							10어시
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</c:if>
	<div class="ui transition hidden center aligned black segment" id="openingSection">
		<h3 class="f k r">${league.season} Season</h3>
		<div class="ui centered grid segment">
			<c:forEach var="club" items="${league.roster}" varStatus="idx">
				<div class="column">
					<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&img=emblem&name=${club.name}">
				</div>
			</c:forEach>
		</div>
		<div class="ui container f k r">
			총 2 개의 팀이 2 round 동안 경기를 치루게 됩니다. 
		</div>
		<div class="ui center aligned container" style="margin-top:10px">
			<input class="ui black button f k r" id="start" type="button" value="시작">
			<a class="ui button f k r" href="${path}">취소</a>
		</div>
	</div>
</section>
<script>
$(function(){
	
	$('#opening').click(function(){
		$('#test')
		  .transition({
		    animation  : 'fade up',
		    onComplete : function() {
		    	$('#openingSection').transition('fade up')
			}
		})
	})
	$('#start').click(function(){
		$.post('opening', {season:'${league.season}'}, function(data){
			
		},'json')
		window.location.href='${path}'
	})
})
</script>
<jsp:include page="include/footer.jsp"/>