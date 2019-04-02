<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="portfolio"/>
<%@ include file="../include/rail.jsp" %>
<div class="ui grid">
	<div class="eight wide column">
		<h1 class="f k r">
			<a class="link f k r" href="">
				Legend League
			</a>
		</h1>
		<h4 class="f k r">
			기술 소개서
		</h4>
	</div>
	<div class="eight wide column" style="text-align:right;">
		<div class="ui image header f k r">
			<img class="ui rounded image" src="${path}/image.ll?no=1009" style="height:50px">
			<div class="content" style="padding-left:0;">
				Eclipse
				<div class="ui center aligned sub header f k r">
					IDE
				</div>
			</div>
		</div>
	</div>
</div>
	<div class="ui divider"></div>
	<div class="ui five statistics">
		<div class="ui statistic">
			<div class="value">
				<img src="${path}/image.ll?no=1001" class="ui circular inline image">
			</div>
			<div class="label">
				<h5 class="f k r">
					Spring Framwork
				</h5>
			</div>
		</div>
		<div class="ui statistic">
			<div class="value">
				<img src="${path}/image.ll?no=1002" class="ui circular inline image">
			</div>
			<div class="label">
				<h5 class="f k r">
					Spring Security
				</h5>
			</div>
		</div>
		<div class="ui statistic">
			<div class="value">
				<img src="${path}/image.ll?no=1003" class="ui circular inline image">
			</div>
			<div class="label">
				<h5 class="f k r">
					Semantic UI
				</h5>
			</div>
		</div>
		<div class="ui statistic">
			<div class="value">
				<img src="${path}/image.ll?no=1004" class="ui circular inline image">
			</div>
			<div class="label">
				<h5 class="f k r">
					Database
				</h5>
			</div>
		</div>
		<div class="ui statistic">
			<div class="value">
				<img src="${path}/image.ll?no=1005" class="ui circular inline image">
			</div>
			<div class="label">
				<h5 class="f k r">
					Server
				</h5>
			</div>
		</div>
	</div>
	<div class="ui divider"></div>
	<div class="ui grid">
		<div class="six wide column">
			<div class="ui segment">
				<h4 class="ui header f k r">
					Language
				</h4>
				<div class="ui divider"></div>
				<div style="margin-left:100px;margin-top:30px;margin-bottom:20px">
					<div class="ui image header f k r">
						<img class="ui circular image" src="${path}/image.ll?no=1006" style="width:25px;height:25px;">
						<div class="content" style="padding-left:0;">
							Java
						</div>
					</div>
				</div>
				<div style="margin-left:100px;margin-top:20px;margin-bottom:20px">
					<div class="ui image header f k r">
						<img class="ui circular image" src="${path}/image.ll?no=1007" style="width:25px;height:25px;">
						<div class="content" style="padding-left:0;">
							Java Script
						</div>
					</div>
				</div>
				<div style="margin-left:100px;margin-top:20px;margin-bottom:20px">
					<div class="ui image header f k r">
						<img class="ui circular image" src="${path}/image.ll?no=1008" style="width:25px;height:25px;">
						<div class="content" style="padding-left:0;">
							HTML
						</div>
					</div>
				</div>
				<div style="margin-left:100px;margin-top:20px;margin-bottom:20px">
					<div class="ui image header f k r">
						<img class="ui circular image" src="${path}/image.ll?no=1006" style="width:25px;height:25px;">
						<div class="content" style="padding-left:0;">
							JSP
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="ten wide column segment">
			<div class="ui segment">
				<h4 class="ui header f k r">
					Library
				</h4>
				<div class="ui divider"></div>
				<div class="ui two column grid f k r">
					<div class="ui center aligned column">
						<h6 class="f k r">Ajax</h6>
						<h6 class="f k r">jQuery</h6>
						<h6 class="f k r">JSTL</h6>
						<h6 class="f k r">MyBatis</h6>
					</div>
					<div class="ui center aligned column">
						<h6 class="f k r">DataTables</h6>
						<h6 class="f k r">CanvasJS</h6>
						<h6 class="f k r">morris.js</h6>
						<h6 class="f k r">calendar.js</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>
