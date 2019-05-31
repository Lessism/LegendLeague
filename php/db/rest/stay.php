<?php
  session_start();
  $id = session_id();
  include '../../db/db.php';

  $sql = "
		UPDATE
			Visit
		SET
			quit = NOW()
		WHERE
			session = '{$id}' AND
	    visit   = ( SELECT * FROM (
        					SELECT
        						MAX(visit)
        					FROM
        						Visit
        					WHERE
        						session = '{$id}'
        				) AS visit);
  ";
  mysqli_query($db, $sql);
  $sql ="
    SELECT
      COUNT(DISTINCT(session)) AS users
    FROM
      Visit
    WHERE
      quit >= DATE_SUB(NOW(), INTERVAL 1 MINUTE)
  ";
  $sessions = mysqli_fetch_assoc(mysqli_query($db, $sql))['users'];

  echo $sessions;
?>
