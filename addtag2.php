<?php
	$connection=mysql_connect("localhost","root","")or die(mysql_error());
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
<script type="text/javascript">
function init_tag(tagname,tagid)
{
	var a=document.getElementById("temp1").value;
	var wasnull=1;
	if (document.getElementById("temp1").value!=" ")
	{
		var k=a.slice(0,-1);
		a=k;
		wasnull=0;
		//alert("pvhv");
		
	}
	if(document.getElementById("CombStat").value==0 && wasnull==0)
	{
		setcomb(" ",1);
		a=document.getElementById("temp1").value;
		
	}
	a+=tagname;
	a+="{";
	document.getElementById("temp1").value=a;
	document.getElementById("csssnippet").value=a;
	
		
	
	document.getElementById("selected_tag").value+=(tagid+",");
	document.getElementById("CombStat").value=0;
}
function setcomb(comb,combsymb)
{
	if(document.getElementById("temp1").value!=" ")
	{
		var a=document.getElementById("temp1").value;
		var k=a.slice(0,-1);
		document.getElementById("temp1").value=k;
		document.getElementById("temp1").value+=comb;
		document.getElementById("temp1").value+=" ";
		document.getElementById("csssnippet").value=document.getElementById("temp1").value
		document.getElementById("selected_comb").value+=(combsymb+",");
		document.getElementById("CombStat").value=1;
		
	}
}
function CreateXML()
{
	if (window.XMLHttpRequest) 
	{	
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp = new XMLHttpRequest();
	} 
	else 
	{
	// code for IE6, IE5
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xmlhttp;
}
function getAttributes()
{
	
	var selected_tag = document.getElementById("selected_tag").value;
	var URL = "GetAttrs.php?selected_tag="+selected_tag;
	xmlhttp = CreateXML();
	xmlhttp.open("GET",URL,true);
	xmlhttp.onreadystatechange = function() 
	{
		if (this.readyState == 4 && this.status == 200) 
		{
			//alert("passing");
			//console.log(xmlhttp.responseText);
			document.getElementById("Attrs").innerHTML =xmlhttp.responseText;	
		}
	};
	xmlhttp.send(null);
	
	return false;
}
function getHtml()
{
	
	var selected_tag = document.getElementById("selected_tag").value;
	var selected_comb=document.getElementById("selected_comb").value;
	var URL = "GetHtml.php?selected_tag="+selected_tag+"&selected_comb="+selected_comb;
	xmlhttp = CreateXML();
	xmlhttp.open("GET",URL,true);
	xmlhttp.onreadystatechange = function() 
	{
		if (this.readyState == 4 && this.status == 200) 
		{
			//console.log(xmlhttp.responseText);
			document.getElementById("html").innerHTML =xmlhttp.responseText;	
		}
	};
	xmlhttp.send(null);
	return false;
}
function init_tag2()
{
	var a=document.getElementById("selected_tag").value;
	var k=a.slice(0,-1);
	document.getElementById("selected_tag").value=k;
	k=getAttributes();
	
}
function addStyles(count)
{
	
	document.getElementById("temp2").value="";
	for(var i=3;i<=count;i++)
	{
		document.getElementById("temp2").value+=document.getElementById(i).value+":"+document.getElementById(i+"value").value+";\n";
	}
	document.getElementById("temp2").value+="}\n";
	document.getElementById("style").innerHTML="<style>"+document.getElementById("temp1").value+document.getElementById("temp2").value+"</style>";
	document.getElementById("csssnippet").value=document.getElementById("temp1").value+document.getElementById("temp2").value;
	getHtml();
}
function copyfile()
{
	document.getElementById("file").value=document.getElementById("temp1").value+document.getElementById("temp2").value;
}

</script>
</head>
<body>
<nav id="nav">
<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="addclass.php">Add Class</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</nav>
<br><br><br><br><br>
<?php
	$connection=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('csm',$connection);
	$tags=mysql_query("select * from tags") or die(mysql_error());
	echo 'Tags';
	while($row=mysql_fetch_array($tags))
	{
			
		echo "<button id='tag{$row['TAG_ID']}' name='tag{$row['TAG_ID']}' value={$row['TAG']} onclick=init_tag('{$row['TAG']}','{$row['TAG_ID']}')>{$row['TAG']}</button>";
	}
	
?>
<br>
Combinators:  
<button id="ds" name="ds" value=" " onclick= setcomb(this.value,1)>Space</button> 
<button id="cs" name="cs" value=">" onclick= setcomb(this.value,2)>  >  </button> 
<button id="as" name="as" value="+" onclick= setcomb(this.value,3)>  +  </button> 
<button id="gs" name="gs" value="~" onclick= setcomb(this.value,4)>  ~  </button> 

<div class="container">
<div>
<form action="addtag2.php" method="post">
<textarea name="csssnippet" id="csssnippet" rows=10 cols="30"></textarea>
<input type="hidden"  name="temp1" id="temp1" >
<input type="hidden" id="temp2">
<input type="hidden" name="selected_tag" id="selected_tag">
<input type="hidden" id="CombStat" name="Combstat" value="0" >
<input type="hidden" id="selected_comb" name="selected_comb" >
<input type="button" name="getAttr" id="getAttr" value="Search Attributes" onclick=init_tag2()>
<input type="button" name="getDemo" id="getDemo" value="Demo" onclick=getHtml()>
<div id="Attrs"></div>
</form>

<form action="generate.php" method="post" onsubmit=copyfile()>
<input type="hidden" name="file" id="file">
<input type="hidden" name="url" id="url" value="1">
<input type="Submit" value="Add to file">
</form>
</div>

<p id="style"></p>
<p id="html"></p>
</body>
</html>