<?php include '../db/master/total.php';?>
<?php include '../include/header.php';?>
<section class="ui black segment f k r">
<div class="ui center aligned container">
	<h1 class="f k r">
		<a class="link f k r" href="<?=$path?>/master/master.php">
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
    <?php
      $rail = 'master';
      include '../include/rail.php';
    ?>
	</div>
	<div class="fourteen wide column">
		<div class="ui black segment">
			<div class="ui three huge statistics">
				<div class="ui huge statistic">
					<div class="value">
						<h2 class="f k r">
							<?=$total?> 명
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
							<?=$today?> 명
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
				<thead class="ui center aligned inverted table">
					<tr>
						<th colspan="2">Total</th>
					</tr>
				</thead>
					<tbody>
						<tr>
							<th>총 방문자 수</th>
							<td><?=$listTotal['totalcount']?> 명</td>
						</tr>
						<tr>
							<th>평균 방문자 수</th>
							<td><?=$listTotal['totalavgcount']?> 명</td>
						</tr>
						<tr>
							<th>총 페이지 방문 수</th>
							<td><?=$listTotal['totalpage']?> 회</td>
						</tr>
						<tr>
							<th>평균 페이지 방문 수</th>
							<td><?=$listTotal['totalavgmenucount']?> 회</td>
						</tr>
						<tr>
							<th>머무른 시간</th>
							<td><?=$listTotal['totalstay']?> 분</td>
						</tr>
						<tr>
							<th>평균 머무르는 시간</th>
							<td><?=$listTotal['totalavgstay']?> 분</td>
						</tr>
					</tbody>
				</table>
				<table class="ui center aligned table">
				<thead class="ui center aligned inverted table">
					<tr>
						<th colspan="2">Today</th>
					</tr>
				</thead>
					<tbody>
						<tr>
							<th>금일 방문자 수</th>
							<td><?=$todayTotal['visitor']?> 명</td>
						</tr>
						<tr>
							<th>총 페이지 방문 수</th>
							<td><?=$todayTotal['totalpage']?> 회</td>
						</tr>
						<tr>
							<th>평균 페이지 방문 수</th>
							<td><?=$todayTotal['avgpage']?> 회</td>
						</tr>
						<tr>
							<th>머무른 시간</th>
							<td><?=$todayTotal['totalstay']?> 분</td>
						</tr>
						<tr>
							<th>평균 머무르는 시간</th>
							<td><?=$todayTotal['avgstay']?> 분</td>
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

	$.get('<?=$path?>/db/rest/visitChart.php', {type : 'daily'}, function(daily){

  	var dataPoints = [];
    for (var i = 0; i < daily.length; i++) {
      dataPoints.push({ x : new Date(daily[i].x), y: parseInt(daily[i].y)});
    }

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
					interval			: 10,
				},
				data	: [{
					type				: 'splineArea',
					color				: 'grey',
					fontFamily			: 'Noto Serif KR',
					xValueType			: 'dateTime',
					xValueFormatString	: 'YYYY년 MM월 DD일',
					yValueFormatString	: '# 명',
					dataPoints			: dataPoints
				}]
			})
			chart.render()
			$('.canvasjs-chart-credit').remove()

	}, 'json')

	$.get('<?=$path?>/db/rest/visitChart.php', {type : 'time'}, function(time){

  	var dataPoints = [];
    for (var i = 0; i < time.length; i++) {
      dataPoints.push({ x : parseInt(time[i].x), y: parseInt(time[i].y)});
    }

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
					valueFormatString	: '# 시',
					labelFontFamily		: 'Noto Serif KR',
					interval 			: 1,
				},
				axisY	: {
					valueFormatString	: '# 명',
					labelFontFamily		: 'Noto Serif KR',
					interval 			: 5,
				},
				data	: [{
					type				: 'spline',
					color				: 'black',
					fontFamily			: 'Noto Serif KR',
					xValueFormatString	: '#시',
					yValueFormatString	: '# 명',
					dataPoints			: dataPoints
				}]
			})
			chart.render()
			$('.canvasjs-chart-credit').remove()

	}, 'json')

	$.get('<?=$path?>/db/rest/visitChart.php', {type : 'week'}, function(week){

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
<?php include '../include/footer.php';?>
