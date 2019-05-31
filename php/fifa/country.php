<?php include '../db/fifa/country.php';?>
<?php include '../include/header.php';?>
<section class="ui black segment container">
<?php
  $rail = 'fifa';
  include '../include/rail.php';
?>
	<h1 class="f k r">
		<a class="link f k r" href="<?=$path?>/fifa/fifa.php">
			FIFA
		</a>
	</h1>
	<h4 class="f k r">
		Country <?=$country?>
	</h4>
	<div class="ui divider"></div>
	<div class="ui black segment f k r">
		<div class="ui center aligned header f k r">
			<a class="link f k r" href="">
				<i class="<?=strtolower($country)?> flag"></i>
				<?=$country?>
			</a>
		</div>
		<div class="ui divider"></div>
		<div id="countrychart" ></div>
    </div>
	<div class="ui black segment">
		<h3 class="ui center aligned header f k r">
			<?=$country?> Best Ranking
		</h3>
		<div class="ui horizontal segments">
      <?php if (!empty($countryRankClub)): ?>
				<div class="ui black segment items">
					<div class="ui center aligned dividing header f k r">
						<a class="link f k r" href="<?=$path?>/fifa/information.php?role=Club">
							Club
						</a>
					</div>
					<div class="item">
            <?php $rankClub = mysqli_fetch_assoc($countryRankClub) ?>
						<a class="image" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankClub['name']?>" style="max-width:125px; max-height:100px;">
              <?php
                $imgRole = 'Club';
                $imgName = $rankClub['name'];
                $imgClass = '';
                $imgStyle = 'height:100px; border-radius:10px;';
                include '../db/image.php';
              ?>
						</a>
						<div class="middle aligned content">
							<div class="header">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankClub['name']?>">
									<?=$rankClub['name']?>
								</a>
							</div>
							<div class="meta">
								<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$rankClub['name']?>">
                  <?php
                    $imgRole = 'Stadium';
                    $imgName = $rankClub['stadium'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = 'max-width:20px; max-height:20px;';
                    include '../db/image.php';
                  ?>
									<?=$rankClub['stadium']?>
								</a>
							</div>
							<div class="description">
								<div class="ui active inverted black progress"style="margin-top:10px;">
									<div class="bar" style="width:<?=$rankClub['ovr']+1?>%;">
										<div class="progress f k r"><?=$rankClub['ovr']?></div>
									</div>
									<div class="label f k r" style="color:black">OVR</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ui divider"></div>
					<div class="ui middle aligned divided list">
            <?php while ($rankClub = mysqli_fetch_assoc($countryRankClub)) : ?>
							<div class="item" style="vertical-align:middle;">
                <?php
                  $imgRole = 'Club';
                  $imgName = $rankClub['name'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = '';
                  include '../db/image.php';
                ?>
								<div class="content">
									<div class="header">
										<h5 class="f k r">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankClub['name']?>">
												<?=$rankClub['name']?>
											</a>
										</h5>
									</div>
									<div class="meta">
										<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$rankClub['name']?>">
                      <?php
                        $imgRole = 'Stadium';
                        $imgName = $rankClub['stadium'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = 'max-width:20px; max-height:20px;';
                        include '../db/image.php';
                      ?>
											<?=$rankClub['stadium']?>
										</a>
									</div>
								</div>
								<div class="right floated content">
									<h5 class="f k r">
										<i class="futbol icon"></i><?=$rankClub['ovr']?>
									</h5>
								</div>
							</div>
            <?php endwhile ?>
					</div>
				</div>
      <?php endif; ?>
      <?php if (!empty($countryRankManager)) : ?>
				<div class="ui black segment items">
					<div class="ui center aligned dividing header f k r">
						<a class="link f k r" href="<?=$path?>/fifa/information.php?role=Manager">
							Manager
						</a>
					</div>
					<div class="item">
            <?php $rankManager = mysqli_fetch_assoc($countryRankManager) ?>
						<a class="image" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$rankManager['name']?>" style="max-width:125px; max-height:100px;">
              <?php
                $imgRole = 'Manager';
                $imgName = $rankManager['name'];
                $imgClass = '';
                $imgStyle = 'height:100px; border-radius:10px;';
                include '../db/image.php';
              ?>
						</a>
						<div class="middle aligned content">
							<div class="header">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$rankManager['name']?>">
									<?=$rankManager['name']?>
								</a>
							</div>
							<div class="meta">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankManager['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $rankManager['club'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = 'max-width:20px; max-height:20px;';
                    include '../db/image.php';
                  ?>
									<?=$rankManager['club']?>
								</a>
							</div>
							<div class="description">
								<div class="ui active inverted black progress"style="margin-top:10px;">
									<div class="bar" style="width:<?=$rankManager['ovr']+1?>%;">
										<div class="progress f k r"><?=$rankManager['ovr']?></div>
									</div>
									<div class="label f k r" style="color:black">OVR</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ui divider"></div>
					<div class="ui middle aligned divided list">
            <?php while ($rankManager = mysqli_fetch_assoc($countryRankManager)) : ?>
							<div class="item" style="vertical-align:middle;">
                <?php
                  $imgRole = 'Manager';
                  $imgName = $rankManager['name'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = '';
                  include '../db/image.php';
                ?>
								<div class="content">
									<div class="header">
										<h5 class="f k r">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$rankManager['name']?>">
												<?=$rankManager['name']?>
											</a>
										</h5>
									</div>
									<div class="meta">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankManager['club']?>">
                      <?php
                        $imgRole = 'Club';
                        $imgName = $rankManager['club'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = 'max-width:20px; max-height:20px;';
                        include '../db/image.php';
                      ?>
											<?=$rankManager['club']?>
										</a>
									</div>
								</div>
								<div class="right floated content">
									<h5 class="f k r">
										<i class="futbol icon"></i><?=$rankManager['ovr']?>
									</h5>
								</div>
							</div>
            <?php endwhile ?>
					</div>
				</div>
      <?php endif; ?>
      <?php if (!empty($countryRankPlayer)) : ?>
				<div class="ui black segment items">
					<div class="ui center aligned dividing header f k r">
						<a class="link f k r" href="<?=$path?>/fifa/information.php?role=Player">
							Player
						</a>
					</div>
					<div class="item">
            <?php $rankPlayer = mysqli_fetch_assoc($countryRankPlayer) ?>
						<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$rankPlayer['name']?>" style="max-width:125px; max-height:100px;">
                <?php
                  $imgRole = 'Player';
                  $imgName = $rankPlayer['name'];
                  $imgClass = '';
                  $imgStyle = 'height:100px; border-radius:10px;';
                  include '../db/image.php';
                ?>
						</a>
						<div class="middle aligned content">
							<div class="header">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$rankPlayer['name']?>">
									<?=$rankPlayer['name']?>
								</a>
							</div>
							<div class="meta">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankPlayer['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $rankPlayer['club'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = 'max-width:20px; max-height:20px;';
                    include '../db/image.php';
                  ?>
									<?=$rankPlayer['club']?>
								</a>
							</div>
							<div class="description">
								<div class="ui active inverted <?=$rankPlayer['icon']?> progress">
									<div class="bar" style="width:<?=$rankPlayer['ovr']+1?>%;">
										<div class="progress f k r" style="color:black">
											<?=$rankPlayer['position']?><i class="dot circle outline <?=$rankPlayer['icon']?> icon"></i><?=$rankPlayer['ovr']?>
										</div>
									</div>
									<div class="label f k r" style="color:black">OVR</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ui divider"></div>
					<div class="ui middle aligned divided list">
            <?php while ($rankPlayer = mysqli_fetch_assoc($countryRankPlayer)) : ?>
							<div class="item" style="vertical-align:middle;">
                <?php
                  $imgRole = 'Player';
                  $imgName = $rankPlayer['name'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = '';
                  include '../db/image.php';
                ?>
								<div class="content">
									<div class="header">
										<h5 class="f k r">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$rankPlayer['name']?>">
												<?=$rankPlayer['name']?>
											</a>
										</h5>
									</div>
									<div class="meta">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankPlayer['club']?>">
                      <?php
                        $imgRole = 'Club';
                        $imgName = $rankPlayer['club'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = 'max-width:20px; max-height:20px;';
                        include '../db/image.php';
                      ?>
											<?=$rankPlayer['club']?>
										</a>
									</div>
								</div>
								<div class="right floated content">
									<h5 class="f k r">
										<i class="futbol icon"></i><?=$rankPlayer['ovr']?>
									</h5>
								</div>
							</div>
            <?php endwhile ?>
					</div>
				</div>
      <?php endif; ?>
		</div>
	</div>
</section>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
$(function(){
  Morris.Donut({
    element       : 'countrychart',
    gridTextFamily: 'Noto Serif KR',
    labelColor    : 'black',
    colors		  	: ['#A9D0F5', '#D8CEF6', '#F5ECCE'],
    data		    	: [
      {label: "Club",		value: '<?=$countryCount['club']?>'},
      {label: "Manager",	value: '<?=$countryCount['manager']?>'},
      {label: "Player",	value: '<?=$countryCount['player']?>'}
    ]
  })
})
</script>
<?php include '../include/footer.php';?>
