
	
<?php
// Database connection parameters


// Create connection
 
$conn = new mysqli("localhost", "webser","WebSer3010","jellyfish_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}	
	
	
	
	
$sql = "
   SELECT a.state, c.species_name as species, COUNT(c.species_name) AS species_count
    FROM jf_info a, jf_species_data b, jf_species c where a.sno=b.sno and b.species_id=c.species_id
    GROUP BY a.state, c.species_name
    ORDER BY a.state, species_count DESC;
";

$result = $conn->query($sql);

// Prepare data for Highcharts
$data = [];
$states = [];
$species_data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $state = $row['state'];
        $species = $row['species'];
        $count = $row['species_count'];

        // Keep track of unique states
        if (!in_array($state, $states)) {
            $states[] = $state;
        }

        // Prepare species data for each species (only if the count > 0)
        if ($count > 0) {
            if (!isset($species_data[$species])) {
                $species_data[$species] = [];
            }
            $species_data[$species][$state] = (int)$count;
        }
    }
}

// Format the data for Highcharts
$series = [];
foreach ($species_data as $species => $state_counts) {
    $data = [];
    foreach ($states as $state) {
        // If the species exists in the state, include it; otherwise, exclude it
        $data[] = isset($state_counts[$state]) ? $state_counts[$state] : null;
    }
    $series[] = [
        'name' => $species,  // Species name
        'data' => $data      // Species counts for each state (null if species doesn't exist)
    ];
}

// Output data as JSON
$response = [
    'states' => $states,
    'series' => $series
];

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>