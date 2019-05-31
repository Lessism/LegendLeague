<?php
  include '../../db/db.php';
  session_start();
  $id = session_id();
  $menu = $_POST['menu'];
  $submenu = $_POST['submenu'];
  $sql = "
		SELECT EXISTS (
			SELECT
				session
			FROM
				Visit
			WHERE
				session = '{$id}'
			LIMIT
				1
		)
  ";
  $chk = mysqli_fetch_row(mysqli_query($db, $sql));
  if ($chk[0]){
    $sql = "
  		UPDATE
  			Visit
  		SET
  			quit = NOW()
  		WHERE
  			session = '{$id}' AND
  		    visit = ( SELECT * FROM (
  						SELECT
  							MAX(visit)
  						FROM
  							Visit
  						WHERE
  							session = '{$id}'
  					) AS visit);
    ";
    mysqli_query($db, $sql);
    $sql = "
  		INSERT
  			INTO Visit (
  				session,
  		    menu,
  				submenu,
  				quit
  			)
  			VALUES (
  				'{$id}',
  				'{$menu}',
  	      '{$submenu}',
  				NOW()
  			);
    ";
    mysqli_query($db, $sql);
  } else {
    $sql = "
  		INSERT
  			INTO Visit (
  				session,
  		    menu,
  				submenu,
  				quit
  			)
  			VALUES (
  				'{$id}',
  				'{$menu}',
  	      '{$submenu}',
  				NOW()
  			);
    ";
    mysqli_query($db, $sql);
  }
?>
