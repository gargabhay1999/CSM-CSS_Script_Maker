<?php
$connection=mysql_connect('localhost','root','') or die(mysql_error());
 mysql_select_db('csm',$connection);
session_start();
?>
<html>
<head><title>ADD TAG</title>
<style type="text/css">
body{
  font-family: verdana;
  background: #c1bdba;
  margin: 0 0 0;
  color: #1da983;
}
nav{
  display: flex;
  justify-content: flex-end;
  flex-flow: center;
  background: rgba(19, 35, 47, 0.9);
}
nav ul{
  margin-right: 50px;
  list-style-type: none;
}
nav ul li{
  display: inline-block;
  padding: 5px;
}
nav ul li a{
  text-decoration: none;
  color: #1ab188;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
nav ul li a:hover{
  color: #a3f9e2;
}
input[type=text] {
    padding:5px;
    border:2px solid #1ab188;
    -webkit-border-radius: 5px;
    border-radius: 5px;
}
@media only screen and (max-width: 700px) {
    nav ul li{
      display: flex;
      flex-flow: column;
    }
    nav{
      justify-content: center;
    }
}

input[type=text]:focus {
    border-color: #1ab188;
}

button{
  border: 2px solid #1ab188;
  border-radius: 4px;
  padding: 8px 20px;
  background: #1ab188;
  color: rgba(19, 35, 47, 0.9);
  font-size: 16;
}
textarea{padding:5px;
    border:2px solid #ccc;
    -webkit-border-radius: 5px;
    border-radius: 5px;

}
textarea:focus {
    border-color:#333;
}
</style>
<script>
 function addtag2()
 {
	 window.location="addtag2.php";
 }
 function addclass()
 {
	 window.location="addclass.php";
 }
 
 function readTextFile(file)
	{
		var rawFile = new XMLHttpRequest();
		rawFile.open("GET", file, false);
		rawFile.onreadystatechange = function ()
		{
			if(rawFile.readyState === 4)
			{
				if(rawFile.status === 200 || rawFile.status == 0)
				{
					var allText = rawFile.responseText;
					document.getElementById('css_file').value+=(allText);
				}
			}
		}
		rawFile.send(null);
	}
	
	function cssfile()
	{
		var file="<?php echo "{$_SESSION['uname']}.css"; ?>";
		readTextFile(file);
	}
 
</script>
</head>
<body onload='cssfile()'>
<nav id="nav">
<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="addtag2.php">Add Tag</a></li>
  <li><a href="addclass.php">Add Class</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</nav>
<br>
CSS File: <br><textarea id="css_file" name="css_file" rows='30' cols='100'> </textarea><br>
<input type="button" onclick="addtag2()" value="add tag">
<input type="button" onclick="addclass()" value="add class">
<br><br>
</body>
</html>