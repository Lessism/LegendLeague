<?php
  include '../db/db.php';

  $sql = "
		SELECT
			COUNT(session) total
		FROM (
			SELECT
				*
			FROM
				Visit
			GROUP BY
				session
		) AS total
  ";
  $total = mysqli_fetch_assoc(mysqli_query($db, $sql))['total'];

  $sql = "
		SELECT
			COUNT(session) today
		FROM (
			SELECT
				*
			FROM
				Visit
			WHERE
				DATE(visit) = CURDATE()
			GROUP BY
				session
		) AS today
  ";
  $today = mysqli_fetch_assoc(mysqli_query($db, $sql))['today'];

  $sql = "
		SELECT
			COUNT(session) visitor,
      SUM(page) totalpage,
      SUM(stay) totalstay,
      ROUND(AVG(page)) avgpage,
      ROUND(AVG(stay)) avgstay
		FROM (
			SELECT
				*, COUNT(submenu) page, SUM(TIMESTAMPDIFF(MINUTE, visit, quit)) stay
			FROM
				Visit
			WHERE
				DATE(visit) = CURDATE()
			GROUP BY
				session
		) AS today
  ";
  $todayTotal = mysqli_fetch_assoc(mysqli_query($db, $sql));

  $sql = "
		SELECT
			SUM(visitcount) totalcount,
			SUM(visitpage) totalpage,
		    SUM(visitstay) totalstay,
		    ROUND(AVG(avgmenucount)) totalavgmenucount,
		    ROUND(AVG(avgstay)) totalavgstay,
		    ROUND(AVG(visitcount)) totalavgcount
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
					AVG(menucount) avgmenucount, AVG(stay) avgstay, COUNT(session) visitcount, DATE(visit) visitday
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
  $listTotal = mysqli_fetch_assoc(mysqli_query($db, $sql));
?>
