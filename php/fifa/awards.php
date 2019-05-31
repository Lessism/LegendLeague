<?php include '../db/fifa/awards.php';?>
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
		<?=$season.'/'.substr($season+1, 2, 4).' Season'?>
    <?php
      switch ($awardname) {
        case 'champion':
          echo 'Legend League Champion';
          break;
        case 'manager':
          echo 'FIFA World Manager';
          break;
        default:
          echo 'FIFA World Player Award';
          break;
      }
    ?>
	</h4>
	<div class="ui divider"></div>
  <?php if ($role == 'Club') : ?>
		<div class="ui grid">
			<div class="eleven wide column">
				<div class="ui center aligned black segment">
					<div class="content">
						<h3 class="f k r">Legend League Champion</h3>
						<div class="ui divider"></div>
					</div>
					<div>
            <?php
              $imgRole = 'Club';
              $imgName = $champion['name'];
              $imgClass = 'ui centered rounded image';
              $imgStyle = 'max-height:500px;';
              include '../db/image.php';
            ?>
          </div>
					<div class="ui divider"></div>
					<div class="ui header f k r">
						<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$champion['name']?>">
							<?=$champion['name']?>
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$champion['country']?>">
							<i class="<?=strtolower($champion['country'])?> flag"></i>
							<?=$champion['country']?>
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$champion['name']?>">
              <?php
                $imgRole = 'Stadium';
                $imgName = $champion['stadium'];
                $imgClass = 'ui avatar image';
                $imgStyle = '';
                include '../db/image.php';
              ?>
						  <?=$champion['stadium']?>
						</a>
					</div>
					<div class="ui divider"></div>
					<div class="ui segment">
						<div class="ui active inverted black progress">
							<div class="bar" style="width:<?=$champion['ovr']+1?>%;">
								<div class="progress"><?=$champion['ovr']?></div>
							</div>
							<div class="label f k r" style="color:black">OVR</div>
						</div>
						<div class="ui divider"></div>
						<h4 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$season?>">
            		<?=$season.'/'.substr($season+1, 2, 4).' Season'?>
							</a>
						</h4>
						<div class="ui five statistics">
							<div class="statistic">
								<div class="value"><h2 class="f k r"><?=$championOdds['game']?></h2></div>
								<div class="label"><h5 class="f k r">경기</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r"><?=$championOdds['maxgoalfor']?></h2></div>
								<div class="label"><h5 class="f k r">득점</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r"><?=$championOdds['maxgoalagainst']?></h2></div>
								<div class="label"><h5 class="f k r">실점</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r"><?=$championOdds['maxgoalfor'] - $championOdds['maxgoalagainst']?></h2></div>
								<div class="label"><h5 class="f k r">득실차</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r"><?=$championOdds['maxpoint']?></h2></div>
								<div class="label"><h5 class="f k r">승점</h5></div>
							</div>
						</div>
						<div class="ui divider"></div>
						<div class="ui active progress" data-percent="100" style="display:flex;">
							<div class="bar" style="width:<?=$championOdds['winodds'] * 100?>%; background-color:#2ecc40;">
								<div class="progress"><?=$championOdds['win']?> 승</div>
							</div>
							<div class="bar" style="width:<?=$championOdds['drawodds'] * 100?>%; background-color:#ffe21f;">
								<div class="progress"><?=$championOdds['draw']?> 무</div>
							</div>
							<div class="bar" style="width:<?=$championOdds['loseodds'] * 100?>%; background-color:#ff695e;">
								<div class="progress"><?=$championOdds['lose']?> 패</div>
							</div>
							<div class="label f k r">승률 <?=floor($championOdds['winodds'] * 100)?>%</div>
						</div>
					</div>
					<div class="ui segment f k r">
						<div class="ui header f k r">
							<a class="link f k r" href="<?=$path?>/fifa/squad.php?role=Club&name=<?=$champion['name']?>">
								Squad
							</a>
						</div>
						<table class="ui left aligned table">
							<tr>
								<th class="ui center aligned">Manager</th>
								<td>
									<div class="ui image header f k r">
                    <?php
                      $imgRole = 'Manager';
                      $imgName = $championManager['name'];
                      $imgClass = 'ui rounded image';
                      $imgStyle = 'height:50px; width:42.5px';
                      include '../db/image.php';
                    ?>
										<div class="content">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$championManager['name']?>">
												<?=$championManager['name']?>
											</a>
											<div class="sub header">
												<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$championManager['country']?>">
													<i class="dot circle outline icon"></i><i class="<?=strtolower($championManager['country'])?> flag"></i>
													<?=$championManager['country']?>
												</a>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="ui one statistics">
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$championManager['tactic']?></h2></div>
											<div class="label"><h5 class="f k r">전술</h5></div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<th rowspan="11" class="ui center aligned" style="border-top:1px solid rgba(34,36,38,.1);">Player</th>
								<td>
									<div class="ui image header f k r">
                    <?php
                      $roster = mysqli_fetch_assoc($championRoster);
                      $imgRole = 'Player';
                      $imgName = $roster['name'];
                      $imgClass = 'ui rounded image';
                      $imgStyle = 'height:50px;';
                      include '../db/image.php';
                    ?>
										<div class="content">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$roster['name']?>">
												<?=$roster['name']?>
											</a>
											<div class="sub header">
												<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$roster['country']?>">
													<i class="dot circle outline <?=$roster['icon']?> icon"></i>
													<i class="<?=strtolower($roster['country'])?> flag"></i>
													<?=$roster['country']?>
												</a>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="ui three statistics">
										<div class="statistic">
											<div class="value">
												<h2 class="f k r">
                          <?=$roster['avgrating'] > 99 ? '10.0' : substr($roster['avgrating'], 0, 1).'.'.substr($roster['avgrating'], 1, 1)?>
												</h2>
											</div>
											<div class="label"><h5 class="f k r">평점</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$roster['sumgoal']?></h2></div>
											<div class="label"><h5 class="f k r">득점</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$roster['sumassist']?></h2></div>
											<div class="label"><h5 class="f k r">도움</h5></div>
										</div>
									</div>
								</td>
							</tr>
              <?php while ($roster = mysqli_fetch_assoc($championRoster)) : ?>
								<tr>
									<td>
										<div class="ui image header f k r">
                      <?php
                        $imgRole = 'Player';
                        $imgName = $roster['name'];
                        $imgClass = 'ui rounded image';
                        $imgStyle = 'height:50px;';
                        include '../db/image.php';
                      ?>
											<div class="content">
												<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$roster['name']?>">
													<?=$roster['name']?>
												</a>
												<div class="sub header">
													<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$roster['country']?>">
														<i class="dot circle outline <?=$roster['icon']?>"></i>
														<i class="<?=strtolower($roster['country'])?> flag"></i>
														<?=$roster['country']?>
													</a>
												</div>
											</div>
										</div>
									</td>
									<td>
										<div class="ui three statistics">
											<div class="statistic">
												<div class="value">
													<h2 class="f k r">
                            <?=$roster['avgrating'] > 99 ? '10.0' : substr($roster['avgrating'], 0, 1).'.'.substr($roster['avgrating'], 1, 1)?>
													</h2>
												</div>
												<div class="label"><h5 class="f k r">평점</h5></div>
											</div>
  										<div class="statistic">
  											<div class="value"><h2 class="f k r"><?=$roster['sumgoal']?></h2></div>
  											<div class="label"><h5 class="f k r">득점</h5></div>
  										</div>
  										<div class="statistic">
  											<div class="value"><h2 class="f k r"><?=$roster['sumassist']?></h2></div>
  											<div class="label"><h5 class="f k r">도움</h5></div>
  										</div>
										</div>
									</td>
								</tr>
              <?php endwhile ?>
						</table>
					</div>
          <?php if ($champion['history'] != null) : ?>
						<div class="ui segment f k r">
							<div class="ui header f k r">
								<a class="link f k r" href="<?=$path?>/fifa/title.php?role=Club&name=<?=$champion['name']?>">
									History
								</a>
							</div>
							<div class="ui center aligned statistic">
								<div class="value"><h2 class="f k r"><?=$champion['countchampion']?></h2></div>
								<div class="label"><h5 class="f k r">Champion</h5></div>
							</div>
							<div class="ui segment f k r">
								<div class="ui middle aligned relaxed divided list">
                  <?php
                    $historys = explode(',', $champion['history']);
                    foreach ($historys as $history) :
                  ?>
										<div class="item">
											<h5 class="f k r">
												<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=substr($history, 0, 4)?>">
													<?=substr($history, 0, 7)?> Season
												</a>
											</h5>
											<div>
												<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=champion&season=<?=substr($history, 0, 4)?>">
													<?=substr($history, 7, strlen($history))?>
												</a>
											</div>
										</div>
                  <?php endforeach ?>
								</div>
							</div>
						</div>
          <?php endif; ?>
				</div>
			</div>
			<div class="five wide column">
				<div class="ui center aligned black segment">
					<h3 class="f k r">년도별 우승팀</h3>
					<div class="ui divider"></div>
					<table class="ui striped center aligned table">
          <?php
            while ($champ = mysqli_fetch_assoc($championList)) : ;
              if (!empty($champ['name'])) : ;
                if ($champ['season'] == $season) : ;
          ?>
									<thead>
										<tr class="f k r">
											<th style="width:25%">
												<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=<?=$award?>&season=<?=$champ['season']?>">
                          <?php
                            $imgRole = 'Club';
                            $imgName = $champ['name'];
                            $imgClass = 'ui avatar image';
                            $imgStyle = '';
                            include '../db/image.php';
                          ?>
												</a>
											</th>
											<th>
												<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=<?=$award?>&season=<?=$champ['season']?>">
													<?=$champ['name']?>
												</a>
											</th>
											<th>
												<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$champ['season']?>">
													<?=$champ['season'].'/'.substr($champ['season']+1, 2, 4)?>
												</a>
											</th>
										</tr>
									</thead>
                <?php else : ?>
									<tr>
										<td style="width:25%">
                      <a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=<?=$award?>&season=<?=$champ['season']?>">
                        <?php
                          $imgRole = 'Club';
                          $imgName = $champ['name'];
                          $imgClass = 'ui avatar image';
                          $imgStyle = '';
                          include '../db/image.php';
                        ?>
                      </a>
										</td>
										<td>
                      <a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=<?=$award?>&season=<?=$champ['season']?>">
                        <?=$champ['name']?>
                      </a>
										</td>
										<td>
                      <a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$champ['season']?>">
                        <?=$champ['season'].'/'.substr($champ['season']+1, 2, 4)?>
                      </a>
										</td>
									</tr>
          <?php
                endif;
              endif;
            endwhile;
          ?>
					</table>
				</div>
			</div>
		</div>
  <?php endif; ?>
  <?php if ($role == 'Manager') : ?>
		<div class="ui grid">
			<div class="eleven wide column">
				<div class="ui center aligned black segment">
					<div class="content">
						<h3 class="f k r">FIFA World Manager</h3>
						<div class="ui divider"></div>
					</div>
					<div>
            <?php
              $imgRole = 'Manager';
              $imgName = $manager['name'];
              $imgClass = 'ui centered rounded image';
              $imgStyle = 'max-height:500px;';
              include '../db/image.php';
            ?>
          </div>
					<div class="ui divider"></div>
					<div class="ui header f k r">
						<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Manager&name=<?=$manager['name']?>">
							<?=$manager['name']?>
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$manager['country']?>">
							<i class="<?=strtolower($manager['country'])?> flag"></i>
							<?=$manager['country']?>
						</a>
					</div>
					<div class="ui meta f k r">
						<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$manager['club']?>">
              <?php
                $imgRole = 'Club';
                $imgName = $manager['club'];
                $imgClass = 'ui avatar image';
                $imgStyle = '';
                include '../db/image.php';
              ?>
							<?=$manager['club']?>
						</a>
					</div>
					<div class="ui divider"></div>
					<div class="ui segment">
						<div class="ui active inverted black progress">
							<div class="bar" style="width:<?=$manager['ovr']+1?>%;">
								<div class="progress"><?=$manager['ovr']?></div>
							</div>
							<div class="label f k r" style="color:black">OVR</div>
						</div>
						<div class="ui divider"></div>
						<h4 class="f k r">
							<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$season?>">
								<?=$season.'/'.substr($season, 2, 4).' Season'?>
							</a>
						</h4>
						<div class="ui five statistics">
							<div class="statistic">
								<div class="value"><h2 class="f k r"><?=$managerOdds['game']?></h2></div>
								<div class="label"><h5 class="f k r">경기</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r"><?=$managerOdds['maxgoalfor']?></h2></div>
								<div class="label"><h5 class="f k r">득점</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r"><?=$managerOdds['maxgoalagainst']?></h2></div>
								<div class="label"><h5 class="f k r">실점</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r"><?=$managerOdds['maxgoalfor'] - $managerOdds['maxgoalagainst']?></h2></div>
								<div class="label"><h5 class="f k r">득실차</h5></div>
							</div>
							<div class="statistic">
								<div class="value"><h2 class="f k r"><?=$managerOdds['maxpoint']?></h2></div>
								<div class="label"><h5 class="f k r">승점</h5></div>
							</div>
						</div>
						<div class="ui divider"></div>
						<div class="ui active progress" data-percent="100" style="display:flex;">
							<div class="bar" style="width:<?=$managerOdds['winodds'] * 100?>%; background-color:#2ecc40;">
								<div class="progress"><?=$managerOdds['win']?> 승</div>
							</div>
							<div class="bar" style="width:<?=$managerOdds['drawodds'] * 100?>%; background-color:#ffe21f;">
								<div class="progress"><?=$managerOdds['draw']?> 무</div>
							</div>
							<div class="bar" style="width:<?=$managerOdds['loseodds'] * 100?>%; background-color:#ff695e;">
								<div class="progress"><?=$managerOdds['lose']?> 패</div>
							</div>
							<div class="label f k r">승률 <?=floor($managerOdds['winodds'] * 100)?>%</div>
						</div>
					</div>
					<div class="ui segment f k r">
						<div class="ui header f k r">
							<a class="link f k r" href="<?=$path?>/fifa/detail.php?role=Manager&name=<?=$manager['name']?>">
								Information
							</a>
						</div>
						<table class="ui center aligned table">
							<tr>
								<th>Birth</th>
								<td><?=$manager['birth']?></td>
							</tr>
							<tr>
								<th>Physical</th>
								<td><?=$manager['height'].' cm '.$manager['weight'].' kg'?></td>
							</tr>
							<tr>
								<th>Tactic</th>
								<td><?=$manager['tactic']?></td>
							</tr>
						</table>
					</div>
          <?php if ($manager['history'] != null) : ?>
						<div class="ui segment f k r">
							<div class="ui header f k r">
								<a class="link f k r" href="<?=$path?>/fifa/award.php?role=Manager&name=${fifa.award.manager.name}">
									History
								</a>
							</div>
							<div class="ui two statistics">
								<div class="statistic">
									<div class="value"><h2 class="f k r"><?=$manager['countchampion']?></h2></div>
									<div class="label"><h5 class="f k r">Champion</h5></div>
								</div>
								<div class="statistic">
									<div class="value"><h2 class="f k r"><?=$manager['countchampion']?></h2></div>
									<div class="label"><h5 class="f k r">FIFA World Manager</h5></div>
								</div>
							</div>
							<div class="ui segment f k r">
								<div class="ui middle aligned relaxed divided list">
                  <?php
                    $idx = 0;
                    $historys = explode(',', $manager['history']);
                    $historySeason = '';
                    foreach ($historys as $history) : ;
                      if ($idx == 0 || $historySeason != substr($history, 0, 7)) :
                  ?>
											<div class="item">
												<h5 class="f k r">
													<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=substr($history, 0, 7)?>">
														<?=substr($history, 0, 7)?> Season
													</a>
												</h5>
                    <?php endif ?>
												<div>
													<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Club&award=champion&season=<?=substr($history, 0, 4)?>">
														<?=substr($history, 7, strlen($history))?>
													</a>
												</div>
												<div>
													<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Manager&award=manager&season=<?=substr($history, 0, 4)?>">
														FIFA World Manager
													</a>
												</div>
                        <?=$idx == 0 || $historySeason != substr($history, 0, 7) ? '</div>' : ''?>
                  <?php
                    $historySeason = substr($history, 0, 7);
                    $idx++;
                    endforeach;
                  ?>
								</div>
							</div>
						</div>
          <?php endif; ?>
				</div>
			</div>
			<div class="five wide column">
				<div class="ui center aligned black segment">
					<h3 class="f k r">년도별 수상자</h3>
					<div class="ui divider"></div>
					<table class="ui striped center aligned table">
            <?php
              while ($award = mysqli_fetch_assoc($managerList)) : ;
                if (!empty($award['name'])) : ;
                  if ($award['season'] == $season) : ;
            ?>
									<thead>
										<tr class="f k r">
											<th style="width:25%">
												<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Manager&award=manager&season=<?=$award['season']?>">
                          <?php
                            $imgRole = 'Manager';
                            $imgName = $award['name'];
                            $imgClass = 'ui avatar image';
                            $imgStyle = '';
                            include '../db/image.php';
                          ?>
												</a>
											</th>
											<th>
												<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Manager&award=manager&season=<?=$award['season']?>">
													<?=$award['name']?>
												</a>
											</th>
											<th>
												<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$award['season']?>">
													<?=$award['season'].'/'.substr($award['season']+1, 2, 4)?>
												</a>
											</th>
										</tr>
									</thead>
                <?php else : ?>
									<tr>
										<td style="width:25%">
											<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Manager&award=manager&season=<?=$award['season']?>">
                        <?php
                          $imgRole = 'Manager';
                          $imgName = $award['name'];
                          $imgClass = 'ui avatar image';
                          $imgStyle = '';
                          include '../db/image.php';
                        ?>
											</a>
										</td>
										<td>
											<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Manager&award=manager&season=<?=$award['season']?>">
												<?=$award['name']?>
											</a>
										</td>
										<td>
											<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$award['season']?>">
												<?=$award['season'].'/'.substr($award['season']+1, 2, 4)?>
											</a>
										</td>
									</tr>
            <?php
                  endif;
                endif;
              endwhile;
            ?>
					</table>
				</div>
			</div>
		</div>
  <?php endif; ?>
  <?php if ($role == 'Player') : ?>
		<div class="ui black segment">
			<div class="ui pointing secondary <?=!empty($assistProvider) ? 'three' : 'two'?> item menu">
				<a class="tabular item f k r <?=$awardname == 'ballondor' ? 'active' : ''?>" data-tab="ballondor">Ballon Dor</a>
        <?php if (!empty($goalScorer)) : ?>
					<a class="tabular item f k r <?=$awardname == 'goalscorer' ? 'active' : ''?>" data-tab="goalscorer">Goal Scorer</a>
        <?php endif; ?>
        <?php if (!empty($assistProvider)) : ?>
					<a class="tabular item f k r <?=$awardname == 'assistprovider' ? 'active' : ''?>" data-tab="assistprovider">Assist Provider</a>
        <?php endif; ?>
			</div>
			<div class="ui tab segment <?=$awardname == 'ballondor' ? 'active' : ''?>" data-tab="ballondor">
				<div class="ui grid">
					<div class="eleven wide column">
						<div class="ui center aligned black segment">
							<div class="content">
								<h3 class="f k r">Ballon Dor</h3>
								<div class="ui divider"></div>
							</div>
							<div>
                <?php
                  $imgRole = 'Player';
                  $imgName = $ballonDor['name'];
                  $imgClass = 'ui centered rounded image';
                  $imgStyle = 'max-height:500px;';
                  include '../db/image.php';
                ?>
              </div>
							<div class="ui divider"></div>
							<div class="ui header f k r">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$ballonDor['name']?>">
									<?=$ballonDor['name']?>
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$ballonDor['country']?>">
									<i class="<?=strtolower($ballonDor['country'])?> flag"></i>
									<?=$ballonDor['country']?>
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$ballonDor['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $ballonDor['club'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = '';
                    include '../db/image.php';
                  ?>
									<?=$ballonDor['club']?>
								</a>
							</div>
							<div class="ui divider"></div>
							<div class="ui segment">
								<div class="ui active <?=$ballonDor['icon']?> progress">
									<div class="bar" style="width:<?=$ballonDor['ovr']+1?>%;">
										<div class="progress"><div class="ui meta f k r"><?=$ballonDor['type']?> <?=$ballonDor['ovr']?></div></div>
									</div>
									<div class="label f k r" style="color:black">OVR</div>
								</div>
								<div class="ui divider"></div>
								<h4 class="f k r">
									<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$ballonDor['season']?>">
										<?=$ballonDor['season'].'/'.substr($ballonDor['season']+1, 2, 4).' Season'?>
									</a>
								</h4>
								<div class="ui four statistics">
									<div class="statistic">
										<div class="value"><h2 class="f k r"><?=$ballonDorScore['countround']?></h2></div>
										<div class="label"><h5 class="f k r">경기</h5></div>
									</div>
									<div class="statistic">
										<div class="value">
											<h2 class="f k r">
                        <?=$ballonDorScore['avgrating'] > 99 ? '10.0' : substr($ballonDorScore['avgrating'], 0, 1).'.'.substr($ballonDorScore['avgrating'], 1, 1)?>
											</h2>
										</div>
										<div class="label"><h5 class="f k r">평점</h5></div>
									</div>
									<div class="statistic">
										<div class="value"><h2 class="f k r"><?=$ballonDorScore['sumgoal']?></h2></div>
										<div class="label"><h5 class="f k r">골</h5></div>
									</div>
									<div class="statistic">
										<div class="value"><h2 class="f k r"><?=$ballonDorScore['sumassist']?></h2></div>
										<div class="label"><h5 class="f k r">어시스트</h5></div>
									</div>
								</div>
								<div class="ui divider"></div>
								<div class="ui active progress" data-percent="100" style="display:flex;">
									<div class="bar" style="width:<?=$ballonDorOdds['winodds'] * 100?>%; background-color:#2ecc40;">
										<div class="progress"><?=$ballonDorOdds['win']?> 승</div>
									</div>
									<div class="bar" style="width:<?=$ballonDorOdds['drawodds'] * 100?>%; background-color:#ffe21f;">
										<div class="progress"><?=$ballonDorOdds['draw']?> 무</div>
									</div>
									<div class="bar" style="width:<?=$ballonDorOdds['loseodds'] * 100?>%; background-color:#ff695e;">
										<div class="progress"><?=$ballonDorOdds['lose']?> 패</div>
									</div>
									<div class="label f k r">승률 <?=floor($ballonDorOdds['winodds'] * 100)?>%</div>
								</div>
							</div>
							<div class="ui segment f k r">
								<div class="ui header f k r">
									<a class="link f k r" href="<?=$path?>/fifa/detail.php?role=Player&name=<?=$ballonDor['name']?>">
										Information
									</a>
								</div>
								<table class="ui center aligned table">
									<tr>
										<th>Birth</th>
										<td><?=$ballonDor['birth']?></td>
									</tr>
									<tr>
										<th>Physical</th>
										<td><?=$ballonDor['height'].' cm '.$ballonDor['weight'].' kg'?></td>
									</tr>
									<tr>
										<th>Position</th>
										<td><i class="dot circle outline <?=$ballonDor['icon']?> icon"></i><?=$ballonDor['position']?></td>
									</tr>
								</table>
							</div>
              <?php if ($ballonDor['history'] != null) : ?>
								<div class="ui segment f k r">
									<div class="ui header f k r">
										<a class="link f k r" href="<?=$path?>/fifa/award.php?role=Player&name=<?=$ballonDor['name']?>">
											History
										</a>
									</div>
									<div class="ui four statistics">
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$ballonDor['countchampion']?></h2></div>
											<div class="label"><h5 class="f k r">Champion</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$ballonDor['countballondor']?></h2></div>
											<div class="label"><h5 class="f k r">Ballon Dor</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$ballonDor['countgoalscorer']?></h2></div>
											<div class="label"><h5 class="f k r">Goal Scorer</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$ballonDor['countassistprovider']?></h2></div>
											<div class="label"><h5 class="f k r">Assist Provider</h5></div>
										</div>
									</div>
									<div class="ui segment f k r">
										<div class="ui middle aligned relaxed divided list">
                      <?php
                        $idx = 0;
                        $historySeason = '';
                        $historys = explode(',', $ballonDor['history']);
                        foreach ($historys as $history) : ;
                          if ($idx == 0 || $historySeason != substr($history, 0, 7)) :
                      ?>
													<div class="item">
														<h5 class="f k r">
															<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=substr($history, 0, 4)?>">
																<?=substr($history, 0, 7).' Season'?>
															</a>
														</h5>
                        <?php endif ?>
														<div>
															<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=<?=substr($history, 7, strlen($history)) != ' Legend League Champion' ? 'Player' : 'Club'?>&award=<?php
                                  switch (substr($history, 7, strlen($history))) {
                                    case ' Legend League Champion':echo 'champion';
                                      break;
                                    case ' Ballon Dor':
                                      echo 'ballondor';
                                      break;
                                    case ' Goal Scorer':
                                      echo 'goalscorer';
                                      break;
                                    case ' Assist Provider':
                                      echo 'assistprovider';
                                      break;
                                  }
                                ?>&season=<?=substr($history, 0, 4)?>">
																<?=substr($history, 7, strlen($history))?>
															</a>
														</div>
                            <?php
                              if ($idx == 0 || $historySeason != substr($history, 0, 7)) :
                                echo '</div>';
                              endif;
                              $historySeason = substr($history, 0, 7);
                              $idx++;
                            endforeach;
                            ?>
										</div>
									</div>
								</div>
              <?php endif; ?>
						</div>
					</div>
					<div class="five wide column">
						<div class="ui center aligned black segment">
							<h3 class="f k r">년도별 수상자</h3>
							<div class="ui divider"></div>
							<table class="ui striped center aligned table">
                <?php
                  while ($award = mysqli_fetch_assoc($ballonDorList)) :
                    if (!empty($award['name'])) :
                      if ($award['season'] == $season) :
                ?>
											<thead>
												<tr class="f k r">
													<th style="width:25%">
														<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=ballondor&season=<?=$award['season']?>">
                              <?php
                                $imgRole = 'Player';
                                $imgName = $award['name'];
                                $imgClass = 'ui avatar image';
                                $imgStyle = '';
                                include '../db/image.php';
                              ?>
														</a>
													</th>
													<th>
														<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=ballondor&season=<?=$award['season']?>">
															<?=$award['name']?>
														</a>
													</th>
													<th>
														<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$award['season']?>">
															<?=$award['season'].'/'.substr($award['season']+1, 2, 4)?>
														</a>
													</th>
												</tr>
											</thead>
                    <?php else : ?>
											<tr>
												<td style="width:25%">
													<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=ballondor&season=<?=$award['season']?>">
                            <?php
                              $imgRole = 'Player';
                              $imgName = $award['name'];
                              $imgClass = 'ui avatar image';
                              $imgStyle = '';
                              include '../db/image.php';
                            ?>
													</a>
												</td>
												<td>
													<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=ballondor&season=<?=$award['season']?>">
														<?=$award['name']?>
													</a>
												</td>
												<td>
													<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$award['season']?>">
														<?=$award['season'].'/'.substr($award['season']+1, 2, 4)?>
													</a>
												</td>
											</tr>
                <?php
                      endif;
                    endif;
                  endwhile;
                ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="ui tab segment <?=$awardname == 'goalscorer' ? 'active' : ''?>" data-tab="goalscorer">
				<div class="ui grid">
					<div class="eleven wide column">
						<div class="ui center aligned black segment">
							<div class="content">
								<h3 class="f k r">Goal Scorer</h3>
								<div class="ui divider"></div>
							</div>
							<div>
                <?php
                  $imgRole = 'Player';
                  $imgName = $goalScorer['name'];
                  $imgClass = 'ui centered rounded image';
                  $imgStyle = 'max-height:500px;';
                  include '../db/image.php';
                ?>
              </div>
							<div class="ui divider"></div>
							<div class="ui header f k r">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$goalScorer['name']?>">
									<?=$goalScorer['name']?>
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$goalScorer['country']?>">
									<i class="<?=strtolower($goalScorer['country'])?> flag"></i>
									<?=$goalScorer['country']?>
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$goalScorer['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $goalScorer['club'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = '';
                    include '../db/image.php';
                  ?>
									<?=$goalScorer['club']?>
								</a>
							</div>
							<div class="ui divider"></div>
							<div class="ui segment">
								<div class="ui active <?=$goalScorer['icon']?> progress">
									<div class="bar" style="width:<?=$goalScorer['ovr']+1?>%;">
										<div class="progress"><div class="ui meta f k r"><?=$goalScorer['type']?> <?=$goalScorer['ovr']?></div></div>
									</div>
									<div class="label f k r" style="color:black">OVR</div>
								</div>
								<div class="ui divider"></div>
								<h4 class="f k r">
									<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$goalScorer['season']?>">
										<?=$goalScorer['season'].'/'.substr($goalScorer['season']+1, 2, 4).' Season'?>
									</a>
								</h4>
								<div class="ui four statistics">
									<div class="statistic">
										<div class="value"><h2 class="f k r"><?=$goalScorerScore['countround']?></h2></div>
										<div class="label"><h5 class="f k r">경기</h5></div>
									</div>
									<div class="statistic">
										<div class="value">
											<h2 class="f k r">
                        <?=$goalScorerScore['avgrating'] > 99 ? '10.0' : substr($goalScorerScore['avgrating'], 0, 1).'.'.substr($goalScorerScore['avgrating'], 1, 1)?>
											</h2>
										</div>
										<div class="label"><h5 class="f k r">평점</h5></div>
									</div>
									<div class="statistic">
										<div class="value"><h2 class="f k r"><?=$goalScorerScore['sumgoal']?></h2></div>
										<div class="label"><h5 class="f k r">골</h5></div>
									</div>
									<div class="statistic">
										<div class="value"><h2 class="f k r"><?=$goalScorerScore['sumassist']?></h2></div>
										<div class="label"><h5 class="f k r">어시스트</h5></div>
									</div>
								</div>
								<div class="ui divider"></div>
								<div class="ui active progress" data-percent="100" style="display:flex;">
									<div class="bar" style="width:<?=$goalScorerOdds['winodds'] * 100?>%; background-color:#2ecc40;">
										<div class="progress"><?=$goalScorerOdds['win']?> 승</div>
									</div>
									<div class="bar" style="width:<?=$goalScorerOdds['drawodds'] * 100?>%; background-color:#ffe21f;">
										<div class="progress"><?=$goalScorerOdds['draw']?> 무</div>
									</div>
									<div class="bar" style="width:<?=$goalScorerOdds['loseodds'] * 100?>%; background-color:#ff695e;">
										<div class="progress"><?=$goalScorerOdds['lose']?> 패</div>
									</div>
									<div class="label f k r">승률 <?=floor($goalScorerOdds['winodds'] * 100)?>%</div>
								</div>
							</div>
							<div class="ui segment f k r">
								<div class="ui header f k r">
									<a class="link f k r" href="<?=$path?>/fifa/detail.php?role=Player&name=<?=$goalScorer['name']?>">
										Information
									</a>
								</div>
								<table class="ui center aligned table">
									<tr>
										<th>Birth</th>
										<td><?=$goalScorer['birth']?></td>
									</tr>
									<tr>
										<th>Physical</th>
										<td><?=$goalScorer['height'].' cm '.$goalScorer['weight'].' kg'?></td>
									</tr>
									<tr>
										<th>Position</th>
										<td><i class="dot circle outline <?=$goalScorer['icon']?> icon"></i><?=$goalScorer['position']?></td>
									</tr>
								</table>
							</div>
              <?php if ($goalScorer['history'] != null) : ?>
								<div class="ui segment f k r">
									<div class="ui header f k r">
										<a class="link f k r" href="<?=$path?>/fifa/award.php?role=Player&name=<?=$goalScorer['name']?>">
											History
										</a>
									</div>
									<div class="ui four statistics">
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$goalScorer['countchampion']?></h2></div>
											<div class="label"><h5 class="f k r">Champion</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$goalScorer['countballondor']?></h2></div>
											<div class="label"><h5 class="f k r">Ballon Dor</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$goalScorer['countgoalscorer']?></h2></div>
											<div class="label"><h5 class="f k r">Goal Scorer</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$goalScorer['countassistprovider']?></h2></div>
											<div class="label"><h5 class="f k r">Assist Provider</h5></div>
										</div>
									</div>
									<div class="ui segment f k r">
										<div class="ui middle aligned relaxed divided list">
                      <?php
                        $idx = 0;
                        $historySeason = '';
                        $historys = explode(',', $goalScorer['history']);
                        foreach ($historys as $history) : ;
                          if ($idx == 0 || $historySeason != substr($history, 0, 7)) :
                      ?>
													<div class="item">
														<h5 class="f k r">
															<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=substr($history, 0, 4)?>">
																<?=substr($history, 0, 7).' Season'?>
															</a>
														</h5>
                        <?php endif ?>
														<div>
															<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=<?=substr($history, 7, strlen($history)) != ' Legend League Champion' ? 'Player' : 'Club'?>&award=<?php
                                  switch (substr($history, 7, strlen($history))) {
                                    case ' Legend League Champion':echo 'champion';
                                      break;
                                    case ' Ballon Dor':
                                      echo 'ballondor';
                                      break;
                                    case ' Goal Scorer':
                                      echo 'goalscorer';
                                      break;
                                    case ' Assist Provider':
                                      echo 'assistprovider';
                                      break;
                                  }
                                ?>&season=<?=substr($history, 0, 4)?>">
																<?=substr($history, 7, strlen($history))?>
															</a>
														</div>
                            <?php
                              if ($idx == 0 || $historySeason != substr($history, 0, 7)) :
                                echo '</div>';
                              endif;
                              $historySeason = substr($history, 0, 7);
                              $idx++;
                            endforeach;
                            ?>
										</div>
									</div>
								</div>
              <?php endif; ?>
						</div>
					</div>
					<div class="five wide column">
						<div class="ui center aligned black segment">
							<h3 class="f k r">년도별 수상자</h3>
							<div class="ui divider"></div>
							<table class="ui striped center aligned table">
                <?php
                  while ($award = mysqli_fetch_assoc($goalScorerList)) :
                    if (!empty($award['name'])) :
                      if ($award['season'] == $season) :
                ?>
											<thead>
												<tr class="f k r">
													<th style="width:25%">
														<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=goalscorer&season=<?=$award['season']?>">
                              <?php
                                $imgRole = 'Player';
                                $imgName = $award['name'];
                                $imgClass = 'ui avatar image';
                                $imgStyle = '';
                                include '../db/image.php';
                              ?>
														</a>
													</th>
													<th>
														<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=goalscorer&season=<?=$award['season']?>">
															<?=$award['name']?>
														</a>
													</th>
													<th>
														<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$award['season']?>">
															<?=$award['season'].'/'.substr($award['season']+1, 2, 4)?>
														</a>
													</th>
												</tr>
											</thead>
                    <?php else : ?>
											<tr>
												<td style="width:25%">
													<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=goalscorer&season=<?=$award['season']?>">
                            <?php
                              $imgRole = 'Player';
                              $imgName = $award['name'];
                              $imgClass = 'ui avatar image';
                              $imgStyle = '';
                              include '../db/image.php';
                            ?>
													</a>
												</td>
												<td>
													<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=goalscorer&season=<?=$award['season']?>">
														<?=$award['name']?>
													</a>
												</td>
												<td>
													<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$award['season']?>">
														<?=$award['season'].'/'.substr($award['season']+1, 2, 4)?>
													</a>
												</td>
											</tr>
                <?php
                      endif;
                    endif;
                  endwhile;
                ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="ui tab segment <?=$awardname == 'assistprovider' ? 'active' : ''?>" data-tab="assistprovider">
				<div class="ui grid">
					<div class="eleven wide column">
						<div class="ui center aligned black segment">
							<div class="content">
								<h3 class="f k r">Assist Provider</h3>
								<div class="ui divider"></div>
							</div>
							<div>
                <?php
                  $imgRole = 'Player';
                  $imgName = $assistProvider['name'];
                  $imgClass = 'ui centered rounded image';
                  $imgStyle = 'max-height:500px;';
                  include '../db/image.php';
                ?>
              </div>
							<div class="ui divider"></div>
							<div class="ui header f k r">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Player&name=<?=$assistProvider['name']?>">
									<?=$assistProvider['name']?>
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="<?=$path?>/fifa/country.php?country=<?=$assistProvider['country']?>">
									<i class="<?=strtolower($assistProvider['country'])?> flag"></i>
									<?=$assistProvider['country']?>
								</a>
							</div>
							<div class="ui meta f k r">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$assistProvider['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $assistProvider['club'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = '';
                    include '../db/image.php';
                  ?>
									<?=$assistProvider['club']?>
								</a>
							</div>
							<div class="ui divider"></div>
							<div class="ui segment">
								<div class="ui active <?=$assistProvider['icon']?> progress">
									<div class="bar" style="width:<?=$assistProvider['ovr']+1?>%;">
										<div class="progress"><div class="ui meta f k r"><?=$assistProvider['type']?> <?=$assistProvider['ovr']?></div></div>
									</div>
									<div class="label f k r" style="color:black">OVR</div>
								</div>
								<div class="ui divider"></div>
								<h4 class="f k r">
									<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$assistProvider['season']?>">
										<?=$assistProvider['season'].'/'.substr($assistProvider['season']+1, 2, 4).' Season'?>
									</a>
								</h4>
								<div class="ui four statistics">
									<div class="statistic">
										<div class="value"><h2 class="f k r"><?=$assistProviderScore['countround']?></h2></div>
										<div class="label"><h5 class="f k r">경기</h5></div>
									</div>
									<div class="statistic">
										<div class="value">
											<h2 class="f k r">
                        <?=$assistProviderScore['avgrating'] > 99 ? '10.0' : substr($assistProviderScore['avgrating'], 0, 1).'.'.substr($assistProviderScore['avgrating'], 1, 1)?>
											</h2>
										</div>
										<div class="label"><h5 class="f k r">평점</h5></div>
									</div>
									<div class="statistic">
										<div class="value"><h2 class="f k r"><?=$assistProviderScore['sumgoal']?></h2></div>
										<div class="label"><h5 class="f k r">골</h5></div>
									</div>
									<div class="statistic">
										<div class="value"><h2 class="f k r"><?=$assistProviderScore['sumassist']?></h2></div>
										<div class="label"><h5 class="f k r">어시스트</h5></div>
									</div>
								</div>
								<div class="ui divider"></div>
								<div class="ui active progress" data-percent="100" style="display:flex;">
									<div class="bar" style="width:<?=$assistProviderOdds['winodds'] * 100?>%; background-color:#2ecc40;">
										<div class="progress"><?=$assistProviderOdds['win']?> 승</div>
									</div>
									<div class="bar" style="width:<?=$assistProviderOdds['drawodds'] * 100?>%; background-color:#ffe21f;">
										<div class="progress"><?=$assistProviderOdds['draw']?> 무</div>
									</div>
									<div class="bar" style="width:<?=$assistProviderOdds['loseodds'] * 100?>%; background-color:#ff695e;">
										<div class="progress"><?=$assistProviderOdds['lose']?> 패</div>
									</div>
									<div class="label f k r">승률 <?=floor($assistProviderOdds['winodds'] * 100)?>%</div>
								</div>
							</div>
							<div class="ui segment f k r">
								<div class="ui header f k r">
									<a class="link f k r" href="<?=$path?>/fifa/detail.php?role=Player&name=<?=$assistProvider['name']?>">
										Information
									</a>
								</div>
								<table class="ui center aligned table">
									<tr>
										<th>Birth</th>
										<td><?=$assistProvider['birth']?></td>
									</tr>
									<tr>
										<th>Physical</th>
										<td><?=$assistProvider['height'].' cm '.$assistProvider['weight'].' kg'?></td>
									</tr>
									<tr>
										<th>Position</th>
										<td><i class="dot circle outline <?=$assistProvider['icon']?> icon"></i><?=$assistProvider['position']?></td>
									</tr>
								</table>
							</div>
              <?php if ($assistProvider['history'] != null) : ?>
								<div class="ui segment f k r">
									<div class="ui header f k r">
										<a class="link f k r" href="<?=$path?>/fifa/award.php?role=Player&name=<?=$assistProvider['name']?>">
											History
										</a>
									</div>
									<div class="ui four statistics">
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$assistProvider['countchampion']?></h2></div>
											<div class="label"><h5 class="f k r">Champion</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$assistProvider['countballondor']?></h2></div>
											<div class="label"><h5 class="f k r">Ballon Dor</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$assistProvider['countgoalscorer']?></h2></div>
											<div class="label"><h5 class="f k r">Goal Scorer</h5></div>
										</div>
										<div class="statistic">
											<div class="value"><h2 class="f k r"><?=$assistProvider['countassistprovider']?></h2></div>
											<div class="label"><h5 class="f k r">Assist Provider</h5></div>
										</div>
									</div>
									<div class="ui segment f k r">
										<div class="ui middle aligned relaxed divided list">
                      <?php
                        $idx = 0;
                        $historySeason = '';
                        $historys = explode(',', $assistProvider['history']);
                        foreach ($historys as $history) : ;
                          if ($idx == 0 || $historySeason != substr($history, 0, 7)) :
                      ?>
													<div class="item">
														<h5 class="f k r">
															<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=substr($history, 0, 4)?>">
																<?=substr($history, 0, 7).' Season'?>
															</a>
														</h5>
                        <?php endif ?>
														<div>
															<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=<?=substr($history, 7, strlen($history)) != ' Legend League Champion' ? 'Player' : 'Club'?>&award=<?php
                                  switch (substr($history, 7, strlen($history))) {
                                    case ' Legend League Champion':echo 'champion';
                                      break;
                                    case ' Ballon Dor':
                                      echo 'ballondor';
                                      break;
                                    case ' Goal Scorer':
                                      echo 'goalscorer';
                                      break;
                                    case ' Assist Provider':
                                      echo 'assistprovider';
                                      break;
                                  }
                                ?>&season=<?=substr($history, 0, 4)?>">
																<?=substr($history, 7, strlen($history))?>
															</a>
														</div>
                            <?php
                              if ($idx == 0 || $historySeason != substr($history, 0, 7)) :
                                echo '</div>';
                              endif;
                              $historySeason = substr($history, 0, 7);
                              $idx++;
                            endforeach;
                            ?>
										</div>
									</div>
								</div>
              <?php endif; ?>
						</div>
					</div>
					<div class="five wide column">
						<div class="ui center aligned black segment">
							<h3 class="f k r">년도별 수상자</h3>
							<div class="ui divider"></div>
							<table class="ui striped center aligned table">
                <?php
                  while ($award = mysqli_fetch_assoc($assistProviderList)) :
                    if (!empty($award['name'])) :
                      if ($award['season'] == $season) :
                ?>
											<thead>
												<tr class="f k r">
													<th style="width:25%">
														<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=assistprovider&season=<?=$award['season']?>">
                              <?php
                                $imgRole = 'Player';
                                $imgName = $award['name'];
                                $imgClass = 'ui avatar image';
                                $imgStyle = '';
                                include '../db/image.php';
                              ?>
														</a>
													</th>
													<th>
														<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=assistprovider&season=<?=$award['season']?>">
															<?=$award['name']?>
														</a>
													</th>
													<th>
														<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$award['season']?>">
															<?=$award['season'].'/'.substr($award['season']+1, 2, 4)?>
														</a>
													</th>
												</tr>
											</thead>
                    <?php else : ?>
											<tr>
												<td style="width:25%">
													<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=assistprovider&season=<?=$award['season']?>">
                            <?php
                              $imgRole = 'Player';
                              $imgName = $award['name'];
                              $imgClass = 'ui avatar image';
                              $imgStyle = '';
                              include '../db/image.php';
                            ?>
													</a>
												</td>
												<td>
													<a class="link f k r" href="<?=$path?>/fifa/awards.php?role=Player&award=assistprovider&season=<?=$award['season']?>">
														<?=$award['name']?>
													</a>
												</td>
												<td>
													<a class="link f k r" href="<?=$path?>/league/review.php?season=<?=$award['season']?>">
														<?=$award['season'].'/'.substr($award['season']+1, 2, 4)?>
													</a>
												</td>
											</tr>
                <?php
                      endif;
                    endif;
                  endwhile;
                ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
  <?php endif; ?>
</section>
<script>
$(function(){
	var role = '<?=$role?>'
	if (role == 'Club'){
		$('.rail.item.awards.club').addClass('active')
	}
	if (role == 'Manager'){
		$('.rail.item.awards.manager').addClass('active')
	}
	if (role == 'Player'){
		$('.rail.item.awards.player').addClass('active')
	}
})
</script>
<?php include '../include/footer.php';?>
