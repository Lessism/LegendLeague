<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="personal"/>
<%@ include file="../include/rail.jsp" %>
	<div class="ui image header f k r">
		<img class="ui rounded image" src="${path}/image.ll?role=${fifa.role}&name=${fifa.name}" style="height:50px;${fifa.role eq 'Club' ? 'width:50px;' : ''}">
		<div class="content">
			<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.name}">${fifa.name}</a>
			<div class="sub header">
				<c:if test="${fifa.role eq 'Player'}">
					<i class="dot circle outline ${fifa.personal.icon} icon" style="margin-right:0"></i> ${fifa.personal.position} / ${fifa.personal.fulltype}
				</c:if>
				<c:if test="${fifa.role ne 'Player'}">
					<i class="dot circle outline black icon" style="margin-right:0"></i> ${fifa.role}
				</c:if>
			</div>
			<div class="sub header">
				<i class="futbol icon" style="margin-right:0"></i> ${fifa.personal.ovr}
			</div>
		</div>
	</div>
	<div class="ui divider"></div>
	<div class="ui segment f k r">
		<div class="ui center aligned header f k r">
			<a class="link f k r" href="${path}/fifa/squad.ll?role=Club&name=${fifa.personal.name}">
				Squad
			</a>
		</div>
		<table class="ui left aligned table">
			<tr>
				<th class="ui center aligned" style="border-right:1px solid rgba(34,36,38,.1);">Manager</th>
				<td style="border-right:1px solid rgba(34,36,38,.1);">
					<div class="ui one statistics">
						<div class="statistic">
							<div class="value"><h2 class="f k r">${fifa.squad.manager.tactic}</h2></div>
							<div class="label"><h5 class="f k r">전술</h5></div>
						</div>
					</div>
				</td>
				<td style="border-right:1px solid rgba(34,36,38,.1);">
					<div class="ui image header f k r">
						<img class="ui rounded image" src="${path}/image.ll?no=${fifa.squad.manager.profile}" style="height:50px">
						<div class="content">
							<a class="link f k r" href="${path}/fifa/profile.ll?role=Manager&name=${fifa.squad.manager.name}">
								${fifa.squad.manager.name}
							</a>
							<div class="sub header">
								<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.squad.manager.country}">
									<i class="dot circle outline icon"></i>
									<i class="${f:toLowerCase(fifa.squad.manager.country)} flag"></i>
									${fifa.squad.manager.country}
								</a>
							</div>
						</div>
					</div>
				</td>
				<td>
					<div class="ui active inverted black progress"style="margin-top:10px;">
						<div class="bar" style="width:${fifa.squad.manager.ovr}%;">
							<div class="progress">${fifa.squad.manager.ovr}</div>
						</div>
						<div class="label f k r" style="color:black">OVR</div>
					</div>
				</td>
			</tr>
			<tr>
				<th rowspan="11" class="ui center aligned" style="border-top:1px solid rgba(34,36,38,.1); border-right:1px solid rgba(34,36,38,.1);">Player</th>
				<td style="border-right:1px solid rgba(34,36,38,.1);">
					<h3 class="ui center aligned f k r">
						<label class="ui ${fifa.squad.squad[0].icon} label llab f k r">
							${fifa.squad.squad[0].type}
						</label>
					</h3>
				</td>
				<td style="border-right:1px solid rgba(34,36,38,.1);">
					<div class="ui image header f k r">
						<img class="ui rounded image" src="${path}/image.ll?no=${fifa.squad.squad[0].profile}" style="height:50px">
						<div class="content">
							<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${fifa.squad.squad[0].name}">
								${fifa.squad.squad[0].name}
							</a>
							<div class="sub header">
								<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.squad.squad[0].country}">
									<i class="dot circle outline ${fifa.squad.squad[0].icon} icon"></i>
									<i class="${f:toLowerCase(fifa.squad.squad[0].country)} flag"></i>
									${fifa.squad.squad[0].country}
								</a>
							</div>
						</div>
					</div>
				</td>
				<td>
					<div class="ui active inverted ${fifa.squad.squad[0].icon} progress" style="margin-top:10px;margin-bottom:0;">
						<div class="bar" style="width:${fifa.squad.squad[0].ovr}%;">
							<div class="progress"><div class="ui meta f k r">${fifa.squad.squad[0].position}<i class="dot circle outline ${fifa.squad.squad[0].icon} icon"></i>${fifa.squad.squad[0].ovr}</div></div>
						</div>
					</div>
				</td>
			</tr>
			<c:forEach var="player" items="${fifa.squad.squad}" begin="1" varStatus="idx">
				<tr>
					<td style="border-right:1px solid rgba(34,36,38,.1);">
						<h3 class="ui center aligned f k r"><label class="ui ${player.icon} label llab f k r">${player.type}</label></h3>
					</td>
					<td style="border-right:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${player.profile}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${player.name}">
									${player.name}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${player.country}">
										<i class="dot circle outline ${player.icon} icon"></i>
										<i class="${f:toLowerCase(player.country)} flag"></i>
										${player.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td>
						<div class="ui active inverted ${player.icon} progress" style="margin-top:10px;margin-bottom:0;">
							<div class="bar" style="width:${player.ovr}%;">
								<div class="progress"><div class="ui meta f k r">${player.position}<i class="dot circle outline ${player.icon} icon"></i>${player.ovr}</div></div>
							</div>
						</div>
					</td>
				</tr>
			</c:forEach>
		</table>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>