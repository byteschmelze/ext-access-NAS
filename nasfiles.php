<?php
	$db = new SQLite3('files.db');
	$results = $db->query('SELECT REF_ID,CLASS,DETAIL_ID,NAME FROM OBJECTS WHERE (REF_ID IS NULL) AND (DETAIL_ID > 20)');
	while ($row = $results->fetchArray()) {
		if (($row[1] == 'container.storageFolder') AND ($row[3] != 'lost+found')) {
			echo "<h2>".$row[3]."</h2>\n";
		}
		elseif ($row[3] != 'lost+found') {
			echo "<a href=\"http://192.168.231.13:8200/MediaItems/".$row[2].".mpg\">".$row[3]."</a><br />\n";
		}
	}
?>