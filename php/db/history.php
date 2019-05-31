<?php
  include '../db/db.php';
  $sql = "
    SELECT
  		*
  	FROM
  		Season
  	ORDER BY
  		season DESC
  	LIMIT
  		1
  ";
  $leagueSeason = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $history = $_GET['history'];

  if ($history == 'League'){

    $sql = "
    	SELECT
    		champion, country, emblem
    	FROM
    		Season
    	LEFT
    		JOIN Club
    	    ON Season.champion = Club.name
    	WHERE
    	    season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)-1
    ";
    $title = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
    	SELECT
    		COUNT(champion) count, champion, country, emblem
    	FROM
    		Season
    	LEFT
    		JOIN Club
    	    ON champion = name
    	WHERE
    		champion IS NOT NULL
    	GROUP BY
    		champion
    	ORDER BY
    		count DESC
    	LIMIT
    		1
    ";
    $mostTitleClub = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			COUNT(manager) count, manager, country, profile
  		FROM
  			Season
  		LEFT
  			JOIN Manager
  		    ON manager = name
  		WHERE
  			manager IS NOT NULL
  		GROUP BY
  			manager
  		ORDER BY
  			count DESC
  		LIMIT
  			1
    ";
    $mostTitleManager = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			name name, country, profile, (CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion') count
  		FROM
  			Player
  		WHERE
  			history IS NOT NULL AND
  			history like '%Champion%'
  		ORDER BY
  			count DESC, ovr DESC
  		LIMIT
  			1
    ";
    $mostTitlePlayer = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, COUNT(ballondor) count
  		FROM
  			Season
  		LEFT
  			JOIN Player
  			ON ballondor = name
  		WHERE
  			ballondor IS NOT NULL
  		GROUP BY
  			ballondor
  		ORDER BY
  			count DESC
  		LIMIT
  			1
    ";
    $mostBallonDor = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, COUNT(goalscorer) count
  		FROM
  			Season
  		LEFT
  			JOIN Player
  			ON goalscorer = name
  		WHERE
  			goalscorer IS NOT NULL
  		GROUP BY
  			goalscorer
  		ORDER BY
  			count DESC
  		LIMIT
  			1
    ";
    $mostGoalScorer = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, COUNT(assistprovider) count
  		FROM
  			Season
  		LEFT
  			JOIN Player
  			ON assistprovider = name
  		WHERE
  			assistprovider IS NOT NULL
  		GROUP BY
  			assistprovider
  		ORDER BY
  			count DESC
  		LIMIT
  			1
    ";
    $mostAssistProvider = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, COUNT(game) sumgame
  		FROM
  			Ranking
  		LEFT
  			JOIN Club
  			ON club = name
  		WHERE
  			NOT game = 0
  		GROUP BY
  			club
  		ORDER BY
  			sumgame DESC, SUM(point) DESC
  		LIMIT
  			1
    ";
    $mostGame = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, SUM(w) sumwin
  		FROM
  			(
  				SELECT
  					*, MAX(win) w
  				FROM
  					Ranking
  				LEFT
  					JOIN Club
  					ON club = name
  				WHERE
  					NOT game = 0
  				GROUP BY
  					season, club
  			) AS club
  		GROUP BY
  			club
  		ORDER BY
  			sumwin DESC
  		LIMIT
  			1
    ";
    $mostWin = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, SUM(d) sumdraw
  		FROM
  			(
  				SELECT
  					*, MAX(draw) d
  				FROM
  					Ranking
  				LEFT
  					JOIN Club
  					ON club = name
  				WHERE
  					NOT game = 0
  				GROUP BY
  					season, club
  			) AS club
  		GROUP BY
  			club
  		ORDER BY
  			draw DESC
  		LIMIT
  			1
    ";
    $mostDraw = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, SUM(l) sumlose
  		FROM
  			(
  				SELECT
  					*, MAX(lose) l
  				FROM
  					Ranking
  				LEFT
  					JOIN Club
  					ON club = name
  				WHERE
  					NOT game = 0
  				GROUP BY
  					season, club
  			) AS club
  		GROUP BY
  			club
  		ORDER BY
  			lose DESC
  		LIMIT
  			1
    ";
    $mostLose = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, SUM(maxgoalfor) - SUM(maxgoalagainst) summaxgoaldifference
  		FROM
  			(
  				SELECT
  					*, MAX(goalfor) maxgoalfor, MAX(goalagainst) maxgoalagainst
  				FROM
  					Ranking
  				LEFT
  					JOIN Club
  					ON club = name
  				GROUP BY
  					season, club
  			) AS maxgoaldifference
  		GROUP BY
  			club
  		ORDER BY
  			summaxgoaldifference DESC, SUM(maxgoalfor) DESC, SUM(maxgoalagainst) ASC, ovr DESC
  		LIMIT
  			1
    ";
    $mostGoalDifference = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, SUM(maxgoalfor) summaxgoalfor
  		FROM
  			(
  				SELECT
  					*, MAX(goalfor) maxgoalfor
  				FROM
  					Ranking
  				LEFT
  					JOIN Club
  					ON club = name
  				GROUP BY
  					season, club
  			) AS maxgoalfor
  		GROUP BY
  			club
  		ORDER BY
  			summaxgoalfor DESC, ovr DESC
  		LIMIT
  			1
    ";
    $mostGoalFor = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, SUM(maxgoalagainst) summaxgoalagainst
  		FROM
  			(
  				SELECT
  					*, MAX(goalagainst) maxgoalagainst
  				FROM
  					Ranking
  				LEFT
  					JOIN Club
  					ON club = name
  				GROUP BY
  					season, club
  			) AS maxgoalagainst
  		GROUP BY
  			club
  		ORDER BY
  			summaxgoalagainst DESC, ovr DESC
  		LIMIT
  			1
    ";
    $mostGoalAgainst = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, SUM(p) sumpoint
  		FROM
  			(
  				SELECT
  					*, MAX(point) p
  				FROM
  					Ranking
  				LEFT
  					JOIN Club
  					ON club = name
  				WHERE
  					NOT game = 0
  				GROUP BY
  					season, club
  			) AS club
  		GROUP BY
  			club
  		ORDER BY
  			sumpoint DESC
  		LIMIT
  			1
    ";
    $mostPoint = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, SUM(w) sumwin, SUM(d) sumdraw, SUM(l) sumlose,
  			SUM(w) / SUM(g) as winodds, SUM(d) / SUM(g) as drawodds, SUM(l) / SUM(g) as loseodds
  		FROM
  			(
  				SELECT
  					*, MAX(game) g, MAX(win) w, MAX(draw) d, MAX(lose) l, MAX(point) p
  				FROM
  					Ranking
  				LEFT
  					JOIN Club
  					ON club = name
  				WHERE
  					NOT game = 0
  				GROUP BY
  					season, club
  			) AS club
  		GROUP BY
  			club
  		ORDER BY
  			winodds DESC
  		LIMIT
  			1
    ";
    $mostOdds = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, AVG(rating) avgrating
  		FROM
  			Score
  		LEFT
  			JOIN Player
  		    ON player = name
  		GROUP BY
  			player
  		ORDER BY
  			avgrating DESC, ovr DESC
  		LIMIT
  			1
    ";
    $mostPlayerRating = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, SUM(goal) sumgoal
  		FROM
  			Score
  		LEFT
  			JOIN Player
  		    ON player = name
  		GROUP BY
  			player
  		ORDER BY
  			sumgoal DESC, ovr DESC
  		LIMIT
  			1
    ";
    $mostPlayerGoal = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			*, SUM(assist) sumassist
  		FROM
  			Score
  		LEFT
  			JOIN Player
  		    ON player = name
  		GROUP BY
  			player
  		ORDER BY
  			sumassist DESC, ovr DESC
  		LIMIT
  			1
    ";
    $mostPlayerAssist = mysqli_fetch_assoc(mysqli_query($db, $sql));
  } else {
    $sql = "
  		SELECT
  			*, MAX(win) maxwin
  		FROM
  			Ranking
  		LEFT
  			JOIN Club
  			ON club = name
  		GROUP BY
  			season, club
  		ORDER BY
  			maxwin DESC
  		LIMIT
  			1
    ";
    $clubMostWin = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*, MAX(draw) maxdraw
  		FROM
  			Ranking
  		LEFT
  			JOIN Club
  			ON club = name
  		GROUP BY
  			season, club
  		ORDER BY
  			maxdraw DESC
  		LIMIT
  			1
    ";
    $clubMostDraw = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*, MAX(lose) maxlose
  		FROM
  			Ranking
  		LEFT
  			JOIN Club
  			ON club = name
  		GROUP BY
  			season, club
  		ORDER BY
  			maxlose DESC
  		LIMIT
  			1
    ";
    $clubMostLose = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*, MAX(game) maxgame, MAX(win) maxwin, MAX(draw) maxdraw, MAX(lose) maxlose,
  			MAX(win) / MAX(game) winodds, MAX(draw) / MAX(game) drawodds, MAX(lose) / MAX(game) loseodds
  		FROM
  			Ranking
  		LEFT
  			JOIN Club
  			ON club = name
  		WHERE
  			NOT season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
  		GROUP BY
  			season, club
  		ORDER BY
  			winodds DESC, maxgame DESC, maxwin DESC, maxdraw DESC, ovr DESC, season DESC
  		LIMIT
  			1
    ";
    $clubMostOdds = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*, MAX(point) maxpoint
  		FROM
  			Ranking
  		LEFT
  			JOIN Club
  			ON club = name
  		GROUP BY
  			season, club
  		ORDER BY
  			maxpoint DESC
  		LIMIT
  			1
    ";
    $clubMostPoint = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			round.season season, round.round round, round.score score,
  			home.name homename, home.emblem homeemblem, home.country homecountry, home.stadium homestadium,
  		    away.name awayname, away.emblem awayemblem, away.country awaycountry, away.stadium awaystadium
  		FROM
  		    (
  				SELECT * FROM
  					Round
  				ORDER BY
  					score DESC
  				LIMIT
  					1
  			) AS round
  		LEFT
  			JOIN	(
  						SELECT
  							*
  						FROM
  							Club
  						WHERE
  							name = (
  										SELECT
  											SUBSTRING_INDEX(versus, '_', 1)
  										FROM
  											Round
  										ORDER BY
  											score DESC
  										LIMIT
  											1
  									)
  					) AS home
  			ON home.name = SUBSTRING_INDEX(versus, '_', 1)
  		LEFT
  			JOIN	(
  						SELECT
  							*
  						FROM
  							Club
  						WHERE
  							name = (
  										SELECT
  											SUBSTRING_INDEX(versus, '_', -1)
  										FROM
  											Round
  										ORDER BY
  											score DESC
  										LIMIT
  											1
  									)
  					) AS away
  			ON away.name = SUBSTRING_INDEX(versus, '_', -1)
    ";
    $clubMostScore = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*, MAX(goalfor) maxgoalfor
  		FROM
  			Ranking
  		LEFT
  			JOIN Club
  			ON club = name
  		GROUP BY
  			season, club
  		ORDER BY
  			maxgoalfor DESC, MAX(goalagainst) ASC, MAX(game) ASC, MAX(win) DESC, MAX(draw) DESC, ovr DESC, season DESC
  		LIMIT
  			1
    ";
    $clubMostGoalFor = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*, MAX(goalagainst) maxgoalagainst
  		FROM
  			Ranking
  		LEFT
  			JOIN Club
  			ON club = name
  		GROUP BY
  			season, club
  		ORDER BY
  			maxgoalagainst DESC, MAX(goalfor) ASC, MAX(game) DESC, MAX(win) ASC, MAX(draw) ASC, ovr DESC, season DESC
  		LIMIT
  			1
    ";
    $clubMostGoalAgainst = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*, MAX(goalfor) - MAX(goalagainst) maxgoaldifference
  		FROM
  			Ranking
  		LEFT
  			JOIN Club
  			ON club = name
  		GROUP BY
  			season, club
  		ORDER BY
  			maxgoaldifference DESC, MAX(goalfor) DESC, MAX(goalagainst) ASC, MAX(game) DESC, MAX(win) DESC, MAX(draw) DESC, ovr DESC, season DESC
  		LIMIT
  			1
    ";
    $clubMostGoalDifference = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*, AVG(rating) avgrating
  		FROM
  			Score
  		LEFT
  			JOIN Player
  			ON	player = name
  		GROUP BY
  			season, player
  		ORDER BY
  			avgrating DESC, SUM(goal) DESC, SUM(assist) DESC
  		LIMIT
  			1
    ";
    $playerMostRating = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*, SUM(goal) sumgoal
  		FROM
  			Score
  		LEFT
  			JOIN Player
  			ON	player = name
  		GROUP BY
  			season, player
  		ORDER BY
  			sumgoal DESC, SUM(assist) DESC, AVG(rating) DESC
  		LIMIT
  			1
    ";
    $playerMostGoal = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*, SUM(assist) sumassist
  		FROM
  			Score
  		LEFT
  			JOIN Player
  			ON	player = name
  		GROUP BY
  			season, player
  		ORDER BY
  			sumassist DESC, SUM(goal) DESC, AVG(rating) DESC
  		LIMIT
  			1
    ";
    $playerMostAssist = mysqli_fetch_assoc(mysqli_query($db, $sql));
  }
?>
