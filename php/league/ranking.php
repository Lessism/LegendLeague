<?php include '../db/league/ranking.php';?>
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
	<h4 class="f k r">
    <?=$leagueSeason['season'].'/'.substr($leagueSeason['season']+1, 2, 4).' Season Ranking'?>
  </h4>
	<div class="ui divider"></div>
	<div class="ui black segment">
		<div class="ui center aligned container">
			<h3 class="f k r">
				순위표
			</h3>
		</div>
		<div class="ui divider"></div>
    <?php if (empty($rankClub)) : ?>
			<div class="ui center aligned container f k r">지금은 Free Season 입니다.</div>
    <?php else : ?>
			<div class="ui pointing secondary two item menu">
				<a class="tabular item f k r <?=empty($_GET['player']) ? 'active' : ''?>" data-tab="club">팀 순위</a>
        <?php if (mysqli_num_rows($rankTopRating) > 0) : ?>
					<a class="tabular item f k r <?=!empty($_GET['player']) ? 'active' : ''?>" data-tab="player">개인 순위</a>
        <?php endif ?>
			</div>
			<div class="ui tab segment <?=empty($_GET['player']) ? 'active' : ''?>" data-tab="club">
        <?php if (!empty($rankTopRating)) : ?>
					<div class="ui segment">
						<div id="rankchart"></div>
					</div>
        <?php endif ?>
				<table class="ui striped center aligned table f k r">
					<thead>
						<tr class="ui inverted center aligned table f k r">
							<th colspan="2">순위</th>
							<th>클럽</th>
							<th>경기</th>
							<th>승</th>
							<th>무</th>
							<th>패</th>
							<th>득점</th>
							<th>실점</th>
							<th>득실차</th>
							<th>승점</th>
						</tr>
					</thead>
					<tbody>
            <?php
              $idx = 1;
              while ($club = mysqli_fetch_assoc($rankClub)) :
            ?>
							<tr>
								<td style="width:10%; border-right:1px solid rgba(34,36,38,.1)">
                  <?=$idx?>
                </td>
								<td style="width:10%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$club['club']?>">
                    <?php
                      $imgRole  = 'Club';
                      $imgName  = $club['club'];
                      $imgClass = 'ui rounded fluid mini image';
                      $imgStyle = '';
                      include '../db/image.php'
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
								<td style="width:10%"><?=$club['goalfor']-$club['goalagainst']?></td>
								<td style="width:10%"><?=$club['point']?></td>
							</tr>
            <?php
              $idx++;
              endwhile
            ?>
					</tbody>
				</table>
			</div>
      <?php
        if (mysqli_num_rows($rankTopRating) > 0) :
          $player = mysqli_fetch_assoc($rankTopRating);
      ?>
				<div class="ui tab segment <?=!empty($_GET['player']) ? 'active' : ''?>" data-tab="player">
					<div class="ui horizontal segments">
						<div class="ui black segment items">
							<div class="ui center aligned dividing header f k r">
								평점
							</div>
							<div class="item">
							  <a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$player['player']?>" style="max-width:125px; max-height:100px;">
                  <?php
                    $imgRole  = 'Player';
                    $imgName  = $player['player'];
                    $imgClass = '';
                    $imgStyle = 'height:100px; border-radius:10px;';
                    include '../db/image.php'
                  ?>
								</a>
								<div class="middle aligned content">
									<div class="header">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$player['player']?>">
											<?=$player['player']?>
										</a>
									</div>
									<div class="meta">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$player['club']?>">
                      <?php
                        $imgRole  = 'Club';
                        $imgName  = $player['club'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = 'max-width:20px; max-height:20px;';
                        include '../db/image.php'
                      ?>
											<?=$player['club']?>
										</a>
									</div>
									<div class="description" style="text-align:right;">
										<h3 class="f k r">
                      <?=$player['toprating'] > 99 ? '10.0점' : substr($player['toprating'], 0, 1).'.'.substr($player['toprating'], 1, 1).' 점'?>
										</h3>
									</div>
								</div>
							</div>
							<div class="ui divider"></div>
							<div class="ui middle aligned divided list">
                <?php while ($player = mysqli_fetch_assoc($rankTopRating)) : ?>
									<div class="item" style="vertical-align:middle;">
										<div class="right floated content">
											<h5 class="f k r">
                        <?=$player['toprating'] > 99 ? '10.0점' : substr($player['toprating'], 0, 1).'.'.substr($player['toprating'], 1, 1).' 점'?>
											</h5>
										</div>
                    <?php
                      $imgRole  = 'Player';
                      $imgName  = $player['player'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php'
                    ?>
										<div class="content">
											<div class="header">
												<h5 class="f k r">
													<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$player['player']?>">
														<?=$player['player']?>
													</a>
												</h5>
											</div>
											<div class="meta">
												<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$player['club']?>">
                          <?php
                            $imgRole  = 'Club';
                            $imgName  = $player['club'];
                            $imgClass = 'ui avatar image';
                            $imgStyle = 'max-width:20px; max-height:20px;';
                            include '../db/image.php'
                          ?>
    											<?=$player['club']?>
												</a>
											</div>
										</div>
									</div>
                <?php endwhile ?>
							</div>
						</div>
            <?php
              if (mysqli_num_rows($rankGoalScorer) > 0) :
                $player = mysqli_fetch_assoc($rankGoalScorer);
            ?>
							<div class="ui black segment items">
								<div class="ui center aligned dividing header f k r">
									득점
								</div>
								<div class="item">
									<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$player['player']?>" style="max-width:125px; max-height:100px;">
                    <?php
                      $imgRole  = 'Player';
                      $imgName  = $player['player'];
                      $imgClass = '';
                      $imgStyle = 'height:100px; border-radius:10px;';
                      include '../db/image.php'
                    ?>
									</a>
									<div class="middle aligned content">
										<div class="header">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$player['player']?>">
    										<?=$player['player']?>
											</a>
										</div>
										<div class="meta">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$player['club']?>">
                        <?php
                          $imgRole  = 'Club';
                          $imgName  = $player['club'];
                          $imgClass = 'ui avatar image';
                          $imgStyle = 'max-width:20px; max-height:20px;';
                          include '../db/image.php'
                        ?>
  											<?=$player['club']?>
											</a>
										</div>
										<div class="description" style="text-align:right;">
											<h3 class="f k r">
  											<?=$player['goalscorer'].' 골'?>
											</h3>
										</div>
									</div>
								</div>
								<div class="ui divider"></div>
								<div class="ui middle aligned divided list">
                  <?php while ($player = mysqli_fetch_assoc($rankGoalScorer)) : ?>
										<div class="item" style="vertical-align:middle;">
											<div class="right floated content">
												<h5 class="f k r">
    											<?=$player['goalscorer'].' 골'?>
												</h5>
											</div>
                      <?php
                        $imgRole  = 'Player';
                        $imgName  = $player['player'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = '';
                        include '../db/image.php'
                      ?>
											<div class="content">
												<div class="header">
													<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$player['player']?>">
      											<?=$player['player']?>
													</a>
												</div>
												<div class="description">
													<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=$<?=$player['club']?>">
                            <?php
                              $imgRole  = 'Club';
                              $imgName  = $player['club'];
                              $imgClass = 'ui avatar image';
                              $imgStyle = 'max-width:20px; max-height:20px;';
                              include '../db/image.php'
                            ?>
      											<?=$player['club']?>
													</a>
												</div>
											</div>
										</div>
                  <?php endwhile ?>
								</div>
							</div>
              <?php
                if (mysqli_num_rows($rankAssistProvider) > 0) :
                  $player = mysqli_fetch_assoc($rankAssistProvider);
              ?>
							<div class="ui black segment items">
								<div class="ui center aligned dividing header f k r">도움</div>
                <div class="item">
									<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$player['player']?>" style="max-width:125px; max-height:100px;">
                    <?php
                      $imgRole  = 'Player';
                      $imgName  = $player['player'];
                      $imgClass = '';
                      $imgStyle = 'height:100px; border-radius:10px;';
                      include '../db/image.php'
                    ?>
									</a>
									<div class="middle aligned content">
										<div class="header">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$player['player']?>">
    										<?=$player['player']?>
											</a>
										</div>
										<div class="meta">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$player['club']?>">
                        <?php
                          $imgRole  = 'Club';
                          $imgName  = $player['club'];
                          $imgClass = 'ui avatar image';
                          $imgStyle = 'max-width:20px; max-height:20px;';
                          include '../db/image.php'
                        ?>
  											<?=$player['club']?>
											</a>
										</div>
										<div class="description" style="text-align:right;">
											<h3 class="f k r">
  											<?=$player['assistprovider'].' 도움'?>
											</h3>
										</div>
									</div>
								</div>
								<div class="ui divider"></div>
								<div class="ui middle aligned divided list">
                  <?php while ($player = mysqli_fetch_assoc($rankAssistProvider)) : ?>
										<div class="item" style="vertical-align:middle;">
											<div class="right floated content">
												<h5 class="f k r">
													<?=$player['assistprovider'].' 도움'?>
												</h5>
											</div>
                      <?php
                        $imgRole  = 'Player';
                        $imgName  = $player['player'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = '';
                        include '../db/image.php'
                      ?>
											<div class="content">
												<div class="header">
													<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$player['player']?>">
														<?=$player['player']?>
													</a>
												</div>
												<div class="description">
													<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$player['club']?>">
                            <?php
                              $imgRole  = 'Club';
                              $imgName  = $player['club'];
                              $imgClass = 'ui avatar image';
                              $imgStyle = 'max-width:20px; max-height:20px;';
                              include '../db/image.php'
                            ?>
      											<?=$player['club']?>
													</a>
												</div>
											</div>
										</div>
                  <?php endwhile ?>
								</div>
							</div>
              <?php endif ?>
            <?php endif ?>
		 			</div>
				</div>
      <?php endif ?>
    <?php endif ?>
	</div>
</section>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
$(function(){
	$.get('<?=$path?>/db/rest/rank.php', function(chart){
		if (!jQuery.isEmptyObject(chart)){
			var rankchart = new Morris.Line({
				element		: 'rankchart',
				xkey  		: 'round',
				ykeys	  	: chart.labels,
				labels		: chart.labels,
				postUnits	: ' p',
				hideHover	: true,
				parseTime	: false,
				smooth		: true,
				gridTextFamily : 'Noto Serif KR',
				data		  : chart.data
			})
		}
	}, 'json')
})
</script>
<?php include '../include/footer.php';?>
