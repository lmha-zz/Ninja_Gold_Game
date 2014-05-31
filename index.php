<?php
session_start();

if (!isset($_SESSION['gold'])) {
	$_SESSION['gold'] = 0;
}
if (!isset($_SESSION['activity'])) {
	$_SESSION['activity'] = [];
}
if (!isset($logger)) {
	$logger = '';
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Make Money!!!</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/avascript">
		$(document).ready(function(){
			$("#activity_log").prop("scrollHeight");
		})
	</script>
</head>
<body>
	<h1>Your Gold: </h1>
	<p id="gold">
		<?php
		echo $_SESSION['gold']. " Gold";
		?>
	</p>
	<div>
		<form action="process.php" method="post">
			<label class="location">Farm</label>
			<input type="hidden" name="building" value="farm" />
			<label>(earns 10-20 gold)<input type="submit" value="Find Gold!" /></label>
		</form>
		<form action="process.php" method="post">
			<label class="location">Cave</label>
			<input type="hidden" name="building" value="Cave" />
			<label>(earns 5-10 gold)<input type="submit" value="Find Gold!" /></label>
		</form>
		<form action="process.php" method="post">
			<label class="location">House</label>
			<input type="hidden" name="building" value="House" />
			<label>(earns 2-5 gold)<input type="submit" value="Find Gold!" /></label>
		</form>
		<form action="process.php" method="post">
			<label class="location">Casino!</label>
			<input type="hidden" name="building" value="Casino!" />
			<label>(earns/takes 0-50 gold)<input type="submit" value="Find Gold!" /></label>
		</form>
	</div>
	<h3>Activities: </h3>
	<div id="activity_log">
		<p id="start"></p>
		<p>
		<?php
		$count = count($_SESSION['activity']);
			for($i=0; $i < $count;$i++) {
				echo $_SESSION['activity'][$i];
			}
		?>
		</p>
	</div>
	<form id="kill" action="kill.php" method="post">
		<button>Reset Game / Give Up</button>
	</form>
</body>
</html>