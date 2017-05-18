<?php
  session_start();
  include "a.php";
  mysql_query("update member set online='N' where username='$_SESSION[username]'");
  session_destroy();
  header("location:../");
?>
