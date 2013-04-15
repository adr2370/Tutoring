<?php
$host = 'localhost';
$user = 'root';
$pwd = 'root';
$db = 'tutors';
$connection = mysql_connect($host,$user,$pwd);
mysql_select_db($db,$connection);
mysql_query("DELETE FROM schedule");
$query="SELECT * FROM tutor";
$result=mysql_query($query);
$days=array("Monday","Tuesday","Wednesday","Thursday","Friday");
$times=array("10am-12pm","11am-1pm","12pm-2pm","1pm-3pm","2pm-4pm","3pm-5pm","4pm-6pm");
$actualTime=array("10am-11am","11am-12pm","12pm-1pm","1pm-2pm","2pm-3pm","3pm-4pm","4pm-5pm","5pm-6pm");
$bottomLimit=3;
if(mysql_num_rows($result)>0)
{
	while($res = mysql_fetch_assoc($result))
	{
		$exploded=explode(' ',$res["daytime1"]);
		$day=$exploded[0];
		$time=$exploded[1];
		$loc=array_search($time,$times);
		mysql_query("INSERT INTO schedule VALUES('".$day." ".$actualTime[$loc]."','".$res['name']."','".$res['id']."')");
		mysql_query("INSERT INTO schedule VALUES('".$day." ".$actualTime[$loc+1]."','".$res['name']."','".$res['id']."')");
	}
}
//initial counts
$counts=array();
for($i=0;$i<count($days);$i++) {
	array_push($counts,array());
	for($j=0;$j<count($actualTime);$j++) {
		$daytime=$days[$i]." ".$actualTime[$j];
		$result=mysql_query("SELECT count(*) FROM schedule WHERE daytime = '".$daytime."'");
		array_push($counts[$i],mysql_result($result,0,0));
	}
}
$switchedList=array();
for($pref=2;$pref<=3;$pref++) {
	$anyChanges=true;
	while($anyChanges) {
		$anyChanges=false;
		for($i=0;$i<count($days);$i++) {
			for($j=0;$j<count($actualTime);$j++) {
				$daytime=$days[$i]." ".$actualTime[$j];
				if($counts[$i][$j]<$bottomLimit) {
					//too few people here
					if($j==0) {
						$daytime1=$days[$i]." ".$times[$j];
						$result=mysql_query("SELECT * FROM tutor WHERE daytime".$pref." = '".$daytime1."'");
					} else if($j==count($actualTime)-1) {
						$daytime1=$days[$i]." ".$times[$j-1];
						$result=mysql_query("SELECT * FROM tutor WHERE daytime".$pref." = '".$daytime1."'");
					} else {
						$daytime1=$days[$i]." ".$times[$j];
						$daytime2=$days[$i]." ".$times[$j-1];
						$result=mysql_query("SELECT * FROM tutor WHERE daytime".$pref." = '".$daytime1."' OR daytime".$pref." = '".$daytime2."'");
					}
					if(mysql_num_rows($result)>0)
					{
						while($counts[$i][$j]<$bottomLimit&&$res=mysql_fetch_assoc($result))
						{
							if($switchedList[$res['id']]==null) {
								$exploded=explode(" ",$res['daytime1']);
								$day=$exploded[0];
								$time=$exploded[1];
								$dayLoc=array_search($day,$days);
								$loc=array_search($time,$times);
								if($counts[$dayLoc][$loc]>$counts[$i][$j]&&$counts[$dayLoc][$loc+1]>$counts[$i][$j]) {
									//switch person over
									$counts[$dayLoc][$loc]--;
									$counts[$dayLoc][$loc+1]--;
									$exploded=explode(" ",$res['daytime'.$pref]);
									$day=$exploded[0];
									$time=$exploded[1];
									$dayLoc=array_search($day,$days);
									$loc=array_search($time,$times);
									$counts[$dayLoc][$loc]++;
									$counts[$dayLoc][$loc+1]++;
									mysql_query("DELETE FROM schedule WHERE id = '".$res['id']."'");
									mysql_query("INSERT INTO schedule VALUES('".$day." ".$actualTime[$loc]."','".$res['name']."','".$res['id']."')");
									mysql_query("INSERT INTO schedule VALUES('".$day." ".$actualTime[$loc+1]."','".$res['name']."','".$res['id']."')");
									$anyChanges=true;
									$switchedList[$res['id']]=$res['daytime'.$pref];
								}
							}
						}
					}
				}
				array_push($counts[$i],$count);
			}
		}
	}
}
echo "<table style='width:100%;'>";
for($i=0;$i<count($days);$i++) {
	echo "<td><table style='width: 85%;'>";
	for($j=0;$j<count($actualTime);$j++) {
		$daytime=$days[$i]." ".$actualTime[$j];
		echo "<tr><td>".$daytime."</td><td>".$counts[$i][$j]."</td></tr>";
	}
	echo "</table></td>";
}
echo "</table>";
?>