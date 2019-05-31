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

  $sql = "
		SELECT
			*
		FROM
			Ranking
		WHERE
			season	= (SELECT * FROM (SELECT MAX(season) FROM Season) AS season) AND
			round	= (SELECT * FROM (SELECT round FROM Season WHERE season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)) AS round)
		ORDER BY
			point DESC, goalfor - goalagainst DESC
  ";
  $rankClub = mysqli_query($db, $sql);

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
			10
  ";
  $rankGoalScorer = mysqli_query($db, $sql);

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
			10
  ";
  $rankAssistProvider = mysqli_query($db, $sql);

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
			10
  ";
  $rankTopRating = mysqli_query($db, $sql);

?>
