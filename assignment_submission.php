<!--START HTML TEMPLATE PART I-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- This Site Was Designed By Wayne D. Fields http://illusivedesign.cjb.net -->
<!-- Please make sure you read all of the read me file that came with this template then
you may delete this comment -->
<html>
<head>
<title>Student Submission System</title>
<meta name="description" content="Insert Description Here">
<meta name="keywords" content="Insert Keywords Here">
<style type="text/css">

a:link, a:active, a:visited {
color: #4A265A; 
text-decoration: underline}

a:hover {
color: #4A265A; 
text-decoration: none}

body {
background-image: URL(images/bg.gif);
background-repeat: repeat-x}
  

</style>
</head>
<body bgcolor="#ffffff" marginwidth="0" marginheight="0" leftmargin="0" topmargin="0">

<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td width = "130"><img src="images/wits.jpg" width="100" height="100" align = "left"></td>
<td><font face='verdana, arial, helvetica' size='6' align='center'>Wits Online Submission System</font>  </td>
</tr>
<tr>

<td width="100"></td>
<td align="center">

<!-- Content --><br><br>
<img src="images/hr_top.gif" width="528" height="58" border="0">

<blockquote><font face="Arial" size="2" color="#000000"><strong>
<img src="images/ballet_lg.gif" width="19" height="18" border="0">
<!--END HTML TEMPLATE PART I-->
<!--START USER CODE-->
<br></br>

<?php
@session_start();
if (!(isset($_SESSION['login'])))
{
print "<script>";
print " self.location='login.php';";
print "</script>";
exit();
}
?>
<?php
//@session_start();
include ('connection.php');
$subject = $_POST['subject'];
if(!isset($subject))
{
$subject = $_SESSION['sub_choice'];
}
$_SESSION['sub_choice'] = $subject;
$userid = $_SESSION['userid'];

$query = "select * from $subject where student_num = '$userid'";
$result = mysql_query($query);
@$subjects = mysql_fetch_array($result, MYSQL_ASSOC);//Dont forget to put MYSQL_NUM to create number indices
echo"<h4>The Assignments due for $subject are shown below:</h4>";
?>
<!--Create the html table-->

<table border = "1">
<tr>
<th>Assignment Due</th>
<th>File Submission</th>
</tr>
<?php
//Display the Project Submissions
if($subjects!=null)
{
	foreach($subjects AS $key=>$value)
	{
		if($key!="student_num")
		{
			if($value == null)
			{
			$value = "no submission";
			}
		echo "<tr>";
		echo"<td>".$key."</td>";
		echo "<td>".$value."</td>";
		echo"</tr>";
		}
	}
}
?>
</table>
<!-- This form will choose the assignment to edit and then allow the user to upload a file-->
<br>If you would like to submit/resubmit an assignment,<br> please choose the assignment below<br>
<form action = "upload_submission.php" method = "post">
<br>
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
<br></br>

<input type="submit" value="Next">
<br><br><br><hr><br>
<INPUT TYPE="button" VALUE="Re-select Course" onClick="location.href ='student.php'">
<INPUT TYPE="button" VALUE="Log out" onClick="location.href ='login.php'">
</form>

<!--END USER CODE-->
<!--START HTML TEMPLATE PART II-->
<img src="images/ballet_lg.gif" width="19" height="18" border="0">
</strong></font></blockquote>

<img src="images/hr_bot.gif" width="528" height="44" border="0">
<!-- Content -->

</td>
</tr>
</table>


</td>
</tr>
</table>

</body>
</html>
<!--END HTML TEMPLATE PART II-->