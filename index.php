<?php
// $debug = (bool) TRUE;

require_once $_SERVER['DOCUMENT_ROOT']."/assets/loader.php";

?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<title>pi_dashboard</title>
	<script src="assets/js/script.js"></script>

	<style>
	@import url('https://fonts.googleapis.com/css2?family=Chivo+Mono:wght@600&family=Cormorant+Garamond:ital,wght@1,500&display=swap');


	html,
	body {
		height: 100%;
		padding: 0;
		margin: 0;
		/* background-color: black;
		color: whitesmoke; */
		font-family: 'Chivo Mono', monospace;
		cursor: none;
	}

	div {
		width: 50%;
		height: 50%;
		float: left;
	}


	.title {
		font-size: 42px;
		font-weight: bold;
		/* text-align: center; */
	}

	#weather,
	#time {
		font-size: 300px;
		font-weight: bold;
		/* text-align: center; */
	}
	</style>
</head>

<body lang="en_US">
	<div id="top-left">
		<span class="title">Current Weather in Fort Bragg, NC:</span>
		<br>
		<span id="weather">
			<?php
				echo current_temperature_outside(); 

				header("Refresh: 300;");

				// tell me a joke 
				// https://icanhazdadjoke.com/api
			?>
		</span>
	</div>
	<div id="top-right"></div>
	<div id="bottom-left">
		<script>
		let a;
		let time;
		setInterval(() => {

			a = new Date();

			hour = a.getHours();
			minute = a.getMinutes();

			// Simply because it's a pain in the you know where to use 24 hour time in JS like a normal person
			if (hour < 10) {
				hour = "0" + hour;
			}

			if (minute < 10) {
				minute = "0" + minute;
			}

			time = hour + ':' + minute;

			document.getElementById('time').innerHTML = time;
		}, 1000);
		</script>

		<span id="time"></span>
	</div>
	<div id="bottom-right">
		<?php

		// get the song name from the file at /tmp/song.txt
		if (file_exists("song.txt")) {
			
			// convert the file to an array of lines
			$lines = file("song.txt");
			echo "<pre>";
			var_export($lines);
			echo "</pre>";
			echo "<br><br>";

			foreach($lines as $key){

				if (str_starts_with($key, "mpris:artUrl ") === TRUE) {

					// remove the "mpris:artUrl: " from the string
					$key = str_replace("mpris:artUrl ", "", $key);
					// remove the newline character from the string
					$key = str_replace("\n", "", $key);
					// assign the string to the $art_url variable
					$art_url = $key;
					// echo "<br>URL: ".$art_url."<br>";

					echo <<<EOT
					<style>
						#bottom-right {
							background-image: url($art_url);
							background-size: cover;
							background-repeat: no-repeat;
							background-position: center;
							object-fit: contain;
							max-width: 50%;
							max-height: 50%;
							width: auto;
							height: auto;
							opacity: 0.5;
							filter: blur(5px);
						}
						</style>
					EOT;

				} else if (str_starts_with($key, "xesam:title ") === TRUE) {

					$key = str_replace("xesam:title ", "", $key);
					$song_title = $key;
					echo "<br>Title: ".$song_title."<br>";

				} else if (str_starts_with($key, "xesam:artist ") === TRUE) {

					$key = str_replace("xesam:artist dbus.Array([dbus.String('", "", $key);
					$key = str_replace("')], signature=dbus.Signature('s'), variant_level=1)", "", $key);
					$song_artist = $key;
					echo "<br>Artist: ".$song_artist."<br>";

				} else if (str_starts_with($key, "mpris:length") === TRUE) {

					$key = str_replace("mpris:length", "", $key);
					$song_length = $key;

					// convert the length of the song from microseconds to minutes and seconds
					$song_length = $song_length / 1000000;
					$song_length = round($song_length, 2);
					$song_length = gmdate("i:s", $song_length);

					echo "<br>Song Length: ".$song_length."<br>";

				}
				unset($key);
			}
		} else {
			echo "File does not exist";
		}
	?>

	</div>
</body>

</html>