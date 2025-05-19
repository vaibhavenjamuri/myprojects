<?php
//Database connection credentials
// $host = 'localhost';
// $username = 'u_web';
// $password = 'Venkat#3010';
$host = '172.16.1.151';
$username = 'do';
$password = 'Vishnu#3010';
try {
    // Connect to MySQL without specifying a database
    $pdo = new PDO("mysql:host=$host", $username, $password);

    // Fetch all databases
    $query = $pdo->query("SHOW DATABASES");
    $databases = $query->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode($databases);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
