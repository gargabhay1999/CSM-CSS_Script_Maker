<html>
<head><title>CSM: CSS Script Maker</title>
<link rel="stylesheet" href="all.css" type="text/css">
<script>
function init_tag(tagname,tagid)
{
	document.getElementById("final").value+=tagname;
	document.getElementById("final").value+=" ";
	document.getElementById("selected_tag").value+=(tagid+",");
}
function init_tag2()
{
	
	document.getElementById("final").value+="{";
	var a=document.getElementById("selected_tag").value;
	var k=a.slice(0,-1);
	document.getElementById("selected_tag").value=k;
}
function addStyles(count)
{
	for(var i=3;i<=count;i++)
	{
		document.getElementById("final").value+=document.getElementById(i).value+":"+document.getElementById(i+"value").value+";\n";
	}
	document.getElementById("final").value+="}\n";
}
function copyfile()
{
	document.getElementById("file").value=document.getElementById("final").value;
}
</script>
</head>
<body>
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li style="float:right"> <a  class="active" href="logout.php" >Logout</a></li>
</form>
</ul>
<br><br><br>
<?php
	$connection=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('csm',$connection);
	$tags=mysql_query("select * from tags") or die(mysql_error());
	echo '<font face="verdana">Tags:-</font><br><br>';
	session_start();
	if (!isset($_SESSION['uname']))
		{
			header("Location:login.php");
		}
	while($row=mysql_fetch_array($tags))
	{		
		echo '<button id='.$row['TAG_ID'].' name='.$row['TAG_ID'].' value='.$row['TAG']." onclick=init_tag('".$row['TAG']."','".$row['TAG_ID']."')>".$row['TAG']."</button>";
	}
	echo '<br>';
?>
<form action="addtag.php" method="post" onsubmit=init_tag2()>
<font face="verdana">
<textarea name="final" id="final" rows=10 cols="30"><?php if(isset($_POST['final'])){echo $_POST['final'];}?> </textarea>
<input type="hidden" name="selected_tag" id="selected_tag"><br>
<input type="submit" name="getAttr" id="getAttr" value="Search Attributes">
<?php if (isset($_POST['selected_tag']))
	{
	$attrs=mysql_query("select * from ATTRIBUTE where TAG_ID in(".$_POST['selected_tag'].")") or die(mysql_error());
	echo '<br><br><font face="verdana">attributes:-</font><br><br>';
	$i=2;
	while($row=mysql_fetch_array($attrs))
	{
			$i++;
		echo '<input type="text" id='.$i.' name='.$row['ATTR_ID'].' value="'.$row['ATTR'].'">:' ;
		echo '<input type="text" id='.$i."value".' name='.$i."value".' value='.$row['DEFAULT_VALUE']."><br>";
	}
		echo '<br><input type="button" name="addStyle" id="addStyle" value="Add Style " onclick=addStyles('.$i.')>';	
	}
	
?>
</font>
</form>
<form action="generate.php" method="post" onsubmit=copyfile()>
<input type="hidden" name="file" id="file">
<input type="Submit" value="Add to file">
</form>
</body>
</html>