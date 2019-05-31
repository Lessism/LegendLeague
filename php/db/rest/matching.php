<?php
  include '../db.php';

  $season = $_POST['season'];
  $round = $_POST['round'];

  $sql = "
		SELECT
			*
		FROM
			Round
		WHERE
			season	= {$season} AND
			round	= {$round}
  ";
  $match = mysqli_query($db, $sql);

  while ($matching = mysqli_fetch_assoc($match)){

    $homeTeam = explode('_', $matching['versus'])[0];
    $sql = "
  		SELECT
  			*
  		FROM
  			Manager
  		WHERE
  			club = '{$homeTeam}'
    ";
    $homeManager = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*
  		FROM
  			Player
  		WHERE
  			club = '{$homeTeam}'
    ";
    $homeLineup = mysqli_query($db, $sql);

    $awayTeam = explode('_', $matching['versus'])[1];
    $sql = "
  		SELECT
  			*
  		FROM
  			Manager
  		WHERE
  			club = '{$awayTeam}'
    ";
    $awayManager = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*
  		FROM
  			Player
  		WHERE
  			club = '{$awayTeam}'
    ";
    $awayLineup = mysqli_query($db, $sql);

    $homeScore = 0;
    $awayScore = 0;
    $roundHomeLineup = "home:";
    $roundAwayLineup = "away:";

    for ($i = 0; $i < 11; $i++){

      $homePlayer = mysqli_fetch_assoc($homeLineup);
      $awayPlayer = mysqli_fetch_assoc($awayLineup);

      $homeRating = 50 + rand(0, 9);
      $awayRating = 50 + rand(0, 9);
      $homeGoal = 0;
      $awayGoal = 0;
      $homeAssist = 0;
      $awayAssist = 0;
      $roundHomeLineup .= $homePlayer['name'].',';
      $roundAwayLineup .= $awayPlayer['name'].',';

      if (rand(0, 25) < $homePlayer['ovr'] * 2 - $awayPlayer['ovr'] - $awayManager['ovr']){
        if ($homePlayer['position'] != 'GK'){
          $homeScore += 1;
          $homeGoal += 1;
          $homeRating += 20;
          $chk = rand(0, 11);
          if ($homeScore > $homeGoal && $chk > 5){
            $homeAssist += 1;
            $homeRating += 10;
          }
        }
      } else {
        $awayRating += 20 + rand(0, 9);
      }
      if (rand(0, 50) < $awayPlayer['ovr'] * 2 - $homePlayer['ovr'] - $homeManager['ovr']){
        if ($awayPlayer['position'] != 'GK'){
          $awayScore += 1;
          $awayGoal += 1;
          $awayRating += 20;
          $chk = rand(0, 11);
          if ($awayScore > $awayGoal && $chk > 5){
            $awayAssist += 1;
            $awayRating += 10;
          }
        }
      } else {
        $homeRating += 20 + rand(0, 9);
      }

      $sql = "
    		INSERT
    			INTO Score (
    				season,
    				round,
    				club,
    				manager,
    				player,
    				rating,
    				goal,
    				assist,
    				opponent
    			)
    			VALUES (
    				{$season},
    				{$round},
    				'{$homeTeam}',
    				'{$homeManager['name']}',
    				'{$homePlayer['name']}',
    				{$homeRating},
    				{$homeGoal},
    				{$homeAssist},
    				'{$awayTeam}'
    			)
      ";
      mysqli_query($db, $sql);

      $sql = "
    		INSERT
    			INTO Score (
    				season,
    				round,
    				club,
    				manager,
    				player,
    				rating,
    				goal,
    				assist,
    				opponent
    			)
    			VALUES (
    				{$season},
    				{$round},
    				'{$awayTeam}',
    				'{$awayManager['name']}',
    				'{$awayPlayer['name']}',
    				{$awayRating},
    				{$awayGoal},
    				{$awayAssist},
    				'{$homeTeam}'
    			)
      ";
      mysqli_query($db, $sql);
    }
    $sql = "
  		UPDATE
  			Round
  		SET
  			lineup = '{$roundHomeLineup}_{$roundAwayLineup}',
  			score  = '{$homeScore} : {$awayScore}'
  		WHERE
  			season = {$season}	AND
  			round  = {$round}	AND
  			versus = '{$matching['versus']}'
    ";
    mysqli_query($db, $sql);

    $homeWin = 0;
    $homeDraw = 0;
    $homeLose = 0;
    $awayWin = 0;
    $awayDraw = 0;
    $awayLose = 0;

    if ($homeScore > $awayScore){
      $homeWin = 1;
      $awayLose = 1;
    }
    if ($homeScore < $awayScore){
      $homeLose = 1;
      $awayWin = 1;
    }
    if ($homeScore == $awayScore){
      $homeDraw = 1;
      $awayDraw = 1;
    }

    $sql = "
  		UPDATE
  			Ranking
  		SET
  			game	= 	{$round},
  			win 	= 	( SELECT * FROM (
  							SELECT
  								win
  							FROM
  								Ranking
  							WHERE
  								season	= {$season}	AND
  								round	= {$round}	AND
  								club	= '{$homeTeam}'
  						) AS win ) + {$homeWin},
  			draw	=	( SELECT * FROM (
  							SELECT
  								draw
  							FROM
  								Ranking
  							WHERE
  								season	= {$season}	AND
  								round	= {$round}	AND
  								club	= '{$homeTeam}'
  						) AS draw ) + {$homeDraw},
  			lose	=	( SELECT * FROM (
  							SELECT
  								lose
  							FROM
  								Ranking
  							WHERE
  								season	= {$season}	AND
  								round	= {$round}	AND
  								club	= '{$homeTeam}'
  						) AS lose ) + {$homeLose},
  			goalfor	=	( SELECT * FROM (
  							SELECT
  								goalfor
  							FROM
  								Ranking
  							WHERE
  								season	= {$season}	AND
  								round	= {$round}	AND
  								club	= '{$homeTeam}'
  						) AS goalfor ) + {$homeScore},
  			goalagainst	=	( SELECT * FROM (
  							SELECT
  								goalagainst
  							FROM
  								Ranking
  							WHERE
  								season	= {$season}	AND
  								round	= {$round}	AND
  								club	= '{$homeTeam}'
  						) AS goalagainst ) + {$awayScore}
  		WHERE
  			season	= {$season}	AND
  			round	= {$round}	AND
  			club	= '{$homeTeam}';

  		UPDATE
  			Ranking
  		SET
  			point =
  				(SELECT wd.win * 3 + wd.draw FROM
  					(
  						SELECT
  							win, draw
  						FROM
  							Ranking
  						WHERE
  							season	= {$season}	AND
  							round	= {$round}	AND
  							club	= '{$homeTeam}'
  					) AS wd
  				)
  		WHERE
  			season	= {$season}	AND
  			round	= {$round}	AND
  			club	= '{$homeTeam}'
    ";

    mysqli_multi_query($db, $sql);
    while (mysqli_next_result ($db)) {;}

    $sql = "
  		UPDATE
  			Ranking
  		SET
  			game	= 	{$round},
  			win 	= 	( SELECT * FROM (
  							SELECT
  								win
  							FROM
  								Ranking
  							WHERE
  								season	= {$season}	AND
  								round	= {$round}	AND
  								club	= '{$awayTeam}'
  						) AS win ) + {$awayWin},
  			draw	=	( SELECT * FROM (
  							SELECT
  								draw
  							FROM
  								Ranking
  							WHERE
  								season	= {$season}	AND
  								round	= {$round}	AND
  								club	= '{$awayTeam}'
  						) AS draw ) + {$awayDraw},
  			lose	=	( SELECT * FROM (
  							SELECT
  								lose
  							FROM
  								Ranking
  							WHERE
  								season	= {$season}	AND
  								round	= {$round}	AND
  								club	= '{$awayTeam}'
  						) AS lose ) + {$awayLose},
  			goalfor	=	( SELECT * FROM (
  							SELECT
  								goalfor
  							FROM
  								Ranking
  							WHERE
  								season	= {$season}	AND
  								round	= {$round}	AND
  								club	= '{$awayTeam}'
  						) AS goalfor ) + {$awayScore},
  			goalagainst	=	( SELECT * FROM (
  							SELECT
  								goalagainst
  							FROM
  								Ranking
  							WHERE
  								season	= {$season}	AND
  								round	= {$round}	AND
  								club	= '{$awayTeam}'
  						) AS goalagainst ) + {$homeScore}
  		WHERE
  			season	= {$season}	AND
  			round	= {$round}	AND
  			club	= '{$awayTeam}';

  		UPDATE
  			Ranking
  		SET
  			point =
  				(SELECT wd.win * 3 + wd.draw FROM
  					(
  						SELECT
  							win, draw
  						FROM
  							Ranking
  						WHERE
  							season	= {$season}	AND
  							round	= {$round}	AND
  							club	= '{$awayTeam}'
  					) AS wd
  				)
  		WHERE
  			season	= {$season}	AND
  			round	= {$round}	AND
  			club	= '{$awayTeam}'
    ";

    mysqli_multi_query($db, $sql);
    while (mysqli_next_result ($db)) {;}

    $sql = "
  		SELECT
  			SUM(game = ( SELECT * FROM (
  							SELECT
  								MAX(round)
  							FROM
  								Round
  							WHERE
  								season = {$season}
  						) AS round )
  			) AS chk
  		FROM
  			Ranking
  		WHERE
  			season	= {$season} AND
  		  round	= {$round} AND
  			club = '{$homeTeam}'
    ";
    $rankCheck = mysqli_fetch_assoc(mysqli_query($db, $sql));

    if ($rankCheck['chk'] < 1){
      $sql = "
    		UPDATE
    			Ranking
    		SET
    			game		= 	{$round},
    			win 		= 	( SELECT * FROM (
    							SELECT
    								win
    							FROM
    								Ranking
    							WHERE
    								season	= {$season}	AND
    								round	= {$round}	AND
    								club	= '{$homeTeam}'
    						) AS win ),
    			draw		=	( SELECT * FROM (
    							SELECT
    								draw
    							FROM
    								Ranking
    							WHERE
    								season	= {$season}	AND
    								round	= {$round}	AND
    								club	= '{$homeTeam}'
    						) AS draw ),
    			lose		=	( SELECT * FROM (
    							SELECT
    								lose
    							FROM
    								Ranking
    							WHERE
    								season	= {$season}	AND
    								round	= {$round}	AND
    								club	= '{$homeTeam}'
    						) AS lose ),
    			goalfor		=	( SELECT * FROM (
    							SELECT
    								goalfor
    							FROM
    								Ranking
    							WHERE
    								season	= {$season}	AND
    								round	= {$round}	AND
    								club	= '{$homeTeam}'
    						) AS goalfor ),
    			goalagainst	=	( SELECT * FROM (
    							SELECT
    								goalagainst
    							FROM
    								Ranking
    							WHERE
    								season	= {$season}	AND
    								round	= {$round}	AND
    								club	= '{$homeTeam}'
    						) AS goalagainst )
    		WHERE
    			season	= {$season}	AND
    			round	= {$round} + 1	AND
    			club	= '{$homeTeam}';

    		UPDATE
    			Ranking
    		SET
    			point =
    				(SELECT wd.win * 3 + wd.draw FROM
    					(
    						SELECT
    							win, draw
    						FROM
    							Ranking
    						WHERE
    							season	= {$season}	AND
    							round	= {$round}	AND
    							club	= '{$homeTeam}'
    					) AS wd
    				)
    		WHERE
    			season	= {$season}	AND
    			round	= {$round} + 1	AND
    			club	= '{$homeTeam}'
      ";

      mysqli_multi_query($db, $sql);
      while (mysqli_next_result ($db)) {;}
      $sql = "
    		UPDATE
    			Ranking
    		SET
    			game		= 	{$round},
    			win 		= 	( SELECT * FROM (
    							SELECT
    								win
    							FROM
    								Ranking
    							WHERE
    								season	= {$season}	AND
    								round	= {$round}	AND
    								club	= '{$awayTeam}'
    						) AS win ),
    			draw		=	( SELECT * FROM (
    							SELECT
    								draw
    							FROM
    								Ranking
    							WHERE
    								season	= {$season}	AND
    								round	= {$round}	AND
    								club	= '{$awayTeam}'
    						) AS draw ),
    			lose		=	( SELECT * FROM (
    							SELECT
    								lose
    							FROM
    								Ranking
    							WHERE
    								season	= {$season}	AND
    								round	= {$round}	AND
    								club	= '{$awayTeam}'
    						) AS lose ),
    			goalfor		=	( SELECT * FROM (
    							SELECT
    								goalfor
    							FROM
    								Ranking
    							WHERE
    								season	= {$season}	AND
    								round	= {$round}	AND
    								club	= '{$awayTeam}'
    						) AS goalfor ),
    			goalagainst	=	( SELECT * FROM (
    							SELECT
    								goalagainst
    							FROM
    								Ranking
    							WHERE
    								season	= {$season}	AND
    								round	= {$round}	AND
    								club	= '{$awayTeam}'
    						) AS goalagainst )
    		WHERE
    			season	= {$season}	AND
    			round	= {$round} + 1	AND
    			club	= '{$awayTeam}';

    		UPDATE
    			Ranking
    		SET
    			point =
    				(SELECT wd.win * 3 + wd.draw FROM
    					(
    						SELECT
    							win, draw
    						FROM
    							Ranking
    						WHERE
    							season	= {$season}	AND
    							round	= {$round}	AND
    							club	= '{$awayTeam}'
    					) AS wd
    				)
    		WHERE
    			season	= {$season}	AND
    			round	= {$round} + 1	AND
    			club	= '{$awayTeam}'
      ";

      mysqli_multi_query($db, $sql);
      while (mysqli_next_result ($db)) {;}
    }
  }
  $sql = "
    SELECT
      SUM(game = ( SELECT * FROM (
              SELECT
                MAX(round)
              FROM
                Round
              WHERE
                season = {$season}
            ) AS round )
      )
      =	( SELECT * FROM (
          SELECT
            COUNT(round)
          FROM
            Ranking
          WHERE
            season	= {$season}	AND
            round	= {$round}
        ) AS round ) AS chk
    FROM
      Ranking
    WHERE
      season	= {$season} AND
      round	= {$round}
  ";
  $roundCheck = mysqli_fetch_assoc(mysqli_query($db, $sql));

  if ($roundCheck['chk'] < 1){
    $sql = "
      UPDATE
        League
      SET
        round	= {$round} + 1
      WHERE
        season	= {$season};

      UPDATE
        Season
      SET
        round	= {$round} + 1
      WHERE
        season	= {$season}
    ";

    mysqli_multi_query($db, $sql);
    while (mysqli_next_result ($db)) {;}
  }
?>
