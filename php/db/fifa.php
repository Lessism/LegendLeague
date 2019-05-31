<?php
  include '../db/db.php';
  $sql = '
    SELECT
			*
		FROM
			Season
		ORDER BY
			season DESC
		LIMIT
			1
  ';
  $leagueSeason = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			*, SUM(countcountry) sumcountcountry
		FROM (
			SELECT
				country, COUNT(country) countcountry
			FROM
				Club
			GROUP BY
				country
			UNION ALL
				SELECT
					country, COUNT(country) countcountry
				FROM
					Manager
				GROUP BY
					country
			UNION ALL
				SELECT
					country, COUNT(country) countcountry
				FROM
					Player
				GROUP BY
					country
		) AS country
		GROUP BY
			country
		ORDER BY
			sumcountcountry DESC, country ASC
  ";
  $countryList = mysqli_query($db, $sql);

  $backImage = "
    SELECT
      img
    FROM
      Image
    WHERE
      img_no = 1000
  ";
  $back = base64_encode(mysqli_fetch_assoc(mysqli_query($db, $backImage))['img']);

  $sql = "
		SELECT
			*, ovr + (CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion') rankpoint
		FROM
			Club
		ORDER BY
			rankpoint DESC
		LIMIT
			1
  ";
  $fifaBestClub = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			*, ovr + (CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion') * 2 rankpoint
		FROM
			Manager
		ORDER BY
			rankpoint DESC
		LIMIT
			1
  ";
  $fifaBestManager= mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			*
		FROM (
			SELECT
				name, profile, country, birth, height, weight, p.ovr fadf, club, po.position position, ovr, type, icon, ovr
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Ballon Dor',''))) DIV CHAR_LENGTH('Ballon Dor')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Goal Scorer',''))) DIV CHAR_LENGTH('Goal Scorer')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Assist Provider',''))) DIV CHAR_LENGTH('Assist Provider') rankpoint
			FROM
				Player p
			INNER
				JOIN Position po
				ON p.position = po.position
			WHERE
				type = 'GK'
			ORDER BY
				rankpoint DESC
			LIMIT
				1
		) AS base
		UNION (
			SELECT
				name, profile, country, birth, height, weight, p.ovr fadf, club, po.position position, ovr, type, icon, ovr
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Ballon Dor',''))) DIV CHAR_LENGTH('Ballon Dor')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Goal Scorer',''))) DIV CHAR_LENGTH('Goal Scorer')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Assist Provider',''))) DIV CHAR_LENGTH('Assist Provider') rankpoint
			FROM
				Player p
			INNER
				JOIN Position po
				ON p.position = po.position
			WHERE
				po.position = 'CB'
			ORDER BY
				rankpoint DESC
			LIMIT
				2
		)
		UNION (
			SELECT
				name, profile, country, birth, height, weight, p.ovr fadf, club, po.position position, ovr, type, icon, ovr
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Ballon Dor',''))) DIV CHAR_LENGTH('Ballon Dor')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Goal Scorer',''))) DIV CHAR_LENGTH('Goal Scorer')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Assist Provider',''))) DIV CHAR_LENGTH('Assist Provider') rankpoint
			FROM
				Player p
			INNER
				JOIN Position po
				ON p.position = po.position
			WHERE
				po.position = 'WB'
			ORDER BY
				rankpoint DESC
			LIMIT
				2
		)
		UNION (
			SELECT
				name, profile, country, birth, height, weight, p.ovr fadf, club, po.position position, ovr, type, icon, ovr
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Ballon Dor',''))) DIV CHAR_LENGTH('Ballon Dor')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Goal Scorer',''))) DIV CHAR_LENGTH('Goal Scorer')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Assist Provider',''))) DIV CHAR_LENGTH('Assist Provider') rankpoint
			FROM
				Player p
			INNER
				JOIN Position po
				ON p.position = po.position
			WHERE
				po.type = 'MF'
			ORDER BY
				rankpoint DESC
			LIMIT
				3
		)
		UNION (
			SELECT
				name, profile, country, birth, height, weight, p.ovr fadf, club, po.position position, ovr, type, icon, ovr
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Champion',''))) DIV CHAR_LENGTH('Champion')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Ballon Dor',''))) DIV CHAR_LENGTH('Ballon Dor')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Goal Scorer',''))) DIV CHAR_LENGTH('Goal Scorer')
				+(CHAR_LENGTH(history)-CHAR_LENGTH(REPLACE(history,'Assist Provider',''))) DIV CHAR_LENGTH('Assist Provider') rankpoint
			FROM
				Player p
			INNER
				JOIN Position po
				ON p.position = po.position
			WHERE
				po.type = 'FW'
			ORDER BY
				rankpoint DESC
			LIMIT
				3
		)
  ";
  $fifaBestEleven = mysqli_query($db, $sql);
?>
