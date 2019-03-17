<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="league"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r">Season Preview</h1>
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
						<c:forEach var="club" items="${preview.club}" varStatus="idx">
							<tr>
								<td style="width:25%"><img class="ui rounded fluid image" src="${path}/image.ll?no=${club.emblem}"></td>
								<td>${club.name}</td>
							</tr>
						</c:forEach>
					</tbody>
				</table>
			</div>
		</div>
		<div class="eleven wide column">
			<div class="ui black segment">
				<div class="ui center aligned header"><h3 class="f k r">우승후보</h3></div>
				<div class="ui divider"></div>
			<div class="ui two cards">
				<div class="ui center aligned card segment">
					<div style="margin-top:25px"><img class="ui centered rounded image" src="${path}/image.ll?no=${preview.club[0].emblem}" style="max-height:150px;max-width:150px"></div>
					<div class="ui divider"></div>
					<div class="ui header f k r">${preview.club[0].name}</div>
					<div class="ui meta f k r"><i class="${f:toLowerCase(preview.club[0].country)} flag"></i>${preview.club[0].country}</div>
					<div class="ui meta f k r"><img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=${preview.club[0].stadium}">${preview.club[0].stadium}</div>
					<div class="ui segment">
						<div class="ui active inverted black progress">
							<div class="bar" style="width:${preview.club[0].ovr}%;">
								<div class="progress">${preview.club[0].ovr}</div>
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
					<div><img class="ui centered rounded image" src="${path}/image.ll?no=${preview.manager.profile}" style="max-height:150px;max-width:150px"></div>
					<div class="ui divider"></div>
					<div class="ui header f k r">${preview.manager.name}</div>
					<div class="ui meta f k r"><i class="${f:toLowerCase(preview.manager.country)} flag"></i>${preview.manager.country}</div>
					<div class="ui meta f k r"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${preview.manager.club}">${preview.manager.club}</div>
					<div class="ui segment">
						<div class="ui active inverted black progress">
							<div class="bar" style="width:${preview.manager.ovr}%;">
								<div class="progress">${preview.manager.ovr}</div>
							</div>
							<div class="label f k r" style="color:black">OVR</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="ui black segment">
				<div class="ui center aligned header"><h3 class="f k r">핵심선수</h3></div>
				<div class="ui divider"></div>
				<div class="ui three cards">
					<c:forEach var="player" items="${preview.player}">
						<div class="ui center aligned card segment">
						<div style="margin-top:25px"><img class="ui huge avatar image" src="${path}/image.ll?no=${player.profile}"></div>
							<div class="ui header f k r">
								${player.name}
							</div>
							<div class="ui meta f k r"><i class="${f:toLowerCase(player.country)} flag"></i>${player.country}</div>
							<div class="ui meta f k r"><img class="ui avatar mini image" src="${path}/image.ll?role=Club&name=${player.club}">${player.club}</div>
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