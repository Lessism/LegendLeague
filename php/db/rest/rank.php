<?php
  include '../db.php';

  if (empty($_GET['season'])){

    $sql = "
  		SELECT
  			MAX(round) round
  		FROM
  			Round
  		WHERE
  			season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season) AND
  			score IS NOT NULL
    ";
    $nowRound = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			name
  		FROM
  			Club c
  		LEFT
  			JOIN Ranking r
  			ON c.name = r.club
  		WHERE
  			c.roster = 1 AND
  		  r.season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season) AND
  			NOT r.game = 0
  		GROUP BY
  			c.name
  		ORDER BY
  			r.round DESC,
  			r.point DESC
    ";
    $labels = mysqli_query($db, $sql);

    if ($nowRound != null){

      $datas = array();
      for ($i = 1; $i <= $nowRound['round']; $i++){
        $data = array('round' => $i);
        while ($label = mysqli_fetch_assoc($labels)){
          $sql = "
        		SELECT
        			point
        		FROM
        			Ranking
        		WHERE
        			season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season) AND
        			round	= {$i} AND
        			club	= '{$label['name']}' AND
        			NOT	game = 0
        		ORDER BY
        			round DESC,
        			point DESC
          ";
          $point = mysqli_fetch_assoc(mysqli_query($db, $sql));
          $data['name'] = $label['name'];
          $data[$label['name']] = $point['point'];
          array_push($data, $data);
        }
        mysqli_data_seek(($labels), 0);
        array_push($datas, $data);
      }

      $labelArray = array();
      while ($row = mysqli_fetch_assoc($labels)){
          array_push($labelArray, $row['name']);
      }

      $json = array('data' => $datas, 'labels' => $labelArray);
      echo json_encode($json);
    }
  } else {

    $season = $_GET['season'];
    $sql = "
      SELECT
        *
      FROM
        Season
      WHERE
        season	= {$season}
    ";
    $beforeSeason = mysqli_fetch_assoc(mysqli_query($db, $sql));

    // if ($beforeSeason != null){
      $sql = "
    		SELECT
    			name
    		FROM
    			Club c
    		LEFT
    			JOIN Ranking r
    			ON c.name = r.club
    		WHERE
    			c.roster = 1 AND
    		  r.season = {$season} AND
    			NOT r.game = 0
    		GROUP BY
    			c.name
    		ORDER BY
    			r.round DESC,
    			r.point DESC
      ";
      $labels = mysqli_query($db, $sql);
      $datas = array();
      for ($i = 1; $i <= $beforeSeason['round']; $i++){
        $data = array('round' => $i, 'season' => $season);
        while ($label = mysqli_fetch_assoc($labels)){
          $sql = "
        		SELECT
        			point
        		FROM
        			Ranking
        		WHERE
        			season = {$season} AND
        			round	= {$i} AND
        			club	= '{$label['name']}' AND
        			NOT	game = 0
        		ORDER BY
        			round DESC,
        			point DESC
          ";
          $point = mysqli_fetch_assoc(mysqli_query($db, $sql));
          $data['name'] = $label['name'];
          $data[$label['name']] = $point['point'];
          array_push($data, $data);
        }
        mysqli_data_seek(($labels), 0);
        array_push($datas, $data);
      }

      $labelArray = array();
      while ($row = mysqli_fetch_assoc($labels)){
          array_push($labelArray, $row['name']);
      }

      $json = array('data' => $datas, 'labels' => $labelArray);
      echo json_encode($json);
    // }
  }
?>
