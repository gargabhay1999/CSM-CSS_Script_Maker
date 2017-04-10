<?php
$connection=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('csm',$connection);
{
	$attrs=mysql_query("select * from ATTRIBUTE where TAG_ID in(".$_GET['selected_tag'].")") or die(mysql_error());
	echo '<br>attributes<br>';
	$i=2;
	$count=mysql_num_rows($attrs)+2;
	while($row=mysql_fetch_array($attrs))
	{
			$i++;
		echo "<input type='text' id={$i} name={$row['ATTR_ID']} value='{$row['ATTR']}' onblur=addStyles({$count})>:";
		echo "<input type='text' id={$i}value name={$i}value value='{$row['DEFAULT_VALUE']}' onblur=addStyles({$count})><br>";
	}
		echo "<input type='button' name='addStyle' id='addStyle' value='Add Style ' onclick=addStyles({$i})>";
}
?>