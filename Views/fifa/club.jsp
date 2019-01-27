<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<div class="ui grid">
	<div class="ui five wide column card">
		<img class="ui rounded fluid image" src="${path}/image.ll?role=Club&img=emblem&name=${info.name}">
		<div class="ui segment">
			<div class="header">
				${info.name}
			</div>
			<div class="meta">
				${info.stadium}
			</div>
		</div>
	</div>
	<div class="ui eleven wide column container">
		<h3 class="ui header f k r">세부정보</h3>
		<hr>
		<div class="ui grid">
			<div class="ui eight wide column">
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="anchorage">연고지</label>
						<input type="text" name="anchorage" id="anchorage" value="${info.anchorage}" readonly>
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="regdate">창단일자</label>
						<input type="text" name="regdate" id="regdate" value="${info.regdate}" readonly>
					</div>
				</div>
			</div>
			<div class="ui eight wide column">
			
			</div>
		</div>
	</div>
</div>
</section>
<jsp:include page="../include/footer.jsp"/>