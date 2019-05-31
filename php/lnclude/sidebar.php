<div class="ui vertical inverted menu sidebar f k r">
<?php if (empty($_SESSION['login'])) : ?>
	<div style="padding-top:400px; text-align:center;">
		<a class="item" href="<?=$path?>/account/login.php">
			로그인이 필요합니다.<br>
			<button class="ui inverted black button f k r" style="margin-top:25px;">
				Login
			</button>
		</a>
	</div>
<?php else : ?>
	<div class="ui inverted container" style="padding-top:100px;">
		<div class="ui inverted segment">
			<div class="ui inverted my accordion">
			</div>
		</div>
	</div>
<script>
$(function(){
	$('.sidebar').sidebar({
		onVisible: function(){
			if ($('.my.accordion').children().length < 1){
				$.post('<?=$path?>/db/rest/sidebar.php', { id : '<?=$_SESSION['id']?>'}, function(data){
					if (data.role == 'Club'){
						$('.my.accordion').append(
							'<div class="active title f k r">'+
							'	<img class="ui avatar image" src="data:image/jpeg;base64, '+data.personal.emblem+'" style="max-width:20px; max-height:20px;">'+
							'	<span class="f k r">'+data.personal.name+'</span>'+
							'</div>'+
							'<div class="active content">'+
							'	<div class="ui black inverted segment">'+
							'		<div class="ui secondary vertical menu">'+
							'			<div class="item">'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/country.php?country='+data.personal.country+'"><i class="'+data.personal.country.toLowerCase()+' flag"></i>'+data.personal.country+'</a>'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name='+data.personal.name+'"><img class="ui avatar image" src="data:image/jpeg;base64, '+data.personal.stadiumImg+'" style="height:17.5px;width:17.5px">'+data.personal.stadium+'</a>'+
							'				</div>'+
							'				<div class="ui divider"></div>'+
							'				<h4 class="f k r">'+
							'					<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name='+data.personal.name+'">'+
							'						Information'+
							'					</a>'+
							'				</h4>'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/profile.php?role=Club&name='+data.personal.name+'">Profile</a>'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/detail.php?role=Club&name='+data.personal.name+'">Detail</a>'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/squad.php?role=Club&name='+data.personal.name+'">Squad</a>'+
							'				</div>'+
							'			</div>'+
							'			<div class="ui divider"></div>'+
							'			<div class="item">'+
							'				<h4 class="f k r">'+
							'					<a class="link f k r" href="<?=$path?>/fifa/title.php?role=Club&name='+data.personal.name+'">'+
							'						History'+
							'					</a>'+
							'				</h4>'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/title.php?role=Club&name='+data.personal.name+'">Title</a>'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/award.php?role=Club&name='+data.personal.name+'">Award</a>'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/record.php?role=Club&name='+data.personal.name+'">Record</a>'+
							'				</div>'+
							'			</div>'+
							'		</div>'+
							'	</div>'+
							'</div>'
						)
					}
					if (data.role == 'Manager' || data.role == 'Player'){
						$('.my.accordion').append(
							'<div class="active title f k r">'+
							'	<img class="ui avatar image" src="data:image/jpeg;base64, '+data.personal.profile+'" style="max-width:20px; max-height:20px;">'+
							'	<span class="f k r">'+data.personal.name+'</span>'+
							'</div>'+
							'<div class="active content">'+
							'	<div class="ui black inverted segment">'+
							'		<div class="ui secondary vertical menu">'+
							'			<div class="item">'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/country.php?country='+data.personal.country+'"><i class="'+data.personal.country.toLowerCase()+' flag"></i>'+data.personal.country+'</a>'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/profile.php?role=Club&name='+data.personal.club+'"><img class="ui avatar image" src="data:image/jpeg;base64, '+data.club.emblem+'" style="height:17.5px;width:17.5px">'+data.personal.club+'</a>'+
							'				</div>'+
							'				<div class="ui divider"></div>'+
							'				<h4 class="f k r">'+
							'					<a class="link f k r" href="<?=$path?>/fifa/profile.php?role='+data.role+'&name='+data.personal.name+'">'+
							'						Information'+
							'					</a>'+
							'				</h4>'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/profile.php?role='+data.role+'&name='+data.personal.name+'">Profile</a>'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/detail.php?role='+data.role+'&name='+data.personal.name+'">Detail</a>'+
							'				</div>'+
							'			</div>'+
							'			<div class="ui divider"></div>'+
							'			<div class="item">'+
							'				<h4 class="f k r">'+
							'					<a class="link f k r" href="<?=$path?>/fifa/title.php?role='+data.role+'&name='+data.personal.name+'">'+
							'						History'+
							'					</a>'+
							'				</h4>'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/title.php?role='+data.role+'&name='+data.personal.name+'">Title</a>'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/award.php?role='+data.role+'&name='+data.personal.name+'">Award</a>'+
							'					<a class="rail item f k r" href="<?=$path?>/fifa/record.php?role='+data.role+'&name='+data.personal.name+'">Record</a>'+
							'				</div>'+
							'			</div>'+
							'		</div>'+
							'	</div>'+
							'</div>'
						)
						if (data.club != null){
							$('.my.accordion').append(
								'<div class="title f k r">'+
								'	<img class="ui avatar image" src="data:image/jpeg;base64, '+data.club.emblem+'" style="max-width:20px; max-height:20px;">'+
								'	<span class="f k r">'+data.club.name+'</span>'+
								'</div>'+
								'<div class="content">'+
								'	<div class="ui black inverted segment">'+
								'		<div class="ui secondary vertical menu">'+
								'			<div class="item">'+
								'				<div class="ui secondary vertical pointing menu">'+
								'					<a class="rail item f k r" href="<?=$path?>/fifa/country.php?country='+data.club.country+'"><i class="'+data.club.country.toLowerCase()+' flag"></i>'+data.club.country+'</a>'+
								'					<a class="rail item f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name='+data.club.name+'"><img class="ui avatar image" src="data:image/jpeg;base64, '+data.club.stadiumImg+'" style="height:17.5px;width:17.5px">'+data.club.stadium+'</a>'+
								'				</div>'+
								'				<div class="ui divider"></div>'+
								'				<h4 class="f k r">'+
								'					<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name='+data.club.name+'">'+
								'						Information'+
								'					</a>'+
								'				</h4>'+
								'				<div class="ui secondary vertical pointing menu">'+
								'					<a class="rail item f k r" href="<?=$path?>/fifa/profile.php?role=Club&name='+data.club.name+'">Profile</a>'+
								'					<a class="rail item f k r" href="<?=$path?>/fifa/detail.php?role=Club&name='+data.club.name+'">Detail</a>'+
								'					<a class="rail item f k r" href="<?=$path?>/fifa/squad.php?role=Club&name='+data.club.name+'">Squad</a>'+
								'				</div>'+
								'			</div>'+
								'			<div class="ui divider"></div>'+
								'			<div class="item">'+
								'				<h4 class="f k r">'+
								'					<a class="link f k r" href="<?=$path?>/fifa/title.php?role=Club&name='+data.club.name+'">'+
								'						History'+
								'					</a>'+
								'				</h4>'+
								'				<div class="ui secondary vertical pointing menu">'+
								'					<a class="rail item f k r" href="<?=$path?>/fifa/title.php?role=Club&name='+data.club.name+'">Title</a>'+
								'					<a class="rail item f k r" href="<?=$path?>/fifa/award.php?role=Club&name='+data.club.name+'">Award</a>'+
								'					<a class="rail item f k r" href="<?=$path?>/fifa/record.php?role=Club&name='+data.club.name+'">Record</a>'+
								'				</div>'+
								'			</div>'+
								'		</div>'+
								'	</div>'+
								'</div>'
							)
						}
					}
				}, 'json')
			}
		}
	})
})
</script>
<?php endif; ?>
</div>
