<?php include '../db/league/history.php';?>
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
	<h4 class="f k r"><?=$history?> History</h4>
	<div class="ui divider"></div>
  <?php if ($history == 'League') : ?>
		<table class="ui center aligned celled black table f k r">
			<thead>
				<tr>
					<th colspan="8"><h1 class="f k r">Legend League</h1></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th colspan="2">타이틀</th>
					<td colspan="6">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $title['champion'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$title['champion']?>">
									<?=$title['champion']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$title['country']?>">
										<i class="<?=strtolower($title['country'])?> flag"></i><?=$title['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th rowspan="4" style="border-top:1px solid rgba(34,36,38,.1);">최다</th>
					<th rowspan="2" style="border-top:1px solid rgba(34,36,38,.1);">우승</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">팀</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">감독</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">선수</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $mostTitleClub['champion'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$mostTitleClub['champion']?>">
									<?=$mostTitleClub['champion']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostTitleClub['country']?>">
										<i class="<?=strtolower($mostTitleClub['country'])?> flag"></i><?=$mostTitleClub['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostTitleClub['count']?> 회</h5></td>
					<td>
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Manager';
                $imgName = $mostTitleManager['manager'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Manager&name=$<?=$mostTitleManager['manager']?>">
									<?=$mostTitleManager['manager']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostTitleManager['country']?>">
										<i class="<?=strtolower($mostTitleManager['country'])?> flag"></i><?=$mostTitleManager['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostTitleManager['count']?> 회</h5></td>
					<td>
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Player';
                $imgName = $mostTitlePlayer['name'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$mostTitlePlayer['name']?>">
									<?=$mostTitlePlayer['name']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostTitlePlayer['country']?>">
										<i class="<?=strtolower($mostTitlePlayer['country'])?> flag"></i><?=$mostTitlePlayer['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostTitlePlayer['count']?> 회</h5></td>
				</tr>
				<tr>
					<th rowspan="2" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">수상</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">발롱도르</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">득점왕</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">도움왕</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Player';
                $imgName = $mostBallonDor['name'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$mostBallonDor['name']?>">
									<?=$mostBallonDor['name']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostBallonDor['country']?>">
										<i class="<?=strtolower($mostBallonDor['country'])?> flag"></i><?=$mostBallonDor['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostBallonDor['count']?> 회</h5></td>
					<td>
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Player';
                $imgName = $mostGoalScorer['name'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$mostGoalScorer['name']?>">
									<?=$mostGoalScorer['name']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostGoalScorer['country']?>">
										<i class="<?=strtolower($mostGoalScorer['country'])?> flag"></i><?=$mostGoalScorer['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostGoalScorer['count']?> 회</h5></td>
					<td>
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Player';
                $imgName = $mostAssistProvider['name'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$mostAssistProvider['name']?>">
									<?=$mostAssistProvider['name']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostAssistProvider['country']?>">
										<i class="<?=strtolower($mostAssistProvider['country'])?> flag"></i><?=$mostAssistProvider['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostAssistProvider['count']?> 회</h5></td>
				</tr>
				<tr>
					<th rowspan="10" style="border-top:1px solid rgba(34,36,38,.1);">누적 전적</th>
					<th rowspan="8" style="border-top:1px solid rgba(34,36,38,.1);">구단</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">경기</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">승점</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $mostGame['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$mostGame['club']?>">
									<?=$mostGame['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostGame['country']?>">
										<i class="<?=strtolower($mostGame['country'])?> flag"></i><?=$mostGame['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td colspan="2" style="border-left:none;"><h5 class="f k r"><?=$mostGame['sumgame']?> 전</h5></td>
					<td>
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $mostPoint['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$mostPoint['club']?>">
									<?=$mostPoint['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostPoint['country']?>">
										<i class="<?=strtolower($mostPoint['country'])?> flag"></i><?=$mostPoint['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td colspan="2" style="border-left:none;"><h5 class="f k r"><?=$mostPoint['sumpoint']?> 점</h5></td>
				</tr>
				<tr>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">승리</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">무승부</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">패배</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $mostWin['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$mostWin['club']?>">
									<?=$mostWin['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostWin['country']?>">
										<i class="<?=strtolower($mostWin['country'])?> flag"></i><?=$mostWin['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostWin['sumwin']?> 승</h5></td>
					<td>
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $mostDraw['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$mostDraw['club']?>">
									<?=$mostDraw['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostDraw['country']?>">
										<i class="<?=strtolower($mostDraw['country'])?> flag"></i><?=$mostDraw['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostDraw['sumdraw']?> 무</h5></td>
					<td>
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $mostLose['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$mostLose['club']?>">
									<?=$mostLose['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostLose['country']?>">
										<i class="<?=strtolower($mostLose['country'])?> flag"></i><?=$mostLose['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostLose['sumlose']?> 패</h5></td>
				</tr>
				<tr>
					<th colspan="6" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">승률</th>
				</tr>
				<tr>
					<td colspan="2" style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $mostOdds['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$mostOdds['club']?>">
									<?=$mostOdds['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostOdds['country']?>">
										<i class="<?=strtolower($mostOdds['country'])?> flag"></i><?=$mostOdds['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td colspan="4" style="border-left:none;">
						<div class="ui active progress" data-percent="100" style="display:flex;">
							<div class="bar" style="width:<?=$mostOdds['winodds'] * 100?>%; background-color:#2ecc40;">
								<div class="progress"><?=$mostOdds['sumwin']?> 승</div>
							</div>
							<div class="bar" style="width:<?=$mostOdds['drawodds'] * 100?>%; background-color:#ffe21f;">
								<div class="progress"><?=$mostOdds['sumdraw']?> 무</div>
							</div>
							<div class="bar" style="width:<?=$mostOdds['loseodds'] * 100?>%; background-color:#ff695e;">
								<div class="progress"><?=$mostOdds['sumlose']?> 패</div>
							</div>
							<div class="label f k r">승률 <?=floor($mostOdds['winodds'] * 100)?> %</div>
						</div>
					</td>
				</tr>
				<tr>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">득실차</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">득점</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">실점</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $mostGoalDifference['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$mostGoalDifference['club']?>">
									<?=$mostGoalDifference['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostGoalDifference['country']?>">
										<i class="<?=strtolower($mostGoalDifference['country'])?> flag"></i><?=$mostGoalDifference['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostGoalDifference['summaxgoaldifference']?> 점</h5></td>
					<td>
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $mostGoalFor['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$mostGoalFor['club']?>">
									<?=$mostGoalFor['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostGoalFor['country']?>">
										<i class="<?=strtolower($mostGoalFor['country'])?> flag"></i><?=$mostGoalFor['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostGoalFor['summaxgoalfor']?> 골</h5></td>
					<td>
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $mostGoalAgainst['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$mostGoalAgainst['club']?>">
									<?=$mostGoalAgainst['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostGoalAgainst['country']?>">
										<i class="<?=strtolower($mostGoalAgainst['country'])?> flag"></i><?=$mostGoalAgainst['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostGoalAgainst['summaxgoalagainst']?> 골</h5></td>
				</tr>
				<tr>
					<th rowspan="2" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">선수</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">평점</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">득점</th>
					<th colspan="2" style="border-top:1px solid rgba(34,36,38,.1);">도움</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Player';
                $imgName = $mostPlayerRating['player'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$mostPlayerRating['player']?>">
									<?=$mostPlayerRating['player']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostPlayerRating['country']?>">
										<i class="<?=strtolower($mostPlayerRating['country'])?> flag"></i><?=$mostPlayerRating['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;">
						<h5 class="f k r">
              <?=$mostPlayerRating['avgrating'] > 99 ? '10.0점' : substr($mostPlayerRating['avgrating'], 0, 1).'.'.substr($mostPlayerRating['avgrating'], 1, 1).' 점'?>
						</h5>
					</td>
					<td>
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Player';
                $imgName = $mostPlayerGoal['player'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$mostPlayerGoal['player']?>">
									<?=$mostPlayerGoal['player']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostPlayerGoal['country']?>">
										<i class="<?=strtolower($mostPlayerGoal['country'])?> flag"></i><?=$mostPlayerGoal['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostPlayerGoal['sumgoal']?> 골</h5></td>
					<td>
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Player';
                $imgName = $mostPlayerAssist['player'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$mostPlayerAssist['player']?>">
									<?=$mostPlayerAssist['player']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$mostPlayerAssist['country']?>">
										<i class="<?=strtolower($mostPlayerAssist['country'])?> flag"></i><?=$mostPlayerAssist['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$mostPlayerAssist['sumassist']?> 도움</h5></td>
				</tr>
			</tbody>
		</table>
  <?php endif ?>
  <?php if ($history == 'Season') : ?>
		<table class="ui center aligned celled black table f k r">
			<thead>
				<tr>
					<th colspan="10"><h1 class="f k r">Legend League Season</h1></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>스코어</th>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$clubMostScore['season']?>">
								<?=$clubMostScore['season'].'/'.substr($clubMostScore['season']+1, 2, 4)?>
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<h5 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$clubMostScore['season']?>">
								<?=$clubMostScore['round']?> Round
							</a>
						</h5>
					</td>
					<td colspan="3" style="border-left:none;">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $clubMostScore['homename'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$clubMostScore['homename']?>">
									<?=$clubMostScore['homename']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$clubMostScore['homecountry']?>">
										<i class="<?=strtolower($clubMostScore['homecountry'])?> flag"></i><?=$clubMostScore['homecountry']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$clubMostScore['score']?></h5></td>
					<td colspan="3" style="border-left:none;">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $clubMostScore['awayname'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$clubMostScore['awayname']?>">
									<?=$clubMostScore['awayname']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$clubMostScore['awaycountry']?>">
										<i class="<?=strtolower($clubMostScore['awaycountry'])?> flag"></i><?=$clubMostScore['awaycountry']?>
									</a>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th rowspan="6" style="border-top:1px solid rgba(34,36,38,.1);">클럽</th>
					<th colspan="6" style="border-top:1px solid rgba(34,36,38,.1);">승률</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">승점</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<h5 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$clubMostOdds['season']?>">
								<?=$clubMostOdds['season'].'/'.substr($clubMostOdds['season']+1, 2, 4)?>
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $clubMostOdds['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$clubMostOdds['club']?>">
									<?=$clubMostOdds['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$clubMostOdds['country']?>">
										<i class="<?=strtolower($clubMostOdds['country'])?> flag"></i><?=$clubMostOdds['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td colspan="4" style="border-left:none;">
						<div class="ui active progress" data-percent="100" style="display:flex;">
							<div class="bar" style="width:<?=$clubMostOdds['winodds'] * 100?>%; background-color:#2ecc40;">
								<div class="progress"><?=$clubMostOdds['maxwin']?> 승</div>
							</div>
							<div class="bar" style="width:<?=$clubMostOdds['drawodds'] * 100?>%; background-color:#ffe21f;">
								<div class="progress"><?=$clubMostOdds['maxdraw']?> 무</div>
							</div>
							<div class="bar" style="width:<?=$clubMostOdds['loseodds'] * 100?>%; background-color:#ff695e;">
								<div class="progress"><?=$clubMostOdds['maxlose']?> 패</div>
							</div>
							<div class="label f k r">승률 <?=floor($clubMostOdds['winodds'] * 100)?> %</div>
						</div>
					</td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$clubMostPoint['season']?>">
								<?=$clubMostPoint['season'].'/'.substr($clubMostPoint['season']+1, 2, 4)?>
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $clubMostPoint['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$clubMostPoint['club']?>">
									<?=$clubMostPoint['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$clubMostPoint['country']?>">
										<i class="<?=strtolower($clubMostPoint['country'])?> flag"></i><?=$clubMostPoint['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$clubMostPoint['maxpoint']?> 점</h5></td>
				</tr>
				<tr>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">승리</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">무승부</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">패배</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<h5 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$clubMostWin['season']?>">
								<?=$clubMostWin['season'].'/'.substr($clubMostWin['season']+1, 2, 4)?>
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $clubMostWin['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$clubMostWin['club']?>">
									<?=$clubMostWin['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$clubMostWin['country']?>">
										<i class="<?=strtolower($clubMostWin['country'])?> flag"></i><?=$clubMostWin['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$clubMostWin['maxwin']?> 승</h5></td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$clubMostDraw['season']?>">
								<?=$clubMostDraw['season'].'/'.substr($clubMostDraw['season']+1, 2, 4)?>
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $clubMostDraw['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$clubMostDraw['club']?>">
									<?=$clubMostDraw['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$clubMostDraw['country']?>">
										<i class="<?=strtolower($clubMostDraw['country'])?> flag"></i><?=$clubMostDraw['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$clubMostDraw['maxdraw']?> 무</h5></td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$clubMostLose['season']?>">
								<?=$clubMostLose['season'].'/'.substr($clubMostLose['season']+1, 2, 4)?>
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $clubMostLose['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$clubMostLose['club']?>">
									<?=$clubMostLose['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$clubMostLose['country']?>">
										<i class="<?=strtolower($clubMostLose['country'])?> flag"></i><?=$clubMostLose['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$clubMostLose['maxlose']?> 패</h5></td>
				</tr>
				<tr>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">득실차</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">득점</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">실점</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<h5 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$clubMostGoalDifference['season']?>">
								<?=$clubMostGoalDifference['season'].'/'.substr($clubMostGoalDifference['season']+1, 2, 4)?>
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $clubMostGoalDifference['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$clubMostGoalDifference['club']?>">
									<?=$clubMostGoalDifference['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$clubMostGoalDifference['country']?>">
										<i class="<?=strtolower($clubMostGoalDifference['country'])?> flag"></i><?=$clubMostGoalDifference['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$clubMostGoalDifference['maxgoaldifference']?> 점</h5></td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$clubMostGoalFor['season']?>">
							  <?=$clubMostGoalFor['season'].'/'.substr($clubMostGoalFor['season']+1, 2, 4)?>
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $clubMostGoalFor['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$clubMostGoalFor['club']?>">
									<?=$clubMostGoalFor['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$clubMostGoalFor['country']?>">
										<i class="<?=strtolower($clubMostGoalFor['country'])?> flag"></i><?=$clubMostGoalFor['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$clubMostGoalFor['maxgoalfor']?> 골</h5></td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$clubMostGoalAgainst['season']?>">
								<?=$clubMostGoalAgainst['season'].'/'.substr($clubMostGoalAgainst['season']+1, 2, 4)?>
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Club';
                $imgName = $clubMostGoalAgainst['club'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$clubMostGoalAgainst['club']?>">
									<?=$clubMostGoalAgainst['club']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$clubMostGoalAgainst['country']?>">
										<i class="<?=strtolower($clubMostGoalAgainst['country'])?> flag"></i><?=$clubMostGoalAgainst['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$clubMostGoalAgainst['maxgoalagainst']?> 골</h5></td>
				</tr>
				<tr>
					<th rowspan="2" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">선수</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">평점</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">득점</th>
					<th colspan="3" style="border-top:1px solid rgba(34,36,38,.1);">도움</th>
				</tr>
				<tr>
					<td style="border-left:1px solid rgba(34,36,38,.1);">
						<h5 class="f k r">
  						<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$playerMostRating['season']?>">
						    <?=$playerMostRating['season'].'/'.substr($playerMostRating['season']+1, 2, 4)?>
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Player';
                $imgName = $playerMostRating['player'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$playerMostRating['player']?>">
									<?=$playerMostRating['player']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$playerMostRating['country']?>">
										<i class="<?=strtolower($playerMostRating['country'])?> flag"></i><?=$playerMostRating['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;">
						<h5 class="f k r">
              <?=$playerMostRating['avgrating'] > 99 ? '10.0점' : substr($playerMostRating['avgrating'], 0, 1).'.'.substr($playerMostRating['avgrating'], 1, 1).' 점'?>
						</h5>
					</td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$playerMostGoal['season']?>">
								<?=$playerMostGoal['season'].'/'.substr($playerMostGoal['season']+1, 2, 4)?>
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Player';
                $imgName = $playerMostGoal['player'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$playerMostGoal['player']?>">
									<?=$playerMostGoal['player']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$playerMostGoal['country']?>">
										<i class="<?=strtolower($playerMostGoal['country'])?> flag"></i><?=$playerMostGoal['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$playerMostGoal['sumgoal']?> 골</h5></td>
					<td>
						<h5 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$playerMostAssist['season']?>">
								<?=$playerMostAssist['season'].'/'.substr($playerMostAssist['season']+1, 2, 4)?>
							</a>
						</h5>
					</td>
					<td style="border-left:none;">
						<div class="ui image header f k r">
              <?php
                $imgRole = 'Player';
                $imgName = $playerMostAssist['player'];
                $imgClass = 'ui rounded image';
                $imgStyle = 'height:50px';
                include '../db/image.php';
              ?>
							<div class="content">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$playerMostAssist['player']?>">
									<?=$playerMostAssist['player']?>
								</a>
								<div class="sub header">
									<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$playerMostAssist['country']?>">
										<i class="<?=strtolower($playerMostAssist['country'])?> flag"></i><?=$playerMostAssist['country']?>
									</a>
								</div>
							</div>
						</div>
					</td>
					<td style="border-left:none;"><h5 class="f k r"><?=$playerMostAssist['sumassist']?> 도움</h5></td>
				</tr>
			</tbody>
		</table>
  <?php endif ?>
</section>
<?php include '../include/footer.php';?>
