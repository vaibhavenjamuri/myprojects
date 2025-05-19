<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "webser","WebSer3010","jellyfish_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    

    // Query to get state-wise species count
$sql = "SELECT b.species_name as species_name, MIN(a.latitude) AS min_lat, MAX(a.latitude) AS max_lat from jf_info a,jf_species b,jf_species_data c where a.sno=c.sno and b.species_id=c.species_id and a.sno=c.sno group by b.species_name ORDER BY MAX(a.latitude) - MIN(a.latitude) DESC";

$result = $conn->query($sql);

$data = [];
$categories = [];

while ($row = $result->fetch_assoc()) {
    $categories[] = $row['species_name'];
    $data[] = [floatval($row['min_lat']), floatval($row['max_lat'])];
}

echo json_encode([
    'categories' => $categories,
    'ranges' => $data
]);
?>