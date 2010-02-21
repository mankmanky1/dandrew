<html><body>

<form enctype="multipart/form-data" action="admin3.php" method="POST">

<?php
@session_start();
$id = $_SESSION['id'];
$course_code = $_POST['course_code'];
$_SESSION['course_code'] = $course_code;


echo "Welcome to the $course_code administration page <br><br>";
echo 'Please select the submission you wish to access: '; 
echo '<select name="submission">';

include('connection.php');
$result = mysql_query("SHOW COLUMNS FROM $course_code");
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_array($result)) {
	if($row[0] !== 'student_num') {
            echo "<option value = $row[0]>$row[0]</option>";
	}	
    }
}
echo '</select>';
?>

<input type="submit" value="Next" />

<br><br>

Add a new submission for this course:
<input type ='text' class='bginput' name='new_submission' >

</form>

</body></html>
