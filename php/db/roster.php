<?php
  include '../db/db.php';

  if (empty($_GET['name'])) {
    $sql = "
  		SELECT
  			*
  		FROM
  			Club
  		WHERE
  			roster = 1
    ";
    $list = mysqli_query($db, $sql);
    $sql = "
  		SELECT
  			*
  		FROM
  			Club
  		WHERE
  			roster = 0
    ";
    $unrosted = mysqli_query($db, $sql);

  } else {
    $sql = "
  		SELECT
  			*, YEAR(NOW()) - birth + 0 age
  		FROM
  			Manager
  		WHERE
  			club = '{$_GET['name']}'
    ";
    $rosterManager = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
  		SELECT
  			*, YEAR(NOW()) - birth + 0 age
  		FROM
  			Player r
  		INNER
  			JOIN Position p
  			ON r.position = p.position
  		WHERE
  			club = '{$_GET['name']}'
  		ORDER BY
  			p.no ASC
    ";
    $rosterPlayer = mysqli_query($db, $sql);
    $sql = "
  		SELECT
  			*, YEAR(NOW()) - birth + 0 age
  		FROM
  			Manager
  		WHERE
  			club IS NULL
  		ORDER BY
  			ovr DESC, name ASC
    ";
    $unrostedManager = mysqli_query($db, $sql);
    $sql = "
  		SELECT
  			*, YEAR(NOW()) - birth + 0 age
  		FROM
  			Player r
  		INNER
  			JOIN Position p
  			ON r.position = p.position
  		WHERE
  			club IS NULL
  		ORDER BY
  			ovr DESC, name ASC
    ";
    $unrostedPlayer = mysqli_query($db, $sql);
  }
?>
