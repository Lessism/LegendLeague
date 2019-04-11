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
				기술소개서
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
		<div class="sixteen wide column">
			<div class="ui segment">
				<h4 class="ui header f k r">
					Project
				</h4>
				<div class="ui divider"></div>
						<div class="ui active black progress">
							<div class="bar" style="width:75%;">
								<div class="progress f k r" style="color:white">
									75%
								</div>
							</div>
							<div class="label f k r" style="color:black">
								프로젝트 진행률
							</div>
						</div>
				<div class="ui two column grid f k r">
					<div class="ui center aligned column">
					<h4 class="ui header f k r">
						보완해야 할 항목
					</h4>
					<div class="ui divider"></div>
						<h6 class="f k r">Validate / 회원가입, 로그인, 리그 진행 도중 로스터 편집 불가능</h6>
						<h6 class="f k r">FIFA Member / 기본 팀 추가, 회원정보 및 상호작용</h6>
					</div>
					<div class="ui center aligned column">
					<h4 class="ui header f k r">
						추가할 컨텐츠
					</h4>
					<div class="ui divider"></div>
						<h6 class="f k r">Shop / Stadium 재건축, OVR 상승, 포지션 및 전술 변경</h6>
						<h6 class="f k r">Transfer / Club, Manager, Player 간의 이적</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
	<div class="ui black segment container">
		<h4 class="f k r">
			프로젝트 소개
		</h4>
		<div class="ui divider"></div>
		<div class="ui center aligned segment f k r">
			<h1 class="f k r" style="margin-bottom:20px">
				Legend League Project
			</h1><strong style="font-size:15px"></strong>
			<div class="ui divider"style="margin-bottom:20px"></div>
			
			<div>Legend League 는 <strong style="font-size:15px">Football Manager</strong> 에서 모티브를 얻어 만들게 된 축구 시뮬레이팅 웹사이트 입니다.</div><br>
			<div>방문자는 회원가입 통해 <strong style="font-size:15px">클럽, 감독, 선수</strong> 중 하나의 역할을 가진 FIFA 멤버가 되고</div><br>
			<div>하나의 클럽, 한 명의 감독, 11명의 선수 가 모여서 Legend League 에 참여하게 됩니다.</div><br><br>
			
			<div>리그는 각각의 <strong style="font-size:15px">Season</strong> 으로 나뉘며</div><br>
			<div>리그에 참여하는 클럽들을 Home, Away 로 나누어 <strong style="font-size:15px">Round</strong> 를 생성하게 됩니다.</div><br>
			<div>모든 Round 가 진행되었을 때 한 시즌이 끝나고 우승팀과 감독, 각종 선수상을 수상하고 새로운 시즌을 준비합니다.</div><br>
			<div class="ui divider"style="margin-bottom:20px"></div>
			
			<div>페이지는 크게 세가지 로 리그를 진행하고 리그에 대한 정보를 볼 수 있는 <strong style="font-size:15px">League</strong> 페이지,</div><br>
			<div>가입한 클럽, 감독, 선수들의 정보를 볼 수 있는 <strong style="font-size:15px">FIFA</strong> 페이지,</div><br>
			<div>방문자 정보, 회원수정을 할 수 있는 <strong style="font-size:15px">Master</strong> 페이지로 이루어져 있습니다.</div><br>
			
		</div>
	</div>
<jsp:include page="../include/footer.jsp"/>
