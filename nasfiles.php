<?php
	$db = new SQLite3('/srv/http/files.db');
	// finds any values whose PARENT_IDs start with 64 = root directory:
	$results = $db->query('SELECT PARENT_ID,CLASS,DETAIL_ID,NAME FROM OBJECTS WHERE PARENT_ID LIKE "64%"');
	while ($row = $results->fetchArray()) {
		if ($row[1] == 'container.storageFolder') {
			// directory name as headline if object is a folder:
			echo "<h2>".$row[3]."</h2>\n";
		}
		else {
			// media object, insert your own dynDNS address
			echo "<a href=\"http://test.dyndns.net:8200/MediaItems/".$row[2].".mpg\">".$row[3]."</a><br />\n";
		}
	}
?>
