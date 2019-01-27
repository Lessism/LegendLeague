<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
	<h1 class="ui center aligned header f k r">로스터 등록</h1>
	<hr>
	<div class="ui grid">
		<div class="ui seven wide column">
			<h1 class="ui center aligned header f k r">리그 로스터</h1>
			<table class="ui striped center aligned table">
				<thead>
				<tr class="ui inverted center aligned table f k r">
					<th colspan="3">클럽명</th>
				</tr>
				</thead>
				<tbody class="roster">
				<c:forEach var="roster" items="${roster}">
					<tr>
						<td style="width:10%"><input type="checkbox" class="addedchk"></td>
						<td style="width:20%"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&img=emblem&name=${name}"></td>
						<td class="addedclub" style="width:70%">${name}</td>
					</tr>
				</c:forEach>
				</tbody>
			</table>
		</div>
		<div class="ui two wide column">
			<div class="ui center aligned" style="position:fixed; top:50%; left:48.5%;">
				<div>
					<i class="arrow left huge link icon" id="add"></i>
				</div>
				<div>
					<i class="arrow right huge link icon" id="remove"></i>
				</div>
			</div>
		</div>
		<div class="ui seven wide column">
			<h1 class="ui center aligned header f k r">구단 목록</h1>
			<table class="ui striped center aligned table">
				<thead>
				<tr class="ui inverted center aligned table f k r">
					<th colspan="3">클럽명</th>
					<th>경기장</th>
					<th>창단일자</th>
				</tr>
				</thead>
				<tbody>
				<c:forEach var="club" items="${list}">
					<tr>
						<td style="width:10%"><input type="checkbox" class="chk"></td>
						<td style="width:10%"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&img=emblem&name=${club.name}"></td>
						<td style="width:40%" class="clubname">${club.name}</td>
						<td style="width:30%">${club.stadium}</td>
						<td style="width:10%">${club.regdate}</td>
					</tr>
				</c:forEach>
				</tbody>
			</table>
		</div>
	</div>
</section>
<script>

	$(function(){
		$('.link.icon').click(function(){
			if ($(this).attr('id') == 'add'){
				for (i = 0; i < $('.chk:checked').length; i++){
					var clubname = $('.chk:checked').eq(i).parent().siblings('.clubname').text()
					var chk = true
					if($('.addedclub').length > 0){
						for (var v = 0; v < $('.addedclub').length; v++){
							if(Object.is(clubname, $('.addedclub').eq(v).text())){
								chk = false
							}
						}
						if (chk){
							$('.roster').append(
								'<tr>'+
								'	<td style="width:10%"><input type="checkbox" class="addedchk"></td>'+
								'	<td style="width:20%"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&img=emblem&name='+clubname+'"></td>'+
								'	<td class="addedclub" style="width:70%">'+clubname+'</td>'+
								'</tr>'
							)
						}
					}
					else{
						$('.roster').append(
							'<tr>'+
							'	<td style="width:10%"><input type="checkbox" class="addedchk"></td>'+
							'	<td style="width:20%"><img class="ui rounded fluid image" src="${path}/image.ll?role=Club&img=emblem&name='+clubname+'"></td>'+
							'	<td class="addedclub" style="width:70%">'+clubname+'</td>'+
							'</tr>'
						)
					}
				}
			}
			if ($(this).attr('id') == 'remove'){
				$('.addedchk:checked').parent().parent().remove()
			}
		})
	})

</script>
<jsp:include page="../include/footer.jsp"/>