<!-- The submissions list -->
<?php
@session_start();
include ('connection.php');
$_SESSION['sub_choice'] = $_POST['subject'];
$userid = $_SESSION['userid'];
$subject = $_POST['subject'];
$query = "select * from $subject where student_num = '$userid'";
$result = mysql_query($query);
$subjects = mysql_fetch_array($result, MYSQL_ASSOC);//Dont forget to put MYSQL_NUM to create number indices

?>
<!--Create the html table-->
<h4>The Assignments due are below:</h4>
<table border = "1">
<tr>
<th>Assignment Due</th>
<th>File Submission</th>
</tr>
<?php
//Display the Project Submissions
foreach($subjects AS $key=>$value)
{
	if($key!="student_num")
	{
		if($value == null)
		{
		$value = "not submitted";
		}
	echo "<tr>";
	echo"<td>".$key."</td>";
	echo "<td>".$value."</td>";
	echo"</tr>";
	}
}

?>
</table>
<!-- This form will choose the assignment to edit and then allow the user to upload a file-->
<h4>If you would like to submit/resubmit an assignment, please choose the assignment below<h4>
<form action = "upload_submission.php" method = "post">
<select name="assignment">
<?php
foreach($subjects AS $key=>$value)
{
	if($key!="student_num")
	{
	echo "<option value = '$key'>".$key."</option>";
	}
}
?>
</select>
<input type="submit" value="Next">
</form>