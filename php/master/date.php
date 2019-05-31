<?php include '../db/master/date.php';?>
<?php include '../include/header.php';?>
<section class="ui black segment f k r">
<div class="ui center aligned container">
	<h1 class="f k r">
		<a class="link f k r" href="<?=$path?>/master/master.php">
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
    <?php
      $rail = 'master';
      include '../include/rail.php';
    ?>
	</div>
	<div class="thirteen wide column">
		<div class="ui black segment"><div class="ui three statistics">
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							<?=$avgTotal['year']?> 명
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							년 평균
						</h5>
					</div>
				</div>
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							<?=$avgTotal['month']?> 명
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							월 평균
						</h5>
					</div>
				</div>
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							<?=$avgTotal['day']?> 명
						</h2>
					</div>
					<div class="label">
						<h5 class="f k r">
							일 평균
						</h5>
					</div>
				</div>
			</div>
			<div class="ui divider"></div>
			<div class="ui three column grid">
				<div class="column">
					<div id="yearChart" style="height:300px; width:100%;"></div>
				</div>
				<div class="column">
					<div id="monthChart" style="height:300px; width:100%;"></div>
				</div>
				<div class="column">
					<div id="dayChart" style="height:300px; width:100%;"></div>
				</div>
			</div>
			<table class="ui center aligned table">
			<thead>
				<tr class="ui center aligned inverted table">
					<th colspan="6">Visit List</th>
				</tr>
				<tr>
					<th>방문 일자</th>
					<th>총 방문자</th>
					<th>페이지 방문 수</th>
					<th>인당 평균 페이지 방문 수</th>
					<th>머무른 시간</th>
					<th>인당 평균 머무른 시간</th>
				</tr>
			</thead>
				<tbody>
        <?php while ($map = mysqli_fetch_assoc($list)) : ?>
					<tr>
						<th><?=$map['visitday']?></th>
						<td><?=$map['visitcount']?> 명</td>
						<td><?=$map['visitpage']?> 회</td>
						<td><?=$map['avgmenucount']?> 회</td>
						<td>
              <?php if ($map['visitstay'] > 0): ?>
								<?=$map['visitstay']?> 분
              <?php endif; ?>
              <?php if ($map['visitstay'] <= 0): ?>
								1 분 미만
              <?php endif; ?>
						</td>
						<td>
              <?php if ($map['avgstay'] > 0): ?>
								<?=$map['avgstay']?> 분
              <?php endif; ?>
              <?php if ($map['avgstay'] <= 0): ?>
								1 분 미만
              <?php endif; ?>
						</td>
					</tr>
        <?php endwhile ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/jquery.canvasjs.min.js"></script>
<script>
$(function(){

	$.get('<?=$path?>/db/rest/visitChart.php', {type : 'year'}, function(year){

    	var dataPoints = [];
      for (var i = 0; i < year.length; i++) {
        dataPoints.push({ x : parseInt(year[i].x), y: parseInt(year[i].y)});
      }
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
					intervalType		: 'year',
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
					dataPoints			: dataPoints
				}]
			})

			chart.render()
			$('.canvasjs-chart-credit').remove()

	}, 'json')

	$.get('<?=$path?>/db/rest/visitChart.php', {type : 'month'}, function(month){

    	var dataPoints = [];
      for (var i = 0; i < month.length; i++) {
        dataPoints.push({ x : parseInt(month[i].x), y: parseInt(month[i].y)});
      }
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
					intervalType		: 'month',
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
					dataPoints			: dataPoints
				}]
			})

			chart.render()
			$('.canvasjs-chart-credit').remove()

	}, 'json')

	$.get('<?=$path?>/db/rest/visitChart.php', {type : 'day'}, function(day){

      var dataPoints = [];
      for (var i = 0; i < day.length; i++) {
        dataPoints.push({ x : parseInt(day[i].x), y: parseInt(day[i].y)});
      }
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
					intervalType		: 'day',
					interval			: 5
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
					dataPoints			: dataPoints
				}]
			})

			chart.render()
			$('.canvasjs-chart-credit').remove()

	}, 'json')

})
</script>
<?php include '../include/footer.php';?>
