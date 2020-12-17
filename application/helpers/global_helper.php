<?php

$data['page_title'] = "سایت";

function siteVersion()
{
	return "beta.1";
}

function json_result($array = null, $error = null)
{
	header('Content-Type: application/json');

	if ($error == null) {
		$result = array(
			'status' => 'ok',
			'data' => $array
		);
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	} else {
		$result = array(
			'status' => 'failed',
			'error' => $error
		);
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}
}

function required_params($array, $method = "POST")
{
	if ($method == "POST") {
		foreach ($array as $param) {
			if (!empty($_POST[$param]) || $_POST[$param] == 0) {
				$params[$param] = $_POST[$param];
			} else {
				return "error - $param in POST is required";
			}
		}

		return $params;
	} else if ($method == "GET") {
		foreach ($array as $param) {
			if (!empty($_GET[$param])) {
				$params[$param] = $_GET[$param];
			} else {
				return "error - $param in GET is required";
			}
		}

		return $params;
	}
}

function is_error($var)
{
	if (!is_array($var) && substr($var, 0, 5) == 'error') {
		return explode(' - ', $var)[1];
	}
	return false;
}

function get_error($var)
{
	return explode(' - ', $var)[1];
}

function timeago($timestamp)
{
	$strTime = array("ثانیه", "دقیقه", "ساعت", "روز", "ماه", "سال");
	$length = array("60", "60", "24", "30", "12", "10");

	$currentTime = time();
	if ($currentTime >= $timestamp) {
		$diff     = time() - $timestamp;
		for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
			$diff = $diff / $length[$i];
		}

		$diff = round($diff);
		return $diff . " " . $strTime[$i] . " پیش";
	}
}

function toPersianNum($number)
{
	$number = str_replace("1", "۱", $number);
	$number = str_replace("2", "۲", $number);
	$number = str_replace("3", "۳", $number);
	$number = str_replace("4", "۴", $number);
	$number = str_replace("5", "۵", $number);
	$number = str_replace("6", "۶", $number);
	$number = str_replace("7", "۷", $number);
	$number = str_replace("8", "۸", $number);
	$number = str_replace("9", "۹", $number);
	$number = str_replace("0", "۰", $number);
	return $number;
}

function trim_text($text, $char_count)
{
	if (mb_strlen($text, 'utf-8') > $char_count) {
		$text = mb_substr($text, 0, $char_count, 'utf-8');
		$text .= "...";
	}
	return $text;
}

function calcCorrectAnswer($array)
{
	/* check if all of the answers are 0 */
	if($array[0] == 0 && $array[1] == 0 && $array[2] == 0 && $array[3] == 0 )
		return 0;

	return array_keys($array, max($array))[0] + 1;
}

function calcNextAnswer($array)
{
	/* check if all of the answers are 0 */
	if($array[0] == 0 && $array[1] == 0 && $array[2] == 0 && $array[3] == 0 )
		return 0;
		
	$max = array_keys($array, max($array))[0];
	unset($array[$max]);
	return array_keys($array, max($array))[0] + 1;
}
