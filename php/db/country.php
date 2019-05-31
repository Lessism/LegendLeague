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

  $country = $_GET['country'];
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

  $sql = "
		SELECT
		(
			SELECT
				COUNT(country)
			FROM
				Club
			WHERE
				country = '{$country}'
		) AS club, (
			SELECT
				COUNT(country)
			FROM
				Manager
			WHERE
				country = '{$country}'
		) AS manager, (
			SELECT
				COUNT(country)
			FROM
				Player
			WHERE
				country = '{$country}'
		) AS player
  ";
  $countryCount = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			*
		FROM
			Club
		WHERE
			country = '{$country}'
		ORDER BY
			ovr DESC
		LIMIT
			10
  ";
  $countryRankClub = mysqli_query($db, $sql);

  $sql = "
		SELECT
			*
		FROM
			Manager
		WHERE
			country = '{$country}'
		ORDER BY
			ovr DESC
		LIMIT
			10
  ";
  $countryRankManager = mysqli_query($db, $sql);

  $sql = "
		SELECT
			*
		FROM
			Player p
		INNER
			JOIN Position po
			ON p.position = po.position
		WHERE
			country = '{$country}'
		ORDER BY
			ovr DESC
		LIMIT
			10
  ";
  $countryRankPlayer = mysqli_query($db, $sql);

?>
