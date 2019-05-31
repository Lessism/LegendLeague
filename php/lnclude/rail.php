<?php if ($rail == 'league') :?>
	<div class="ui left very close rail">
		<div class="ui black sticky segment" id="rail">
			<div class="header"><h3 class="f k r"><a class="rail item f k r" href="<?=$path?>/league/league.php" style="color:black;">League</a></h3></div>
			<div class="ui divider"></div>
			<div class="ui secondary vertical menu">
				<div class="item">
					<h4 class="f k r">
						<a class="link f k r" href="<?=$path?>/league/preview.php">
							<?=$leagueSeason['season'].'/'.substr($leagueSeason['season']+1, 2, 4).' Season'?>
						</a>
					</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r" href="<?=$path?>/league/preview.php">Preview</a>
						<a class="rail item f k r" href="<?=$path?>/league/ranking.php">Ranking</a>
						<a class="rail item f k r" href="<?=$path?>/league/match.php">Match</a>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="item">
					<h4 class="f k r">
						<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$leagueSeason['season']-1?>">
							Before Season
						</a>
					</h4>
					<div class="ui secondary vertical pointing menu">
						<?php for ($i = 1; $i <= 3; $i++) : ?>
							<a class="rail item f k r" href="<?=$path?>/league/review.php?season=<?=$leagueSeason['season']-$i?>">
								<?=($leagueSeason['season']-$i).'/'.substr($leagueSeason['season']-$i+1, 2, 4)?>
							</a>
						<?php endfor ?>
					</div>
				</div>
				<div class="ui fluid selection dropdown">
					<div class="default text">Season</div>
					<i class="dropdown icon"></i>
					<div class="menu">
						<?php for ($i = 1; $i < ($leagueSeason['season']-2023); $i++) : ?>
							<a class="rail item f k r" href="<?=$path?>/league/review.php?season=<?=$leagueSeason['season']-$i-3?>">
								<?=($leagueSeason['season']-$i-3).'/'.substr($leagueSeason['season']-$i-2, 2, 4)?>
							</a>
						<?php endfor ?>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="item">
					<h4 class="f k r">
						<a class="link f k r" href="<?=$path?>/league/award.php?award=champion">
							Award
						</a>
					</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r" href="<?=$path?>/league/award.php?award=champion">Legend League Champion</a>
						<a class="rail item f k r" href="<?=$path?>/league/award.php?award=manager">FIFA World Manager</a>
						<a class="rail item f k r" href="<?=$path?>/league/award.php?award=ballondor">Ballon Dor</a>
						<a class="rail item f k r" href="<?=$path?>/league/award.php?award=goalscorer">Goal Scorer</a>
						<a class="rail item f k r" href="<?=$path?>/league/award.php?award=assistprovider">Assist Provider</a>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="item">
					<h4 class="f k r">
						<a class="link f k r" href="<?=$path?>/league/history.php?history=League">
							History
						</a>
					</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r" href="<?=$path?>/league/history.php?history=League">League</a>
						<a class="rail item f k r" href="<?=$path?>/league/history.php?history=Season">Season</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>
<?php if ($rail == 'fifa') : ?>
	<div class="ui left very close rail">
		<div class="ui black sticky segment" id="rail">
			<div class="header"><h3 class="f k r"><a class="rail item f k r" href="<?=$path?>/fifa/fifa.php" style="color:black;">FIFA</a></h3></div>
			<div class="ui divider"></div>
			<div class="ui secondary vertical menu">
				<div class="item">
					<h4 class="f k r">
						<a class="link f k r" href="<?=$path?>/fifa/information.php?role=Club">
							Club
						</a>
					</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r awards club" href="<?=$path?>/fifa/awards.php?role=Club&award=champion&season=<?=$leagueSeason['season']-1?>">Legend League Champion</a>
						<a class="rail item f k r" href="<?=$path?>/fifa/information.php?role=Club">Information</a>
						<a class="rail item f k r" href="<?=$path?>/fifa/list.php?role=Club">List</a>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="item">
					<h4 class="f k r">
						<a class="link f k r" href="<?=$path?>/fifa/information.php?role=Manager">
							Manager
						</a>
					</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r awards manager" href="<?=$path?>/fifa/awards.php?role=Manager&award=manager&season=<?=$leagueSeason['season']-1?>">FIFA World Manager</a>
						<a class="rail item f k r" href="<?=$path?>/fifa/information.php?role=Manager">Information</a>
						<a class="rail item f k r" href="<?=$path?>/fifa/list.php?role=Manager">List</a>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="item">
					<h4 class="f k r">
						<a class="link f k r" href="<?=$path?>/fifa/information.php?role=Player">
							Player
						</a>
					</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r awards player" href="<?=$path?>/fifa/awards.php?role=Player&award=ballondor&season=<?=$leagueSeason['season']-1?>">FIFA World Player</a>
						<a class="rail item f k r" href="<?=$path?>/fifa/information.php?role=Player">Information</a>
						<a class="rail item f k r" href="<?=$path?>/fifa/list.php?role=Player">List</a>
						<a class="rail item f k r" href="<?=$path?>/fifa/information.php?role=Player&type=FW"><i class="dot circle outline red icon"></i>Forward</a>
						<a class="rail item f k r" href="<?=$path?>/fifa/information.php?role=Player&type=MF"><i class="dot circle outline green icon"></i>Midfielder</a>
						<a class="rail item f k r" href="<?=$path?>/fifa/information.php?role=Player&type=DF"><i class="dot circle outline blue icon"></i>Defender</a>
						<a class="rail item f k r" href="<?=$path?>/fifa/information.php?role=Player&type=GK"><i class="dot circle outline yellow icon"></i>Goalkeeper</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="ui right very close rail">
		<div class="ui black sticky segment" id="subrail">
		<?php $countrys = mysqli_fetch_assoc($countryList) ?>
		<div class="header"><h3 class="f k r"><a class="rail item f k r" href="<?=$path?>/fifa/country.php?country=<?=$countrys['country']?>" style="color:black;">Country</a></h3></div>
			<div class="ui divider"></div>
			<div class="ui secondary vertical menu">
				<div class="item">
					<h4 class="f k r">
						<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=empty($country) ? $countrys['country'] : $country?>">
							<?=empty($country) ? 'Information' : $country?>
						</a>
					</h4>
					<div class="ui secondary vertical pointing menu">
					<?php
						mysqli_data_seek($countryList, 0);
						for ($i = 0; $i < 10; $i++) : ;
							$countrys = mysqli_fetch_assoc($countryList)
					?>
						<a class="rail item f k r" href="<?=$path?>/fifa/country.php?country=<?=$countrys['country']?>">
							<i class="<?=strtolower($countrys['country'])?> flag"></i>
							<?=$countrys['country']?> (<?=$countrys['sumcountcountry']?>)
						</a>
					<?php endfor ?>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="ui fluid selection dropdown">
					<div class="default text"><?=empty($country) ? 'Country' : $country?></div>
					<i class="dropdown icon"></i>
					<div class="menu">
						<?php while ($countrys = mysqli_fetch_assoc($countryList)) : ?>
						<h4>
							<a class="rail item f k r" href="<?=$path?>/fifa/country.php?country=<?=$countrys['country']?>">
								<i class="<?=strtolower($countrys['country'])?> flag"></i>
								<?=$countrys['country']?>
							</a>
						</h4>
						<?php endwhile ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>
<?php if ($rail == 'personal') : ?>
	<div class="ui left very close rail">
		<div class="ui black sticky segment" id="rail">
			<div class="header"><h3 class="f k r"><a class="rail item f k r" href="<?=$path?>/fifa/information.php?role=<?=$role?>" style="color:black;"><?=$role?></a></h3></div>
			<div class="ui divider"></div>
			<div class="ui secondary vertical menu">
				<div class="item">
					<h4 class="f k r">
						<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$name?>">
							<?=$name?>
						</a>
					</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r" href="<?=$path?>/fifa/country.php?country=<?=$personal['country']?>"><i class="<?=strtolower($personal['country'])?> flag"></i><?=$personal['country']?></a>
						<?php if($role !='Club') : ?>
							<a class="rail item f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$personal['club']?>">
                <?php
                  $imgRole = 'Club';
                  $imgName = $personal['club'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = 'height:17.5px; width:17.5px;';
                  include '../db/image.php';
                ?>
								<?=$personal['club']?>
							</a>
						<?php else : ?>
							<a class="rail item f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$name?>">
                <?php
                  $imgRole = 'Stadium';
                  $imgName = $personal['stadium'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = 'height:17.5px; width:17.5px;';
                  include '../db/image.php';
                ?>
								<?=$personal['stadium']?>
							</a>
						<?php endif ; ?>
					</div>
					<div class="ui divider"></div>
					<h4 class="f k r">
						<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$name?>">
							Information
						</a>
					</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$name?>">Profile</a>
						<a class="rail item f k r" href="<?=$path?>/fifa/detail.php?role=<?=$role?>&name=<?=$name?>">Detail</a>
						<?php if ($role == 'Club') : ?>
							<a class="rail item f k r" href="<?=$path?>/fifa/squad.php?role=Club&name=<?=$name?>">
								Squad
							</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="ui divider"></div>
				<div class="item">
					<h4 class="f k r">
						<a class="link f k r" href="<?=$path?>/fifa/title.php?role=<?=$role?>&name=<?=$name?>">
							History
						</a>
					</h4>
					<div class="ui secondary vertical pointing menu">
						<a class="rail item f k r" href="<?=$path?>/fifa/title.php?role=<?=$role?>&name=<?=$name?>">Title</a>
						<a class="rail item f k r" href="<?=$path?>/fifa/award.php?role=<?=$role?>&name=<?=$name?>">Award</a>
						<a class="rail item f k r" href="<?=$path?>/fifa/record.php?role=<?=$role?>&name=<?=$name?>">Record</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>
<?php if ($rail == 'master') : ?>
	<div class="ui black sticky segment" id="rail">
		<div class="header">
			<h4>
				<a class="link f k r" href="<?=$path?>/master/master.php">
					Master
				</a>
			</h4>
		</div>
		<div class="ui divider"></div>
		<div class="ui secondary vertical menu">
			<div class="item">
				<h4 class="f k r">
					<a class="link f k r" href="<?=$path?>/master/total.php">
						Visit
					</a>
				</h4>
				<div class="ui secondary vertical pointing menu container f k r">
					<a class="rail item" href="<?=$path?>/master/total.php">Total</a>
					<a class="rail item" href="<?=$path?>/master/date.php">Date</a>
					<a class="rail item" href="<?=$path?>/master/menu.php">Menu</a>
				</div>
				<div class="ui divider"></div>
			</div>
			<div class="item">
				<h4 class="f k r">
					<a class="link f k r" href="<?=$path?>/master/roster.php">
						Edit
					</a>
				</h4>
				<div class="ui secondary vertical pointing menu container f k r">
					<a class="rail item" href="<?=$path?>/master/roster.php">Roster</a>
					<a class="rail item" href="<?=$path?>/master/edit.php?role=Club">Club</a>
					<a class="rail item" href="<?=$path?>/master/edit.php?role=Manager">Manager</a>
					<a class="rail item" href="<?=$path?>/master/edit.php?role=Player">Player</a>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<script>
$(function(){
	for (i = 0; i < $('.rail.item').length; i++){
		if ($('.rail.item').eq(i).attr('href') == 'http://' + window.location.hostname + ':8088' + window.location.pathname || $('.rail.item').eq(i).attr('href') == 'http://' + window.location.hostname + ':8088' + window.location.pathname + window.location.search.replace('%20', ' ')){
			$('.rail.item').eq(i).addClass('active')
		}
	}
})
</script>
