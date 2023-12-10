<?php

?>

<script>
let a;
let time;
setInterval(() => {
	
	a = new Date();

	a.toLocaleTimeString('en-GB', {
		hour12: false,
		hour: "2-digit",
		minute: "2-digit"
	});

	time = a.getHours() + ':' + a.getMinutes();
	document.getElementById('time').innerHTML = time;
}, 1000);
</script>

<span id="time"></span>