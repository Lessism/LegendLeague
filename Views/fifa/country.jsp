<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="fifa"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r"><a href="${path}/fifa.ll" style="color:black;">FIFA</a></h1>
	<div class="ui header">
		<div class="content">
			<h4 class="f k r">Country</h4>
			<div class="sub header">
				<h4 class="f k r"><i class="${f:toLowerCase(fifa.country)} flag"></i>${fifa.country}</h4>
			</div>
		</div>
	</div>
	<div class="ui divider"></div>
	<div class="ui grid">
		<div class=""></div>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>