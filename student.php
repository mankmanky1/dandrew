<html>
<body>
<?php
@session_start();
echo"Welcome to the student submission website<br><br>";
$id = $_SESSION['id'];
 


?>
<form enctype="multipart/form-data" action="uploader.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
Choose a file to upload: <input name="uploadedfile" type="file" /><br />
<input type="submit" value="Upload File" />

<?php
$userid = $_SESSION['userid'];

include('connection.php');
$query = "select student_course_codes from allusers where student_num = '$userid'";
$result = mysql_query($query);
$rec = mysql_fetch_array($result);
$course_code_string = $rec['course_codes'];
echo "This works $userid $course_code_string<br><br>";



?>
<select name="food">
<option value="pizza">Pizza</option>
<option value="icecream">Ice Cream</option>
<option value="eggsham">Green Eggs and Ham</option>
</select>

</form>


</body>

</html>
