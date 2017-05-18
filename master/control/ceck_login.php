<?php
error_reporting(0);
include "connect.php";
$password=md5($_POST['password']);
$test=mysqli_query($con, "select * from admins where username='$_POST[username]' and password='$password'");
if (mysqli_num_rows($test) > 0 ){
    session_start();
    $_SESSION['username'] = $_POST['username'];
    // echo $_SESSION['username'];
    header('location:../');
}else{
  echo "data tidak ada <a href='../'>Login lagi</a>";

}

mysqli_close($con);
 ?>
