<?php
// Database connection parameters


// Create connection
 
$conn = new mysqli("localhost", "webser","WebSer3010","jellyfish_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL Query to get the monthly frequency of type_of_occurence
$sql = "SELECT b.class_name as class_name,a.type_of_occurence as type_of_occurence,count(a.type_of_occurence) as frequency from jf_info a,jf_class b,jf_class_data c where a.sno=c.sno and b.class_id=c.class_id and a.sno=c.sno group by b.class_name,a.type_of_occurence ;";

$result = $conn->query($sql);

// Initialize arrays to store results
$data = [];
$types_of_occurence = ['beach strand', 'swarming']; // Add more types if necessary
$state_occurrences = [];
$state_totals = [];

// Process result and populate arrays
while($row = $result->fetch_assoc()) {
    $class_name = $row['class_name'];
    $type_of_occurence = $row['type_of_occurence'];
    $frequency = (int) $row['frequency'];
    
    // Initialize the state if not already present
    if (!isset($state_occurrences[$class_name])) {
        $state_occurrences[$class_name] = array_fill(0, count($types_of_occurence), 0);
        $state_totals[$class_name] = 0; // To track total occurrences for sorting
    }

    // Set frequency for the corresponding type of occurrence
    $index = array_search($type_of_occurence, $types_of_occurence);
    if ($index !== false) {
        $state_occurrences[$class_name][$index] = $frequency;
        $state_totals[$class_name] += $frequency; // Add to total for sorting
    }
}

// Sort states by total occurrences (descending order)
uksort($state_occurrences, function($a, $b) use ($state_totals) {
    return $state_totals[$b] - $state_totals[$a];
});

// Prepare data for Highcharts
$categories = array_keys($state_occurrences); // Sorted states
$series_data = [];

foreach ($types_of_occurence as $type) {
    $series_data[] = [
        'name' => ucfirst($type), // Capitalize the type for display
        'data' => array_column($state_occurrences, array_search($type, $types_of_occurence))
    ];
}

// Close connection
$conn->close();

// Return data as JSON
echo json_encode([
    "categories" => $categories,  // Sorted states
    "series" => $series_data  // Series data for each type of occurrence
]);
?>