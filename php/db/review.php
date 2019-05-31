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

  $season = $_GET['season'];
  $sql = "
		SELECT
			*
		FROM
			Season
		WHERE
			season	= {$season}
  ";
  $beforeSeason = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			*
		FROM
			Club
		WHERE
			name = '{$beforeSeason['champion']}'
  ";
  $beforeChampion = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			*
		FROM
			Manager m
		INNER
			JOIN Tactic t
            ON m.tactic = t.tactic
		WHERE
			name = '{$beforeSeason['manager']}'
  ";
  $beforeManager = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			p.*,po.*
		FROM
			Player p
		LEFT JOIN Position po
			ON p.position = po.position
		WHERE
			p.name = '{$beforeSeason['ballondor']}'
  ";
  $beforeBallonDor = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			p.*,po.*
		FROM
			Player p
		LEFT JOIN Position po
			ON p.position = po.position
		WHERE
			p.name = '{$beforeSeason['goalscorer']}'
  ";
  $beforeGoalScorer = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			p.*,po.*
		FROM
			Player p
		LEFT JOIN Position po
			ON p.position = po.position
		WHERE
			p.name = '{$beforeSeason['assistprovider']}'
  ";
  $beforeAssistProvider = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
    SELECT
      *
    FROM
      Ranking
    WHERE
      season	= '{$beforeSeason['season']}'	AND
      round	= '{$beforeSeason['round']}'
    ORDER BY
      point DESC, goalfor - goalagainst DESC
  ";
  $beforeRanking = mysqli_query($db, $sql);

  $round = array();
  for ($i = 1; $i <= $beforeSeason['round']; $i++) {
    $sql = "
      SELECT
        *
      FROM
        Round
      WHERE
        season = {$season} AND
        round = {$i}
    ";
    $roundMatches = mysqli_query($db, $sql);
    $matchArray = array();
    while ($roundMatch = mysqli_fetch_assoc($roundMatches)){
      $sql = "
        SELECT
          *
        FROM
          Score
        WHERE
          season = {$season} AND
          round = {$i} AND
          NOT goal = 0
      ";
      $matchScore = array('match' => $roundMatch, 'score' => mysqli_query($db, $sql));
      array_push($matchArray, $matchScore);
    }
    array_push($round, $matchArray);
  }
?>
