<?php include '../db/league/review.php';?>
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
	<h4 class="f k r"><?=$beforeSeason['season'].'/'.substr($beforeSeason['season']+1, 2, 4)?> Season Review</h4>
	<div class="ui divider"></div>
	<div class="ui black segment">
		<div class="ui pointing secondary two item menu">
			<a class="tabular active item f k r" data-tab="season">Season</a>
			<a class="tabular item f k r" data-tab="round">Round</a>
		</div>
		<div class="ui tab segment active" data-tab="season">
			<div class="ui horizontal black segments">
        <?php if (!empty($beforeChampion)) : ?>
					<div class="ui center aligned card segment">
						<div class="content">
							<h3 class="f k r">
								<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=champion&season=<?=$beforeSeason['season']?>">
									Champion
								</a>
							</h3>
							<div class="ui divider"></div>
						</div>
						<div>
							<a class="image" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$beforeChampion['name']?>">
                <?php
                  $imgRole = 'Club';
                  $imgName = $beforeChampion['name'];
                  $imgClass = 'ui centered rounded image';
                  $imgStyle = 'max-height:150px; max-width:150px;';
                  include '../db/image.php';
                ?>
							</a>
						</div>
						<div class="ui divider"></div>
						<div class="ui header f k r">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$beforeChampion['name']?>">
                <?=$beforeChampion['name']?>
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$beforeChampion['country']?>">
								<i class="<?=strtolower($beforeChampion['country'])?> flag"></i>
								<?=$beforeChampion['country']?>
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$beforeChampion['name']?>">
                <?php
                  $imgRole = 'Stadium';
                  $imgName = $beforeChampion['stadium'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = 'max-width:20px; max-height:20px;';
                  include '../db/image.php';
                ?>
								<?=$beforeChampion['stadium']?>
							</a>
						</div>
						<div class="ui segment" style="border:none;">
							<div class="ui active inverted black progress">
								<div class="bar" style="width:<?=$beforeChampion['ovr']?>%;">
									<div class="progress"><?=$beforeChampion['ovr']?></div>
								</div>
								<div class="label f k r" style="color:black">OVR</div>
							</div>
						</div>
					</div>
        <?php endif ?>
        <?php if (!empty($beforeManager)) : ?>
					<div class="ui center aligned card segment">
						<div class="content">
							<h3 class="f k r">
								<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Manager&award=manager&season=<?=$beforeSeason['season']?>">
									FIFA World Manager
								</a>
							</h3>
							<div class="ui divider"></div>
						</div>
						<div>
							<a class="image" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$beforeManager['name']?>">
                <?php
                  $imgRole = 'Manager';
                  $imgName = $beforeManager['name'];
                  $imgClass = 'ui centered rounded image';
                  $imgStyle = 'height:150px; width:150px;';
                  include '../db/image.php';
                ?>
							</a>
						</div>
						<div class="ui divider"></div>
						<div class="ui header f k r">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$beforeManager['name']?>">
								<?=$beforeManager['name']?>
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$beforeManager['country']?>">
								<i class="<?=strtolower($beforeManager['country'])?> flag"></i>
								<?=$beforeManager['country']?>
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$beforeManager['club']?>">
                <?php
                  $imgRole = 'Club';
                  $imgName = $beforeManager['club'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = 'max-width:20px; max-height:20px;';
                  include '../db/image.php';
                ?>
								<?=$beforeManager['club']?>
							</a>
						</div>
						<div class="ui segment" style="border:none;">
							<div class="ui active inverted black progress">
								<div class="bar" style="width:<?=$beforeManager['ovr']?>%;">
									<div class="progress"><?=$beforeManager['ovr']?></div>
								</div>
								<div class="label f k r" style="color:black">OVR</div>
							</div>
						</div>
					</div>
        <?php endif ?>
        <?php if (!empty($beforeBallonDor)) : ?>
					<div class="ui center aligned card segment">
						<div class="content">
							<h3 class="f k r">
								<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=ballondor&season=<?=$beforeSeason['season']?>">
									Ballon Dor
								</a>
							</h3>
							<div class="ui divider"></div>
						</div>
						<div>
							<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$beforeBallonDor['name']?>">
                <?php
                  $imgRole = 'Player';
                  $imgName = $beforeBallonDor['name'];
                  $imgClass = 'ui centered rounded image';
                  $imgStyle = 'height:150px; width:150px;';
                  include '../db/image.php';
                ?>
							</a>
						</div>
						<div class="ui divider"></div>
						<div class="ui header f k r">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$beforeBallonDor['name']?>">
								<?=$beforeBallonDor['name']?>
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$beforeBallonDor['country']?>">
								<i class="<?=strtolower($beforeBallonDor['country'])?> flag"></i>
								<?=$beforeBallonDor['country']?>
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$beforeBallonDor['club']?>">
                <?php
                  $imgRole = 'Club';
                  $imgName = $beforeBallonDor['club'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = 'max-width:20px; max-height:20px;';
                  include '../db/image.php';
                ?>
								<?=$beforeBallonDor['club']?>
							</a>
						</div>
						<div class="ui segment" style="border:none;">
							<div class="ui active inverted <?=$beforeBallonDor['icon']?> progress" style="margin-bottom:0;bottom:0;">
								<div class="bar" style="width:<?=$beforeBallonDor['ovr']?>%;">
									<div class="progress"><div class="ui meta f k r"><?=$beforeBallonDor['position']?><i class="dot circle outline <?=$beforeBallonDor['icon']?> icon"></i><?=$beforeBallonDor['ovr']?></div></div>
								</div>
							</div>
						</div>
					</div>
        <?php endif ?>
        <?php if (!empty($beforeGoalScorer)) : ?>
					<div class="ui center aligned card segment">
						<div class="content">
							<h3 class="f k r">
								<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=ballondor&season=<?=$beforeSeason['season']?>">
									Goal Scorer
								</a>
							</h3>
							<div class="ui divider"></div>
						</div>
						<div>
							<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$beforeGoalScorer['name']?>">
                <?php
                  $imgRole = 'Player';
                  $imgName = $beforeGoalScorer['name'];
                  $imgClass = 'ui centered rounded image';
                  $imgStyle = 'height:150px; width:150px;';
                  include '../db/image.php';
                ?>
							</a>
						</div>
						<div class="ui divider"></div>
						<div class="ui header f k r">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$beforeGoalScorer['name']?>">
								<?=$beforeGoalScorer['name']?>
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$beforeGoalScorer['country']?>">
								<i class="<?=strtolower($beforeGoalScorer['country'])?> flag"></i>
								<?=$beforeGoalScorer['country']?>
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$beforeGoalScorer['club']?>">
                <?php
                  $imgRole = 'Club';
                  $imgName = $beforeGoalScorer['club'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = 'max-width:20px; max-height:20px;';
                  include '../db/image.php';
                ?>
								<?=$beforeGoalScorer['club']?>
							</a>
						</div>
						<div class="ui segment" style="border:none;">
							<div class="ui active inverted <?=$beforeGoalScorer['icon']?> progress" style="margin-bottom:0;bottom:0;">
								<div class="bar" style="width:<?=$beforeGoalScorer['ovr']?>%;">
									<div class="progress"><div class="ui meta f k r"><?=$beforeGoalScorer['position']?><i class="dot circle outline <?=$beforeGoalScorer['icon']?> icon"></i><?=$beforeGoalScorer['ovr']?></div></div>
								</div>
							</div>
						</div>
					</div>
        <?php endif ?>
        <?php if (!empty($beforeAssistProvider)) : ?>
					<div class="ui center aligned card segment">
						<div class="content">
							<h3 class="f k r">
								<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=ballondor&season=<?=$beforeSeason['season']?>">
									Assist Provider
								</a>
							</h3>
							<div class="ui divider"></div>
						</div>
						<div>
							<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$beforeAssistProvider['name']?>">
                <?php
                  $imgRole = 'Player';
                  $imgName = $beforeAssistProvider['name'];
                  $imgClass = 'ui centered rounded image';
                  $imgStyle = 'height:150px; width:150px;';
                  include '../db/image.php';
                ?>
							</a>
						</div>
						<div class="ui divider"></div>
						<div class="ui header f k r">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$beforeAssistProvider['name']?>">
								<?=$beforeAssistProvider['name']?>
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$beforeAssistProvider['country']?>">
								<i class="<?=strtolower($beforeAssistProvider['country'])?> flag"></i>
								<?=$beforeAssistProvider['country']?>
							</a>
						</div>
						<div class="ui meta f k r">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$beforeAssistProvider['club']?>">
                <?php
                  $imgRole = 'Club';
                  $imgName = $beforeAssistProvider['club'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = 'max-width:20px; max-height:20px;';
                  include '../db/image.php';
                ?>
								<?=$beforeAssistProvider['club']?>
							</a>
						</div>
						<div class="ui segment" style="border:none;">
							<div class="ui active inverted <?=$beforeAssistProvider['icon']?> progress" style="margin-bottom:0;bottom:0;">
								<div class="bar" style="width:<?=$beforeAssistProvider['ovr']?>%;">
									<div class="progress"><div class="ui meta f k r"><?=$beforeAssistProvider['position']?><i class="dot circle outline <?=$beforeAssistProvider['icon']?> icon"></i><?=$beforeAssistProvider['ovr']?></div></div>
								</div>
							</div>
						</div>
					</div>
        <?php endif ?>
			</div>
			<div class="ui grid segment">
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
                <?php
                  $roster = explode(',', $beforeSeason['roster']);
                  foreach ($roster as $club) :
                ?>
									<tr>
										<td style="width:25%">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$club?>">
                        <?php
                          $imgRole = 'Club';
                          $imgName = $club;
                          $imgClass = 'ui rounded fluid image';
                          $imgStyle = '';
                          include '../db/image.php';
                        ?>
											</a>
										</td>
										<td>
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$club?>">
												<?=$club?>
											</a>
										</td>
									</tr>
                <?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="eleven wide column">
					<div class="ui center aligned black segment">
            <?php if (!empty($beforeRanking)) : ?>
						<h3 class="f k r">최종 순위</h3>
						<div class="ui divider"></div>
							<div class="ui segment">
								<div id="rankchart"></div>
							</div>
            <?php endif ?>
						<table class="ui striped center aligned table">
							<thead>
								<tr class="ui inverted center aligned table f k r">
									<th colspan="2">순위</th>
									<th>클럽</th>
									<th>경기</th>
									<th>승</th>
									<th>무</th>
									<th>패</th>
									<th>득</th>
									<th>실</th>
									<th>득실차</th>
									<th>승점</th>
								</tr>
							</thead>
							<tbody>
                <?php
                  $idx = 1;
                  while ($club = mysqli_fetch_assoc($beforeRanking)) :
                ?>
									<tr>
										<td style="width:10%; border-right:1px solid rgba(34,36,38,.1)"><?=$idx?></td>
										<td style="width:10%">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$club['club']?>">
                        <?php
                          $imgRole = 'Club';
                          $imgName = $club['club'];
                          $imgClass = 'ui rounded fluid mini image';
                          $imgStyle = '';
                          include '../db/image.php';
                        ?>
											</a>
										</td>
										<td style="width:25%">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$club['club']?>">
												<?=$club['club']?>
											</a>
										</td>
										<td style="width:10%"><?=$club['game']?></td>
										<td style="width:5%"><?=$club['win']?></td>
										<td style="width:5%"><?=$club['draw']?></td>
										<td style="width:5%"><?=$club['lose']?></td>
										<td style="width:5%"><?=$club['goalfor']?></td>
										<td style="width:5%"><?=$club['goalagainst']?></td>
										<td style="width:10%"><?=$club['goalfor'] - $club['goalagainst']?></td>
										<td style="width:10%"><?=$club['point']?></td>
									</tr>
                <?php
                  $idx++;
                  endwhile
                ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="ui tab segment" data-tab="round">
      <?php
        if (!empty($beforeSeason['round'])) :
            $index = 0;
            for ($i = 0; $i < $beforeSeason['round']; $i += 10) : ?>
    				<div class="ui tabular ten item menu">
              <?php for ($ii = 1; $ii < 10; $ii++) : ?>
                <?php if ($beforeSeason['round'] >= $index+$ii) : ?>
      						<a class="tabular item f k r <?=$beforeSeason['round'] == $index+$ii ? 'active' : ''?>" data-tab="round<?=$index+$ii?>"><?=$index+$ii?> Round</a>
                <?php endif ?>
              <?php endfor ?>
    				</div>
          <?php
            $index++;
            endfor
          ?>
          <?php foreach ($round as $matches) : ?>
            <?php
              $idx = 0;
              foreach ($matches as $match) :
                if ($idx < 1) :
            ?>
    						<div class="ui center aligned black segment tab <?=$beforeSeason['round'] == $match['match']['round'] ? 'active' : ''?>" data-tab="round<?=$match['match']['round']?>">
    							<h3 class="f k r"><?=$match['match']['round']?> Round</h3>
              <?php endif ?>
    							<div class="ui segment">
    								<div class="ui middle aligned grid">
    									<div class="one wide column">
    										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=explode('_', $match['match']['versus'])[0]?>">
                          <?php
                            $imgRole = 'Club';
                            $imgName = explode('_', $match['match']['versus'])[0];
                            $imgClass = 'ui rounded fluid image';
                            $imgStyle = '';
                            include '../db/image.php';
                          ?>
    										</a>
    									</div>
    									<div class="left floated right aligned five wide column">
    										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=explode('_', $match['match']['versus'])[0]?>">
    											<?=explode('_', $match['match']['versus'])[0]?>
    										</a>
    									</div>
    									<div class="ui center aligned four wide column">
    										<span class="f k r">
    											<?=!empty($match['match']['score']) ? $match['match']['score'] : 'VS'?>
    										</span>
    									</div>
    									<div class="right floated left aligned five wide column">
    										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=explode('_', $match['match']['versus'])[1]?>">
    											<?=explode('_', $match['match']['versus'])[1]?>
    										</a>
    									</div>
    									<div class="one wide column">
    										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=explode('_', $match['match']['versus'])[1]?>">
                          <?php
                            $imgRole = 'Club';
                            $imgName = explode('_', $match['match']['versus'])[1];
                            $imgClass = 'ui rounded fluid image';
                            $imgStyle = '';
                            include '../db/image.php';
                          ?>
    										</a>
    									</div>
    								</div>
                    <?php if (mysqli_num_rows($match['score']) > 0) : ?>
    									<div class="ui grid">
    										<div class="sixteen wide column" style="padding:5px"><div class="ui fitted divider"></div></div>
    										<div class="right aligned seven wide column">
                          <?php while ($score = mysqli_fetch_assoc($match['score'])) : ?>
    												<div>
    													<a class="link" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=explode('_', $match['match']['versus'])[0] == $score['club'] ? $score['player'] : ''?>">
    														<?=explode('_', $match['match']['versus'])[0] == $score['club'] ? $score['player'] : ''?>
    													</a>
    												</div>
                          <?php
                            endwhile;
                            mysqli_data_seek(($match['score']), 0);
                          ?>
    										</div>
    										<div class="center aligned two wide column">
                          <?php
                            $goal = explode(' : ', $match['match']['score']);
                            $goal = ($goal[0] >= $goal[1] ? $goal[0] : $goal[1]);
                            for ($i = 0; $i < $goal; $i++) :
                          ?>
    													<div><i class="futbol icon"></i></div>
                          <?php endfor ?>
    										</div>
    										<div class="left aligned seven wide column">
                          <?php while ($score = mysqli_fetch_assoc($match['score'])) : ?>
    												<div>
    													<a class="link" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=explode('_', $match['match']['versus'])[1] == $score['club'] ? $score['player'] : ''?>">
    														<?=explode('_', $match['match']['versus'])[1] == $score['club'] ? $score['player'] : ''?>
    													</a>
    												</div>
                          <?php
                            endwhile;
                            mysqli_data_seek(($match['score']), 0);
                          ?>
    										</div>
    									</div>
                    <?php endif ?>
    							</div>
          <?php
            $idx++;
            endforeach
          ?>
    						</div>
        <?php endforeach ?>
      <?php endif ?>
		</div>
	</div>
</section>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
$(function(){
	$.get('<?=$path?>/db/rest/rank.php?season=<?=$beforeSeason['season']?>', function(chart){
		if (!jQuery.isEmptyObject(chart)){
			var rankchart = new Morris.Line({
				element		: 'rankchart',
				xkey		: 'round',
				ykeys		: chart.labels,
				labels		: chart.labels,
				postUnits	: ' p',
				hideHover	: true,
				parseTime	: false,
				smooth		: true,
				gridTextFamily : 'Noto Serif KR',
				data		: chart.data
			})
		}
	}, 'json')
})
</script>
<?php include '../include/footer.php';?>
