<?php
	$connection=mysql_connect("localhost","root","")or die(mysql_error());
	mysql_select_db('csm',$connection);
	
?>
	
<html>
<head>
	<title>Add Class</title>
<style>
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
		document.getElementById("final1").value = "." + document.getElementById("class_name").value + " {\n}" ;
		document.getElementById('flag').value=1;
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
		
</script>
</head>
<body>
<form action="addclass_dup.php" method="post">
Class Name: <input type="text" name="class_name" id="class_name" placeholder="class name" onblur="finaltext()"> <br><br>
<textarea name="final1" id="final1" rows="10" cols="30" > </textarea>
<input type="text" id="flag" name="flag" value='0'>
<input type="text" id="attribute_type_hidden_id" name="attribute_type_hidden_id">
<input type="text" id="attribute_hidden_name" name="attribute_hidden_name">
</form>

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
</body>
</html>