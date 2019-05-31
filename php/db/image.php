<?php
  include 'db.php';

  if (empty($imgId)){
    $imgId = '';
  }
  if (!empty($imgNo)){
      $imageConvert = "
        SELECT
          img
        FROM
          Image
        WHERE
          img_no = {$imgNo}
      ";
  } else {
    switch ($imgRole) {
      case 'Club':
        $img = 'emblem';
        $na = 'name';
        break;
      case 'Stadium':
        $img = 'std_img';
        $na = 'std_name';
        break;
      default:
        $img = 'profile';
        $na = 'name';
    }
    $imageConvert = "
      SELECT
        img
      FROM
        Image
      WHERE
        img_no =
  				(
  					SELECT
  						{$img}
  					FROM
  						{$imgRole}
  					WHERE
  						{$na} = '{$imgName}'
  				)
    ";
  }

  if (mysqli_num_rows(mysqli_query($db, $imageConvert)) < 1 ) {
  $imageConvert = "
    SELECT
      img
    FROM
      Image
    WHERE
      img_no = 1000
  ";
  }
  echo '<img class="'.$imgClass.'" id="'.$imgId.'" src="data:image/jpeg;base64,'.base64_encode(mysqli_fetch_array(mysqli_query($db, $imageConvert))['img']).'" style="'.$imgStyle.'"/>';
  unset($imgId);
  unset($imgNo);
?>
