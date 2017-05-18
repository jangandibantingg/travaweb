<?php
include "a.php";
$url="https://www.earnwest.co/hook/e4.php?id=$_GET[id]";
$file=file_get_contents($url);
$json=json_decode($file);

mysql_query("delete from withdraw where id_withdraw='$_GET[id]'");

header('location:../withdraw.aspx');
?>
