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
    WITH RECURSIVE months AS (
    -- Generate all months from the minimum date_from to maximum date_to
    SELECT 
        DATE_FORMAT(MIN(date_from), '%Y-%m-01') AS month_start
    FROM jf_info
    UNION ALL
    SELECT 
        DATE_ADD(month_start, INTERVAL 1 MONTH) 
    FROM months 
    WHERE month_start < (
        SELECT DATE_FORMAT(MAX(date_to), '%Y-%m-01') 
        FROM jf_info
    )
)
SELECT 
    DATE_FORMAT(m.month_start, '%b') AS month,  -- Get abbreviated month (Jan, Feb, etc.)
    s.type_of_occurence,
    COUNT(s.type_of_occurence) AS frequency
FROM 
    months m
LEFT JOIN 
    jf_info s
ON 
    m.month_start BETWEEN DATE_FORMAT(s.date_from, '%Y-%m-01') AND DATE_FORMAT(s.date_to, '%Y-%m-01')
WHERE 
    s.type_of_occurence IN ('beach strand', 'swarming') -- replace with actual species names or IDs
GROUP BY 
    month, s.type_of_occurence
ORDER BY 
    FIELD(month, 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
    s.type_of_occurence
;
";

$result = $conn->query($sql);

// Prepare data for Highcharts
$data = [];
$beach_strand = [];
$swarming = [];

while($row = $result->fetch_assoc()) {
    $month = $row['month'];
    $type_of_occurence = $row['type_of_occurence'];
    $frequency = (int) $row['frequency'];

    // Populate arrays based on type_of_occurence
    if ($type_of_occurence === "beach strand") {
        $beach_strand[] = $frequency;
    } else if ($type_of_occurence === "swarming") {
        $swarming[] = $frequency;
    }
}

// Close connection
$conn->close();

// Return data as JSON
echo json_encode([
    "categories" => ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    "series" => [
        [
            "name" => "Beach Strand",
            "data" => $beach_strand
        ],
        [
            "name" => "Swarming",
            "data" => $swarming
        ]
    ]
]);
?>
