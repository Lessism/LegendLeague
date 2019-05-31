<?php include '../db/league/award.php';?>
<?php include '../include/header.php';?>
<section class="ui black segment container">
<?php
  $rail = 'league';
  include '../include/rail.php';
?>
	<h1 class="f k r" style="margin-top:24px">
		<a class="link f k r" href="<?=$path?>/league/league.php">
			Legend League
		</a>
	</h1>
	<h4 class="f k r">
    <?php
      switch ($award) {
        case 'champion':
          echo 'Legend League Champion';
          break;
        case 'manager':
          echo 'FIFA World Manager';
          break;
        case 'ballondor':
          echo 'Ballon Dor';
          break;
        case 'goalscorer':
          echo 'Goal Scorer';
          break;
        case 'assistprovider':
          echo 'Assist Provider';
          break;
      }
    ?> Award
	</h4>
	<div class="ui divider"></div>
	<div class="ui grid">
		<div class="eleven wide column">
    <?php if (!empty($awardCount)) : ?>
			<div class="ui black segment items">
				<div class="ui center aligned header f k r">
          <?php
            switch ($award) {
              case 'champion':
                echo 'Legend League 최다 우승팀';
                break;
              case 'manager':
                echo '올해의 감독 최다 수상자';
                break;
              case 'ballondor':
                echo '발롱도르 최다 수상자';
                break;
              case 'goalscorer':
                echo '득점왕 최다 수상자';
                break;
              case 'assistprovider':
                echo '도움왕 최다 수상자';
                break;
            }
          ?>
				</div>
				<div class="ui divider"></div>
				<div class="item">
          <?php $count = mysqli_fetch_assoc($awardCount) ?>
					<div class="image" style="<?=$award != 'champion' ? 'max-height:125px;' : ''?>">
            <?php
              $imgRole = $tab;
              $imgName = $count['name'];
              $imgClass = 'ui rounded fluid image';
              $imgStyle = ($award == 'champion' ? 'width:150px; height:150px;' : '').'border-radius:10px;';
              include '../db/image.php';
            ?>
					</div>
					<div class="middle aligned content">
						<div>
							<h3 class="f k r">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$tab?>&name=<?=$count['name']?>">
									<?=$count['name']?>
								</a>
							</h3>
						</div>
						<div class="meta">
							<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$count['country']?>">
								<i class="<?=strtolower($count['country'])?> flag"></i>
							  <?=$count['country']?>
							</a>
						</div>
						<div class="meta">
              <?php if ($award == 'champion') : ?>
								<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$count['stadium']?>">
                  <?php
                    $imgRole = 'Stadium';
                    $imgName = $count['stadium'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = 'width:20px; height:20px;';
                    include '../db/image.php';
                  ?>
									<?=$count['stadium']?>
								</a>
              <?php else : ?>
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$count['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $count['club'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = 'width:20px; height:20px;';
                    include '../db/image.php';
                  ?>
									<?=$count['club']?>
								</a>
              <?php endif ?>
						</div>
						<div class="description" style="text-align:right;">
							<h3 class="f k r">
								<?=$count['count']?> 회 <?=$award == 'champion' ? '우승' : '수상'?>
							</h3>
						</div>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="ui middle aligned divided list">
          <?php while ($count = mysqli_fetch_assoc($awardCount)) : ?>
            <?php if (!empty($count['name'])) : ?>
							<div class="item f k r">
								<div class="right floated content"><?=$count['count']?> 회</div>
                <?php
                  $imgRole = $tab;
                  $imgName = $count['name'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = '';
                  include '../db/image.php';
                ?>
								<div class="content">
									<div class="header">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$tab?>&name=<?=$count['name']?>">
											<?=$count['name']?>
										</a>
									</div>
									<div class="description">
                    <?php if ($award == 'champion') : ?>
										<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Stadium&name=<?=$count['name']?>">
                      <?php
                        $imgRole = 'Stadium';
                        $imgName = $count['stadium'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = 'width:20px; height:20px;';
                        include '../db/image.php';
                      ?>
											<?=$count['stadium']?>
										</a>
                    <?php else : ?>
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$count['club']?>">
                      <?php
                        $imgRole = 'Club';
                        $imgName = $count['club'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = 'width:20px; height:20px;';
                        include '../db/image.php';
                      ?>
											<?=$count['club']?>
										</a>
                    <?php endif ?>
									</div>
								</div>
							</div>
            <?php endif ?>
          <?php endwhile ?>
				</div>
			</div>
    <?php endif ?>
		</div>
		<div class="five wide column">
			<div class="ui center aligned black segment">
				<h3 class="f k r">
          <?=$award == 'champion' ? '년도별 우승팀' : '년도별 수상자'?>
				</h3>
				<div class="ui divider"></div>
				<table class="ui striped center aligned table f k r">
					<thead>
						<tr class="ui inverted center aligned table f k r">
							<th colspan="2"><?=$tab?></th>
							<th>Season</th>
						</tr>
					</thead>
					<tbody>
            <?php while ($awards = mysqli_fetch_assoc($awardList)) : ?>
              <?php if (!empty($awards['name'])) : ?>
								<tr>
									<td style="width:25%">
										<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=<?=$tab?>&award=<?=$award?>&season=<?=$awards['season']?>">
                      <?php
                        $imgRole = $tab;
                        $imgName = $awards['name'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = '';
                        include '../db/image.php';
                      ?>
										</a>
									</td>
									<td>
										<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=<?=$tab?>&award=<?=$award?>&season=<?=$awards['season']?>">
											<?=$awards['name']?>
										</a>
									</td>
									<td>
										<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=<?=$tab?>&award=<?=$award?>&season=<?=$awards['season']?>">
											<?=$awards['season'].'/'.substr($awards['season']+1, 2, 4)?>
										</a>
									</td>
								</tr>
              <?php endif ?>
            <?php endwhile ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<?php include '../include/footer.php';?>
