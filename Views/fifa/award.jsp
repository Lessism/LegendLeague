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
	<c:if test="${fifa.award.role ne 'Player'}">
		<div class="ui grid">
			<div class="eleven wide column">
				<div class="ui center aligned black segment">
					<div class="content">
						<h3 class="f k r">FIFA World Manager</h3>
						<div class="ui divider"></div>
					</div>
					<div><img class="ui centered rounded image" src="${path}/image.ll?no=${fifa.award.manager.profile}"></div>
					<div class="ui divider"></div>
					<div class="ui header f k r">${fifa.award.manager.name}</div>
					<div class="ui meta f k r"><i class="${f:toLowerCase(fifa.award.manager.country)} flag"></i>${fifa.award.manager.country}</div>
					<div class="ui meta f k r"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.award.manager.club}">${fifa.award.manager.club}</div>
					<div class="ui divider"></div>
					<div class="ui segment">
						<div class="ui active inverted black progress">
							<div class="bar" style="width:${fifa.award.manager.ovr}%;">
								<div class="progress">${fifa.award.manager.ovr}</div>
							</div>
							<div class="label f k r" style="color:black">OVR</div>
						</div>
						<div class="ui divider"></div>
						<h4 class="f k r">${fifa.award.season}/${f:substring(fifa.award.season+1, 2, 4)} Season</h4>
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
						<div class="ui header f k r">Infomation</div>
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
							<div class="ui header f k r">History</div>
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
					<h3 class="f k r">
						<c:choose>
							<c:when test="${fifa.award.award eq 'champion'}">년도별 우승팀</c:when>
							<c:otherwise>년도별 수상자</c:otherwise>
						</c:choose>
					</h3>
					<div class="ui divider"></div>
					<table class="ui striped center aligned table">
						<c:forEach var="award" items="${fifa.award.list}" varStatus="idx">
							<c:if test="${!empty award.name}">
								<c:if test="${fifa.award.season eq award.season}">
									<thead>
										<tr class="f k r">
											<th style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></th>
											<th><a class="link" href="">${award.name}</th>
											<th><a class="link" href="">${award.season}/${f:substring(award.season+1, 2, 4)}</a></th>
										</tr>
									</thead>
								</c:if>
								<c:if test="${fifa.award.season ne award.season}">
									<tr>
										<td style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></td>
										<td><a class="link" href="${path}/fifa/award.ll?role=${fifa.award.role}&award=${fifa.award.award}&season=${award.season}">${award.name}</a></td>
										<td><a class="link" href="${path}/fifa/award.ll?role=${fifa.award.role}&award=${fifa.award.award}&season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></td>
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
			<div class="ui pointing secondary three item menu">
				<a class="tabular item f k r ${fifa.award.award eq 'ballondor' ? 'active' : ''}" data-tab="ballondor">Ballon Dor</a>
				<a class="tabular item f k r ${fifa.award.award eq 'goalscorer' ? 'active' : ''}" data-tab="goalscorer">Goal Scorer</a>
				<a class="tabular item f k r ${fifa.award.award eq 'assistprovider' ? 'active' : ''}" data-tab="assistprovider">Assist Provider</a>
			</div>
			<div class="ui tab segment ${fifa.award.award eq 'ballondor' ? 'active' : ''}" data-tab="ballondor">
				<div class="ui grid">
					<div class="eleven wide column">
						<div class="ui center aligned black segment">
							<div class="content">
								<h3 class="f k r">Ballon Dor</h3>
								<div class="ui divider"></div>
							</div>
							<div><img class="ui centered rounded image" src="${path}/image.ll?no=${fifa.award.ballonDor.profile}"></div>
							<div class="ui divider"></div>
							<div class="ui header f k r">${fifa.award.ballonDor.name}</div>
							<div class="ui meta f k r"><i class="${f:toLowerCase(fifa.award.ballonDor.country)} flag"></i>${fifa.award.ballonDor.country}</div>
							<div class="ui meta f k r"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.award.ballonDor.club}">${fifa.award.ballonDor.club}</div>
							<div class="ui divider"></div>
							<div class="ui segment">
								<div class="ui active inverted black progress">
									<div class="bar" style="width:${fifa.award.ballonDor.ovr}%;">
										<div class="progress">${fifa.award.ballonDor.ovr}</div>
									</div>
									<div class="label f k r" style="color:black">OVR</div>
								</div>
								<div class="ui divider"></div>
								<h4 class="f k r">${fifa.award.season}/${f:substring(fifa.award.season+1, 2, 4)} Season</h4>
								<h5 class="f k r">${fifa.award.ballonDor.score}</h5>
								<div class="ui active progress" data-percent="100" style="display:flex;">
									<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.ballonDor.odds.winodds}" type="percent"/>; background-color:#2ecc40;">
										<div class="progress">${fifa.award.ballonDor.odds.win} 승</div>
									</div>
									<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.ballonDor.odds.drawodds}" type="percent"/>; background-color:#ffe21f;">
										<div class="progress">${fifa.award.ballonDor.odds.draw} 무</div>
									</div>
									<div class="bar" style="width:<fmt:formatNumber value="${fifa.award.ballonDor.odds.loseodds}" type="percent"/>; background-color:#ff695e;">
										<div class="progress">${fifa.award.ballonDor.odds.lose} 패</div>
									</div>
									<div class="label f k r">승률 <fmt:formatNumber value="${fifa.award.ballonDor.odds.winodds}" type="percent"/></div>
								</div>
							</div>
							<div class="ui segment f k r">
								<div class="ui header f k r">Infomation</div>
								<table class="ui center aligned table">
									<tr>
										<th>Birth</th>
										<td>${fifa.award.ballonDor.birth}</td>
									</tr>
									<tr>
										<th>Physical</th>
										<td>${fifa.award.ballonDor.height} cm ${fifa.award.ballonDor.weight} kg</td>
									</tr>
									<tr>
										<th>Position</th>
										<td>${fifa.award.ballonDor.position}</td>
									</tr>
								</table>
							</div>
							<c:if test="${fifa.award.ballonDor.history ne null}">
								<div class="ui segment f k r">
									<div class="ui header f k r">History</div>
								<div class="ui segment f k r">
									<div class="ui middle aligned relaxed divided list">
										<c:forEach var="history" items="${fifa.award.ballonDor.history.split(',')}">
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
								<c:forEach var="award" items="${fifa.award.ballonDor.list}" varStatus="idx">
									<c:if test="${!empty award.name}">
										<c:if test="${fifa.award.season eq award.season}">
											<thead>
												<tr class="f k r">
													<th style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></th>
													<th><a class="link" href="">${award.name}</th>
													<th><a class="link" href="">${award.season}/${f:substring(award.season+1, 2, 4)}</a></th>
												</tr>
											</thead>
										</c:if>
										<c:if test="${fifa.award.season ne award.season}">
											<tr>
												<td style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></td>
												<td><a class="link" href="${path}/fifa/award.ll?role=${fifa.award.role}&award=${fifa.award.award}&season=${award.season}">${award.name}</a></td>
												<td><a class="link" href="${path}/fifa/award.ll?role=${fifa.award.role}&award=${fifa.award.award}&season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></td>
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
						goalscorer
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
													<th><a class="link" href="">${award.name}</th>
													<th><a class="link" href="">${award.season}/${f:substring(award.season+1, 2, 4)}</a></th>
												</tr>
											</thead>
										</c:if>
										<c:if test="${fifa.award.season ne award.season}">
											<tr>
												<td style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></td>
												<td><a class="link" href="${path}/fifa/award.ll?role=${fifa.award.role}&award=${fifa.award.award}&season=${award.season}">${award.name}</a></td>
												<td><a class="link" href="${path}/fifa/award.ll?role=${fifa.award.role}&award=${fifa.award.award}&season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></td>
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
						assistprovider
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
													<th><a class="link" href="">${award.name}</th>
													<th><a class="link" href="">${award.season}/${f:substring(award.season+1, 2, 4)}</a></th>
												</tr>
											</thead>
										</c:if>
										<c:if test="${fifa.award.season ne award.season}">
											<tr>
												<td style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${fifa.award.role}&name=${award.name}"></td>
												<td><a class="link" href="${path}/fifa/award.ll?role=${fifa.award.role}&award=${fifa.award.award}&season=${award.season}">${award.name}</a></td>
												<td><a class="link" href="${path}/fifa/award.ll?role=${fifa.award.role}&award=${fifa.award.award}&season=${award.season}">${award.season}/${f:substring(award.season+1, 2, 4)}</a></td>
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
	if (${fifa.award.role eq 'Club'}){
		$('.rail.item.award.club').addClass('active')
	}
	if (${fifa.award.role eq 'Manager'}){
		$('.rail.item.award.manager').addClass('active')
	}
	if (${fifa.award.role eq 'Player'}){
		$('.rail.item.award.player').addClass('active')
	}
})
</script>
<jsp:include page="../include/footer.jsp"/>