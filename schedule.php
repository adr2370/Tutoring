<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="./Eta Kappa Nu (HKN), Mu Chapter_files/application-54517505e0a0174cf744e6233ecb2ba5.js" type="text/javascript"></script>
  <link href="./Eta Kappa Nu (HKN), Mu Chapter_files/main-b33130365f80c143afe0d50c1abb3b5a.css" media="screen" rel="stylesheet" type="text/css">
  <link href="./Eta Kappa Nu (HKN), Mu Chapter_files/print-87758024eacc670346d45b7efda928ae.css" media="print" rel="stylesheet" type="text/css">
  <link href="./Eta Kappa Nu (HKN), Mu Chapter_files/css" rel="stylesheet" type="text/css">
  <script src="./Eta Kappa Nu (HKN), Mu Chapter_files/tutor-a971345e76b4ad2f8951bcb4126eea10.js" type="text/javascript"></script>
  <link href="./Eta Kappa Nu (HKN), Mu Chapter_files/tutor-dcc8d702ec4e6c8cd9e53cc05f848566.css" media="screen" rel="stylesheet" type="text/css">

</head>
<body>
<div id="wrapper">
  <div id="content">
    <div id="container">
<div style="float: left; width: 80%; text-align: center; margin-bottom: 30px;">
<h1>TBP/UPE Tutoring</h1>
<table class="tutoring" id="cory_schedule">
	<tbody>
	<tr>
		<th>Hours</th>
		<th>Monday</th>
		<th>Tuesday</th>
		<th>Wednesday</th>
		<th>Thursday</th>
		<th>Friday</th>
	</tr>
	<?php
		$host = 'localhost';
		$user = 'root';
		$pwd = 'root';
		$db = 'tutors';
		$connection = mysql_connect($host,$user,$pwd);
		mysql_select_db($db,$connection);
		
		$counter=111;
		$allClasses=array();
		$classCounts=array();
		$days=array("Monday","Tuesday","Wednesday","Thursday","Friday");
		$actualTime=array("10am-11am","11am-12pm","12pm-1pm","1pm-2pm","2pm-3pm","3pm-4pm","4pm-5pm");
		for($j=0;$j<count($actualTime);$j++) {
			echo "<tr><td class='time'>".$actualTime[$j]."</td>";
			$theseC=array();
			for($i=0;$i<count($days);$i++) {
				echo "<td class='slot pcell' id='slot-0-1-11'>";
				$daytime=$days[$i]." ".$actualTime[$j];
				$theseClasses=array();
				$result=mysql_query("SELECT id,name FROM schedule WHERE daytime = '".$daytime."'");
				if(mysql_num_rows($result)>0)
				{
					while($res = mysql_fetch_assoc($result))
					{
						$counter++;
						echo "<div id='tutor-".$res['id']."' class='person";
						$result2=mysql_query("SELECT classes FROM tutor WHERE id = '".$res['id']."'");
						if(mysql_num_rows($result2)>0)
						{
							while($res2 = mysql_fetch_assoc($result2))
							{
								$classes=explode(", ",$res2['classes']);
								for($c=0;$c<count($classes);$c++) {
									if(strlen($classes[$c])<=0) continue;
									$classes[$c]=strtoupper($classes[$c]);
									if(!in_array($classes[$c],$allClasses)) {
										array_push($allClasses,$classes[$c]);
										$classCounts[$classes[$c]]=0;
									}
									if(!in_array($classes[$c],$theseClasses)) {
										array_push($theseClasses,$classes[$c]);
									}
									$classCounts[$classes[$c]]++;
									echo " ".preg_replace("/[^A-Za-z0-9]/", '', $classes[$c])."_1";
								}
							}
						}
						echo "'>".$res['name']."</div>";
						echo "<div id='boxtutor-".$res['id']."' class='tutorbox' style='left: 177px; top: 316px; display: none; max-width: 300px;'>";
						echo "<div>".$res['name']."</div>";
						echo "<div class='hours'><label>Tutoring Hours:</label>";
						$result2=mysql_query("SELECT daytime FROM schedule WHERE id = '".$res['id']."'");
						if(mysql_num_rows($result2)>0)
						{
							while($res2 = mysql_fetch_assoc($result2))
							{
								echo "<br><span style='font-style: italic'>".$res2['daytime']."</span>";
							}
						}
						echo "<br></div><hr>";
						echo "<div style='clear: both'></div>";
						echo "<span class='small' style='font-style: italic'>Tutoring: </span>";
						for($c=0;$c<count($classes);$c++) {
							if(strlen($classes[$c])<=0) continue;
							if($c>0) echo ", ";
							echo $classes[$c];
						}
						echo "<br>";
						echo "</div>";
					}
				}
				array_push($theseC,$theseClasses);
				echo "</td>";
			}
			echo "</tr>";
		}
	?>
</tbody>
</table>
</div>
<div style="float: left; max-width: 18%; padding-left: 2%; padding-top: 70px; line-height: 1.75em;width: 20%;position: absolute;right: 0%;">
	<div class="small" style="font-family: none;position: fixed;width: 20%;right: 10px;top: 50px;"><?php
			/*
			//For counting
			for($i=0;$i<count($allClasses);$i++) {
				$num=intval($classCounts[$allClasses[$i]]);
				$num/=2;
				$num=$num."";
				$len=strlen($num);
				for($j=0;$j<2-$len;$j++) $num="0".$num;
				$allClasses[$i]=$num." ".$allClasses[$i];
			}
			rsort($allClasses);*/
			sort($allClasses);
			$last="";
			for($i=0;$i<count($allClasses);$i++) {
				$exploded=explode(' ',$allClasses[$i]);
				$which="";
				for($j=0;$j<count($exploded)-1;$j++) $which=$which.$exploded[$j]." ";
				if($which!=$last) {
					if(count($exploded)>1)
						echo "<br>".$which."<br>";
					else
						echo "<br>";
					$last=$which;
				}
				else {
					echo ", ";
				}
				?>
				<a href="#" class="'<?php echo preg_replace("/[^A-Za-z0-9]/", '', $allClasses[$i]); ?>'" onmouseover="highlight('<?php echo preg_replace("/[^A-Za-z0-9]/", '', $allClasses[$i]); ?>')" onmouseout="unhighlight('<?php echo preg_replace("/[^A-Za-z0-9]/", '', $allClasses[$i]); ?>')" onclick="return locklight('<?php echo preg_replace("/[^A-Za-z0-9]/", '', $allClasses[$i]); ?>')"><?php echo $exploded[count($exploded)-1]; ?></a><?php } ?>
	</div>
</div>
  </div>
</div>
</body></html>