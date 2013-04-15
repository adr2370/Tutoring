<?php
$host = 'localhost';
$user = 'root';
$pwd = 'root';
$db = 'tutors';
$connection = mysql_connect($host,$user,$pwd);
mysql_select_db($db,$connection);
$query="SELECT * FROM tutor";
$result=mysql_query($query);
if(mysql_num_rows($result)>0)
{
	while($res = mysql_fetch_assoc($result))
	{
		print_r($res);
	}
}
?>