<?php
	$connection=mysql_connect("localhost","root","")or die(mysql_error());
	mysql_select_db('csm',$connection);
	$sql="select attribute_type_name from class_attributes where attribute_type_id={$_GET['att_type_id']} and attribute_name={$_GET['att_name']}";
	$result=mysql_query($sql,$connection) or die(mysql_error()); 
	$row=mysql_fetch_array($result);
	echo "{$row['attribute_type_name']}-";
	$sql="select attribute_name,attribute_default_value from class_attributes where attribute_type_id={$_GET['att_type_id']} and attribute_name={$_GET['att_name']}";
	$result=mysql_query($sql,$connection);
	$row=mysql_fetch_array($result);
	echo "{$row['attribute_name']} : {$row['attribute_default_value']} ;\n}";
?>