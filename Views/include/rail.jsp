<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ taglib prefix="f" uri="http://java.sun.com/jsp/jstl/functions" %>
<c:if test="${rail == 'league'}">
	<div class="ui left very close rail">
		<div class="ui black sticky segment" id="rail">
			<div class="header"><h3 class="f k r"><a class="rail item f k r" href="${path}/league.ll" style="color:black;">League</a></h3></div>
			<div class="ui divider"></div>
			<div class="ui secondary vertical menu">
				<div class="item">
					<h4 class="f k r">${league.season}/${f:substring(league.season+1, 2, 4)} Season</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r" href="${path}/league/preview.ll">Preview</a>
						<a class="rail item f k r" href="${path}/league/ranking.ll">Ranking</a>
						<a class="rail item f k r" href="${path}/league/match.ll">Match</a>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="item">
					<h4 class="f k r">Before Season</h4>
					<div class="ui secondary vertical pointing menu">
						<c:forEach begin="0" end="2" varStatus="idx">
							<a class="rail item f k r" href="${path}/league/review.ll?season=${league.season-idx.count}">${league.season-idx.count}/${f:substring(league.season-idx.count+1, 2, 4)}</a>
						</c:forEach>
					</div>
				</div>
				<div class="ui fluid selection dropdown">
					<div class="default text">Season</div>
					<i class="dropdown icon"></i>
					<div class="menu">
						<c:forEach begin="0" end="${league.season-2023}" step="1" varStatus="idx">
							<a class="rail item f k r" href="${path}/league/review.ll?season=${league.season-3-idx.count}">${league.season-3-idx.count}/${f:substring(league.season-2-idx.count, 2, 4)}</a>
						</c:forEach>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="item">
					<h4 class="f k r">Award</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r" href="${path}/league/award.ll?award=champion">Legend League Champion</a>
						<a class="rail item f k r" href="${path}/league/award.ll?award=manager">FIFA World Manager</a>
						<a class="rail item f k r" href="${path}/league/award.ll?award=ballondor">Ballon Dor</a>
						<a class="rail item f k r" href="${path}/league/award.ll?award=goalscorer">Goal Scorer</a>
						<a class="rail item f k r" href="${path}/league/award.ll?award=assistprovider">Assist Provider</a>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="item">
					<h4 class="f k r">History</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r" href="${path}/league/history.ll?history=League">League</a>
						<a class="rail item f k r" href="${path}/league/history.ll?history=Season">Season</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</c:if>
<c:if test="${rail == 'fifa'}">
	<div class="ui left very close rail">
		<div class="ui black sticky segment" id="rail">
			<div class="header"><h3 class="f k r"><a class="rail item f k r" href="${path}/fifa.ll" style="color:black;">FIFA</a></h3></div>
			<div class="ui divider"></div>
			<div class="ui secondary vertical menu">
				<div class="item">
					<h4 class="f k r">Club</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r awards club" href="${path}/fifa/awards.ll?role=Club&award=champion&season=${fifa.season-1}">Legend League Champion</a>
						<a class="rail item f k r" href="${path}/fifa/information.ll?role=Club">Information</a>
						<a class="rail item f k r" href="${path}/league/ranking.ll">List</a>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="item">
					<h4 class="f k r">Manager</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r awards manager" href="${path}/fifa/awards.ll?role=Manager&award=manager&season=${fifa.season-1}">FIFA World Manager</a>
						<a class="rail item f k r" href="${path}/fifa/information.ll?role=Manager">Information</a>
						<a class="rail item f k r" href="${path}/league/history.ll?history=Season">List</a>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="item">
					<h4 class="f k r">Player</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r awards player" href="${path}/fifa/awards.ll?role=Player&award=ballondor&season=${fifa.season-1}">FIFA World Player</a>
						<a class="rail item f k r" href="${path}/fifa/information.ll?role=Player">Information</a>
						<a class="rail item f k r" href="${path}/fifa/profile.ll?role=Manager&name=Pep Guardiola">Info</a>
						<a class="rail item f k r" href="${path}/fifa/list.ll?history=Season">List</a>
						<a class="rail item f k r" href="${path}/league/history.ll?history=League"><i class="dot circle outline red icon"></i>Forward</a>
						<a class="rail item f k r" href="${path}/league/history.ll?history=Season"><i class="dot circle outline green icon"></i>Midfielder</a>
						<a class="rail item f k r" href="${path}/league/history.ll?history=Season"><i class="dot circle outline blue icon"></i>Defender</a>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="ui icon input">
					<input type="text" placeholder="Search Player">
					<i class="search icon"></i>
				</div>
				<div class="ui divider"></div>
				<div class="ui fluid selection dropdown">
					<div class="default text">Country</div>
					<i class="dropdown icon"></i>
					<div class="menu">
						<a class="rail item f k r" href="${path}/league/review.ll?season=">Korea</a>
						<a class="rail item f k r" href="${path}/league/review.ll?season=">Korea</a>
						<a class="rail item f k r" href="${path}/league/review.ll?season=">Korea</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</c:if>
<c:if test="${rail == 'personal'}">
	<div class="ui left very close rail">
		<div class="ui black sticky segment" id="rail">
			<div class="header"><h3 class="f k r"><a class="rail item f k r" href="${path}/fifa/information.ll?role=${fifa.role}" style="color:black;">${fifa.role}</a></h3></div>
			<div class="ui divider"></div>
			<div class="ui secondary vertical menu">
				<div class="item">
					<h4 class="f k r">${fifa.name}</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r" href="${path}/fifa/country.ll?country=${fifa.personal.country}"><i class="${f:toLowerCase(fifa.personal.country)} flag"></i>${fifa.personal.country}</a>
						<c:if test="${fifa.role ne 'Club'}"><a class="rail item f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.personal.club}"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.personal.club}" style="height:17.5px;width:17.5px">${fifa.personal.club}</a></c:if>
						<c:if test="${fifa.role eq 'Club'}"><a class="rail item f k r" href="${path}/fifa/stadium.ll?role=Club&name=${fifa.name}"><img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=${fifa.personal.stadium}" style="height:17.5px;width:17.5px">${fifa.personal.stadium}</a></c:if>
					</div>
					<div class="ui divider"></div>
					<h4 class="f k r">Information</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.name}">Profile</a>
						<a class="rail item f k r" href="${path}/fifa/detail.ll?role=${fifa.role}&name=${fifa.name}">Detail</a>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="item">
					<h4 class="f k r">History</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r" href="${path}/fifa/title.ll?role=${fifa.role}&name=${fifa.name}">Title</a>
						<a class="rail item f k r" href="${path}/fifa/award.ll?role=${fifa.role}&name=${fifa.name}">Award</a>
						<a class="rail item f k r" href="${path}/fifa/record.ll?role=${fifa.role}&name=${fifa.name}">Record</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</c:if>
<script>
$(function(){
	for (i = 0; i < $('.rail.item').length; i++){
		if ($('.rail.item').eq(i).attr('href') == window.location.pathname || $('.rail.item').eq(i).attr('href') == window.location.pathname + window.location.search.replace('%20', ' ')){
			$('.rail.item').eq(i).addClass('active')
		}
	}
})
</script>