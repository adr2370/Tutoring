<?php
$host = 'localhost';
$user = 'root';
$pwd = 'root';
$db = 'tutors';
$connection = mysql_connect($host,$user,$pwd);
mysql_select_db($db,$connection);
$query="SELECT * FROM schedule";
$result=mysql_query($query);
if(mysql_num_rows($result)>0)
{
	while($res = mysql_fetch_assoc($result))
	{
		echo $res["name"]." ".$res["daytime"]."<br/>";
	}
}
?>