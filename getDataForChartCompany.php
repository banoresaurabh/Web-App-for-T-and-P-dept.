<?php
  require "core.inc.php";
  $query = "select * from company_wise_count";
  header('Content-Type: application/json');
  try {
    $mainArray = [];
    $result = mysqli_query($conn,$query);
    while ($res = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
      array_push($mainArray,$res);
    }
    echo json_encode($mainArray);
  } catch (Exception $e) {
  }
?>
