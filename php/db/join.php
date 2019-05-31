<?php
  include '../../db/db.php';

  $pw = password_hash($_POST['pw'], PASSWORD_BCRYPT);

  if ($_POST['role'] == 'Club') {
    $sql = "
  		INSERT
  			INTO FIFA (
  				id,
  				pw,
  				name,
  				role
  			)
  			VALUES (
  				'{$_POST['id']}',
  				'${pw}',
  				'{$_POST['name']}',
  				'{$_POST['role']}'
  			);
			INSERT
				INTO Stadium (
					std_name
				)
				VALUES (
					'{$_POST['stadium']}'
				);
			INSERT
				INTO Club (
					name,
					country,
					stadium
				)
				VALUES (
					'{$_POST['name']}',
					'{$_POST['country']}',
					'{$_POST['stadium']}'
				);
    ";
    mysqli_multi_query($db, $sql);
    while (mysqli_next_result ($db)) {;}

    if (!empty($_FILES['img']['tmp_name'])) {

      $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
      $sql = "
        INSERT
          INTO Image (
            img
          )
          VALUES (
            '${img}'
          );
        UPDATE
          {$_POST['role']}
        SET
          emblem = LAST_INSERT_ID()
        WHERE
          name = '{$_POST['name']}';
      ";
      mysqli_multi_query($db, $sql);
      while (mysqli_next_result ($db)) {;}

    }

    if (!empty($_FILES['img1']['tmp_name'])) {

      $img1 = addslashes(file_get_contents($_FILES['img1']['tmp_name']));
      $sql = "
        INSERT
          INTO Image (
            img
          )
          VALUES (
            '${img1}'
          );
        UPDATE
          Stadium
  			SET
  				std_img = LAST_INSERT_ID()
  			WHERE
  				std_name = '{$_POST['stadium']}';
      ";
      mysqli_multi_query($db, $sql);
      while (mysqli_next_result ($db)) {;}

    }

  } elseif ($_POST['role'] == 'Manager') {

    $sql = "
  		INSERT
  			INTO FIFA (
  				id,
  				pw,
  				name,
  				role
  			)
  			VALUES (
  				'{$_POST['id']}',
  				'${pw}',
  				'{$_POST['name']}',
  				'{$_POST['role']}'
  			);
			INSERT
				INTO Manager (
					name,
					country,
					birth,
					height,
					weight,
					ovr,
					tactic
				)
				VALUES (
					'{$_POST['name']}',
					'{$_POST['country']}',
					'{$_POST['birth']}',
					'{$_POST['height']}',
					'{$_POST['weight']}',
					'{$_POST['ovr']}',
					'{$_POST['tactic']}'
				);
    ";
    mysqli_multi_query($db, $sql);
    while (mysqli_next_result ($db)) {;}

    if (!empty($_FILES['img']['tmp_name'])) {

      $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
      $sql = "
        INSERT
          INTO Image (
            img
          )
          VALUES (
            '${img}'
          );
        UPDATE
          {$_POST['role']}
        SET
          profile = LAST_INSERT_ID()
        WHERE
          name = '{$_POST['name']}';
      ";
      mysqli_multi_query($db, $sql);
      while (mysqli_next_result ($db)) {;}

    }

  } elseif ($_POST['role'] == 'Player') {

    $sql = "
  		INSERT
  			INTO FIFA (
  				id,
  				pw,
  				name,
  				role
  			)
  			VALUES (
  				'{$_POST['id']}',
  				'${pw}',
  				'{$_POST['name']}',
  				'{$_POST['role']}'
  			);
			INSERT
				INTO Player (
					name,
					country,
					birth,
					height,
					weight,
					ovr,
					position
				)
				VALUES (
					'{$_POST['name']}',
					'{$_POST['country']}',
					'{$_POST['birth']}',
					'{$_POST['height']}',
					'{$_POST['weight']}',
					'{$_POST['ovr']}',
					'{$_POST['position']}'
				);
    ";
    mysqli_multi_query($db, $sql);
    while (mysqli_next_result ($db)) {;}

    if (!empty($_FILES['img']['tmp_name'])) {

      $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
      $sql = "
        INSERT
          INTO Image (
            img
          )
          VALUES (
            '${img}'
          );
        UPDATE
          {$_POST['role']}
        SET
          profile = LAST_INSERT_ID()
        WHERE
          name = '{$_POST['name']}';
      ";
      mysqli_multi_query($db, $sql);
      while (mysqli_next_result ($db)) {;}

    }

  }

  echo "<script>window.location.replace('/php/account/login.php');</script>";
?>
