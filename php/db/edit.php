<?php
  include '../db/db.php';

  if ($_GET['role'] == 'Club'){
    $sql = "
  		SELECT
  			*
  		FROM
  			{$_GET['role']} r
  		ORDER BY
  		  roster DESC,
  			ovr DESC, name ASC
    ";
  }

  if ($_GET['role'] == 'Manager'){
    $sql = "
  		SELECT
  			*, YEAR(NOW()) - birth + 0 age
  		FROM
  			{$_GET['role']} r
  		ORDER BY
  			ovr DESC, name ASC
    ";
  }

  if ($_GET['role'] == 'Player'){
    $sql = "
  		SELECT
  			*, YEAR(NOW()) - birth + 0 age
  		FROM
  			{$_GET['role']} r
  		INNER
  			JOIN Position p
  			ON r.position = p.position
  		ORDER BY
  			ovr DESC, name ASC
    ";
  }

  $list = mysqli_query($db, $sql);
?>
