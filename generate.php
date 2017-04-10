<html>
<head>
<link rel="stylesheet" href="all.css" type="text/css">
<?php
session_start();
$fname=$_SESSION['uname'].".css";
$myfile = fopen($fname, "a") or die("Unable to open file!");
fwrite($myfile,$_POST['file']);
fclose($myfile);
if($_POST['url']=='1')
	header('Location:addtag2.php');
else
	header('Location:addclass.php');
?>
</head>
</html>