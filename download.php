<?php
session_start();
$submission = $_SESSION['submission'];
$course_code = $_SESSION['course_code'];
 
 
include('connection.php');
$query = "select student_num, $submission from $course_code";
$result = mysql_query($query);
$student_num = '00000000';
$file_root = "submission_data/${course_code}/${submission}/";

 
$zip_name = "submission_data/${course_code}/${submission}/${course_code}_${submission}.zip";

@unlink($zip_name);
 
$zip = new ZipArchive;
$res = $zip->open($zip_name, ZIPARCHIVE::CREATE);
if ($res === TRUE) {
 
    while ($rec = mysql_fetch_array($result)) {
        $student_num = $rec['0'];
        $file_name = $rec['1'];
	$file_path = $file_root.$file_name;
        if (file_exists($file_path)) {
	    $zip->addEmptyDir($student_num);
	    $add = $zip->addFile($file_path, "{$student_num}/{$file_name}");
	    echo "{$student_num} - {$file_name} <br>";
        } else {
	    echo "{$student_num} - No submission <br>";
	}
    }
 
    $res2 = $zip->close();
    if ($res2 !== TRUE) {
	echo "Error closing ZIP file";
    }
 
 
}
 
mysql_free_result($result);

if(file_exists($zip_name)) {
    print "<script>";
    print " self.location='$zip_name';";
    print "</script>";
}
 
?>
