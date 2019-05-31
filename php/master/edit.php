<?php include '../db/master/edit.php';?>
<?php include '../include/header.php';?>
<section class="ui black segment f k r">
<div class="ui center aligned container">
	<h1 class="f k r">
		<a class="link f k r" href="<?=$path?>/master/master.php">
			Master
		</a>
	</h1>
	<h4 class="f k r">
		Edit
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
		<table id="list" class="ui selectable celled table f k r">
			<thead class="ui center aligned inverted table">
				<tr>
					<th style="display:none;"></th>
					<th>
            <?php if ($_GET['role'] == 'Club') : ?>
							로스터
            <?php else : ?>
							<?=$_GET['role'] == 'Manager' ? '전술' : '포지션'?>
            <?php endif; ?>
					</th>
					<th><?=$_GET['role'] == 'Club' ? '구단' : '이름'?></th>
					<th>국적</th>
					<th><?=$_GET['role'] == 'Club' ? '창단' : '나이'?></th>
					<th>OVR</th>
				</tr>
			</thead>
			<tbody style="cursor: pointer">
      <?php while ($role = mysqli_fetch_assoc($list)) : ?>
				<tr class="edit" id="<?=str_replace(' ', '_', $role['name'])?>">
					<td style="display:none;"></td>
					<td class="ui center aligned type" style="width:10%;">
            <?php if ($_GET['role'] == 'Club') : ?>
							<?=$role['roster'] == 1 ? '등록' : '미등록'?>
            <?php elseif ($_GET['role'] == 'Manager') : ?>
							<?=$role['tactic']?>
            <?php elseif ($_GET['role'] == 'Player') : ?>
							<label class="ui <?=$role['icon']?> label llab f k r">
								<?=$role['type']?>
							</label>
            <?php endif; ?>
					</td>
					<td class="name" style="width:50%;">
            <?php
              $imgRole = $_GET['role'];
              $imgName = $role['name'];
              $imgClass = 'ui avatar image';
              $imgStyle = 'max-width:20px; max-height:20px;';
              include '../db/image.php';
            ?>
						<span><?=$role['name']?></span>
					</td>
					<td class="country" style="width:15%;">
						<i class="<?=strtolower($role['country'])?> flag"></i>
						<span><?=$role['country']?></span>
					</td>
					<td class="ui center aligned age" style="width:10%;">
            <?php if ($_GET['role'] == 'Club') : ?>
              <?=date('Y년', strtotime($role['regdate']))?>
            <?php else : ?>
              <?=explode('.', $role['age'])[0]?> 세
            <?php endif; ?>
					</td>
					<td class="ui center aligned ovr" style="width:15%;">
						<div class="ui active inverted <?=$_GET['role'] == 'Player' ? $role['icon'] : 'black'?> progress"style="margin:0px;">
							<div class="bar" style="width:<?=$role['ovr']+1?>%;">
								<div class="progress f k r" style="color:<?=$_GET['role'] == 'Player' ? 'black' : ''?>">
									<i class="futbol icon"></i>
									<span><?=$role['ovr']?></span>
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
</section>
<div class="ui modal f k r">
	<i class="close icon"></i>
	<div class="ui grid">
		<div class="five wide column" style="padding:50px">
			<div class="ui center aligned card segment" style="max-width:250px; border-top:5px solid #1b1c1d;">
				<div class="ui role header f k r" style="margin:0; margin-top:10px;">
					<?=$_GET['role']?>
				</div>
				<div class="ui divider"></div>
				<div>
					<img class="ui centered rounded main image" style="height:150px;max-width:150px">
				</div>
				<div class="ui divider"></div>
				<div class="ui name header f k r" style="margin:0;"></div>
				<div class="ui country meta f k r">
					<i id="countryicon"></i>
					<span></span>
				</div>
				<div class="ui sub meta f k r">
					<img class="ui avatar sub image" style="max-width:20px; max-height:20px;">
					<span></span>
				</div>
				<div class="description">
					<div class="ui active inverted black progress" style="margin-top:10px; margin-bottom:0;">
						<div class="bar" id="ovrbar">
							<div class="progress f k r">
								<span class="position">OVR</span>
								<i class="dot circle outline white icon"></i>
								<span class="ovr"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="eleven wide column" style="padding:50px">
			<div class="ui black segment">
				<form class="ui form" id="editform" method="post" action="<?=$path?>/db/master/editpost.php" enctype="multipart/form-data">
					<h3 class="f k r">Information</h3>
					<div class="ui divider"></div>
					<input type="hidden" name="role" value="<?=$_GET['role']?>">
					<input type="hidden" name="name" id="name">
					<div class="ui img field">
						<div class="ui labeled input">
							<label class="ui basic label llab f k r" for="image">
								<?=$_GET['role'] == 'Club' ? '엠블럼' : '프로필'?>
							</label>
							<div class="ui action input">
								<input class="filetext" type="text" placeholder="Image" readonly>
								<input type="file" accept="image/*" name="img" id="image">
								<input type="hidden" name="img_no" id="img_no">
								<div class="ui basic icon button">
									<i class="attach icon"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="ui country field">
						<div class="ui labeled input">
							<label class="ui basic label llab f k r country" for="country">국적</label>
							<div class="ui fluid search selection dropdown">
						  		<input type="hidden" name="country" id="country">
								<div class="default text" id="phcountry"></div>
								<i class="dropdown icon"></i>
								<div class="menu">
                  <?php include '../include/country.php'; ?>
								</div>
							</div>
						</div>
					</div>
          <?php if ($_GET['role'] == 'Club') : ?>
  					<div class="ui stadium field">
  						<div class="ui labeled input field">
  							<label class="ui basic label llab f k r" for="stadium">구장</label>
  							<input type="text" name="stadium" id="stadium">
  							<input type="hidden" name="std_name" id="std_name">
  						</div>
  					</div>
  					<div class="ui stadium_img field">
  						<div class="ui labeled input">
  							<label class="ui basic label llab f k r" for="stadium_img">구장 전경</label>
  							<div class="ui action input">
  								<input class="filetext" type="text" placeholder="Stadium Image" readonly>
  								<input type="file" accept="image/*" name="img1" id="stadium_img">
  								<input type="hidden" name="std_img" id="std_img">
  								<div class="ui icon button">
  									<i class="attach icon"></i>
  								</div>
  							</div>
  						</div>
  					</div>
          <?php else : ?>
  					<div class="ui birth field">
  						<div class="ui labeled icon input calendar">
  							<label class="ui basic label llab f k r" for="birth">생년월일</label>
  							<input type="text" name="birth" id="birth" autocomplete=off>
  							<i class="calendar alternate outline icon"></i>
  						</div>
  					</div>
  					<div class="ui height field">
  						<div class="ui labeled input">
  							<label class="ui basic label llab f k r" for="height">키</label>
  							<input type="text" name="height" id="height" maxlength="3">
  						</div>
  					</div>
  					<div class="ui weight field">
  						<div class="ui labeled input">
  							<label class="ui basic label llab f k r" for="weight">몸무게</label>
  							<input type="text" name="weight" id="weight" maxlength="3">
  						</div>
  					</div>
            <?php if ($_GET['role'] == 'Manager') : ?>
    					<div class="ui tactic field">
    						<div class="ui labeled input">
    							<label class="ui basic label llab f k r tactic" for="tactic">전술</label>
    							<div class="ui fluid search selection tactic dropdown">
    						  		<input type="hidden" name="tactic" id="tactic">
    								<div class="default text"></div>
    								<i class="dropdown icon"></i>
    								<div class="menu">
    									<div class="item">4-3-3</div>
    									<div class="item">4-4-2</div>
    									<div class="item">4-5-1</div>
    								</div>
    							</div>
    						</div>
    					</div>
            <?php else : ?>
    					<div class="ui position field">
    						<div class="ui labeled input">
    							<label class="ui basic label llab f k r position" for="position">포지션</label>
    							<div class="ui fluid search selection position dropdown">
    						  		<input type="hidden" name="position" id="position">
    								<div class="default text"></div>
    								<i class="dropdown icon"></i>
    								<div class="menu">
    									<div class="divider"></div>
    									<div class="header">Forward</div>
    									<div class="divider"></div>
    										<div class="item" data-value="ST">
    											<i class="dot circle outline red icon"></i>
    											Striker
    											<span class="poicon" style="display:none;">red</span>
    											<span class="poborder" style="display:none;">#db2828</span>
    											<input type="hidden" name="potype" value="FW">
    											<input type="hidden" name="poicon" value="red">
    											<input type="hidden" name="poborder" value="#db2828">
    										</div>
    										<div class="item" data-value="CF">
    											<i class="dot circle outline red icon"></i>
    											Center Foward
    											<span class="poicon" style="display:none;">red</span>
    											<span class="poborder" style="display:none;">#db2828</span>
    											<input type="hidden" name="potype" value="FW">
    											<input type="hidden" name="poicon" value="red">
    											<input type="hidden" name="poborder" value="#db2828">
    										</div>
    										<div class="item" data-value="WF">
    											<i class="dot circle outline red icon"></i>
    											Wing Foward
    											<span class="poicon" style="display:none;">red</span>
    											<span class="poborder" style="display:none;">#db2828</span>
    											<input type="hidden" name="potype" value="FW">
    											<input type="hidden" name="poicon" value="red">
    											<input type="hidden" name="poborder" value="#db2828">
    										</div>
    									<div class="divider"></div>
    									<div class="header">Midfielder</div>
    									<div class="divider"></div>
    										<div class="item" data-value="CM">
    											<i class="dot circle outline green icon"></i>
    											Center Midfielder
    											<span class="poicon" style="display:none;">green</span>
    											<span class="poborder" style="display:none;">#21ba45</span>
    											<input type="hidden" name="potype" value="MF">
    											<input type="hidden" name="poicon" value="green">
    											<input type="hidden" name="poborder" value="#21ba45">
    										</div>
    										<div class="item" data-value="DM">
    											<i class="dot circle outline green icon"></i>
    											Defensive Midfielder
    											<span class="poicon" style="display:none;">green</span>
    											<span class="poborder" style="display:none;">#21ba45</span>
    											<input type="hidden" name="potype" value="MF">
    											<input type="hidden" name="poicon" value="green">
    											<input type="hidden" name="poborder" value="#21ba45">
    										</div>
    										<div class="item" data-value="AM">
    											<i class="dot circle outline green icon"></i>
    											Attacking Midfielder
    											<span class="poicon" style="display:none;">green</span>
    											<span class="poborder" style="display:none;">#21ba45</span>
    											<input type="hidden" name="potype" value="MF">
    											<input type="hidden" name="poicon" value="green">
    											<input type="hidden" name="poborder" value="#21ba45">
    										</div>
    										<div class="item" data-value="WM">
    											<i class="dot circle outline green icon"></i>
    											Wing Midfielder
    											<span class="poicon" style="display:none;">green</span>
    											<span class="poborder" style="display:none;">#21ba45</span>
    											<input type="hidden" name="potype" value="MF">
    											<input type="hidden" name="poicon" value="green">
    											<input type="hidden" name="poborder" value="#21ba45">
    										</div>
    									<div class="divider"></div>
    									<div class="header">Defender</div>
    									<div class="divider"></div>
    										<div class="item" data-value="CB">
    											<i class="dot circle outline blue icon"></i>
    											Centerback
    											<span class="poicon" style="display:none;">blue</span>
    											<span class="poborder" style="display:none;">#2185d0</span>
    											<input type="hidden" name="potype" value="DF">
    											<input type="hidden" name="poicon" value="blue">
    											<input type="hidden" name="poborder" value="#2185d0">
    										</div>
    										<div class="item" data-value="WB">
    											<i class="dot circle outline blue icon"></i>
    											Wingback
    											<span class="poicon" style="display:none;">blue</span>
    											<span class="poborder" style="display:none;">#2185d0</span>
    											<input type="hidden" name="potype" value="DF">
    											<input type="hidden" name="poicon" value="blue">
    											<input type="hidden" name="poborder" value="#2185d0">
    										</div>
    									<div class="divider"></div>
    									<div class="header">Goalkeeper</div>
    									<div class="divider"></div>
    										<div class="item" data-value="GK">
    											<i class="dot circle outline yellow icon"></i>
    											Goalkeeper
    											<span class="poicon" style="display:none;">yellow</span>
    											<span class="poborder" style="display:none;">#fbbd08</span>
    											<input type="hidden" name="potype" value="GK">
    											<input type="hidden" name="poicon" value="yellow">
    											<input type="hidden" name="poborder" value="#fbbd08">
    										</div>
    								</div>
    							</div>
    						</div>
    					</div>
            <?php endif; ?>
  					<div class="ui ovr field">
  						<div class="ui labeled input">
  							<label class="ui basic label llab f k r" for="ovr">OVR</label>
  							<input type="text" name="ovr" id="ovr" maxlength="2">
  						</div>
  						<div class="ui float input">
  							<input type="range" id="ovrrange" min="1" max="99">
  						</div>
  					</div>
          <?php endif; ?>
				</form>
			</div>
			<div class="ui center aligned container actions">
				<?php if ($_GET['role'] == 'Club') : ?>
					<a class="ui black button f k r" id="roster">로스터</a>
				<?php endif; ?>
				<input class="ui black button f k r" id="edit" type="button" value="수정">
				<div class="ui button f k r" id="cancel">취소</div>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="/php/other/calendar.js"></script>
<script>

$(function(){

	$('#edit').click(function(){
		$.ajax({
			url : '<?=$path?>/db/rest/edit.php',
      processData: false,
      contentType: false,
			data       : new FormData($('#editform')[0]),
      dataType   : 'json',
			type       : 'POST',
			success : function(result){

				$('.ui.modal').modal('hide')

				var row = '#'+result.name.replace(' ', '_')

				$(row).removeClass().addClass('edit positive')
				$(row).children('.name').children('img').attr('src', 'data:image/jpeg;base64,'+result.img)
				$(row).children('.country').children('span').text(result.country).siblings('i').removeClass().addClass(result.country.toLowerCase() + ' flag')

				if (result.role != 'Club'){

					var today = new Date()
					var birth = new Date(result.birth.replace(' ', '').replace('년', '-').replace('월', '-').replace('일', ''))
					var age = Math.floor((today-birth) / (365.25 * 24 * 60 * 60 * 1000))

					$(row).children('.age').text(age+'세')
					$(row).children('.ovr').children('div').children('div').css('width', (result.ovr+1)/10+'%').children('div').children('span').text(result.ovr)

				}
				if (result.role == 'Manager'){
					$(row).children('.type').text(result.tactic)
				}
				if (result.role == 'Player'){
					$(row).children('.type').children('label').removeClass().addClass('ui label llab f k r '+ result.poicon).text(result.potype)
					$(row).children('.ovr').children('div').removeClass().addClass('ui active inverted progress ' + result.poicon)
				}

				$(row).transition('pulse')

			}
		})
	})

	$('#cancel').click(function(){
		$('.ui.modal').modal('hide')
	})


	$('tr.edit').click(function(){

		var inforole	= '<?=$_GET['role']?>'
		var infoname	= $(this).children('.name').children('span').text()
		var infoform	= $('.ui.modal').children('.ui.grid').children('.eleven.wide.column').children('.ui.black.segment').children('.ui.form')
		var modalcard	= $('.ui.modal').children('.ui.grid').children('.five.wide.column').children('.ui.center.aligned.card.segment')
		var progress	= modalcard.children('.description').children('.progress')

		$.post('<?=$path?>/db/rest/editmodal.php', {role : inforole, name : infoname}, function(data){

			modalcard.children('.ui.name.header').text(data.name)
			modalcard.children('.ui.country.meta').children('span').text(data.country)
			modalcard.children('.ui.country.meta').children('i').removeClass().addClass(data.country.toLowerCase() + ' flag')
			progress.children('.bar').css('width', (data.ovr+1)/10+'%')
			progress.children('.bar').children('.progress').children('span.ovr').text(data.ovr)
			progress.children('.bar').children('.progress').children('span.position').text(data.position)
			$('.filetext').val('')
			$('.ui.fluid.search.selection.dropdown').dropdown('set selected', data.country)
			$('#name').val(data.name)

			if (inforole == 'Club'){

				modalcard.children().find('img.main.image').attr('src', 'data:image/jpeg;base64,'+data.emblem)
				modalcard.children('.ui.sub.meta').children('span').text(data.stadium)
				modalcard.children().find('img.sub.image').attr('src', 'data:image/jpeg;base64,'+data.std_img)
				$('#birth').val(data.birth)
				$('#stadium, #std_name').val(data.stadium)
				$('#img_no').val(data.img_no)
				$('#std_img').val(data.std_no)
				$('#roster').attr('href', '<?=$path?>/master/roster.php?name='+data.name)

			} else {

				modalcard.children().find('img.main.image').attr('src', 'data:image/jpeg;base64,'+data.profile)
				modalcard.children('.ui.sub.meta').children('span').text(data.club)
				modalcard.children().find('img.sub.image').attr('src', 'data:image/jpeg;base64,'+data.club_img)
				$('#height').val(data.height)
				$('#weight').val(data.weight)
				$('#ovr').val(data.ovr)
				$('#ovrrange').val(data.ovr)
				$('#img_no').val(data.img_no)

				if (inforole == 'Manager'){

					$('.tactic.dropdown').dropdown('set selected', data.tactic)

				}

				if (inforole == 'Player'){

					modalcard.css('border-top', '5px solid '+data.border)
					modalcard.children('.ui.role.header').text(data.position)
					progress.removeClass().addClass('ui active inverted progress ' + data.icon).children('.bar').css('width', (data.ovr+1)/10+'%')
					progress.children('.bar').children('.progress').css('color', 'black').children('i').removeClass().addClass('dot circle outline icon ' + data.icon)
					$('.position.dropdown').dropdown('set selected', data.position)

				}

			}

			$('.ui.modal').modal('show')
			$('.labeled.input.calendar').calendar({
				type : 'date'
			})
			$('#birth').val(data.birth)

		},'json')

	})


	$('.filetext, .attach.icon').click(function() {
		$(this).parent().parent().find('input:file').click()
	})

	$('label.country, label.position, label.tactic').click(function(){
		$(this).siblings('div.dropdown').dropdown('show')
	})

	$('#name, #stadium').keyup(function(){
		if ($(this).attr('name') == 'name'){
			$('.name.header').text($(this).val())
		}
		if ($(this).attr('name') == 'stadium'){
			$('.sub.meta').children('span').text($(this).val())
		}
	})

	$('#country').change(function(){
		$('#countryicon').removeClass().addClass($(this).val().toLowerCase() + ' flag').siblings('span').text($(this).val())
	})

	$('#position').change(function(){

		$('.ui.card.segment').css('border-top', '5px solid '+ $(this).siblings('.text').children('span.poborder').text())
		$('.ui.card.segment').children('.ui.role.header').text($(this).val())
		$('#ovrbar').parent().removeClass().addClass('ui active inverted progress ' + $(this).siblings('.text').children('span.poicon').text())
		$('#ovrbar').children('.progress').css('color', 'black').children('i').removeClass().addClass('dot circle outline icon ' + $(this).siblings('.text').children('span.poicon').text())

	})

	$('input:file').on('change', function(e) {
		$('input:text', $(e.target).parent()).val(e.target.files[0].name)
		var img = $(this).attr('name')
		var fileReader = new FileReader()
		fileReader.readAsDataURL(e.target.files[0])
		fileReader.onload = function(e) {
			if (img == 'img'){
				$('.main.image').attr('src', e.target.result)
			}
			if (img == 'img1'){
				$('.sub.image').attr('src', e.target.result)
			}
		}
	})

	$('#ovrrange').on('input', function(){
		$('#ovr').val($(this).val())
		$('#ovrbar').css('width', ($(this).val()+1)/10+'%')
		$('#ovrbar').children('.progress').children('span.ovr').text($(this).val())
	})

	$('#ovr').on('keyup', function(){
		$('#ovrrange').val($(this).val())
		$('#ovrbar').css('width', ($(this).val()+1)/10+'%')
		$('#ovrbar').children('.progress').children('span.ovr').text($(this).val())
	})

	$('#list').DataTable({
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

})

</script>
<?php include '../include/footer.php';?>
