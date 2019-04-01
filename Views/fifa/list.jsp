<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="fifa"/>
<%@ include file="../include/rail.jsp" %>
	<h1 class="f k r">
		<a class="link f k r" href="${path}/fifa.ll">
			FIFA
		</a>
	</h1>
	<h4 class="f k r">
		${fifa.role}
		List
	</h4>
	<div class="ui divider"></div>
	<table id="list" class="ui celled table f k r">
		<thead class="ui center aligned inverted table">
			<tr>
				<th style="display:none;"></th>
				<th>
					<c:if test="${fifa.role eq 'Club'}">
						로스터
					</c:if>
					<c:if test="${fifa.role ne 'Club'}">
						${fifa.role eq 'Manager' ? '전술' : '포지션'}
					</c:if>
				</th>
				<th>${fifa.role eq 'Club' ? '구단' : '이름'}</th>
				<th>국적</th>
				<th>${fifa.role eq 'Club' ? '창단' : '나이'}</th>
				<th>OVR</th>
			</tr>
		</thead>
		<tbody>
		<c:forEach var="role" items="${fifa.list}">
			<tr>
				<td style="display:none;"></td>
				<td class="ui center aligned" style="width:10%;">
					<c:if test="${fifa.role eq 'Club'}">
						${role.roster eq 1 ? '등록' : '미등록'}
					</c:if>
					<c:if test="${fifa.role eq 'Manager'}">
						${role.tactic}
					</c:if>
					<c:if test="${fifa.role eq 'Player'}">
						<a class="f k r" href="${path}/fifa/information.ll?role=${fifa.role}&type=${role.type}">
							<label class="ui ${role.icon} label llab f k r" style="cursor:pointer;">
								${role.type}
							</label>
						</a>
					</c:if>
				</td>
				<td style="width:50%;">
					<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${role.name}">
						<img class="ui avatar image"src="${path}/image.ll?role=${fifa.role}&name=${role.name}" style="max-width:20px; max-height:20px;">
						${role.name}
					</a>
				</td>
				<td style="width:15%;">
					<a class="link f k r" href="${path}/fifa/country.ll?country=${role.country}">
						<i class="${f:toLowerCase(role.country)} flag"></i>
						${role.country}
					</a>
				</td>
				<td class="ui center aligned" style="width:10%;">
					<c:if test="${fifa.role eq 'Club'}">
						<fmt:formatDate value="${role.regdate}" pattern="yyyy년"/>
					</c:if>
					<c:if test="${fifa.role ne 'Club'}">
						${f:split(role.age, '.')[0]} 세
					</c:if>
				</td>
				<td class="ui center aligned" style="width:15%;">
					<div class="ui active inverted ${fifa.role eq 'Player' ? role.icon : 'black'} progress"style="margin:0px;">
						<div class="bar" style="width:${role.ovr+1}%;">
							<div class="progress f k r" style="color:${fifa.role eq 'Player' ? 'black' : ''}">
								<i class="futbol icon"></i>
								${role.ovr}
							</div>
						</div>
					</div>
				</td>
			</tr>
		</c:forEach>
		</tbody>
	</table>
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
	$('#list_filter, #list_paginate').addClass('ui center aligned container f k r')
	$('#list_filter').children('label').addClass('ui icon input').append('<i class="search icon"></i>').find('input').attr('placeholder', 'Search').css({margin : '5px', width : '250px'})
	
})

</script>
<jsp:include page="../include/footer.jsp"/>