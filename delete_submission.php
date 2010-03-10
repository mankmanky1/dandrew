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
$query = "ALTER TABLE $course_code DROP COLUMN `$deletion`;";
$result = mysql_query($query);
$del_dir = "submission_data/".$course_code."/".$deletion."/";
rmdir($del_dir);
}

print "<script>";
print " self.location='admin2.php';";
print "</script>";

?>


