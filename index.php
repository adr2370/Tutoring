<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Untitled Form</title>
<link rel="stylesheet" type="text/css" href="./form_files/view.css">
<script type="text/javascript" src="./form_files/view.js"></script>
<style type="text/css">
.day {
	width:47% !important;
	float:left !important;
}
.time {
	width:47% !important;
	float:right !important;
}
.safari select.select {
	width:100%;
}
.classChoice {
	display:inline-block;
	width: 55px;
	float:left;
}
label.description {
	clear:both;
}
.theSpan {
	width:100%;
	padding:0;
	margin:0;
}
label.choice {
	margin-left: 20px;
}
</style>
</head>
<body id="main_body" class="no_guidelines safari">
<div id="form_container">
	<form id="form_566106" class="appnitro" method="post" action="addTutor.php">
		<ul>
			<li id="li_1">
				<label class="description" for="name">Name</label>
				<div>
					<input id="name" name="name" class="element text medium" type="text" value="" style="width:100%"/>
				</div>
			</li>
			<li id="li_2" class="day">
				<label class="description" for="day1">Best Day</label>
				<div>
					<select class="element select medium" id="day1" name="day1">
						<option value="Monday" selected="selected">
							Monday
						</option>
						<option value="Tuesday">
							Tuesday
						</option>
						<option value="Wednesday">
							Wednesday
						</option>
						<option value="Thursday">
							Thursday
						</option>
						<option value="Friday">
							Friday
						</option>
					</select>
				</div>
			</li>
			<li id="li_11" class="time">
				<label class="description" for="time1">Time</label>
				<div>
					<select class="element select medium" id="time1" name="time1">
						<option value="10am-12pm" selected="selected">
							10am-12pm
						</option>
						<option value="11am-1pm">
							11am-1pm
						</option>
						<option value="12pm-2pm">
							12pm-2pm
						</option>
						<option value="1pm-3pm">
							1pm-3pm
						</option>
						<option value="2pm-4pm">
							2pm-4pm
						</option>
						<option value="3pm-5pm">
							3pm-5pm
						</option>
						<option value="4pm-6pm">
							4pm-6pm
						</option>
					</select>
				</div>
			</li>
			<li id="li_8" class="day">
				<label class="description" for="day2">Second Best Day</label>
				<div>
					<select class="element select medium" id="day2" name="day2">
						<option value="Monday" selected="selected">
							Monday
						</option>
						<option value="Tuesday">
							Tuesday
						</option>
						<option value="Wednesday">
							Wednesday
						</option>
						<option value="Thursday">
							Thursday
						</option>
						<option value="Friday">
							Friday
						</option>
					</select>
				</div>
			</li>
			<li id="li_3" class="time">
				<label class="description" for="time2">Time</label>
				<div>
					<select class="element select medium" id="time2" name="time2">
						<option value="10am-12pm" selected="selected">
							10am-12pm
						</option>
						<option value="11am-1pm">
							11am-1pm
						</option>
						<option value="12pm-2pm">
							12pm-2pm
						</option>
						<option value="1pm-3pm">
							1pm-3pm
						</option>
						<option value="2pm-4pm">
							2pm-4pm
						</option>
						<option value="3pm-5pm">
							3pm-5pm
						</option>
						<option value="4pm-6pm">
							4pm-6pm
						</option>
					</select>
				</div>
			</li>
			<li id="li_9" class="day">
				<label class="description" for="day3">Third Best Day</label>
				<div>
					<select class="element select medium" id="day3" name="day3">
						<option value="Monday" selected="selected">
							Monday
						</option>
						<option value="Tuesday">
							Tuesday
						</option>
						<option value="Wednesday">
							Wednesday
						</option>
						<option value="Thursday">
							Thursday
						</option>
						<option value="Friday">
							Friday
						</option>
					</select>
				</div>
			</li>
			<li id="li_10" class="time">
				<label class="description" for="time3">Time</label>
				<div>
					<select class="element select medium" id="time3" name="time3">
						<option value="10am-12pm" selected="selected">
							10am-12pm
						</option>
						<option value="11am-1pm">
							11am-1pm
						</option>
						<option value="12pm-2pm">
							12pm-2pm
						</option>
						<option value="1pm-3pm">
							1pm-3pm
						</option>
						<option value="2pm-4pm">
							2pm-4pm
						</option>
						<option value="3pm-5pm">
							3pm-5pm
						</option>
						<option value="4pm-6pm">
							4pm-6pm
						</option>
					</select>
				</div>
			</li>
			<li id="li_4" style="clear:both;">
				<?php
					$math=array("31A","31B","32A","32B","33A","33B","61");
					$physics=array("1A","1B","1C","4AL","4BL");
					$chem=array("20A","20B","20L","30A","30AL","30B");
					$cs=array("31","32","33","35L","M51A");
					$counter=1;
				?>
				<label class="description" for="element_4">Math</label>
				<span class="theSpan">
					<?php
					for($i=0;$i<count($math);$i++) {
					?>
						<div class="classChoice">
						<input id="element_4_<?php echo $counter; ?>" name="element_4_<?php echo $counter; ?>" class="element checkbox" type="checkbox" value="MATH <?php echo $math[$i]; ?>" />
						<label class="choice" for="element_4_<?php echo $counter; ?>"><?php echo $math[$i]; ?></label>
						</div>
					<?php 
						$counter++;
					}
					?>
					<script>
						function allMath() {
							<?php
							for($i=0;$i<count($math);$i++) {
							?>
								document.getElementById("element_4_<?php echo $counter-$i-1; ?>").checked=true;
							<?php
							}
							?>
						}
					</script>
					<div style="float: right;">
						<button type="button" onclick="allMath()">Select All</button>
					</div>
				</span>
				<label class="description" for="element_4">Physics</label>
				<span class="theSpan">
					<?php
					for($i=0;$i<count($physics);$i++) {
					?>
						<div class="classChoice">
						<input id="element_4_<?php echo $counter; ?>" name="element_4_<?php echo $counter; ?>" class="element checkbox" type="checkbox" value="PHYSICS <?php echo $physics[$i]; ?>" />
						<label class="choice" for="element_4_<?php echo $counter; ?>"><?php echo $physics[$i]; ?></label>
						</div>
					<?php 
						$counter++;
					}
					?>
					<script>
						function allPhysics() {
							<?php
							for($i=0;$i<count($physics);$i++) {
							?>
								document.getElementById("element_4_<?php echo $counter-$i-1; ?>").checked=true;
							<?php
							}
							?>
						}
					</script>
					<div style="float: right;">
						<button type="button" onclick="allPhysics()">Select All</button>
					</div>
				</span>
				<label class="description" for="element_4">Chem</label>
				<span class="theSpan">
					<?php
					for($i=0;$i<count($chem);$i++) {
					?>
						<div class="classChoice">
						<input id="element_4_<?php echo $counter; ?>" name="element_4_<?php echo $counter; ?>" class="element checkbox" type="checkbox" value="CHEM <?php echo $chem[$i]; ?>" />
						<label class="choice" for="element_4_<?php echo $counter; ?>"><?php echo $chem[$i]; ?></label>
						</div>
					<?php 
						$counter++;
					}
					?>
					<script>
						function allChem() {
							<?php
							for($i=0;$i<count($chem);$i++) {
							?>
								document.getElementById("element_4_<?php echo $counter-$i-1; ?>").checked=true;
							<?php
							}
							?>
						}
					</script>
					<div style="float: right;">
						<button type="button" onclick="allChem()">Select All</button>
					</div>
				</span>
				<label class="description" for="element_4">CS</label>
				<span class="theSpan">
					<?php
					for($i=0;$i<count($cs);$i++) {
					?>
						<div class="classChoice">
						<input id="element_4_<?php echo $counter; ?>" name="element_4_<?php echo $counter; ?>" class="element checkbox" type="checkbox" value="CS <?php echo $cs[$i]; ?>" />
						<label class="choice" for="element_4_<?php echo $counter; ?>"><?php echo $cs[$i]; ?></label>
						</div>
					<?php 
						$counter++;
					}
					?>
					<script>
						function allCS() {
							<?php
							for($i=0;$i<count($cs);$i++) {
							?>
								document.getElementById("element_4_<?php echo $counter-$i-1; ?>").checked=true;
							<?php
							}
							?>
						}
					</script>
					<div style="float: right;">
						<button type="button" onclick="allCS()">Select All</button>
					</div>
				</span>
			</li>
			<li id="li_5">
				<label class="description" for="others">Other Classes: (e.g. CS 111, MAE 101, Math 115A, etc.)</label>
				<div>
					<input id="others" name="others" class="element text medium" type="text" value="" style="width:100%"/>
				</div>
			</li>
			<li class="buttons">
				<input type="hidden" name="form_id" value="566106" /><input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
			</li>
		</ul>
	</form>
</div>
</body>