<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PostgreSQL SELECT Example 1</title>
<meta name="description" content="If we want to fetch all rows from the actor table the following PostgreSQL SELECT statement can be used.">
</head>
<body>
<h1>List of all actors in the table</h1>
<?php
$conn=pg_connect("host=localhost port=5432 dbname=testDB user=postgres password=123");

$result = pg_query($conn, "SELECT * FROM testing");  
if (!$result) {  
 echo "An error occurred.\n";  
 exit;  
}  
while ($row = pg_fetch_row($result)) {  
 echo "value1: $row[0]";  
 echo "<br />\n";  
}  
?>
</body>
</html>
