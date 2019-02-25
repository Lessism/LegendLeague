<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
	<h1 class="ui center aligned header f k r">로스터 편집</h1>
	<hr>
<c:if test="${empty param.name}">
	<div class="ui grid">
		<div class="ui seven wide column">
			<h1 class="ui center aligned header f k r">리그 로스터</h1>
			<form method="post" action="${path}/edit/roster.ll" id="form_roster">
				<table class="ui striped center aligned table">
					<thead>
						<tr class="ui inverted center aligned table f k r">
							<th colspan="3">클럽명</th>
						</tr>
					</thead>
					<tbody class="roster">
						<c:forEach var="roster" items="${rosterlist.roster}">
							<tr>
								<td style="width:10%"><div class="ui checkbox"><input type="checkbox" class="removechk"><label></label></div></td>
								<td style="width:20%"><img class="ui rounded fluid image" src="${path}/image.ll?no=${!empty roster.emblem ? roster.emblem : 1}"></td>
								<td style="width:70%"><input type="hidden" name="rosterlist" value="${roster.name}">${roster.name}</td>
							</tr>
						</c:forEach>
					</tbody>
				</table>
				<div class="ui center aligned container">
					<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}">
					<input class="ui black button f k r" id="rostersubmit" type="submit" value="등록">
					<a class="ui button f k r" href="${path}">취소</a>
				</div>
			</form>
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
					<c:forEach var="club" items="${rosterlist.club}">
						<tr>
							<td style="width:10%"><div class="ui checkbox"><input type="checkbox" role="club" class="addchk"><label></label></div></td>
							<td style="width:10%" class="img"><img class="ui rounded fluid image" src="${path}/image.ll?no=${!empty club.emblem ? club.emblem : 1}"></td>
							<td style="width:40%" class="name">${club.name}</td>
							<td style="width:30%">${club.stadium}</td>
							<td style="width:10%"><fmt:formatDate value="${club.regdate}" pattern="yyyy-MM-dd"/></td>
						</tr>
					</c:forEach>
				</tbody>
			</table>
		</div>
	</div>
</c:if>
<c:if test="${!empty param.name}">
	<div class="ui grid">
		<div class="ui seven wide column">
			<h1 class="ui center aligned header f k r">클럽 로스터</h1>
			<form method="post" action="${path}/edit/roster.ll" id="form_roster">
				<table class="ui striped center aligned table">
					<thead>
						<tr class="ui inverted center aligned table f k r">
							<th colspan="3">로스터</th>
						</tr>
					</thead>
					<tbody class="roster">
						<c:forEach var="roster" items="${rosterlist.roster}">
						<c:if test="${!empty roster.manager}">
							<tr>
								<td style="width:10%"><div class="ui checkbox"><input type="checkbox" class="removechk"><label></label></div></td>
								<td style="width:20%"><img class="ui rounded fluid image" src="${path}/image.ll?role=Manager&img=profile&name=${info.manager}"></td>
								<td class="manager" style="width:60%"><input type="hidden" name="manager" value="${info.manager}">${info.manager}</td>
							</tr>
						</c:if>
						<c:if test="${!empty roster.player}">
							<c:forEach begin="0" end="10" step="1" varStatus="idx">
								<tr>
									<td style="width:10%"><div class="ui checkbox"><input type="checkbox" class="removechk"><label></label></div></td>
									<td style="width:20%"><img class="ui rounded fluid image" src="${path}/image.ll?role=Player&img=profile&name=${info.player[idx.index]}"></td>
									<td class="player" style="width:60%"><input type="hidden" name="player" value="${info.player[idx.index]}">${info.player[idx.index]}</td>
								</tr>
							</c:forEach>
						</c:if>
						</c:forEach>
					</tbody>
				</table>
				<div class="ui center aligned container">
					<input type="hidden" name="name" value="${param.name}">
					<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}">
					<input class="ui black button f k r" id="rostersubmit" type="submit" value="등록">
					<a class="ui button f k r" href="${path}/edit/club.ll">취소</a>
				</div>
			</form>
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
			<div class="ui top attached tabular menu">
				<a class="tabular item active" data-tab="manager">감독</a>
				<a class="tabular item" data-tab="player">선수</a>
			</div>
			<div class="ui bottom attached tab segment active" data-tab="manager">
				<h1 class="ui center aligned header f k r">감독 목록</h1>
				<table class="ui striped center aligned table">
					<thead>
						<tr class="ui inverted center aligned table f k r">
							<th colspan="3">감독명</th>
							<th>OVR</th>
							<th>전술</th>
						</tr>
					</thead>
					<tbody>
						<c:forEach var="manager" items="${rosterlist.manager}">
							<tr>
								<td style="width:10%"><div class="ui radio checkbox"><input type="radio" role="manager" class="addchk" name="radio"><label></label></div></td>
								<td style="width:10%" class="img"><img class="ui rounded fluid image" src="${path}/image.ll?no=${!empty manager.profile ? manager.profile : 2}"></td>
								<td style="width:40%" class="name">${manager.name}</td>
								<td style="width:30%" class="ovr">${manager.ovr}</td>
								<td style="width:10%">${manager.tactic}</td>
							</tr>
						</c:forEach>
					</tbody>
				</table>
			</div>
			<div class="ui bottom attached tab segment" data-tab="player">
				<h1 class="ui center aligned header f k r">선수 목록</h1>
				<table class="ui striped center aligned table">
					<thead>
						<tr class="ui inverted center aligned table f k r">
							<th colspan="3">선수명</th>
							<th>OVR</th>
						</tr>
					</thead>
					<tbody>
						<c:forEach var="player" items="${rosterlist.player}">
							<tr>
								<td style="width:10%"><div class="ui checkbox"><input type="checkbox" role="player" class="addchk"><label></label></div></td>
								<td style="width:10%" class="img"><img class="ui rounded fluid image" src="${path}/image.ll?no=${!empty player.profile ? player.profile : 3}"></td>
								<td style="width:50%" class="name">${player.name}</td>
								<td style="width:30%" class="ovr">${player.ovr}</td>
							</tr>
						</c:forEach>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</c:if>
</section>
<script>

$(function(){
	$('.link.icon').click(function(){
		if ($(this).attr('id') == 'add'){
			for (i = 0; i < $('.addchk:checked').length; i++){
				var name = $('.addchk:checked').eq(i).parent().parent().siblings('.name').text()
				var ovr = $('.addchk:checked').eq(i).parent().parent().siblings('.ovr').text()
				var img = $('.addchk:checked').eq(i).parent().parent().siblings('.img').children('img').attr('src')
				var chk = true
				if (($('.addchk:checked').eq(i).attr('role') == 'club' && $('input[name="rosterlist"]').length < 10) || ($('.addchk:checked').eq(i).attr('role') == 'player' && $('input[name="rosterlist"]').length < 11)){
					for (var v = 0; v < $('input[name="rosterlist"]').length; v++){
						if (name == $('input[name="rosterlist"]').eq(v).val()){
							chk = false
						}
					}
					if (chk && $('.addchk:checked').eq(i).attr('role') == 'club'){
						$('.roster').append(
							'<tr>'+
							'	<td style="width:10%"><div class="ui checkbox"><input type="checkbox" class="removechk"><label></label></div></td>'+
							'	<td style="width:20%"><img class="ui rounded fluid image" src="'+img+'"></td>'+
							'	<td class="club" style="width:70%"><input type="hidden" name="rosterlist" value="'+name+'">'+name+'</td>'+
							'</tr>'
						)
					}
					if (chk && $('.addchk:checked').eq(i).attr('role') == 'player'){
						$('.roster').append(
							'<tr>'+
							'	<td style="width:10%"><div class="ui checkbox"><input type="checkbox" class="removechk"><label></label></div></td>'+
							'	<td style="width:20%"><img class="ui rounded fluid image" src="'+img+'"></td>'+
							'	<td style="width:60%"><input type="hidden" name="rosterlist" value="'+name+'"><input type="hidden" name="ovr" value="'+ovr+'">'+name+'</td>'+
							'</tr>'
						)
					}
				}
				if ($('.addchk:checked').eq(i).attr('role') == 'manager' && $('input[name="manager"]').length < 1){
					$('.roster').prepend(
						'<tr>'+
						'	<td style="width:10%"><div class="ui checkbox"><input type="checkbox" class="removechk"><label></label></div></td>'+
						'	<td style="width:20%"><img class="ui rounded fluid image" src="'+img+'"></td>'+
						'	<td style="width:60%"><input type="hidden" name="manager" value="'+name+'"><input type="hidden" name="ovr" value="'+ovr+'">'+name+'</td>'+
						'</tr>'
					)
				}
			}
		}
		if ($(this).attr('id') == 'remove'){
			$('.removechk:checked').parent().parent().parent().remove()
		}
	})
})

</script>
<jsp:include page="../include/footer.jsp"/>
