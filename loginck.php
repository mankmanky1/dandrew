<?php

include('connection.php');

$userid = $_POST['userid'];
$password = $_POST['password'];
$login_type= $_POST['Type'];

$query = "SELECT * FROM AllUsers WHERE student_num='$userid' AND password = '$password'";
$result = mysql_query($query);
$rec=mysql_fetch_array($result);
$yos = $rec['yos'];
if(($rec['student_num']==$userid)&&($rec['password']==$password)){

session_start();
$_SESSION['id']=session_id();
$_SESSION['userid'] = $userid;
$_SESSION['yos'] = $yos;

echo "<p class=data> <center>Successfully,Logged in<br>
<br><a href='logout.php'> Log OUT </a><br>
<br><a href=student.php>Click here if your browser is not redirecting automatically or you don't want to wait.</a><br></center>";

if($login_type == 'Admin')
{
print "<script>";
print " self.location='admin.php';"; // Comment this line if you don't want to redirect
print "</script>";
}
else if($login_type =='Student')
{
print "<script>";
print " self.location='student.php';"; // Comment this line if you don't want to redirect
print "</script>";
}

} 	
else {

session_unset();
echo "<font face='Verdana' size='2' color=red>Wrong Login. Use your correct Userid and Password and Try <br><center>
<input type='button' value='Retry' onClick='history.go(-1)'></center>";

}

?>