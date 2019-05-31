<?php
  include '../db/db.php';

  $name = $_GET['name'];
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
				COUNT(awards) countchampion,
		        (
					SELECT
						COUNT(awards) countmanager
					FROM
						awardmanager m
					WHERE
						club = '{$name}'
		        ) as countmanager,
		        (
					SELECT
						COUNT(awards) countballondor
					FROM
						ballondor
					WHERE
						club = '{$name}'
		        ) as countballondor,
		        (
					SELECT
						COUNT(awards) countgoalscorer
					FROM
						goalscorer
					WHERE
						club = '{$name}'
		        ) as countgoalscorer,
		        (
					SELECT
						COUNT(awards) countassistprovider
					FROM
						assistprovider
					WHERE
						club = '{$name}'
		        ) as countassistprovider
			FROM
				awardclub c
			WHERE
				name = '{$name}'
    ";
    $awardCount = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
			SELECT
				*
			FROM (
				SELECT
					*
				FROM
					ballondor
				WHERE
					club = '{$name}'
				UNION
					SELECT
						*
					FROM
						goalscorer
					WHERE
						club = '{$name}'
				UNION
					SELECT
						*
					FROM
						assistprovider
					WHERE
						club = '{$name}'
			) AS award
			INNER
				JOIN (
					SELECT
						season, player, COUNT(round) countround, AVG(rating) avgrating, SUM(goal) sumgoal, SUM(assist) sumassist
					FROM
						Score
					GROUP BY
						season, player
				) AS score
				ON award.season = score.season AND award.name = score.player
			ORDER BY
				award.season DESC
    ";
    $awards = mysqli_query($db, $sql);
    $sql = "
  		SELECT
  			*
  		FROM
  			${role} r
  		INNER
  			JOIN Stadium s
  		    ON r.stadium = s.std_name
  		WHERE
  			name = '{$name}'
    ";
    $personal = mysqli_fetch_assoc(mysqli_query($db, $sql));
  }
  if ($role == 'Manager') {
    $sql = "
    	SELECT
    		(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion') countchampion,
    		(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Ballon Dor',''))) DIV CHAR_LENGTH('Ballon Dor') countballondor,
    		(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Goal Scorer',''))) DIV CHAR_LENGTH('Goal Scorer') countgoalscorer,
    		(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Assist Provider',''))) DIV CHAR_LENGTH('Assist Provider') countassistprovider
    	FROM
    		${role}
    	WHERE
				name = '{$name}'
    ";
    $awardCount = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
			SELECT
				*
			FROM
				awardmanager award
			INNER
				JOIN (
					SELECT
						season, club, COUNT(round) countround, MAX(win) maxwin, MAX(draw) maxdraw, MAX(lose) maxlose
					FROM
						Ranking
					GROUP BY
						season, club
				) AS score
				ON award.season = score.season AND award.club = score.club
			WHERE
				name = '{$name}'
			ORDER BY
				award.season DESC
    ";
    $awards = mysqli_query($db, $sql);
    $sql = "
  		SELECT
  			*
  		FROM
  			${role} r
  		WHERE
  			name = '{$name}'
    ";
    $personal = mysqli_fetch_assoc(mysqli_query($db, $sql));
  }
  if ($role == 'Player') {
    $sql = "
    	SELECT
    		(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion') countchampion,
    		(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Ballon Dor',''))) DIV CHAR_LENGTH('Ballon Dor') countballondor,
    		(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Goal Scorer',''))) DIV CHAR_LENGTH('Goal Scorer') countgoalscorer,
    		(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Assist Provider',''))) DIV CHAR_LENGTH('Assist Provider') countassistprovider
    	FROM
    		${role}
    	WHERE
				name = '{$name}'
    ";
    $awardCount = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
      SELECT
  			*
  		FROM (
  			SELECT
  				*
  			FROM
  				ballondor
  			WHERE
  				name = '{$name}'
  			UNION
  				SELECT
  					*
  				FROM
  					goalscorer
  				WHERE
  					name = '{$name}'
  			UNION
  				SELECT
  					*
  				FROM
  					assistprovider
  				WHERE
  					name = '{$name}'
  		) AS award
  		INNER
  			JOIN (
  				SELECT
  					season, COUNT(round) countround, AVG(rating) avgrating, SUM(goal) sumgoal, SUM(assist) sumassist
  				FROM
  					Score
  				WHERE
  					player = '{$name}'
  				GROUP BY
  					season
  		    ) AS score
  		    ON award.season = score.season
  		ORDER BY
  			award.season DESC
    ";
    $awards = mysqli_query($db, $sql);
    $sql = "
  		SELECT
  			*
  		FROM
  			${role} r
  		LEFT
  			JOIN Position p
  		    ON r.position = p.position
  		WHERE
  			name = '{$name}'

    ";
    $personal = mysqli_fetch_assoc(mysqli_query($db, $sql));
  }

?>
