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
		Visit Date
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
			<div class="ui three column grid">
				<div class="column">
					<div id="yearChart" style="height:250px; width:100%;"></div>
				</div>
				<div class="column">
					<div id="monthChart" style="height:250px; width:100%;"></div>
				</div>
				<div class="column">
					<div id="dayChart" style="height:250px; width:100%;"></div>
				</div>
			</div>
		</div>
		<div class="ui grid">
			<div class="eight wide column">
				<div class="ui black segment">
					<div id="timeChart" style="height:250px; width: 100%;"></div>
				</div>
			</div>
			<div class="eight wide column">
				<div class="ui black segment">
					<div id="weekChart" style="height:250px; width: 100%;"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/jquery.canvasjs.min.js"></script>
<script>
$(function(){
	
	$.get('/legendleague/visitChart', {type : 'year'}, function(year){
		
			var chart = new CanvasJS.Chart('yearChart', {
				
				animationEnabled: true,
				title:{
					text		: 'Year',
					fontFamily	: 'Noto Serif KR'
				},
				toolTip: {
					fontFamily	: 'Noto Serif KR',
					content		: '{x} : {y}'
				},
				axisX	: {
					valueFormatString	: '####년',
					labelFontFamily		: 'Noto Serif KR',
					intervalType		: "year",
					interval			: 1
				},
				axisY	: {
					valueFormatString	: '# 명',
					labelFontFamily		: 'Noto Serif KR',
					interval			: 25,
				},
				data	: [{
					type				: 'column',
					color				: 'black',
					fontFamily			: 'Noto Serif KR',
					indexLabel			: '{x} - {y}',
					indexLabelFontSize	: 15,
					indexLabelFontFamily: 'Noto Serif KR',
					xValueFormatString	: '####년',
					yValueFormatString	: '# 명',
					dataPoints			: year
				}]
			})
			
			chart.render()
			$('.canvasjs-chart-credit').remove()
			
	}, 'json')
	
	$.get('/legendleague/visitChart', {type : 'month'}, function(month){
		
			var chart = new CanvasJS.Chart('monthChart', {
				
				animationEnabled: true,
				title:{
					text		: 'Month',
					fontFamily	: 'Noto Serif KR'
				},
				toolTip: {
					fontFamily	: 'Noto Serif KR',
					content		: '{x} : {y}'
				},
				axisX	: {
					valueFormatString	: '##월',
					labelFontFamily		: 'Noto Serif KR',
					intervalType		: "month",
					interval			: 1
				},
				axisY	: {
					valueFormatString	: '# 명',
					labelFontFamily		: 'Noto Serif KR',
					interval			: 25,
				},
				data	: [{
					type				: 'column',
					color				: 'black',
					fontFamily			: 'Noto Serif KR',
					indexLabel			: '{x} - {y}',
					indexLabelFontSize	: 15,
					indexLabelFontFamily: 'Noto Serif KR',
					xValueFormatString	: '##월',
					yValueFormatString	: '# 명',
					dataPoints			: month
				}]
			})
			
			chart.render()
			$('.canvasjs-chart-credit').remove()
			
	}, 'json')
	
	$.get('/legendleague/visitChart', {type : 'day'}, function(day){
		
			var chart = new CanvasJS.Chart('dayChart', {
				
				animationEnabled: true,
				title:{
					text		: 'Day',
					fontFamily	: 'Noto Serif KR'
				},
				toolTip: {
					fontFamily	: 'Noto Serif KR',
					content		: '{x} : {y}'
				},
				axisX	: {
					valueFormatString	: '##일',
					labelFontFamily		: 'Noto Serif KR',
					intervalType		: "day",
					interval			: 1
				},
				axisY	: {
					valueFormatString	: '# 명',
					labelFontFamily		: 'Noto Serif KR',
					interval			: 25,
				},
				data	: [{
					type				: 'column',
					color				: 'black',
					fontFamily			: 'Noto Serif KR',
					indexLabel			: '{x} - {y}',
					indexLabelFontSize	: 15,
					indexLabelFontFamily: 'Noto Serif KR',
					xValueFormatString	: '##일',
					yValueFormatString	: '# 명',
					dataPoints			: day
				}]
			})
			
			chart.render()
			$('.canvasjs-chart-credit').remove()
			
	}, 'json')
	
})
</script>
<jsp:include page="../include/footer.jsp"/>