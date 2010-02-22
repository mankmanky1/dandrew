<?php
session_start();
$_SESSION['assignment'] = $_POST['assignment'];
$assignment = $_POST['assignment'];
echo "<h3>You have chosen to submit/resubmit ".$assignment."</h3>";
?>

<!-- Page 2 -->
<h4>Please Choose a file to upload</h4>
<form enctype="multipart/form-data" action="uploader.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
<input name="uploadedfile" type="file" /><br />
<input type="submit" value="Upload File" />
</form>


