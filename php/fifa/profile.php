<?php include '../db/fifa/profile.php';?>
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
        <?php if ($role == 'Player'): ?>
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
<?php if ($role == 'Player'): ?>
	<div class="ui grid">
	<div class="five wide column" style="padding:30px;">
		<div class="ui center aligned card segment">
			<div class="ui image">
        <?php
          $imgRole = $role;
          $imgName = $name;
          $imgClass = '';
          $imgStyle = 'background-color:white; border-bottom:1px solid #d4d4d5;';
          include '../db/image.php';
        ?>
			</div>
			<div class="ui header f k r">
				<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$name?>">
					<?=$name?>
				</a>
			</div>
			<div class="ui meta f k r">
				<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$personal['country']?>">
					<i class="<?=strtolower($personal['country'])?> flag"></i>
					<?=$personal['country']?>
				</a>
			</div>
			<div class="ui meta f k r">
				<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$personal['club']?>">
          <?php
            $imgRole = 'Club';
            $imgName = $personal['club'];
            $imgClass = 'ui avatar mini image';
            $imgStyle = 'height:17.5px; width:17.5px;';
            include '../db/image.php';
          ?>
					<?=$personal['club']?>
				</a>
			</div>
			<div class="ui container">
				<div class="ui active inverted <?=$personal['icon']?> progress" style="margin-top:10px;margin-bottom:0;">
					<div class="bar" style="width:<?=$personal['ovr']+1?>%;">
						<div class="progress">
							<div class="ui meta f k r" style="color:black;">
								<?=$personal['position']?>
								<i class="dot circle outline <?=$personal['icon']?> icon"></i>
								<?=$personal['ovr']?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="eleven wide column">
		<div class="ui grid black segment">
			<div class="ui sixteen wide column center aligned">
				<h3 class="f k r"><a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$name?>">Profile</a></h3>
				<div class="ui divider"></div>
			</div>
			<div class="six wide column">
				<div class="ui center aligned segment f k r">
					<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/detail.php?role=<?=$role?>&name=<?=$name?>">Information</a></div>
					<table class="ui center aligned table">
						<tr>
							<th>OVR</th>
							<td><i class="futbol icon"></i><?=$personal['ovr']?></td>
						</tr>
						<tr>
							<th>Birth</th>
							<td><?=$personal['birth']?></td>
						</tr>
						<tr>
							<th>Physical</th>
							<td><?=$personal['height'].' cm '.$personal['weight'].' kg'?></td>
						</tr>
						<tr>
							<th>Type</th>
							<td><?=$personal['fulltype']?></td>
						</tr>
						<tr>
							<th>Position</th>
							<td><i class="dot circle outline <?=$personal['icon']?> icon"></i><?=$personal['position']?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="ten wide column">
				<div class="ui center aligned segment f k r">
					<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/title.php?role=<?=$role?>&name=<?=$name?>">Title</a></div>
					<div class="ui divider"></div>
					<div class="ui one statistics">
						<div class="statistic">
							<div class="value"><h2 class="f k r"><?=$award['countchampion']?></h2></div>
							<div class="label"><h5 class="f k r">Champion</h5></div>
						</div>
					</div>
				</div>
				<div class="ui center aligned segment f k r">
					<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/award.php?role=<?=$role?>&name=<?=$name?>">Award</a></div>
					<div class="ui divider"></div>
					<div class="ui three statistics">
						<div class="statistic">
							<div class="value"><h2 class="f k r"><?=$award['countballondor']?></h2></div>
							<div class="label"><h5 class="f k r">Ballon Dor</h5></div>
						</div>
						<div class="statistic">
							<div class="value"><h2 class="f k r"><?=$award['countgoalscorer']?></h2></div>
							<div class="label"><h5 class="f k r">Goal Scorer</h5></div>
						</div>
						<div class="statistic">
							<div class="value"><h2 class="f k r"><?=$award['countassistprovider']?></h2></div>
							<div class="label"><h5 class="f k r">Assist Provider</h5></div>
						</div>
					</div>
				</div>
			</div>
			<div class="sixteen wide column">
			<div class="ui center aligned segment f k r">
				<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/record.php?role=<?=$role?>&name=<?=$name?>">Record</a></div>
        <?php $rec = mysqli_fetch_assoc($record); ?>
				<table class="ui center aligned table">
					<thead>
						<tr class="f k r">
							<th style="width:10%">
								<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$rec['season']?>">
									<?=$rec['season'].'/'.substr($rec['season']+1, 2, 4)?>
								</a>
							</th>
							<th style="width:10%">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rec['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $rec['club'];
                    $imgClass = 'ui rounded fluid image';
                    $imgStyle = '';
                    include '../db/image.php';
                  ?>
								</a>
							</th>
							<th style="width:40%">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rec['club']?>">
									<?=$rec['club']?>
								</a>
							</th>
							<th style="width:10%"><?=$rec['countround']?> 경기</th>
							<th style="width:10%">
                <?=$rec['avgrating'] > 99 ? '10.0 점' : substr($rec['avgrating'], 0, 1).'.'.substr($rec['avgrating'], 1, 1).' 점'?>
							</th>
							<th style="width:10%"><?=$rec['sumgoal']?> 골</th>
							<th style="width:10%"><?=$rec['sumassist']?> 도움</th>
						</tr>
					</thead>
					<tbody>
            <?php
              $idx = 0;
              while ($rec = mysqli_fetch_assoc($record)) : ;
                if ($idx < 2) : ;
            ?>
							<tr>
								<td style="width:10%">
									<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$rec['season']?>">
  									<?=$rec['season'].'/'.substr($rec['season']+1, 2, 4)?>
									</a>
								</td>
								<td style="width:10%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rec['club']?>">
                    <?php
                      $imgRole = 'Club';
                      $imgName = $rec['club'];
                      $imgClass = 'ui rounded fluid image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
									</a>
								</td>
								<td style="width:40%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rec['club']?>">
										<?=$rec['club']?>
									</a>
								</td>
								<td style="width:10%"><?=$rec['countround']?> 경기</td>
								<td style="width:10%">
                  <?=$rec['avgrating'] > 99 ? '10.0 점' : substr($rec['avgrating'], 0, 1).'.'.substr($rec['avgrating'], 1, 1).' 점'?>
								</td>
								<td style="width:10%"><?=$rec['sumgoal']?> 골</td>
								<td style="width:10%"><?=$rec['sumassist']?> 도움</td>
							</tr>
            <?php
                $idx++;
                endif;
              endwhile;
            ?>
					</tbody>
				</table>
			</div>
			</div>
		</div>
	</div>
	</div>
<?php elseif ($role == 'Manager') : ?>
	<div class="ui grid">
	<div class="five wide column" style="padding:30px;">
		<div class="ui center aligned card segment">
			<div class="ui image">
        <?php
          $imgRole = $role;
          $imgName = $name;
          $imgClass = '';
          $imgStyle = 'background-color:white; border-bottom:1px solid #d4d4d5;';
          include '../db/image.php';
        ?>
      </div>
			<div class="ui header f k r">
				<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$name?>">
					<?=$name?>
				</a>
			</div>
			<div class="ui meta f k r">
				<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$personal['country']?>">
					<i class="<?=strtolower($personal['country'])?> flag"></i>
					<?=$personal['country']?>
				</a>
			</div>
			<div class="ui meta f k r">
				<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$personal['club']?>">
          <?php
            $imgRole = 'Club';
            $imgName = $personal['club'];
            $imgClass = 'ui avatar mini image';
            $imgStyle = '';
            include '../db/image.php';
          ?>
					<?=$personal['club']?>
				</a>
			</div>
			<div class="ui container">
				<div class="ui active inverted black progress"style="margin-top:10px;">
					<div class="bar" style="width:<?=$personal['ovr']+1?>%;">
						<div class="progress">
							<?=$personal['ovr']?>
						</div>
					</div>
					<div class="label f k r" style="color:black">OVR</div>
				</div>
			</div>
		</div>
	</div>
	<div class="eleven wide column">
		<div class="ui grid black segment">
			<div class="ui sixteen wide column center aligned">
				<h3 class="f k r"><a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$name?>">Profile</a></h3>
				<div class="ui divider"></div>
			</div>
			<div class="six wide column">
				<div class="ui center aligned segment f k r">
					<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/detail.php?role=<?=$role?>&name=<?=$name?>">Information</a></div>
					<table class="ui center aligned table">
						<tr>
							<th>OVR</th>
							<td><i class="futbol icon"></i><?=$personal['ovr']?></td>
						</tr>
						<tr>
							<th>Birth</th>
							<td><?=$personal['birth']?></td>
						</tr>
						<tr>
							<th>Physical</th>
							<td><?=$personal['height'].' cm '.$personal['weight'].' kg'?></td>
						</tr>
						<tr>
							<th>Tactic</th>
							<td><?=$personal['tactic']?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="ten wide column">
				<div class="ui center aligned segment f k r">
					<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/title.php?role=<?=$role?>&name=<?=$name?>">Title</a></div>
					<div class="ui divider"></div>
					<div class="ui one statistics">
						<div class="statistic">
							<div class="value"><h2 class="f k r"><?=$award['countchampion']?></h2></div>
							<div class="label"><h5 class="f k r">Champion</h5></div>
						</div>
					</div>
				</div>
				<div class="ui center aligned segment f k r">
					<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/award.php?role=<?=$role?>&name=<?=$name?>">Award</a></div>
					<div class="ui divider"></div>
					<div class="ui one statistics">
						<div class="statistic">
							<div class="value"><h2 class="f k r"><?=$award['countchampion']?></h2></div>
							<div class="label"><h5 class="f k r">FIFA World Manager</h5></div>
						</div>
					</div>
				</div>
			</div>
			<div class="sixteen wide column">
			<div class="ui center aligned segment f k r">
				<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/record.php?role=<?=$role?>&name=<?=$name?>">Record</a></div>
        <?php $rec = mysqli_fetch_assoc($record); ?>
				<table class="ui center aligned table">
					<thead>
						<tr class="f k r">
							<th style="width:10%">
								<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$rec['season']?>">
									<?=$rec['season'].'/'.substr($rec['season']+1, 2, 4)?>
								</a>
							</th>
							<th style="width:10%">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rec['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $rec['club'];
                    $imgClass = 'ui rounded fluid image';
                    $imgStyle = '';
                    include '../db/image.php';
                  ?>
								</a>
							</th>
							<th style="width:40%">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rec['club']?>">
									<?=$rec['club']?>
								</a>
							</th>
							<th style="width:10%"><?=$rec['maxgame']?> 경기</th>
							<th style="width:10%"><?=$rec['maxwin']?> 승</th>
							<th style="width:10%"><?=$rec['maxdraw']?> 무</th>
							<th style="width:10%"><?=$rec['maxlose']?> 패</th>
						</tr>
					</thead>
					<tbody>
            <?php
              $idx = 0;
              while ($rec = mysqli_fetch_assoc($record)) : ;
                if ($idx < 2) : ;
            ?>
							<tr>
								<td style="width:10%">
									<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$rec['season']?>">
  									<?=$rec['season'].'/'.substr($rec['season']+1, 2, 4)?>
									</a>
								</td>
								<td style="width:10%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rec['club']?>">
                    <?php
                      $imgRole = 'Club';
                      $imgName = $rec['club'];
                      $imgClass = 'ui rounded fluid image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
									</a>
								</td>
								<td style="width:40%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rec['club']?>">
										<?=$rec['club']?>
									</a>
								</td>
								<td style="width:10%"><?=$rec['maxgame']?> 경기</td>
								<td style="width:10%"><?=$rec['maxwin']?> 승</td>
								<td style="width:10%"><?=$rec['maxdraw']?> 무</td>
								<td style="width:10%"><?=$rec['maxlose']?> 패</td>
							</tr>
            <?php
                $idx++;
                endif;
              endwhile;
            ?>
					</tbody>
				</table>
			</div>
			</div>
		</div>
	</div>
	</div>
<?php else : ?>
	<div class="ui grid">
	<div class="five wide column" style="padding:30px;">
		<div class="ui center aligned black card segment">
			<div class="ui image">
        <?php
          $imgRole = $role;
          $imgName = $name;
          $imgClass = '';
          $imgStyle = 'background-color:white; border-bottom:1px solid #d4d4d5;';
          include '../db/image.php';
        ?>
			</div>
			<div class="ui header f k r">
				<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$name?>">
					<?=$name?>
				</a>
			</div>
			<div class="ui meta f k r">
				<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$personal['country']?>">
					<i class="<?=strtolower($personal['country'])?> flag"></i>
					<?=$personal['country']?>
				</a>
			</div>
			<div class="ui meta f k r">
				<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$personal['name']?>">
          <?php
            $imgRole = 'Stadium';
            $imgName = $personal['stadium'];
            $imgClass = 'ui avatar mini image';
            $imgStyle = '';
            include '../db/image.php';
          ?>
					<?=$personal['stadium']?>
				</a>
			</div>
			<div class="ui container">
				<div class="ui active inverted black progress"style="margin-top:10px;">
					<div class="bar" style="width:<?=$personal['ovr']+1?>%;">
						<div class="progress"><?=$personal['ovr']?></div>
					</div>
					<div class="label f k r" style="color:black">OVR</div>
				</div>
			</div>
		</div>
	</div>
	<div class="eleven wide column">
		<div class="ui grid black segment">
			<div class="ui sixteen wide column center aligned">
				<h3 class="f k r"><a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$name?>">Profile</a></h3>
				<div class="ui divider"></div>
			</div>
			<div class="six wide column">
				<div class="ui center aligned segment f k r">
					<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/detail.php?role=<?=$role?>&name=<?=$name?>">Information</a></div>
					<table class="ui center aligned table">
						<tr>
							<th>OVR</th>
							<td><i class="futbol icon"></i><?=$personal['ovr']?></td>
						</tr>
						<tr>
							<th>Founding</th>
							<td><?=date('Y년 m월 d일', strtotime($personal['regdate']))?></td>
						</tr>
						<tr>
							<th>Roster</th>
							<td><?=$personal['roster'] == 1 ? '등록' : '미등록'?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="ten wide column">
				<div class="ui center aligned segment f k r">
					<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/title.php?role=<?=$role?>&name=<?=$name?>">Title</a></div>
					<div class="ui divider"></div>
					<div class="ui one statistics">
						<div class="statistic">
							<div class="value"><h2 class="f k r"><?=$award['countchampion']?></h2></div>
							<div class="label"><h5 class="f k r">Champion</h5></div>
						</div>
					</div>
				</div>
				<div class="ui center aligned segment f k r">
					<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/award.php?role=<?=$role?>&name=<?=$name?>">Award</a></div>
					<div class="ui divider"></div>
					<div class="ui one statistics">
						<div class="statistic">
							<div class="value"><h2 class="f k r"><?=$award['countmanager']?></h2></div>
							<div class="label"><h5 class="f k r">FIFA World Manager</h5></div>
						</div>
					</div>
					<div class="ui divider"></div>
					<div class="ui three statistics">
						<div class="statistic">
							<div class="value"><h2 class="f k r"><?=$award['countballondor']?></h2></div>
							<div class="label"><h5 class="f k r">Ballon Dor</h5></div>
						</div>
						<div class="statistic">
							<div class="value"><h2 class="f k r"><?=$award['countgoalscorer']?></h2></div>
							<div class="label"><h5 class="f k r">Goal Scorer</h5></div>
						</div>
						<div class="statistic">
							<div class="value"><h2 class="f k r"><?=$award['countassistprovider']?></h2></div>
							<div class="label"><h5 class="f k r">Assist Provider</h5></div>
						</div>
					</div>
				</div>
			</div>
			<div class="sixteen wide column">
			<div class="ui center aligned segment f k r">
				<div class="ui header f k r"><a class="link f k r" href="<?=$path?>/fifa/record.php?role=<?=$role?>&name=<?=$name?>">Record</a></div>
        <?php $rec = mysqli_fetch_assoc($record); ?>
				<table class="ui center aligned table">
					<thead>
						<tr class="f k r">
							<th style="width:10%">
								<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$rec['season']?>">
									<?=$rec['season'].'/'.substr($rec['season']+1, 2, 4)?>
								</a>
							</th>
							<th style="width:10%">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rec['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $rec['club'];
                    $imgClass = 'ui rounded fluid image';
                    $imgStyle = '';
                    include '../db/image.php';
                  ?>
								</a>
							</th>
							<th style="width:40%">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rec['club']?>">
									<?=$rec['club']?>
								</a>
							</th>
							<th style="width:10%"><?=$rec['maxgame']?> 경기</th>
							<th style="width:10%"><?=$rec['maxwin']?> 승</th>
							<th style="width:10%"><?=$rec['maxdraw']?> 무</th>
							<th style="width:10%"><?=$rec['maxlose']?> 패</th>
						</tr>
					</thead>
					<tbody>
            <?php
              $idx = 0;
              while ($rec = mysqli_fetch_assoc($record)) :
                if ($idx < 2) :
            ?>
							<tr>
								<td style="width:10%">
									<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$rec['season']?>">
  									<?=$rec['season'].'/'.substr($rec['season']+1, 2, 4)?>
									</a>
								</td>
								<td style="width:10%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rec['club']?>">
                    <?php
                      $imgRole  = 'Club';
                      $imgName  = $rec['club'];
                      $imgClass = 'ui rounded fluid image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
									</a>
								</td>
								<td style="width:40%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rec['club']?>">
										<?=$rec['club']?>
									</a>
								</td>
								<td style="width:10%"><?=$rec['maxgame']?> 경기</td>
								<td style="width:10%"><?=$rec['maxwin']?> 승</td>
								<td style="width:10%"><?=$rec['maxdraw']?> 무</td>
								<td style="width:10%"><?=$rec['maxlose']?> 패</td>
							</tr>
            <?php
                $idx++;
                endif;
              endwhile;
            ?>
					</tbody>
				</table>
			</div>
			</div>
		</div>
	</div>
	</div>
<?php endif ?>
</section>
<?php include '../include/footer.php';?>
