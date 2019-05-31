<?php include '../db/fifa/record.php';?>
<?php include '../include/header.php';?>
<section class="ui black segment container">
<?php
  $rail = 'personal';
  include '../include/rail.php';
?>
	<div class="ui image header f k r">
    <?php
      $imgRole = $role;
      $imgName = $name;
      $imgClass = 'ui rounded image';
      $imgStyle = 'height:50px;'.($role == 'Club' ? 'width:50px;' : '');
      include '../db/image.php';
    ?>
		<div class="content">
			<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$name?>"><?=$name?></a>
			<div class="sub header">
        <?php if ($role == 'Player') : ?>
					<i class="dot circle outline <?=$personal['icon']?> icon" style="margin-right:0"></i> <?=$personal['position']?> / <?=$personal['fulltype']?>
        <?php else : ?>
					<i class="dot circle outline black icon" style="margin-right:0"></i> <?=$role?>
        <?php endif; ?>
			</div>
			<div class="sub header">
				<i class="futbol icon" style="margin-right:0"></i> <?=$personal['ovr']?>
			</div>
		</div>
	</div>
	<div class="ui divider"></div>
	<div class="ui center aligned black segment f k r">
		<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/record.php?role=<?=$role?>&name=<?=$name?>">Record</a></div>
		<div class="ui divider"></div>
		<div class="ui segment f k r">
			<div class="ui header f k r">Stat</div>
			<div class="ui divider"></div>
      <?php if ($role == 'Player') : ?>
				<div class="ui four statistics">
					<div class="statistic">
						<div class="value"><h2 class="f k r"><?=$stat['sumcountgame']?></h2></div>
						<div class="label"><h5 class="f k r">경기</h5></div>
					</div>
					<div class="statistic">
						<div class="value">
							<h2 class="f k r">
                <?=$stat['avgrating'] > 99 ? '10.0' : substr($stat['avgrating'], 0, 1).'.'.substr($stat['avgrating'], 1, 1)?>
							</h2>
						</div>
						<div class="label"><h5 class="f k r">평점</h5></div>
					</div>
					<div class="statistic">
						<div class="value"><h2 class="f k r"><?=$stat['sumgoal']?></h2></div>
						<div class="label"><h5 class="f k r">골</h5></div>
					</div>
					<div class="statistic">
						<div class="value"><h2 class="f k r"><?=$stat['sumassist']?></h2></div>
						<div class="label"><h5 class="f k r">어시스트</h5></div>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="ui active progress" data-percent="100" style="display:flex;">
					<div class="bar" style="width:<?=$stat['winodds'] * 100?>%; background-color:#2ecc40;">
						<div class="progress"><?=$stat['summaxwin']?> 승</div>
					</div>
					<div class="bar" style="width:<?=$stat['drawodds'] * 100?>%; background-color:#ffe21f;">
						<div class="progress"><?=$stat['summaxdraw']?> 무</div>
					</div>
					<div class="bar" style="width:<?=$stat['loseodds'] * 100?>%; background-color:#ff695e;">
						<div class="progress"><?=$stat['summaxlose']?> 패</div>
					</div>
					<div class="label f k r">승률 <?=floor($stat['winodds'] * 100)?>%</div>
				</div>
      <?php else : ?>
				<div class="ui five statistics">
					<div class="statistic">
						<div class="value"><h2 class="f k r"><?=$stat['sumcountgame']?></h2></div>
						<div class="label"><h5 class="f k r">경기</h5></div>
					</div>
					<div class="statistic">
						<div class="value"><h2 class="f k r"><?=$stat['summaxgoalfor']?></h2></div>
						<div class="label"><h5 class="f k r">득점</h5></div>
					</div>
					<div class="statistic">
						<div class="value"><h2 class="f k r"><?=$stat['summaxgoalagainst']?></h2></div>
						<div class="label"><h5 class="f k r">실점</h5></div>
					</div>
					<div class="statistic">
						<div class="value"><h2 class="f k r"><?=$stat['summaxgoalfor'] - $stat['summaxgoalagainst']?></h2></div>
						<div class="label"><h5 class="f k r">득실차</h5></div>
					</div>
					<div class="statistic">
						<div class="value"><h2 class="f k r"><?=$stat['summaxpoint']?></h2></div>
						<div class="label"><h5 class="f k r">승점</h5></div>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="ui active progress" data-percent="100" style="display:flex;">
					<div class="bar" style="width:<?=$stat['winodds'] * 100?>%; background-color:#2ecc40;">
						<div class="progress"><?=$stat['summaxwin']?> 승</div>
					</div>
					<div class="bar" style="width:<?=$stat['drawodds'] * 100?>%; background-color:#ffe21f;">
						<div class="progress"><?=$stat['summaxdraw']?> 무</div>
					</div>
					<div class="bar" style="width:<?=$stat['loseodds'] * 100?>%; background-color:#ff695e;">
						<div class="progress"><?=$stat['summaxlose']?> 패</div>
					</div>
					<div class="label f k r">승률 <?=floor($stat['winodds'] * 100)?>%</div>
				</div>
      <?php endif; ?>
		</div>
    <?php if ($role == 'Player') : ?>
			<table class="ui striped center aligned table">
				<thead>
					<tr class="ui inverted center aligned table f k r">
						<th>시즌</th>
						<th>소속</th>
						<th>경기</th>
						<th>평점</th>
						<th>득점</th>
						<th>도움</th>
					</tr>
				</thead>
				<tbody>
          <?php while ($stats = mysqli_fetch_assoc($statSeason)) : ?>
						<tr>
							<td style="width:20%; border-right:1px solid rgba(34,36,38,.1)">
								<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$stats['season']?>">
									<?=$stats['season'].'/'.substr($stats['season']+1, 2, 4)?>
								</a>
							</td>
							<td style="width:55%; border-right:1px solid rgba(34,36,38,.1)">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$stats['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $stats['club'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = '';
                    include '../db/image.php';
                  ?>
									<?=$stats['club']?>
								</a>
							</td>
							<td style="width:10%"><?=$stats['countgame']?></td>
							<td style="width:5%">
                <?=$stats['avgrating'] > 99 ? '10.0' : substr($stats['avgrating'], 0, 1).'.'.substr($stats['avgrating'], 1, 1)?>
							</td>
							<td style="width:5%"><?=$stats['sumgoal']?></td>
							<td style="width:5%"><?=$stats['sumassist']?></td>
						</tr>
          <?php endwhile ?>
				</tbody>
			</table>
    <?php else : ?>
			<table class="ui striped center aligned table">
				<thead>
					<tr class="ui inverted center aligned table f k r">
						<th>시즌</th>
						<th>클럽</th>
						<th>경기</th>
						<th>승</th>
						<th>무</th>
						<th>패</th>
						<th>승점</th>
					</tr>
				</thead>
				<tbody>
          <?php while ($stats = mysqli_fetch_assoc($statSeason)) : ?>
						<tr>
							<td style="width:20%; border-right:1px solid rgba(34,36,38,.1)">
								<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$stats['season']?>">
									<?=$stats['season'].'/'.substr($stats['season']+1, 2, 4)?>
								</a>
							</td>
							<td style="width:35%; border-right:1px solid rgba(34,36,38,.1)">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$stats['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $stats['club'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = '';
                    include '../db/image.php';
                  ?>
									<?=$stats['club']?>
								</a>
							</td>
							<td style="width:5%"><?=$stats['maxgame']?></td>
							<td style="width:5%"><?=$stats['maxwin']?></td>
							<td style="width:5%"><?=$stats['maxdraw']?></td>
							<td style="width:5%"><?=$stats['maxlose']?></td>
							<td style="width:5%"><?=$stats['maxpoint']?></td>
						</tr>
          <?php endwhile ?>
				</tbody>
			</table>
    <?php endif; ?>
	</div>
</section>
<?php include '../include/footer.php';?>
