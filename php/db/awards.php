<?php
  include '../db/db.php';

  $season = $_GET['season'];
  $awardname = $_GET['award'];
  $role = $_GET['role'];

  $sql = '
    SELECT
			*
		FROM
			Season
		ORDER BY
			season DESC
		LIMIT
			1
  ';
  $leagueSeason = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			*, SUM(countcountry) sumcountcountry
		FROM (
			SELECT
				country, COUNT(country) countcountry
			FROM
				Club
			GROUP BY
				country
			UNION ALL
				SELECT
					country, COUNT(country) countcountry
				FROM
					Manager
				GROUP BY
					country
			UNION ALL
				SELECT
					country, COUNT(country) countcountry
				FROM
					Player
				GROUP BY
					country
		) AS country
		GROUP BY
			country
		ORDER BY
			sumcountcountry DESC, country ASC
  ";
  $countryList = mysqli_query($db, $sql);

  if ($role == 'Club') {

    $sql = "
  		SELECT
  			*, 'Club' role, 'champion' award,
  			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion') countchampion
  		FROM
  			awardclub ac
  		LEFT
  			JOIN Club c
  			ON ac.name = c.name
  		WHERE
  			season = {$season}
    ";
    $champion = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			MAX(win) win, MAX(draw) draw, MAX(lose) lose, MAX(game) game,
  			MAX(win) / MAX(game) winodds, MAX(draw) / MAX(game) drawodds, MAX(lose) / MAX(game) loseodds,
  			MAX(point) maxpoint, MAX(goalfor) maxgoalfor, MAX(goalagainst) maxgoalagainst
  		FROM
  			Ranking
  		WHERE
  			season	= {$season} AND
  			club	= '{$champion['name']}'
  		GROUP BY
  			season, club
    ";
    $championOdds = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*
  		FROM
  			Manager m
  		INNER
  			JOIN Tactic t
              ON m.tactic = t.tactic
  		WHERE
  			name = '{$champion['manager']}'
    ";
    $championManager = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*
  		FROM
  			Player p
  		LEFT
  			JOIN Position po
  			ON p.position = po.position
  		LEFT
  			JOIN (
  				SELECT
  					*, COUNT(round) countround, AVG(rating) avgrating, SUM(goal) sumgoal, SUM(assist) sumassist
  				FROM
  					Score
  				WHERE
            season	= {$season}	AND
            player	= '{$champion['player0']}' OR
            season	= {$season}	AND
            player	= '{$champion['player1']}' OR
            season	= {$season}	AND
            player	= '{$champion['player2']}' OR
            season	= {$season}	AND
            player	= '{$champion['player3']}' OR
            season	= {$season}	AND
            player	= '{$champion['player4']}' OR
            season	= {$season}	AND
            player	= '{$champion['player5']}' OR
            season	= {$season}	AND
            player	= '{$champion['player6']}' OR
            season	= {$season}	AND
            player	= '{$champion['player7']}' OR
            season	= {$season}	AND
            player	= '{$champion['player8']}' OR
  					season	= {$season}	AND
  					player	= '{$champion['player9']}' OR
  					season	= {$season}	AND
  					player	= '{$champion['player10']}'
  				GROUP BY
  					season, player
  			) AS score
  	        ON player = name
  		WHERE
  			name = '{$champion['player0']}' OR
    		name = '{$champion['player1']}' OR
    		name = '{$champion['player2']}' OR
    		name = '{$champion['player3']}' OR
    		name = '{$champion['player4']}' OR
    		name = '{$champion['player5']}' OR
    		name = '{$champion['player6']}' OR
    		name = '{$champion['player7']}' OR
    		name = '{$champion['player8']}' OR
    		name = '{$champion['player9']}' OR
    		name = '{$champion['player10']}'
  		ORDER BY
  			po.no ASC, ovr DESC
    ";
    $championRoster = mysqli_query($db, $sql);

    $sql = "
      SELECT
        *
      FROM
        Season
      LEFT
        JOIN ${role}
        ON ${awardname} = name
      ORDER BY
        season DESC
    ";
    $championList = mysqli_query($db, $sql);
  } else if ($role == 'Manager'){
    $sql = "
  		SELECT
  			*, 'Manager' role, 'manager' award,
  			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion') countchampion
  		FROM
  			awardmanager am
  		LEFT
  			JOIN Manager m
  			ON am.name = m.name
  		WHERE
  			season = {$season}
    ";
    $manager = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			MAX(win) win, MAX(draw) draw, MAX(lose) lose, MAX(game) game,
  			MAX(win) / MAX(game) winodds, MAX(draw) / MAX(game) drawodds, MAX(lose) / MAX(game) loseodds,
  			MAX(point) maxpoint, MAX(goalfor) maxgoalfor, MAX(goalagainst) maxgoalagainst
  		FROM
  			Ranking
  		WHERE
  			season = {$season} AND
  			club   = '{$manager['club']}'
  		GROUP BY
  			season, club
    ";
    $managerOdds = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*
  		FROM
  			Season
  		LEFT
  			JOIN ${role}
  			ON ${awardname} = name
  		ORDER BY
  			season DESC
    ";
    $managerList = mysqli_query($db, $sql);
  } else if ($role == 'Player'){
    $sql = "
  		SELECT
  			*
  		FROM
  			Season
  		WHERE
  			season = {$season}
    ";
    $playerAward = mysqli_fetch_assoc(mysqli_query($db, $sql));

    if ($playerAward['ballondor'] != null){
      $sql = "
    		SELECT
    			*, 'Player' role, 'ballondor' award,
    			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion') countchampion,
    			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Ballon Dor',''))) DIV CHAR_LENGTH('Ballon Dor') countballondor,
    			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Goal Scorer',''))) DIV CHAR_LENGTH('Goal Scorer') countgoalscorer,
    			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Assist Provider',''))) DIV CHAR_LENGTH('Assist Provider') countassistprovider
    		FROM
    			ballondor b
    		LEFT
    			JOIN Player p
    		    ON b.name = p.name
    		LEFT
    			JOIN Position po
            ON p.position = po.position
    		WHERE
    			season = {$season}
      ";
      $ballonDor = mysqli_fetch_assoc(mysqli_query($db, $sql));
      $sql = "
    		SELECT
    			*, COUNT(round) countround, AVG(rating) avgrating, SUM(goal) sumgoal, SUM(assist) sumassist
    		FROM
    			Score
    		WHERE
    			season	= {$season}	AND
    		  player	= '{$ballonDor['name']}'
    		GROUP BY
    			season, player
      ";
      $ballonDorScore = mysqli_fetch_assoc(mysqli_query($db, $sql));
      $sql = "
    		SELECT
    			MAX(win) win, MAX(draw) draw, MAX(lose) lose, MAX(game) game,
    			MAX(win) / MAX(game) winodds, MAX(draw) / MAX(game) drawodds, MAX(lose) / MAX(game) loseodds,
    			MAX(point) maxpoint, MAX(goalfor) maxgoalfor, MAX(goalagainst) maxgoalagainst
    		FROM
    			Ranking
    		WHERE
    			season = {$season} AND
    			club   = '{$ballonDor['club']}'
    		GROUP BY
    			season, club
      ";
      $ballonDorOdds = mysqli_fetch_assoc(mysqli_query($db, $sql));
      $sql = "
    		SELECT
    			*
    		FROM
    			Season
    		LEFT
    			JOIN Player
    			ON ballondor = name
    		ORDER BY
    			season DESC
      ";
      $ballonDorList = mysqli_query($db, $sql);
    }
    if ($playerAward['goalscorer'] != null) {
      $sql = "
    		SELECT
    			*, 'Player' role, 'goalScorer' award,
    			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion') countchampion,
    			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Ballon Dor',''))) DIV CHAR_LENGTH('Ballon Dor') countballondor,
    			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Goal Scorer',''))) DIV CHAR_LENGTH('Goal Scorer') countgoalscorer,
    			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Assist Provider',''))) DIV CHAR_LENGTH('Assist Provider') countassistprovider
    		FROM
    			goalscorer g
    		LEFT
    			JOIN Player p
    			ON g.name = p.name
    		LEFT
    			JOIN Position po
                ON p.position = po.position
    		WHERE
    			season = {$season}
      ";
      $goalScorer = mysqli_fetch_assoc(mysqli_query($db, $sql));
      $sql = "
    		SELECT
    			*, COUNT(round) countround, AVG(rating) avgrating, SUM(goal) sumgoal, SUM(assist) sumassist
    		FROM
    			Score
    		WHERE
    			season	= {$season}	AND
    		  player	= '{$goalScorer['name']}'
    		GROUP BY
    			season, player
      ";
      $goalScorerScore = mysqli_fetch_assoc(mysqli_query($db, $sql));
      $sql = "
    		SELECT
    			MAX(win) win, MAX(draw) draw, MAX(lose) lose, MAX(game) game,
    			MAX(win) / MAX(game) winodds, MAX(draw) / MAX(game) drawodds, MAX(lose) / MAX(game) loseodds,
    			MAX(point) maxpoint, MAX(goalfor) maxgoalfor, MAX(goalagainst) maxgoalagainst
    		FROM
    			Ranking
    		WHERE
    			season = {$season} AND
    			club   = '{$goalScorer['club']}'
    		GROUP BY
    			season, club
      ";
      $goalScorerOdds = mysqli_fetch_assoc(mysqli_query($db, $sql));
      $sql = "
    		SELECT
    			*
    		FROM
    			Season
    		LEFT
    			JOIN Player
    			ON goalscorer = name
    		ORDER BY
    			season DESC
      ";
      $goalScorerList = mysqli_query($db, $sql);
    }
    if ($playerAward['assistprovider'] != null) {
      $sql = "
    		SELECT
    			*, 'Player' role, 'assistProvider' award,
    			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion') countchampion,
    			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Ballon Dor',''))) DIV CHAR_LENGTH('Ballon Dor') countballondor,
    			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Goal Scorer',''))) DIV CHAR_LENGTH('Goal Scorer') countgoalscorer,
    			(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Assist Provider',''))) DIV CHAR_LENGTH('Assist Provider') countassistprovider
    		FROM
    			assistprovider a
    		LEFT
    			JOIN Player p
    			ON a.name = p.name
    		LEFT
    			JOIN Position po
          ON p.position = po.position
    		WHERE
    			season = {$season}
      ";
      $assistProvider = mysqli_fetch_assoc(mysqli_query($db, $sql));
      $sql = "
    		SELECT
    			*, COUNT(round) countround, AVG(rating) avgrating, SUM(goal) sumgoal, SUM(assist) sumassist
    		FROM
    			Score
    		WHERE
    			season	= {$season}	AND
    		  player	= '{$assistProvider['name']}'
    		GROUP BY
    			season, player
      ";
      $assistProviderScore = mysqli_fetch_assoc(mysqli_query($db, $sql));
      $sql = "
    		SELECT
    			MAX(win) win, MAX(draw) draw, MAX(lose) lose, MAX(game) game,
    			MAX(win) / MAX(game) winodds, MAX(draw) / MAX(game) drawodds, MAX(lose) / MAX(game) loseodds,
    			MAX(point) maxpoint, MAX(goalfor) maxgoalfor, MAX(goalagainst) maxgoalagainst
    		FROM
    			Ranking
    		WHERE
    			season = {$season} AND
    			club   = '{$assistProvider['club']}'
    		GROUP BY
    			season, club
      ";
      $assistProviderOdds = mysqli_fetch_assoc(mysqli_query($db, $sql));
      $sql = "
    		SELECT
    			*
    		FROM
    			Season
    		LEFT
    			JOIN Player
    			ON assistprovider = name
    		ORDER BY
    			season DESC
      ";
      $assistProviderList = mysqli_query($db, $sql);
    }
  }

?>
