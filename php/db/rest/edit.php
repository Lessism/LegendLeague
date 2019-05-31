<?php
  include '../../db/db.php';

  $json = array(
    'role'     => $_POST['role'],
    'name'     => $_POST['name'],
    'country'  => $_POST['country']
  );
  if ($json['role'] == 'Club'){
    $json['stadium'] = $_POST['stadium'];
    $json['std_name'] = $_POST['std_name'];
    $sql = "
      UPDATE
        {$json['role']}
      SET
        country	= '{$json['country']}'
      WHERE
        name	= '{$json['name']}';
    ";
    mysqli_query($db, $sql);

    $sql = "
      UPDATE
        Stadium
      SET
        std_name = '{$json['stadium']}'
      WHERE
        std_name = '{$json['std_name']}';
    ";
    mysqli_query($db, $sql);

    $json['img_no'] = $_POST['img_no'];
    if (!empty($_FILES['img']['tmp_name'])) {
      $image = addslashes(file_get_contents($_FILES['img']['tmp_name']));
      $sql = "
        UPDATE
          Image
        SET
          img = '{$image}'
        WHERE
          img_no = '{$json['img_no']}';
      ";
      mysqli_query($db, $sql);
    }
    $sql = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$json['img_no']}';
    ";
    $img = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $sql))['img']);
    $json['img'] = $img;

    $json['std_img'] = $_POST['std_img'];
    if (!empty($_FILES['img1']['tmp_name'])) {
      $image1 = addslashes(file_get_contents($_FILES['img1']['tmp_name']));
      $sql = "
        UPDATE
          Image
        SET
          img = '{$image1}'
        WHERE
          img_no = '{$json['std_img']}';
      ";
      mysqli_query($db, $sql);
    }
  }
  if ($json['role'] == 'Manager'){
    $json['birth']  = $_POST['birth'];
    $json['height'] = $_POST['height'];
    $json['weight'] = $_POST['weight'];
    $json['ovr']    = $_POST['ovr'];
    $json['tactic'] = $_POST['tactic'];
    $sql = "
      UPDATE
        {$json['role']}
      SET
        country	= '{$json['country']}',
        birth 	= '{$json['birth']}',
        height	= '{$json['height']}',
        weight	= '{$json['weight']}',
        ovr	  	= '{$json['ovr']}',
        tactic  = '{$json['tactic']}'
      WHERE
        name	= '{$json['name']}';
    ";
    mysqli_query($db, $sql);

    $json['img_no'] = $_POST['img_no'];
    if (!empty($_FILES['img']['tmp_name'])) {
      $image = addslashes(file_get_contents($_FILES['img']['tmp_name']));
      $sql = "
        UPDATE
          Image
        SET
          img = '{$image}'
        WHERE
          img_no = '{$json['img_no']}';
      ";
      mysqli_query($db, $sql);
    }
    $sql = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$json['img_no']}';
    ";
    $img = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $sql))['img']);
    $json['img'] = $img;

  }
  if ($json['role'] == 'Player') {
    $json['birth']    = $_POST['birth'];
    $json['height']   = $_POST['height'];
    $json['weight']   = $_POST['weight'];
    $json['ovr']      = $_POST['ovr'];
    $json['position'] = $_POST['position'];
    $sql = "
      UPDATE
        {$json['role']}
      SET
        country  = '{$json['country']}',
        birth 	 = '{$json['birth']}',
        height	 = '{$json['height']}',
        weight	 = '{$json['weight']}',
        ovr	  	 = '{$json['ovr']}',
        position = '{$json['position']}'
      WHERE
        name	= '{$json['name']}';
    ";
    mysqli_query($db, $sql);
    $sql = "
      SELECT
        *
      FROM
        Position
      WHERE
        position = '{$json['position']}'
    ";
    $po = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $json['potype'] = $po['type'];
    $json['poicon'] = $po['icon'];



    $json['img_no'] = $_POST['img_no'];
    if (!empty($_FILES['img']['tmp_name'])) {
      $image = addslashes(file_get_contents($_FILES['img']['tmp_name']));
      $sql = "
        UPDATE
          Image
        SET
          img = '{$image}'
        WHERE
          img_no = '{$json['img_no']}';
      ";
      mysqli_query($db, $sql);
    }
    $sql = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no = '{$json['img_no']}';
    ";
    $img = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $sql))['img']);
    $json['img'] = $img;
  }
  echo json_encode($json);
?>
