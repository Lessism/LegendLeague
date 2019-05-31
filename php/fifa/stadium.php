<?php include '../db/fifa/stadium.php';?>
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
				<i class="dot circle outline black icon" style="margin-right:0"></i> <?=$role?>
			</div>
			<div class="sub header">
				<i class="futbol icon" style="margin-right:0"></i> <?=$personal['ovr']?>
			</div>
		</div>
	</div>
	<div class="ui divider"></div>
	<div class="ui center aligned black segment">
		<div class="content">
			<h3 class="f k r"><a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$personal['name']?>">Stadium</a></h3>
			<div class="ui divider"></div>
		</div>
		<div>
      <?php
        $imgRole = 'Stadium';
        $imgName = $personal['stadium'];
        $imgClass = 'ui centered rounded image';
        $imgStyle = 'max-height:500px';
        include '../db/image.php';
      ?>
    </div>
		<div class="ui divider"></div>
		<div class="ui header f k r">
			<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$personal['name']?>">
				<?=$personal['stadium']?>
			</a>
		</div>
		<div class="ui meta f k r">
			<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$personal['country']?>">
				<i class="<?=strtolower($personal['country'])?> flag"></i>
				<?=$personal['country']?>
			</a>
		</div>
		<div class="ui meta f k r">
			<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$personal['name']?>">
        <?php
          $imgRole = $role;
          $imgName = $name;
          $imgClass = 'ui avatar image';
          $imgStyle = '';
          include '../db/image.php';
        ?>
				<?=$personal['name']?>
			</a>
		</div>
		<div class="ui divider"></div>
		<div class="ui segment f k r">
			<div class="ui header f k r">Information</div>
			<table class="ui center aligned table">
				<tr>
					<th>Name</th>
					<td><?=$personal['stadium']?></td>
				</tr>
				<tr>
					<th>Stadium Owner</th>
					<td><?=$personal['name']?></td>
				</tr>
				<tr>
					<th>Subject Matter</th>
					<td><?=$personal['country']?></td>
				</tr>
				<tr>
					<th>Completion</th>
					<td><?=date('Y년', strtotime($personal['regdate']))?></td>
				</tr>
			</table>
		</div>
	</div>
</section>
<?php include '../include/footer.php';?>
