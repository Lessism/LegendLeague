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
		Visit Menu
	</h4>
</div>
<div class="ui divider"></div>
<div class="ui grid">
	<div class="two wide column">
		<c:set var="rail" value="master"/>
		<%@ include file="../include/rail.jsp" %>
	</div>
	<div class="fourteen wide column">
		<div class="ui black segment">
			<div id="menuChart" style="height:250px; width:100%;"></div>
		</div>
		<div class="ui black segment">
			<div class="ui three statistics">
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							${master.visit.master.menu}
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Menu
						</h5>
					</div>
				</div>
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							${master.visit.master.menucount} 회
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Count
						</h5>
					</div>
				</div>
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							<c:if test="${master.visit.master.menustay > 0}">
								${master.visit.master.menustay} 분
							</c:if>
							<c:if test="${master.visit.master.menustay <= 0}">
								1 분 미만
							</c:if>
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Stay
						</h5>
					</div>
				</div>
			</div>
			<div class="ui divider"></div>
			<div class="ui grid">
				<div class="ten wide column">
					<div id="masterChart" style="height:200px; width:90%;"></div>
				</div>
				<div class="six wide column">
					<table class="ui center aligned striped compact table">
						<thead class="ui center aligned inverted table">
							<tr>
								<th>Menu</th>
								<th>Count</th>
								<th>Stay</th>
							</tr>
						</thead>
						<tbody>
						<c:forEach var="sub" items="${master.visit.mastersub}">
							<tr>
								<td>${sub.menu}</td>
								<td>${sub.menucount} 회</td>
								<td>
									<c:if test="${sub.menustay > 0}">
										${sub.menustay} 분
									</c:if>
									<c:if test="${sub.menustay <= 0}">
										1 분 미만
									</c:if>
								</td>
							</tr>
						</c:forEach>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="ui black segment">
			<div class="ui three statistics">
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							${master.visit.account.menu}
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Menu
						</h5>
					</div>
				</div>
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							${master.visit.account.menucount} 회
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Count
						</h5>
					</div>
				</div>
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							<c:if test="${master.visit.account.menustay > 0}">
								${master.visit.account.menustay} 분
							</c:if>
							<c:if test="${master.visit.account.menustay <= 0}">
								1 분 미만
							</c:if>
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Stay
						</h5>
					</div>
				</div>
			</div>
			<div class="ui divider"></div>
			<div class="ui grid">
				<div class="ten wide column">
					<div id="accountChart" style="height:200px; width:90%;"></div>
				</div>
				<div class="six wide column">
					<table class="ui center aligned striped compact table">
						<thead class="ui center aligned inverted table">
							<tr>
								<th>Menu</th>
								<th>Count</th>
								<th>Stay</th>
							</tr>
						</thead>
						<tbody>
						<c:forEach var="sub" items="${master.visit.accountsub}">
							<tr>
								<td>${sub.menu}</td>
								<td>${sub.menucount} 회</td>
								<td>
									<c:if test="${sub.menustay > 0}">
										${sub.menustay} 분
									</c:if>
									<c:if test="${sub.menustay <= 0}">
										1 분 미만
									</c:if>
								</td>
							</tr>
						</c:forEach>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="ui black segment">
			<div class="ui three statistics">
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							${master.visit.league.menu}
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Menu
						</h5>
					</div>
				</div>
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							${master.visit.league.menucount} 회
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Count
						</h5>
					</div>
				</div>
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							<c:if test="${master.visit.league.menustay > 0}">
								${master.visit.league.menustay} 분
							</c:if>
							<c:if test="${master.visit.league.menustay <= 0}">
								1 분 미만
							</c:if>
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Stay
						</h5>
					</div>
				</div>
			</div>
			<div class="ui divider"></div>
			<div class="ui grid">
				<div class="ten wide column">
					<div id="leagueChart" style="height:300px; width:90%;"></div>
				</div>
				<div class="six wide column">
					<table class="ui center aligned striped compact table">
						<thead class="ui center aligned inverted table">
							<tr>
								<th>Menu</th>
								<th>Count</th>
								<th>Stay</th>
							</tr>
						</thead>
						<tbody>
						<c:forEach var="sub" items="${master.visit.leaguesub}">
							<tr>
								<td>${sub.menu}</td>
								<td>${sub.menucount} 회</td>
								<td>
									<c:if test="${sub.menustay > 0}">
										${sub.menustay} 분
									</c:if>
									<c:if test="${sub.menustay <= 0}">
										1 분 미만
									</c:if>
								</td>
							</tr>
						</c:forEach>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="ui black segment">
			<div class="ui three statistics">
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							${master.visit.fifa.menu}
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Menu
						</h5>
					</div>
				</div>
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							${master.visit.fifa.menucount} 회
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Count
						</h5>
					</div>
				</div>
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							<c:if test="${master.visit.fifa.menustay > 0}">
								${master.visit.fifa.menustay} 분
							</c:if>
							<c:if test="${master.visit.fifa.menustay <= 0}">
								1 분 미만
							</c:if>
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							Stay
						</h5>
					</div>
				</div>
			</div>
			<div class="ui divider"></div>
			<div class="ui grid">
				<div class="ten wide column">
					<div id="fifaChart" style="height:400px; width:90%;"></div>
				</div>
				<div class="six wide column">
					<table class="ui center aligned striped compact table">
						<thead class="ui center aligned inverted table">
							<tr>
								<th>Menu</th>
								<th>Count</th>
								<th>Stay</th>
							</tr>
						</thead>
						<tbody>
						<c:forEach var="sub" items="${master.visit.fifasub}">
							<tr>
								<td>${sub.menu}</td>
								<td>${sub.menucount} 회</td>
								<td>
									<c:if test="${sub.menustay > 0}">
										${sub.menustay} 분
									</c:if>
									<c:if test="${sub.menustay <= 0}">
										1 분 미만
									</c:if>
								</td>
							</tr>
						</c:forEach>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/jquery.canvasjs.min.js"></script>
<script>
$(function(){
	
	$.get('/legendleague/visitChart', {type : 'menu'}, function(menu){
		
		var chart = new CanvasJS.Chart('menuChart', {
			
				animationEnabled: true,
				title:{
					text		: 'Menu',
					fontFamily	: 'Noto Serif KR'
				},
				data	: [{
					type				: 'pie',
					startAngle			: 50,
					toolTipContent		: '<b>{label}</b>: {y}%',
					showInLegend		: false,
					legendText			: '{label} ({y}%)',
					indexLabel			: '{label} - {y}%',
					indexLabelFontSize	: 15,
					indexLabelFontFamily: 'Noto Serif KR',
					fontFamily			: 'Noto Serif KR',
					dataPoints			: menu
				}]
			})
			chart.render()
			$('.canvasjs-chart-credit').remove()
			
	}, 'json')
	
	$.get('/legendleague/visitChart', {type : 'submenu', menu : 'master'}, function(master){
		
			var chart = new CanvasJS.Chart('masterChart', {
				
				animationEnabled: true,
				title:{
					text		: 'Master',
					fontFamily	: 'Noto Serif KR'
				},
				toolTip: {
					fontFamily	: 'Noto Serif KR',
					content		: '{x} : {y}'
				},
				axisX	: {
					valueFormatString	: '',
					labelFontFamily		: 'Noto Serif KR',
					tickThickness		: 0,
					lineThickness		: 0,
				},
				axisY	: {
					valueFormatString	: '#',
					labelFontFamily		: 'Noto Serif KR',
					tickThickness		: 0,
					lineThickness		: 0,
					gridThickness		: 0
				},
				data	: [{
					type				: 'bar',
					color				: 'black',
					fontFamily			: 'Noto Serif KR',
					percentFormatString	: '#0.##',
					indexLabel			: '{label} - {y}%',
					indexLabelFontSize	: 10,
					indexLabelFontFamily: 'Noto Serif KR',
					indexLabelPlacement	: 'inside',
					indexLabelFontColor	: 'white',
					indexLabelFontWeight: 500,
					toolTipContent		: '<span style=\"color:black\">{indexLabel}:</span> <span style=\"color:black\"><strong>{y}%</strong></span>',
					xValueFormatString	: '',
					yValueFormatString	: '',
					dataPoints			: master
				}]
			})
			
			chart.render()
			$('.canvasjs-chart-credit').remove()
			
	}, 'json')
	
	$.get('/legendleague/visitChart', {type : 'submenu', menu : 'account'}, function(account){
		
			var chart = new CanvasJS.Chart('accountChart', {
				
				animationEnabled: true,
				title:{
					text		: 'Account',
					fontFamily	: 'Noto Serif KR'
				},
				toolTip: {
					fontFamily	: 'Noto Serif KR',
					content		: '{x} : {y}'
				},
				axisX	: {
					valueFormatString	: '',
					labelFontFamily		: 'Noto Serif KR',
					tickThickness		: 0,
					lineThickness		: 0,
				},
				axisY	: {
					valueFormatString	: '#',
					labelFontFamily		: 'Noto Serif KR',
					tickThickness		: 0,
					lineThickness		: 0,
					gridThickness		: 0
				},
				data	: [{
					type				: 'bar',
					color				: 'black',
					fontFamily			: 'Noto Serif KR',
					percentFormatString	: '#0.##',
					indexLabel			: '{label} - {y}%',
					indexLabelFontSize	: 10,
					indexLabelFontFamily: 'Noto Serif KR',
					indexLabelPlacement	: 'inside',
					indexLabelFontColor	: 'white',
					indexLabelFontWeight: 500,
					toolTipContent		: '<span style=\"color:black\">{indexLabel}:</span> <span style=\"color:black\"><strong>{y}%</strong></span>',
					xValueFormatString	: '',
					yValueFormatString	: '',
					dataPoints			: account
				}]
			})
			
			chart.render()
			$('.canvasjs-chart-credit').remove()
			
	}, 'json')
	
	$.get('/legendleague/visitChart', {type : 'submenu', menu : 'league'}, function(league){
		
			var chart = new CanvasJS.Chart('leagueChart', {
				
				animationEnabled: true,
				title:{
					text		: 'League',
					fontFamily	: 'Noto Serif KR'
				},
				toolTip: {
					fontFamily	: 'Noto Serif KR',
					content		: '{x} : {y}'
				},
				axisX	: {
					valueFormatString	: '',
					labelFontFamily		: 'Noto Serif KR',
					tickThickness		: 0,
					lineThickness		: 0,
				},
				axisY	: {
					valueFormatString	: '#',
					labelFontFamily		: 'Noto Serif KR',
					tickThickness		: 0,
					lineThickness		: 0,
					gridThickness		: 0
				},
				data	: [{
					type				: 'bar',
					color				: 'black',
					fontFamily			: 'Noto Serif KR',
					percentFormatString	: '#0.##',
					indexLabel			: '{label} - {y}%',
					indexLabelFontSize	: 10,
					indexLabelFontFamily: 'Noto Serif KR',
					indexLabelPlacement	: 'inside',
					indexLabelFontColor	: 'white',
					indexLabelFontWeight: 500,
					toolTipContent		: '<span style=\"color:black\">{indexLabel}:</span> <span style=\"color:black\"><strong>{y}%</strong></span>',
					xValueFormatString	: '',
					yValueFormatString	: '',
					dataPoints			: league
				}]
			})
			
			chart.render()
			$('.canvasjs-chart-credit').remove()
			
	}, 'json')
	
	$.get('/legendleague/visitChart', {type : 'submenu', menu : 'fifa'}, function(fifa){
		
			var chart = new CanvasJS.Chart('fifaChart', {
				
				animationEnabled: true,
				title:{
					text		: 'FIFA',
					fontFamily	: 'Noto Serif KR'
				},
				toolTip: {
					fontFamily	: 'Noto Serif KR',
					content		: '{x} : {y}'
				},
				axisX	: {
					valueFormatString	: '',
					labelFontFamily		: 'Noto Serif KR',
					tickThickness		: 0,
					lineThickness		: 0,
				},
				axisY	: {
					valueFormatString	: '',
					labelFontFamily		: 'Noto Serif KR',
					tickThickness		: 0,
					lineThickness		: 0,
					gridThickness		: 0
				},
				data	: [{
					type				: 'bar',
					color				: 'black',
					fontFamily			: 'Noto Serif KR',
					percentFormatString	: '#0%',
					indexLabel			: '{label} - {y}%',
					indexLabelFontSize	: 10,
					indexLabelFontFamily: 'Noto Serif KR',
					indexLabelPlacement	: 'inside',
					indexLabelFontColor	: 'white',
					indexLabelFontWeight: 500,
					toolTipContent		: '<span style=\"color:black\">{indexLabel}:</span> <span style=\"color:black\"><strong>{y}%</strong></span>',
					xValueFormatString	: '',
					yValueFormatString	: '',
					dataPoints			: fifa
				}]
			})
			
			chart.render()
			$('.canvasjs-chart-credit').remove()
			
	}, 'json')
	
})
</script>
<jsp:include page="../include/footer.jsp"/>
