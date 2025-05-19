<?php
// Database connection parameters


// Create connection
 
$conn = new mysqli("localhost", "webser","WebSer3010","jellyfish_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL Query to get the monthly frequency of type_of_occurence
$sql = "
   WITH RECURSIVE years AS (
    -- Generate all years from the minimum date_from to the maximum date_to
    SELECT 
        YEAR(MIN(date_from)) AS year_start
    FROM jf_info
    UNION ALL
    SELECT 
        year_start + 1
    FROM years 
    WHERE year_start < (SELECT YEAR(MAX(date_to)) FROM jf_info)
)
SELECT 
    y.year_start AS year,  -- Extract the year
    t.type_of_occurence,
    COUNT(t.type_of_occurence) AS frequency
FROM 
    years y
LEFT JOIN 
    jf_info t
ON 
    YEAR(t.date_from) <= y.year_start AND YEAR(t.date_to) >= y.year_start
GROUP BY 
    year, t.type_of_occurence
ORDER BY 
    year, t.type_of_occurence
LIMIT 100; -- Adjust as needed
";

$result = $conn->query($sql);

// Initialize arrays to store results
$data = [];
$types_of_occurence = ['beach strand', 'swarming']; // Add more types if necessary
$year_occurrences = [];
$year_totals = [];

// Process result and populate arrays
while($row = $result->fetch_assoc()) {
    $year = $row['year'];
    $type_of_occurence = $row['type_of_occurence'];
    $frequency = (int) $row['frequency'];
    
    // Initialize the year if not already present
    if (!isset($year_occurrences[$year])) {
        $year_occurrences[$year] = array_fill(0, count($types_of_occurence), 0);
        $year_totals[$year] = 0; // To track total occurrences for sorting
    }

    // Set frequency for the corresponding type of occurrence
    $index = array_search($type_of_occurence, $types_of_occurence);
    if ($index !== false) {
        $year_occurrences[$year][$index] = $frequency;
        $year_totals[$year] += $frequency; // Add to total for sorting
    }
}

// Sort years by total occurrences (descending order)
uksort($year_occurrences, function($a, $b) use ($year_totals) {
    return $year_totals[$b] - $year_totals[$a];
});

// Prepare data for Highcharts
$categories = array_keys($year_occurrences); // Sorted years
$series_data = [];

foreach ($types_of_occurence as $type) {
    $series_data[] = [
        'name' => ucfirst($type), // Capitalize the type for display
        'data' => array_column($year_occurrences, array_search($type, $types_of_occurence))
    ];
}

// Close connection
$conn->close();

// Return data as JSON
echo json_encode([
    "categories" => $categories,  // Sorted years
    "series" => $series_data  // Series data for each type of occurrence
]);
?>
