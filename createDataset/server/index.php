<?php
	//echo $_POST['s'];
	// Path to file dataSet
	$file = 'dataSet.txt';
	// Check that POST is Set 
	if (isset($_POST['s'])) {
		// Get Post parameter s
		$line = $_POST['s'] . "\n";
		// using the FILE_APPEND flag to append the content to the end of the file
		// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
		file_put_contents($file, $line, FILE_APPEND | LOCK_EX);
	}

?>