<?php

require "core.inc.php";
if(isset($_SESSION['email']) && isset($_SESSION['branchM']) && isset($_GET['id']))
{
  $id = $_GET['id'];
  $query = "delete from company where cid = $id";
  try {
    if($res = mysqli_query($conn,$query)){
      header('Location:comp-list.php');
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
