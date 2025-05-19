<?php
// Database connection details
$servername = "localhost";
$username = "webser";
$password = "WebSer3010";
$database = "jellyfish_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the data for the specified year (sent from JavaScript)
$year = isset($_GET['year']) ? intval($_GET['year']) : date("Y");
$sql = "SELECT latitude, longitude, jellyfish_count FROM jf_info WHERE YEAR(date_from) = $year";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
