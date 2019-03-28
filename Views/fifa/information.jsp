<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="fifa"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r"><a href="${path}/fifa.ll" style="color:black;">FIFA</a></h1>
	<h4 class="f k r">
		<c:choose>
			<c:when test="${fifa.role eq 'Club'}">Club Information</c:when>
			<c:when test="${fifa.role eq 'Manager'}">Manager Information</c:when>
			<c:otherwise>Player Information</c:otherwise>
		</c:choose>
	</h4>
	<div class="ui divider"></div>
	<c:if test="${fifa.role eq 'Club'}">
		<div class="ui grid">
			<div class="eleven wide column">
				<div class="ui black segment">
					<div class="ui center aligned header f k r">
						<h2>
							<a class="link f k r" href="">
								FIFA Club Ranking
							</a>
						</h2>
					</div>
					<div class="ui divider"></div>
					<div class="ui center aligned segment item">
						<a class="image" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.information.rank[0].name}">
							<img src="${path}/image.ll?role=${fifa.role}&name=${fifa.information.rank[0].name}" style="max-width:250px; max-height:250px; border-radius:10px;">
						</a>
						<div class="ui divider"></div>
						<div class="middle aligned content">
							<div class="header">
								<h3 class="f k r">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.information.rank[0].name}">
										${fifa.information.rank[0].name}
									</a>
								</h3>
							</div>
							<div class="meta">
								<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${fifa.information.rank[0].name}">
									<img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=${fifa.information.rank[0].stadium}" style="max-width:20px; max-height:20px;">
									${fifa.information.rank[0].stadium}
								</a>
							</div>
							<div class="description">
								<div class="ui active inverted black progress"style="margin-top:10px;">
									<div class="bar" style="width:${fifa.information.rank[0].ovr}%;">
										<div class="progress f k r">
											OVR <i class="dot circle outline white icon"></i>${fifa.information.rank[0].ovr}
										</div>
									</div>
									<div class="label f k r" style="color:black">
										Rankpoint <i class="futbol icon"></i> ${fifa.information.rank[0].rankpoint}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ui middle aligned divided list">
						<c:forEach var="club" items="${fifa.information.rank}" begin="1">
							<div class="item" style="vertical-align:middle;">
								<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${club.name}">
								<div class="content">
									<div class="header">
										<h5 class="f k r">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${club.name}">
												${club.name}
											</a>
										</h5>
									</div>
									<div class="meta">
										<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${club.name}">
											<img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=${club.stadium}" style="max-width:20px; max-height:20px;">
											${club.stadium}
										</a>
									</div>
								</div>
								<div class="right floated content">
									<h5 class="f k r">
										<i class="futbol icon"></i>${club.rankpoint}
									</h5>
								</div>
							</div>
						</c:forEach>
					</div>
				</div>
			</div>
			<div class="five wide column">
				<div class="ui center aligned black segment">
					<h3 class="f k r">
						<a class="link f k r" href="${path}/league/award.ll?award=champion">
							최다 우승
						</a>
					</h3>
					<div class="ui divider"></div>
					<table class="ui center aligned table">
						<thead>
							<tr class="f k r">
								<th style="width:15%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.information.ranktitle[0].name}">
										<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${fifa.information.ranktitle[0].name}">
									</a>
								</th>
								<th style="width:60%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.information.ranktitle[0].name}">
										${fifa.information.ranktitle[0].name}
									</a>
								</th>
								<th style="width:25%">
									<a class="link f k r" href="${path}/league/award.ll?award=champion">
										${fifa.information.ranktitle[0].countawards} 회
									</a>
								</th>
							</tr>
						</thead>
						<tbody>
							<c:forEach var="title" items="${fifa.information.ranktitle}" begin="1" end="4">
								<tr>
									<td style="width:15%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${title.name}">
											<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${title.name}">
										</a>
									</td>
									<td style="width:60%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${title.name}">
											${title.name}
										</a>
									</td>
									<td style="width:25%">
										<a class="link f k r" href="${path}/league/award.ll?award=champion">
											${title.countawards} 회
										</a>
									</td>
								</tr>
							</c:forEach>
						</tbody>
					</table>
				</div>
				<div class="ui center aligned black segment">
					<h3 class="f k r">
						<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.information.rankold[0].name}">
							명문 구단
						</a>
					</h3>
					<div class="ui divider"></div>
					<table class="ui center aligned table">
						<thead>
							<tr class="f k r">
								<th style="width:75%" colspan="2">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.information.rankold[0].name}">
										구단
									</a>
								</th>
								<th style="width:25%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.information.rankold[0].name}">
										창단
									</a>
								</th>
							</tr>
						</thead>
						<tbody>
							<c:forEach var="title" items="${fifa.information.rankold}" end="2">
								<tr>
									<td style="width:15%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${title.name}">
											<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${title.name}">
										</a>
									</td>
									<td style="width:60%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${title.name}">
											${title.name}
										</a>
									</td>
									<td style="width:25%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${title.name}">
											<fmt:formatDate value="${title.regdate}" pattern="yyyy년"/>
										</a>
									</td>
								</tr>
							</c:forEach>
						</tbody>
					</table>
				</div>
				<div class="ui center aligned black segment">
					<h3 class="f k r">
						<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.information.ranknew[0].name}">
							신생 구단
						</a>
					</h3>
					<div class="ui divider"></div>
					<table class="ui center aligned table">
						<thead>
							<tr class="f k r">
								<th style="width:75%" colspan="2">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.information.ranknew[0].name}">
										구단
									</a>
								</th>
								<th style="width:25%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.information.ranknew[0].name}">
										창단
									</a>
								</th>
							</tr>
						</thead>
						<tbody>
							<c:forEach var="title" items="${fifa.information.ranknew}" end="2">
								<tr>
									<td style="width:15%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${title.name}">
											<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&name=${title.name}">
										</a>
									</td>
									<td style="width:60%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${title.name}">
											${title.name}
										</a>
									</td>
									<td style="width:25%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${title.name}">
											<fmt:formatDate value="${title.regdate}" pattern="yyyy년"/>
										</a>
									</td>
								</tr>
							</c:forEach>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</c:if>
	<c:if test="${fifa.role ne 'Club'}">
		<div class="ui grid">
			<div class="eleven wide column">
				<div class="ui black segment">
					<div class="ui center aligned header f k r">
						<h2>
							<a class="link f k r" href="">
								FIFA ${empty fifa.type ? fifa.role : ''} ${!empty fifa.type ? fifa.information.rank[0].fulltype : ''} Ranking
							</a>
						</h2>
					</div>
					<div class="ui divider"></div>
					<div class="ui center aligned segment item">
						<a class="image" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.information.rank[0].name}">
							<img src="${path}/image.ll?role=${fifa.role}&name=${fifa.information.rank[0].name}" style="max-width:250px; max-height:250px; border-radius:10px;">
						</a>
						<div class="ui divider"></div>
						<div class="middle aligned content">
							<div class="header">
								<h3 class="f k r">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.information.rank[0].name}">
										${fifa.information.rank[0].name}
									</a>
								</h3>
							</div>
							<div class="meta">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.information.rank[0].club}">
									<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.information.rank[0].club}" style="max-width:20px; max-height:20px;">
									${fifa.information.rank[0].club}
								</a>
							</div>
							<div class="description">
										<div class="progress f k r" style="color:black">
											${fifa.countryinfo.rankplayer[0].ovr}
										</div>
								<div class="ui active inverted ${fifa.role eq 'Manager' ? 'black' : fifa.information.rank[0].icon} progress"style="margin-top:10px;">
									<div class="bar" style="width:${fifa.information.rank[0].ovr}%;">
										<div class="progress f k r"  style="color:${fifa.role eq 'Player' ? 'black' : ''}">
										<c:if test="${fifa.role eq 'Player'}">
											${fifa.information.rank[0].position}<i class="dot circle outline ${fifa.information.rank[0].icon} icon"></i>
										</c:if>
										<c:if test="${fifa.role ne 'Player'}">
											OVR <i class="dot circle outline white icon"></i>
										</c:if>
											${fifa.information.rank[0].ovr}
										</div>
									</div>
									<div class="label f k r" style="color:black">
										Rankpoint <i class="futbol icon"></i> ${fifa.information.rank[0].rankpoint}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ui middle aligned divided list">
						<c:forEach var="role" items="${fifa.information.rank}" begin="1">
							<div class="item" style="vertical-align:middle;">
								<img class="ui avatar image" src="${path}/image.ll?role=${fifa.role}&name=${role.name}">
								<div class="content">
									<div class="header">
										<h5 class="f k r">
											<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${role.name}">
												${role.name}
											</a>
										</h5>
									</div>
									<div class="meta">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${role.club}">
											<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${role.club}" style="max-width:20px; max-height:20px;">
											${role.club}
										</a>
									</div>
								</div>
								<div class="right floated content">
									<h5 class="f k r">
										<i class="futbol icon"></i>${role.rankpoint}
									</h5>
								</div>
							</div>
						</c:forEach>
					</div>
				</div>
			</div>
			<div class="five wide column">
			<c:if test="${!empty fifa.information.ranktitle}">
				<div class="ui center aligned black segment">
					<h3 class="f k r">
						<a class="link f k r" href="${path}/league/award.ll?award=${fifa.role eq 'Manager' ? 'manager' : 'ballondor'}">
							최다 수상
						</a>
					</h3>
					<div class="ui divider"></div>
					<table class="ui center aligned table">
						<thead>
							<tr class="f k r">
								<th style="width:15%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.information.ranktitle[0].name}">
										<img class="ui avatar image" src="${path}/image.ll?role=${fifa.role}&name=${fifa.information.ranktitle[0].name}">
									</a>
								</th>
								<th style="width:60%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.information.ranktitle[0].name}">
										${fifa.information.ranktitle[0].name}
									</a>
								</th>
								<th style="width:25%">
								<c:if test="${fifa.role eq 'Manager'}">
									<a class="link f k r" href="${path}/league/award.ll?award=manager">
										${fifa.information.ranktitle[0].countawards} 회
									</a>
								</c:if>
								<c:if test="${fifa.role eq 'Player'}">
									<a class="link f k r" href="${path}/league/award.ll?award=ballondor">
										${fifa.information.ranktitle[0].countawards} 회
									</a>
								</c:if>
								</th>
							</tr>
						</thead>
						<tbody>
							<c:forEach var="title" items="${fifa.information.ranktitle}" begin="1" end="4">
								<tr>
									<td style="width:15%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${title.name}">
											<img class="ui avatar image" src="${path}/image.ll?role=${fifa.role}&name=${title.name}">
										</a>
									</td>
									<td style="width:60%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${title.name}">
											${title.name}
										</a>
									</td>
									<td style="width:25%">
										<a class="link f k r" href="${path}/league/award.ll?award=manager">
											${title.countawards} 회
										</a>
									</td>
								</tr>
							</c:forEach>
						</tbody>
					</table>
				</div>
			</c:if>
				<div class="ui center aligned black segment">
					<h3 class="f k r">
						<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.information.rankold[0].name}">
							최고령 ${fifa.role eq 'Manager' ? '감독' : '선수'}
						</a>
					</h3>
					<div class="ui divider"></div>
					<table class="ui center aligned table">
						<thead>
							<tr class="f k r">
								<th style="width:75%" colspan="2">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.information.rankold[0].name}">
										${fifa.role eq 'Manager' ? '감독' : '선수'}
									</a>
								</th>
								<th style="width:25%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.information.rankold[0].name}">
										출생
									</a>
								</th>
							</tr>
						</thead>
						<tbody>
							<c:forEach var="title" items="${fifa.information.rankold}" end="2">
								<tr>
									<td style="width:15%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${title.name}">
											<img class="ui avatar image" src="${path}/image.ll?role=${fifa.role}&name=${title.name}">
										</a>
									</td>
									<td style="width:60%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${title.name}">
											${title.name}
										</a>
									</td>
									<td style="width:25%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${title.name}">
											${f:substring(title.birth, 0, 4)} 년
										</a>
									</td>
								</tr>
							</c:forEach>
						</tbody>
					</table>
				</div>
				<div class="ui center aligned black segment">
					<h3 class="f k r">
						<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.information.ranknew[0].name}">
							최연소 ${fifa.role eq 'Manager' ? '감독' : '선수'}
						</a>
					</h3>
					<div class="ui divider"></div>
					<table class="ui center aligned table">
						<thead>
							<tr class="f k r">
								<th style="width:75%" colspan="2">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.information.ranknew[0].name}">
										${fifa.role eq 'Manager' ? '감독' : '선수'}
									</a>
								</th>
								<th style="width:25%">
									<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.information.ranknew[0].name}">
										출생
									</a>
								</th>
							</tr>
						</thead>
						<tbody>
							<c:forEach var="title" items="${fifa.information.ranknew}" end="2">
								<tr>
									<td style="width:15%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${title.name}">
											<img class="ui avatar image" src="${path}/image.ll?role=${fifa.role}&name=${title.name}">
										</a>
									</td>
									<td style="width:60%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${title.name}">
											${title.name}
										</a>
									</td>
									<td style="width:25%">
										<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${title.name}">
											${f:substring(title.birth, 0, 4)} 년
										</a>
									</td>
								</tr>
							</c:forEach>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</c:if>
</section>
<jsp:include page="../include/footer.jsp"/>