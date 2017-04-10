<?php
 $connection=mysql_connect('localhost','root','') or die(mysql_error());
 mysql_select_db('csm',$connection);
 session_start();
 if(isset($_POST['fname']))
 {
	 $f_name=$_POST['fname'];
	 $l_name=$_POST['lname'];
	 $u_name=$_POST['username'];
	 if(strcmp($_POST['password'],$_POST['cnf_password'])==0)
	 {
		$pswd=$_POST['cnf_password'];
		$sql="insert into user_details values('$f_name','$l_name','$u_name','$pswd')";
		$search="select * from user_details where User_Name='$u_name'";
		$exist=mysql_query($search,$connection);
		if(mysql_fetch_array($exist))
		{
			echo '<script> alert("Username already exist") </script>';
		}
		else
		{
			$result=mysql_query($sql,$connection);
			if($result)
			{
				header("Location:addtag.php");
			}
		}
	 }
 }
 
 
 
 
?>

<html>
<head>
<title>CSM: CSS Script Maker</title>
<script type="text/javascript">
	function SignupValidation()
	{
		var fm=document.frm;
		var flag=1;
		if(fm.fname.value=="")
		{
			alert("please enter fname");
			fm.fname.focus();
			flag=0;
		}
		else if(fm.lname.value=="")
		{
			alert("please enter lname");
			fm.lname.focus();
			flag=0;
		}
		else if(fm.username.value=="")
		{
			alert("please enter username");
			fm.username.focus();
			flag=0;
		}
		else if(fm.password.value=="")
		{
			alert("please enter password");
			fm.password.focus();
			flag=0;
		}
		else if(fm.cnf_password.value=="")
		{
			alert("please enter cnf_password");
			fm.cnf_password.focus();
			flag=0;
		}
		else if((fm.password.value).localeCompare(fm.cnf_password.value)!=0)
		{
			alert("please Re-enter the correct password.")
			document.getElementById("cnf_password").focus();
			flag=0;
		}
	}	
</script>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #999999;
}


li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

a:hover:not(.active) {
    background-color: #839192;
}

.active {
background-color:#7F8C8D;
}

input[type=text] {
    padding:5px; 
    border:2px solid #ccc; 
    -webkit-border-radius: 5px;
    border-radius: 5px;
}
input[type=password] {
    padding:5px; 
    border:2px solid #ccc; 
    -webkit-border-radius: 5px;
    border-radius: 5px;
}

input[type=text]:focus {
    border-color:#333;
}
input[type=password] {
    padding:5px; 
    border:2px solid #ccc; 
    -webkit-border-radius: 5px;
    border-radius: 5px;
}

button{
    padding:5px 15px; 
    background:#ccc; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
}
</style>
</head>
<body>
<ul>
  <li><a class="active" href="signup2.php">Home</a></li>
  <li><a href="login.php">Login</a></li>
  <li><a href="signup2.php">Sign up</a></li>
</ul>
<br><br><br><br><br>
<form action="signup2.php" method="post" name="frm">
<center>
<h2>New User, Sign in here...</h2>
<label for="fname">Firstname</label>
<input type="text" placeholder="First Name" name="fname" id="fname" <?php if(isset($_POST['fname'])) echo 'value='.$_POST['fname'] ?>><br><br>
<label for="fname">Lastname</label>
<input type="text" placeholder="Last Name" name="lname" id="lname" <?php if(isset($_POST['lname'])) echo 'value='.$_POST['lname'] ?>><br><br>
<label for="fname">Username</label>
<input type="text" placeholder="Username" name="username" id="username" <?php if(isset($_POST['username'])) echo 'value='.$_POST['username'] ?>><br><br>
<label for="fname">Password</label>
<input type="password" placeholder="Password" name="password" id="password" <?php if(isset($_POST['password'])) echo 'value='.$_POST['password'] ?>><br><br>
<label for="fname">Re-enter </label>
<input type="password" placeholder="Re-enter Confirm Password" name="cnf_password" id="cnf_password"><br><br>
<button id = "signup" onclick="SignupValidation()">Sign up</button>
</center>
</form>
</body>
</html>

