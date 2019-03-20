<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="league"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r"><a href="${path}/league.ll" style="color:black;">Legend League</a></h1>
	<h4 class="f k r">History</h4>
	<div class="ui divider"></div>
		<table class="ui center aligned celled black table f k r">
			<thead>
				<tr>
					<th colspan="4"><h1 class="f k r">Legend League</h1></th>
				</tr>
			</thead>
			<tbody class="ui center aligned celled black table f k r">
				<tr>
					<th>타이틀</th>
					<td colspan="3">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?role=Club&name=Real Madrid" style="height:50px">
							<div class="content">
								Real Madrid
								<div class="sub header">
									<i class="spain flag"></i>Spain
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th style="border-top:1px solid rgba(34,36,38,.1)">최다 우승팀</th>
					<td colspan="2">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?role=Club&name=Real Madrid" style="height:50px">
							<div class="content">Real Madrid
								<div class="sub header">
									<i class="spain flag"></i>Spain
								</div>
							</div>
						</div>
					</td>
					<td>3회</td>
				</tr>
				<tr>
					<th style="border-top:1px solid rgba(34,36,38,.1)">리그 최다 경기 승점 승리 승률 출장 어시스트 2019/20 Season</th>
					<td colspan="2">
						<div class="ui image header f k r">
							<img class="ui rounded image" src="${path}/image.ll?role=Club&name=Real Madrid" style="height:50px">
							<div class="content">Real Madrid
								<div class="sub header">
									<i class="spain flag"></i>Spain
								</div>
							</div>
						</div>
					</td>
					<td>
						<div class="ui active progress" data-percent="100" style="display:flex;">
							<div class="bar" style="width:75%; background-color:#2ecc40;">
								<div class="progress">${league.ranking[0].win} 승</div>
							</div>
							<div class="bar" style="width:10%; background-color:#ffe21f;">
								<div class="progress">${league.ranking[0].draw} 무</div>
							</div>
							<div class="bar" style="width:15%; background-color:#ff695e;">
								<div class="progress">${league.ranking[0].lose} 패</div>
							</div>
							<div class="label f k r">승률 <fmt:formatNumber value="0.75" type="percent"/></div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>

최다 점수차
SELECT 
* 
FROM 
Round
order by
score DESC

시즌 최다 평점 골 어시
SELECT
*, avg(rating), sum(goal), sum(assist)
FROM
Score
group by
player, season

시즌 최다 승점 실점 득점 승 무 패
SELECT 
*
FROM 
Ranking
order by
point DESC
limit 1

역대 전적 승 무 패 득점 실점



</section>
<jsp:include page="../include/footer.jsp"/>