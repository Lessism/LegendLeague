<?php
  include '../../db/db.php';
  // roster = a,d,f,g,h,hj
  // rosterlist = map.put("rosterlist", roster.split(","));
  $roster = '';
  $rosterlist = '';
  print_r($_POST);
  if (!empty($_POST['roster'])) {
    $rosterlist = $_POST['roster'];
    $roster = implode(',', $rosterlist);
  }
  if (empty($_POST['name'])) {
    $sql = "
      UPDATE
        League
      SET
        club0 = null,
        club1 = null,
        club2 = null,
        club3 = null,
        club4 = null,
        club5 = null,
        club6 = null,
        club7 = null,
        club8 = null,
        club9 = null
      WHERE
        name = 'Legend League';

      UPDATE
        Club
      SET
        roster = 0
      WHERE
        roster = 1;

      UPDATE
        Season
      SET
        roster = '{$roster}'
      WHERE
        season =
          (
            SELECT
              *
            FROM
              (
                SELECT
                  MAX(season)
                FROM
                  Season
              ) AS a
          );
    ";
    mysqli_multi_query($db, $sql);
    while (mysqli_next_result ($db)) {;}
    if (!empty($_POST['roster'])) {
      for ($i = 0; $i < count($rosterlist); $i++) {
        $sql = "
					UPDATE
						League
					SET
						club${i} = '{$rosterlist[$i]}'
					WHERE
						name = 'Legend League';
					UPDATE
						Club
					SET
						roster = 1
					WHERE
						name = '{$rosterlist[$i]}'
        ";
        mysqli_multi_query($db, $sql);
        while (mysqli_next_result ($db)) {;}
      }
    }
    echo "<script>window.location.replace('/php/master/roster.php');</script>";
  } else {
    $name = $_POST['name'];
    $manager = null;
    $sql = "
			UPDATE
				Club
			SET
				manager = null,
				player0 = null,
				player1 = null,
				player2 = null,
				player3 = null,
				player4 = null,
				player5 = null,
				player6 = null,
				player7 = null,
				player8 = null,
				player9 = null,
				player10 = null
			WHERE
				name = '{$name}';
			UPDATE
				Manager
			SET
				club = null
			WHERE
				club = '{$name}';
			UPDATE
				Player
			SET
				club = null
			WHERE
				club = '{$name}';
    ";
    mysqli_multi_query($db, $sql);
    while (mysqli_next_result ($db)) {;}
    if (!empty($_POST['manager'])) {
      $manager = $_POST['manager'];
      $sql = "
        UPDATE
          Manager
        SET
          club = '{$name}'
        WHERE
          name = '{$manager}';
        UPDATE
          Club
        SET
          manager = '{$manager}'
        WHERE
          name = '{$name}'
      ";
      mysqli_multi_query($db, $sql);
      while (mysqli_next_result ($db)) {;}
    }
    if (!empty($_POST['roster'])) {
      for ($i = 0; $i < count($rosterlist); $i++) {
        $sql = "
      		UPDATE
      			Club
      		SET
      			player${i} = '{$rosterlist[$i]}'
      		WHERE
      			name = '{$name}';
      		UPDATE
      			Player
      		SET
      			club = '{$name}'
      		WHERE
      			name = '{$rosterlist[$i]}'
        ";
        mysqli_multi_query($db, $sql);
        while (mysqli_next_result ($db)) {;}
      }
    }
    $sql = "
			UPDATE
				Club
			SET
				ovr =
					((
						SELECT
							AVG(ovr)
						FROM
							Player
						WHERE
							club = '{$name}'
					) + (
						SELECT
							ovr
						FROM
							Manager
						WHERE
							club = '{$name}'
					)) / 2
			WHERE
				name = '{$name}'
    ";
    mysqli_query($db, $sql);
    echo "<script>window.location.replace('/php/master/roster.php?name={$name}');</script>";
  }
?>
