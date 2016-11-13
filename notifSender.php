<?php
require "core.inc.php";
$query = "select * from notifs";
try {
  $str = " ";
    $result = mysqli_query($conn,$query);
    while ($res = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $str = $str."&nbsp &nbsp &nbsp &nbsp &nbsp"."&#9733 ".$res['message'];
    }
    $str = $str." <span class='badge badge-primary'>new<span>";
    echo $str;
} catch (Exception $e) {
}
 ?>
