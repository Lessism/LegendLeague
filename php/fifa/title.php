<?php include '../db/fifa/title.php';?>
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
		<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/title.php?role=<?=$role?>&name=<?=$name?>">Title</a></div>
		<div class="ui divider"></div>
		<div class="ui one statistics">
			<div class="statistic">
				<div class="value"><h2 class="f k r"><?=$award['countchampion']?></h2></div>
				<div class="label"><h5 class="f k r">Champion</h5></div>
			</div>
		</div>
		<table class="ui striped center aligned table">
			<thead>
				<tr class="ui inverted center aligned table f k r">
					<th>시즌</th>
					<th>타이틀</th>
					<th>클럽</th>
					<th>경기</th>
					<th>승</th>
					<th>무</th>
					<th>패</th>
					<th>승점</th>
				</tr>
			</thead>
			<tbody>
        <?php while ($tit = mysqli_fetch_assoc($title)) : ?>
					<tr>
						<td style="width:20%; border-right:1px solid rgba(34,36,38,.1)">
              <a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$tit['season']?>">
                <?=$tit['season'].'/'.substr($tit['season']+1, 2, 4)?>
              </a>
            </td>
						<td style="width:20%; border-right:1px solid rgba(34,36,38,.1)">
              <a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=champion&season=<?=$tit['season']?>">
                Champion
              </a>
            </td>
						<td style="width:35%; border-right:1px solid rgba(34,36,38,.1)">
              <a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$tit['club']?>">
                <?php
                  $imgRole = 'Club';
                  $imgName = $tit['club'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = '';
                  include '../db/image.php';
                ?>
                <?=$tit['club']?>
              </a>
            </td>
						<td style="width:5%"><?=$tit['maxgame']?></td>
						<td style="width:5%"><?=$tit['maxwin']?></td>
						<td style="width:5%"><?=$tit['maxdraw']?></td>
						<td style="width:5%"><?=$tit['maxlose']?></td>
						<td style="width:5%"><?=$tit['maxpoint']?></td>
					</tr>
        <?php endwhile ?>
			</tbody>
		</table>
	</div>
</section>
<?php include '../include/footer.php';?>
