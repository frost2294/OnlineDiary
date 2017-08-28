<?php

date_default_timezone_set('Asia/Kuala_Lumpur');
$showmonth = $_POST['showmonth'];
$showyear = $_POST['showyear'];
$showmonth = preg_replace('#[^0-9]#i', '', $showmonth);
$showyear = preg_replace('#[^0-9]#i', '', $showyear);

$day_count = cal_days_in_month(CAL_GREGORIAN, $showmonth, $showyear);
$pre_days = date('w', mktime(0, 0, 0, $showmonth, 1, $showyear));
$post_days = (6 - (date('w', mktime(0, 0, 0, $showmonth, $day_count, $showyear))));
//$today = date('Y-m-j', time());

echo'<div id="calendar_warp">';
echo '<div class="title_bar">';
echo '<div class="previous_month"><input name="myBtn" type="submit" value="Previous Month" onClick="javascript:last_month();"></div>';
echo '<div class="show_month">' . $showmonth . '/' . $showyear . '</div>';
echo '<div class="next_month"><input name="myBtn" type="submit" value="Next Month" onClick="javascript:next_month();"></div>';
echo '</div>';

echo '<div class="week_days">';
echo '<div class="days_of_week">Sun</div>';
echo '<div class="days_of_week">Mon</div>';
echo '<div class="days_of_week">Tue</div>';
echo '<div class="days_of_week">Wed</div>';
echo '<div class="days_of_week">Thur</div>';
echo '<div class="days_of_week">Fri</div>';
echo '<div class="days_of_week">Sat</div>';
echo '<div class="clear"></div>';
echo '</div>';

//Previous Month Filler Days
if ($pre_days != 0){
	for($i=1; $i<=$pre_days; $i++){
		echo '<div class="non_cal_day"></div>';
	}
}

//Current Month
include("connection.php");
for($i =1; $i<= $day_count; $i++){
	//get events logic
	if(session_id() == ''){
		session_start();
	}
	$showmonth = sprintf("%02d", $showmonth);
	$i = sprintf("%02d", $i);
	$date = $showyear.'-'.$showmonth.'-'.$i;
	$studID = $_SESSION['ID'];
	$username = $_SESSION['login'];
	$query = "SELECT eventDescrp from personal_event WHERE eventDate = '$date' AND username = '$username' AND Student_ID = '$studID'";
	$result = mysqli_query($conn,$query);
	$num_rows = mysqli_num_rows($result);
	$counter = 0;
	//end get events
	echo '<div class="cal_day">';
	echo '<div class="day_heading">' . $i . '</div>';
	//show events 
	if($num_rows > 0){
		echo "<br>";
		echo "<br>";	
		echo "<mark>".$num_rows." event(s) exist</mark>";
	}
	//end events
	echo '</div>';
}

// Next Month Filler Days
if($post_days != 0){
	for($i=1; $i<=$post_days; $i++){
		echo '<div class="non_cal_day"></div>';
	}
}
echo '</div>';

?>