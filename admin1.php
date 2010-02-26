<html><body>

<form enctype="multipart/form-data" action="admin2.php" method="POST">

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

$userid = $_SESSION['userid'];

include('connection.php');
$query = "select admin_course_codes from allusers where student_num = '$userid'";
$result = mysql_query($query);
$rec = mysql_fetch_array($result);
$course_code_string = $rec['admin_course_codes'];
?>

Welcome to the courses administration page. <br><br>
Please select the course you wish to access: 

<?php
$course_code = strtok($course_code_string, ",");
echo '<select name="course_code">';
while ($course_code !== false) {
    echo "<option value = $course_code>$course_code</option>";
    $course_code = strtok(",");
}
echo '</select>';
?>


<input type="submit" value="Next" />

</form>

</body></html>
