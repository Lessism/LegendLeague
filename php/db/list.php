<?php
  include '../db/db.php';

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
  			*
  		FROM
  			${role} r
  		ORDER BY
        roster DESC,
  			ovr DESC, name ASC
    ";
    $list = mysqli_query($db, $sql);
  }
  if ($role == 'Manager') {
    $sql = "
  		SELECT
  			*, YEAR(NOW()) - birth + 0 age
  		FROM
  			${role} r
  		ORDER BY
  			ovr DESC, name ASC
    ";
    $list = mysqli_query($db, $sql);
  }
  if ($role == 'Player') {
    $sql = "
  		SELECT
  			*, YEAR(NOW()) - birth + 0 age
  		FROM
  			${role} r
  		INNER
  			JOIN Position p
  			ON r.position = p.position
  		ORDER BY
  			ovr DESC, name ASC
    ";
    $list = mysqli_query($db, $sql);
  }

?>
