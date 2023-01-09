<?php
  require 'connection.php';

  $getTranNumber = mysqli_query($con,"SELECT * FROM job_status ORDER BY id DESC");
  if (mysqli_num_rows($getTranNumber) <> 0) {
    $result = mysqli_fetch_array($getTranNumber);
    $countTRN = $result['id'] + 1;
    if (strlen($countTRN) == "1") {
      $tranNumber =  'B94ADS-0000'.$countTRN;
    }elseif (strlen($countTRN) == "2") {
      $tranNumber =  'B94ADS-000'.$countTRN;
    }elseif (strlen($countTRN) == "3") {
      $tranNumber =  'B94ADS-00'.$countTRN;
    }elseif (strlen($countTRN) == "4") {
      $tranNumber =  'B94ADS-0'.$countTRN;
    }elseif (strlen($countTRN) == "5") {
      $tranNumber =  'B94ADS-'.$countTRN;
    }else {
      $tranNumber =  'B94ADS-'.$countTRN;
    }


  }else {
    $tranNumber =  'B94ADS-00001';
  }

 ?>
