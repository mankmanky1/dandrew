<html>
<body>
<?php
@session_start();
$id = $_SESSION['id'];
$userid = $_SESSION['userid'];
echo"Welcome to the student submission website user $userid<br><br>";
?>

<form action="assignment_submission.php" method = "post">
<?php
//open the database connection
include('connection.php');
$query = "select student_course_codes from allusers where student_num = '$userid'";
$result = mysql_query($query);
$rec = mysql_fetch_array($result);
$course_code_string = $rec['student_course_codes'];
$ccs = array();
$ccs = explode(',', $course_code_string); // Multiple names 
?>
<h2>Please choose the subject in which you would like to submit a submission</h2> 
<!-- Choose a subject to submit -->
<select name="subject">
<?php
$i=0;
while ($ccs[$i]!=null)
{
echo "<option value='$ccs[$i]'>$ccs[$i]</option>";
$i++;
}
?>
</select>
<input type='submit' value='Next'>
</form>


</body>
</html>