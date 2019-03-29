<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="fifa"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r">
		<a href="${path}/fifa.ll" style="color:black;">
			FIFA
		</a>
	</h1>
	<h4 class="f k r">
		<strong>F</strong>édération <strong>I</strong>nternationale de <strong>F</strong>ootball <strong>A</strong>ssociation
	</h4>
	<div class="ui divider"></div>
	<div class="ui black segment f k r">
		<h3 class="ui center aligned header f k r">
			FIFA World Best Eleven
		</h3>
		<div class="ui divider"></div>
		<div class="ui three cards">
			<div class="ui center aligned black card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="${path}/fifa/information.ll?role=Club">
						Club
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="${path}/fifa/profile.ll?role=Club&name=${fifa.fifaBestClub.name}">
						<img class="ui centered rounded image" src="${path}/image.ll?no=${fifa.fifaBestClub.emblem}" style="height:150px;max-width:150px">
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
					<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.fifaBestClub.name}">
						${fifa.fifaBestClub.name}
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.fifaBestClub.country}">
						<i class="${f:toLowerCase(fifa.fifaBestClub.country)} flag"></i>
						${fifa.fifaBestClub.country}
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${fifa.fifaBestClub.name}">
						<img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=${fifa.fifaBestClub.stadium}" style="max-width:20px; max-height:20px;">
						${fifa.fifaBestClub.stadium}
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted black progress"style="margin-top:10px;">
						<div class="bar" style="width:${fifa.fifaBestClub.ovr}%;">
							<div class="progress f k r">
								OVR <i class="dot circle outline white icon"></i>${fifa.fifaBestClub.ovr}
							</div>
						</div>
						<div class="label f k r" style="color:black">
							Rankpoint <i class="futbol icon"></i> ${fifa.fifaBestClub.rankpoint}
						</div>
					</div>
				</div>
			</div>
			<div class="ui center aligned ${fifa.fifaBestEleven[0].icon} card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="${path}/fifa/information.ll?role=Player&type=${fifa.fifaBestEleven[0].type}">
						${fifa.fifaBestEleven[0].position}
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="${path}/fifa/profile.ll?role=Player&name=${fifa.fifaBestEleven[0].name}">
						<img class="ui centered rounded image" src="${path}/image.ll?no=${fifa.fifaBestEleven[0].profile}" style="height:150px;max-width:150px">
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
					<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${fifa.fifaBestEleven[0].name}">
						${fifa.fifaBestEleven[0].name}
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.fifaBestEleven[0].country}">
						<i class="${f:toLowerCase(fifa.fifaBestEleven[0].country)} flag"></i>
						${fifa.fifaBestEleven[0].country}
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${fifa.fifaBestEleven[0].club}">
						<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.fifaBestEleven[0].club}" style="max-width:20px; max-height:20px;">
						${fifa.fifaBestEleven[0].club}
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted ${fifa.fifaBestEleven[0].icon} progress"style="margin-top:10px;">
						<div class="bar" style="width:${fifa.fifaBestEleven[0].ovr}%;">
							<div class="progress f k r" style="color:black;">
								${fifa.fifaBestEleven[0].position} <i class="dot circle outline ${fifa.fifaBestEleven[0].icon} icon"></i>${fifa.fifaBestEleven[0].ovr}
							</div>
						</div>
						<div class="label f k r" style="color:black;">
							Rankpoint <i class="futbol icon"></i> ${fifa.fifaBestEleven[0].rankpoint}
						</div>
					</div>
				</div>
			</div>
			<div class="ui center aligned black card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="${path}/fifa/information.ll?role=Manager">
						Manager
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="${path}/fifa/profile.ll?role=Manager&name=${fifa.fifaBestManager.name}">
						<img class="ui centered rounded image" src="${path}/image.ll?no=${fifa.fifaBestManager.profile}" style="height:150px;max-width:150px">
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
					<a class="link f k r" href="${path}/fifa/profile.ll?role=Manager&name=${fifa.fifaBestManager.name}">
						${fifa.fifaBestManager.name}
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.fifaBestManager.country}">
						<i class="${f:toLowerCase(fifa.fifaBestManager.country)} flag"></i>
						${fifa.fifaBestManager.country}
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${fifa.fifaBestManager.club}">
						<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.fifaBestManager.club}" style="max-width:20px; max-height:20px;">
						${fifa.fifaBestManager.club}
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted black progress"style="margin-top:10px;">
						<div class="bar" style="width:${fifa.fifaBestManager.ovr}%;">
							<div class="progress f k r">
								OVR <i class="dot circle outline white icon"></i>${fifa.fifaBestManager.ovr}
							</div>
						</div>
						<div class="label f k r" style="color:black;">
							Rankpoint <i class="futbol icon"></i> ${fifa.fifaBestManager.rankpoint}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="ui four cards">
			<div class="ui center aligned ${fifa.fifaBestEleven[3].icon} card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="${path}/fifa/information.ll?role=Player&type=${fifa.fifaBestEleven[3].type}">
						${fifa.fifaBestEleven[3].position}
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="${path}/fifa/profile.ll?role=Player&name=${fifa.fifaBestEleven[3].name}">
						<img class="ui centered rounded image" src="${path}/image.ll?no=${fifa.fifaBestEleven[3].profile}" style="height:150px;max-width:150px">
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
					<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${fifa.fifaBestEleven[3].name}">
						${fifa.fifaBestEleven[3].name}
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.fifaBestEleven[3].country}">
						<i class="${f:toLowerCase(fifa.fifaBestEleven[3].country)} flag"></i>
						${fifa.fifaBestEleven[3].country}
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${fifa.fifaBestEleven[3].club}">
						<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.fifaBestEleven[3].club}" style="max-width:20px; max-height:20px;">
						${fifa.fifaBestEleven[3].club}
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted ${fifa.fifaBestEleven[3].icon} progress"style="margin-top:10px;">
						<div class="bar" style="width:${fifa.fifaBestEleven[3].ovr}%;">
							<div class="progress f k r" style="color:black;">
								${fifa.fifaBestEleven[3].position} <i class="dot circle outline ${fifa.fifaBestEleven[3].icon} icon"></i>${fifa.fifaBestEleven[3].ovr}
							</div>
						</div>
						<div class="label f k r" style="color:black;">
							Rankpoint <i class="futbol icon"></i> ${fifa.fifaBestEleven[3].rankpoint}
						</div>
					</div>
				</div>
			</div>
		<c:forEach var="player" items="${fifa.fifaBestEleven}" begin="1" end="4" varStatus="idx">
		<c:if test="${idx.index != 3}">
			<div class="ui center aligned ${player.icon} card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="${path}/fifa/information.ll?role=Player&type=${player.type}">
						${player.position}
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="${path}/fifa/profile.ll?role=Player&name=${player.name}">
						<img class="ui centered rounded image" src="${path}/image.ll?no=${player.profile}" style="height:150px;max-width:150px">
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
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
					<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${player.club}">
						<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${player.club}" style="max-width:20px; max-height:20px;">
						${player.club}
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted ${player.icon} progress"style="margin-top:10px;">
						<div class="bar" style="width:${player.ovr}%;">
							<div class="progress f k r" style="color:black;">
								${player.position} <i class="dot circle outline ${player.icon} icon"></i>${player.ovr}
							</div>
						</div>
						<div class="label f k r" style="color:black">
							Rankpoint <i class="futbol icon"></i> ${player.rankpoint}
						</div>
					</div>
				</div>
			</div>
		</c:if>
		</c:forEach>
		</div>
		<div class="ui three cards">
		<c:forEach var="player" items="${fifa.fifaBestEleven}" begin="5" end="7">
			<div class="ui center aligned ${player.icon} card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="${path}/fifa/information.ll?role=Player&type=${player.type}">
						${player.position}
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="${path}/fifa/profile.ll?role=Player&name=${player.name}">
						<img class="ui centered rounded image" src="${path}/image.ll?no=${player.profile}" style="height:150px;max-width:150px">
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
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
					<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${player.club}">
						<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${player.club}" style="max-width:20px; max-height:20px;">
						${player.club}
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted ${player.icon} progress"style="margin-top:10px;">
						<div class="bar" style="width:${player.ovr}%;">
							<div class="progress f k r" style="color:black;">
								${player.position} <i class="dot circle outline ${player.icon} icon"></i>${player.ovr}
							</div>
						</div>
						<div class="label f k r" style="color:black">
							Rankpoint <i class="futbol icon"></i> ${player.rankpoint}
						</div>
					</div>
				</div>
			</div>
		</c:forEach>
		</div>
		<div class="ui three cards">
		<c:forEach var="player" items="${fifa.fifaBestEleven}" begin="8" end="10">
			<div class="ui center aligned ${player.icon} card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="${path}/fifa/information.ll?role=Player&type=${player.type}">
						${player.position}
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="${path}/fifa/profile.ll?role=Player&name=${player.name}">
						<img class="ui centered rounded image" src="${path}/image.ll?no=${player.profile}" style="height:150px;max-width:150px">
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
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
					<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${player.club}">
						<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${player.club}" style="max-width:20px; max-height:20px;">
						${player.club}
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted ${player.icon} progress"style="margin-top:10px;">
						<div class="bar" style="width:${player.ovr}%;">
							<div class="progress f k r" style="color:black;">
								${player.position} <i class="dot circle outline ${player.icon} icon"></i>${player.ovr}
							</div>
						</div>
						<div class="label f k r" style="color:black">
							Rankpoint <i class="futbol icon"></i> ${player.rankpoint}
						</div>
					</div>
				</div>
			</div>
		</c:forEach>
		</div>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>