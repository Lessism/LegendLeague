<?php
  include '../db/db.php';

  $role = $_GET['role'];
  $name = $_GET['name'];

  $sql = "
		SELECT
			*
		FROM
			${role} r
		INNER
			JOIN Stadium s
		    ON r.stadium = s.std_name
		WHERE
			name = '{$name}'
  ";
  $personal = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			*
		FROM
			Manager m
		INNER
			JOIN Tactic t
            ON m.tactic = t.tactic
		WHERE
			name = '{$personal['manager']}'
  ";
  $manager = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			*
		FROM
			Player p
		LEFT
			JOIN Position po
		    ON p.position = po.position
		WHERE
			name = '{$personal['player0']}' OR
			name = '{$personal['player1']}' OR
			name = '{$personal['player2']}' OR
			name = '{$personal['player3']}' OR
			name = '{$personal['player4']}' OR
			name = '{$personal['player5']}' OR
			name = '{$personal['player6']}' OR
			name = '{$personal['player7']}' OR
			name = '{$personal['player8']}' OR
			name = '{$personal['player9']}' OR
			name = '{$personal['player10']}'
		ORDER BY
			po.no ASC, ovr DESC
  ";
  $squads = mysqli_query($db, $sql);
?>
