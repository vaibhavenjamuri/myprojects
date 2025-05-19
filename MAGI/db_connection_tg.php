<?php
$mysqli = new mysqli("172.16.1.151", "do","Vishnu#3010","db_tide_guage");
		# check connection
		if ($mysqli->connect_errno) 
		{
			echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
			exit();
		}
		?>