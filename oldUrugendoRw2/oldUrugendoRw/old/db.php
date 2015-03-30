<?php
$mysql_hostname = "localhost";
$mysql_user = "africah_urugendo";
$mysql_password = "Hard2g3t1n!";
$mysql_database = "africah_urugendo";
$prefix = "";
$bd = @mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>