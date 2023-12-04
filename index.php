<?php
$debug = (bool) TRUE;

require_once $_SERVER['DOCUMENT_ROOT']."/assets/loader.php";

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
				<div class="bold mt-1 mx-auto align-top" id="title">Current Weather in Fort Bragg, NC:</div>
				<div class="my-auto" id="content">
					<?php include $_SERVER['DOCUMENT_ROOT']."/pages/top-left.php" ?>
				</div>
			</div>
			<!-- TOP ROW - RIGHT SIDE -->
			<div class="col">
				<?php include $_SERVER['DOCUMENT_ROOT']."/pages/top-right.php" ?>
			</div>
		</div>
		<!-- BOTTOM ROW -->
		<div class="row">
			<!-- BOTTOM ROW - LEFT SIDE -->
			<div class="col">
				<div class="bold mt-1 mx-auto align-top" id="title"></div>
				<div id="content" class="font-italic">
					<?php include $_SERVER['DOCUMENT_ROOT']."/pages/bottom-left.php" ?>
				</div>
			</div>
			<!-- BOTTOM ROW - RIGHT SIDE -->
			<div class="col">
			<?php include $_SERVER['DOCUMENT_ROOT']."/pages/bottom-right.php" ?>
			</div>
		</div>
	</div>
</body>

</html>
