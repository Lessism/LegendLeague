<?php include '../db/league/match.php';?>
<?php include '../include/header.php';?>
<section class="ui black segment container">
<?php
  $rail = 'league';
  include '../include/rail.php';
?>
	<h1 class="f k r" style="margin-top:24px">
		<a class="link f k r" href="<?=$path?>/leageu/league.php">
			Legend League
		</a>
	</h1>
	<h4 class="f k r"><?=$leagueSeason['season'].'/'.substr($leagueSeason['season']+1, 2, 4)?> Season Match</h4>
	<div class="ui divider"></div>
	<div class="ui black segment">
		<div class="ui center aligned container"><h3 class="f k r">경기 일정</h3></div>
		<div class="ui divider"></div>
    <?php if (empty($nowRound['round'])) : ?>
			<div class="ui center aligned container f k r">지금은 Free Season 입니다.</div>
    <?php
      else :
        $index = 0;
        for ($i = 0; $i < $maxRound['round']; $i += 10) : ?>
				<div class="ui tabular ten item menu">
          <?php for ($ii = 1; $ii < 10; $ii++) : ?>
            <?php if ($maxRound['round'] >= $index+$ii) : ?>
  						<a class="tabular item f k r <?=$nowRound['round'] == $index+$ii ? 'active' : ''?>" data-tab="round<?=$index+$ii?>"><?=$index+$ii?> Round</a>
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
						<div class="ui center aligned black segment tab <?=$nowRound['round'] == $match['match']['round'] ? 'active' : ''?>" data-tab="round<?=$match['match']['round']?>">
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
</section>
<?php include '../include/footer.php';?>
