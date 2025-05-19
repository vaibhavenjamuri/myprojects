<?php
$database = $_GET['database'];
$table = $_GET['table'];
$pdo = new PDO("mysql:host=localhost;dbname=$database", 'u_web', 'Venkat#3010');
 //$pdo = new PDO("mysql:host=172.16.1.151;dbname=$database", 'do', 'Vishnu#3010');
$query = $pdo->query("SHOW COLUMNS FROM `$table`");
$columns = $query->fetchAll(PDO::FETCH_COLUMN);
echo json_encode($columns);
?>
