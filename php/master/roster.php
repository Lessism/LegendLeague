<?php include '../db/master/roster.php';?>
<?php include '../include/header.php';?>
<section class="ui black segment f k r">
<div class="ui center aligned container">
	<h1 class="f k r">
		<a class="link f k r" href="<?=$path?>/master/master.php">
			Master
		</a>
	</h1>
	<h4 class="f k r">
		Edit Roster
	</h4>
</div>
<div class="ui divider"></div>
<div class="ui grid">
	<div class="two wide column">
    <?php
      $rail = 'master';
      include '../include/rail.php';
    ?>
	</div>
	<div class="fourteen wide column">
    <?php if (empty($_GET['name'])) : ?>
			<div class="ui grid">
				<div class="three wide column">
					<form method="post" action="<?=$path?>/db/master/rosteredit.php">
						<table class="ui center aligned selectable table f k r" id="roster">
							<thead class="ui center aligned inverted table">
								<tr>
									<th style="display:none;"></th>
									<th colspan="2">Legend League</th>
									<th style="display:none;"></th>
								</tr>
							</thead>
							<tbody style="cursor: pointer">
              <?php while ($roster = mysqli_fetch_assoc($list)) : ?>
								<tr class="club">
									<td style="display:none;"></td>
									<td class="img" style="width:20%;">
                    <?php
                      $imgNo = $roster['emblem'];
                      $imgClass = 'ui rounded fluid image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
									</td>
									<td class="name" style="width:80%;">
										<span><?=$roster['name']?></span>
									</td>
									<td class="info" style="display:none;">
										<input type="hidden" name="roster[]" value="<?=$roster['name']?>">
										<span class="emblem">
                      <?php
                        $imgNo = $roster['emblem'];
                        $imgClass = 'ui rounded fluid image';
                        $imgStyle = '';
                        include '../db/image.php';
                      ?>
                    </span>
										<span class="country"><?=$roster['country']?></span>
										<span class="regdate"><?=date('Y년', strtotime($roster['regdate']))?></span>
										<span class="ovr"><?=$roster['ovr']?></span>
									</td>
								</tr>
              <?php endwhile ?>
							</tbody>
						</table>
					</form>
				</div>
				<div class="two wide column">
					<div class="ui center aligned" style="padding:50px; margin-top:auto; margin-bottom:auto;">
						<div>
							<i class="arrow left huge link icon" id="add"></i>
						</div>
						<div>
							<i class="arrow right huge link icon" id="remove"></i>
						</div>
					</div>
				</div>
				<div class="eleven wide column">
					<table class="ui selectable celled table f k r" id="list">
						<thead class="ui center aligned inverted table">
							<tr>
								<th style="display:none;"></th>
								<th>로스터</th>
								<th>구단</th>
								<th>국적</th>
								<th>창단</th>
								<th>OVR</th>
							</tr>
						</thead>
						<tbody id="listBody" style="cursor: pointer">
            <?php while ($club = mysqli_fetch_assoc($unrosted)) : ?>
							<tr class="club">
								<td style="display:none;"></td>
								<td class="ui center aligned type" style="width:10%;">
									<span><?=$club['roster'] == 1 ? '등록' : '미등록'?></span>
								</td>
								<td class="name" style="width:50%;">
                  <?php
                    $imgNo = $club['emblem'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = 'max-width:20px; max-height:20px;';
                    include '../db/image.php';
                  ?>
									<span><?=$club['name']?></span>
								</td>
								<td class="country" style="width:15%;">
									<i class="<?=strtolower($club['country'])?> flag"></i>
									<span><?=$club['country']?></span>
								</td>
								<td class="ui center aligned age" style="width:10%;">
									<?=date('Y년', strtotime($club['regdate']))?>
								</td>
								<td class="ui center aligned ovr" style="width:15%;">
									<div class="ui active inverted black progress"style="margin:0px;">
										<div class="bar" style="width:<?=$club['ovr']+1?>%;">
											<div class="progress f k r">
												<i class="futbol icon"></i>
												<span><?=$club['ovr']?></span>
											</div>
										</div>
									</div>
								</td>
							</tr>
            <?php endwhile ?>
						</tbody>
					</table>
				</div>
			</div>
    <?php else : ?>
			<div class="ui grid">
				<div class="three wide column">
					<form method="post" action="<?=$path?>/db/master/rosteredit.php">
						<table class="ui center aligned selectable table f k r" id="roster">
							<thead class="ui center aligned inverted table">
								<tr>
									<th colspan="4">
                    <?php
                      $imgRole = 'Club';
                      $imgName = $_GET['name'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
										<?=$_GET['name']?>
										<input type="hidden" name="name" value="<?=$_GET['name']?>">
									</th>
								</tr>
							</thead>
							<tbody style="cursor: pointer">
                <?php if (!empty($rosterManager)) : ?>
									<tr class="manager">
										<td class="ui center aligned type" style="width:10%;">
											<span><?=$rosterManager['tactic']?></span>
										</td>
										<td class="img" style="width:20%;">
                      <?php
                        $imgNo = $rosterManager['profile'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = '';
                        include '../db/image.php';
                      ?>
										</td>
										<td class="name" style="width:70%;">
											<span><?=$rosterManager['name']?></span>
										</td>
										<td class="info" style="display:none;">
											<input type="hidden" name="manager" value="<?=$rosterManager['name']?>">
											<span class="profile">
                        <?php
                          $imgNo = $rosterManager['profile'];
                          $imgClass = 'ui rounded fluid image';
                          $imgStyle = '';
                          include '../db/image.php';
                        ?>
                      </span>
											<span class="country"><?=$rosterManager['country']?></span>
											<span class="age"><?=explode('.', $rosterManager['age'])[0]?> 세</span>
											<span class="ovr"><?=$rosterManager['ovr']?></span>
											<span class="tactic"><?=$rosterManager['tactic']?></span>
										</td>
									</tr>
                <?php endif; ?>
                <?php while ($player = mysqli_fetch_assoc($rosterPlayer)) : ?>
									<tr class="player">
										<td class="ui center aligned type" style="width:10%;">
											<label class="ui <?=$player['icon']?> label llab f k r" style="cursor:pointer;">
												<?=$player['type']?>
											</label>
										</td>
										<td class="img" style="width:20%;">
                      <?php
                        $imgNo = $player['profile'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = '';
                        include '../db/image.php';
                      ?>
										</td>
										<td class="name" style="width:70%;">
											<span><?=$player['name']?></span>
										</td>
										<td class="info" style="display:none;">
											<input type="hidden" name="roster[]" value="<?=$player['name']?>">
											<span class="profile">
                        <?php
                          $imgNo = $player['profile'];
                          $imgClass = 'ui rounded fluid image';
                          $imgStyle = '';
                          include '../db/image.php';
                        ?>
                      </span>
											<span class="country"><?=$player['country']?></span>
											<span class="age"><?=explode('.', $player['age'])[0]?> 세</span>
											<span class="ovr"><?=$player['ovr']?></span>
											<span class="type"><?=$player['type']?></span>
											<span class="icon"><?=$player['icon']?></span>
										</td>
									</tr>
                <?php endwhile ?>
							</tbody>
						</table>
					</form>
				</div>
				<div class="two wide column">
					<div class="ui center aligned" style="padding:50px; padding-top:250px;">
						<div>
							<i class="arrow left huge link icon" id="add"></i>
						</div>
						<div>
							<i class="arrow right huge link icon" id="remove"></i>
						</div>
					</div>
				</div>
				<div class="eleven wide column">
					<div class="ui black segment">
						<div class="ui pointing secondary two item menu">
							<a class="tabular active item f k r" data-tab="manager">Manager</a>
							<a class="tabular item f k r" data-tab="player">Player</a>
						</div>
						<div class="ui tab active" data-tab="manager">
							<table class="ui selectable celled table f k r" id="listManager" style="width:100%">
								<thead class="ui center aligned inverted table">
									<tr>
										<th style="display:none;"></th>
										<th>전술</th>
										<th>이름</th>
										<th>국적</th>
										<th>나이</th>
										<th>OVR</th>
									</tr>
								</thead>
								<tbody id="listBodyManager" style="cursor: pointer">
                <?php while ($manager = mysqli_fetch_assoc($unrostedManager)) : ?>
									<tr class="rowManager">
										<td style="display:none;"></td>
										<td class="ui center aligned type" style="width:10%;">
											<span><?=$manager['tactic']?></span>
										</td>
										<td class="name" style="width:50%;">
                      <?php
                        $imgNo = $manager['profile'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = 'max-width:20px; max-height:20px;';
                        include '../db/image.php';
                      ?>
											<span><?=$manager['name']?></span>
										</td>
										<td class="country" style="width:15%;">
											<i class="<?=strtolower($manager['country'])?> flag"></i>
											<span><?=$manager['country']?></span>
										</td>
										<td class="ui center aligned age" style="width:10%;">
											<span><?=explode('.', $manager['age'])[0]?> 세</span>
										</td>
										<td class="ui center aligned ovr" style="width:15%;">
											<div class="ui active inverted black progress"style="margin:0px;">
												<div class="bar" style="width:<?=$manager['ovr']+1?>%;">
													<div class="progress f k r">
														<i class="futbol icon"></i>
														<span><?=$manager['ovr']?></span>
													</div>
												</div>
											</div>
										</td>
									</tr>
                <?php endwhile ?>
								</tbody>
							</table>
						</div>
						<div class="ui tab" data-tab="player">
							<table class="ui selectable celled table f k r" id="listPlayer" style="width:100%">
								<thead class="ui center aligned inverted table">
									<tr>
										<th style="display:none;"></th>
										<th>포지션</th>
										<th>이름</th>
										<th>국적</th>
										<th>나이</th>
										<th>OVR</th>
									</tr>
								</thead>
								<tbody id="listBodyPlayer" style="cursor: pointer">
                <?php while ($player = mysqli_fetch_assoc($unrostedPlayer)) : ?>
									<tr class="rowPlayer">
										<td style="display:none;"></td>
										<td class="ui center aligned type" style="width:10%;">
											<label class="ui <?=$player['icon']?> label llab f k r" style="cursor:pointer;">
												<?=$player['type']?>
											</label>
											<span style="display:none;"><?=$player['icon']?></span>
										</td>
										<td class="name" style="width:50%;">
                      <?php
                        $imgNo = $player['profile'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = 'max-width:20px; max-height:20px;';
                        include '../db/image.php';
                      ?>
											<span><?=$player['name']?></span>
										</td>
										<td class="country" style="width:15%;">
											<i class="<?=strtolower($player['country'])?> flag"></i>
											<span><?=$player['country']?></span>
										</td>
										<td class="ui center aligned age" style="width:10%;">
											<span><?=explode('.', $player['age'])[0]?> 세</span>
										</td>
										<td class="ui center aligned ovr" style="width:15%;">
											<div class="ui active inverted <?=$player['icon']?> progress"style="margin:0px;">
												<div class="bar" style="width:<?=$player['ovr']+1?>%;">
													<div class="progress f k r" style="color:black;">
														<i class="futbol icon"></i>
														<span><?=$player['ovr']?></span>
													</div>
												</div>
											</div>
										</td>
									</tr>
                <?php endwhile ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
    <?php endif; ?>
		<div class="ui divider"></div>
		<div class="ui center aligned container">
			<input class="ui black button f k r" id="edit" type="button" value="수정">
			<a class="ui button f k r" id="cancel" href="">취소</a>
		</div>
	</div>
</div>
</section>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>

$(function(){

	$('tbody').on('click', 'tr', function(){
		$(this).toggleClass('active')
	})

	$('#edit').on('click', function(){
		$('form').submit()
	})

	$('#add').click(function(){

		if ('<?=empty($_GET['name'])?>' == '1'){

			var club = $('#list').find('tr.active')

			for(i = 0; i < club.length; i++){

				if ($('#roster').children('tbody').children('tr').length < 10 ) {

					var clubinfo = club.eq(i)

					$('#roster').append(
						'<tr class="club">'+
						'	<td style="display:none;"></td>'+
						'	<td class="img" style="width:20%;">'+
						'		<img class="ui rounded fluid image" src="'+ clubinfo.children('.name').children('img').attr('src') +'">'+
						'	</td>'+
						'	<td class="name" style="width:80%;">'+
						'		<span>'+ clubinfo.children('.name').children('span').text() +'</span>'+
						'	</td>'+
						'	<td class="info" style="display:none;">'+
						'		<input type="hidden" name="roster[]" value="'+ clubinfo.children('.name').children('span').text() +'">'+
						'		<span class="emblem"><img class="ui rounded fluid image" src="'+ clubinfo.children('.name').children('img').attr('src') +'"></span>'+
						'		<span class="country">'+ clubinfo.children('.country').children('span').text() +'</span>'+
						'		<span class="regdate">'+ clubinfo.children('.age').text() +'</span>'+
						'		<span class="ovr">'+ clubinfo.children('.ovr').children('div').children('div').children('div').children('span').text() +'</span>'+
						'	</td>'+
						'</tr>'
					)

					$('#list').DataTable().row('.active').remove().draw()
				}
			}
		} else {

			var manager = $('#listManager').find('tr.active.rowManager')

			for(i = 0; i < manager.length; i++){

				var managerinfo = manager.eq(i)

				if ($('#roster').children('tbody').children('tr.manager').length < 1 ) {

					$('#roster').prepend(
						'<tr class="manager">'+
						'	<td class="ui center aligned type" style="width:10%;">'+
						'		<span>'+managerinfo.children('.type').children('span').text()+'</span>'+
						'	</td>'+
						'	<td class="img" style="width:20%;">'+
						'		<img class="ui avatar image" src="'+ managerinfo.children('.name').children('img').attr('src') +'">'+
						'	</td>'+
						'	<td class="name" style="width:80%;">'+
						'		<span>'+ managerinfo.children('.name').children('span').text() +'</span>'+
						'	</td>'+
						'	<td class="info" style="display:none;">'+
						'		<input type="hidden" name="manager" value="'+ managerinfo.children('.name').children('span').text() +'">'+
						'		<span class="profile"><img class="ui rounded fluid image" src="'+ managerinfo.children('.name').children('img').attr('src') +'"></span>'+
						'		<span class="country">'+ managerinfo.children('.country').children('span').text() +'</span>'+
						'		<span class="age">'+ managerinfo.children('.age').text() +'</span>'+
						'		<span class="ovr">'+ managerinfo.children('.ovr').children('div').children('div').children('div').children('span').text() +'</span>'+
						'		<span class="tactic">'+ managerinfo.children('.type').children('span').text() +'</span>'+
						'	</td>'+
						'</tr>'
					)

					$('#listManager').DataTable().row('.active').remove().draw()
				}
			}

			var player = $('#listPlayer').find('tr.active.rowPlayer')

			for(i = 0; i < player.length; i++){

				var playerinfo = player.eq(i)

				if ($('#roster').children('tbody').children('tr.player').length < 11 ) {

					$('#roster').append(
						'<tr class="player">'+
						'	<td class="ui center aligned type" style="width:10%;">'+
						'		<label class="ui ' + playerinfo.children('.type').children('span').text() + ' label llab f k r" style="cursor:pointer;">'+
						'		' + playerinfo.children('.type').children('label').text() +''+
						'		</label>'+
						'	</td>'+
						'	<td class="img" style="width:20%;">'+
						'		<img class="ui avatar image" src="'+ playerinfo.children('.name').children('img').attr('src') +'">'+
						'	</td>'+
						'	<td class="name" style="width:80%;">'+
						'		<span>'+ playerinfo.children('.name').children('span').text() +'</span>'+
						'	</td>'+
						'	<td class="info" style="display:none;">'+
						'		<input type="hidden" name="roster[]" value="'+ playerinfo.children('.name').children('span').text() +'">'+
						'		<span class="profile"><img class="ui rounded fluid image" src="'+ playerinfo.children('.name').children('img').attr('src') +'"></span>'+
						'		<span class="country">'+ playerinfo.children('.country').children('span').text() +'</span>'+
						'		<span class="age">'+ playerinfo.children('.age').text() +'</span>'+
						'		<span class="ovr">'+ playerinfo.children('.ovr').children('div').children('div').children('div').children('span').text() +'</span>'+
						'		<span class="type">'+ playerinfo.children('.type').children('label').text() +'</span>'+
						'		<span class="icon">'+ playerinfo.children('.type').children('span').text() +'</span>'+
						'	</td>'+
						'</tr>'
					)

					$('#listPlayer').DataTable().row('.active').remove().draw()
				}
			}
		}
	})

	$('#remove').click(function(){

		if ('<?=empty($_GET['name'])?>' == '1'){

			var club = $('#roster').find('tr.active')

			for(i = 0; i < club.length; i++){

				var clubinfo = club.eq(i).children('.info')

				var row = $('#list').DataTable().row.add([
					'',
					'<span>미등록</span>',
					'<img class="ui avatar image" src="' + clubinfo.children('.emblem').children('img').attr('src') + '" style="max-width:20px; max-height:20px;">'+
					'<span>' + clubinfo.children('input').val() + '</span>',
					'<i class="' + clubinfo.children('.country').text().toLowerCase() + ' flag"></i>'+
					'<span>' + clubinfo.children('.country').text() + '</span>',
					'' + clubinfo.children('.regdate').text() +'',
					'<div class="ui active inverted black progress"style="margin:0px;">'+
					'	<div class="bar" style="width:' + (clubinfo.children('.ovr').text()+1)/10 + '%;">'+
					'		<div class="progress f k r">'+
					'			<i class="futbol icon"></i>'+
					'			<span>' + clubinfo.children('.ovr').text() + '</span>'+
					'		</div>'+
					'	</div>'+
					'</div>'
				]).draw().node()

				$(row).removeClass().addClass('club odd')
				$(row).find('td').eq(0).addClass('sorting_1').css('display', 'none')
				$(row).find('td').eq(1).addClass('ui center aligned type').css('width', '10%')
				$(row).find('td').eq(2).addClass('name').css('width', '50%')
				$(row).find('td').eq(3).addClass('country').css('width', '15%')
				$(row).find('td').eq(4).addClass('ui center aligned age').css('width', '10%')
				$(row).find('td').eq(5).addClass('ui center aligned ovr').css('width', '15%')

				club.remove()

			}

		} else {

			var manager = $('#roster').find('tr.active.manager')
			var managerinfo = manager.children('.info')

			if (manager.length > 0){

				var managerrow = $('#listManager').DataTable().row.add([
					'',
					'<span>' + managerinfo.children('.tactic').text() + '</span>',
					'<img class="ui avatar image"src="' + managerinfo.children('.profile').children('img').attr('src') + '" style="max-width:20px; max-height:20px;">'+
					'<span>' + managerinfo.children('input').val() + '</span>',
					'<i class="' + managerinfo.children('.country').text().toLowerCase() + ' flag"></i>'+
					'<span>' + managerinfo.children('.country').text() + '</span>',
					'' + managerinfo.children('.age').text() +'',
					'<div class="ui active inverted black progress"style="margin:0px;">'+
					'	<div class="bar" style="width:' + (managerinfo.children('.ovr').text()+1)/10 + '%;">'+
					'		<div class="progress f k r">'+
					'			<i class="futbol icon"></i>'+
					'			<span>' + managerinfo.children('.ovr').text() + '</span>'+
					'		</div>'+
					'	</div>'+
					'</div>'
				]).draw().node()

				$(managerrow).removeClass().addClass('rowManager odd')
				$(managerrow).find('td').eq(0).addClass('sorting_1').css('display', 'none')
				$(managerrow).find('td').eq(1).addClass('ui center aligned type').css('width', '10%')
				$(managerrow).find('td').eq(2).addClass('name').css('width', '50%')
				$(managerrow).find('td').eq(3).addClass('country').css('width', '15%')
				$(managerrow).find('td').eq(4).addClass('ui center aligned age').css('width', '10%')
				$(managerrow).find('td').eq(5).addClass('ui center aligned ovr').css('width', '15%')

				manager.remove()
			}

			var player = $('#roster').find('tr.active.player')

			for(i = 0; i < player.length; i++){

				var playerinfo = player.eq(i).children('.info')

				var playerrow = $('#listPlayer').DataTable().row.add([
					'',
					'<label class="ui ' + playerinfo.children('.icon').text() + ' label llab f k r" style="cursor:pointer;">'+
					'' + playerinfo.children('.type').text() +''+
					'</label>'+
					'<span style="display:none;">' + playerinfo.children('.icon').text() +'</span>',
					'<img class="ui avatar image"src="' + playerinfo.children('.profile').children('img').attr('src') + '" style="max-width:20px; max-height:20px;">'+
					'<span>' + playerinfo.children('input').val() + '</span>',
					'<i class="' + playerinfo.children('.country').text().toLowerCase() + ' flag"></i>'+
					'<span>' + playerinfo.children('.country').text() + '</span>',
					'' + playerinfo.children('.age').text() +'',
					'<div class="ui active inverted '+ playerinfo.children('.icon').text() +' progress"style="margin:0px;">'+
					'	<div class="bar" style="width:' + (playerinfo.children('.ovr').text()+1)/10 + '%;">'+
					'		<div class="progress f k r" style="color:black;">'+
					'			<i class="futbol icon"></i>'+
					'			<span>' + playerinfo.children('.ovr').text() + '</span>'+
					'		</div>'+
					'	</div>'+
					'</div>'
				]).draw().node()

				$(playerrow).removeClass().addClass('rowPlayer odd')
				$(playerrow).find('td').eq(0).addClass('sorting_1').css('display', 'none')
				$(playerrow).find('td').eq(1).addClass('ui center aligned type').css('width', '10%')
				$(playerrow).find('td').eq(2).addClass('name').css('width', '50%')
				$(playerrow).find('td').eq(3).addClass('country').css('width', '15%')
				$(playerrow).find('td').eq(4).addClass('ui center aligned age').css('width', '10%')
				$(playerrow).find('td').eq(5).addClass('ui center aligned ovr').css('width', '15%')

				player.remove()

			}

		}

	})

	$('#list, #listManager, #listPlayer').DataTable({
		pageLength	: 15,
		language	: {
			search		: '',
            zeroRecords	: '일치하는 결과를 찾을 수 없습니다.',
            paginate	: {
            	previous	: 'Prev'
            }
		}
	})

	$("#list_filter").insertAfter("#list_info");
	$('#list_length, #list_info').remove()
	$('#list_filter, #list_paginate').addClass('ui center aligned container f k r').css({width : '100%'})
	$('#list_filter').children('label').addClass('ui icon input').append('<i class="search icon"></i>').find('input').attr('placeholder', 'Search').css({margin : '5px', width : '250px'})


	$("#listManager_filter").insertAfter("#listManager_info");
	$('#listManager_length, #listManager_info').remove()
	$('#listManager_filter, #listManager_paginate').addClass('ui center aligned container f k r').css({width : '100%'})
	$('#listManager_filter').children('label').addClass('ui icon input').append('<i class="search icon"></i>').find('input').attr('placeholder', 'Search').css({margin : '5px', width : '250px'})


	$("#listPlayer_filter").insertAfter("#listPlayer_info");
	$('#listPlayer_length, #listPlayer_info').remove()
	$('#listPlayer_filter, #listPlayer_paginate').addClass('ui center aligned container f k r').css({width : '100%'})
	$('#listPlayer_filter').children('label').addClass('ui icon input').append('<i class="search icon"></i>').find('input').attr('placeholder', 'Search').css({margin : '5px', width : '250px'})

})

</script>
<?php include '../include/footer.php';?>
