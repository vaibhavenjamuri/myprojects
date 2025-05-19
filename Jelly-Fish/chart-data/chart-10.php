<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "webser", "WebSer3010", "jellyfish_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// RANGES by longitude
$sql_range = "
    SELECT 
        b.species_name,
        MIN(CASE WHEN YEAR(a.date_from) BETWEEN 1980 AND 2015 THEN a.longitude END) AS min_lat_1980_2015,
        MAX(CASE WHEN YEAR(a.date_from) BETWEEN 1980 AND 2015 THEN a.longitude END) AS max_lat_1980_2015,
        MIN(CASE WHEN YEAR(a.date_from) > 2015 THEN a.longitude END) AS min_lat_2015_2025,
        MAX(CASE WHEN YEAR(a.date_from) > 2015 THEN a.longitude END) AS max_lat_2015_2025
    FROM jf_info a
    JOIN jf_species_data c ON a.sno = c.sno
    JOIN jf_species b ON b.species_id = c.species_id
    WHERE a.longitude IS NOT NULL
    GROUP BY b.species_name
";

$result_range = $conn->query($sql_range);

$xrange = [];
$species_y_map = [];
$y_counter = 0;

while ($row = $result_range->fetch_assoc()) {
    $species = $row['species_name'];

    if (!isset($species_y_map[$species])) {
        $species_y_map[$species] = $y_counter++;
    }

    $y = $species_y_map[$species];

    if (!is_null($row['min_lat_1980_2015']) && !is_null($row['max_lat_1980_2015'])) {
        $xrange[] = [
            "x" => (float)$row['min_lat_1980_2015'],
            "x2" => (float)$row['max_lat_1980_2015'],
            "y" => $y,
            "species" => $species,
            "color" => "blue",
            "rangeLabel" => "1980–2015"
        ];
    }

    if (!is_null($row['min_lat_2015_2025']) && !is_null($row['max_lat_2015_2025'])) {
        $xrange[] = [
            "x" => (float)$row['min_lat_2015_2025'],
            "x2" => (float)$row['max_lat_2015_2025'],
            "y" => $y,
            "species" => $species,
            "color" => "orange",
            "rangeLabel" => "2015–2025"
        ];
    }
}

// BUBBLE points
$sql_bubbles = "
    SELECT 
        b.species_name,
        a.longitude,
        YEAR(a.date_from) AS year
    FROM jf_info a
    JOIN jf_species_data c ON a.sno = c.sno
    JOIN jf_species b ON b.species_id = c.species_id
    WHERE a.longitude IS NOT NULL AND a.date_from IS NOT NULL
";

$result_bubbles = $conn->query($sql_bubbles);

$bubbles = [];

while ($row = $result_bubbles->fetch_assoc()) {
    $species = $row['species_name'];

    if (!isset($species_y_map[$species])) continue;

    $bubbles[] = [
        "x" => (float)$row['longitude'],  // x is now longitude
        "y" => $species_y_map[$species],
        "z" => (float)$row['longitude'],  // colorKey
        "year" => $row['year'],
        "species" => $species
    ];
}

echo json_encode([
    "xrange" => $xrange,
    "bubbles" => $bubbles,
    "categories" => array_keys($species_y_map)
]);
?>