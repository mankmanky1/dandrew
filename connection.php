<?php

$user="root";
$host="localhost";
$password="root";
$database="submission_system";

$connection = mysql_connect($host, $user,$password) 
or die ("Could not connect to server.");

$db = mysql_select_db($database, $connection)
or die ("Could not select database.");

?>
