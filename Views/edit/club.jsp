<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
	<h1 class="ui center aligned header f k r">구단 목록</h1>
	<hr>
	<table class="ui selectable striped center aligned table">
		<thead>
		<tr class="ui inverted center aligned table f k r">
			<th colspan="2">클럽명</th>
			<th>로스터</th>
		</tr>
		</thead>
		<tbody>
			<c:forEach var="club" items="${list}">
				<tr>
					<td class="two wide selectable" style="width:10%"><a href="${path}/edit/club.ll?name=${club.name}"><img class="ui rounded fluid image" src="${path}/image.ll?no=${club.emblem}"></a></td>
					<td class="ten wide selectable" style="width:80%"><a href="${path}/edit/club.ll?name=${club.name}">${club.name}</a></td>
					<td class="four wide selectable" style="width:10%"><a href="${path}/edit/roster.ll?name=${club.name}">로스터 편집</a></td>
				</tr>
			</c:forEach>
		</tbody>
	</table>
</section>
<jsp:include page="../include/footer.jsp"/>