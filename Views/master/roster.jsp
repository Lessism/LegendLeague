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
		<div class="ui grid">
			<div class="three wide column">
				<form method="post" action="${path}/master/roster.ll?${_csrf.parameterName}=${_csrf.token}">
					<table class="ui center aligned selectable table f k r" id="roster">
						<thead class="ui center aligned inverted table">
							<tr>
								<th style="display:none;"></th>
								<th colspan="2">Legend League Roster</th>
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
					<c:forEach var="club" items="${master.roster.unlisted}">
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
			
			
		}
		
		$('#list').DataTable().rows('.active').remove().draw()
		
	})
	
	$('#remove').click(function(){
		
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
		
	})
	
	$('#list').DataTable({
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
	
})

</script>
<jsp:include page="../include/footer.jsp"/>