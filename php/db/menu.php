<?php
  include '../db/db.php';

  $sql = "
		SELECT
			UPPER(menu) menu, COUNT(menu) menucount, SUM(TIMESTAMPDIFF(MINUTE, visit, quit)) menustay
		FROM
			Visit
		WHERE
			menu = 'master'
		GROUP BY
			menu
		ORDER BY
			menustay DESC
  ";
  $master = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			UPPER(submenu) menu, COUNT(submenu) menucount, SUM(TIMESTAMPDIFF(MINUTE, visit, quit)) menustay
		FROM
			Visit
		WHERE
			menu = 'master'
		GROUP BY
			submenu
		ORDER BY
			menustay DESC
  ";
  $masterSub = mysqli_query($db, $sql);

  $sql = "
		SELECT
			UPPER(menu) menu, COUNT(menu) menucount, SUM(TIMESTAMPDIFF(MINUTE, visit, quit)) menustay
		FROM
			Visit
		WHERE
			menu = 'account'
		GROUP BY
			menu
		ORDER BY
			menustay DESC
  ";
  $account = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			UPPER(submenu) menu, COUNT(submenu) menucount, SUM(TIMESTAMPDIFF(MINUTE, visit, quit)) menustay
		FROM
			Visit
		WHERE
			menu = 'account'
		GROUP BY
			submenu
		ORDER BY
			menustay DESC
  ";
  $accountSub = mysqli_query($db, $sql);

  $sql = "
		SELECT
			UPPER(menu) menu, COUNT(menu) menucount, SUM(TIMESTAMPDIFF(MINUTE, visit, quit)) menustay
		FROM
			Visit
		WHERE
			menu = 'league'
		GROUP BY
			menu
		ORDER BY
			menustay DESC
  ";
  $league = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			UPPER(submenu) menu, COUNT(submenu) menucount, SUM(TIMESTAMPDIFF(MINUTE, visit, quit)) menustay
		FROM
			Visit
		WHERE
			menu = 'league'
		GROUP BY
			submenu
		ORDER BY
			menustay DESC
  ";
  $leagueSub = mysqli_query($db, $sql);

  $sql = "
		SELECT
			UPPER(menu) menu, COUNT(menu) menucount, SUM(TIMESTAMPDIFF(MINUTE, visit, quit)) menustay
		FROM
			Visit
		WHERE
			menu = 'fifa'
		GROUP BY
			menu
		ORDER BY
			menustay DESC
  ";
  $fifa = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			UPPER(submenu) menu, COUNT(submenu) menucount, SUM(TIMESTAMPDIFF(MINUTE, visit, quit)) menustay
		FROM
			Visit
		WHERE
			menu = 'fifa'
		GROUP BY
			submenu
		ORDER BY
			menustay DESC
  ";
  $fifaSub = mysqli_query($db, $sql);
?>
