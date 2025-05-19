<?php
// Database connection settings
$host = "localhost";
$username = "webser";
$password = "WebSer3010";
$dbname = "jellyfish_db";




try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // SQL query to fetch latitude and longitude
    $stmt = $pdo->prepare("SELECT latitude, longitude, year FROM jf_info");
	// $stmt = $pdo->prepare("SELECT a.latitude, a.longitude, a.year,b.species_name as species FROM jf_info a,jf_species b, jf_species_data c where a.sno=c.sno and c.species_id=b.species_id ");

	$stmt->execute();
    // Fetch data as an associative array
    $latLngs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Return data as JSON
    echo json_encode(['status' => 'success', 'latLngs' => $latLngs]);
	} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>