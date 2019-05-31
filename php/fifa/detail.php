<?php include '../db/fifa/detail.php';?>
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
<?php if ($role == 'Club') : ?>
	<div class="ui center aligned black segment">
		<div class="content">
			<h3 class="f k r"><a class="link f k r" href="<?=$path?>/fifa/detail.php?role=<?=$role?>&name=<?=$name?>">Detail</a></h3>
			<div class="ui divider"></div>
		</div>
		<div>
      <?php
        $imgRole = $role;
        $imgName = $name;
        $imgClass = 'ui centered rounded image';
        $imgStyle = 'max-height:500px';
        include '../db/image.php';
      ?>
    </div>
		<div class="ui divider"></div>
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
			<a class="link f k r" href="<?=$path?>/fifa/stadium.php?name=<?=$personal['stadium']?>">
        <?php
          $imgRole = 'Stadium';
          $imgName = $personal['stadium'];
          $imgClass = 'ui avatar image';
          $imgStyle = '';
          include '../db/image.php';
        ?>
				<?=$personal['stadium']?>
			</a>
		</div>
		<div class="ui segment">
			<div class="ui active inverted black progress"style="margin-top:10px;">
				<div class="bar" style="width:<?=$personal['ovr']+1?>%;">
					<div class="progress"><?=$personal['ovr']?></div>
				</div>
				<div class="label f k r" style="color:black">OVR</div>
			</div>
		</div>
		<div class="ui divider"></div>
		<div class="ui segment f k r">
			<div class="ui header f k r">
				<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$personal['name']?>">
					Information
				</a>
			</div>
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
		<div class="ui segment f k r">
			<div class="ui header f k r">
				<a class="link f k r" href="<?=$path?>/fifa/record.php?role=Club&name=<?=$personal['name']?>">
					Stat
				</a>
			</div>
			<div class="ui divider"></div>
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
		</div>
    <?php if ($personal['history'] != null) : ?>
			<div class="ui segment f k r">
				<div class="ui header f k r">
				<a class="link f k r" href="<?=$path?>/fifa/title.php?role=Club&name=<?=$personal['name']?>">
					History
				</a>
			</div>
				<div class="ui divider"></div>
				<div class="ui five statistics">
					<div class="statistic">
						<div class="value"><h2 class="f k r"><?=$award['countchampion']?></h2></div>
						<div class="label"><h5 class="f k r">Champion</h5></div>
					</div>
					<div class="statistic">
						<div class="value"><h2 class="f k r"><?=$award['countmanager']?></h2></div>
						<div class="label"><h5 class="f k r">FIFA World Manager</h5></div>
					</div>
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
				<div class="ui segment f k r">
					<div class="ui middle aligned relaxed divided list">
            <?php
              $idx = 0;
              $historySeason = '';
              $historys = explode(',', $personal['history']);
              foreach ($historys as $history) : ;
                if ($idx == 0 || $historySeason != substr($history, 0, 7)) : ;
            ?>
								<div class="item">
									<h5 class="f k r">
										<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=substr($history, 0, 4)?>">
											<?=substr($history, 0, 7)?> Season
										</a>
									</h5>
              <?php endif ?>
									<div>
										<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=champion&season=<?=substr($history, 0, 4)?>">
											<?=substr($history, 7, strlen($history))?>
										</a>
									</div>
              <?php if ($idx == 0 || $historySeason != substr($history, 0, 7)): ?>
								</div>
              <?php endif;
                    $idx++;
                    $historySeason = substr($history, 0, 7);
              endforeach;
               ?>
					</div>
				</div>
			</div>
    <?php endif; ?>
	</div>
</c:if>
<?php elseif ($role == 'Manager') : ?>
	<div class="ui center aligned black segment">
		<div class="content">
			<h3 class="f k r"><a class="link f k r" href="<?=$path?>/fifa/detail.php?role=<?=$role?>&name=<?=$name?>">Detail</a></h3>
			<div class="ui divider"></div>
		</div>
		<div>
      <?php
        $imgRole = $role;
        $imgName = $name;
        $imgClass = 'ui centered rounded image';
        $imgStyle = 'max-height:500px';
        include '../db/image.php';
      ?>
    </div>
		<div class="ui divider"></div>
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
          $imgClass = 'ui avatar image';
          $imgStyle = '';
          include '../db/image.php';
        ?>
				<?=$personal['club']?>
			</a>
		</div>
		<div class="ui segment">
			<div class="ui active inverted black progress"style="margin-top:10px;">
				<div class="bar" style="width:<?=$personal['ovr']+1?>%;">
					<div class="progress"><?=$personal['ovr']?></div>
				</div>
				<div class="label f k r" style="color:black">OVR</div>
			</div>
		</div>
		<div class="ui segment f k r">
			<div class="ui header f k r">
				<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$personal['name']?>">
					Information
				</a>
			</div>
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
					<td><?=$personal['height']?> cm <?=$personal['weight']?> kg</td>
				</tr>
				<tr>
					<th>tactic</th>
					<td><?=$personal['tactic']?></td>
				</tr>
			</table>
		</div>
		<div class="ui segment f k r">
			<div class="ui header f k r">
				<a class="link f k r" href="<?=$path?>/fifa/record.php?role=Manager&name=<?=$personal['name']?>">
					Stat
				</a>
			</div>
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
		</div>
    <?php if ($personal['history'] != null) : ?>
			<div class="ui segment f k r">
				<div class="ui header f k r">
				<a class="link f k r" href="<?=$path?>/fifa/award.php?role=Manager&name=<?=$personal['name']?>">
					History
				</a>
			</div>
				<div class="ui divider"></div>
				<div class="ui two statistics">
					<div class="statistic">
						<div class="value"><h2 class="f k r"><?=$award['countchampion']?></h2></div>
						<div class="label"><h5 class="f k r">Champion</h5></div>
					</div>
					<div class="statistic">
						<div class="value"><h2 class="f k r"><?=$award['countchampion']?></h2></div>
						<div class="label"><h5 class="f k r">FIFA World Manager</h5></div>
					</div>
				</div>
				<div class="ui segment f k r">
					<div class="ui middle aligned relaxed divided list">
            <?php
              $idx = 0;
              $historySeason = '';
              $historys = explode(',', $personal['history']);
              foreach ($historys as $history) : ;
                if ($idx == 0 || $historySeason != substr($history, 0, 7)) : ;
            ?>
								<div class="item">
									<h5 class="f k r">
										<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=substr($history, 0, 4)?>">
											<?=substr($history, 0, 7)?> Season
										</a>
									</h5>
              <?php endif ?>
									<div>
										<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=champion&season=<?=substr($history, 0, 4)?>">
											<?=substr($history, 7, strlen($history))?>
										</a>
									</div>
									<div>
										<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Manager&award=manager&season=<?=substr($history, 0, 4)?>">
											FIFA World Manager
										</a>
									</div>
              <?php if ($idx == 0 || $historySeason != substr($history, 0, 7)): ?>
								</div>
              <?php endif;
                    $idx++;
                    $historySeason = substr($history, 0, 7);
              endforeach;
               ?>
					</div>
				</div>
			</div>
    <?php endif; ?>
	</div>
<?php else : ?>
	<div class="ui center aligned black segment">
		<div class="content">
			<h3 class="f k r"><a class="link f k r" href="<?=$path?>/fifa/detail.php?role=<?=$role?>&name=<?=$name?>">Detail</a></h3>
			<div class="ui divider"></div>
		</div>
		<div>
      <?php
        $imgRole = $role;
        $imgName = $name;
        $imgClass = 'ui centered rounded image';
        $imgStyle = 'max-height:500px';
        include '../db/image.php';
      ?>
    </div>
		<div class="ui divider"></div>
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
          $imgClass = 'ui avatar image';
          $imgStyle = '';
          include '../db/image.php';
        ?>
				<?=$personal['club']?>
			</a>
		</div>
		<div class="ui segment">
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
		<div class="ui divider"></div>
		<div class="ui segment f k r">
			<div class="ui header f k r">
				<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$personal['name']?>">
					Information
				</a>
			</div>
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
					<td><?=$personal['height']?> cm <?=$personal['weight']?> kg</td>
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
		<div class="ui segment f k r">
			<div class="ui header f k r">
				<a class="link f k r" href="<?=$path?>/fifa/record.php?role=Player&name=<?=$personal['name']?>">
					Stat
				</a>
			</div>
			<div class="ui divider"></div>
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
		</div>
    <?php if ($personal['history'] != null) : ?>
			<div class="ui segment f k r">
				<div class="ui header f k r">
				<a class="link f k r" href="<?=$path?>/fifa/award.php?role=Player&name=<?=$personal['name']?>">
					History
				</a>
			</div>
				<div class="ui divider"></div>
				<div class="ui four statistics">
					<div class="statistic">
						<div class="value"><h2 class="f k r"><?=$award['countchampion']?></h2></div>
						<div class="label"><h5 class="f k r">Champion</h5></div>
					</div>
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
				<div class="ui segment f k r">
					<div class="ui middle aligned relaxed divided list">
            <?php
              $idx = 0;
              $historySeason = '';
              $historys = explode(',', $personal['history']);
              foreach ($historys as $history) : ;
                if ($idx == 0 || $historySeason != substr($history, 0, 7)) : ;
            ?>
								<div class="item">
									<h5 class="f k r">
										<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=substr($history, 0, 4)?>">
											<?=substr($history, 0, 7)?> Season
										</a>
									</h5>
              <?php endif ?>
 									<div>
 										<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=<?=substr($history, 7, strlen($history)) != 'Legend League Champion' ? 'Player' : 'Club'?>&award=<?php
                        switch (substr($history, 7, strlen($history))) {
                          case ' Legend League Champion':
                            echo 'champion';
                            break;
                          case ' Ballon Dor':
                            echo 'ballondor';
                            break;
                          case ' Goal Scorer':
                            echo 'goalscorer';
                            break;
                          case ' Assist Provider':
                            echo 'assistprovider';
                            break;
                        }
                      ?>&season=<?=substr($history, 0, 4)?>">
                      <?=substr($history, 7, strlen($history))?>
 										</a>
 									</div>
              <?php if ($idx == 0 || $historySeason != substr($history, 0, 7)): ?>
								</div>
              <?php endif;
                    $idx++;
                    $historySeason = substr($history, 0, 7);
              endforeach;
               ?>
					</div>
				</div>
			</div>
    <?php endif; ?>
	</div>
<?php endif; ?>
</section>
<?php include '../include/footer.php';?>
