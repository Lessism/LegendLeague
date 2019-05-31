<?php include '../db/league/preview.php';?>
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
    <?=$leagueSeason['season'].'/'.substr($leagueSeason['season']+1, 2, 4).' Season Preview'?>
  </h4>
	<div class="ui divider"></div>
	<div class="ui grid">
		<div class="five wide column">
			<div class="ui center aligned black segment">
				<h3 class="f k r">Roster</h3>
				<div class="ui divider"></div>
				<table class="ui striped center aligned table">
					<thead>
						<tr class="ui inverted center aligned table f k r">
							<th colspan="2">Club</th>
						</tr>
					</thead>
					<tbody>
            <?php while ($club = mysqli_fetch_assoc($previewClub)) : ?>
							<tr>
								<td style="width:25%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$club['name']?>">
                    <?php
                      $imgRole = 'Club';
                      $imgName = $club['name'];
                      $imgClass = 'ui rounded fluid image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
									</a>
								</td>
								<td>
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$club['name']?>">
										<?=$club['name']?>
									</a>
								</td>
							</tr>
            <?php endwhile ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="eleven wide column">
			<div class="ui black segment">
				<div class="ui center aligned header">
					<h3 class="f k r">
						우승후보
					</h3>
				</div>
				<div class="ui divider"></div>
			<div class="ui two cards">
        <?php
          mysqli_data_seek(($previewClub), 0);
          $club = mysqli_fetch_assoc($previewClub);
        ?>
				<div class="ui center aligned card segment">
					<div style="margin-top:25px">
						<a class="image" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$club['name']?>">
              <?php
                $imgRole = 'Club';
                $imgName = $club['name'];
                $imgClass = 'ui centered rounded image';
                $imgStyle = 'max-height:150px;max-width:150px';
                include '../db/image.php';
              ?>
						</a>
					</div>
					<div class="ui divider"></div>
					<div class="ui header f k r">
						<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$club['name']?>">
							<?=$club['name']?>
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$club['country']?>">
							<i class="<?=strtolower($club['country'])?> flag"></i>
							<?=$club['country']?>
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$club['name']?>">
              <?php
                $imgRole = 'Stadium';
                $imgName = $club['stadium'];
                $imgClass = 'ui avatar image';
                $imgStyle = 'max-width:20px; max-height:20px;';
                include '../db/image.php';
              ?>
							<?=$club['stadium']?>
						</a>
					</div>
					<div class="ui segment">
						<div class="ui active inverted black progress">
							<div class="bar" style="width:<?=$club['ovr']?>%;">
								<div class="progress"><?=$club['ovr']?></div>
							</div>
							<div class="label f k r" style="color:black">OVR</div>
						</div>
					</div>
				</div>
				<div class="ui center aligned card segment">
					<div class="content">
						<h3 class="f k r">Manager</h3>
						<div class="ui divider"></div>
					</div>
					<div>
						<a class="image" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$previewManager['name']?>">
              <?php
                $imgRole = 'Manager';
                $imgName = $previewManager['name'];
                $imgClass = 'ui centered rounded image';
                $imgStyle = 'max-height:150px; max-width:150px;';
                include '../db/image.php';
              ?>
						</a>
					</div>
					<div class="ui divider"></div>
					<div class="ui header f k r">
						<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$previewManager['name']?>">
							<?=$previewManager['name']?>
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$previewManager['country']?>">
							<i class="<?=strtolower($previewManager['country'])?> flag"></i>
							<?=$previewManager['country']?>
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$previewManager['club']?>">
              <?php
                $imgRole = 'Club';
                $imgName = $previewManager['club'];
                $imgClass = 'ui avatar image';
                $imgStyle = 'max-width:20px; max-height:20px;';
                include '../db/image.php';
              ?>
							<?=$previewManager['club']?>
						</a>
					</div>
					<div class="ui segment">
						<div class="ui active inverted black progress">
							<div class="bar" style="width:<?=$previewManager['ovr']?>%;">
								<div class="progress"><?=$previewManager['ovr']?></div>
							</div>
							<div class="label f k r" style="color:black">OVR</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="ui black segment">
				<div class="ui center aligned header">
					<h3 class="f k r">
						핵심선수
					</h3>
				</div>
				<div class="ui divider"></div>
				<div class="ui three cards">
          <?php while ($player = mysqli_fetch_assoc($previewPlayer)) : ?>
						<div class="ui center aligned card segment">
							<div style="margin-top:25px">
								<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$player['name']?>">
                  <?php
                    $imgRole = 'Player';
                    $imgName = $player['name'];
                    $imgClass = 'ui huge avatar image';
                    $imgStyle = '';
                    include '../db/image.php';
                  ?>
								</a>
							</div>
							<div class="ui divider"></div>
							<div class="ui header f k r">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$player['name']?>">
									<?=$player['name']?>
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$player['country']?>">
									<i class="<?=strtolower($player['country'])?> flag"></i>
									<?=$player['country']?>
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$player['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $player['club'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = 'max-width:20px; max-height:20px;';
                    include '../db/image.php';
                  ?>
									<?=$player['club']?>
								</a>
							</div>
							<div class="ui segment">
								<div class="ui active inverted <?=$player['icon']?> progress" style="margin-bottom:0;bottom:0;">
									<div class="bar" style="width:<?=$player['ovr']?>%;">
										<div class="progress">
                      <div class="ui meta f k r">
                        <?=$player['position']?>
                        <i class="dot circle outline <?=$player['icon']?> icon"></i>
                        <?=$player['ovr']?>
                      </div>
                    </div>
									</div>
								</div>
							</div>
						</div>
          <?php endwhile ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include '../include/footer.php'?>
