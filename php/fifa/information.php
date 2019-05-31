<?php include '../db/fifa/information.php';?>
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
    <?=$role?> Imformation
	</h4>
	<div class="ui divider"></div>
  <?php if ($role == 'Club') : ?>
		<div class="ui grid">
			<div class="eleven wide column">
				<div class="ui black segment">
					<div class="ui center aligned header f k r">
						<h2>
							<a class="link f k r" href="">
								FIFA Club Ranking
							</a>
						</h2>
					</div>
					<div class="ui divider"></div>
          <?php $ranking = mysqli_fetch_assoc($rank); ?>
					<div class="ui center aligned segment item">
						<a class="image" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$ranking['name']?>">
              <?php
                $imgRole = $role;
                $imgName = $ranking['name'];
                $imgClass = '';
                $imgStyle = 'max-width:250px; max-height:250px; border-radius:10px;';
                include '../db/image.php';
              ?>
						</a>
						<div class="ui divider"></div>
						<div class="middle aligned content">
							<div class="header">
								<h3 class="f k r">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$ranking['name']?>">
										<?=$ranking['name']?>
									</a>
								</h3>
							</div>
							<div class="meta">
								<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$ranking['name']?>">
                  <?php
                    $imgRole = 'Stadium';
                    $imgName = $ranking['stadium'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = 'max-width:20px; max-height:20px;';
                    include '../db/image.php';
                  ?>
									<?=$ranking['stadium']?>
								</a>
							</div>
							<div class="description">
								<div class="ui active inverted black progress"style="margin-top:10px;">
									<div class="bar" style="width:<?=$ranking['ovr']+1?>%;">
										<div class="progress f k r">
											OVR <i class="dot circle outline white icon"></i><?=$ranking['ovr']?>
										</div>
									</div>
									<div class="label f k r" style="color:black">
										Rankpoint <i class="futbol icon"></i> <?=$ranking['rankpoint']?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ui middle aligned divided list">
            <?php while ($ranking = mysqli_fetch_assoc($rank)) : ?>
							<div class="item" style="vertical-align:middle;">
                <?php
                  $imgRole = $role;
                  $imgName = $ranking['name'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = '';
                  include '../db/image.php';
                ?>
								<div class="content">
									<div class="header">
										<h5 class="f k r">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$ranking['name']?>">
												<?=$ranking['name']?>
											</a>
										</h5>
									</div>
									<div class="meta">
										<a class="link f k r" href="<?=$path?>/fifa/stadium.php?role=Club&name=<?=$ranking['name']?>">
                      <?php
                        $imgRole = 'Stadium';
                        $imgName = $ranking['stadium'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = 'max-width:20px; max-height:20px;';
                        include '../db/image.php';
                      ?>
											<?=$ranking['stadium']?>
										</a>
									</div>
								</div>
								<div class="right floated content">
									<h5 class="f k r">
										<i class="futbol icon"></i><?=$ranking['rankpoint']?>
									</h5>
								</div>
							</div>
            <?php endwhile ?>
					</div>
				</div>
			</div>
			<div class="five wide column">
				<div class="ui center aligned black segment">
					<h3 class="f k r">
						<a class="link f k r" href="<?=$path?>/league/award.php?award=champion">
							최다 우승
						</a>
					</h3>
					<div class="ui divider"></div>
          <?php $rankingTitle = mysqli_fetch_assoc($rankTitle) ?>
					<table class="ui center aligned table">
						<thead>
							<tr class="f k r">
								<th style="width:15%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingTitle['name']?>">
                    <?php
                      $imgRole = 'Club';
                      $imgName = $rankingTitle['name'];
                      $imgClass = 'ui rounded fluid image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
									</a>
								</th>
								<th style="width:60%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingTitle['name']?>">
										<?=$rankingTitle['name']?>
									</a>
								</th>
								<th style="width:25%">
									<a class="link f k r" href="<?=$path?>/league/award.php?award=champion">
										<?=$rankingTitle['countawards']?> 회
									</a>
								</th>
							</tr>
						</thead>
						<tbody>
              <?php
                for ($i = 0; $i < 3; $i++) : ;
                  $rankingTitle = mysqli_fetch_assoc($rankTitle);
              ?>
								<tr>
									<td style="width:15%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingTitle['name']?>">
                      <?php
                        $imgRole = 'Club';
                        $imgName = $rankingTitle['name'];
                        $imgClass = 'ui rounded fluid image';
                        $imgStyle = '';
                        include '../db/image.php';
                      ?>
										</a>
									</td>
									<td style="width:60%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingTitle['name']?>">
											<?=$rankingTitle['name']?>
										</a>
									</td>
									<td style="width:25%">
										<a class="link f k r" href="<?=$path?>/league/award.php?award=champion">
											<?=$rankingTitle['countawards']?> 회
										</a>
									</td>
								</tr>
              <?php endfor ?>
						</tbody>
					</table>
				</div>
				<div class="ui center aligned black segment">
          <?php $rankingOld = mysqli_fetch_assoc($rankOld) ?>
					<h3 class="f k r">
						<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingOld['name']?>">
							명문 구단
						</a>
					</h3>
					<div class="ui divider"></div>
					<table class="ui center aligned table">
						<thead>
							<tr class="f k r">
								<th style="width:75%" colspan="2">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingOld['name']?>">
										구단
									</a>
								</th>
								<th style="width:25%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingOld['name']?>">
										창단
									</a>
								</th>
							</tr>
						</thead>
						<tbody>
              <?php
                for ($i = 0; $i < 3; $i++) : ;
                  if ($i != 0) {
                    $rankingOld = mysqli_fetch_assoc($rankOld);
                  };
              ?>
								<tr>
									<td style="width:15%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingOld['name']?>">
                      <?php
                        $imgRole = 'Club';
                        $imgName = $rankingOld['name'];
                        $imgClass = 'ui rounded fluid image';
                        $imgStyle = '';
                        include '../db/image.php';
                      ?>
										</a>
									</td>
									<td style="width:60%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingOld['name']?>">
											<?=$rankingOld['name']?>
										</a>
									</td>
									<td style="width:25%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingOld['name']?>">
											<?=substr($rankingOld['regdate'], 0, 4)?>년
										</a>
									</td>
								</tr>
              <?php endfor ?>
						</tbody>
					</table>
				</div>
				<div class="ui center aligned black segment">
          <?php $rankingNew = mysqli_fetch_assoc($rankNew); ?>
					<h3 class="f k r">
						<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingNew['name']?>">
							신생 구단
						</a>
					</h3>
					<div class="ui divider"></div>
					<table class="ui center aligned table">
						<thead>
							<tr class="f k r">
								<th style="width:75%" colspan="2">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingNew['name']?>">
										구단
									</a>
								</th>
								<th style="width:25%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingNew['name']?>">
										창단
									</a>
								</th>
							</tr>
						</thead>
						<tbody>
              <?php
                $i = 0;
                mysqli_data_seek($rankNew, 0);
                while ($rankingNew = mysqli_fetch_assoc($rankNew)) :
                  if ($i < 3) :
              ?>
								<tr>
									<td style="width:15%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingNew['name']?>">
                      <?php
                        $imgRole = 'Club';
                        $imgName = $rankingNew['name'];
                        $imgClass = 'ui rounded fluid image';
                        $imgStyle = '';
                        include '../db/image.php';
                      ?>
										</a>
									</td>
									<td style="width:60%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingNew['name']?>">
											<?=$rankingNew['name']?>
										</a>
									</td>
									<td style="width:25%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$rankingNew['name']?>">
											<?=substr($rankingNew['regdate'], 0, 4)?>년
										</a>
									</td>
								</tr>
              <?php
                  $i++;
                  endif;
                endwhile;
              ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
  <?php else : ?>
		<div class="ui grid">
			<div class="eleven wide column">
				<div class="ui black segment">
          <?php $ranking = mysqli_fetch_assoc($rank); ?>
					<div class="ui center aligned header f k r">
						<h2>
							<a class="link f k r" href="">
								FIFA <?=empty($type) ? $role : $ranking['fulltype']?> Ranking
							</a>
						</h2>
					</div>
					<div class="ui divider"></div>
					<div class="ui center aligned segment item">
						<a class="image" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$ranking['name']?>">
              <?php
                $imgRole = $role;
                $imgName = $ranking['name'];
                $imgClass = '';
                $imgStyle = 'max-width:250px; max-height:250px; border-radius:10px;';
                include '../db/image.php';
              ?>
						</a>
						<div class="ui divider"></div>
						<div class="middle aligned content">
							<div class="header">
								<h3 class="f k r">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$ranking['name']?>">
										<?=$ranking['name']?>
									</a>
								</h3>
							</div>
							<div class="meta">
								<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$ranking['club']?>">
                  <?php
                    $imgRole = 'Club';
                    $imgName = $ranking['club'];
                    $imgClass = 'ui avatar image';
                    $imgStyle = 'max-width:20px; max-height:20px;';
                    include '../db/image.php';
                  ?>
									<?=$ranking['club']?>
								</a>
							</div>
							<div class="description">
								<div class="ui active inverted <?=$role == 'Manager' ? 'black' : $ranking['icon']?> progress"style="margin-top:10px;">
									<div class="bar" style="width:<?=$ranking['ovr']+1?>%;">
										<div class="progress f k r"  style="color:<?=$role == 'Player' ? 'black' : ''?>">
                      <?php if ($role == 'Player') : ?>
  											<?=$ranking['position']?><i class="dot circle outline <?=$ranking['icon']?> icon"></i>
                      <?php else : ?>
  											OVR <i class="dot circle outline white icon"></i>
                      <?php endif; ?>
											  <?=$ranking['ovr']?>
										</div>
									</div>
									<div class="label f k r" style="color:black">
										Rankpoint <i class="futbol icon"></i> <?=$ranking['rankpoint']?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ui middle aligned divided list">
            <?php while ($ranking = mysqli_fetch_assoc($rank)) : ?>
							<div class="item" style="vertical-align:middle;">
                <?php
                  $imgRole = $role;
                  $imgName = $ranking['name'];
                  $imgClass = 'ui avatar image';
                  $imgStyle = '';
                  include '../db/image.php';
                ?>
								<div class="content">
									<div class="header">
										<h5 class="f k r">
											<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$ranking['name']?>">
												<?=$ranking['name']?>
											</a>
										</h5>
									</div>
									<div class="meta">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=Club&name=<?=$ranking['club']?>">
                      <?php
                        $imgRole = 'Club';
                        $imgName = $ranking['club'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = 'max-width:20px; max-height:20px;';
                        include '../db/image.php';
                      ?>
											<?=$ranking['club']?>
										</a>
									</div>
								</div>
								<div class="right floated content">
									<h5 class="f k r">
										<i class="futbol icon"></i>
										<?=$ranking['rankpoint']?>
									</h5>
								</div>
							</div>
            <?php endwhile ?>
					</div>
				</div>
			</div>
			<div class="five wide column">
      <?php if (mysqli_num_rows($rankTitle) > 0) : ?>
				<div class="ui center aligned black segment">
					<h3 class="f k r">
						<a class="link f k r" href="<?=$path?>/league/award.php?award=<?=$role == 'Manager' ? 'manager' : 'ballondor'?>">
							최다 수상
						</a>
					</h3>
					<div class="ui divider"></div>
          <?php $rankingTitle = mysqli_fetch_assoc($rankTitle) ?>
					<table class="ui center aligned table">
						<thead>
							<tr class="f k r">
								<th style="width:15%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingTitle['name']?>">
                    <?php
                      $imgRole = $role;
                      $imgName = $rankingTitle['name'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
									</a>
								</th>
								<th style="width:60%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingTitle['name']?>">
										<?=$rankingTitle['name']?>
									</a>
								</th>
								<th style="width:25%">
                  <?php if ($role == 'Manager') : ?>
  									<a class="link f k r" href="<?=$path?>/league/award.php?award=manager">
  										<?=$rankingTitle['countawards']?> 회
  									</a>
                  <?php else : ?>
  									<a class="link f k r" href="<?=$path?>/league/award.php?award=ballondor">
  										<?=$rankingTitle['countawards']?> 회
  									</a>
                  <?php endif; ?>
								</th>
							</tr>
						</thead>
						<tbody>
              <?php
                $i = 0;
                mysqli_data_seek($rankTitle, 1);
                while ($rankingTitle = mysqli_fetch_assoc($rankTitle)) :
                  if ($i < 3) :
              ?>
								<tr>
									<td style="width:15%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingTitle['name']?>">
                      <?php
                        $imgRole = $role;
                        $imgName = $rankingTitle['name'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = '';
                        include '../db/image.php';
                      ?>
										</a>
									</td>
									<td style="width:60%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingTitle['name']?>">
											<?=$rankingTitle['name']?>
										</a>
									</td>
									<td style="width:25%">
										<a class="link f k r" href="<?=$path?>/league/award.php?award=<?=$role == 'Manager' ? 'manager' : 'ballondor'?>">
											<?=$rankingTitle['countawards']?> 회
										</a>
									</td>
								</tr>
            <?php
                $i++;
                endif;
              endwhile;
            ?>
						</tbody>
					</table>
				</div>
      <?php endif ?>
				<div class="ui center aligned black segment">
          <?php $rankingOld = mysqli_fetch_assoc($rankOld); ?>
					<h3 class="f k r">
						<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingOld['name']?>">
							최고령 <?=$role == 'Manager' ? '감독' : '선수'?>
						</a>
					</h3>
					<div class="ui divider"></div>
					<table class="ui center aligned table">
						<thead>
							<tr class="f k r">
								<th style="width:75%" colspan="2">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingOld['name']?>">
										<?=$role == 'Manager' ? '감독' : '선수'?>
									</a>
								</th>
								<th style="width:25%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingOld['name']?>">
										나이
									</a>
								</th>
							</tr>
						</thead>
						<tbody>
              <?php
                $i = 0;
                mysqli_data_seek($rankOld, 0);
                while ($rankingOld = mysqli_fetch_assoc($rankOld)) : ;
                  if ($i < 3) : ;
              ?>
								<tr>
									<td style="width:15%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingOld['name']?>">
                      <?php
                        $imgRole = $role;
                        $imgName = $rankingOld['name'];
                        $imgClass = 'ui avatar image';
                        $imgStyle = '';
                        include '../db/image.php';
                      ?>
										</a>
									</td>
									<td style="width:60%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingOld['name']?>">
											<?=$rankingOld['name']?>
										</a>
									</td>
									<td style="width:25%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingOld['name']?>">
											<?=explode('.', $rankingOld['age'])[0]?> 살
										</a>
									</td>
								</tr>
          <?php
              $i++;
              endif;
            endwhile;
          ?>
						</tbody>
					</table>
				</div>
				<div class="ui center aligned black segment">
          <?php $rankingNew = mysqli_fetch_assoc($rankNew); ?>
					<h3 class="f k r">
						<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingNew['name']?>">
							최연소 <?=$role == 'Manager' ? '감독' : '선수'?>
						</a>
					</h3>
					<div class="ui divider"></div>
					<table class="ui center aligned table">
						<thead>
							<tr class="f k r">
								<th style="width:75%" colspan="2">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingNew['name']?>">
										<?=$role == 'Manager' ? '감독' : '선수'?>
									</a>
								</th>
								<th style="width:25%">
									<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingNew['name']?>">
										나이
									</a>
								</th>
							</tr>
						</thead>
						<tbody>
              <?php
                $i = 0;
                mysqli_data_seek($rankNew, 0);
                while ($rankingNew = mysqli_fetch_assoc($rankNew)) : ;
                  if ($i < 3) : ;
              ?>
								<tr>
									<td style="width:15%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingNew['name']?>">
                    <?php
                      $imgRole = $role;
                      $imgName = $rankingNew['name'];
                      $imgClass = 'ui avatar image';
                      $imgStyle = '';
                      include '../db/image.php';
                    ?>
										</a>
									</td>
									<td style="width:60%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingNew['name']?>">
											<?=$rankingNew['name']?>
										</a>
									</td>
									<td style="width:25%">
										<a class="link f k r" href="<?=$path?>/fifa/profile.php?role=<?=$role?>&name=<?=$rankingNew['name']?>">
											<?=explode('.', $rankingNew['age'])[0]?> 살
										</a>
									</td>
								</tr>
              <?php
                  $i++;
                  endif;
                endwhile;
              ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
  <?php endif; ?>
</section>
<?php include '../include/footer.php';?>
