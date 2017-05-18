<?php
include "a.php";
$dip=mysql_query("select * from member");
while($data=mysql_fetch_array($dip))
{
	$neg=mysql_query("select * from negara where username='$data[username]'");
	if (mysql_num_rows($neg) == null)
	{
		$user_ip =$data[ip];
		$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
		$region = $geo["geoplugin_countryName"];
		$code = $geo["geoplugin_countryCode"];
		$x = $geo["geoplugin_latitude"];
		$y = $geo["geoplugin_longitude"];

		mysql_query("insert negara (username,country,iso,x,y,ip) values ('$data[username]','$region','$code','$x ','$y','$user_ip')");
	}
}


?>
