<?php


// Load variables
require_once $_SERVER['DOCUMENT_ROOT']."/assets/elements/variables.php";

/*
PAGE LOADING
*/

function loadCSS() {
	$echo = <<<EOT
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
	EOT;
	echo($echo);
}

function loadJS() {
	$echo = <<<EOT
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="assets/js/script.js"></script>
	EOT;
	echo($echo);
}

// Refresh after a certain amount of time (in minutes and seconds, but all are optional)
// function refreshAfter(...$mins=5, ...$secs=0) {
// 	$mins = (int) $mins;
// 	$secs = (int) $secs;
// 	$total = $secs + ($mins * 60);
// 	$echo = <<<EOT
// 		<meta http-equiv="refresh" content="$total">
// 	EOT;
// 	echo($echo);
// }

/*
FORMATTING
*/
function blankLine() {
	echo(PHP_EOL);
}

/*
FILE SYSTEM
*/

function ls() {
	$files = scandir(".");

	array_shift($files); // Remove "." (current directory)
	array_shift($files); // Remove ".." (parent directory)
	
	return (array) $files;
}

function rm($files=[]) {
	foreach ($files as $file) {
		$status = unlink($file);
	}

	return (bool) $status;
}


/*
This is in addition to the rmdir() function found in PHP
but ours takes a list of items to remove
*/
function rmdirs($dirs=[]) {
	foreach ($dirs as $dir) {
		$status = rmdir($dir);
	}

	return (bool) $status;
}

/*
DATE & TIME
*/
function isWeekend() {
	$today = (string) date("l");
	if ($today === "Saturday" || $today === "Sunday") {
		return (bool) TRUE;
	} else {
		return (bool) FALSE;
	}
}

/*
NETWORK & REQUESTS
*/
function get($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$response = curl_exec($ch);
	curl_close($ch);
	return (string) $response;
}

/*
WEATHER
*/
function current_temperature_outside () {
	$fancy = (bool) TRUE;
	// Get the key from secrets.php to use in this function's scope
	global $weatherAPIKey;

	$weather = get("https://api.openweathermap.org/data/2.5/weather?lat=35.123179&lon=-78.988155&appid=5813031b3a7688b9f831457573f29d59&units=imperial");
	$weather = json_decode($weather);

	// Get the temperature from the weather object in 
	// Fahrenheit and round to the nearest whole number, then add the degree symbol
	$temperature = $weather->main->temp;
	$temperature = round($temperature, 0, PHP_ROUND_HALF_UP);
	$temperature = (string) $temperature;
	if ($fancy === TRUE) {
		$temperature = $temperature."°F";
	}
	return (string) $temperature; // 71 or 71°F if $fancy is TRUE
}


if (isset($debug) === TRUE && $debug === TRUE) {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// List all functions in this file here to run them as a test
	var_dump(ls());
	// echo current_temperature_outside(); DON'T RUN THIS CONTINUOUSLY - API CALLS ARE LIMITED
} else {
	error_reporting(0);
	ini_set('display_errors', 0);
	$debug = (bool) FALSE;
}

echo("Loaded ".$_SERVER['PHP_SELF'].PHP_EOL);
