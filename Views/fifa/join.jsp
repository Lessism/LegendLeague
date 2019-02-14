<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<c:if test="${empty param.Role}">
	<section class="ui black segment container">
		<div class="ui three column grid">
			<div class="column">
				<a href="${path}/fifa/join.ll?Role=Club">구단 생성</a>
			</div>
			<div class="column">
				<a href="${path}/fifa/join.ll?Role=Manager">감독 생성</a>
			</div>
			<div class="column">
				<a href="${path}/fifa/join.ll?Role=Player">선수 생성</a>
			</div>
		</div>
	</section>
</c:if>
<c:if test="${!empty param.Role}">
	<section class="ui black segment container">
		<form class="ui form" method="post" action="${path}/fifa/join.ll" enctype="multipart/form-data">
			<div>
				<h1 class="ui center aligned header f k r">
					<c:if test="${param.Role eq 'Club'}">구단 생성</c:if>
					<c:if test="${param.Role eq 'Manager'}">감독 생성</c:if>
					<c:if test="${param.Role eq 'Player'}">선수 생성</c:if>
				</h1>
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
				<input type="hidden" name="role" value="${param.Role}">
				<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}">
			</div>
			<hr>
	<c:if test="${param.Role eq 'Club'}">
			<h3 class="ui header f k r">세부정보</h3>
			<div class="ui grid">
				<div class="ui six wide column">
					<div class="ui top attached tabular menu">
						<a class="tabular item active" data-tab="club">Club</a>
						<a class="tabular item" data-tab="stadium">Stadium</a>
					</div>
					<div class="ui bottom attached tab segment active" data-tab="club">
						<div><img class="ui rounded fluid image" id="club_emblem_view" src="${path}/image.ll?role=Club&img=emblem&name=Barcelona"></div>
						<div class="ui center aligned header f k r" id="club_name_view">Club</div>
					</div>
					<div class="ui bottom attached tab segment" data-tab="stadium">
						<div><img class="ui rounded fluid image" id="stadium_img_view" src="${path}/image.ll?role=Club&img=emblem&name=Barcelona"></div>
						<div class="ui center aligned header f k r" id="stadium_name_view">Stadium</div>
					</div>
				</div>
				<div class="ui ten wide column">
					<div class="ui field">
						<div class="ui labeled input field">
							<label class="ui basic label llab f k r" for="name">구단명</label>
							<input type="text" name="name" id="name" placeholder="Club Name">
							<label class="ui left pointing basic label llab chk"></label>
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
						<div class="ui labeled input field">
							<label class="ui basic label llab f k r" for="stadium">구장</label>
							<input type="text" name=stadium id="stadium" placeholder="Stadium Name">
							<label class="ui left pointing basic label llab chk"></label>
						</div>
					</div>
					<div class="ui field">
						<div class="ui labeled input">
							<label class="ui basic label llab f k r" for="stadium_img">구장 전경</label>
							<div class="ui action input">
								<input type="text" placeholder="Stadium Image" readonly>
								<input type="file" accept="image/*" name="stadium_img" id="stadium_img">
								<div class="ui icon button">
									<i class="attach icon"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="ui field">
						<div class="ui labeled input">
							<label class="ui basic label llab f k r" for="anchorage">연고지</label>
							<input type="text" name="anchorage" id="anchorage" placeholder="Anchorage">
						</div>
					</div>
				</div>
			</div>
	</c:if>
	<c:if test="${param.Role eq 'Manager'}">
			<div>
				<h3 class="ui header f k r">세부정보</h3>
				<div class="ui field">
					<div class="ui labeled input field">
						<label class="ui basic label llab f k r" for="name">감독명</label>
						<input type="text" name="name" id="name" placeholder="Manager Name">
						<label class="ui left pointing basic label llab chk"></label>
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="country">국적</label>
						<input type="text" name="country" id="country" placeholder="Country">
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="birth">생년월일</label>
						<input type="date" name="birth" id="birth" placeholder="Birth">
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="height">키</label>
						<input type="text" name="height" id="height" placeholder="Height">
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="weight">몸무게</label>
						<input type="text" name="weight" id="weight" placeholder="Weight">
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="ovr">OVR</label>
						<input type="text" name="ovr" id="ovr" placeholder="Overall">
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="tactic">전술</label>
						<input type="text" name="tactic" id="tactic" placeholder="Tactic">
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="profile">프로필</label>
						<div class="ui action input">
							<input type="text" placeholder="Profile" readonly>
							<input type="file" accept="image/*" name="profile" id="profile">
							<div class="ui icon button">
								<i class="attach icon"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
	</c:if>
	<c:if test="${param.Role eq 'Player'}">
			<div>
				<h3 class="ui header f k r">세부정보</h3>
				<div class="ui field">
					<div class="ui labeled input field">
						<label class="ui basic label llab f k r" for="name">선수명</label>
						<input type="text" name="name" id="name" placeholder="Player Name">
						<label class="ui left pointing basic label llab chk"></label>
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="country">국적</label>
						<input type="text" name="country" id="country" placeholder="Country">
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="birth">생년월일</label>
						<input type="date" name="birth" id="birth" placeholder="Birth">
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="height">키</label>
						<input type="text" name="height" id="height" placeholder="Height">
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="weight">몸무게</label>
						<input type="text" name="weight" id="weight" placeholder="Weight">
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="ovr">OVR</label>
						<input type="text" name="ovr" id="ovr" placeholder="Overall">
					</div>
				</div>
				<div class="ui field">
					<div class="ui labeled input">
						<label class="ui basic label llab f k r" for="profile">프로필</label>
						<div class="ui action input">
							<input type="text" placeholder="Profile" readonly>
							<input type="file" accept="image/*" name="profile" id="profile">
							<div class="ui icon button">
								<i class="attach icon"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
	</c:if>
			<hr>
			<div class="ui center aligned container">
				<input class="ui black button f k r" type="submit" value="가입">
				<a class="ui button f k r" href="${path}/fifa/join.ll">취소</a>
			</div>
		</form>
	</section>
</c:if>
<script>

	$('.tabular.item').tab()
	
	$("input:text").click(function() {
		$(this).parent().find("input:file").click()
	})
	
	$('input:file').on('change', function(e) {
		$('input:text', $(e.target).parent()).val(e.target.files[0].name)
		var img = $(this).attr('name')
		var fileReader = new FileReader()
		fileReader.readAsDataURL(e.target.files[0])
		fileReader.onload = function(e) {
			if (img == 'emblem'){
				$('#club_emblem_view').attr('src', e.target.result)
			}
			if (img == 'stadium_img'){
				$('#stadium_img_view').attr('src', e.target.result)
			}
		}
	})
	
	$('#name, #stadium').keyup(function(){
		if ($(this).attr('name') == 'name'){
			$('#club_name_view').text($(this).val())
		}
		if ($(this).attr('name') == 'stadium'){
			$('#stadium_name_view').text($(this).val())
		}
	})
	
</script>
<jsp:include page="../include/footer.jsp"/>