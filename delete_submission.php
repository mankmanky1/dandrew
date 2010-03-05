<?php
@session_start();

if (!(isset($_SESSION['login'])))
{
print "<script>";
print " self.location='login.php';";
print "</script>";
exit();
}

$id = $_SESSION['id'];

$course_code = $_SESSION['course_code'];
$deletion = $_POST['deletion'];


if(isset($course_code) && isset($deletion))
{
include('connection.php');
$query = "ALTER TABLE $course_code drop $deletion;";
$result = mysql_query($query);
rmdir('submission_data/'.$course_code.'/'.$deletion.'/');
}

print "<script>";
print " self.location='admin2.php';";
print "</script>";


