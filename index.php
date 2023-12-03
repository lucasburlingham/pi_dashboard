<?php

require_once $_SERVER['DOCUMENT_ROOT']."/pi_dashboard/assets/loader.php";

?>

<!DOCTYPE html>
<html>

<head>
	<?php
		// Load css and js
		loadCSS();
		loadJS();
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>pi_dashboard</title>

</head>

<body lang="en_US">

	<div class="container-fluid">
		<!-- TOP ROW -->
		<div class="row">
			<!-- TOP ROW - LEFT SIDE -->
			<div class="col">
				<div class="bold mt-1 mx-auto align-top" id="temperature_title">Current Weather in Fort Bragg, NC:</div>
				<!-- <div class="my-auto"><?php echo current_temperature_outside(); ?></div> -->
				<div class="my-auto" id="temperature">67</div>
			</div>
			<!-- TOP ROW - RIGHT SIDE -->
			<div class="col">
				hi
			</div>
		</div>
		<!-- BOTTOM ROW -->
		<div class="row">
			<!-- BOTTOM ROW - LEFT SIDE -->
			<div class="col">
				<div class="bold mt-1 mx-auto align-top" id="temperature_title">Current Weather in Fort Bragg, NC:</div>
				<!-- <div class="my-auto"><?php echo current_temperature_outside(); ?></div> -->
				<div class="my-auto" id="temperature">67</div>
			</div>
			<!-- BOTTOM ROW - RIGHT SIDE -->
			<div class="col">
				hi
			</div>
		</div>
	</div>

</body>

</html>