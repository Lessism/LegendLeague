<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container f k r" style="height:850px">
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
				자기소개서
			</h4>
		</div>
	</div>
<div class="ui divider"></div>
	<div class="ui grid">
		<div class="five wide column" style="padding:30px;">
			<div class="ui center aligned card segment" style="max-width:250px; border-top:5px solid #1b1c1d; margin-left:25px; margin-bottom:40px">
				<div class="ui role header f k r" style="margin:0; margin-top:10px;">
					Developer					
				</div>
				<div class="ui divider"></div>
				<div>
					<img class="ui centered rounded main image" src="${path}/image.ll?no=5" style="height:150px;max-width:150px">
				</div>
				<div class="ui divider"></div>
				<div class="ui name header f k r" style="margin:3px;">
					이상준
				</div>
				<div class="ui sub meta f k r" style="margin:3px;">
					1991.02.19
				<div class="ui divider" style="margin:3px;"></div>
				</div>
				<div class="ui sub meta f k r" style="margin:3px;">
					Less0219@Gmail.com
				</div>
				<div class="ui sub meta f k r" style="margin:3px; margin-bottom:10px">
					010-2419-0219
				</div>
			</div>
			<div class="ui center aligned segment f k r" style="margin-left:10px;">
				<div class="ui header f k r"><a class="link f k r" href="${path}/fifa/detail.ll?role=${fifa.role}&name=${fifa.name}">Information</a></div>
				<table class="ui center aligned table">
					<tr>
						<th>학력</th>
						<td>대입검정고시</td>
					</tr>
					<tr>
						<th>경력</th>
						<td>신입</td>
					</tr>
					<tr>
						<th>교육</th>
						<td>
							11.28 ~ 04.25<br>
							동성직업전문학교
							<div class="ui divider"></div>
							NCS 과정평가형<br>
							응용 SW 개발</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="eleven wide column">
			<div class="ui center aligned segment" style="height:700px">
				<h1 class="f k r" style="margin-bottom:20px">
					코드라는 장난감을 손에 쥔 어린아이
				</h1>
				<div class="ui divider"style="margin-bottom:20px"></div>
				<div>코드라는 장난감을 손에 쥔 어린아이 이상준입니다.</div><br>
				<div>어릴 때 부터 컴퓨터에 매우 관심이 많았지만, 주변 환경으로 인해 제대로 배울 수 있는 기회를 접하지 못했습니다.</div><br>
				<div>먹고 살기 위해 이런 일 저런 일 가리지 않고 하다보니 막상 시간이 흘러서 주변 사람들이 대학을 졸업할 때 즈음</div><br>
				<div>적성에 맞는 일을 하고 싶다는 생각이 들어 IT 업계에 진입하려 했지만 학력이 모자라고 그 시점에 수능을 치고</div><br>
				<div style="margin-bottom:15px">등록금을 내고 대학에 다닌다는게 현실적으로 힘들어 생각을 접을 수 밖에 없었습니다.</div><br><br>
				<div>그리고 20대 후반이 되었을 때 그나마 여유가 조금 생기면서 다시 꿈을 꾸게 되었습니다.</div><br>
				<div>IT 업계가 학력보단 실력 위주라는 말을 듣고 이대로 도전하지 않고 머무른다면 30대가 되었을 때도 40대가 되었을 때도</div><br>
				<div>그 때라도 도전하지 않은 것을 분명 후회 할 것이라 생각해 인생 마지막 도전이라는 각오로 프로그래밍을 배웠습니다.</div><br>
				<div>그리고 지금껏 이런 배움의 기회가 없던 것이 안타까울 정도로 너무나 적성에 잘 맞고 이 일이라면 평생을 할 수 있겠다는</div><br>
				<div>확신이 들었습니다. 마치 어린아이가 시간가는 줄 모르고 무언가를 가지고 노는 것 처럼 프로그래밍 이라는 것이 제게는</div><br>
				<div style="margin-bottom:15px">장난감 혹은 아이들의 놀이와 같이 즐거운 것이라 코드라는 장난감을 손에 쥔 어린아이라는 소개를 하게 되었습니다.</div><br><br>
				<div>프로그래밍이라는 것이 평생을 공부해야 하는 일이라고 알고 있습니다.</div><br>
				<div>비록 대학을 나온 것도 아니고 남들보다 늦은 나이에 시작했지만</div><br>
				<div>배움의 기회를 가질 수 없었던 만큼 앞으로 수많은 경험을 쌓고 스스로 학습하며 발전하는 프로그래머가 되려 합니다.</div><br>
			</div>
		</div>
	</div>
</section>
<jsp:include page="../include/footer.jsp"/>