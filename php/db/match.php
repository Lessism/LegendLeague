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

  $sql = "
  SELECT
    round
  FROM
    Season
  WHERE
    season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
  ";
  $nowRound = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
  SELECT
    MAX(round) round
  FROM
    Round
  WHERE
    season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
  ";
  $maxRound = mysqli_fetch_assoc(mysqli_query($db, $sql));

  if ($maxRound['round'] != null){
    $round = array();
    for ($i = 1; $i <= $maxRound['round']; $i++) {
      $sql = "
    		SELECT
    			*
    		FROM
    			Round
    		WHERE
    			season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season) AND
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
      			season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season) AND
      			round = {$i} AND
      			NOT goal = 0
        ";
        $matchScore = array('match' => $roundMatch, 'score' => mysqli_query($db, $sql));
        array_push($matchArray, $matchScore);
      }
      array_push($round, $matchArray);
    }
  }
?>
