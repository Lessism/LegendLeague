<?php
  include '../db.php';
  $sql = "
		SELECT
			*
		FROM
			Club
		WHERE
			name =	( SELECT * FROM (
    							SELECT
    								club
    							FROM
    								Ranking
    							WHERE
    								season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
    							ORDER BY
    								point DESC, goalfor - goalagainst DESC
    							LIMIT
    								1
						  ) AS club )
  ";
  $champion = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		UPDATE
			Season
		SET
			champion		=	(SELECT * FROM (
									SELECT
										club
									FROM
										Ranking
									WHERE
										season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
									ORDER BY
										point DESC
									LIMIT
										1
								) AS champion ),
			manager			=	(SELECT * FROM (
									SELECT
										manager
									FROM
										Club
									WHERE
										name = (SELECT * FROM (
													SELECT
														club
													FROM
														Ranking
													WHERE
														season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
													ORDER BY
														point DESC
													LIMIT
														1
												) AS champion )
								) AS manager ),
			ballondor		=	(SELECT * FROM (
									SELECT
										player
									FROM
										Score
									WHERE
										season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
									GROUP BY
										player
									ORDER BY
										AVG(rating) DESC, goal DESC, assist DESC
									LIMIT
										1
								) AS ballondor),
			goalscorer		=	(SELECT * FROM (
									SELECT
										player
									FROM
										Score
									WHERE
										season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)	AND
										NOT goal = 0
									GROUP BY
										player
									ORDER BY
										SUM(goal) DESC, assist DESC, rating DESC
									LIMIT
										1
								) AS goalscorer),
			assistprovider		=	(SELECT * FROM (
									SELECT
										player
									FROM
										Score
									WHERE
										season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)	AND
										NOT assist = 0
									GROUP BY
										player
									ORDER BY
										SUM(assist) DESC, goal DESC, rating DESC
									LIMIT
										1
								) AS assistprovider)
		WHERE
			season	= (SELECT * FROM (SELECT MAX(season) FROM Season) AS season);

    INSERT
      INTO awardclub (
        season,
        name,
        stadium,
        manager,
        player0,
        player1,
        player2,
        player3,
        player4,
        player5,
        player6,
        player7,
        player8,
        player9,
        player10,
        ovr
      )
      SELECT
        season,
        name,
        stadium,
        c.manager,
        player0,
        player1,
        player2,
        player3,
        player4,
        player5,
        player6,
        player7,
        player8,
        player9,
        player10,
        ovr
      FROM
        Season
      LEFT
        JOIN Club c
          ON champion = name
      WHERE
        season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season);

    INSERT
      INTO awardmanager (
        season,
        name,
        club,
        country,
        ovr,
        tactic
      )
      SELECT
        season,
        name,
        club,
        country,
        ovr,
        tactic
      FROM
        Season
      LEFT
        JOIN Manager
          ON manager = name
      WHERE
        season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season);

    INSERT
      INTO ballondor (
        season,
        name,
        club,
        country,
        ovr,
        position
      )
      SELECT
        season,
        name,
        club,
        country,
        ovr,
        position
      FROM
        Season
      LEFT
        JOIN Player
          ON ballondor = name
      WHERE
        season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season);

		UPDATE
			Club
		SET
			history	= CONCAT_WS(',', (SELECT * FROM (SELECT history FROM Club WHERE name = '{$champion['name']}') AS history), '{$_POST['history']} Legend League Champion')
		WHERE
			name	= '{$champion['name']}';

		UPDATE
			Manager
		SET
			history	= CONCAT_WS(',', (SELECT * FROM (SELECT history FROM Manager WHERE name = '{$champion['manager']}') AS history), '{$_POST['history']} Legend League Champion')
		WHERE
			name	= '{$champion['manager']}';

		UPDATE
			Player
		SET
			history = CONCAT_WS(',', (SELECT * FROM
										(SELECT history FROM Player WHERE name =
											(SELECT * FROM (
												SELECT
													player
												FROM
													Score
												WHERE
													season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
												GROUP BY
													player
												ORDER BY
													AVG(rating) DESC, goal DESC, assist DESC
												LIMIT
													1
											) AS ballondor)
										) AS history)
									, '{$_POST['history']} Ballon Dor')
		WHERE
			name = (SELECT * FROM (
						SELECT
							player
						FROM
							Score
						WHERE
							season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
						GROUP BY
							player
						ORDER BY
							AVG(rating) DESC, goal DESC, assist DESC
						LIMIT
							1
					) AS ballondor);
  ";
  mysqli_multi_query($db, $sql);
  while (mysqli_next_result ($db)) {;}

  for ($i=0; $i < 11; $i++) {
    $sql = "
      UPDATE
        Player
      SET
        history	= CONCAT_WS(',', (SELECT * FROM (SELECT history FROM Player WHERE name = '{$champion['player'.$i]}') AS history), '{$_POST['history']} Legend League Champion')
      WHERE
        name	= '{$champion['player'.$i]}'
    ";
    mysqli_query($db, $sql);
  };

  $sql = "
    SELECT
      *
    FROM
      Season
    WHERE
      season	= (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)
  ";
  $seasonAward = mysqli_fetch_assoc(mysqli_query($db, $sql));

  if($seasonAward['goalscorer']){
    $sql = "
      INSERT
        INTO goalscorer (
          season,
          name,
          club,
          country,
          ovr,
          position
        )
        SELECT
          season,
          name,
          club,
          country,
          ovr,
          position
        FROM
          Season
        LEFT
          JOIN Player
            ON goalscorer = name
        WHERE
          season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season);

      UPDATE
        Player
      SET
        history = CONCAT_WS(',', (SELECT * FROM
                  (SELECT history FROM Player WHERE name =
                    (SELECT * FROM (
                      SELECT
                        player
                      FROM
                        Score
                      WHERE
                        season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)	AND
                        NOT goal = 0
                      GROUP BY
                        player
                      ORDER BY
                        SUM(goal) DESC, assist DESC, rating DESC
                      LIMIT
                        1
                    ) AS goalscorer)
                  ) AS history)
                , '{$_POST['history']} Goal Scorer')
      WHERE
        name = (SELECT * FROM (
          SELECT
            player
          FROM
            Score
          WHERE
            season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)	AND
            NOT goal = 0
          GROUP BY
            player
          ORDER BY
            SUM(goal) DESC, assist DESC, rating DESC
          LIMIT
            1
        ) AS goalscorer);
    ";
    mysqli_multi_query($db, $sql);
    while (mysqli_next_result ($db)) {;}

    if($seasonAward['assistprovider']){
      $sql = "
        INSERT
          INTO assistprovider (
            season,
            name,
            club,
            country,
            ovr,
            position
          )
          SELECT
            season,
            name,
            club,
            country,
            ovr,
            position
          FROM
            Season
          LEFT
            JOIN Player
                ON assistprovider = name
          WHERE
            season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season);

        UPDATE
          Player
        SET
          history = CONCAT_WS(',', (SELECT * FROM
                    (SELECT history FROM Player WHERE name =
                      (SELECT * FROM (
                        SELECT
                          player
                        FROM
                          Score
                        WHERE
                          season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)	AND
                          NOT assist = 0
                        GROUP BY
                          player
                        ORDER BY
                          SUM(assist) DESC, goal DESC, rating DESC
                        LIMIT
                          1
                      ) AS assistprovider)
                    ) AS history)
                  , '{$_POST['history']} Assist Provider')
        WHERE
          name = (SELECT * FROM (
            SELECT
              player
            FROM
              Score
            WHERE
              season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)	AND
              NOT assist = 0
            GROUP BY
              player
            ORDER BY
              SUM(assist) DESC, goal DESC, rating DESC
            LIMIT
              1
          ) AS assistprovider);
      ";
      mysqli_multi_query($db, $sql);
      while (mysqli_next_result ($db)) {;}
    };
  };
  $sql = "
    INSERT
      INTO Season (
        season,
        roster
        )
      VALUES (
        (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)+1,
        (SELECT * FROM (SELECT roster FROM Season WHERE season = (SELECT * FROM (SELECT MAX(season) FROM Season) AS season)) AS roster)
      );

      UPDATE
        League
      SET
        season	= (SELECT * FROM (SELECT MAX(season) FROM Season) AS season),
        round	= null
      WHERE
        name	= 'Legend League';
  ";
  mysqli_multi_query($db, $sql);
  //while (mysqli_next_result ($db)) {;}
  mysqli_close($db);
?>
