<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="league"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r">Legend League Award</h1>
	<div class="ui divider"></div>
	<div class="ui black segment">
		<div>
		
		</div>
		${league.award.award}
		${league.award.count}
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>