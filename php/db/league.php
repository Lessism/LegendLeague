<?php
  include '../db/db.php';
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

  $sql = '
    SELECT
      *
    FROM
      Season
		WHERE
			NOT season	= (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
    ORDER BY
      season DESC
    LIMIT
      4
  ';
  $leagueTitle = mysqli_query($db, $sql);

  if (!empty($leagueSeason['round'])){
    $sql = '
  		SELECT
  			*
  		FROM
  			Round
  		WHERE
  			season	= '.$leagueSeason['season'].' AND
  			round	= '.$leagueSeason['round'].'
    ';
    $leagueMatch = mysqli_query($db, $sql);
  }

  $sql = '
		SELECT
			*
		FROM
			Ranking
		WHERE
			season	= (SELECT * FROM (SELECT MAX(season) FROM Season) AS season) AND
			round	= (SELECT * FROM (SELECT round FROM Season WHERE season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)) AS round)
		ORDER BY
			point DESC, goalfor - goalagainst DESC
  ';
  $leagueRanking = mysqli_query($db, $sql);

  if ($leagueSeason['round'] != null && $leagueSeason['round'] > 1){
    $sql = "
  		SELECT
  			*, SUM(goal) goalscorer
  		FROM
  			Score
  		WHERE
  			season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
  			AND NOT goal = 0
  		GROUP BY
  			player
  		ORDER BY
  			goalscorer DESC, assist DESC, rating DESC
  		LIMIT
  			5
    ";
    $rankGoal = mysqli_query($db, $sql);

    $sql = "
  		SELECT
  			*, SUM(assist) assistprovider
  		FROM
  			Score
  		WHERE
  			season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
  			AND NOT assist = 0
  		GROUP BY
  			player
  		ORDER BY
  			assistprovider DESC, goal DESC, rating DESC
  		LIMIT
  			5
    ";
    $rankAssist = mysqli_query($db, $sql);

    $sql = "
  		SELECT
  			*, AVG(rating) toprating
  		FROM
  			Score
  		WHERE
  			season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
  		GROUP BY
  			player
  		ORDER BY
  			toprating DESC, goal DESC, assist DESC
  		LIMIT
  			5
    ";
    $rankRating = mysqli_query($db, $sql);

    $sql = "
      SELECT
        SUM(game = ( SELECT * FROM (
                SELECT
                  MAX(round)
                FROM
                  Round
                WHERE
                  season = {$leagueSeason['season']}
              ) AS round )
        )
      =	( SELECT * FROM (
          SELECT
            COUNT(round)
          FROM
            Ranking
          WHERE
            season	= {$leagueSeason['season']}	AND
            round	= {$leagueSeason['round']}
        ) AS round ) AS boo
      FROM
        Ranking
      WHERE
        season	= {$leagueSeason['season']} AND
        round	= {$leagueSeason['round']}
    ";
    if (mysqli_fetch_assoc(mysqli_query($db, $sql))['boo'] > 0){
      $end = 1;
      $sql = "
        SELECT
          *
        FROM
          Club
        WHERE
          name =	(SELECT * FROM
                (
                  SELECT
                    club
                  FROM
                    Ranking
                  WHERE
                    season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
                  ORDER BY
                    point DESC, goalfor - goalagainst DESC
                  LIMIT
                    1
                ) AS club
              )
      ";
      $champion = mysqli_fetch_assoc(mysqli_query($db, $sql));

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
          Player
        WHERE
          club = '{$champion['name']}'
      ";
      $championLineup = mysqli_query($db, $sql);
    }
  } else {
      $sql = "
    		SELECT
    			*
    		FROM
    			Club
    		WHERE
    			roster = 1
    		ORDER BY
    			ovr DESC
      ";
      $leagueInformation = mysqli_query($db, $sql);

      $sql = "
    		SELECT
    			*
    		FROM
    			Club
    		WHERE
    			roster = 1
    		ORDER BY
    			ovr DESC
        LIMIT
          1
      ";
      $leagueTopClub = mysqli_fetch_assoc(mysqli_query($db, $sql));

      $sql = "
        SELECT
          *
        FROM
          Player
        WHERE
          club = ( SELECT * FROM (
                    SELECT
                			name
                		FROM
                			Club
                		WHERE
                			roster = 1
                		ORDER BY
                			ovr DESC
                    LIMIT
                      1
                  ) AS topclub)
        ORDER BY
          ovr DESC
        LIMIT
          1
      ";
      $leagueKeyPlayer = mysqli_fetch_assoc(mysqli_query($db, $sql));
  }
?>
