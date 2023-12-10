<?php

// get the song name from the file at /tmp/song.txt
if (file_exists("song.txt")) {

	// convert the file to an array of lines
	$lines = file("song.txt");

	foreach($lines as $key){
		echo '<!--'.$key.'-->';

		if (str_starts_with($key, "mpris:artUrl") === TRUE) {
			// remove the "mpris:artUrl: " from the string
			$key = str_replace("mpris:artUrl;", "", $key);
			// remove the newline character from the string
			$key = str_replace("\n", "", $key);
			// assign the string to the $art_url variable
			$art_url = $key;
		} else if (str_starts_with("xesam:title", $key) === TRUE) {
			$key = str_replace("xesam:title;", "", $key);
			$song_title = $key;
		} else if (str_starts_with("xesam:artist", $key) === TRUE) {
			$key = str_replace("xesam:artist;", "", $key);
			$song_artist = $key;
		} else if (str_starts_with("mpris:length;", $key) === TRUE) {
			$key = str_replace("mpris:length;", "", $key);
			$song_album = $key;
		}
	}
} else {
	echo "File does not exist";
}
?>

<div class="text-center" id="content" style='background-image: url("<?php echo $art_url; ?>");'>
	<!-- <img src="" class="rounded mx-auto d-block img-fluid"> -->
</div>
