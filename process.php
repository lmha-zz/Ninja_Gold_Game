<?php
session_start();

$timestamp = date('l jS F Y h:i a');

if (isset($_POST['building']) && ($_POST['building'] == 'farm')) {
	$goldChange = rand(10,20);
	$_SESSION['gold'] += $goldChange;
	$message = "You entered a farm and earned ".$goldChange." gold.  ".$timestamp."<br>";
	array_unshift($_SESSION['activity'], $message);
}
if (isset($_POST['building']) && ($_POST['building'] == 'Cave')) {
	$goldChange = rand(5,10);
	$_SESSION['gold'] += $goldChange;
	$message = "You entered a cave and earned ".$goldChange." gold.  ".$timestamp."<br>";
	array_unshift($_SESSION['activity'], $message);
}
if (isset($_POST['building']) && ($_POST['building'] == 'House')) {
	$goldChange = rand(2,5);
	$_SESSION['gold'] += $goldChange;
	$message = "You entered a house and earned ".$goldChange." gold.  ".$timestamp."<br>";
	array_unshift($_SESSION['activity'], $message);
}
if (isset($_POST['building']) && ($_POST['building'] == 'Casino!')) {
	$goldChange = rand(-50,50);
	switch ($goldChange) {
		case $goldChange > 0:
			$_SESSION['gold'] += $goldChange;
			$message = "You entered a casino and earned ".$goldChange." gold.  ".$timestamp."<br>";
			array_unshift($_SESSION['activity'], $message);
		break;
		case $goldChange < 0:
			$_SESSION['gold'] += $goldChange;
			$message = "You entered a casino and lost ".abs($goldChange)." gold... Ouch..  ".$timestamp."<br>";
			array_unshift($_SESSION['activity'], $message);
		break;
		case $goldChange == 0:
			$message = "You entered a casino and did not lose or gain any gold.  ".$timestamp."<br>";
			array_unshift($_SESSION['activity'], $message);
		break;
	}
}
header('Location: index.php');
?>