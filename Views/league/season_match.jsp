<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="league"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r">Season Match</h1>
	<div class="ui divider"></div>
	<div class="ui black segment">
		<div class="ui center aligned container"><h3 class="f k r">경기 일정</h3></div>
		<div class="ui divider"></div>
		<c:if test="${empty ranking.club}">
			<div class="ui center aligned container f k r">지금은 Free Season 입니다.</div>
		</c:if>
		<c:if test="${!empty ranking.club}">
			<div class="ui center aligned black segment" id="matchSection">
			<h3 class="f k r">${league.round} Round</h3>
				<c:forEach var="match" items="${league.match}">
					<div class="ui segment">
						<div class="ui middle aligned grid">
							<div class="one wide column"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${f:split(match.versus,'_')[0]}"></div>
							<div class="left floated right aligned five wide column"><span class="f k r">${f:split(match.versus,'_')[0]}</span></div>
							<div class="ui center aligned four wide column"><span class="versus f k r ${f:replace(match.versus, ' ', '_')}">VS</span></div>
							<div class="right floated left aligned five wide column"><span class="f k r">${f:split(match.versus,'_')[1]}</span></div>
							<div class="one wide column"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${f:split(match.versus,'_')[1]}"></div>
						</div>
						<div class="ui grid " style="display:none;">
							<div class="sixteen wide column" style="padding:5px"><div class="ui fitted divider"></div></div>
							<div class="right aligned seven wide column ${f:replace(f:split(match.versus,'_')[0], ' ', '_')}"></div>
							<div class="center aligned two wide column goal"></div>
							<div class="left aligned seven wide column ${f:replace(f:split(match.versus,'_')[1], ' ', '_')}"></div>
						</div>
					</div>
				</c:forEach>
			</div>
		</c:if>
</section>
<jsp:include page="../include/footer.jsp"/>