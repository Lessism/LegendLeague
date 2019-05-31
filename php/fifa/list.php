<?php include '../db/fifa/list.php';?>
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
		<?=$role?>
		List
	</h4>
	<div class="ui divider"></div>
	<table id="list" class="ui celled table f k r">
		<thead class="ui center aligned inverted table">
			<tr>
				<th style="display:none;"></th>
				<th>
          <?php if ($role == 'Club') : ?>
						로스터
          <?php else : ?>
            <?=$role == 'Manager' ? '전술' : '포지션'?>
          <?php endif; ?>
				</th>
				<th><?=$role == 'Club' ? '구단' : '이름'?></th>
				<th>국적</th>
				<th><?=$role == 'Club' ? '창단' : '나이'?></th>
				<th>OVR</th>
			</tr>
		</thead>
		<tbody>
    <?php while ($player = mysqli_fetch_assoc($list)) : ?>
			<tr>
				<td style="display:none;"></td>
				<td class="ui center aligned" style="width:10%;">
          <?php if ($role == 'Club') : ?>
						<?=$player['roster'] == 1 ? '등록' : '미등록'?>
          <?php elseif ($role == 'Manager') : ?>
						<?=$player['tactic']?>
          <?php else : ?>
						<a class="f k r" href="<?=$path?>/fifa/information.php?role=<?=$role?>&type=<?=$player['type']?>">
							<label class="ui <?=$player['icon']?> label llab f k r" style="cursor:pointer;">
								<?=$player['type']?>
							</label>
						</a>
          <?php endif; ?>
				</td>
				<td style="width:50%;">
					<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$player['name']?>">
            <?php
              $imgRole = $role;
              $imgName = $player['name'];
              $imgClass = 'ui avatar image';
              $imgStyle = 'max-width:20px; max-height:20px;';
              include '../db/image.php';
            ?>
						<?=$player['name']?>
					</a>
				</td>
				<td style="width:15%;">
					<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$player['country']?>">
						<i class="<?=strtolower($player['country'])?> flag"></i>
						<?=$player['country']?>
					</a>
				</td>
				<td class="ui center aligned" style="width:10%;">
          <?php if ($role == 'Club') : ?>
            <?=substr($player['regdate'], 0, 4)?>년
          <?php else : ?>
						<?=explode('.', $player['age'])[0]?> 세
          <?php endif; ?>
				</td>
				<td class="ui center aligned" style="width:15%;">
					<div class="ui active inverted <?=$role == 'Player' ? $player['icon'] : 'black'?> progress"style="margin:0px;">
						<div class="bar" style="width:<?=$player['ovr']+1?>%;">
							<div class="progress f k r" style="color:<?=$role == 'Player' ? 'black' : ''?>">
								<i class="futbol icon"></i>
								<?=$player['ovr']?>
							</div>
						</div>
					</div>
				</td>
			</tr>
    <?php endwhile ?>
		</tbody>
	</table>
</section>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(function(){

	$('#list').DataTable({
		pageLength	: 15,
		language	: {
			search		: '',
            zeroRecords	: '일치하는 결과를 찾을 수 없습니다.',
            paginate	: {
            	previous	: "Prev"
            }
		}
	})
	$("#list_filter").insertAfter("#list_info");
	$('#list_length, #list_info').remove()
	$('#list_filter, #list_paginate').addClass('ui center aligned container f k r')
	$('#list_filter').children('label').addClass('ui icon input').append('<i class="search icon"></i>').find('input').attr('placeholder', 'Search').css({margin : '5px', width : '250px'})

})

</script>
<?php include '../include/footer.php';?>
