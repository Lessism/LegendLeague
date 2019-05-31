<?php include '../db/league/league.php';?>
<?php include '../include/header.php';?>
<section class="ui black segment container">
<?php
  $rail = 'league';
  include '../include/rail.php';
?>
	<div class="ui grid">
		<div class="twelve wide column">
			<h1 class="f k r" style="margin-top:24px">
				<a class="link f k r" href="<?=$path?>/league/league.php">
					Legend League
				</a>
			</h1>
			<h4 class="f k r">
				<a class="link f k r" href="<?=$path?>/league/match.php">
					<?=$leagueSeason['season'].'/'.substr($leagueSeason['season']+1, 2, 4)?>
          <?=!empty($leagueSeason['round'])?'Season '.$leagueSeason['round'].' Round':'Free Season'?>
				</a>
			</h4>
		</div>
		<div class="four wide column" style="display:flex; align-items:center;">
      <?php if (empty($end)) : ?>
				<input class="ui fluid black button f k r <?=empty($leagueSeason['round']) ? 'opening' : 'playing'?>" type="button" value="<?=empty($leagueSeason['round']) ? '개막' : '진행'?>" style="height:75%;">
      <?php else : ?>
        <input class="ui fluid black button f k r ending" type="button" value="폐막" style="height:75%;">
      <?php endif ?>
		</div>
	</div>
	<div class="ui divider"></div>
	<div class="ui grid" id="league">
    <?php if (empty($leagueSeason['round'])) :?>
			<div class="ten wide column">
				<table class="ui striped center aligned table f k r">
					<thead>
						<tr class="ui inverted center aligned table f k r">
							<th colspan="2">예상순위</th>
							<th>클럽</th>
							<th>OVR</th>
						</tr>
					</thead>
					<tbody>
            <?php
              $r = 1;
              while ($rank = mysqli_fetch_assoc($leagueInformation)) :?>
							<tr>
								<td style="width:5%; border-right:1px solid rgba(34,36,38,.1)"><?=$r?></td>
								<td style="width:10%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rank['name']?>">
  									<?php
                      $imgRole = 'Club';
                      $imgName = $rank['name'];
                      $imgClass = 'ui rounded fluid image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
									</a>
								</td>
								<td style="width:60%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rank['name']?>">
										<?=$rank['name']?>
									</a>
								</td>
								<td style="width:25%">
									<div class="ui active inverted black progress" style="margin-bottom:0;">
										<div class="bar" style="width:<?=$rank['ovr']?>%;">
											<div class="progress"><?=$rank['ovr']?></div>
										</div>
									</div>
								</td>
							</tr>
          <?php
            $r += 1;
            endwhile
          ?>
					</tbody>
				</table>
			</div>
  <?php endif ?>
  <?php if(!empty($leagueSeason['round'])) :?>
			<div class="ten wide column">
				<table class="ui striped center aligned table f k r">
					<thead>
						<tr class="ui inverted center aligned table f k r">
							<th colspan="2">순위</th>
							<th>클럽</th>
							<th>경기</th>
							<th>승</th>
							<th>무</th>
							<th>패</th>
							<th>득실차</th>
							<th>승점</th>
						</tr>
					</thead>
					<tbody>
          <?php
            $r = 1;
            while($rank = mysqli_fetch_assoc($leagueRanking)) :
          ?>
							<tr>
								<td style="width:10%; border-right:1px solid rgba(34,36,38,.1)"><?=$r?></td>
								<td style="width:10%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rank['name']?>">
  									<?php
                      $imgRole = 'Club';
                      $imgName = $rank['club'];
                      $imgClass = 'ui rounded fluid image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
									</a>
								</td>
								<td style="width:35%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rank['name']?>">
										<?=$rank['club']?>
									</a>
								</td>
								<td style="width:10%"><?=$rank['game']?></td>
								<td style="width:5%"><?=$rank['win']?></td>
								<td style="width:5%"><?=$rank['draw']?></td>
								<td style="width:5%"><?=$rank['lose']?></td>
								<td style="width:10%"><?=$rank['goalfor']-$rank['goalagainst']?></td>
								<td style="width:10%"><?=$rank['point']?></td>
							</tr>
          <?php
            $r += 1;
            endwhile;
          ?>
					</tbody>
				</table>
			</div>
  <?php endif ?>
		<div class="six wide column">
      <?php
        if (!empty($leagueTitle)) :
          $title = mysqli_fetch_assoc($leagueTitle)
      ?>
				<div class="ui center aligned black segment">
					<div>
						<h3 class="f k r">
							<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=champion&season=<?=$title['season']?>">
								Title
							</a>
						</h3>
					</div>
					<div class="ui divider"></div>
					<table class="ui center aligned table">
						<thead>
							<tr class="f k r">
								<th style="width:15%">
									<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=champion&season=<?=$title['season']?>">
  									<?php
                      $imgRole = 'Club';
                      $imgName = $title['champion'];
                      $imgClass = 'ui rounded fluid image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
									</a>
								</th>
								<th style="width:70%">
									<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=champion&season=<?=$title['season']?>">
                    <?=$title['champion']?>
									</a>
								</th>
								<th style="width:15%">
									<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$title['season']?>">
                    <?=$title['season'].'/'.substr($title['season']+1, 2, 4)?>
									</a>
								</th>
							</tr>
						</thead>
						<tbody>
              <?php while ($title = mysqli_fetch_assoc($leagueTitle)) : ?>
								<tr>
									<td style="width:15%">
										<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=champion&season=<?=$title['season']?>">
    									<?php
                        $imgRole = 'Club';
                        $imgName = $title['champion'];
                        $imgClass = 'ui rounded fluid image';
                        $imgStyle = '';
                        include '../db/image.php';
                      ?>
										</a>
									</td>
									<td style="width:70%">
										<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=champion&season=<?=$title['season']?>">
                      <?=$title['champion']?>
										</a>
									</td>
									<td style="width:15%">
										<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$title['season']?>">
                      <?=$title['season'].'/'.substr($title['season']+1, 2, 4)?>
										</a>
									</td>
								</tr>
              <?php endwhile ?>
						</tbody>
					</table>
				</div>
      <?php endif ?>
      <?php if (empty($leagueSeason['round'])) : ?>
				<div class="ui black fluid card black segment">
					<div class="ui header">
						<div class="ui center aligned black segment"><h3 class="f k r">우승후보</h3></div>
						<div>
              <?php
                $imgRole = 'Club';
                $imgName = $leagueTopClub['name'];
                $imgClass = 'ui rounded fluid image';
                $imgStyle = '';
                include '../db/image.php';
              ?>
            </div>
						<div class="ui center aligned header f k r">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$leagueTopClub['name']?>">
                <?=$leagueTopClub['name']?>
							</a>
						</div>
						<div class="ui center aligned meta f k r">
							<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$leagueTopClub['name']?>">
                <?=$leagueTopClub['stadium']?>
							</a>
						</div>
					</div>
					<div class="ui relaxed grid content">
						<div class="five wide column">
							<h5 class="ui center aligned f k r">Manager</h5>
						</div>
						<div class="eleven wide column">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$leagueTopClub['manager']?>">
                <?php
                  $imgRole = 'Manager';
                  $imgName = $leagueTopClub['manager'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = '';
                  include '../db/image.php';
                ?>
                <?=$leagueTopClub['manager']?>
							</a>
						</div>
						<div class="five wide column">
							<h5 class="ui center aligned f k r">Key Player</h5>
						</div>
						<div class="eleven wide column">
							<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$leagueKeyPlayer['name']?>">
                <?php
                  $imgRole = 'Player';
                  $imgName = $leagueKeyPlayer['name'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = '';
                  include '../db/image.php';
                ?>
                <?=$leagueKeyPlayer['name']?>
							</a>
						</div>
					</div>
				</div>
      <?php else : ?>
				<div class="ui center aligned black segment">
					<div>
						<h3 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/match.php">
								경기 일정
							</a>
						</h3>
					</div>
					<div class="ui divider"></div>
          <?php if (!empty($end)) : ?>
						<div class="ui center aligned container f k r">모든 Round가 진행되었습니다.</div>
          <?php else : ?>
          <?php while ($match = mysqli_fetch_assoc($leagueMatch)) :
            $matchRound = explode('_', $match['versus'])
          ?>
							<div class="ui segment">
								<div class="ui middle aligned grid">
									<div class="left floated right aligned six wide column">
										<a class="link f k r" href="<?=$path?>/league/match.php">
                      <?=$matchRound[0]?>
										</a>
									</div>
									<div class="ui center aligned four wide column">
										<a class="link f k r" href="<?=$path?>/league/match.php">
											VS
										</a>
									</div>
									<div class="right floated left aligned six wide column">
										<a class="link f k r" href="<?=$path?>/league/match.php">
                      <?=$matchRound[1]?>
										</a>
									</div>
								</div>
							</div>
          <?php endwhile ?>
        <?php endif ?>
				</div>
      <?php endif ?>
		</div>
		<div class="sixteen wide column">
      <?php if(!empty($rankRating)) : ?>
				<div class="ui horizontal black segments">
						<div class="ui black segment items">
							<div class="ui center aligned dividing header f k r">
								<a class="link f k r" href="<?=$path?>/league/ranking.php?player=true">
									최고 평점
								</a>
							</div>
              <?php $rait = mysqli_fetch_assoc($rankRating) ?>
							<div class="item">
								<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$rait['player']?>" style="max-width:125px; max-height:100px;">
									<?php
                    $imgRole  = 'Player';
                    $imgName  = $rait['player'];
                    $imgClass = '';
                    $imgStyle = 'height:100px; border-radius:10px;';
                    include '../db/image.php'
                  ?>
								</a>
								<div class="middle aligned content">
									<div class="header">
										<h3 class="f k r">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$rait['player']?>">
												<?=$rait['player']?>
											</a>
										</h3>
									</div>
									<div class="meta f k r">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rait['club']?>">
    									<?php
                        $imgRole  = 'Club';
                        $imgName  = $rait['club'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = 'max-width:20px; max-height:20px;';
                        include '../db/image.php'
                      ?>
											<?=$rait['club']?>
										</a>
									</div>
									<div class="description" style="text-align:right;">
										<h3 class="f k r">
                      <?=$rait['toprating'] > 99 ? '10.0점' : substr($rait['toprating'], 0, 1).'.'.substr($rait['toprating'], 1, 1).' 점'?>
										</h3>
									</div>
								</div>
							</div>
							<div class="ui divider"></div>
							<div class="ui middle aligned divided list">
                <?php while($rait = mysqli_fetch_assoc($rankRating)) : ?>
									<div class="item" style="vertical-align:middle;">
										<div class="right floated content">
											<h5 class="f k r">
                        <?=$rait['toprating'] > 99 ? '10.0점' : substr($rait['toprating'], 0, 1).'.'.substr($rait['toprating'], 1, 1).' 점'?>
											</h5>
										</div>
  									<?php
                      $imgRole  = 'Player';
                      $imgName  = $rait['player'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php'
                    ?>
										<div class="content">
											<div class="header">
												<h5 class="f k r">
													<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$rait['player']?>">
														<?=$rait['player']?>
													</a>
												</h5>
											</div>
											<div class="meta">
												<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rait['club']?>">
        									<?php
                            $imgRole  = 'Club';
                            $imgName  = $rait['club'];
                            $imgClass = 'ui avatar image';
                            $imgStyle = 'max-width:20px; max-height:20px;';
                            include '../db/image.php'
                          ?>
													<?=$rait['club']?>
												</a>
											</div>
										</div>
									</div>
              <?php endwhile ?>
							</div>
						</div>
          <?php if(!empty($rait = mysqli_fetch_assoc($rankGoal))) : ?>
						<div class="ui black segment items">
							<div class="ui center aligned dividing header f k r">
								<a class="link f k r" href="<?=$path?>/league/ranking.php?player=true">
									최다 득점
								</a>
							</div>
							<div class="item">
								<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$rait['player']?>" style="max-width:125px; max-height:100px;">
                  <?php
                    $imgRole  = 'Player';
                    $imgName  = $rait['player'];
                    $imgClass = '';
                    $imgStyle = 'height:100px; border-radius:10px;';
                    include '../db/image.php';
                  ?>
								</a>
								<div class="middle aligned content">
									<div class="header">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$rait['player']?>">
											<?=$rait['player']?>
										</a>
									</div>
									<div class="meta">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rait['club']?>">
                      <?php
                        $imgRole  = 'Club';
                        $imgName  = $rait['club'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = 'max-width:20px; max-height:20px;';
                        include '../db/image.php';
                      ?>
  										<?=$rait['club']?>
										</a>
									</div>
									<div class="description" style="text-align:right;">
										<h3 class="f k r">
											<?=$rait['goalscorer'].' 골'?>
										</h3>
									</div>
								</div>
							</div>
							<div class="ui divider"></div>
							<div class="ui middle aligned divided list">
                <?php while($rait = mysqli_fetch_assoc($rankGoal)) : ?>
									<div class="item" style="vertical-align:middle;">
										<div class="right floated content">
											<h5 class="f k r">
  											<?=$rait['goalscorer'].' 골'?>
											</h5>
										</div>
                    <?php
                      $imgRole  = 'Player';
                      $imgName  = $rait['player'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
										<div class="content">
											<div class="header">
												<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$rait['player']?>">
													<?=$rait['player']?>
												</a>
											</div>
											<div class="description">
												<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rait['club']?>">
        									<?php
                            $imgRole  = 'Club';
                            $imgName  = $rait['club'];
                            $imgClass = 'ui avatar image';
                            $imgStyle = 'max-width:20px; max-height:20px;';
                            include '../db/image.php';
                          ?>
													<?=$rait['club']?>
												</a>
											</div>
										</div>
									</div>
              <?php endwhile ?>
							</div>
						</div>
          <?php endif ?>
          <?php if(!empty($rait = mysqli_fetch_assoc($rankAssist))) : ?>
						<div class="ui black segment items">
							<div class="ui center aligned dividing header f k r">
								<a class="link f k r" href="<?=$path?>/league/ranking.php?player=true">
									최다 도움
								</a>
							</div>
							<div class="item">
								<a class="image" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$rait['player']?>" style="max-width:125px; max-height:100px;">
                  <?php
                    $imgRole  = 'Player';
                    $imgName  = $rait['player'];
                    $imgClass = '';
                    $imgStyle = 'height:100px; border-radius:10px;';
                    include '../db/image.php';
                  ?>
								</a>
								<div class="middle aligned content">
									<div class="header">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$rait['player']?>">
											<?=$rait['player']?>
										</a>
									</div>
									<div class="meta">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rait['club']?>">
                      <?php
                        $imgRole  = 'Club';
                        $imgName  = $rait['club'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = 'max-width:20px; max-height:20px;';
                        include '../db/image.php';
                      ?>
											<?=$rait['club']?>
										</a>
									</div>
									<div class="description" style="text-align:right;">
										<h3 class="f k r">
											<?=$rait['assistprovider'].' 도움'?>
										</h3>
									</div>
								</div>
							</div>
							<div class="ui divider"></div>
							<div class="ui middle aligned divided list">
                <?php while($rait = mysqli_fetch_assoc($rankAssist)) : ?>
									<div class="item" style="vertical-align:middle;">
										<div class="right floated content">
											<h5 class="f k r">
  											<?=$rait['assistprovider'].' 도움'?>
											</h5>
										</div>
                    <?php
                      $imgRole  = 'Player';
                      $imgName  = $rait['player'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
										<div class="content">
											<div class="header">
												<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$rait['player']?>">
    											<?=$rait['player']?>
												</a>
											</div>
											<div class="description">
												<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rait['player']?>">
        									<?php
                            $imgRole  = 'Club';
                            $imgName  = $rait['club'];
                            $imgClass = 'ui avatar image';
                            $imgStyle = 'max-width:20px; max-height:20px;';
                            include '../db/image.php'
                          ?>
    											<?=$rait['club']?>
												</a>
											</div>
										</div>
									</div>
                <<?php endwhile ?>
							</div>
						</div>
          <?php endif ?>
				</div>
    <?php endif ?>
		</div>
	</div>
  <?php
    if (empty($leagueSeason['round'])) :
      mysqli_data_seek(($leagueInformation), 0);
  ?>
		<div class="ui transition hidden center aligned black segment" id="openingSection">
			<h3 class="f k r">
				<?=$leagueSeason['season'].'/'.substr($leagueSeason['season']+1, 2, 4).' Season'?>
      </h3>
			<div class="ui centered grid segment">
        <?php while($rost = mysqli_fetch_assoc($leagueInformation)) : ?>
					<div class="column">
            <?php
              $imgRole  = 'Club';
              $imgName  = $rost['name'];
              $imgClass = 'ui rounded fluid image';
              $imgStyle = '';
              include '../db/image.php';
            ?>
					</div>
      <?php endwhile ?>
			</div>
			<div class="ui container f k r">
				총 <?=mysqli_num_rows($leagueInformation)?> 개의 팀이 <?=(mysqli_num_rows($leagueInformation)-1)*2?> round 동안 경기를 치루게 됩니다.
			</div>
			<div class="ui center aligned container" style="margin-top:10px">
				<input class="ui black button f k r" id="opening" type="button" value="시작">
				<input class="ui button f k r opening" type="button" value="취소">
			</div>
		</div>
  <?php else : ?>
		<div class="ui transition hidden center aligned black segment" id="matchSection">
			<h3 class="f k r"><?=$leagueSeason['round']?> Round</h3>
        <?php
          mysqli_data_seek(($leagueMatch), 0);
          while ($match = mysqli_fetch_assoc($leagueMatch)) :
            $home = explode('_', $match['versus'])[0];
            $away = explode('_', $match['versus'])[1];
        ?>
					<div class="ui segment">
						<div class="ui middle aligned grid">
							<div class="one wide column">
                <?php
                  $imgRole  = 'Club';
                  $imgName  = $home;
                  $imgClass = 'ui rounded fluid image';
                  $imgStyle = '';
                  include '../db/image.php';
                ?>
              </div>
							<div class="left floated right aligned five wide column">
                <span class="f k r"><?=$home?></span>
              </div>
							<div class="ui center aligned four wide column">
                <span class="versus f k r <?=str_replace(' ', '_', $match['versus'])?>">VS</span>
              </div>
							<div class="right floated left aligned five wide column">
                <span class="f k r"><?=$away?></span>
              </div>
							<div class="one wide column">
                <?php
                  $imgRole  = 'Club';
                  $imgName  = $away;
                  $imgClass = 'ui rounded fluid image';
                  $imgStyle = '';
                  include '../db/image.php';
                ?>
              </div>
						</div>
						<div class="ui grid" style="display:none;">
							<div class="sixteen wide column" style="padding:5px"><div class="ui fitted divider"></div></div>
							<div class="right aligned seven wide column <?=str_replace(' ', '_', $home)?>"></div>
							<div class="center aligned two wide column goal"></div>
							<div class="left aligned seven wide column <?=str_replace(' ', '_', $away)?>"></div>
						</div>
					</div>
      <?php endwhile ?>
			<div class="ui center aligned container" style="margin-top:10px">
				<button class="ui black button f k r" id="match">경기 시작</button>
				<input class="ui button f k r playing" type="button" value="취소">
			</div>
		</div>
  <?php endif ?>
  <?php if (!empty($end)) : ?>
		<div class="ui transition hidden center aligned" id="endingSection">
			<div class="ui segment">
				<div class="ui center aligned container f k r">
          <?=$leagueSeason['season'].'/'.substr($leagueSeason['season']+1, 2, 4)?> Season 이 종료되었습니다.<br>우승팀은 <?=$champion['name']?> 입니다.<br>
				</div>
				<div class="ui divider"></div>
				<div class="ui center aligned grid black segment">
					<div class="ui five wide column card">
						<div class="center aligned floated content" style="background-color:#545454; color:white">
              <h3 class="f k r">
                Champion
              </h3>
            </div>
						<div class="ui fitted divider"></div>
						<div class="image" style="background-color:white;">
              <?php
                $imgRole  = 'Club';
                $imgName  = $champion['name'];
                $imgClass = '';
                $imgStyle = '';
                include '../db/image.php';
              ?>
            </div>
						<div class="ui center aligned content f k r" style="border-top:none;">
              <?=$champion['name']?>
            </div>
						<div>
              <i class="<?=strtolower($champion['country'])?> flag"></i>
              <?=$champion['country']?>
            </div>
						<div>
              <?php
                $imgRole  = 'Stadium';
                $imgName  = $champion['stadium'];
                $imgClass = 'ui avatar image';
                $imgStyle = '';
                include '../db/image.php';
              ?>
              <?=$champion['stadium']?>
            </div>
						<div class="ui divider"></div>
						<div class="ui segment">
							<div class="label f k r">
                <?php
                  mysqli_data_seek(($leagueRanking), 0);
                  $rankChampion = mysqli_fetch_assoc($leagueRanking);
                 ?>
                <?=$leagueSeason['season'].'/'.substr($leagueSeason['season']+1, 2, 4).' Season '.$rankChampion['game'].' Round'?>
              </div>
							<div class="ui active progress" data-percent="100" style="display:flex;">
								<div class="bar" style="width:<?=floor($rankChampion['win'] / $rankChampion['game'] * 100)?>%; background-color:#2ecc40;">
									<div class="progress"><?=$rankChampion['win']?> 승</div>
								</div>
								<div class="bar" style="width:<?=floor($rankChampion['draw'] / $rankChampion['game'] * 100)?>%; background-color:#ffe21f;">
									<div class="progress"><?=$rankChampion['draw']?> 무</div>
								</div>
								<div class="bar" style="width:<?=floor($rankChampion['lose'] / $rankChampion['game'] * 100)?>%; background-color:#ff695e;">
									<div class="progress"><?=$rankChampion['lose']?> 패</div>
								</div>
								<div class="label f k r">
                  승률 <?=floor($rankChampion['win'] / $rankChampion['game'] * 100)?> %
                </div>
							</div>
						</div>
					</div>
					<div class="ui eleven wide column">
						<table class="ui table">
							<thead>
								<tr class="ui center aligned">
									<th style="border-right:1px solid rgba(34,36,38,.1)">
                    Club
                  </th>
									<th>
                    <?php
                      $imgRole  = 'Club';
                      $imgName  = $champion['name'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
                  </th>
									<th>
                    <?=$champion['name']?>
                  </th>
									<th style="border-left:1px solid rgba(34,36,38,.1)">
										<div class="ui active inverted black progress" style="margin-bottom:0;">
											<div class="bar" style="width:<?=$champion['ovr']?>%;">
												<div class="progress"><?=$champion['ovr']?></div>
											</div>
										</div>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr class="ui center aligned">
									<td style="border-right:1px solid rgba(34,36,38,.1)">
                    Manager
                  </td>
									<td>
                    <?php
                      $imgRole  = 'Manager';
                      $imgName  = $championManager['name'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
                  </td>
									<td>
                    <?=$championManager['name']?>
                  </td>
									<td style="border-left:1px solid rgba(34,36,38,.1)">
										<div class="ui active inverted black progress" style="margin-bottom:0;">
											<div class="bar" style="width:<?=$championManager['ovr']?>%;">
												<div class="progress"><?=$championManager['ovr']?></div>
											</div>
										</div>
									</td>
								</tr>
                <?php
                  $idx = 0;
                  while ($championPlayer = mysqli_fetch_assoc($championLineup)) :
                ?>
									<tr class="ui center aligned">
                    <?php if ($idx < 1) : ?>
                    <td rowspan="11" style="width:15%; border-right:1px solid rgba(34,36,38,.1)">
                      Player
                    </td>
                    <?php endif ?>
										<td style="width:10%">
                      <?php
                        $imgRole  = 'Player';
                        $imgName  = $championPlayer['name'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = '';
                        include '../db/image.php';
                      ?>
                    </td>
										<td style="width:50%">
                      <?=$championPlayer['name']?>
                    </td>
										<td style="width:25%; border-left:1px solid rgba(34,36,38,.1)">
											<div class="ui active inverted black progress" style="margin-bottom:0;">
												<div class="bar" style="width:<?=$championPlayer['ovr']+1?>%;">
													<div class="progress"><?=$championPlayer['ovr']?></div>
												</div>
											</div>
										</td>
									</tr>
              <?php
                $idx++;
                endwhile
              ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="ui horizontal segments">
          <?php
            if (!empty($rankRating)) :
              mysqli_data_seek(($rankRating), 0);
              $ballonDor = mysqli_fetch_assoc($rankRating)
          ?>
						<div class="ui black segment items">
							<div class="ui center aligned dividing header f k r">
                Ballon Dor
              </div>
							<div class="item">
								<div class="image" style="max-width:125px; max-height:100px;">
                  <?php
                    $imgRole  = 'Player';
                    $imgName  = $ballonDor['player'];
                    $imgClass = '';
                    $imgStyle = 'height:100px; border-radius:10px;';
                    include '../db/image.php';
                  ?>
								</div>
								<div class="middle aligned content">
									<div class="header">
                    <?=$ballonDor['player']?>
                  </div>
									<div class="meta">
                    <?php
                      $imgRole  = 'Club';
                      $imgName  = $ballonDor['club'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
                    <?=$ballonDor['club']?>
                   </div>
									<div class="description" style="text-align:right;">
                    <h3>
                      <?=$ballonDor['round']?> 경기
                      <?=$ballonDor['toprating'] > 99 ? '10.0점' : substr($ballonDor['toprating'], 0, 1).'.'.substr($ballonDor['toprating'], 1, 1).' 점'?>
                    </h3>
									</div>
								</div>
							</div>
							<div class="ui divider"></div>
							<div class="ui middle aligned divided list">
                <?php while ($ballonDor = mysqli_fetch_assoc($rankRating)) : ?>
									<div class="item" style="vertical-align:middle;">
										<div class="right floated content">
                      <?=$ballonDor['toprating'] > 99 ? '10.0점' : substr($ballonDor['toprating'], 0, 1).'.'.substr($ballonDor['toprating'], 1, 1).' 점'?>
										</div>
                    <?php
                      $imgRole  = 'Player';
                      $imgName  = $ballonDor['player'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
										<div class="content">
											<div class="header">
                        <?=$ballonDor['player']?>
                      </div>
											<div class="description">
                        <?php
                          $imgRole  = 'Club';
                          $imgName  = $ballonDor['club'];
                          $imgClass = 'ui avatar image';
                          $imgStyle = '';
                          include '../db/image.php';
                        ?>
                        <?=$ballonDor['club']?>
											</div>
										</div>
									</div>
                <?php endwhile ?>
							</div>
						</div>
          <?php endif ?>
          <?php
            if (!empty($rankGoal)) :
              mysqli_data_seek(($rankGoal), 0);
              $goalscorer = mysqli_fetch_assoc($rankGoal)
          ?>
						<div class="ui black segment items">
							<div class="ui center aligned dividing header f k r">득점왕</div>
							<div class="item">
								<div class="image" style="max-width:125px; max-height:100px;">
                  <?php
                    $imgRole  = 'Player';
                    $imgName  = $goalscorer['player'];
                    $imgClass = '';
                    $imgStyle = 'height:100px; border-radius:10px;';
                    include '../db/image.php';
                  ?>
								</div>
								<div class="middle aligned content">
									<div class="header">
                    <?=$goalscorer['player']?>
                  </div>
									<div class="meta">
                    <?php
                      $imgRole  = 'Club';
                      $imgName  = $goalscorer['club'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
                    <?=$goalscorer['club']?>
                   </div>
									<div class="description" style="text-align:right;">
                    <h3>
                      <?=$goalscorer['round']?> 경기
  										<?=$goalscorer['goalscorer'].' 골'?>
                  </h3>
									</div>
								</div>
							</div>
							<div class="ui divider"></div>
							<div class="ui middle aligned divided list">
                <?php while ($goalscorer = mysqli_fetch_assoc($rankGoal)) : ?>
									<div class="item" style="vertical-align:middle;">
										<div class="right floated content">
                      <?=$goalscorer['goalscorer'].' 골'?>
										</div>
                    <?php
                      $imgRole  = 'Player';
                      $imgName  = $goalscorer['player'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
										<div class="content">
											<div class="header">
                        <?=$goalscorer['player']?>
                      </div>
											<div class="description">
                        <?php
                          $imgRole  = 'Club';
                          $imgName  = $goalscorer['club'];
                          $imgClass = 'ui avatar image';
                          $imgStyle = '';
                          include '../db/image.php';
                        ?>
                        <?=$goalscorer['club']?>
											</div>
										</div>
									</div>
                <?php endwhile ?>
							</div>
						</div>
          <?php endif ?>
          <?php
            if (!empty($rankAssist)) :
              mysqli_data_seek(($rankAssist), 0);
              $assistProvider = mysqli_fetch_assoc($rankAssist)
          ?>
						<div class="ui black segment items">
							<div class="ui center aligned dividing header f k r">도움왕</div>
							<div class="item">
								<div class="image" style="max-width:125px; max-height:100px;">
                  <?php
                    $imgRole  = 'Player';
                    $imgName  = $assistProvider['player'];
                    $imgClass = '';
                    $imgStyle = 'height:100px; border-radius:10px;';
                    include '../db/image.php';
                  ?>
								</div>
								<div class="middle aligned content">
									<div class="header">
                    <?=$assistProvider['player']?>
                  </div>
									<div class="meta">
                    <?php
                      $imgRole  = 'Club';
                      $imgName  = $assistProvider['club'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
                    <?=$goalscorer['club']?>
                   </div>
									<div class="description" style="text-align:right;">
                    <h3>
                      <?=$assistProvider['round']?> 경기
  										<?=$assistProvider['assistprovider'].' 도움'?>
                  </h3>
									</div>
								</div>
							</div>
							<div class="ui divider"></div>
							<div class="ui middle aligned divided list">
                <?php while ($assistProvider = mysqli_fetch_assoc($rankAssist)) : ?>
									<div class="item" style="vertical-align:middle;">
										<div class="right floated content">
                      <?=$assistProvider['assistprovider'].' 도움'?>
										</div>
                    <?php
                      $imgRole  = 'Player';
                      $imgName  = $assistProvider['player'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
										<div class="content">
											<div class="header">
                        <?=$assistProvider['player']?>
                      </div>
											<div class="description">
                        <?php
                          $imgRole  = 'Club';
                          $imgName  = $assistProvider['club'];
                          $imgClass = 'ui avatar image';
                          $imgStyle = '';
                          include '../db/image.php';
                        ?>
                        <?=$assistProvider['club']?>
											</div>
										</div>
									</div>
                <?php endwhile ?>
							</div>
						</div>
          <?php endif ?>
	 			</div>
	 		</div>
			<div class="ui center aligned container" style="margin-top:10px">
				<input class="ui black button f k r" id="ending" type="button" value="<?=($leagueSeason['season']+1).'/'.(substr($leagueSeason['season']+1, 2, 4)+1).' Season'?>">
				<input class="ui button f k r ending" type="button" value="취소">
			</div>
		</div>
<?php endif ?>
</section>
<script>

$(function(){

	$('.opening, .playing, .ending, #opening, #match, #ending').transition('set looping').transition('pulse', '2500ms')
	$('.cancel').transition('remove looping')

	$('.opening').click(function(){
		if ($('#league').hasClass('hidden')) {
			$('#openingSection').transition({
				animation  : 'fade up',
				onComplete : function(){
					$('#league').transition('fade up')
				}
			})
		} else{
			$('#league').transition({
				animation  : 'fade up',
				onComplete : function(){
					$('#openingSection').transition('fade up')
				}
			})
		}
	})

	$('.playing').click(function(){
		if ($('#league').hasClass('hidden')) {
			$('#matchSection').transition({
				animation  : 'fade left',
				onComplete : function(){
					$('#league').transition('fade right')
				}
			})
		} else {
			$('#league').transition({
				animation  : 'fade right',
				onComplete : function(){
					$('#matchSection').transition('fade left')
				}
			})
		}
	})

	$('.ending').click(function(){
		if ($('#league').hasClass('hidden')) {
			$('#endingSection').transition({
				animation  : 'fade up',
				onComplete : function(){
					$('#league').transition('fade up')
				}
			})
		} else {
			$('#league').transition({
				animation  : 'fade up',
				onComplete : function(){
					$('#endingSection').transition('fade up')
				}
			})
		}
	})

	$('#opening').click(function(){
    $.ajax({
      url     : '<?=$path?>/db/rest/opening.php',
      method  : 'POST',
      data    : { season : '<?=$leagueSeason['season']?>', roster : '<?=$leagueSeason['roster']?>'},
      success : function(data){
        window.location.reload();
      }
    })
	})

	$('#match').click(function(){
		if ($('#match').text() == '확인'){
			window.location.reload()
		} else {
			$(this).addClass('loading disabled')
      $.ajax({
        url     : '<?=$path?>/db/rest/matching.php',
        method  : 'POST',
        data    : { season : '<?=$leagueSeason['season']?>', round : '<?=$leagueSeason['round']?>'},
        success : function(){
          $.ajax({
            url     : '<?=$path?>/db/rest/matchresult.php',
            method  : 'POST',
            dataType: 'json',
            data    : { season : '<?=$leagueSeason['season']?>', round : '<?=$leagueSeason['round']?>'},
            success : function(data){
        				$('.versus').transition({
        					animation  : 'horizontal flip',
        					onComplete : function(){
        						for (var i = 0; i < data.result.length; i++){
        							$('.'+data.result[i].versus.replace(/ /gi, '_')).text(data.result[i].score)
        						}
        					}
        				})
        				for (var i = 0; i < data.score.length; i++){
        					$('.'+data.score[i].club.replace(/ /gi, '_')).append(
        						'<div>' + data.score[i].player + '<div>'
        					).parent().css('display', '')
        					if ($('.'+data.score[i].club.replace(/ /gi, '_')).children().length > $('.'+data.score[i].club.replace(/ /gi, '_')).siblings('.goal').children().length){
        						$('.'+data.score[i].club.replace(/ /gi, '_')).siblings('.goal').append(
        							'<div><i class="futbol icon"></i></div>'
        						)
        					}
        				}
        				$('.versus').transition('horizontal flip')
        				$('#match').removeClass('loading disabled').text('확인')
              }
          })
        }
      })
		}
	})

	$('#ending').click(function(){
    $.ajax({
      url     : '<?=$path?>/db/rest/ending.php',
      method  : 'POST',
      data    : { history : '<?=$leagueSeason['season'].'/'.substr($leagueSeason['season']+1, 2, 4)?>'},
      success : function(data){
        window.location.reload();
      }
    })
	})

})

</script>
<?php include '../include/footer.php'?>
