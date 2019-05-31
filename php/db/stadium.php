<?php
  include '../db/db.php';

  $role = $_GET['role'];
  $name = $_GET['name'];

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
?>
