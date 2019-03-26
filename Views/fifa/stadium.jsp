<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="personal"/>
<%@ include file="../include/rail.jsp" %>
	<div class="ui image header f k r">
		<img class="ui rounded image" src="${path}/image.ll?role=${fifa.role}&name=${fifa.name}" style="height:50px;${fifa.role eq 'Club' ? 'width:50px;' : ''}">
		<div class="content">
			<a class="link f k r" href="${path}/fifa/profile.ll?role=${fifa.role}&name=${fifa.name}">${fifa.name}</a>
			<div class="sub header">
				<i class="dot circle outline black icon" style="margin-right:0"></i> ${fifa.role}
			</div>
			<div class="sub header">
				<i class="futbol icon" style="margin-right:0"></i> ${fifa.personal.ovr}
			</div>
		</div>
	</div>
	<div class="ui divider"></div>
	<div class="ui center aligned black segment">
		<div class="content">
			<h3 class="f k r"><a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${fifa.stadium.name}">Stadium</a></h3>
			<div class="ui divider"></div>
		</div>
		<div><img class="ui centered rounded image" src="${path}/image.ll?no=${fifa.stadium.std_img}" style="max-height:500px"></div>
		<div class="ui divider"></div>
		<div class="ui header f k r">
			<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=${fifa.stadium.name}">
				${fifa.stadium.std_name}
			</a>
		</div>
		<div class="ui meta f k r">
			<a class="link f k r" href="${path}/fifa/country.ll?country=${fifa.personal.country}">
				<i class="${f:toLowerCase(fifa.personal.country)} flag"></i>
				${fifa.personal.country}
			</a>
		</div>
		<div class="ui meta f k r">
			<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=${fifa.stadium.name}">
				<img class="ui avatar image" src="${path}/image.ll?role=Club&name=${fifa.stadium.name}">
				${fifa.stadium.name}
			</a>
		</div>
		<div class="ui divider"></div>
		<div class="ui segment f k r">
			<div class="ui header f k r">Information</div>
			<table class="ui center aligned table">
				<tr>
					<th>Name</th>
					<td>${fifa.stadium.std_name}</td>
				</tr>
				<tr>
					<th>Stadium Owner</th>
					<td>${fifa.stadium.name}</td>
				</tr>
				<tr>
					<th>Subject Matter</th>
					<td>${fifa.stadium.country}</td>
				</tr>
				<tr>
					<th>Completion</th>
					<td>${fifa.personal.regdate}</td>
				</tr>
			</table>
		</div>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>