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
if(!(isset($submission))) {
$submission = $_SESSION['submission'];
}

$_SESSION['submission'] = $submission;

$course_code = $_SESSION['course_code'];

echo "<font face='verdana, arial, helvetica' size='3' align='left'>Administration Page for $course_code - $submission</font><br><br><br>";
?>

Click "Download" to access a zip file containing <br>
all the files uploaded for this submission. <br><br>


<input type="submit" value="Download" />
<br><br><br><br><hr><br>
<INPUT TYPE="button" VALUE="Back" onClick="location.href ='admin2.php'">
<INPUT TYPE="button" VALUE="Log out" onClick="location.href ='login.php'">

</form>

<!--END USER CODE-->
<!--START HTML TEMPLATE PART II-->
<img src="images/ballet_lg.gif" width="19" height="18" border="0">
</strong></font></blockquote>
<br><br><br><br><br><br>

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
