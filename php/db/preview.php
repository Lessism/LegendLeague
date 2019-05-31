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
			Club
		WHERE
			roster = 1
		ORDER BY
			ovr DESC
  ';
  $previewClub = mysqli_query($db, $sql);

  $sql = '
		SELECT
			m.*
		FROM
			Manager m
		LEFT JOIN
			Club c
		ON
			m.club = c.name
		WHERE
			c.roster = 1
		ORDER BY
			m.ovr DESC
		LIMIT
			1
  ';
  $previewManager = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = '
		SELECT
			p.*,po.*
		FROM
			Player p
		LEFT JOIN Position po
			ON p.position = po.position
		LEFT JOIN Club c
			ON p.club = c.name
		WHERE
			c.roster = 1
		ORDER BY
			p.ovr DESC
		LIMIT
			6
  ';
  $previewPlayer = mysqli_query($db, $sql);

  $sql = '
		SELECT
			season
		FROM
			Season
		ORDER BY
			season DESC
		LIMIT
			1
  ';
  $previewSeason = mysqli_fetch_assoc(mysqli_query($db, $sql));
?>
