<html><body>

<form enctype="multipart/form-data" action="download.php" method="POST">

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

$submission = $_POST['submission'];
$course_code = $_SESSION['course_code'];
$_SESSION['submission'] = $submission;

echo "Welcome to the $course_code - $submission administration page <br><br>";
?>

Click "Download" to access a zip file containing all the files uploaded for this submission. <br><br>


<input type="submit" value="Download" />

</form>

</body></html>
