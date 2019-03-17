<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<c:if test="${rail == 'league'}">
	<div class="ui left very close rail">
		<div class="ui black sticky segment" id="rail">
			<div class="header"><h3 class="f k r"><a class="rail item f k r" href="${path}/league.ll" style="color:black;">League</a></h3></div>
			<div class="ui divider"></div>
			<div class="ui secondary vertical menu">
				<div class="item">
					<h4 class="f k r">Season</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r" href="${path}/league/season_preview.ll">Preview</a>
						<a class="rail item f k r" href="${path}/league/season_ranking.ll">Ranking</a>
						<a class="rail item f k r" href="${path}/league/season_match.ll">Match</a>
					</div>
				</div>
				<a class="rail item f k r" href="${path}/league/award.ll">Award</a>
				<a class="rail item f k r" href="${path}/league/history.ll">History</a>
			</div>
		</div>
	</div>
</c:if>
<script>
$(function(){
	for (i = 0; i < $('.rail.item').length; i++){
		if ($('.rail.item').eq(i).attr('href') == window.location.pathname){
			$('.rail.item').eq(i).addClass('active')
		}
	}
})
</script>