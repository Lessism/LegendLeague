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
		Visit
	</h4>
</div>
<div class="ui divider"></div>
<div class="ui grid">
	<div class="two wide column">
		<c:set var="rail" value="master"/>
		<%@ include file="../include/rail.jsp" %>
	</div>
	<div class="thirteen wide column">
		<div class="ui black segment">
			<div class="ui three huge statistics">
				<div class="ui huge statistic">
					<div class="value">
						<h2 class="f k r">
							${master.visit.total} 명
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Total
						</h5>
					</div>
				</div>
				<div class="ui huge statistic">
					<div class="value">
						<h2 class="f k r">
							${master.visit.today} 명
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Today
						</h5>
					</div>
				</div>
				<div class="ui huge statistic">
					<div class="value">
						<h2 class="f k r">
							<span id="visit_now"></span> 명
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Now
						</h5>
					</div>
				</div>
			</div>
			<div class="ui divider"></div>
			<div id="dailyChart" style="height:250px; width:100%;" style="font-family:Noto Serif KR"></div>
		</div>
		<div class="ui grid">
			<div class="eleven wide column">
				<div class="ui black segment">
					<div id="timeChart" style="height:250px; width: 100%;"></div>
				</div>
				<div class="ui black segment">
					<div id="weekChart" style="height:250px; width: 100%;"></div>
				</div>
			</div>
			<div class="five wide column">
				<table class="ui center aligned table">
				<thead>
					<tr>
						<th colspan="2">Statistics</th>
					</tr>
				</thead>
					<tbody>
						<tr>
							<th>총 방문자 수</th>
							<td>${master.visit.listtotal.totalcount} 명</td>
						</tr>
						<tr>
							<th>평균 방문자 수</th>
							<td>${master.visit.listtotal.totalavgcount} 명</td>
						</tr>
						<tr>
							<th>페이지 방문 수</th>
							<td>${master.visit.listtotal.totalpage} 회</td>
						</tr>
						<tr>
							<th>평균 페이지 방문 수</th>
							<td>${master.visit.listtotal.totalavgmenucount} 회</td>
						</tr>
						<tr>
							<th>머무르는 시간</th>
							<td>${master.visit.listtotal.totalstay} 분</td>
						</tr>
						<tr>
							<th>평균 머무르는 시간</th>
							<td>${master.visit.listtotal.totalavgstay} 분</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/jquery.canvasjs.min.js"></script>
<script>
$(function(){
	
	$.get('/legendleague/visitChart', {type : 'daily'}, function(daily){
		
			var chart = new CanvasJS.Chart('dailyChart', {
				
				animationEnabled: true,
				title:{
					text		: 'Daily Visit',
					fontFamily	: 'Noto Serif KR'
				},
				toolTip: {
					fontFamily	: 'Noto Serif KR',
					content		: '{x} : {y}'
				},
				axisX	: {
					valueFormatString	: 'YYYY년 MM월 DD일',
					labelFontFamily		: 'Noto Serif KR',
					intervalType		: 'day',
					interval 			: 5,
				},
				axisY	: {
					valueFormatString	: '# 명',
					labelFontFamily		: 'Noto Serif KR',
					interval			: 1,
				},
				data	: [{
					type				: 'splineArea',
					color				: 'grey',
					fontFamily			: 'Noto Serif KR',
					xValueType			: 'dateTime',
					xValueFormatString	: 'YYYY년 MM월 DD일',
					yValueFormatString	: '# 명',
					dataPoints			: daily
				}]
			})
			chart.render()
			$('.canvasjs-chart-credit').remove()
			
	}, 'json')
	
	$.get('/legendleague/visitChart', {type : 'time'}, function(time){
		
			var chart = new CanvasJS.Chart('timeChart', {
				
				animationEnabled: true,
				title:{
					text		: 'Time Line',
					fontFamily	: 'Noto Serif KR'
				},
				toolTip: {
					fontFamily	: 'Noto Serif KR',
					content		: '{x} : {y}'
				},
				axisX	: {
					valueFormatString	: '## 시',
					labelFontFamily		: 'Noto Serif KR',
					interval 			: 1,
				},
				axisY	: {
					valueFormatString	: '# 명',
					labelFontFamily		: 'Noto Serif KR',
					interval 			: 1,
				},
				data	: [{
					type				: 'spline',
					color				: 'black',
					fontFamily			: 'Noto Serif KR',
					xValueFormatString	: '##시',
					yValueFormatString	: '# 명',
					dataPoints			: time
				}]
			})
			chart.render()
			$('.canvasjs-chart-credit').remove()
			
	}, 'json')
	
	$.get('/legendleague/visitChart', {type : 'week'}, function(week){
		
			var chart = new CanvasJS.Chart('weekChart', {
				
				animationEnabled: true,
				title:{
					text		: 'Week',
					fontFamily	: 'Noto Serif KR'
				},
				legend:{
					fontSize		: 15,
					fontFamily		: 'Noto Serif KR',
					horizontalAlign	: 'right',
					verticalAlign	: 'center'
				},
				data	: [{
					type				: 'pie',
					startAngle			: 50,
					toolTipContent		: '<b>{label}</b>: {y}%',
					showInLegend		: true,
					legendText			: '{label} ({y}%)',
					indexLabel			: '{label} - {y}%',
					indexLabelFontSize	: 10,
					indexLabelFontFamily: 'Noto Serif KR',
					fontFamily			: 'Noto Serif KR',
					dataPoints			: week
				}]
			})
			chart.render()
			$('.canvasjs-chart-credit').remove()
			
	}, 'json')
	
})
</script>
<jsp:include page="../include/footer.jsp"/>
