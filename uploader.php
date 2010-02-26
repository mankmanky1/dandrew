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
	echo "<h4>Would you like to go to the submissions page or logout</h4>
	<br><a href='login.php'> Log Out </a><br>
	<br><a href='student.php'> Submissions Page</a><br>";
	
	} else{
    echo "There was an error uploading the file, please try again!";
	echo "<br><a href='student.php'> Submissions Page</a><br>";
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