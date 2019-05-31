<?php include '../db/fifa/award.php';?>
<?php include '../include/header.php';?>
<section class="ui black segment container">
<?php
  $rail = 'personal';
  include '../include/rail.php';
?>
	<div class="ui image header f k r">
    <?php
      $imgRole = $role;
      $imgName = $personal['name'];
      $imgClass = 'ui rounded image';
      $imgStyle = ($role == 'Club' ? 'width:50px;' : '').'height:50px;';
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
		<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/award.php?role=<?=$role?>&name=<?=$name?>">Award</a></div>
		<div class="ui divider"></div>
		<div class="ui <?=$role != 'Manager' ? 'three' : 'one'?> statistics">
      <?php if ($role != 'Manager') : ?>
				<div class="statistic">
					<div class="value"><h2 class="f k r"><?=$awardCount['countballondor']?></h2></div>
					<div class="label"><h5 class="f k r">Ballon Dor</h5></div>
				</div>
				<div class="statistic">
					<div class="value"><h2 class="f k r"><?=$awardCount['countgoalscorer']?></h2></div>
					<div class="label"><h5 class="f k r">Goal Scorer</h5></div>
				</div>
				<div class="statistic">
					<div class="value"><h2 class="f k r"><?=$awardCount['countassistprovider']?></h2></div>
					<div class="label"><h5 class="f k r">Assist Provider</h5></div>
				</div>
      <?php else : ?>
				<div class="statistic">
					<div class="value"><h2 class="f k r"><?=$awardCount['countchampion']?></h2></div>
					<div class="label"><h5 class="f k r">FIFA World Manager</h5></div>
				</div>
      <?php endif; ?>
		</div>
		<table class="ui striped center aligned table">
			<thead>
				<tr class="ui inverted center aligned table f k r">
					<th>시즌</th>
					<th>수상</th>
					<th>수상자</th>
					<th>소속</th>
					<th>경기</th>
        <?php if ($role != 'Manager') : ?>
					<th>평점</th>
					<th>득점</th>
					<th>도움</th>
        <?php else : ?>
					<th>승</th>
					<th>무</th>
					<th>패</th>
        <?php endif; ?>
				</tr>
			</thead>
			<tbody>
        <?php if ($role != 'Manager') : ?>
          <?php while ($award = mysqli_fetch_assoc($awards)) : ?>
						<tr>
							<td style="width:10%; border-right:1px solid rgba(34,36,38,.1)">
								<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$award['season']?>">
									<?=$award['season'].'/'.substr($award['season']+1, 2, 4)?>
								</a>
							</td>
							<td style="width:20%; border-right:1px solid rgba(34,36,38,.1)">
								<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=<?php
                  switch ($award['awards']) {
                    case 'Ballon Dor':
                      echo 'ballondor';
                      break;
                    case 'Goal Scorer':
                      echo 'goalscorer';
                      break;
                    default:
                      echo 'assistprovider';
                      break;
                  }
                ?>&season=<?=$award['season']?>">
									<?=$award['awards']?>
								</a>
							<td style="width:20%; border-right:1px solid rgba(34,36,38,.1)">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$award['name']?>">
                  <?php
                    $imgRole = 'Player';
                    $imgName = $award['name'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = '';
                    include '../db/image.php';
                  ?>
									<?=$award['name']?>
								</a>
							</td>
							</td>
							<td style="width:25%; border-right:1px solid rgba(34,36,38,.1)">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$award['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $award['club'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = '';
                    include '../db/image.php';
                  ?>
									<?=$award['club']?>
								</a>
							</td>
							<td style="width:10%"><?=$award['countround']?></td>
							<td style="width:5%">
                <?=$award['avgrating'] > 99 ? '10.0' : substr($award['avgrating'], 0, 1).'.'.substr($award['avgrating'], 1, 1)?>
							</td>
							<td style="width:5%"><?=$award['sumgoal']?></td>
							<td style="width:5%"><?=$award['sumassist']?></td>
						</tr>
          <?php endwhile ?>
        <?php else : ?>
          <?php while ($award = mysqli_fetch_assoc($awards)) : ?>
						<tr>
							<td style="width:10%; border-right:1px solid rgba(34,36,38,.1)">
								<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$award['season']?>">
									<?=$award['season'].'/'.substr($award['season']+1, 2, 4)?>
								</a>
							</td>
							<td style="width:20%; border-right:1px solid rgba(34,36,38,.1)">
								<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Manager&award=manager&season=<?=$award['season']?>">
									<?=$award['awards']?>
								</a>
							</td>
							<td style="width:20%; border-right:1px solid rgba(34,36,38,.1)">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$award['name']?>">
                  <?php
                    $imgRole = 'Manager';
                    $imgName = $award['name'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = '';
                    include '../db/image.php';
                  ?>
									<?=$award['name']?>
								</a>
							</td>
							</td>
							<td style="width:25%; border-right:1px solid rgba(34,36,38,.1)">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$award['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $award['club'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = '';
                    include '../db/image.php';
                  ?>
									<?=$award['club']?>
								</a>
							</td>
							<td style="width:10%"><?=$award['countround']?></td>
							<td style="width:5%"><?=$award['maxwin']?></td>
							<td style="width:5%"><?=$award['maxdraw']?></td>
							<td style="width:5%"><?=$award['maxlose']?></td>
						</tr>
          <?php endwhile ?>
        <?php endif; ?>
			</tbody>
		</table>
	</div>
</section>
<?php include '../include/footer.php';?>
