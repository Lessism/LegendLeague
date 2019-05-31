<?php
  include '../db.php';

  $season = $_POST['season'];
  $round = $_POST['round'];

  $sql = "
    SELECT
      *
    FROM
      Round
    WHERE
      season	= {$season} AND
      round	= {$round}
  ";
  $resultSet = mysqli_query($db, $sql);
  $resultArray = array();
  while ($row = mysqli_fetch_assoc($resultSet)){
      $rowArray['versus'] = $row['versus'];
      $rowArray['score'] = $row['score'];
      array_push($resultArray, $rowArray);
  }

  $sql = "
    SELECT
      *
    FROM
      Score
    WHERE
      season	= {$season}	AND
      round	= {$round}	AND
      NOT goal = 0
  ";
  $scoreSet = mysqli_query($db, $sql);
  $scoreArray = array();
  while ($row = mysqli_fetch_assoc($scoreSet)){
      $rowArray = array('club' => $row['club'], 'player' => $row['player']);
      array_push($scoreArray, $rowArray);
  }

  $json = array('result' => $resultArray, 'score' => $scoreArray);
  echo json_encode($json);
?>
