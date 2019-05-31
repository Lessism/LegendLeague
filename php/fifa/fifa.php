<?php include '../db/fifa/fifa.php';?>
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
		<strong>F</strong>édération <strong>I</strong>nternationale de <strong>F</strong>ootball <strong>A</strong>ssociation
	</h4>
	<div class="ui divider"></div>
	<div class="ui black segment f k r">
		<h3 class="ui center aligned header f k r">
			FIFA World Best Eleven
		</h3>
		<div class="ui divider"></div>
	<div class="ui black segment f k r" style="background-image:url(data:image/jpeg;base64,<?=$back?>);">
		<div class="ui three cards">
			<div class="ui center aligned black card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px; border-top:5px solid #1b1c1d!important;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="<?=$path?>/fifa/information.php?role=Club">
						Club
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$fifaBestClub['name']?>">
            <?php
              $imgRole = 'Club';
              $imgName = $fifaBestClub['name'];
              $imgClass = 'ui centered rounded image';
              $imgStyle = 'height:150px; max-width:150px;';
              include '../db/image.php';
            ?>
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
					<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$fifaBestClub['name']?>">
						<?=$fifaBestClub['name']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$fifaBestClub['country']?>">
						<i class="<?=strtolower($fifaBestClub['country'])?> flag"></i>
						<?=$fifaBestClub['country']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$fifaBestClub['name']?>">
            <?php
              $imgRole = 'Stadium';
              $imgName = $fifaBestClub['stadium'];
              $imgClass = 'ui avatar image';
              $imgStyle = 'max-width:20px; max-height:20px;';
              include '../db/image.php';
            ?>
						<?=$fifaBestClub['stadium']?>
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted black progress"style="margin-top:10px;">
						<div class="bar" style="width:<?=$fifaBestClub['ovr']+1?>%;">
							<div class="progress f k r">
								OVR <i class="dot circle outline white icon"></i><?=$fifaBestClub['ovr']?>
							</div>
						</div>
						<div class="label f k r" style="color:black">
							Rankpoint <i class="futbol icon"></i> <?=$fifaBestClub['rankpoint']?>
						</div>
					</div>
				</div>
			</div>
      <?php $bestEleven = mysqli_fetch_assoc($fifaBestEleven) ?>
			<div class="ui center aligned <?=$bestEleven['icon']?> card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px; border-top:5px solid #fbbd08!important;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="<?=$path?>/fifa/information.php?role=Player&type=<?=$bestEleven['type']?>">
						<?=$bestEleven['position']?>
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$bestEleven['name']?>">
            <?php
              $imgRole = 'Player';
              $imgName = $bestEleven['name'];
              $imgClass = 'ui centered rounded image';
              $imgStyle = 'height:150px; max-width:150px;';
              include '../db/image.php';
            ?>
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
					<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$bestEleven['name']?>">
						<?=$bestEleven['name']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$bestEleven['country']?>">
						<i class="<?=strtolower($bestEleven['country'])?> flag"></i>
						<?=$bestEleven['country']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$bestEleven['club']?>">
            <?php
              $imgRole = 'Club';
              $imgName = $bestEleven['club'];
              $imgClass = 'ui avatar image';
              $imgStyle = 'max-width:20px; max-height:20px;';
              include '../db/image.php';
            ?>
						<?=$bestEleven['club']?>
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted <?=$bestEleven['icon']?> progress"style="margin-top:10px;">
						<div class="bar" style="width:<?=$bestEleven['ovr']+1?>%;">
							<div class="progress f k r" style="color:black;">
								<?=$bestEleven['position']?> <i class="dot circle outline <?=$bestEleven['icon']?> icon"></i><?=$bestEleven['ovr']?>
							</div>
						</div>
						<div class="label f k r" style="color:black;">
							Rankpoint <i class="futbol icon"></i> <?=$bestEleven['rankpoint']?>
						</div>
					</div>
				</div>
			</div>
			<div class="ui center aligned black card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px; border-top:5px solid #1b1c1d!important;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="<?=$path?>/fifa/information.php?role=Manager">
						Manager
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$fifaBestManager['name']?>">
            <?php
              $imgRole = 'Manager';
              $imgName = $fifaBestManager['name'];
              $imgClass = 'ui centered rounded image';
              $imgStyle = 'height:150px; max-width:150px;';
              include '../db/image.php';
            ?>
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
					<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$fifaBestManager['name']?>">
						<?=$fifaBestManager['name']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$fifaBestManager['name']?>">
						<i class="<?=strtolower($fifaBestManager['country'])?> flag"></i>
						<?=$fifaBestManager['country']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$fifaBestManager['club']?>">
            <?php
              $imgRole = 'Club';
              $imgName = $fifaBestManager['club'];
              $imgClass = 'ui avatar image';
              $imgStyle = 'max-width:20px; max-height:20px;';
              include '../db/image.php';
            ?>
						<?=$fifaBestManager['club']?>
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted black progress"style="margin-top:10px;">
						<div class="bar" style="width:<?=$fifaBestManager['ovr']+1?>%;">
							<div class="progress f k r">
								OVR <i class="dot circle outline white icon"></i><?=$fifaBestManager['ovr']?>
							</div>
						</div>
						<div class="label f k r" style="color:black;">
							Rankpoint <i class="futbol icon"></i> <?=$fifaBestManager['rankpoint']?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="ui four cards">
      <?php
        mysqli_data_seek($fifaBestEleven, 3);
        $bestEleven = mysqli_fetch_assoc($fifaBestEleven);
      ?>
			<div class="ui center aligned <?=$bestEleven['icon']?> card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px; border-top:5px solid #2185d0!important;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="<?=$path?>/fifa/information.php?role=Player&type=<?=$bestEleven['type']?>">
						<?=$bestEleven['position']?>
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$bestEleven['name']?>">
            <?php
              $imgRole = 'Player';
              $imgName = $bestEleven['name'];
              $imgClass = 'ui centered rounded image';
              $imgStyle = 'height:150px; max-width:150px;';
              include '../db/image.php';
            ?>
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
					<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$bestEleven['name']?>">
						<?=$bestEleven['name']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$bestEleven['country']?>">
						<i class="<?=strtolower($bestEleven['country'])?> flag"></i>
						<?=$bestEleven['country']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$bestEleven['club']?>">
            <?php
              $imgRole = 'Club';
              $imgName = $bestEleven['club'];
              $imgClass = 'ui avatar image';
              $imgStyle = 'max-width:20px; max-height:20px;';
              include '../db/image.php';
            ?>
						<?=$bestEleven['club']?>
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted <?=$bestEleven['icon']?> progress"style="margin-top:10px;">
						<div class="bar" style="width:<?=$bestEleven['ovr']+1?>%;">
							<div class="progress f k r" style="color:black;">
								<?=$bestEleven['position']?> <i class="dot circle outline <?=$bestEleven['icon']?> icon"></i><?=$bestEleven['ovr']?>
							</div>
						</div>
						<div class="label f k r" style="color:black;">
							Rankpoint <i class="futbol icon"></i> <?=$bestEleven['rankpoint']?>
						</div>
					</div>
				</div>
			</div>
      <?php
        for ($i = 1; $i <= 4; $i++) : ;
          if ($i != 3) : ;
            mysqli_data_seek($fifaBestEleven, $i);
            $bestEleven = mysqli_fetch_assoc($fifaBestEleven);
      ?>
			<div class="ui center aligned <?=$bestEleven['icon']?> card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px; border-top:5px solid #2185d0!important;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="<?=$path?>/fifa/information.php?role=Player&type=<?=$bestEleven['type']?>">
						<?=$bestEleven['position']?>
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$bestEleven['name']?>">
            <?php
              $imgRole = 'Player';
              $imgName = $bestEleven['name'];
              $imgClass = 'ui centered rounded image';
              $imgStyle = 'height:150px; max-width:150px;';
              include '../db/image.php';
            ?>
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
					<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$bestEleven['name']?>">
						<?=$bestEleven['name']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$bestEleven['country']?>">
						<i class="<?=strtolower($bestEleven['country'])?> flag"></i>
						<?=$bestEleven['country']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$bestEleven['club']?>">
            <?php
              $imgRole = 'Club';
              $imgName = $bestEleven['club'];
              $imgClass = 'ui avatar image';
              $imgStyle = 'max-width:20px; max-height:20px;';
              include '../db/image.php';
            ?>
						<?=$bestEleven['club']?>
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted <?=$bestEleven['icon']?> progress"style="margin-top:10px;">
						<div class="bar" style="width:<?=$bestEleven['ovr']+1?>%;">
							<div class="progress f k r" style="color:black;">
								<?=$bestEleven['position']?> <i class="dot circle outline <?=$bestEleven['icon']?> icon"></i><?=$bestEleven['ovr']?>
							</div>
						</div>
						<div class="label f k r" style="color:black">
							Rankpoint <i class="futbol icon"></i> <?=$bestEleven['rankpoint']?>
						</div>
					</div>
				</div>
			</div>
  <?php
      endif;
    endfor;
  ?>
		</div>
		<div class="ui three cards">
    <?php
      for ($i=5; $i < 8; $i++) :
        mysqli_data_seek($fifaBestEleven, $i);
        $bestEleven = mysqli_fetch_assoc($fifaBestEleven);
    ?>
			<div class="ui center aligned <?=$bestEleven['icon']?> card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px; border-top:5px solid #21ba45!important;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="<?=$path?>/fifa/information.php?role=Player&type=<?=$bestEleven['type']?>">
						<?=$bestEleven['position']?>
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$bestEleven['name']?>">
            <?php
              $imgRole = 'Player';
              $imgName = $bestEleven['name'];
              $imgClass = 'ui centered rounded image';
              $imgStyle = 'height:150px; max-width:150px;';
              include '../db/image.php';
            ?>
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
					<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$bestEleven['name']?>">
						<?=$bestEleven['name']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$bestEleven['country']?>">
						<i class="<?=strtolower($bestEleven['country'])?> flag"></i>
						<?=$bestEleven['country']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$bestEleven['club']?>">
            <?php
              $imgRole = 'Club';
              $imgName = $bestEleven['club'];
              $imgClass = 'ui avatar image';
              $imgStyle = 'max-width:20px; max-height:20px;';
              include '../db/image.php';
            ?>
						<?=$bestEleven['club']?>
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted <?=$bestEleven['icon']?> progress"style="margin-top:10px;">
						<div class="bar" style="width:<?=$bestEleven['ovr']+1?>%;">
							<div class="progress f k r" style="color:black;">
								<?=$bestEleven['position']?> <i class="dot circle outline <?=$bestEleven['icon']?> icon"></i><?=$bestEleven['ovr']?>
							</div>
						</div>
						<div class="label f k r" style="color:black">
							Rankpoint <i class="futbol icon"></i> <?=$bestEleven['rankpoint']?>
						</div>
					</div>
				</div>
			</div>
    <?php endfor ?>
		</div>
		<div class="ui three cards">
    <?php
      for ($i=8; $i < 11; $i++) :
        mysqli_data_seek($fifaBestEleven, $i);
        $bestEleven = mysqli_fetch_assoc($fifaBestEleven);
    ?>
			<div class="ui center aligned <?=$bestEleven['icon']?> card segment" style="max-width:250px; margin:auto; margin-top:25px; margin-bottom:10px; border-top:5px solid #db2828!important;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="<?=$path?>/fifa/information.php?role=Player&type=<?=$bestEleven['type']?>">
						<?=$bestEleven['position']?>
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$bestEleven['name']?>">
            <?php
              $imgRole = 'Player';
              $imgName = $bestEleven['name'];
              $imgClass = 'ui centered rounded image';
              $imgStyle = 'height:150px; max-width:150px;';
              include '../db/image.php';
            ?>
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
					<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$bestEleven['name']?>">
						<?=$bestEleven['name']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$bestEleven['country']?>">
						<i class="<?=strtolower($bestEleven['country'])?> flag"></i>
						<?=$bestEleven['country']?>
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$bestEleven['club']?>">
            <?php
              $imgRole = 'Club';
              $imgName = $bestEleven['club'];
              $imgClass = 'ui avatar image';
              $imgStyle = 'max-width:20px; max-height:20px;';
              include '../db/image.php';
            ?>
						<?=$bestEleven['club']?>
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted <?=$bestEleven['icon']?> progress"style="margin-top:10px;">
						<div class="bar" style="width:<?=$bestEleven['ovr']+1?>%;">
							<div class="progress f k r" style="color:black;">
								<?=$bestEleven['position']?> <i class="dot circle outline <?=$bestEleven['icon']?> icon"></i><?=$bestEleven['ovr']?>
							</div>
						</div>
						<div class="label f k r" style="color:black">
							Rankpoint <i class="futbol icon"></i> <?=$bestEleven['rankpoint']?>
						</div>
					</div>
				</div>
			</div>
    <?php endfor ?>
		</div>
	</div>
	</div>
</section>
<?php include '../include/footer.php';?>
