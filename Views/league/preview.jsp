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
	<h4 class="f k r">${league.season}/${f:substring(league.season+1, 2, 4)} Season Preview</h4>
	<div class="ui divider"></div>
	<div class="ui grid">
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
						<c:forEach var="club" items="${league.preview.club}" varStatus="idx">
							<tr>
								<td style="width:25%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${club.name}">
										<img class="ui rounded fluid image" src="${path}/image.ll?no=${club.emblem}">
									</a>
								</td>
								<td>
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${club.name}">
										${club.name}
									</a>
								</td>
							</tr>
						</c:forEach>
					</tbody>
				</table>
			</div>
		</div>
		<div class="eleven wide column">
			<div class="ui black segment">
				<div class="ui center aligned header">
					<h3 class="f k r">
						우승후보
					</h3>
				</div>
				<div class="ui divider"></div>
			<div class="ui two cards">
				<div class="ui center aligned card segment">
					<div style="margin-top:25px">
						<a class="image" href="${path}/fifa/profile.ll?role=Club&name=${league.preview.club[0].name}">
							<img class="ui centered rounded image" src="${path}/image.ll?no=${league.preview.club[0].emblem}" style="max-height:150px;max-width:150px">
						</a>
					</div>
					<div class="ui divider"></div>
					<div class="ui header f k r">
						<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.preview.club[0].name}">
							${league.preview.club[0].name}
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="${path}/fifa/country.ll?country=${league.preview.club[0].country}">
							<i class="${f:toLowerCase(league.preview.club[0].country)} flag"></i>
							${league.preview.club[0].country}
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${league.preview.club[0].name}">
							<img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=${league.preview.club[0].stadium}" style="max-width:20px; max-height:20px;">
							${league.preview.club[0].stadium}
						</a>
					</div>
					<div class="ui segment">
						<div class="ui active inverted black progress">
							<div class="bar" style="width:${league.preview.club[0].ovr}%;">
								<div class="progress">${league.preview.club[0].ovr}</div>
							</div>
							<div class="label f k r" style="color:black">OVR</div>
						</div>
					</div>
				</div>
				<div class="ui center aligned card segment">
					<div class="content">
						<h3 class="f k r">Manager</h3>
						<div class="ui divider"></div>
					</div>
					<div>
						<a class="image" href="${path}/fifa/profile.ll?role=Manager&name=${league.preview.manager.name}">
							<img class="ui centered rounded image" src="${path}/image.ll?no=${league.preview.manager.profile}" style="max-height:150px;max-width:150px">
						</a>
					</div>
					<div class="ui divider"></div>
					<div class="ui header f k r">
						<a class="link f k r" href="${path}/fifa/profile.ll?role=Manager&name=${league.preview.manager.name}">
							${league.preview.manager.name}
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="${path}/fifa/country.ll?country=${league.preview.manager.country}">
							<i class="${f:toLowerCase(league.preview.manager.country)} flag"></i>
							${league.preview.manager.country}
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.preview.manager.club}">
							<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.preview.manager.club}" style="max-width:20px; max-height:20px;">
							${league.preview.manager.club}
						</a>
					</div>
					<div class="ui segment">
						<div class="ui active inverted black progress">
							<div class="bar" style="width:${league.preview.manager.ovr}%;">
								<div class="progress">${league.preview.manager.ovr}</div>
							</div>
							<div class="label f k r" style="color:black">OVR</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="ui black segment">
				<div class="ui center aligned header">
					<h3 class="f k r">
						핵심선수
					</h3>
				</div>
				<div class="ui divider"></div>
				<div class="ui three cards">
					<c:forEach var="player" items="${league.preview.player}">
						<div class="ui center aligned card segment">
							<div style="margin-top:25px">
								<a class="image" href="${path}/fifa/profile.ll?role=Player&name=${player.name}">
									<img class="ui huge avatar image" src="${path}/image.ll?no=${player.profile}">
								</a>
							</div>
							<div class="ui divider"></div>
							<div class="ui header f k r">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${player.name}">
									${player.name}
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="${path}/fifa/country.ll?country=${player.country}">
									<i class="${f:toLowerCase(player.country)} flag"></i>
									${player.country}
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${player.club}">
									<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${player.club}" style="max-width:20px; max-height:20px;">
									${player.club}
								</a>
							</div>
							<div class="ui segment">
								<div class="ui active inverted ${player.icon} progress" style="margin-bottom:0;bottom:0;">
									<div class="bar" style="width:${player.ovr}%;">
										<div class="progress"><div class="ui meta f k r">${player.position}<i class="dot circle outline ${player.icon} icon"></i>${player.ovr}</div></div>
									</div>
								</div>
							</div>
						</div>
					</c:forEach>
				</div>
			</div>
		</div>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>