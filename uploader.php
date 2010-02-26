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
<td><font face='verdana, arial, helvetica' size='4' align='center'>Wits Online Submission System</font>  </td>
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
include('connection.php');
//Set the variables for the query to update the database
	$sub_choice = $_SESSION['sub_choice'];
	$assignment  = $_SESSION['assignment'];
	$student_num = $_SESSION['userid'];
	
// Where the file is going to be placed 
switch($_SESSION['yos'])
{
case 1:
$target_path = "submission_data/".$_SESSION['sub_choice']."/".$_SESSION['assignment']."/";
break;
case 2:
$target_path = "submission_data/".$_SESSION['sub_choice']."/".$_SESSION['assignment']."/";
break;
case 3:
$target_path = "submission_data/".$_SESSION['sub_choice']."/".$_SESSION['assignment']."/";
break;
case 4:
$target_path = "submission_data/".$_SESSION['sub_choice']."/".$_SESSION['assignment']."/";
break;
}
//Remove the extension from the filename
$ext = findexts ($_FILES['uploadedfile']['name']) ; 
//append all the necessary data to create the new filename
$filename = $_SESSION['userid']."_".$_SESSION['sub_choice']."_".$_SESSION['assignment']."_".date("m.d.y")."_".date("H.i.s");;

//Store the original target path to the directory
$original_target_path = $target_path;

/* Add the original filename to our target path.  
Result is "target path/filename.extension" */
$target_path = $target_path . $filename.".".$ext;

//Here we store the previous file name so that the file can be deleted
$query = "select $assignment from $sub_choice where student_num = '$student_num'"; 
$result = mysql_query($query);
$file_result = mysql_fetch_array($result, MYSQL_ASSOC);
//$tmp_file = $file_result['$assignment'];

//*************************
foreach($file_result AS $key=>$value)
{
	$tmp_file = $value;
}
//*************************

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ". $filename.".".$ext. " has been uploaded<br><br>";
	
	//Delete the old file
	$tmpfile = "$original_target_path".$tmp_file;
	@unlink($tmpfile);
	
	//Update the database with the new filename
	$query = "update $sub_choice set $assignment = '$filename.$ext' where student_num='$student_num'";	
	$result = mysql_query($query);
	
	//Now offer redirection options
	echo "<h4>Would you like to go to make another submission or logout</h4>";
	echo'<INPUT TYPE="button" VALUE="New Submission" onClick="location.href =\'student.php\'">';
	echo'<INPUT TYPE="button" VALUE="Log out" onClick="location.href =\'login.php\'">';
	} else{
    echo "There was an error uploading the file, please try again!<br>";
	echo'<INPUT TYPE="button" VALUE="Try Again" onClick="location.href =\'upload_submission.php\'"><br><br>';
}
?>
<!--The extension is removed from the file name -->
<?php
//This function separates the extension from the rest of the file name and returns it 
function findexts ($filename) 
{ 
$filename = strtolower($filename) ; 
$exts = split("[/\\.]", $filename) ; 
$n = count($exts)-1; 
$exts = $exts[$n]; 
return $exts; 
} 
?>

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
