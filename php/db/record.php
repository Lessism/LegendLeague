<?php
  include '../db/db.php';

  $role = $_GET['role'];
  $name = $_GET['name'];

  if ($role == 'Club') {
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
				SUM(countgame) sumcountgame, SUM(maxwin) summaxwin, SUM(maxdraw) summaxdraw, SUM(maxlose) summaxlose,
				SUM(maxwin) / SUM(countgame) winodds, SUM(maxdraw) / SUM(countgame) drawodds, SUM(maxlose) / SUM(countgame) loseodds,
				SUM(maxpoint) summaxpoint, SUM(maxgoalfor) summaxgoalfor, SUM(maxgoalagainst) summaxgoalagainst
			FROM
			(
				SELECT
					COUNT(game) countgame, MAX(win) maxwin, MAX(draw) maxdraw, MAX(lose) maxlose,
					MAX(point) maxpoint, MAX(goalfor) maxgoalfor, MAX(goalagainst) maxgoalagainst
				FROM
					Ranking
				WHERE
					round = game AND
          club = '{$name}'
				GROUP BY
					season
			) AS stat
    ";
    $stat = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
			SELECT
				*, MAX(game) maxgame, max(win) maxwin, MAX(draw) maxdraw, MAX(lose) maxlose, MAX(point) maxpoint
			FROM
				Ranking
			WHERE
				club = '{$name}'
			GROUP BY
				season, club
			ORDER BY
				season DESC
    ";
    $statSeason = mysqli_query($db, $sql);

    $sql = "
			SELECT
				*, MAX(game) maxgame, MAX(win) maxwin, MAX(draw) maxdraw, MAX(lose) maxlose
			FROM
				Ranking
			WHERE
				club =	'{$name}'
			GROUP BY
				season, club
			ORDER BY
				season DESC
    ";
    $record = mysqli_query($db, $sql);
  }

  if ($role == 'Manager') {
    $sql = "
  		SELECT
  			*
  		FROM
  			${role} r
  		WHERE
  			name = '{$name}'
    ";
    $personal = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
			SELECT
				SUM(countgame) sumcountgame, SUM(maxwin) summaxwin, SUM(maxdraw) summaxdraw, SUM(maxlose) summaxlose,
				SUM(maxwin) / SUM(countgame) winodds, SUM(maxdraw) / SUM(countgame) drawodds, SUM(maxlose) / SUM(countgame) loseodds,
				SUM(maxpoint) summaxpoint, SUM(maxgoalfor) summaxgoalfor, SUM(maxgoalagainst) summaxgoalagainst
			FROM
			(
				SELECT
					COUNT(game) countgame, MAX(win) maxwin, MAX(draw) maxdraw, MAX(lose) maxlose,
					MAX(point) maxpoint, MAX(goalfor) maxgoalfor, MAX(goalagainst) maxgoalagainst
				FROM
					Ranking
				INNER
					JOIN (
						SELECT
							name, manager
						FROM
							Club
						WHERE
							manager = '{$name}'
					) AS manager
					ON club = name
				WHERE
					round = game
				GROUP BY
					season
			) AS stat
    ";
    $stat = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
			SELECT
				*, MAX(game) maxgame, MAX(win) maxwin, MAX(draw) maxdraw, MAX(lose) maxlose, MAX(point) maxpoint
			FROM
				Ranking r
			INNER
				JOIN (
					SELECT
						*
					FROM
						Score
					WHERE
						manager = '{$name}'
					GROUP BY
						season, manager
				) AS s
				ON r.season = s.season AND r.club = s.club
			GROUP BY
				r.season, s.club
			ORDER BY
				r.season DESC
    ";
    $statSeason = mysqli_query($db, $sql);

    $sql = "
			SELECT
				*
			FROM
				Score s
			INNER
				JOIN (
					SELECT
						season, club, MAX(game) maxgame, MAX(win) maxwin, MAX(draw) maxdraw, MAX(lose) maxlose, MAX(point) maxpoint
					FROM
						Ranking
					GROUP BY
						season, club
				) AS r
			    ON s.season = r.season AND s.club = r.club
			WHERE
				manager = '{$name}'
			GROUP BY
				s.season, s.manager
    ";
    $record = mysqli_query($db, $sql);
  }

  if ($role == 'Player') {
    $sql = "
  		SELECT
  			*
  		FROM
  			${role} r
  		LEFT
  			JOIN Position p
  		    ON r.position = p.position
  		WHERE
  			name = '{$name}'
    ";
    $personal = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
  		SELECT
  			player, SUM(countgame) sumcountgame, SUM(maxwin) summaxwin, SUM(maxdraw) summaxdraw, SUM(maxlose) summaxlose,
  			SUM(maxwin) / SUM(countgame) winodds, SUM(maxdraw) / SUM(countgame) drawodds, SUM(maxlose) / SUM(countgame) loseodds,
  			AVG(avgrating) avgrating, SUM(sumgoal) sumgoal, SUM(sumassist) sumassist
  		FROM
  			(
  				SELECT
  					player, COUNT(game) countgame, MAX(win) maxwin, MAX(draw) maxdraw, MAX(lose) maxlose,
           			AVG(rating) avgrating, SUM(goal) sumgoal, SUM(assist) sumassist
  				FROM
  					Round r
  				INNER
  					JOIN Ranking rank
  					ON	r.season = rank.season and r.round = rank.round and SUBSTRING_INDEX(r.versus, '_', 1) = rank.club OR
  						r.season = rank.season and r.round = rank.round and SUBSTRING_INDEX(r.versus, '_', -1) = rank.club
  				INNER
  					JOIN (
  						SELECT
  							*
  						FROM
  							Score
  						WHERE
  							player = '{$name}'
  					) AS s
  					ON	r.season = s.season and r.round = s.round and SUBSTRING_INDEX(r.versus, '_', 1) = s.club OR
  						r.season = s.season and r.round = s.round and SUBSTRING_INDEX(r.versus, '_', -1) = s.club
  				WHERE
  					rank.club = s.club
  				GROUP BY
  					r.season
  			) AS stat
  		GROUP BY
  			player
    ";
    $stat = mysqli_fetch_assoc(mysqli_query($db, $sql));

    $sql = "
			SELECT
				r.season, s.player, s.club,
				COUNT(game) countgame, MAX(win) maxwin, MAX(draw) maxdraw, MAX(lose) maxlose,
				AVG(rating) avgrating, SUM(goal) sumgoal, SUM(assist) sumassist
			FROM
				Round r
			INNER
				JOIN Ranking rank
				ON	r.season = rank.season and r.round = rank.round and SUBSTRING_INDEX(r.versus, '_', 1) = rank.club OR
					r.season = rank.season and r.round = rank.round and SUBSTRING_INDEX(r.versus, '_', -1) = rank.club
			INNER
				JOIN (
					SELECT
						*
					FROM
						Score
					WHERE
						player = '{$name}'
				) AS s
				ON	r.season = s.season and r.round = s.round and SUBSTRING_INDEX(r.versus, '_', 1) = s.club OR
					r.season = s.season and r.round = s.round and SUBSTRING_INDEX(r.versus, '_', -1) = s.club
			WHERE
				rank.club = s.club
			GROUP BY
				r.season
			ORDER BY
				r.season DESC
    ";
    $statSeason = mysqli_query($db, $sql);

    $sql = "
			SELECT
				*, COUNT(round) countround, AVG(rating) avgrating, SUM(goal) sumgoal, SUM(assist) sumassist
			FROM
				Score
			WHERE
				player = '{$name}'
			GROUP BY
				season
			ORDER BY
				season DESC
    ";
    $record = mysqli_query($db, $sql);
  }
?>
