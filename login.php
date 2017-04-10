<?php
 $connection=mysql_connect('localhost','root','') or die(mysql_error());
 mysql_select_db('csm',$connection);
 session_start();
 
 if(isset($_SESSION['uname']))
 {
	 header("Location:home.php");
 }
 
 if(isset($_POST['uname']))
 {
	$flag=0;
	$U_Name=$_POST['uname'];
	$Pswd=$_POST['pass'];
	$sql="select Password from user_details where User_Name='$U_Name'";
	$result=mysql_query($sql,$connection) or die(mysql_error());
	$row=mysql_fetch_array($result);
	if(strcmp($Pswd,$row['Password'])==0 && $U_Name!='' && $Pswd!='')
	{
		$_SESSION['uname']=$U_Name;
		header("Location:home.php");
	}
	else
	{
		$_SESSION['invalid']=1;
		header("Location:login.php");
	}
 }
?>

<html>
<head>
<title>CSM: CSS Script Maker login</title>
<script type="text/javascript">

	function LoginValidation()
	{
		var fm=document.frm;
		var flag=1;
		if(fm.uname.value=="")
		{
			alert("please enter Username");
			fm.uname.focus();
			flag=0;
			return false;
		}
		if(fm.pass.value=="")
		{
			alert("please enter password");
			fm.pass.focus();
			flag=0;
			return false;
		}
		
	}	
	<?php
		if(isset($_SESSION['invalid']))
		{
	?>
		//<script language="javascript">
		alert("invalid Username or Password");
	<?php
		}
	?>
</script>

<link rel="stylesheet" href="all.css" type="text/css">
</head>
<body>
<ul>
  <li><a class="active" href="signup.php">Home</a></li>
  <li><a href="login.php">Login</a></li>
  <li><a href="signup.php">Sign up</a></li>
</ul>
<br><br><br><br><br>
<form action="login.php" method="post" name="frm">
<center>
<h2>Welcome User, Please Login here...</h2>
<label for="uname">Username </label>
<input type="text" name="uname" id="uname" placeholder="Username" <?php if(isset($_POST['uname'])) echo 'value='.$_POST['uname'] ?>><br><br>
<label for="pass">Password</label>
<input type="password" name="pass" id="pass" placeholder="Password"><br><br> </td>
<button style="height: 30px; width: 250px; left: 250; top: 250;" id = "login" onClick="LoginValidation();">Login</button>
</center>
</form>
</body>
</html>

