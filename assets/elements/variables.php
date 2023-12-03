<?php



// Debug & development settings
if (isset($debug) === TRUE && $debug === TRUE) {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
} else {
	$debug = (bool) FALSE;
	error_reporting(0);
	ini_set('display_errors', 0);
}

// Dates & Times
$today = (string) date("Y-m-d"); // 2023-12-02
$now = (string) date("Y-m-d H:i:s"); // 2023-12-02 15:18:34

$month_num = (string) date("m"); // 12
$month_name = (string) date("F"); // December

$day_num = (string) date("d"); // 02
$day_name = (string) date("l"); // Saturday

$year = (string) date("Y"); // 2023
$hour = (string) date("H"); // 15
$minute = (string) date("i"); // 18
$second = (string) date("s"); // 34

$epoch = (string) time(); // 1606922314

$isWeekend = isWeekend();

if ($debug === TRUE) {
	echo('Date: '.$today.blankLine());
	echo('Date & Time: '.$now.blankLine());
	echo('Month Number: '.$month_num.blankLine());
	echo('Month Name: '.$month_name.blankLine());
	echo('Day Number: '.$day_num.blankLine());
	echo('Day Name: '.$day_name.blankLine());
	echo('Year: '.$year.blankLine());
	echo('Hour: '.$hour.blankLine());
	echo('Minute: '.$minute.blankLine());
	echo('Second: '.$second.blankLine());
	echo('Epoch: '.$epoch.blankLine());
	echo('Is Weekend: '.$isWeekend.blankLine());
	blankLine();

}

echo("Loaded ".$_SERVER['PHP_SELF'].PHP_EOL);

