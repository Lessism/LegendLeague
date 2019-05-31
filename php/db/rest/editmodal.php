<?php
  include '../../db/db.php';

  $json = array();
  if ($_POST['role'] == 'Club') {
    $sql = "
  		SELECT
  			*
  		FROM
  			{$_POST['role']} r
  		INNER
  			JOIN Stadium s
  		    ON r.stadium = s.std_name
      WHERE
  			name = '{$_POST['name']}'
    ";
    $personal = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $imageConvert = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$personal['emblem']}'
    ";
    $emblem = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $imageConvert))['img']);
    $imageConvert = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$personal['std_img']}'
    ";
    $stdImg = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $imageConvert))['img']);
    $json = array(
      'name'    => $personal['name'],
      'country' => $personal['country'],
      'ovr'     => $personal['ovr'],
      'stadium' => $personal['stadium'],
      'img_no'  => $personal['emblem'],
      'std_no'  => $personal['std_img'],
      'emblem'  => $emblem,
      'std_img' => $stdImg
    );
  }
  if ($_POST['role'] == 'Manager') {
    $sql = "
  		SELECT
  			*
  		FROM
  			{$_POST['role']} r
  		WHERE
  			name = '{$_POST['name']}'
    ";
    $personal = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $imageConvert = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$personal['profile']}'
    ";
    $profile = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $imageConvert))['img']);
    $imageConvert = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no =
  				(
  					SELECT
  						emblem
  					FROM
  						Club
  					WHERE
  						name = '{$personal['club']}'
  				)
    ";
    $clubImg = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $imageConvert))['img']);
    $json = array(
      'profile' => $profile,
      'club_img'=> $clubImg,
      'name'    => $personal['name'],
      'country' => $personal['country'],
      'img_no'  => $personal['profile'],
      'ovr'     => $personal['ovr'],
      'club'    => $personal['club'],
      'height'  => $personal['height'],
      'weight'  => $personal['weight'],
      'tactic'  => $personal['tactic'],
      'birth'   => $personal['birth']
    );
  }
  if ($_POST['role'] == 'Player') {
    $sql = "
  		SELECT
  			*
  		FROM
  			{$_POST['role']} r
  		LEFT
  			JOIN Position p
  		    ON r.position = p.position
  		WHERE
  			name = '{$_POST['name']}'
    ";
    $personal = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $imageConvert = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$personal['profile']}'
    ";
    $profile = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $imageConvert))['img']);
    $imageConvert = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no =
  				(
  					SELECT
  						emblem
  					FROM
  						Club
  					WHERE
  						name = '{$personal['club']}'
  				)
    ";
    $clubImg = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $imageConvert))['img']);
    $json = array(
      'profile'  => $profile,
      'club_img' => $clubImg,
      'name'     => $personal['name'],
      'country'  => $personal['country'],
      'img_no'   => $personal['profile'],
      'ovr'      => $personal['ovr'],
      'club'     => $personal['club'],
      'height'   => $personal['height'],
      'weight'   => $personal['weight'],
      'position' => $personal['position'],
      'border'   => $personal['border'],
      'icon'     => $personal['icon'],
      'birth'    => $personal['birth']
    );
  }
  echo json_encode($json);
?>
