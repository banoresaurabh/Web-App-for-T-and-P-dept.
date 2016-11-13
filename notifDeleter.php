<?php

  require "core.inc.php";
if(isset($_SESSION['email']) && isset($_SESSION['branchM']))
{
  $id = $_GET['id'];
  $query = "delete from notifs where notif_id = $id";
  try {
    if($res = mysqli_query($conn,$query)){
      header('Location:manageNotifs.php');
    }else{
      echo '<div class="alert alert-danger">Some Error occurred please report it to the webmaster</div>';
    }
  } catch (Exception $e) {
    echo '<div class="alert alert-danger">Some Error occurred please report it to the webmaster</div>';
  }

}else{
  header('Location:404.html');
}
 ?>
