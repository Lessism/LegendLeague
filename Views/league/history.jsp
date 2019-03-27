<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="league"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r" style="margin-top:24px">
		<a class="link f k r" href="${path}/league.ll">
			Legend League
		</a>
	</h1>
	<h4 class="f k r">${league.history.history} History</h4>
	<div class="ui divider"></div>
	<c:if test="${league.history.history ne 'Season'}">
		<table class="ui center aligned celled black table f k r">
			<thead>
				<tr>
					<th colspan="8"><h1 class="f k r">Legend League</h1></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th colspan="2">타이틀</th>
					<td colspan="6">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.title.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.title.champion}">
									${league.history.title.champion}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.title.country}">
										<i class="${f:toLowerCase(league.history.title.country)} flag"></i>${league.history.title.country}
									</a>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th rowspan="4" style="border-top:1px solid rgba(34,36,38,.1);">최다</th>
					<th rowspan="2" style="border-top:1px solid rgba(34,36,38,.1);">우승</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">팀</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">감독</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">선수</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostTitleClub.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.mostTitleClub.champion}">
									${league.history.mostTitleClub.champion}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostTitleClub.country}">
										<i class="${f:toLowerCase(league.history.mostTitleClub.country)} flag"></i>${league.history.mostTitleClub.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostTitleClub.count} 회</h5></td>
					<td>
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostTitleManager.profile}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Manager&name=${league.history.mostTitleManager.manager}">
									${league.history.mostTitleManager.manager}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostTitleManager.country}">
										<i class="${f:toLowerCase(league.history.mostTitleManager.country)} flag"></i>${league.history.mostTitleManager.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostTitleManager.count} 회</h5></td>
					<td>
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostTitlePlayer.profile}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${league.history.mostTitlePlayer.name}">
									${league.history.mostTitlePlayer.name}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostTitlePlayer.country}">
										<i class="${f:toLowerCase(league.history.mostTitlePlayer.country)} flag"></i>${league.history.mostTitlePlayer.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostTitlePlayer.count} 회</h5></td>
				</tr>
				<tr>
					<th rowspan="2" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">수상</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">발롱도르</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">득점왕</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">도움왕</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostBallondor.profile}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${league.history.mostBallondor.name}">
									${league.history.mostBallondor.name}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostBallondor.country}">
										<i class="${f:toLowerCase(league.history.mostBallondor.country)} flag"></i>${league.history.mostBallondor.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostBallondor.count} 회</h5></td>
					<td>
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostGoalscorer.profile}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${league.history.mostGoalscorer.name}">
									${league.history.mostGoalscorer.name}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostGoalscorer.country}">
										<i class="${f:toLowerCase(league.history.mostGoalscorer.country)} flag"></i>${league.history.mostGoalscorer.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostGoalscorer.count} 회</h5></td>
					<td>
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostAssistprovider.profile}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${league.history.mostAssistprovider.name}">
									${league.history.mostAssistprovider.name}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostAssistprovider.country}">
										<i class="${f:toLowerCase(league.history.mostAssistprovider.country)} flag"></i>${league.history.mostAssistprovider.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostAssistprovider.count} 회</h5></td>
				</tr>
				<tr>
					<th rowspan="10" style="border-top:1px solid rgba(34,36,38,.1);">누적 전적</th>
					<th rowspan="8" style="border-top:1px solid rgba(34,36,38,.1);">구단</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">경기</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">승점</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostGame.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.mostGame.club}">
									${league.history.mostGame.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostGame.country}">
										<i class="${f:toLowerCase(league.history.mostGame.country)} flag"></i>${league.history.mostGame.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td colspan="2" style="border-left:none;"><h5 class="f k r">${league.history.mostGame.sumgame} 전</h5></td>
					<td>
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostPoint.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.mostPoint.club}">
									${league.history.mostPoint.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostPoint.country}">
										<i class="${f:toLowerCase(league.history.mostPoint.country)} flag"></i>${league.history.mostPoint.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td colspan="2" style="border-left:none;"><h5 class="f k r">${league.history.mostPoint.sumpoint} 점</h5></td>
				</tr>
				<tr>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">승리</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">무승부</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">패배</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostWin.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.mostWin.club}">
									${league.history.mostWin.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostWin.country}">
										<i class="${f:toLowerCase(league.history.mostWin.country)} flag"></i>${league.history.mostWin.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostWin.sumwin} 승</h5></td>
					<td>
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostDraw.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.mostDraw.club}">
									${league.history.mostDraw.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostDraw.country}">
										<i class="${f:toLowerCase(league.history.mostDraw.country)} flag"></i>${league.history.mostDraw.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostDraw.sumdraw} 무</h5></td>
					<td>
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostLose.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.mostLose.club}">
									${league.history.mostLose.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostLose.country}">
										<i class="${f:toLowerCase(league.history.mostLose.country)} flag"></i>${league.history.mostLose.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostLose.sumlose} 패</h5></td>
				</tr>
				<tr>
					<th colspan="6" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">승률</th>
				</tr>
				<tr>
					<td colspan="2" style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostOdds.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.mostOdds.club}">
									${league.history.mostOdds.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostOdds.country}">
										<i class="${f:toLowerCase(league.history.mostOdds.country)} flag"></i>${league.history.mostOdds.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td colspan="4" style="border-left:none;">
						<div class="ui active progress" data-percent="100" style="display:flex;">
							<div class="bar" style="width:<fmt:formatNumber value="${league.history.mostOdds.winodds}" type="percent"/>; background-color:#2ecc40;">
								<div class="progress">${league.history.mostOdds.sumwin} 승</div>
							</div>
							<div class="bar" style="width:<fmt:formatNumber value="${league.history.mostOdds.drawodds}" type="percent"/>; background-color:#ffe21f;">
								<div class="progress">${league.history.mostOdds.sumdraw} 무</div>
							</div>
							<div class="bar" style="width:<fmt:formatNumber value="${league.history.mostOdds.loseodds}" type="percent"/>; background-color:#ff695e;">
								<div class="progress">${league.history.mostOdds.sumlose} 패</div>
							</div>
							<div class="label f k r">승률 <fmt:formatNumber value="${league.history.mostOdds.winodds}" type="percent"/></div>
						</div>
					</td>
				</tr>
				<tr>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">득실차</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">득점</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">실점</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostGoaldifference.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.mostGoaldifference.club}">
									${league.history.mostGoaldifference.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostGoaldifference.country}">
										<i class="${f:toLowerCase(league.history.mostGoaldifference.country)} flag"></i>${league.history.mostGoaldifference.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostGoaldifference.summaxgoaldifference} 점</h5></td>
					<td>
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostGoalfor.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.mostGoalfor.club}">
									${league.history.mostGoalfor.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostGoalfor.country}">
										<i class="${f:toLowerCase(league.history.mostGoalfor.country)} flag"></i>${league.history.mostGoalfor.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostGoalfor.summaxgoalfor} 골</h5></td>
					<td>
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostGoalagainst.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.mostGoalagainst.club}">
									${league.history.mostGoalagainst.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostGoalagainst.country}">
										<i class="${f:toLowerCase(league.history.mostGoalagainst.country)} flag"></i>${league.history.mostGoalagainst.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostGoalagainst.summaxgoalagainst} 골</h5></td>
				</tr>
				<tr>
					<th rowspan="2" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">선수</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">평점</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">득점</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">도움</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostPlayerRating.profile}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${league.history.mostPlayerRating.player}">
									${league.history.mostPlayerRating.player}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostPlayerRating.country}">
										<i class="${f:toLowerCase(league.history.mostPlayerRating.country)} flag"></i>${league.history.mostPlayerRating.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;">
						<h5 class="f k r">
							<c:if test="${league.history.mostPlayerRating.avgrating < 100}">${f:substring(league.history.mostPlayerRating.avgrating, 0, 1)}.${f:substring(league.history.mostPlayerRating.avgrating, 1, 2)} 점</c:if>
							<c:if test="${league.history.mostPlayerRating.avgrating > 99}">10.0 점</c:if>
						</h5>
					</td>
					<td>
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostPlayerGoal.profile}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${league.history.mostPlayerGoal.player}">
									${league.history.mostPlayerGoal.player}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostPlayerGoal.country}">
										<i class="${f:toLowerCase(league.history.mostPlayerGoal.country)} flag"></i>${league.history.mostPlayerGoal.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostPlayerGoal.sumgoal} 골</h5></td>
					<td>
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.mostPlayerAssist.profile}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${league.history.mostPlayerAssist.player}">
									${league.history.mostPlayerAssist.player}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.mostPlayerAssist.country}">
										<i class="${f:toLowerCase(league.history.mostPlayerAssist.country)} flag"></i>${league.history.mostPlayerAssist.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.mostPlayerAssist.sumassist} 도움</h5></td>
				</tr>
			</tbody>
		</table>
	</c:if>
	<c:if test="${league.history.history eq 'Season'}">
		<table class="ui center aligned celled black table f k r">
			<thead>
				<tr>
					<th colspan="10"><h1 class="f k r">Legend League Season</h1></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>스코어</th>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${league.history.clubMostScore.season}">
								${league.history.clubMostScore.season}/${f:substring(league.history.clubMostScore.season+1, 2, 4)}
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<h5 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${league.history.clubMostScore.season}">
								${league.history.clubMostScore.round} Round
							</a>
						</h5>
					</td>
					<td colspan="3" style="border-left:none;">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.clubMostScore.homeemblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.clubMostScore.homename}">
									${league.history.clubMostScore.homename}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.clubMostScore.homecountry}">
										<i class="${f:toLowerCase(league.history.clubMostScore.homecountry)} flag"></i>${league.history.clubMostScore.homecountry}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.clubMostScore.score}</h5></td>
					<td colspan="3" style="border-left:none;">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.clubMostScore.awayemblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.clubMostScore.awayname}">
									${league.history.clubMostScore.awayname}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.clubMostScore.awaycountry}">
										<i class="${f:toLowerCase(league.history.clubMostScore.awaycountry)} flag"></i>${league.history.clubMostScore.awaycountry}
									</a>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th rowspan="6" style="border-top:1px solid rgba(34,36,38,.1);">클럽</th>
					<th colspan="6" style="border-top:1px solid rgba(34,36,38,.1);">승률</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">승점</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<h5 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${league.history.clubMostOdds.season}">
								${league.history.clubMostOdds.season}/${f:substring(league.history.clubMostOdds.season+1, 2, 4)}
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.clubMostOdds.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.clubMostOdds.club}">
									${league.history.clubMostOdds.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.clubMostOdds.country}">
										<i class="${f:toLowerCase(league.history.clubMostOdds.country)} flag"></i>${league.history.clubMostOdds.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td colspan="4" style="border-left:none;">
						<div class="ui active progress" data-percent="100" style="display:flex;">
							<div class="bar" style="width:<fmt:formatNumber value="${league.history.clubMostOdds.winodds}" type="percent"/>; background-color:#2ecc40;">
								<div class="progress">${league.history.clubMostOdds.maxwin} 승</div>
							</div>
							<div class="bar" style="width:<fmt:formatNumber value="${league.history.clubMostOdds.drawodds}" type="percent"/>; background-color:#ffe21f;">
								<div class="progress">${league.history.clubMostOdds.maxdraw} 무</div>
							</div>
							<div class="bar" style="width:<fmt:formatNumber value="${league.history.clubMostOdds.loseodds}" type="percent"/>; background-color:#ff695e;">
								<div class="progress">${league.history.clubMostOdds.maxlose} 패</div>
							</div>
							<div class="label f k r">승률 <fmt:formatNumber value="${league.history.clubMostOdds.winodds}" type="percent"/></div>
						</div>
					</td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${league.history.clubMostPoint.season}">
								${league.history.clubMostPoint.season}/${f:substring(league.history.clubMostPoint.season+1, 2, 4)}
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.clubMostPoint.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.clubMostPoint.club}">
									${league.history.clubMostPoint.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.clubMostPoint.country}">
										<i class="${f:toLowerCase(league.history.clubMostPoint.country)} flag"></i>${league.history.clubMostPoint.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.clubMostPoint.maxpoint} 점</h5></td>
				</tr>
				<tr>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">승리</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">무승부</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">패배</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<h5 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${league.history.clubMostWin.season}">
								${league.history.clubMostWin.season}/${f:substring(league.history.clubMostWin.season+1, 2, 4)}
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.clubMostWin.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.clubMostWin.club}">
									${league.history.clubMostWin.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.clubMostWin.country}">
										<i class="${f:toLowerCase(league.history.clubMostWin.country)} flag"></i>${league.history.clubMostWin.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.clubMostWin.maxwin} 승</h5></td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${league.history.clubMostDraw.season}">
								${league.history.clubMostDraw.season}/${f:substring(league.history.clubMostDraw.season+1, 2, 4)}
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.clubMostDraw.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.clubMostDraw.club}">
									${league.history.clubMostDraw.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.clubMostDraw.country}">
										<i class="${f:toLowerCase(league.history.clubMostDraw.country)} flag"></i>${league.history.clubMostDraw.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.clubMostDraw.maxdraw} 무</h5></td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${league.history.clubMostLose.season}">
								${league.history.clubMostLose.season}/${f:substring(league.history.clubMostLose.season+1, 2, 4)}
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.clubMostLose.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.clubMostLose.club}">
									${league.history.clubMostLose.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.clubMostLose.country}">
										<i class="${f:toLowerCase(league.history.clubMostLose.country)} flag"></i>${league.history.clubMostLose.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.clubMostLose.maxlose} 패</h5></td>
				</tr>
				<tr>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">득실차</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">득점</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">실점</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<h5 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${league.history.clubMostGoaldifference.season}">
								${league.history.clubMostGoaldifference.season}/${f:substring(league.history.clubMostGoaldifference.season+1, 2, 4)}
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.clubMostGoaldifference.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.clubMostGoaldifference.club}">
									${league.history.clubMostGoaldifference.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.clubMostGoaldifference.country}">
										<i class="${f:toLowerCase(league.history.clubMostGoaldifference.country)} flag"></i>${league.history.clubMostGoaldifference.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.clubMostGoaldifference.maxgoaldifference} 점</h5></td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${league.history.clubMostGoalfor.season}">
								${league.history.clubMostGoalfor.season}/${f:substring(league.history.clubMostGoalfor.season+1, 2, 4)}
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.clubMostGoalfor.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.clubMostGoalfor.club}">
									${league.history.clubMostGoalfor.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.clubMostGoalfor.country}">
										<i class="${f:toLowerCase(league.history.clubMostGoalfor.country)} flag"></i>${league.history.clubMostGoalfor.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.clubMostGoalfor.maxgoalfor} 골</h5></td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${league.history.clubMostGoalagainst.season}">
								${league.history.clubMostGoalagainst.season}/${f:substring(league.history.clubMostGoalagainst.season+1, 2, 4)}
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.clubMostGoalagainst.emblem}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${league.history.clubMostGoalagainst.club}">
									${league.history.clubMostGoalagainst.club}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.clubMostGoalagainst.country}">
										<i class="${f:toLowerCase(league.history.clubMostGoalagainst.country)} flag"></i>${league.history.clubMostGoalagainst.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.clubMostGoalagainst.maxgoalagainst} 골</h5></td>
				</tr>
				<tr>
					<th rowspan="2" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">선수</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">평점</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">득점</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">도움</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<h5 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${league.history.playerMostRating.season}">
								${league.history.playerMostRating.season}/${f:substring(league.history.playerMostRating.season+1, 2, 4)}
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.playerMostRating.profile}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${league.history.playerMostRating.player}">
									${league.history.playerMostRating.player}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.playerMostRating.country}">
										<i class="${f:toLowerCase(league.history.playerMostRating.country)} flag"></i>${league.history.playerMostRating.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;">
						<h5 class="f k r">
							<c:if test="${league.history.playerMostRating.avgrating < 100}">${f:substring(league.history.playerMostRating.avgrating, 0, 1)}.${f:substring(league.history.playerMostRating.avgrating, 1, 2)} 점</c:if>
							<c:if test="${league.history.playerMostRating.avgrating > 99}">10.0 점</c:if>
						</h5>
					</td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${league.history.playerMostGoal.season}">
								${league.history.playerMostGoal.season}/${f:substring(league.history.playerMostGoal.season+1, 2, 4)}
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.playerMostGoal.profile}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${league.history.playerMostGoal.player}">
									${league.history.playerMostGoal.player}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.playerMostGoal.country}">
										<i class="${f:toLowerCase(league.history.playerMostGoal.country)} flag"></i>${league.history.playerMostGoal.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.playerMostGoal.sumgoal} 골</h5></td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="${path}/league/review.ll?season=${league.history.playerMostAssist.season}">
								${league.history.playerMostAssist.season}/${f:substring(league.history.playerMostAssist.season+1, 2, 4)}
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?no=${league.history.playerMostAssist.profile}" style="height:50px">
							<div class="content">
								<a class="link f k r" href="${path}/fifa/profile.ll?role=Player&name=${league.history.playerMostAssist.player}">
									${league.history.playerMostAssist.player}
								</a>
								<div class="sub header">
									<a class="link f k r" href="${path}/fifa/country.ll?country=${league.history.playerMostAssist.country}">
										<i class="${f:toLowerCase(league.history.playerMostAssist.country)} flag"></i>${league.history.playerMostAssist.country}
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r">${league.history.playerMostAssist.sumassist} 도움</h5></td>
				</tr>
			</tbody>
		</table>
	</c:if>
</section>
<jsp:include page="../include/footer.jsp"/>