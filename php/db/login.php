<?php
  include '../../db/db.php';

  $sql = "
    SELECT
      id, pw, role, name
    FROM
      FIFA
    WHERE
      id = '{$_POST['id']}'
  ";
  $info = mysqli_fetch_assoc(mysqli_query($db, $sql));
  if (password_verify($_POST['pw'], $info['pw'])) {
    session_start();
    $_SESSION['login'] = true;
    $_SESSION['id'] = $info['id'];
    $_SESSION['name'] = $info['name'];
    $_SESSION['role'] = $info['role'];
    echo "<script>window.location.replace('/php/league/league.php')</script>";
  } else {
    echo "<script>window.location.replace('/php/account/login.php')</script>";
  }
?>
