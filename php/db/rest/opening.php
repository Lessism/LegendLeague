<?php
  include '../db.php';

  $season = $_POST['season'];
  $roster = explode(',', $_POST['roster']);
  $rosterCount = count($roster);

  for ($round = 1; $round <= ($rosterCount-1)*2; $round++){

    $versus = null;
    $home = 0;
    $away = $round-1;

    for ($i = 0; $i < $rosterCount/2; $i++){

      if ($away == 0){
        $away = $rosterCount-1;
      }
      if ($away >= $rosterCount){
        $away = $round - $rosterCount;
      }

      if ($round <= $rosterCount-1){
        if ($versus == null){
          $versus = $roster[$home].'_'.$roster[$away];
        } else {
          $versus .= ','.$roster[$home].'_'.$roster[$away];
        }
        if ($home < $round){
          $home = $round-1;
        }
      }
      if ($round > $rosterCount-1){
        if ($versus == null){
          $versus = $roster[$away].'_'.$roster[$home];
        } else {
          $versus .= ','.$roster[$away].'_'.$roster[$home];
        }
        if ($home < $round-($rosterCount-1)){
          $home = $round - $rosterCount;
        }
      }
      if ($home >= $rosterCount-1){
        $home = 0;
      }
      $home++;
      $away--;
    }

    $roundVersus = explode(',', $versus);
  	for ($ii = 0; $ii < count($roundVersus); $ii++){
      $sql = "
  			INSERT
  				INTO Round (
  					season,
  					round,
  					versus
  				)
  				VALUES (
  					{$season},
  					{$round},
  					'{$roundVersus[$ii]}'
  				)
      ";
      mysqli_query($db, $sql);
    }
    for ($iii = 0; $iii < $rosterCount; $iii++){
      $sql = "
  			INSERT
  				INTO Ranking (
  					season,
  					round,
  					club
  				)
  				VALUES (
  					{$season},
  					{$round},
  					'{$roster[$iii]}'
  				)
      ";
      mysqli_query($db, $sql);
    }
  }
  $sql = "
		UPDATE
			League
		SET
			round = 1
		WHERE
			season = {$season};

		UPDATE
			Season
		SET
			round = 1
		WHERE
			season = {$season}
  ";
  mysqli_multi_query($db, $sql);
  mysqli_close($db);
?>
