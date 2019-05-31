<?php include '../db/master/menu.php';?>
<?php include '../include/header.php';?>
<section class="ui black segment f k r">
<div class="ui center aligned container">
	<h1 class="f k r">
		<a class="link f k r" href="<?=$path?>/master/master.php">
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
    <?php
      $rail = 'master';
      include '../include/rail.php';
    ?>
	</div>
	<div class="thirteen wide column">
		<div class="ui black segment">
			<div id="menuChart" style="height:250px; width:100%;"></div>
		</div>
		<div class="ui black segment">
			<div class="ui three statistics">
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							<?=$master['menu']?>
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
							<?=$master['menucount']?> 회
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
              <?php if ($master['menustay'] > 0): ?>
								<?=$master['menustay']?> 분
              <?php else : ?>
								1 분 미만
              <?php endif; ?>
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
            <?php while ($sub = mysqli_fetch_assoc($masterSub)) : ?>
							<tr>
								<td><?=$sub['menu']?></td>
								<td><?=$sub['menucount']?> 회</td>
								<td>
                  <?php if ($sub['menustay'] > 0): ?>
                    <?=$sub['menustay']?> 분
                  <?php else : ?>
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
		<div class="ui black segment">
			<div class="ui three statistics">
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							<?=$account['menu']?>
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
							<?=$account['menucount']?> 회
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
              <?php if ($account['menustay'] > 0): ?>
                <?=$account['menustay']?> 분
              <?php else : ?>
                1 분 미만
              <?php endif; ?>
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
            <?php while ($sub = mysqli_fetch_assoc($accountSub)) : ?>
							<tr>
								<td><?=$sub['menu']?></td>
								<td><?=$sub['menucount']?> 회</td>
								<td>
                  <?php if ($sub['menustay'] > 0): ?>
                    <?=$sub['menustay']?> 분
                  <?php else : ?>
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
		<div class="ui black segment">
			<div class="ui three statistics">
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							<?=$league['menu']?>
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
							<?=$league['menucount']?> 회
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
							<tr>
								<td><?=$league['menu']?></td>
								<td><?=$league['menucount']?> 회</td>
								<td>
                  <?php if ($league['menustay'] > 0): ?>
                    <?=$league['menustay']?> 분
                  <?php else : ?>
                    1 분 미만
                  <?php endif; ?>
								</td>
							</tr>
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
            <?php while ($sub = mysqli_fetch_assoc($leagueSub)) : ?>
							<tr>
								<td><?=$sub['menu']?></td>
								<td><?=$sub['menucount']?> 회</td>
								<td>
                  <?php if ($sub['menustay'] > 0): ?>
                    <?=$sub['menustay']?> 분
                  <?php else : ?>
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
		<div class="ui black segment">
			<div class="ui three statistics">
				<div class="ui statistic">
					<div class="value">
						<h2 class="f k r">
							<?=$fifa['menu']?>
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
							<?=$fifa['menucount']?> 회
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
              <?php if ($fifa['menustay'] > 0): ?>
                <?=$fifa['menustay']?> 분
              <?php else : ?>
                1 분 미만
              <?php endif; ?>
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
            <?php while ($sub = mysqli_fetch_assoc($fifaSub)) : ?>
							<tr>
								<td><?=$sub['menu']?></td>
								<td><?=$sub['menucount']?> 회</td>
								<td>
                  <?php if ($sub['menustay'] > 0): ?>
                    <?=$sub['menustay']?> 분
                  <?php else : ?>
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
	</div>
</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/jquery.canvasjs.min.js"></script>
<script>
$(function(){

	$.get('<?=$path?>/db/rest/visitChart.php', {type : 'menu'}, function(menu){

    var dataPoints = [];
    for (var i = 0; i < menu.length; i++) {
      dataPoints.push({ label : menu[i].label, y: parseInt(menu[i].y)});
    }
		var chart = new CanvasJS.Chart('menuChart', {

				animationEnabled: true,
				title:{
					text		: 'Menu',
					fontFamily	: 'Noto Serif KR'
				},
				data	: [{
					type				        : 'pie',
					startAngle		     	: 50,
					toolTipContent 		  : '<b>{label}</b>: {y}%',
					showInLegend 	     	: false,
					legendText	    		: '{label} ({y}%)',
					indexLabel	  	   	: '{label} - {y}%',
					indexLabelFontSize	: 15,
					indexLabelFontFamily: 'Noto Serif KR',
					fontFamily		     	: 'Noto Serif KR',
					dataPoints		     	: dataPoints
				}]
			})
			chart.render()
			$('.canvasjs-chart-credit').remove()

	}, 'json')

	$.get('<?=$path?>/db/rest/visitChart.php', {type : 'submenu', menu : 'master'}, function(master){

      var dataPoints = [];
      for (var i = 0; i < master.length; i++) {
        dataPoints.push({ indexLabel : master[i].indexLabel, label : master[i].label, y: parseInt(master[i].y)});
      }
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
					dataPoints			: dataPoints
				}]
			})

			chart.render()
			$('.canvasjs-chart-credit').remove()

	}, 'json')

	$.get('<?=$path?>/db/rest/visitChart.php', {type : 'submenu', menu : 'account'}, function(account){

      var dataPoints = [];
      for (var i = 0; i < account.length; i++) {
        dataPoints.push({ indexLabel : account[i].indexLabel, label : account[i].label, y: parseInt(account[i].y)});
      }
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
					dataPoints			: dataPoints
				}]
			})

			chart.render()
			$('.canvasjs-chart-credit').remove()

	}, 'json')

	$.get('<?=$path?>/db/rest/visitChart.php', {type : 'submenu', menu : 'league'}, function(league){

      var dataPoints = [];
      for (var i = 0; i < league.length; i++) {
        dataPoints.push({ indexLabel : league[i].indexLabel, label : league[i].label, y: parseInt(league[i].y)});
      }
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
					dataPoints			: dataPoints
				}]
			})

			chart.render()
			$('.canvasjs-chart-credit').remove()

	}, 'json')

	$.get('<?=$path?>/db/rest/visitChart.php', {type : 'submenu', menu : 'fifa'}, function(fifa){

      var dataPoints = [];
      for (var i = 0; i < fifa.length; i++) {
        dataPoints.push({ indexLabel : fifa[i].indexLabel, label : fifa[i].label, y: parseInt(fifa[i].y)});
      }
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
					dataPoints			: dataPoints
				}]
			})

			chart.render()
			$('.canvasjs-chart-credit').remove()

	}, 'json')

})
</script>
<?php include '../include/footer.php';?>
