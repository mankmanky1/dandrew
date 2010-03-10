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

$submission = $_SESSION['submission'];
$course_code = $_SESSION['course_code'];
 
 
include('connection.php');
$query = "select student_num, `$submission` from $course_code";
$result = mysql_query($query);
$student_num = '00000000';
$file_root = "submission_data/${course_code}/${submission}/";

$zip_name = "${course_code}_${submission}.zip";
$zip_full_path = "submission_data/${course_code}/${submission}/$zip_name";

echo "$zip_name contains:<br><br>";

@unlink($zip_full_path);
 
$zip = new ZipArchive;
$res = $zip->open($zip_full_path, ZIPARCHIVE::CREATE);
if ($res === TRUE) {
 
    while ($rec = mysql_fetch_array($result)) {
        $student_num = $rec['0'];
        $file_name = $rec['1'];
	$file_path = $file_root.$file_name;
        if (isset($file_name) && file_exists($file_path) && $file_name !== "") {
	    $zip->addEmptyDir($student_num);
	    $add = $zip->addFile($file_path, "{$student_num}/{$file_name}");
	    echo "{$student_num} - {$file_name} <br>";
        } else {
	    echo "{$student_num} - No submission <br>";
	}
    }
 
    $res2 = $zip->close();
    if ($res2 !== TRUE) {
	echo "Error closing ZIP file - please contact the site administrator";
    }
 
 
}
 
mysql_free_result($result);

?>

<br><br><br><br><hr><br>
<INPUT TYPE="button" VALUE="Re-select Submission" onClick="location.href ='admin2.php'">
<INPUT TYPE="button" VALUE="Re-select Course" onClick="location.href ='admin1.php'">
<INPUT TYPE="button" VALUE="Back" onClick="location.href ='admin3.php'">
<INPUT TYPE="button" VALUE="Log out" onClick="location.href ='login.php'">
<br><br>


<!--END USER CODE-->
<!--START HTML TEMPLATE PART II-->
<img src="images/ballet_lg.gif" width="19" height="18" border="0">
</strong></font></blockquote>
<br><br><br><br><br><br><br><br><br><br>

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

<?php

if(file_exists($zip_full_path)) {
    print "<script>";
    print " self.location='$zip_full_path';";
    print "</script>";
}

?>
