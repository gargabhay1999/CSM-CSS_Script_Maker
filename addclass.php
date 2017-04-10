<?php
	$connection=mysql_connect("localhost","root","")or die(mysql_error());
	mysql_select_db('csm',$connection);
	session_start();
?>
	
<html>
<head>
	<title>Add Class</title>
<style>
.container{
	display:flex;
}
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




	.navigation {
  padding: 0;
  margin: 0;
  border: 0;
  line-height: 1;
}

.navigation ul,
.navigation ul li,
.navigation ul ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.navigation ul {
  position: relative;
  z-index: 500;
  float: left;
}

.navigation ul li {
  float: left;
  min-height: 0.05em;
  line-height: 1em;
  vertical-align: middle;
  position: relative;
}

.navigation ul li.hover,
.navigation ul li:hover {
  position: relative;
  z-index: 510;
  cursor: default;
}

.navigation ul ul {
  visibility: hidden;
  position: absolute;
  top: 100%;
  left: 0px;
  z-index: 520;
  width: 100%;
}

.navigation ul ul li { float: none; }

.navigation ul ul ul {
  top: 0;
  right: 0;
}

.navigation ul li:hover > ul { visibility: visible; }

.navigation ul ul {
  top: 0;
  left: 99%;
}

.navigation ul li { float: none; }

.navigation ul ul { margin-top: 0.05em; }

.navigation {
  width: 13em;
  background: #333333;
  font-family: 'roboto', Tahoma, Arial, sans-serif;
  zoom: 1;
}

.navigation:before {
  content: '';
  display: block;
}

.navigation:after {
  content: '';
  display: table;
  clear: both;
}

.navigation a {
  display: block;
  padding: 1em 1.3em;
  color: #ffffff;
  text-decoration: none;
  text-transform: uppercase;
}

.navigation > ul { width: 13em; }

.navigation ul ul { width: 13em; }

.navigation > ul > li > a {
  border-right: 0.3em solid #34A65F;
  color: #ffffff;
}

.navigation > ul > li > a:hover { color: #ffffff; }

.navigation > ul > li a:hover,
.navigation > ul > li:hover a { background: #34A65F; }

.navigation li { position: relative; }

.navigation ul li.has-sub > a:after {
  position: absolute;
  right: 1em;
}

.navigation ul ul li.first {
  -webkit-border-radius: 0 3px 0 0;
  -moz-border-radius: 0 3px 0 0;
  border-radius: 0 3px 0 0;
}

.navigation ul ul li.last {
  -webkit-border-radius: 0 0 3px 0;
  -moz-border-radius: 0 0 3px 0;
  border-radius: 0 0 3px 0;
  border-bottom: 0;
}

.navigation ul ul {
  -webkit-border-radius: 0 3px 3px 0;
  -moz-border-radius: 0 3px 3px 0;
  border-radius: 0 3px 3px 0;
}

.navigation ul ul { border: 1px solid #34A65F; }

.navigation ul ul a { color: #ffffff; }

.navigation ul ul a:hover { color: #ffffff; }

.navigation ul ul li { border-bottom: 1px solid #0F8A5F; }

.navigation ul ul li:hover > a {
  background: #4eb1ff;
  color: #ffffff;
}

.navigation.align-right > ul > li > a {
  border-left: 0.3em solid #34A65F;
  border-right: none;
}

.navigation.align-right { float: right; }

.navigation.align-right li { text-align: right; }

.navigation.align-right ul li.has-sub > a:before {
  content: '+';
  position: absolute;
  top: 50%;
  left: 15px;
  margin-top: -6px;
}

.navigation.align-right ul li.has-sub > a:after { content: none; }

.navigation.align-right ul ul {
  visibility: hidden;
  position: absolute;
  top: 0;
  left: -100%;
  z-index: 598;
  width: 100%;
}

.navigation.align-right ul ul li.first {
  -webkit-border-radius: 3px 0 0 0;
  -moz-border-radius: 3px 0 0 0;
  border-radius: 3px 0 0 0;
}

.navigation.align-right ul ul li.last {
  -webkit-border-radius: 0 0 0 3px;
  -moz-border-radius: 0 0 0 3px;
  border-radius: 0 0 0 3px;
}

.navigation.align-right ul ul {
  -webkit-border-radius: 3px 0 0 3px;
  -moz-border-radius: 3px 0 0 3px;
  border-radius: 3px 0 0 3px;
}
</style>

<script>
	function finaltext()
	{
		if(document.getElementById("class_name").value!='')
		{
			document.getElementById("final1").value = "." + document.getElementById("class_name").value + " {\n}" ;
			document.getElementById('flag').value=1;
		}
	}
	function set_att_type_id(attribute_type_id)
	{
		document.getElementById('attribute_type_hidden_id').value=attribute_type_id;
	}
	function set_att_name(attribute_name)
	{
		document.getElementById('attribute_hidden_name').value=attribute_name;
		var a=document.getElementById('final1').value;
		var k=a.slice(0,-1);
		document.getElementById('final1').value=k;
		getAttributes();
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
		var att_type_id=document.getElementById("attribute_type_hidden_id").value;
		var att_name=document.getElementById('attribute_hidden_name').value;
		var URL = "GetAtt_values.php?att_type_id="+att_type_id+"&att_name='"+att_name+"'";
		console.log(URL);
		xmlhttp = CreateXML();
		xmlhttp.open("GET",URL,true);
		xmlhttp.onreadystatechange = function() 
		{
			if (this.readyState == 4 && this.status == 200) 
			{
				console.log(xmlhttp.responseText);
				if(document.getElementById('flag').value==1)
				{
					document.getElementById("final1").value+=xmlhttp.responseText;
				}
			}
		};
		xmlhttp.send(null);
		return false;
	}
	function copyfile()
	{
		document.getElementById("file").value=document.getElementById("final1").value;
	}
		
</script>
</head>
<body>
<nav id="nav">
<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="addtag2.php">Add Tag</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</nav>
<br><br>
<form action="addclass.php" method="post">
<div class="container">
	<div>
	Class Name: <input type="text" name="class_name" id="class_name" placeholder="class name" onblur="finaltext()"> <br><br>
	<textarea name="final1" id="final1" rows="10" cols="50" > </textarea><br>
	<input type="hidden" id="flag" name="flag" value='0'>
	<input type="hidden" id="attribute_type_hidden_id" name="attribute_type_hidden_id">
	<input type="hidden" id="attribute_hidden_name" name="attribute_hidden_name">
	</form>
	<form action="generate.php" method="post" onsubmit=copyfile()>
	<input type="hidden" name="file" id="file">
	<input type="hidden" name="url" id="url" value="2"><br>
	<input type="Submit" value="Add to file">
	</form>
	</div>

	<div>
		<div class="navigation">
		<ul>
		<?php
		$sql_1="select attribute_type_id,attribute_type_name from class_attributes group by attribute_type_id";
		$result_1=mysql_query($sql_1,$connection);
		while($row_1=mysql_fetch_array($result_1))
		{
			echo "<li class='has-sub' onmouseover=set_att_type_id('{$row_1['attribute_type_id']}')> <a >{$row_1['attribute_type_name']}</a>";?>
			<ul>
			<?php
			$sql_2="select attribute_name from class_attributes where attribute_type_id = {$row_1['attribute_type_id']}";
			$result_2=mysql_query($sql_2,$connection);
			while($row_2=mysql_fetch_array($result_2))
			{
				echo "<li class='has-sub' onclick=set_att_name('{$row_2['attribute_name']}')> <a >".$row_2['attribute_name'].'</a> </li>';
			}?>
			</ul>
			</li>
			<?php
		}
		?>
		</ul>
		</div>
	</div>
	
</div>
</body>
</html>