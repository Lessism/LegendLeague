<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<div class="ui grid">
	<div class="ui five wide column card">
		<img class="ui rounded fluid image" src="data:image/*; base64, ${info.profile}">
		<div class="ui segment">
			<div class="header">
				${info.name}
			</div>
			<div class="meta">
				${info.club}
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
						<label class="ui basic label llab f k r" for="country">국적</label>
						<input type="text" name="country" id="country" value="${info.country}" readonly>
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="birth">생년월일</label>
						<input type="text" name="birth" id="birth" value="${info.birth}" readonly>
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="height">키</label>
						<input type="text" name="height" id="height" value="${info.height}" readonly>
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="weight">몸무게</label>
						<input type="text" name="weight" id="weight" value="${info.weight}" readonly>
					</div>
				</div>
			</div>
			<div class="ui eight wide column">
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="fovr">F ovr</label>
						<input type="text" name="fovr" id="fovr" value="${info.fovr}" readonly>
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="movr">M ovr</label>
						<input type="text" name="movr" id="movr" value="${info.movr}" readonly>
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="dovr">D ovr</label>
						<input type="text" name="dovr" id="dovr" value="${info.dovr}" readonly>
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="govr">G ovr</label>
						<input type="text" name="govr" id="govr" value="${info.govr}" readonly>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<jsp:include page="../include/footer.jsp"/>