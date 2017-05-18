<?php
error_reporting(0);
session_start();
include "master/control/connect.php";
$web=mysqli_fetch_array(mysqli_query($con, "select * from web where id_web='1'"));

$link="$web[link]/$web[theme]";
$page=$_GET['page'];
include "$web[theme]/index.php";
?>
