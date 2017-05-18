<?php
error_reporting(0);
include "../../control/koneksi.php";
mysql_query("delete from member where username='$_GET[id]'");
echo "akun $_GET[id] terhapus";

?>