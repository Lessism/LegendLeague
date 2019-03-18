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
		<c:if test="${empty season.round}">
			<div class="ui center aligned container f k r">지금은 Free Season 입니다.</div>
		</c:if>
		<c:if test="${!empty season.round}">
			<c:forEach begin="0" end="${season.maxRound}" varStatus="idx" step="10">
				<div class="ui tabular ten item menu">
					<c:forEach begin="0" end="9" varStatus="indx">
					<c:if test="${season.maxRound >= idx.index+indx.count}">
						<a class="tabular item f k r ${season.nowRound == idx.index+indx.count ? 'active' : ''}" data-tab="round${idx.index+indx.count}">${idx.index+indx.count} Round</a>
					</c:if>
					</c:forEach>
				</div>
			</c:forEach>
			<c:forEach var="round" items="${season.round}">
				<c:forEach var="match" items="${round}" varStatus="idx">
					<c:if test="${idx.index == 0}">
						<div class="ui center aligned black segment tab ${season.nowRound == match.round ? 'active' : ''}" data-tab="round${match.round}">
							<h3 class="f k r">${match.round} Round</h3>
					</c:if>
							<div class="ui segment">
								<div class="ui middle aligned grid">
									<div class="one wide column"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${f:split(match.versus, '_')[0]}"></div>
									<div class="left floated right aligned five wide column"><span class="f k r">${f:split(match.versus, '_')[0]}</span></div>
									<div class="ui center aligned four wide column"><span class="f k r">${!empty match.score ? match.score : 'VS'}</span></div>
									<div class="right floated left aligned five wide column"><span class="f k r">${f:split(match.versus, '_')[1]}</span></div>
									<div class="one wide column"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${f:split(match.versus, '_')[1]}"></div>
								</div>
								<c:if test="${!empty match.goal}">
									<div class="ui grid">
										<div class="sixteen wide column" style="padding:5px"><div class="ui fitted divider"></div></div>
										<div class="right aligned seven wide column">
											<c:forEach var="goal" items="${match.goal}">
												<div>${f:split(match.versus,'_')[0] eq goal.club ? goal.player : ''}</div>
											</c:forEach>
										</div>
										<div class="center aligned two wide column">
											<c:forEach var="goal" items="${match.goal}" varStatus="idx">
												<c:if test="${idx.count <= (f:split(match.score, ' : ')[0] >= f:split(match.score, ' : ')[1] ? f:split(match.score, ' : ')[0] : f:split(match.score, ' : ')[1])}">
													<div><i class="futbol icon"></i></div>
												</c:if>
											</c:forEach>
										</div>
										<div class="left aligned seven wide column">
											<c:forEach var="goal" items="${match.goal}">
												<div>${f:split(match.versus,'_')[1] eq goal.club ? goal.player : ''}</div>
											</c:forEach>
										</div>
									</div>
								</c:if>
							</div>
				</c:forEach>
						</div>
			</c:forEach>
		</c:if>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>