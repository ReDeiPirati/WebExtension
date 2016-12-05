<?php
	// Path to file dataSet
	$file = "dataSet.txt";
	
	// Check that GET is SET
	if (isset($_GET)){
		// Execute tail -n 1 dataSet.txt(return last row)
		$line = `tail -n 1 $file`;
		$tot =`wc -l $file | cut -d " " -f1`;
		$pos = `cat $file | rev | sort -nr | cut -d " " -f1 | uniq -c  | rev | head -n1 | cut -d " " -f2`;
		$neg = `cat $file | rev | sort -nr | cut -d " " -f1 | uniq -c  | rev | tail -n1 | cut -d " " -f2`;

		echo "Last line:\n". $line ."\nPositive: " . $pos . '/' . $tot . "Negative: ". $neg . "/" . $tot;
	} 
	// Check that POST is Set
	if (isset($_POST['s'])) {
		// Get Post parameter s
		$line = $_POST['s'] . "\n";
		// using the FILE_APPEND flag to append the content to the end of the file
		// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
		file_put_contents($file, $line, FILE_APPEND | LOCK_EX);
	}

?>