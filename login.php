<?php
@session_start();
@session_destroy();
unset($_SESSION);
echo $_SESSION['login'];
?>
<form action='loginck.php' method=post>
<table border='0' cellspacing='0' cellpadding='0' align=center>
<tr id='cat'>
<tr> <td bgcolor='#f1f1f1' ><font face='verdana, arial, helvetica' size='2' align='center'>  Login ID    
</font></td> <td bgcolor='#f1f1f1' align='center'><font face='verdana, arial, helvetica' size='2' >
<input type ='text' class='bginput' name='userid' ></font></td></tr>

<tr> <td bgcolor='#ffffff' ><font face='verdana, arial, helvetica' size='2' align='center'>  Password 
</font></td> <td bgcolor='#ffffff' align='center'><font face='verdana, arial, helvetica' size='2' >
<input type ='password' class='bginput' name='password' ></font></td></tr>

<tr> <td bgcolor='#f1f1f1' colspan='2' align='center'><font face='verdana, arial, helvetica' size='2' align='center'> 
<input type='submit' value='Submit'> <input type='reset' value='Reset'>
</font></td> </tr>

<tr> <td bgcolor='#ffffff' ><font face='verdana, arial, helvetica' size='2' align='center'>  <a href='signup.php'>New 
Member Sign UP</a></font></td> <td bgcolor='#ffffff' align='center'><font face='verdana, arial, helvetica' size='2' > Forgot Password ?</font></td></tr>

<tr> <td bgcolor='#f1f1f1' colspan='2' align='center'><font face='verdana, arial, helvetica' size='2' align='center'> 
 </font></td> </tr>
<tr>
 <td><select name="Type">
<option value="Student">Student</option>
<option value="Admin">Admin</option>
</select>
</td>
</tr>
</table></center>



</form>