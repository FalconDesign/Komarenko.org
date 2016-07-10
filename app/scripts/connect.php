<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "piano";

$database = mysql_connect($servername, $username, $password);

mysql_set_charset('utf8');
mysql_select_db($dbname, $database);

?>
