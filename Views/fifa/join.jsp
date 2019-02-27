<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<c:if test="${empty param.role}">
	<section class="ui black segment container">
		<div class="ui three column grid">
			<div class="column">
				<div class="ui segment">
					<a href="${path}/fifa/join.ll?role=Club">
					<span><img class="ui medium circular rounded fluid image" id="img_view" src="${path}/image.ll?no=1"></span>
					<span class="ui header segment f k r" style="text-align:center; display:block;">구단 생성</span>
					</a>
				</div>
			</div>
			<div class="column">
				<div class="ui segment">
					<a href="${path}/fifa/join.ll?role=Manager">
						<img class="ui medium circular rounded fluid image" id="img_view" src="${path}/image.ll?no=2">
						<span class="ui header segment f k r" style="text-align:center; display:block;">감독 생성</span>
					</a>
				</div>
			</div>
			<div class="column">
				<div class="ui segment">
					<a href="${path}/fifa/join.ll?role=Player">
						<img class="ui medium circular rounded fluid image" id="img_view" src="${path}/image.ll?no=3">
						<span class="ui header segment f k r" style="text-align:center; display:block;">선수 생성</span>
					</a>
				</div>
			</div>
		</div>
	</section>
</c:if>
<c:if test="${!empty param.role}">
	<section class="ui black segment container">
		<form class="ui form" method="post" action="${path}/fifa/join.ll?${_csrf.parameterName}=${_csrf.token}" enctype="multipart/form-data">
			<div>
				<h1 class="ui center aligned header f k r">
					<c:if test="${param.role eq 'Club'}">구단 생성</c:if>
					<c:if test="${param.role eq 'Manager'}">감독 생성</c:if>
					<c:if test="${param.role eq 'Player'}">선수 생성</c:if>
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
				<input type="hidden" name="role" value="${param.role}">
			</div>
			<hr>
		<c:if test="${param.role eq 'Club'}">
			<h3 class="ui header f k r">세부정보</h3>
			<div class="ui grid">
				<div class="ui six wide column">
					<div class="ui top attached tabular menu">
						<a class="tabular item active" data-tab="club">Club</a>
						<a class="tabular item" data-tab="stadium">Stadium</a>
					</div>
					<div class="ui bottom attached tab segment active" data-tab="club">
						<div><img class="ui rounded fluid image" id="img_view" src="${path}/image.ll?no=1"></div>
						<div class="ui center aligned header f k r" id="name_view">Club</div>
					</div>
					<div class="ui bottom attached tab segment" data-tab="stadium">
						<div><img class="ui rounded fluid image" id="stadium_img_view" src="${path}/image.ll?no=4"></div>
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
								<input type="file" accept="image/*" name="img" id="emblem">
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
								<input type="file" accept="image/*" name="img1" id="stadium_img">
								<div class="ui icon button">
									<i class="attach icon"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="ui field">
						<div class="ui labeled input">
							<label class="ui basic label llab f k r" for="country">소속 국가</label>
							<div class="ui fluid search selection dropdown">
						  		<input type="hidden" name="country">
								<div class="default text">Country</div>
								<i class="dropdown icon"></i>
								<div class="menu">
									<c:import url="../include/country.jsp"/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</c:if>
		<c:if test="${param.role eq 'Manager'}">
			<h3 class="ui header f k r">세부정보</h3>
			<div class="ui grid">
				<div class="ui six wide column">
					<div class="ui segment">
						<div><img class="ui rounded fluid image" id="img_view" src="${path}/image.ll?no=2"></div>
						<div class="ui center aligned header f k r" id="name_view">Manager</div>
					</div>
				</div>
				<div class="ui ten wide column">
					<div class="ui field">
						<div class="ui labeled input field">
							<label class="ui basic label llab f k r" for="name">감독명</label>
							<input type="text" name="name" id="name" placeholder="Manager Name">
							<label class="ui left pointing basic label llab chk"></label>
						</div>
					</div>
					<div class="ui field">
						<div class="ui labeled input">
							<label class="ui basic label llab f k r" for="profile">프로필</label>
							<div class="ui action input">
								<input type="text" placeholder="Profile" readonly>
								<input type="file" accept="image/*" name="img" id="profile">
								<div class="ui basic icon button">
									<i class="attach icon"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="ui field">
						<div class="ui labeled input">
							<label class="ui basic label llab f k r" for="country">국적</label>
							<div class="ui fluid search selection dropdown">
						  		<input type="hidden" name="country" value="ax">
								<div class="default text">Country</div>
								<i class="dropdown icon"></i>
								<div class="menu">
									<c:import url="../include/country.jsp"/>
								</div>
							</div>
						</div>
					</div>
					<div class="ui field">
						<div class="ui labeled icon input calendar">
							<label class="ui basic label llab f k r" for="birth">생년월일</label>
							<input type="text" name="birth" id="birth" placeholder="Birth" autocomplete=off>
							<i class="calendar alternate outline icon"></i>
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
							<div class="ui fluid search selection dropdown">
						  		<input type="hidden" name="tactic" id="tactic">
								<div class="default text">Tactic</div>
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="item">4-3-3</div>
									<div class="item">4-4-2</div>
									<div class="item">4-5-1</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</c:if>
		<c:if test="${param.role eq 'Player'}">
			<h3 class="ui header f k r">세부정보</h3>
			<div class="ui grid">
				<div class="ui six wide column">
					<div class="ui segment">
						<div><img class="ui rounded fluid image" id="img_view" src="${path}/image.ll?no=3"></div>
						<div class="ui center aligned header f k r" id="name_view">Player</div>
					</div>
				</div>
				<div class="ui ten wide column">
					<div class="ui field">
						<div class="ui labeled input field">
							<label class="ui basic label llab f k r" for="name">선수명</label>
							<input type="text" name="name" id="name" placeholder="Manager Name">
							<label class="ui left pointing basic label llab chk"></label>
						</div>
					</div>
					<div class="ui field">
						<div class="ui labeled input">
							<label class="ui basic label llab f k r" for="profile">프로필</label>
							<div class="ui action input">
								<input type="text" placeholder="Profile" readonly>
								<input type="file" accept="image/*" name="img" id="profile">
								<div class="ui basic icon button">
									<i class="attach icon"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="ui field">
						<div class="ui labeled input">
							<label class="ui basic label llab f k r" for="country">국적</label>
							<div class="ui fluid search selection dropdown">
						  		<input type="hidden" name="country">
								<div class="default text">Country</div>
								<i class="dropdown icon"></i>
								<div class="menu">
									<c:import url="../include/country.jsp"/>
								</div>
							</div>
						</div>
					</div>
					<div class="ui field">
						<div class="ui labeled icon input calendar">
							<label class="ui basic label llab f k r" for="birth">생년월일</label>
							<input type="text" name="birth" id="birth" placeholder="Birth" autocomplete=off>
							<i class="calendar alternate outline icon"></i>
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
							<label class="ui basic label llab f k r" for="position">포지션</label>
							<div class="ui fluid search selection dropdown">
						  		<input type="hidden" name="position">
								<div class="default text">Position</div>
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="divider"></div>
									<div class="header">Forward</div>
									<div class="divider"></div>
										<div class="item" data-value="ST"><i class="dot circle outline red icon"></i>Striker</div>
										<div class="item" data-value="CF"><i class="dot circle outline red icon"></i>Center Foward</div>
										<div class="item" data-value="WF"><i class="dot circle outline red icon"></i>Wing Foward</div>
									<div class="divider"></div>
									<div class="header">Midfielder</div>
									<div class="divider"></div>
										<div class="item" data-value="CM"><i class="dot circle outline green icon"></i>Center Midfielder</div>
										<div class="item" data-value="DM"><i class="dot circle outline green icon"></i>Defensive Midfielder</div>
										<div class="item" data-value="AM"><i class="dot circle outline green icon"></i>Attacking Midfielder</div>
										<div class="item" data-value="WM"><i class="dot circle outline green icon"></i>Wing Midfielder</div>
									<div class="divider"></div>
									<div class="header">Defender</div>
									<div class="divider"></div>
										<div class="item" data-value="CB"><i class="dot circle outline blue icon"></i>Centerback</div>
										<div class="item" data-value="WB"><i class="dot circle outline blue icon"></i>Wingback</div>
									<div class="divider"></div>
									<div class="header">Goalkeeper</div>
									<div class="divider"></div>
										<div class="item" data-value="GK"><i class="dot circle outline yellow icon"></i>Goalkeeper</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</c:if>
			<hr>
			<div class="ui center aligned container">
				<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}">
				<input class="ui black button f k r" type="submit" value="가입">
				<a class="ui button f k r" href="${path}/fifa/join.ll">취소</a>
			</div>
		</form>
	</section>
</c:if>
<script src="${path}/resources/js/calendar.js"></script>
<script>

	$('.labeled.input.calendar').calendar({
		type: 'date'
	})
	
	$("input:text, .basic.icon.button").click(function() {
		$(this).parent().find("input:file").click()
	})
	
	$('input:file').on('change', function(e) {
		$('input:text', $(e.target).parent()).val(e.target.files[0].name)
		var img = $(this).attr('name')
		var fileReader = new FileReader()
		fileReader.readAsDataURL(e.target.files[0])
		fileReader.onload = function(e) {
			if (img == 'img'){
				$('#img_view').attr('src', e.target.result)
			}
			if (img == 'img1'){
				$('#stadium_img_view').attr('src', e.target.result)
			}
		}
	})
	
	$('#name, #stadium').keyup(function(){
		if ($(this).attr('name') == 'name'){
			$('#name_view').text($(this).val())
		}
		if ($(this).attr('name') == 'stadium'){
			$('#stadium_name_view').text($(this).val())
		}
	})
	
</script>
<jsp:include page="../include/footer.jsp"/>