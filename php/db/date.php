<?php
  include '../db/db.php';

  $sql = "
		SELECT
			*
		FROM (
			SELECT
				 DATE(visit) visitday, COUNT(submenu) visitpage, SUM(TIMESTAMPDIFF(Minute, visit, quit)) visitstay
			FROM
				Visit
			GROUP BY
				visitday
		) AS visit
		INNER
			JOIN (
				SELECT
					ROUND(AVG(menucount)) avgmenucount, ROUND(AVG(stay)) avgstay, COUNT(session) visitcount, DATE(visit) visitday
				FROM (
					SELECT
						session, visit, COUNT(submenu) menucount, SUM(TIMESTAMPDIFF(Minute, visit, quit)) stay
					FROM
						Visit
					GROUP BY
						session
				) as session
				GROUP BY
					DATE(visit)
			) AS avg
		ON visit.visitday = avg.visitday
  ";
  $list = mysqli_query($db, $sql);
  
  $sql = "
		SELECT (
			SELECT
				ROUND(AVG(visitor)) avgyear
			FROM (
				SELECT
					visit, COUNT(DISTINCT(session)) visitor, 'year'
				FROM
					Visit
				GROUP BY
					YEAR(visit)
			) AS year
			GROUP BY
				year
		) AS year, (
			SELECT
				ROUND(AVG(visitor)) avgmonth
			FROM (
				SELECT
					visit, COUNT(DISTINCT(session)) visitor, 'month'
				FROM
					Visit
				GROUP BY
					MONTH(visit)
			) AS month
			GROUP BY
				month
		) AS month, (
			SELECT
				ROUND(AVG(visitor)) avgday
			FROM (
				SELECT
					visit, COUNT(DISTINCT(session)) visitor, 'day'
				FROM
					Visit
				GROUP BY
					DAY(visit)
			) AS day
			GROUP BY
				day
		) AS day
  ";
  $avgTotal = mysqli_fetch_assoc(mysqli_query($db, $sql));
?>
