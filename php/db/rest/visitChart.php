<?php
  include '../../db/db.php';

  if ($_GET['type'] == 'daily') {
    $sql = "
  		SELECT
  			DATE(visit) x, COUNT(session) y
  		FROM (
  			SELECT
  				session, MIN(visit) visit
  			FROM
  				Visit
  			GROUP BY
  				session
  		) AS session
  		GROUP BY
  			x
    ";
    $chart = mysqli_query($db, $sql);
    $json = array();
    while ($row = mysqli_fetch_assoc($chart)){
        $data = array('x' => $row['x'], 'y' => $row['y']);
        array_push($json, $data);
    }
    echo json_encode($json);
  } elseif ($_GET['type'] == 'time') {
      $sql = "
    		SELECT
    			HOUR(visit) x, COUNT(DISTINCT(session)) y
    		FROM
    			Visit
    		WHERE
    			DATE(visit) = CURDATE()
    		GROUP BY
    			HOUR(visit)
      ";
      $chart = mysqli_query($db, $sql);
      $json = array();
      while ($row = mysqli_fetch_assoc($chart)){
          $data = array('x' => $row['x'], 'y' => $row['y']);
          array_push($json, $data);
      }
      echo json_encode($json);
  } elseif ($_GET['type'] == 'week') {
    $sql = "
  		SELECT
  			CASE WEEKDAY(visit)
  				WHEN '0' THEN '월'
  				WHEN '1' THEN '화'
  				WHEN '2' THEN '수'
  				WHEN '3' THEN '목'
  				WHEN '4' THEN '금'
  				WHEN '5' THEN '토'
  				WHEN '6' THEN '일'
  			END label, ROUND(COUNT(DISTINCT(session)) / total * 100) y
  		FROM (
  			SELECT
  				session, visit, (
  					SELECT
  						COUNT(DISTINCT(session))
  					FROM
  						Visit
  				) AS total
  			FROM
  				Visit
  		) as visit
  		GROUP BY
  			WEEKDAY(visit)
    ";
    $chart = mysqli_query($db, $sql);
    $json = array();
    while ($row = mysqli_fetch_assoc($chart)){
        $data = array('label' => $row['label'], 'y' => $row['y']);
        array_push($json, $data);
    }
    echo json_encode($json);
  } elseif ($_GET['type'] == 'year') {
    $sql = "
  		SELECT
  			YEAR(visit) x, COUNT(DISTINCT(session)) y
  		FROM
  			Visit
  		GROUP BY
  			YEAR(visit)
    ";
    $chart = mysqli_query($db, $sql);
    $json = array();
    while ($row = mysqli_fetch_assoc($chart)){
        $data = array('x' => $row['x'], 'y' => $row['y']);
        array_push($json, $data);
    }
    echo json_encode($json);
  } elseif ($_GET['type'] == 'month') {
    $sql = "
  		SELECT
  			MONTH(visit) x, COUNT(DISTINCT(session)) y
  		FROM
  			Visit
  		GROUP BY
  			MONTH(visit)
    ";
    $chart = mysqli_query($db, $sql);
    $json = array();
    while ($row = mysqli_fetch_assoc($chart)){
        $data = array('x' => $row['x'], 'y' => $row['y']);
        array_push($json, $data);
    }
    echo json_encode($json);
  } elseif ($_GET['type'] == 'day') {
    $sql = "
  		SELECT
  			DAY(visit) x, COUNT(DISTINCT(session)) y
  		FROM
  			Visit
  		GROUP BY
  			DAY(visit)
    ";
    $chart = mysqli_query($db, $sql);
    $json = array();
    while ($row = mysqli_fetch_assoc($chart)){
        $data = array('x' => $row['x'], 'y' => $row['y']);
        array_push($json, $data);
    }
    echo json_encode($json);
  } elseif ($_GET['type'] == 'menu') {
    $sql = "
  		SELECT
  			UPPER(menu) label,
  		    ROUND(COUNT(menu) / (
  				SELECT
  					COUNT(menu)
  				FROM
  					Visit
  			) * 100) y
  		FROM
  			Visit
  		GROUP BY
  			menu
  		ORDER BY
  			y DESC
    ";
    $chart = mysqli_query($db, $sql);
    $json = array();
    while ($row = mysqli_fetch_assoc($chart)){
        $data = array('label' => $row['label'], 'y' => $row['y']);
        array_push($json, $data);
    }
    echo json_encode($json);
  } elseif ($_GET['type'] == 'submenu' && $_GET['menu'] == 'master') {
    $sql = "
  		SELECT
  			UPPER(submenu) indexLabel, ROUND(COUNT(submenu) / (
  				SELECT
  					COUNT(menu)
  				FROM
  					Visit
  				WHERE
  					menu = 'master'
  			) * 100) AS label, ROUND(COUNT(submenu) / (
  				SELECT
  					COUNT(menu)
  				FROM
  					Visit
  				WHERE
  					menu = 'master'
  			) * 100) AS y
  		FROM
  			Visit
  		WHERE
  			menu = 'master'
  		GROUP BY
  			submenu
  		ORDER BY
  			y ASC
    ";
    $chart = mysqli_query($db, $sql);
    $json = array();
    while ($row = mysqli_fetch_assoc($chart)){
        $data = array('indexLabel' => $row['indexLabel'], 'label' => $row['label'], 'y' => $row['y']);
        array_push($json, $data);
    }
    echo json_encode($json);
  } elseif ($_GET['type'] == 'submenu' && $_GET['menu'] == 'account') {
    $sql = "
  		SELECT
  			UPPER(submenu) indexLabel, ROUND(COUNT(submenu) / (
  				SELECT
  					COUNT(menu)
  				FROM
  					Visit
  				WHERE
  					menu = 'account'
  			) * 100) AS label, ROUND(COUNT(submenu) / (
  				SELECT
  					COUNT(menu)
  				FROM
  					Visit
  				WHERE
  					menu = 'account'
  			) * 100) AS y
  		FROM
  			Visit
  		WHERE
  			menu = 'account'
  		GROUP BY
  			submenu
  		ORDER BY
  			y ASC
    ";
    $chart = mysqli_query($db, $sql);
    $json = array();
    while ($row = mysqli_fetch_assoc($chart)){
        $data = array('indexLabel' => $row['indexLabel'], 'label' => $row['label'], 'y' => $row['y']);
        array_push($json, $data);
    }
    echo json_encode($json);
  } elseif ($_GET['type'] == 'submenu' && $_GET['menu'] == 'league') {
    $sql = "
  		SELECT
  			UPPER(submenu) indexLabel, ROUND(COUNT(submenu) / (
  				SELECT
  					COUNT(menu)
  				FROM
  					Visit
  				WHERE
  					menu = 'league'
  			) * 100) AS label, ROUND(COUNT(submenu) / (
  				SELECT
  					COUNT(menu)
  				FROM
  					Visit
  				WHERE
  					menu = 'league'
  			) * 100) AS y
  		FROM
  			Visit
  		WHERE
  			menu = 'league'
  		GROUP BY
  			submenu
  		ORDER BY
  			y ASC
    ";
    $chart = mysqli_query($db, $sql);
    $json = array();
    while ($row = mysqli_fetch_assoc($chart)){
        $data = array('indexLabel' => $row['indexLabel'], 'label' => $row['label'], 'y' => $row['y']);
        array_push($json, $data);
    }
    echo json_encode($json);
  } elseif ($_GET['type'] == 'submenu' && $_GET['menu'] == 'fifa') {
    $sql = "
  		SELECT
  			UPPER(submenu) indexLabel, ROUND(COUNT(submenu) / (
  				SELECT
  					COUNT(menu)
  				FROM
  					Visit
  				WHERE
  					menu = 'fifa'
  			) * 100) AS label, ROUND(COUNT(submenu) / (
  				SELECT
  					COUNT(menu)
  				FROM
  					Visit
  				WHERE
  					menu = 'fifa'
  			) * 100) AS y
  		FROM
  			Visit
  		WHERE
  			menu = 'fifa'
  		GROUP BY
  			submenu
  		ORDER BY
  			y ASC
    ";
    $chart = mysqli_query($db, $sql);
    $json = array();
    while ($row = mysqli_fetch_assoc($chart)){
        $data = array('indexLabel' => $row['indexLabel'], 'label' => $row['label'], 'y' => $row['y']);
        array_push($json, $data);
    }
    echo json_encode($json);
  }
?>
