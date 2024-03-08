<?php
	$conn=pg_connect("host=localhost port=5432 dbname=testDB user=postgres password=123");
if(!$conn){
        die('Could not Connect My Sql:' .mysql_error());
    }
	echo "<script type='text/javascript'>alert('connected');</script>";
?>