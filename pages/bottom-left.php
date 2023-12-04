<?php

?>
<!DOCTYPE html>

<html>

<head>
</head>

<body>
	<script type="text/javascript" charset="utf-8">
	let a;
	let time;
	setInterval(() => {
		a = new Date();
		time = a.getHours() + ':' + a.getMinutes();
		document.getElementById('time').innerHTML = time;
	}, 1000);
	</script>
	<span id="time"></span>
</body>

</html>