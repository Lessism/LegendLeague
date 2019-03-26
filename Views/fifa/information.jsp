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
	<c:if test="${fifa.role eq 'Player'}">
		<div class="ui grid">
			<div class="eleven wide column">
			</div>
			<div class="five wide column">
				<div class="ui center aligned black segment">
					<h3 class="f k r">Title</h3>
					<div class="ui divider"></div>
					<table class="ui striped center aligned table">
					</table>
				</div>
				<div class="ui center aligned black segment">
					<h3 class="f k r">통산 성적</h3>
					<div class="ui divider"></div>
					<table class="ui striped center aligned table">
					</table>
				</div>
			</div>
		</div>
	</c:if>
</section>
<jsp:include page="../include/footer.jsp"/>