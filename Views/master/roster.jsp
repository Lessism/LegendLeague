<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment f k r">
<div class="ui center aligned container">
	<h1 class="f k r">
		<a class="link f k r" href="${path}/master.ll">
			Master
		</a>
	</h1>
	<h4 class="f k r">
		Edit Roster
	</h4>
</div>
<div class="ui divider"></div>
<div class="ui grid">
	<div class="two wide column">
		<c:set var="rail" value="master"/>
		<%@	include file="../include/rail.jsp" %>
	</div>
	<div class="fourteen wide column">
		<c:if test="${empty master.name}">
			<div class="ui grid">
				<div class="three wide column">
					<form method="post" action="${path}/master/roster.ll?${_csrf.parameterName}=${_csrf.token}">
						<table class="ui center aligned selectable table f k r" id="roster">
							<thead class="ui center aligned inverted table">
								<tr>
									<th style="display:none;"></th>
									<th colspan="2">Legend League</th>
									<th style="display:none;"></th>
								</tr>
							</thead>
							<tbody style="cursor: pointer">
							<c:forEach var="roster" items="${master.roster.list}">
								<tr class="club">
									<td style="display:none;"></td>
									<td class="img" style="width:20%;">
										<img class="ui rounded fluid image" src="${path}/image.ll?no=${roster.emblem}">
									</td>
									<td class="name" style="width:80%;">
										<span>${roster.name}</span>
									</td>
									<td class="info" style="display:none;">
										<input type="hidden" name="roster" value="${roster.name}">
										<span class="emblem">${path}/image.ll?no=${roster.emblem}</span>
										<span class="country">${roster.country}</span>
										<span class="regdate"><fmt:formatDate value="${roster.regdate}" pattern="yyyy년"/></span>
										<span class="ovr">${roster.ovr}</span>
									</td>
								</tr>
							</c:forEach>
							</tbody>
						</table>
					</form>
				</div>
				<div class="two wide column">
					<div class="ui center aligned" style="padding:50px; margin-top:auto; margin-bottom:auto;">
						<div>
							<i class="arrow left huge link icon" id="add"></i>
						</div>
						<div>
							<i class="arrow right huge link icon" id="remove"></i>
						</div>
					</div>
				</div>
				<div class="eleven wide column">
					<table class="ui selectable celled table f k r" id="list">
						<thead class="ui center aligned inverted table">
							<tr>
								<th style="display:none;"></th>
								<th>로스터</th>
								<th>구단</th>
								<th>국적</th>
								<th>창단</th>
								<th>OVR</th>
							</tr>
						</thead>
						<tbody id="listBody" style="cursor: pointer">
						<c:forEach var="club" items="${master.roster.unrosted}">
							<tr class="club">
								<td style="display:none;"></td>
								<td class="ui center aligned type" style="width:10%;">
									<span>${club.roster eq 1 ? '등록' : '미등록'}</span>
								</td>
								<td class="name" style="width:50%;">
									<img class="ui avatar image" src="${path}/image.ll?no=${club.emblem}" style="max-width:20px; max-height:20px;">
									<span>${club.name}</span>
								</td>
								<td class="country" style="width:15%;">
									<i class="${f:toLowerCase(club.country)} flag"></i>
									<span>${club.country}</span>
								</td>
								<td class="ui center aligned age" style="width:10%;">
									<fmt:formatDate value="${club.regdate}" pattern="yyyy년"/>
								</td>
								<td class="ui center aligned ovr" style="width:15%;">
									<div class="ui active inverted black progress"style="margin:0px;">
										<div class="bar" style="width:${club.ovr+1}%;">
											<div class="progress f k r">
												<i class="futbol icon"></i>
												<span>${club.ovr}</span>
											</div>
										</div>
									</div>
								</td>
							</tr>
						</c:forEach>
						</tbody>
					</table>
				</div>
			</div>
		</c:if>
		<c:if test="${!empty master.name}">
			<div class="ui grid">
				<div class="three wide column">
					<form method="post" action="${path}/master/roster.ll?${_csrf.parameterName}=${_csrf.token}">
						<table class="ui center aligned selectable table f k r" id="roster">
							<thead class="ui center aligned inverted table">
								<tr>
									<th colspan="4"><img class="ui avatar image" src="${path}/image.ll?role=Club&name=${master.name}"> ${master.name}</th>
								</tr>
							</thead>
							<tbody style="cursor: pointer">
								<tr>
									<th rowspan="2" style="border-right:1px solid rgba(34,36,38,.1);">Manager</th>
								</tr>
								<tr class="manager">
									<td class="ui center aligned type" style="width:10%;">
										<span>${master.roster.manager.tactic}</span>
									</td>
									<td class="img" style="width:20%;">
										<img class="ui avatar image" src="${path}/image.ll?no=${master.roster.manager.profile}">
									</td>
									<td class="name" style="width:70%;">
										<span>${master.roster.manager.name}</span>
									</td>
									<td class="info" style="display:none;">
										<input type="hidden" name="roster" value="${master.roster.manager.name}">
										<span class="emblem">${path}/image.ll?no=${master.roster.manager.profile}</span>
										<span class="country">${master.roster.manager.country}</span>
										<span class="regdate">${master.roster.manager.birth}</span>
										<span class="ovr">${master.roster.manager.ovr}</span>
									</td>
								</tr>
								<tr>
									<th rowspan="12" style="border-top:1px solid rgba(34,36,38,.1); border-right:1px solid rgba(34,36,38,.1);">Player</th>
								</tr>
								<c:forEach var="player" items="${master.roster.player}">
									<tr class="player">
										<td class="ui center aligned type" style="width:10%;">
											<label class="ui ${player.icon} label llab f k r" style="cursor:pointer;">
												${player.type}
											</label>
										</td>
										<td class="img" style="width:20%;">
											<img class="ui avatar image" src="${path}/image.ll?no=${player.profile}">
										</td>
										<td class="name" style="width:70%;">
											<span>${player.name}</span>
										</td>
										<td class="info" style="display:none;">
											<input type="hidden" name="roster" value="${player.name}">
											<span class="emblem">${path}/image.ll?no=${player.profile}</span>
											<span class="country">${player.country}</span>
											<span class="regdate">${player.birth}</span>
											<span class="ovr">${player.ovr}</span>
										</td>
									</tr>
								</c:forEach>
							</tbody>
						</table>
					</form>
				</div>
				<div class="two wide column">
					<div class="ui center aligned" style="padding:50px; margin-top:auto; margin-bottom:auto;">
						<div>
							<i class="arrow left huge link icon" id="add"></i>
						</div>
						<div>
							<i class="arrow right huge link icon" id="remove"></i>
						</div>
					</div>
				</div>
				<div class="eleven wide column">
					<div class="ui black segment">
						<div class="ui pointing secondary two item menu">
							<a class="tabular active item f k r" data-tab="manager">Manager</a>
							<a class="tabular item f k r" data-tab="player">Player</a>
						</div>
						<div class="ui tab active" data-tab="manager">
							<table class="ui selectable celled table f k r" id="listManager" style="width:100%">
								<thead class="ui center aligned inverted table">
									<tr>
										<th style="display:none;"></th>
										<th>전술</th>
										<th>이름</th>
										<th>국적</th>
										<th>나이</th>
										<th>OVR</th>
									</tr>
								</thead>
								<tbody id="listBodyManager" style="cursor: pointer">
								<c:forEach var="manager" items="${master.roster.unrostedManager}">
									<tr class="rowManager">
										<td style="display:none;"></td>
										<td class="ui center aligned type" style="width:10%;">
											<span>${manager.tactic}</span>
										</td>
										<td class="name" style="width:50%;">
											<img class="ui avatar image" src="${path}/image.ll?no=${manager.profile}" style="max-width:20px; max-height:20px;">
											<span>${manager.name}</span>
										</td>
										<td class="country" style="width:15%;">
											<i class="${f:toLowerCase(manager.country)} flag"></i>
											<span>${manager.country}</span>
										</td>
										<td class="ui center aligned age" style="width:10%;">
											<span>${f:split(manager.age, '.')[0]} 세</span>
										</td>
										<td class="ui center aligned ovr" style="width:15%;">
											<div class="ui active inverted black progress"style="margin:0px;">
												<div class="bar" style="width:${manager.ovr+1}%;">
													<div class="progress f k r">
														<i class="futbol icon"></i>
														<span>${manager.ovr}</span>
													</div>
												</div>
											</div>
										</td>
									</tr>
								</c:forEach>
								</tbody>
							</table>
						</div>
						<div class="ui tab" data-tab="player">
							<table class="ui selectable celled table f k r" id="listPlayer" style="width:100%">
								<thead class="ui center aligned inverted table">
									<tr>
										<th style="display:none;"></th>
										<th>포지션</th>
										<th>이름</th>
										<th>국적</th>
										<th>나이</th>
										<th>OVR</th>
									</tr>
								</thead>
								<tbody id="listBodyPlayer" style="cursor: pointer">
								<c:forEach var="player" items="${master.roster.unrostedPlayer}">
									<tr class="rowPlayer">
										<td style="display:none;"></td>
										<td class="ui center aligned type" style="width:10%;">
											<label class="ui ${player.icon} label llab f k r" style="cursor:pointer;">
												${player.type}
											</label>
										</td>
										<td class="name" style="width:50%;">
											<img class="ui avatar image" src="${path}/image.ll?no=${player.profile}" style="max-width:20px; max-height:20px;">
											<span>${player.name}</span>
										</td>
										<td class="country" style="width:15%;">
											<i class="${f:toLowerCase(player.country)} flag"></i>
											<span>${player.country}</span>
										</td>
										<td class="ui center aligned age" style="width:10%;">
											<span>${f:split(player.age, '.')[0]} 세</span>
										</td>
										<td class="ui center aligned ovr" style="width:15%;">
											<div class="ui active inverted ${player.icon} progress"style="margin:0px;">
												<div class="bar" style="width:${player.ovr+1}%;">
													<div class="progress f k r" style="color:black;">
														<i class="futbol icon"></i>
														<span>${player.ovr}</span>
													</div>
												</div>
											</div>
										</td>
									</tr>
								</c:forEach>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</c:if>
		<div class="ui divider"></div>
		<div class="ui center aligned container">
			<input class="ui black button f k r" id="edit" type="button" value="수정">
			<div class="ui button f k r" id="cancel">취소</div>
		</div>
	</div>
</div>
</section>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>

$(function(){
	
	$('tbody').on('click', 'tr', function(){
		$(this).toggleClass('active')
	})
	
	$('#edit').on('click', function(){
		$('form').submit()
	})
	
	$('#add').click(function(){
		
		var club = $('#list').find('tr.active')
		
		for(i = 0; i < club.length; i++){

			var rosterlength = $('#roster').children('tbody').children('tr').length
			
			if (rosterlength < 10 ) {
				
				var clubinfo = club.eq(i)
				
				$('#roster').append(
					'<tr class="club">'+
					'	<td style="display:none;"></td>'+
					'	<td class="img" style="width:20%;">'+
					'		<img class="ui rounded fluid image" src="'+ clubinfo.children('.name').children('img').attr('src') +'">'+
					'	</td>'+
					'	<td class="name" style="width:80%;">'+
					'		<span>'+ clubinfo.children('.name').children('span').text() +'</span>'+
					'	</td>'+
					'	<td class="info" style="display:none;">'+
					'		<input type="hidden" name="roster" value="'+ clubinfo.children('.name').children('span').text() +'">'+
					'		<span class="emblem">'+ clubinfo.children('.name').children('img').attr('src') +'</span>'+
					'		<span class="country">'+ clubinfo.children('.country').children('span').text() +'</span>'+
					'		<span class="regdate">'+ clubinfo.children('.age').text() +'</span>'+
					'		<span class="ovr">'+ clubinfo.children('.ovr').children('div').children('div').children('div').children('span').text() +'</span>'+
					'	</td>'+
					'</tr>'
				)
				
				$('#list').DataTable().row('.active').remove().draw()
			}
		}
	})
	
	$('#remove').click(function(){
		
		var role = '${empty master.name}'
		
		if (role){

			var club = $('#roster').find('tr.active')
			
			for(i = 0; i < club.length; i++){
				
				var clubinfo = club.eq(i).children('.info')
				
				var row = $('#list').DataTable().row.add([
					'',
					'<span>미등록</span>',
					'<img class="ui avatar image"src="' + clubinfo.children('.emblem').text() + '" style="max-width:20px; max-height:20px;">'+
					'<span>' + clubinfo.children('input').val() + '</span>',
					'<i class="' + clubinfo.children('.country').text().toLowerCase() + ' flag"></i>'+
					'<span>' + clubinfo.children('.country').text() + '</span>',
					'' + clubinfo.children('.regdate').text() +'',
					'<div class="ui active inverted black progress"style="margin:0px;">'+
					'	<div class="bar" style="width:' + (clubinfo.children('.ovr').text()+1)/10 + '%;">'+
					'		<div class="progress f k r">'+
					'			<i class="futbol icon"></i>'+
					'			<span>' + clubinfo.children('.ovr').text() + '</span>'+
					'		</div>'+
					'	</div>'+
					'</div>'
				]).draw().node()
				
				$(row).removeClass().addClass('club odd')
				$(row).find('td').eq(0).addClass('sorting_1').css('display', 'none')
				$(row).find('td').eq(1).addClass('ui center aligned type').css('width', '10%')
				$(row).find('td').eq(2).addClass('name').css('width', '50%')
				$(row).find('td').eq(3).addClass('country').css('width', '15%')
				$(row).find('td').eq(4).addClass('ui center aligned age').css('width', '10%')
				$(row).find('td').eq(5).addClass('ui center aligned ovr').css('width', '15%')
				
				club.remove()
				
			}
			
		} else {

			var manager = $('#roster').find('tr.active.manager')
			var managerinfo = manager.children('.info')
			
			var row = $('#listManager').DataTable().row.add([
				'',
				'<span>미등록</span>',
				'<img class="ui avatar image"src="' + clubinfo.children('.emblem').text() + '" style="max-width:20px; max-height:20px;">'+
				'<span>' + clubinfo.children('input').val() + '</span>',
				'<i class="' + clubinfo.children('.country').text().toLowerCase() + ' flag"></i>'+
				'<span>' + clubinfo.children('.country').text() + '</span>',
				'' + clubinfo.children('.regdate').text() +'',
				'<div class="ui active inverted black progress"style="margin:0px;">'+
				'	<div class="bar" style="width:' + (clubinfo.children('.ovr').text()+1)/10 + '%;">'+
				'		<div class="progress f k r">'+
				'			<i class="futbol icon"></i>'+
				'			<span>' + clubinfo.children('.ovr').text() + '</span>'+
				'		</div>'+
				'	</div>'+
				'</div>'
			]).draw().node()
			
			$(row).removeClass().addClass('club odd')
			$(row).find('td').eq(0).addClass('sorting_1').css('display', 'none')
			$(row).find('td').eq(1).addClass('ui center aligned type').css('width', '10%')
			$(row).find('td').eq(2).addClass('name').css('width', '50%')
			$(row).find('td').eq(3).addClass('country').css('width', '15%')
			$(row).find('td').eq(4).addClass('ui center aligned age').css('width', '10%')
			$(row).find('td').eq(5).addClass('ui center aligned ovr').css('width', '15%')
			
			manager.remove()
				
		}
		
	})
	
	$('#list, #listManager, #listPlayer').DataTable({
		pageLength	: 15,
		language	: {
			search		: '',
            zeroRecords	: '일치하는 결과를 찾을 수 없습니다.',
            paginate	: {
            	previous	: 'Prev'
            }
		}
	})

	$("#list_filter").insertAfter("#list_info");
	$('#list_length, #list_info').remove()
	$('#list_filter, #list_paginate').addClass('ui center aligned container f k r').css({width : '100%'})
	$('#list_filter').children('label').addClass('ui icon input').append('<i class="search icon"></i>').find('input').attr('placeholder', 'Search').css({margin : '5px', width : '250px'})


	$("#listManager_filter").insertAfter("#listManager_info");
	$('#listManager_length, #listManager_info').remove()
	$('#listManager_filter, #listManager_paginate').addClass('ui center aligned container f k r').css({width : '100%'})
	$('#listManager_filter').children('label').addClass('ui icon input').append('<i class="search icon"></i>').find('input').attr('placeholder', 'Search').css({margin : '5px', width : '250px'})


	$("#listPlayer_filter").insertAfter("#listPlayer_info");
	$('#listPlayer_length, #listPlayer_info').remove()
	$('#listPlayer_filter, #listPlayer_paginate').addClass('ui center aligned container f k r').css({width : '100%'})
	$('#listPlayer_filter').children('label').addClass('ui icon input').append('<i class="search icon"></i>').find('input').attr('placeholder', 'Search').css({margin : '5px', width : '250px'})
	
})

</script>
<jsp:include page="../include/footer.jsp"/>