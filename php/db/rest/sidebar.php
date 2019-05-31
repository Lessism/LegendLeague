<?php
  include '../../db/db.php';

  $sql = "
		SELECT
			id, name, role
		FROM
			FIFA
		WHERE
			id = '{$_POST['id']}'
  ";
  $fifa = mysqli_fetch_assoc(mysqli_query($db, $sql));

  if ($fifa['role'] == 'Club') {
    $sql = "
  		SELECT
  			*
  		FROM
  			{$fifa['role']} r
  		INNER
  			JOIN Stadium s
  		    ON r.stadium = s.std_name
  		WHERE
  			name = '{$fifa['name']}'
    ";
    $person = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $personal['stadium'] = $person['stadium'];
    $sql = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$person['emblem']}'
    ";
    $personal['emblem'] = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $sql))['img']);
    $sql = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$person['std_img']}'
    ";
    $personal['stadiumImg'] = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $sql))['img']);
  }

  if ($fifa['role'] == 'Manager') {
    $sql = "
  		SELECT
  			*
  		FROM
  			{$fifa['role']} r
  		WHERE
  			name = '{$fifa['name']}'
    ";
    $person = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$person['profile']}'
    ";
    $personal['profile'] = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $sql))['img']);
    $personal['club'] = $person['club'];

    $sql = "
  		SELECT
  			*
  		FROM
  			Club r
  		INNER
  			JOIN Stadium s
  		    ON r.stadium = s.std_name
  		WHERE
  			name = '{$person['club']}'
    ";
    $personclub = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $club['name'] = $personclub['name'];
    $sql = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$personclub['emblem']}'
    ";
    $club['emblem'] = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $sql))['img']);
    $club['country'] = $personclub['country'];
    $club['stadium'] = $personclub['stadium'];
    $sql = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$personclub['std_img']}'
    ";
    $club['stadiumImg'] = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $sql))['img']);
  }

  if ($fifa['role'] == 'Player') {
    $sql = "
  		SELECT
  			*
  		FROM
  			{$fifa['role']} r
  		LEFT
  			JOIN Position p
  		    ON r.position = p.position
  		WHERE
  			name = '{$fifa['name']}'
    ";
    $person = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $sql = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$person['profile']}'
    ";
    $personal['profile'] = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $sql))['img']);
    $personal['club'] = $person['club'];

    $sql = "
  		SELECT
  			*
  		FROM
  			Club r
  		INNER
  			JOIN Stadium s
  		    ON r.stadium = s.std_name
  		WHERE
  			name = '{$person['club']}'
    ";
    $personclub = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $club['name'] = $personclub['name'];
    $sql = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$personclub['emblem']}'
    ";
    $club['emblem'] = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $sql))['img']);
    $club['country'] = $personclub['country'];
    $club['stadium'] = $personclub['stadium'];
    $sql = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$personclub['std_img']}'
    ";
    $club['stadiumImg'] = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $sql))['img']);
  }

  $personal['name'] = $person['name'];
  $personal['country'] = $person['country'];
  if ($fifa['role'] == 'Club') {
    $json = array('role' => $fifa['role'], 'personal' => $personal);
  } else {
    $json = array('role' => $fifa['role'], 'personal' => $personal, 'club' => $club);
  }
  echo json_encode($json);
?>
