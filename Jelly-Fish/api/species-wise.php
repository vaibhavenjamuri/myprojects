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
// $year = isset($_GET['year']) ? intval($_GET['year']) : date("Y");
$sql = "SELECT a.latitude ,a.longitude,c.species_name,a.type_of_occurence,a.year,a.state FROM jf_info a, jf_species_data b, jf_species c where a.sno=b.sno and b.species_id=c.species_id group by a.latitude,a.longitude,c.species_name order by c.species_name";
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
