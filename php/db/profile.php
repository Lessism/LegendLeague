<?php
  include '../db/db.php';

  $role = $_GET['role'];
  $name = $_GET['name'];

  if ($role == 'Club') {
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
    $award = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
      SELECT
        *, MAX(game) maxgame, MAX(win) maxwin, MAX(draw) maxdraw, MAX(lose) maxlose
      FROM
        Ranking
      WHERE
        club =	'{$name}'
      GROUP BY
        season, club
      ORDER BY
        season DESC
    ";
    $record = mysqli_query($db, $sql);
  }

  if ($role == 'Manager') {
    $sql = "
  		SELECT
  			*
  		FROM
  			${role} r
  		WHERE
  			name = '{$name}'
    ";
    $personal = mysqli_fetch_assoc(mysqli_query($db, $sql));

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
    $award = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
      SELECT
        *
      FROM
        Score s
      INNER
        JOIN (
          SELECT
            season, club, MAX(game) maxgame, MAX(win) maxwin, MAX(draw) maxdraw, MAX(lose) maxlose, MAX(point) maxpoint
          FROM
            Ranking
          GROUP BY
            season, club
        ) AS r
          ON s.season = r.season AND s.club = r.club
      WHERE
        manager = '{$name}'
      GROUP BY
        s.season, s.manager
    ";
    $record = mysqli_query($db, $sql);
  }

  if ($role == 'Player') {
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
    $award = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
      SELECT
        *, COUNT(round) countround, AVG(rating) avgrating, SUM(goal) sumgoal, SUM(assist) sumassist
      FROM
        Score
      WHERE
        player = '{$name}'
      GROUP BY
        season
      ORDER BY
        season DESC
    ";
    $record = mysqli_query($db, $sql);
  }
?>
