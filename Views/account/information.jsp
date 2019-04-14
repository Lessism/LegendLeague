<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<s:authorize access="isAnonymous()">
	<section class="ui black segment text container">
		<form class="ui form" action="${path}/account/login_process" method="post">
			<h1 class="ui center aligned header f k r">로그인</h1>
			<hr>
			<div class="ui field">
				<div class="ui labeled input">
					<label class="ui basic label llab f k r" for="id">아이디</label>
					<input type="text" name="id" id="id" placeholder="ID">
				</div>
			</div>
			<div class="ui field">
				<div class="ui labeled input">
					<label class="ui basic label llab f k r" for="pw">암호</label>
					<input type="password" name="pw" id="pw" placeholder="Password">
				</div>
			</div>
			<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}">
			<hr>
			<div class="ui center aligned container">
				<input class="ui black button f k r" type="submit" value="로그인">
				<a class="ui button f k r" href="${path}">메인</a>
			</div>
		</form>
	</section>
</s:authorize>
<s:authorize access="isAuthenticated()">
	<div class="ui grid black segment container">
		<div class="five wide column" style="padding:50px">
			<div class="ui center aligned card segment" style="max-width:250px; border-top:5px solid #1b1c1d;">
				<div class="ui role header f k r" style="margin:0; margin-top:10px;">
					${account.role}
				</div>
				<div class="ui divider"></div>
				<div>
					<img class="ui centered rounded main image" src="${path}/image.ll?no=${account.role eq 'Club' ? account.detail.emblem : account.detail.profile}" style="height:150px;max-width:150px">
				</div>
				<div class="ui divider"></div>
				<div class="ui name header f k r" style="margin:0;">
					${account.name}
				</div>
				<div class="ui country meta f k r">
					<i id="countryicon" class="${f:toLowerCase(account.detail.country)} flag"></i>
					<span>${account.detail.country}</span>
				</div>
				<div class="ui sub meta f k r">
					<c:if test="${account.role eq 'Club'}">
						<img class="ui avatar sub image" src="${path}/image.ll?no=${account.detail.std_img}" style="max-width:20px; max-height:20px;">
					</c:if>
					<c:if test="${account.role ne 'Club'}">
						<img class="ui avatar sub image" src="${path}/image.ll?role=Club&name=${!empty account.detail.club ? account.detail.club : testClub}" style="max-width:20px; max-height:20px;">
					</c:if>
					<span>${account.role eq 'Club' ? account.detail.stadium : account.detail.club}</span>
				</div>
				<div class="description">
					<div class="ui active inverted ${account.role eq 'Player' ? account.detail.icon : 'black'} progress" style="margin-top:10px; margin-bottom:0;">
						<div class="bar" id="ovrbar" style="width:${account.detail.ovr+1}%;">
							<div class="progress f k r" style="color:${account.role eq 'Player' ? 'black' : ''}">
								<span class="position">${account.role eq 'Player' ? account.detail.position : 'OVR'}</span>
								<i class="futbol icon"></i>
								<span class="ovr">${account.detail.ovr}</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="eleven wide column" style="padding:50px">
			<form class="ui form" method="post" action="${path}/account/information.ll?${_csrf.parameterName}=${_csrf.token}" enctype="multipart/form-data">
				<div class="ui black segment">
						<h3 class="f k r">Information</h3>
						<div class="ui divider"></div>
						<div class="ui field">
							<div class="ui labeled input">
								<label class="ui basic label llab f k r" for="id">아이디</label>
								<input type="text" name="id" id="id" value="${account.id}" readonly>
							</div>
						</div>
						<input type="hidden" name="role" value="${account.role}">
						<input type="hidden" name="name" value="${account.name}">
						<div class="ui img field">
							<div class="ui labeled input">
								<label class="ui basic label llab f k r" for="image">
									${account.role eq 'Club' ? '엠블럼' : '프로필'}
								</label>
								<div class="ui action input">
									<input class="filetext" type="text" placeholder="Image" readonly>
									<input type="file" accept="image/*" name="img" id="image">
									<input type="hidden" name="img_no" id="img_no" value="${account.role eq 'Club' ? account.detail.emblem : account.detail.profile}">
									<div class="ui basic icon button">
										<i class="img attach icon"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="ui country field">
							<div class="ui labeled input">
								<label class="ui basic label llab f k r country" for="country">국적</label>
								<div class="ui fluid search selection dropdown">
							  		<input type="hidden" name="country" id="country">
									<div class="default text" id="phcountry"></div>
									<i class="dropdown icon"></i>
									<div class="menu">
										<c:import url="../include/country.jsp"/>
									</div>
								</div>
							</div>
						</div>
						<c:if test="${account.role eq 'Club'}">
						<div class="ui stadium field">
							<div class="ui labeled input field">
								<label class="ui basic label llab f k r" for="stadium">구장</label>
								<input type="text" name="stadium" id="stadium" value="${account.detail.stadium}">
								<input type="hidden" name="std_name" id="std_name" value="${account.detail.stadium}">
							</div>
						</div>
						<div class="ui stadium_img field">
							<div class="ui labeled input">
								<label class="ui basic label llab f k r" for="stadium_img">구장 전경</label>
								<div class="ui action input">
									<input class="filetext" type="text" placeholder="Stadium Image" readonly>
									<input type="file" accept="image/*" name="img1" id="stadium_img">
									<input type="hidden" name="std_img" id="std_img" value="${account.detail.std_img}">
									<div class="ui icon button">
										<i class="attach icon"></i>
									</div>
								</div>
							</div>
						</div>
						</c:if>
						<c:if test="${account.role ne 'Club'}">
						<div class="ui birth field">
							<div class="ui labeled icon input calendar">
								<label class="ui basic label llab f k r" for="birth">생년월일</label>
								<input type="text" name="birth" id="birth" autocomplete=off value="${account.detail.birth}">
								<i class="calendar alternate outline icon"></i>
							</div>
						</div>
						<div class="ui height field">
							<div class="ui labeled input">
								<label class="ui basic label llab f k r" for="height">키</label>
								<input type="text" name="height" id="height" maxlength="3" value="${account.detail.height}">
							</div>
						</div>
						<div class="ui weight field">
							<div class="ui labeled input">
								<label class="ui basic label llab f k r" for="weight">몸무게</label>
								<input type="text" name="weight" id="weight" maxlength="3" value="${account.detail.weight}">
							</div>
						</div>
						<c:if test="${account.role eq 'Manager'}">
						<div class="ui tactic field">
							<div class="ui labeled input">
								<label class="ui basic label llab f k r tactic" for="tactic">전술</label>
								<div class="ui fluid search selection tactic dropdown">
							  		<input type="hidden" name="tactic" id="tactic">
									<div class="default text"></div>
									<i class="dropdown icon"></i>
									<div class="menu">
										<div class="item">4-3-3</div>
										<div class="item">4-4-2</div>
										<div class="item">4-5-1</div>
									</div>
								</div>
							</div>
						</div>
						</c:if>
						<c:if test="${account.role eq 'Player'}">
						<div class="ui position field">
							<div class="ui labeled input">
								<label class="ui basic label llab f k r position" for="position">포지션</label>
								<div class="ui fluid search selection position dropdown">
							  		<input type="hidden" name="position" id="position">
									<div class="default text"></div>
									<i class="dropdown icon"></i>
									<div class="menu">
										<div class="divider"></div>
										<div class="header">Forward</div>
										<div class="divider"></div>
											<div class="item" data-value="ST">
												<i class="dot circle outline red icon"></i>
												Striker
												<span class="poicon" style="display:none;">red</span>
												<span class="poborder" style="display:none;">#db2828</span>
												<input type="hidden" name="potype" value="FW">
												<input type="hidden" name="poicon" value="red">
												<input type="hidden" name="poborder" value="#db2828">
											</div>
											<div class="item" data-value="CF">
												<i class="dot circle outline red icon"></i>
												Center Foward
												<span class="poicon" style="display:none;">red</span>
												<span class="poborder" style="display:none;">#db2828</span>
												<input type="hidden" name="potype" value="FW">
												<input type="hidden" name="poicon" value="red">
												<input type="hidden" name="poborder" value="#db2828">
											</div>
											<div class="item" data-value="WF">
												<i class="dot circle outline red icon"></i>
												Wing Foward
												<span class="poicon" style="display:none;">red</span>
												<span class="poborder" style="display:none;">#db2828</span>
												<input type="hidden" name="potype" value="FW">
												<input type="hidden" name="poicon" value="red">
												<input type="hidden" name="poborder" value="#db2828">
											</div>
										<div class="divider"></div>
										<div class="header">Midfielder</div>
										<div class="divider"></div>
											<div class="item" data-value="CM">
												<i class="dot circle outline green icon"></i>
												Center Midfielder
												<span class="poicon" style="display:none;">green</span>
												<span class="poborder" style="display:none;">#21ba45</span>
												<input type="hidden" name="potype" value="MF">
												<input type="hidden" name="poicon" value="green">
												<input type="hidden" name="poborder" value="#21ba45">
											</div>
											<div class="item" data-value="DM">
												<i class="dot circle outline green icon"></i>
												Defensive Midfielder
												<span class="poicon" style="display:none;">green</span>
												<span class="poborder" style="display:none;">#21ba45</span>
												<input type="hidden" name="potype" value="MF">
												<input type="hidden" name="poicon" value="green">
												<input type="hidden" name="poborder" value="#21ba45">
											</div>
											<div class="item" data-value="AM">
												<i class="dot circle outline green icon"></i>
												Attacking Midfielder
												<span class="poicon" style="display:none;">green</span>
												<span class="poborder" style="display:none;">#21ba45</span>
												<input type="hidden" name="potype" value="MF">
												<input type="hidden" name="poicon" value="green">
												<input type="hidden" name="poborder" value="#21ba45">
											</div>
											<div class="item" data-value="WM">
												<i class="dot circle outline green icon"></i>
												Wing Midfielder
												<span class="poicon" style="display:none;">green</span>
												<span class="poborder" style="display:none;">#21ba45</span>
												<input type="hidden" name="potype" value="MF">
												<input type="hidden" name="poicon" value="green">
												<input type="hidden" name="poborder" value="#21ba45">
											</div>
										<div class="divider"></div>
										<div class="header">Defender</div>
										<div class="divider"></div>
											<div class="item" data-value="CB">
												<i class="dot circle outline blue icon"></i>
												Centerback
												<span class="poicon" style="display:none;">blue</span>
												<span class="poborder" style="display:none;">#2185d0</span>
												<input type="hidden" name="potype" value="DF">
												<input type="hidden" name="poicon" value="blue">
												<input type="hidden" name="poborder" value="#2185d0">
											</div>
											<div class="item" data-value="WB">
												<i class="dot circle outline blue icon"></i>
												Wingback
												<span class="poicon" style="display:none;">blue</span>
												<span class="poborder" style="display:none;">#2185d0</span>
												<input type="hidden" name="potype" value="DF">
												<input type="hidden" name="poicon" value="blue">
												<input type="hidden" name="poborder" value="#2185d0">
											</div>
										<div class="divider"></div>
										<div class="header">Goalkeeper</div>
										<div class="divider"></div>
											<div class="item" data-value="GK">
												<i class="dot circle outline yellow icon"></i>
												Goalkeeper
												<span class="poicon" style="display:none;">yellow</span>
												<span class="poborder" style="display:none;">#fbbd08</span>
												<input type="hidden" name="potype" value="GK">
												<input type="hidden" name="poicon" value="yellow">
												<input type="hidden" name="poborder" value="#fbbd08">
											</div>
									</div>
								</div>
							</div>
						</div>
						</c:if>
						<div class="ui ovr field">
							<div class="ui labeled input">
								<label class="ui basic label llab f k r" for="ovr">OVR</label>
								<input type="text" name="ovr" id="ovr" maxlength="2" value="${account.detail.ovr}">
							</div>
							<div class="ui float input">
								<input type="range" id="ovrrange" min="1" max="99" value="${account.detail.ovr}">
							</div>
						</div>
						</c:if>
				</div>
				<div class="ui center aligned container actions">
					<a class="ui button f k r" id="cancel" href="${path}/">계정 비활성화</a>
					<a class="ui button f k r" id="cancel" href="${path}/">계정 완전 탈퇴</a>
					<a class="ui button f k r" id="cancel" href="${path}/">비밀번호 재설정</a>
					<input class="ui black button f k r" id="edit" type="submit" value="수정">
					<a class="ui button f k r" id="cancel" href="${path}/">취소</a>
				</div>
			</form>
		</div>
	</div>
<script src="${path}/resources/js/calendar.js"></script>
<script>

$(function(){

	$('.labeled.input.calendar').calendar({
		type: 'date'
	})
	
	$('.filetext, .attach.icon').click(function() {
		$(this).parent().parent().find('input:file').click()
	})
	
	$('label.country, label.position, label.tactic').click(function(){
		$(this).siblings('div.dropdown').dropdown('show')
	})
	
	$('#name, #stadium').keyup(function(){
		if ($(this).attr('name') == 'name'){
			$('.name.header').text($(this).val())
		}
		if ($(this).attr('name') == 'stadium'){
			$('.sub.meta').children('span').text($(this).val())
		}
	})
	
	$('#country').change(function(){
		$('#countryicon').removeClass().addClass($(this).val().toLowerCase() + ' flag').siblings('span').text($(this).val())
	})
	
	$('#position').change(function(){

		$('.ui.card.segment').css('border-top', '5px solid '+ $(this).siblings('.text').children('span.poborder').text())
		$('.ui.card.segment').children('.ui.role.header').text($(this).val())
		$('#ovrbar').parent().removeClass().addClass('ui active inverted progress ' + $(this).siblings('.text').children('span.poicon').text())
		$('#ovrbar').children('.progress').css('color', 'black').children('i').removeClass().addClass('dot circle outline icon ' + $(this).siblings('.text').children('span.poicon').text())
		$('#ovrbar').children('.progress').children('.position').text($(this).val())
		
	})
	
	$('input:file').on('change', function(e) {
		$('input:text', $(e.target).parent()).val(e.target.files[0].name)
		var img = $(this).attr('name')
		var fileReader = new FileReader()
		fileReader.readAsDataURL(e.target.files[0])
		fileReader.onload = function(e) {
			if (img == 'img'){
				$('.main.image').attr('src', e.target.result)
			}
			if (img == 'img1'){
				$('.sub.image').attr('src', e.target.result)
			}
		}
	})
	
	$('#ovrrange').on('input', function(){
		$('#ovr').val($(this).val())
		$('#ovrbar').css('width', ($(this).val()+1)/10+'%')
		$('#ovrbar').children('.progress').children('span.ovr').text($(this).val())
	})
	
	$('#ovr').on('keyup', function(){
		$('#ovrrange').val($(this).val())
		$('#ovrbar').css('width', ($(this).val()+1)/10+'%')
		$('#ovrbar').children('.progress').children('span.ovr').text($(this).val())
	})
	
	$('.tactic.dropdown').dropdown('set selected', '${account.detail.tactic}')
	
	$('.position.dropdown').dropdown('set selected', '${account.detail.position}')
	
	$('.ui.fluid.search.selection.dropdown').dropdown('set selected', '${account.detail.country}')
	
})
</script>
</s:authorize>
<jsp:include page="../include/footer.jsp"/>
