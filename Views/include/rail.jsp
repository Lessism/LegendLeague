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
						<a class="rail item f k r" href="${path}/league/award.ll?award=champion">Champion</a>
						<a class="rail item f k r" href="${path}/league/award.ll?award=manager">FIFA World Manager</a>
						<a class="rail item f k r" href="${path}/league/award.ll?award=ballondor">Ballon Dor</a>
						<a class="rail item f k r" href="${path}/league/award.ll?award=goalscorer">Goal Scorer</a>
						<a class="rail item f k r" href="${path}/league/award.ll?award=assistprovider">Assist Provider</a>
					</div>
				</div>
				<div class="ui divider"></div>
				<a class="rail item f k r" href="${path}/league/history.ll">History</a>
			</div>
		</div>
	</div>
</c:if>
<script>
$(function(){
	for (i = 0; i < $('.rail.item').length; i++){
		if ($('.rail.item').eq(i).attr('href') == window.location.pathname || $('.rail.item').eq(i).attr('href') == window.location.pathname + window.location.search){
			$('.rail.item').eq(i).addClass('active')
		}
	}
})
</script>