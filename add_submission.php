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
$new_submission = $_POST['new_submission'];


if(isset($course_code) && isset($new_submission))
{
include('connection.php');
$query = "ALTER TABLE $course_code ADD `$new_submission` VARCHAR(80);";
$result = mysql_query($query);
mkdir('submission_data/'.$course_code.'/'.$new_submission.'/');
}

print "<script>";
print " self.location='admin2.php';";
print "</script>";


