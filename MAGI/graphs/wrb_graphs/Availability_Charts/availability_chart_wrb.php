<?php


// Create connection
$conn = new mysqli("172.16.1.151", "do","Vishnu#3010", "db_tide_guage");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$station_id = $_GET['pid'];
// SQL to fetch buoy data, ordered by buoy_id and date
$sql = "SELECT station_id as buoy_id,observation_time FROM t_tide_guage_incois_daily_avail WHERE observation_time BETWEEN (SELECT MIN(observation_time)  FROM t_tide_guage_incois_daily_avail) AND  CURDATE()  AND station_id='".$station_id."' ORDER BY buoy_id, observation_time";
$result = $conn->query($sql);

// Array to store buoy availability
$buoy_availability = [];

if ($result->num_rows > 0) {
    $current_buoy_id = null;
    $start_date = null;
    $end_date = null;

    while($row = $result->fetch_assoc()) {
        if ($current_buoy_id !== $row['buoy_id']) {
            // New buoy, close previous buoy date range
            if ($current_buoy_id !== null) {
                $buoy_availability[$current_buoy_id][] = [
                    'start' => $start_date,
                    'end' => $end_date
                ];
            }
            // Start a new range for the new buoy
            $current_buoy_id = $row['buoy_id'];
            $start_date = $row['observation_time'];
            $end_date = $row['observation_time'];
        } else {
            // Check if the observation date is consecutive
            $previous_date = new DateTime($end_date);
            $current_date = new DateTime($row['observation_time']);
            $interval = $previous_date->diff($current_date)->days;

            if ($interval > 1) {
                // Non-consecutive date, close current range
                $buoy_availability[$current_buoy_id][] = [
                    'start' => $start_date,
                    'end' => $end_date
                ];
                // Start a new range
                $start_date = $row['observation_time'];
            }
            // Update the end date
            $end_date = $row['observation_time'];
        }
    }
    // Add the final buoy range for the last buoy
    if ($current_buoy_id !== null) {
        $buoy_availability[$current_buoy_id][] = [
            'start' => $start_date,
            'end' => $end_date
        ];
    }
}

// Output buoy availability data in JSON format
header('Content-Type: application/json');
echo json_encode($buoy_availability);

// Close connection
$conn->close();
?>