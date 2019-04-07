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
				<table id="list" class="ui center aligned selectable table f k r">
					<thead class="ui center aligned inverted table">
						<tr>
							<th style="display:none;"></th>
							<th colspan="2">Legend League Roster</th>
						</tr>
					</thead>
					<tbody>
					<c:forEach var="roster" items="${master.roster.list}">
						<tr>
							<td style="display:none;"></td>
							<td class="img" style="width:20%;">
								<img class="ui rounded fluid image" src="${path}/image.ll?no=${roster.emblem}">
							</td>
							<td class="name" style="width:80%;">
								<span>${roster.name}</span>
							</td>
						</tr>
					</c:forEach>
					</tbody>
				</table>
			</div>
			<div class="two wide column">f</div>
			<div class="eleven wide column">
				<table id="list" class="ui selectable celled table f k r">
					<thead class="ui center aligned inverted table">
						<tr>
							<th style="display:none;"></th>
							<th>구단</th>
							<th>국적</th>
							<th>창단</th>
							<th>OVR</th>
						</tr>
					</thead>
					<tbody style="cursor: pointer">
					<c:forEach var="club" items="${master.roster.unlisted}">
						<tr>
							<td style="display:none;"></td>
							<td class="ui center aligned type" style="width:10%;">
								<span>${club.roster eq 1 ? '등록' : '미등록'}</span>
							</td>
							<td class="name" style="width:50%;">
								<img class="ui avatar image"src="${path}/image.ll?no=${club.emblem}" style="max-width:20px; max-height:20px;">
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
	</div>
</div>
</section>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>

$(function(){
	
	$('#list').DataTable({
		pageLength	: 15,
		language	: {
			search		: '',
            zeroRecords	: '일치하는 결과를 찾을 수 없습니다.',
            paginate	: {
            	previous	: "Prev"
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