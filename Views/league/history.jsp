<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="league"/>
<%@ include file="../include/rail.jsp" %>

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