<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
	<div class="ui three column grid">
		<div class="column">
			<a href="${path}/fifa/join_club.ll">구단 생성</a>
		</div>
		<div class="column">
			<a href="${path}/fifa/join_manager.ll">감독 생성</a>
		</div>
		<div class="column">
			<a href="${path}/fifa/join_player.ll">선수 생성</a>
		</div>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>