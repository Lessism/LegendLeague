<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="league"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r"><a href="${path}/league.ll" style="color:black;">Legend League</a></h1>
	<h4 class="f k r">
		<c:choose>
			<c:when test="${league.award.award eq 'champion'}">Legend League Champion</c:when>
			<c:when test="${league.award.award eq 'manager'}">FIFA World Manager</c:when>
			<c:when test="${league.award.award eq 'ballondor'}">Ballon Dor</c:when>
			<c:when test="${league.award.award eq 'goalscorer'}">Goal Scorer</c:when>
			<c:when test="${league.award.award eq 'assistprovider'}">Assist Provider</c:when>
		</c:choose>	Award
	</h4>
	<div class="ui divider"></div>
	<div class="ui grid">
		<div class="eleven wide column">
		<c:if test="${!empty league.award.count}">
			<div class="ui black segment items">
				<div class="ui center aligned header f k r">
					<c:choose>
						<c:when test="${league.award.award eq 'champion'}">Legend League</c:when>
						<c:when test="${league.award.award eq 'manager'}">올해의 감독</c:when>
						<c:when test="${league.award.award eq 'ballondor'}">발롱도르</c:when>
						<c:when test="${league.award.award eq 'goalscorer'}">득점왕</c:when>
						<c:when test="${league.award.award eq 'assistprovider'}">도움왕</c:when>
					</c:choose>
					<c:choose>
						<c:when test="${league.award.award eq 'champion'}">최다 우승팀</c:when>
						<c:otherwise>최다 수상자</c:otherwise>
					</c:choose>
				</div>
				<div class="ui divider"></div>
				<div class="item">
					<div class="image" style="${league.award.role ne 'Club' ? 'max-height:125px;' : ''}">
						<img src="${path}/image.ll?role=${league.award.role}&name=${league.award.count[0].name}" style="${league.award.role eq 'Club' ? 'width:150px; height:150px;' : ''} border-radius:10px;">
					</div>
					<div class="middle aligned content">
						<div><h3 class="f k r">${league.award.count[0].name}</h3></div>
						<div class="meta">
							<i class="${f:toLowerCase(league.award.count[0].country)} flag"></i>${league.award.count[0].country}
						</div>
						<div class="meta">
							<c:if test="${league.award.role eq 'Club'}">
								<img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=${league.award.count[0].stadium}">${league.award.count[0].stadium}
							</c:if>
							<c:if test="${league.award.role ne 'Club'}">
								<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${league.award.count[0].club}">${league.award.count[0].club}
							</c:if>
						</div>
						<div class="description" style="text-align:right;">
							<h3 class="f k r">
								${league.award.count[0].count} 회 
								<c:choose>
									<c:when test="${league.award.award eq 'champion'}">우승</c:when>
									<c:otherwise>수상</c:otherwise>
								</c:choose>
							</h3>
						</div>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="ui middle aligned divided list">
					<c:forEach var="award" items="${league.award.count}" begin="1">
						<c:if test="${!empty award.name}">
							<div class="item">
								<div class="right floated content">${award.count} 회</div>
								<img class="ui avatar image" src="${path}/image.ll?role=${league.award.role}&name=${award.name}">
								<div class="content">
									<div class="header">${award.name}</div>
									<div class="description">
										<c:if test="${league.award.role eq 'Club'}">
											<img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=${award.stadium}">${award.stadium}
										</c:if>
										<c:if test="${league.award.role ne 'Club'}">
											<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${award.club}">${award.club}
										</c:if>
									</div>
								</div>
							</div>
						</c:if>
					</c:forEach>
				</div>
			</div>
		</c:if>
		</div>
		<div class="five wide column">
			<div class="ui center aligned black segment">
				<h3 class="f k r">
					<c:choose>
						<c:when test="${league.award.award eq 'champion'}">년도별 우승팀</c:when>
						<c:otherwise>년도별 수상자</c:otherwise>
					</c:choose>
				</h3>
				<div class="ui divider"></div>
				<table class="ui striped center aligned table">
					<thead>
						<tr class="ui inverted center aligned table f k r">
							<th colspan="2">${league.award.role}</th>
							<th>Season</th>
						</tr>
					</thead>
					<tbody>
						<c:forEach var="award" items="${league.award.list}" varStatus="idx">
							<c:if test="${!empty award.name}">
								<tr>
									<td style="width:25%"><img class="ui avatar image" src="${path}/image.ll?role=${league.award.role}&name=${award.name}"></td>
									<td>${award.name}</td>
									<td>${award.season}/${f:substring(award.season+1, 2, 4)}</td>
								</tr>
							</c:if>
						</c:forEach>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>