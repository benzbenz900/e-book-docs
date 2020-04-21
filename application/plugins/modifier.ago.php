<?php
function smarty_modifier_ago($datetime_string,$full=false) {
	date_default_timezone_set('Asia/Bangkok');
	$ts = strtotime($datetime_string);
	$now = strtotime('now');
	if(!$ts || $ts > $now) {
		return false;
	}

	$diff = $now - $ts;
	$second = 1;
	$minute = 60 * $second;
	$hour = 60 * $minute;
	$day = 24 * $hour;
	$yesterday = 48 * $hour;
	$month = 30 * $day;
	$year = 365 * $day;
	$ago = "";

	if($diff >= $year) {
		$full = ($full == true) ? " ปี ที่แล้ว" : " ป";
		$ago = round($diff/$year) . $full;
	}else if($diff >= $month) {
		$full = ($full == true) ? " เดือน ที่แล้ว" : " ด";
		$ago = round($diff/$month) . $full;
	}else if($diff > $yesterday) {
		$full = ($full == true) ? " วัน ที่แล้ว" : " ว";
		$ago = intval($diff/$day) . $full;
	}else if($diff <= $yesterday && $diff > $day) {
		$ago = ($full == true) ? " เมื่อวาน" : "1 ว";
	}else if($diff >= $hour) {
		$full = ($full == true) ? " ชั่วโมง ที่แล้ว" : " ช";
		$ago = intval($diff/$hour) . $full;
	}else if($diff >= $minute) {
		$full = ($full == true) ? " นาที ที่แล้ว" : " น";
		$ago = intval($diff/$minute) . $full;
	}else {
		$ago = "สักครู่";
	}
	return $ago;
}