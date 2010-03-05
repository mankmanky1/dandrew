

<?php

include('connection.php');

$userid = strtoupper($_POST['userid']);
$password = $_POST['password'];
$login_type= $_POST['Type'];

$query = "SELECT * FROM allusers WHERE student_num='$userid'";
$result = mysql_query($query);
$rec=mysql_fetch_array($result);
$yos = $rec['yos'];
@session_start();
if(($rec['student_num']==$userid)&&($rec['password']==$password)){


$_SESSION['id']=session_id();
$_SESSION['userid'] = $userid;
$_SESSION['yos'] = $yos;
$_SESSION['login'] = "yes";


if($login_type == 'Admin' && $rec['admin_course_codes']!=null)
{
print "<script>";
print " self.location='admin1.php';"; 
print "</script>";
}
else if($login_type =='Student'&& $rec['student_course_codes']!=null)
{
print "<script>";
print " self.location='student.php';"; 
print "</script>";
}
else
{
$_SESSION['error_message'] = "You do not have priviledges to login with type $login_type";
print "<script>";
print " self.location='login_error.php';"; 
print "</script>";
}

} 	
else {

$_SESSION['error_message'] = "Incorrect Login ID or password";
print "<script>";
print " self.location='login_error.php';"; 
print "</script>";
}

?>
