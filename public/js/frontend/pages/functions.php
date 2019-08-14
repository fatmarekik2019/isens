<?php

//define('CONST_SERVER_DATEFORMAT', 'd/m/Y H:i:s');
//define('CONST_SERVER_TIMEZONE', 'UTC');

function timeDiffuser($day, $date, $year, $month, $minutes, $timezone, $daylight, $hemis)
{
/**
 * Converts current time for given timezone (considering DST)
 *  to 14-digit UTC timestamp (YYYYMMDDHHMMSS)
 *
 * DateTime requires PHP >= 5.2
 *
 * @param $str_user_timezone
 * @param string $str_server_timezone
 * @param string $str_server_dateformat
 * @return string
 */
/*function timeDiffuser($str_user_timezone,
       $str_server_timezone = CONST_SERVER_TIMEZONE,
       $str_server_dateformat = CONST_SERVER_DATEFORMAT) {
 
  // set timezone to user timezone
  date_default_timezone_set($str_user_timezone);
 
  $date = new DateTime('now');
  $date->setTimezone(new DateTimeZone($str_server_timezone));
  $str_server_now = $date->format($str_server_dateformat);
 
  // return timezone to server default
  date_default_timezone_set($str_server_timezone);
 
  return $str_server_now;
}
*/
	//$timezone--;
	// init tableau jour/mois
	$mmc_sector[1] = 31;
	$mmc_sector[2] = 28;
	if((($year % 4) == 0 ) && ((($year % 100) > 0) || ($year % 400 == 0))){
		$mmc_sector[2] = 29;
	}
	$mmc_sector[3] = 31;
	$mmc_sector[4] = 30;
	$mmc_sector[5] = 31;
	$mmc_sector[6] = 30;
	$mmc_sector[7] = 31;
	$mmc_sector[8] = 31;
	$mmc_sector[9] = 30;
	$mmc_sector[10] = 31;
	$mmc_sector[11] = 30;
	$mmc_sector[12] = 31;
	               
	
	$minutes = $minutes + $timezone * 60;
	if($minutes > 1439){
		$minutes = $minutes - 1440;
		$day = $day + 1;
		if($day == 7){
			$day = 0;
		}
		$date = $date + 1;
		if ($date > $mmc_sector[$month]){
			$date = 1;
			$month = $month + 1;
			if($month > 12){
				$month = 1;
				$year = $year + 1;
			}
		}
	}
	
	if(!$daylight){
		if (!$hemis) {
			if($month == 3){
				if($date > 24){
					if($day == 6){
						$minutes += 60; // on avance d'une heure
					}
				}
			}elseif($month > 3 && $month <= 10){
				$minutes += 60;
			}
		} elseif ($hemis) {
			if($month == 3){
				if($date > 24){
					if($day < 6){
						$minutes -= 60; // on recule d'une heure
					}
				}
			} elseif ($month <= 3 && $month > 10) {
				$minutes -= 60;
			}
		}
	}
	
	$minute = $minutes%60;
	$hour = ($minutes - $minute) / 60;
	
	if($minute < 0){
		$minute = 60 +$minute;
		$hour--;
	}
	if($hour < 0){
		$hour = 24 + $hour;
		$date--;
	}
	if($date < 0){
		$month--;
		$date = $mmc_sector[$month];
	}
	if($month < 0){
		$year--;
	}
		
	
	return formatNumber($date)."/".formatNumber($month)."/".formatNumber($year, 4)." ".formatNumber($hour).":".formatNumber($minute);
	
}

function formatNumber($value, $length=2){
	while(strlen($value) < $length){
		$value = "0".$value;
	}
	return $value;
}

?>