<?php
$host = 'localhost';
$user = 'root';
$pwd = 'root';
$db = 'tutors';
$connection = mysql_connect($host,$user,$pwd);
mysql_select_db($db,$connection);

$name=$_POST["name"];
$daytime1=$_POST["day1"]." ".$_POST["time1"];
$daytime2=$_POST["day2"]." ".$_POST["time2"];
$daytime3=$_POST["day3"]." ".$_POST["time3"];
$classes="";
for($i=0;$i<=100;$i++) {
	if($_POST["element_4_".$i])
		$classes=$classes.$_POST["element_4_".$i].", ";
}
$classes=$classes.strtoupper($_POST["others"]);

$query="INSERT INTO tutor VALUES ('','".$name."','".$daytime1."','".$daytime2."','".$daytime3."','".$classes."')";
mysql_query($query);

header( 'Location: index.php' ) ;
?>