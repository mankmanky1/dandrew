<?php
@session_start();
@session_destroy();
unset($_SESSION);
echo $_SESSION['login'];
?>
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

<form action='loginck.php' method=post>
<table border='0' cellspacing='0' cellpadding='0' align=center>
<tr id='cat'>
<tr> <td bgcolor='#ffffff' ><font face='verdana, arial, helvetica' size='2' align='left'>  Login ID    
</font></td> <td bgcolor='#f1f1f1' align='center'><font face='verdana, arial, helvetica' size='2' >
<input type ='text' class='bginput' name='userid' ></font></td></tr>

<tr> <td bgcolor='#ffffff' ><font face='verdana, arial, helvetica' size='2' align='left'>  Password 
</font></td> <td bgcolor='#ffffff' align='center'><font face='verdana, arial, helvetica' size='2' >
<input type ='password' class='bginput' name='password' ></font></td></tr>



<tr> <td bgcolor='#ffffff' colspan='2' align='center'><font face='verdana, arial, helvetica' size='2' align='center'> 
 </font></td> </tr>
<tr>
<td bgcolor='#ffffff' ><font face='verdana, arial, helvetica' size='2' align='left'>Login Type 
</font></td>
 <td><select name="Type">
<option value="Student">Student</option>
<option value="Admin">Admin</option>
</select>
</td>
</tr>
<tr> <td bgcolor='#f1f1f1' colspan='2' align='center'><font face='verdana, arial, helvetica' size='2' align='center'> 
<input type='submit' value='Submit'> <input type='reset' value='Reset'>
</font></td> </tr>

</table></center>
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
