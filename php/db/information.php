<?php
  include '../../db/db.php';

  if ($_POST['role'] == 'Club'){
    $sql = "
      UPDATE
        {$_POST['role']}
      SET
        country	= '{$_POST['country']}'
      WHERE
        name	= '{$_POST['name']}';
      UPDATE
        Stadium
      SET
        std_name = '{$_POST['stadium']}'
      WHERE
        std_name = '{$_POST['std_name']}';
    ";
    mysqli_multi_query($db, $sql);
    while (mysqli_next_result ($db)) {;}
    if (!empty($_FILES['img1']['tmp_name'])) {
      $img1 = addslashes(file_get_contents($_FILES['img1']['tmp_name']));
      $sql = "
        UPDATE
          Image
        SET
          img = '{$img1}'
        WHERE
          img_no = '{$_POST['std_img']}';
      ";
      mysqli_query($db, $sql);
    }
  }
  if ($_POST['role'] == 'Manager'){
    $sql = "
      UPDATE
        {$_POST['role']}
      SET
        country = '{$_POST['country']}',
        birth   = '{$_POST['birth']}',
        height	= '{$_POST['height']}',
        weight	= '{$_POST['weight']}',
        ovr 		= '{$_POST['ovr']}',
        tactic  = '{$_POST['tactic']}'
      WHERE
        name    = '{$_POST['name']}';
    ";
    mysqli_multi_query($db, $sql);
    while (mysqli_next_result ($db)) {;}
  }
  if ($_POST['role'] == 'Player') {
    $sql = "
      UPDATE
        {$_POST['role']}
      SET
        country	= '{$_POST['country']}',
        birth	= '{$_POST['birth']}',
        height	= '{$_POST['height']}',
        weight	= '{$_POST['weight']}',
        ovr		= '{$_POST['ovr']}',
        position = '{$_POST['position']}'
      WHERE
        name	= '{$_POST['name']}';
    ";
    mysqli_multi_query($db, $sql);
    while (mysqli_next_result ($db)) {;}

  }
  if (!empty($_FILES['img']['tmp_name'])) {
    $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
    $sql = "
      UPDATE
        Image
      SET
        img = '{$img}'
      WHERE
        img_no = '{$_POST['img_no']}';
    ";
    mysqli_query($db, $sql);
  }

  echo "<script>window.location.replace('/php/league/league.php');</script>";
?>
