<?php include '../db/fifa/squad.php';?>
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
	<div class="ui segment f k r">
		<div class="ui center aligned header f k r">
			<a class="link f k r" href="<?=$path?>/fifa/squad.php?role=Club&name=<?=$personal['name']?>">
				Squad
			</a>
		</div>
		<table class="ui left aligned table">
			<tr>
				<th class="ui center aligned" style="border-right:1px solid rgba(34,36,38,.1);">Manager</th>
				<td style="border-right:1px solid rgba(34,36,38,.1);">
					<div class="ui one statistics">
						<div class="statistic">
							<div class="value"><h2 class="f k r"><?=$manager['tactic']?></h2></div>
							<div class="label"><h5 class="f k r">전술</h5></div>
						</div>
					</div>
				</td>
				<td style="border-right:1px solid rgba(34,36,38,.1);">
					<div class="ui image header f k r">
            <?php
              $imgRole = 'Manager';
              $imgName = $manager['name'];
              $imgClass = 'ui rounded image';
              $imgStyle = 'height:50px;';
              include '../db/image.php';
            ?>
						<div class="content">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$manager['name']?>">
								<?=$manager['name']?>
							</a>
							<div class="sub header">
								<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$manager['country']?>">
									<i class="dot circle outline icon"></i>
									<i class="<?=strtolower($manager['country'])?> flag"></i>
									<?=$manager['country']?>
								</a>
							</div>
						</div>
					</div>
				</td>
				<td>
					<div class="ui active inverted black progress"style="margin-top:10px;">
						<div class="bar" style="width:<?=$manager['ovr']+1?>%;">
							<div class="progress"><?=$manager['ovr']?></div>
						</div>
						<div class="label f k r" style="color:black">OVR</div>
					</div>
				</td>
			</tr>
      <?php $squad = mysqli_fetch_assoc($squads); ?>
			<tr>
				<th rowspan="11" class="ui center aligned" style="border-top:1px solid rgba(34,36,38,.1); border-right:1px solid rgba(34,36,38,.1);">Player</th>
				<td style="border-right:1px solid rgba(34,36,38,.1);">
					<h3 class="ui center aligned f k r">
						<label class="ui <?=$squad['icon']?> label llab f k r">
							<?=$squad['type']?>
						</label>
					</h3>
				</td>
				<td style="border-right:1px solid rgba(34,36,38,.1);">
					<div class="ui image header f k r">
            <?php
              $imgRole = 'Player';
              $imgName = $squad['name'];
              $imgClass = 'ui rounded image';
              $imgStyle = 'height:50px;';
              include '../db/image.php';
            ?>
						<div class="content">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$squad['name']?>">
								<?=$squad['name']?>
							</a>
							<div class="sub header">
								<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$squad['country']?>">
									<i class="dot circle outline <?=$squad['icon']?> icon"></i>
									<i class="<?=strtolower($squad['country'])?> flag"></i>
									<?=$squad['country']?>
								</a>
							</div>
						</div>
					</div>
				</td>
				<td>
					<div class="ui active inverted <?=$squad['icon']?> progress" style="margin-top:10px;margin-bottom:0;">
						<div class="bar" style="width:<?=$squad['ovr']+1?>%;">
							<div class="progress"><div class="ui meta f k r"><?=$squad['position']?><i class="dot circle outline <?=$squad['icon']?> icon"></i><?=$squad['ovr']?></div></div>
						</div>
					</div>
				</td>
			</tr>
      <?php while ($squad = mysqli_fetch_assoc($squads)) : ?>
				<tr>
					<td style="border-right:1px solid rgba(34,36,38,.1);">
						<h3 class="ui center aligned f k r"><label class="ui <?=$squad['icon']?> label llab f k r"><?=$squad['type']?></label></h3>
					</td>
					<td style="border-right:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Player';
                $imgName = $squad['name'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px;';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$squad['name']?>">
									<?=$squad['name']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$squad['country']?>">
										<i class="dot circle outline <?=$squad['icon']?> icon"></i>
										<i class="<?=strtolower($squad['country'])?> flag"></i>
										<?=$squad['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td>
						<div class="ui active inverted <?=$squad['icon']?> progress" style="margin-top:10px;margin-bottom:0;">
							<div class="bar" style="width:<?=$squad['ovr']?>%;">
								<div class="progress"><div class="ui meta f k r"><?=$squad['position']?><i class="dot circle outline <?=$squad['icon']?> icon"></i><?=$squad['ovr']?></div></div>
							</div>
						</div>
					</td>
				</tr>
      <?php endwhile ?>
		</table>
	</div>
</section>
<?php include '../include/footer.php';?>
