<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="fifa"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r">
		<a class="link f k r" href="${path}/fifa.ll">
			FIFA
		</a>
	</h1>
	<h4 class="f k r">
		Country ${fifa.country}
	</h4>
	<div class="ui divider"></div>
	<div class="ui black segment f k r">
		<div class="ui center aligned header f k r">
			<a class="link f k r" href="">
				<i class="${f:toLowerCase(fifa.country)} flag"></i>
				${fifa.country}
			</a>
		</div>
		<div class="ui divider"></div>
		<div id="countrychart" ></div>
    </div>
	<div class="ui black segment">
		<h3 class="ui center aligned header f k r">
			${fifa.country} Best Ranking
		</h3>
		<div class="ui horizontal segments">
			<c:if test="${!empty fifa.countryinfo.rankclub}">
				<div class="ui black segment items">
					<div class="ui center aligned dividing header f k r">
						<a class="link f k r" href="${path}/fifa/information.ll?role=Club">
							Club
						</a>
					</div>
					<div class="item">
						<a class="image" href="${path}/fifa/profile.ll?role=Club&name=${fifa.countryinfo.rankclub[0].name}" style="max-width:125px; max-height:100px;">
							<img src="${path}/image.ll?role=Club&name=${fifa.countryinfo.rankclub[0].name}" style="height:100px; border-radius:10px;">
						</a>
						<div class="middle aligned content">
							<div class="header">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.countryinfo.rankclub[0].name}">
									${fifa.countryinfo.rankclub[0].name}
								</a>
							</div>
							<div class="meta">
								<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${fifa.countryinfo.rankclub[0].name}">
									<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.countryinfo.rankclub[0].name}" style="max-width:20px; max-height:20px;">
									${fifa.countryinfo.rankclub[0].stadium}
								</a>
							</div>
							<div class="description">
								<div class="ui active inverted black progress"style="margin-top:10px;">
									<div class="bar" style="width:${fifa.countryinfo.rankclub[0].ovr+1}%;">
										<div class="progress f k r">${fifa.countryinfo.rankclub[0].ovr}</div>
									</div>
									<div class="label f k r" style="color:black">OVR</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ui divider"></div>
					<div class="ui middle aligned divided list">
						<c:forEach var="club" items="${fifa.countryinfo.rankclub}" begin="1" varStatus="idx">
							<div class="item" style="vertical-align:middle;">
								<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${club.name}">
								<div class="content">
									<div class="header">
										<h5 class="f k r">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${club.name}">
												${club.name}
											</a>
										</h5>
									</div>
									<div class="meta">
										<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${club.name}">
											<img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=${club.stadium}" style="max-width:20px; max-height:20px;">
											${club.stadium}
										</a>
									</div>
								</div>
								<div class="right floated content">
									<h5 class="f k r">
										<i class="futbol icon"></i>${club.ovr}
									</h5>
								</div>
							</div>
						</c:forEach>
					</div>
				</div>
			</c:if>
			<c:if test="${!empty fifa.countryinfo.rankmanager}">
				<div class="ui black segment items">
					<div class="ui center aligned dividing header f k r">
						<a class="link f k r" href="${path}/fifa/information.ll?role=Manager">
							Manager
						</a>
					</div>
					<div class="item">
						<a class="image" href="${path}/fifa/profile.ll?role=Manager&name=${fifa.countryinfo.rankmanager[0].name}" style="max-width:125px; max-height:100px;">
							<img src="${path}/image.ll?role=Manager&name=${fifa.countryinfo.rankmanager[0].name}" style="height:100px; border-radius:10px;">
						</a>
						<div class="middle aligned content">
							<div class="header">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Manager&name=${fifa.countryinfo.rankmanager[0].name}">
									${fifa.countryinfo.rankmanager[0].name}
								</a>
							</div>
							<div class="meta">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.countryinfo.rankmanager[0].club}">
									<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.countryinfo.rankmanager[0].club}" style="max-width:20px; max-height:20px;">
									${fifa.countryinfo.rankmanager[0].club}
								</a>
							</div>
							<div class="description">
								<div class="ui active inverted black progress"style="margin-top:10px;">
									<div class="bar" style="width:${fifa.countryinfo.rankmanager[0].ovr+1}%;">
										<div class="progress f k r">${fifa.countryinfo.rankmanager[0].ovr}</div>
									</div>
									<div class="label f k r" style="color:black">OVR</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ui divider"></div>
					<div class="ui middle aligned divided list">
						<c:forEach var="manager" items="${fifa.countryinfo.rankmanager}" begin="1" varStatus="idx">
							<div class="item" style="vertical-align:middle;">
								<img class="ui avatar image" src="${path}/image.ll?role=Manager&name=${manager.name}">
								<div class="content">
									<div class="header">
										<h5 class="f k r">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Manager&name=${manager.name}">
												${manager.name}
											</a>
										</h5>
									</div>
									<div class="meta">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${manager.club}">
											<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${manager.club}" style="max-width:20px; max-height:20px;">
											${manager.club}
										</a>
									</div>
								</div>
								<div class="right floated content">
									<h5 class="f k r">
										<i class="futbol icon"></i>${manager.ovr}
									</h5>
								</div>
							</div>
						</c:forEach>
					</div>
				</div>
			</c:if>
			<c:if test="${!empty fifa.countryinfo.rankplayer}">
				<div class="ui black segment items">
					<div class="ui center aligned dividing header f k r">
						<a class="link f k r" href="${path}/fifa/information.ll?role=Player">
							Player
						</a>
					</div>
					<div class="item">
						<a class="image" href="${path}/fifa/profile.ll?role=Player&name=${fifa.countryinfo.rankplayer[0].name}" style="max-width:125px; max-height:100px;">
							<img src="${path}/image.ll?role=Player&name=${fifa.countryinfo.rankplayer[0].name}" style="height:100px; border-radius:10px;">
						</a>
						<div class="middle aligned content">
							<div class="header">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${fifa.countryinfo.rankplayer[0].name}">
									${fifa.countryinfo.rankplayer[0].name}
								</a>
							</div>
							<div class="meta">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.countryinfo.rankplayer[0].club}">
									<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.countryinfo.rankplayer[0].club}" style="max-width:20px; max-height:20px;">
									${fifa.countryinfo.rankplayer[0].club}
								</a>
							</div>
							<div class="description">
								<div class="ui active inverted ${fifa.countryinfo.rankplayer[0].icon} progress">
									<div class="bar" style="width:${fifa.countryinfo.rankplayer[0].ovr+1}%;">
										<div class="progress f k r" style="color:black">
											${fifa.countryinfo.rankplayer[0].position}<i class="dot circle outline ${fifa.countryinfo.rankplayer[0].icon} icon"></i>${fifa.countryinfo.rankplayer[0].ovr}
										</div>
									</div>
									<div class="label f k r" style="color:black">OVR</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ui divider"></div>
					<div class="ui middle aligned divided list">
						<c:forEach var="player" items="${fifa.countryinfo.rankplayer}" begin="1" varStatus="idx">
							<div class="item" style="vertical-align:middle;">
								<img class="ui avatar image" src="${path}/image.ll?role=Player&name=${player.name}">
								<div class="content">
									<div class="header">
										<h5 class="f k r">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${player.name}">
												${player.name}
											</a>
										</h5>
									</div>
									<div class="meta">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${player.club}">
											<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${player.club}" style="max-width:20px; max-height:20px;">
											${player.club}
										</a>
									</div>
								</div>
								<div class="right floated content">
									<h5 class="f k r">
										<i class="futbol icon"></i>${player.ovr}
									</h5>
								</div>
							</div>
						</c:forEach>
					</div>
				</div>
			</c:if>
		</div>
	</div>
</section>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
$(function(){

	Morris.Donut({
		element			: 'countrychart',
		gridTextFamily	: 'Noto Serif KR',
        labelColor		: 'black',
        colors			: ['#A9D0F5', '#D8CEF6', '#F5ECCE'],
		data			: [
			{label: "Club",		value: '${fifa.countryinfo.count.club}'},
			{label: "Manager",	value: '${fifa.countryinfo.count.manager}'},
			{label: "Player",	value: '${fifa.countryinfo.count.player}'}
		]
	})
	
})
</script>
<jsp:include page="../include/footer.jsp"/>