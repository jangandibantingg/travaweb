<?php
error_reporting(0);
include "control/connect.php";
$web=mysqli_fetch_array(mysqli_query($con, "select * from web where id_web='1'"));
session_start();
$page=$_GET['page'];
if ($_SESSION['username']){
  include "view/dev.index.php";
}else{
  echo "<h1><img src='library/file/$web[logo]'> </h1>";
  echo "<form method='post' action='control/ceck_login.php'>
          <input name=username type=text placeholder=username>
          <input name=password type=password placeholder=password>
          <input type='submit'>
        </form>
  ";
}




?>
