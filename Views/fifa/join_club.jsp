<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
	<form class="ui form" method="post" action="${path}/fifa/join_club.ll?${_csrf.parameterName}=${_csrf.token}" enctype="multipart/form-data">
		<div>
			<h1 class="ui center aligned header f k r">구단 생성</h1>
			<hr>
			<div class="ui field">
				<div class="ui labeled input">
					<label class="ui basic label llab f k r" for="id">아이디</label>
					<input type="text" name="id" id="id" placeholder="ID">
					<label class="ui left pointing basic label llab chk"></label>
				</div>
			</div>
			<div class="ui field">
				<div class="ui labeled input">
					<label class="ui basic label llab f k r" for="pw">암호</label>
					<input type="password" name="pw" id="pw" placeholder="Password">
					<label class="ui left pointing basic label llab chk"></label>
				</div>
			</div>
			<input type="hidden" name="role" value="Club">
		</div>
		<hr>
		<div>
			<h3 class="ui header f k r">세부정보</h3>
			<div class="ui field">
				<div class="ui labeled input field">
					<label class="ui basic label llab f k r" for="name">구단명</label>
					<input type="text" name="name" id="name" placeholder="Club Name">
					<label class="ui left pointing basic label llab chk"></label>
				</div>
			</div>
			<div class="ui field">
				<div class="ui labeled input">
					<label class="ui basic label llab f k r" for="anchorage">연고지</label>
					<input type="text" name="anchorage" id="anchorage" placeholder="Anchorage">
				</div>
			</div>
			<div class="ui field">
				<div class="ui labeled input">
					<label class="ui basic label llab f k r" for="emblem">엠블럼</label>
					<div class="ui action input">
						<input type="text" placeholder="Emblem" readonly>
						<input type="file" accept="image/*" name="emblem" id="emblem">
						<div class="ui icon button">
							<i class="attach icon"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="ui field">
				<div class="ui labeled input">
					<label class="ui basic label llab f k r" for="stadium">경기장</label>
					<input type="text" name="stadium" id="stadium" placeholder="Stadium">
				</div>
			</div>
		</div>
		<hr>
		<div class="ui center aligned container">
			<input class="ui black button f k r" type="submit" value="가입">
			<a class="ui button f k r" href="${path}">취소</a>
		</div>
	</form>
</section>
<script>

	$("input:text").click(function() {
		$(this).parent().find("input:file").click();
	});
	
	$('input:file', '.ui.action.input').on('change', function(e) {
	    var name = e.target.files[0].name;
	    $('input:text', $(e.target).parent()).val(name);
	 });
	
</script>
<jsp:include page="../include/footer.jsp"/>
