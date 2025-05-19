<?php
header('Content-Type: application/json');

// Database connection (replace with your own connection details)
$host = 'localhost';
$dbname = 'jellyfish_db';
$username = 'webser';
$password = 'WebSer3010';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to get state-wise species count
    $stateQuery = "
        SELECT a.state, c.species_name as species, COUNT(*) as count
        FROM jf_info a, jf_species_data b, jf_species c
        WHERE a.sno = b.sno AND b.species_id = c.species_id
        GROUP BY a.state, c.species_name
        ORDER BY a.state, count DESC;
    ";

    $stmt = $pdo->prepare($stateQuery);
    $stmt->execute();
    $stateResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Organize data for the main chart (state-wise)
    $states = [];
    $seriesData = [];
    $speciesData = [];

    foreach ($stateResults as $row) {
        if (!in_array($row['state'], $states)) {
            $states[] = $row['state'];
        }
        $speciesData[$row['species']][$row['state']] = (int)$row['count'];
    }

    // Format series data for Highcharts
    foreach ($speciesData as $speciesName => $data) {
        $dataArr = [];
        foreach ($states as $state) {
            $dataArr[] = $data[$state] ?? 0; // Use 0 if no data for that state
        }
        $seriesData[] = [
            'name' => $speciesName,
            'data' => $dataArr
        ];
    }

    // Query to get monthly species count based on date_from and date_to
    $monthQuery = "
        SELECT a.state, c.species_name as species, a.date_from, a.date_to
        FROM jf_info a, jf_species_data b, jf_species c
        WHERE a.sno = b.sno AND b.species_id = c.species_id
        ORDER BY a.state DESC;
    ";

    $stmt = $pdo->prepare($monthQuery);
    $stmt->execute();
    $monthResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Organize monthly data
    $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $monthlySeries = [];

    foreach ($monthResults as $row) {
        $state = $row['state'];
        $species = $row['species'];
        $startDate = new DateTime($row['date_from']);
        $endDate = new DateTime($row['date_to']);

        // Loop through each month within the date range
        while ($startDate <= $endDate) {
            $monthIndex = (int)$startDate->format('n') - 1; // Month index for categories array

            // Initialize data structure if not set
            if (!isset($monthlySeries[$state])) {
                $monthlySeries[$state] = [];
            }

            if (!isset($monthlySeries[$state][$species])) {
                $monthlySeries[$state][$species] = array_fill(0, 12, 0); // Initialize months with 0 counts
            }

            // Increment count for the current month
            $monthlySeries[$state][$species][$monthIndex] += 1;
            $startDate->modify('+1 month'); // Move to the next month
        }
    }

    // Format monthly series for Highcharts
    $monthlySeriesFormatted = [];
    foreach ($monthlySeries as $state => $speciesData) {
        $stateData = [];
        foreach ($speciesData as $speciesName => $monthlyCounts) {
            $stateData[] = [
                'name' => $speciesName,
                'data' => $monthlyCounts
            ];
        }
        $monthlySeriesFormatted[$state] = $stateData;
    }
	
	$pieData = []; // Initialize pieData array

foreach ($stateResults as $row) {
    $state = $row['state'];
    $species = $row['species'];
    $count = (int)$row['count'];

    if (!isset($pieData[$state])) {
        $pieData[$state] = [];
    }

    $pieData[$state][] = [
        'name' => $species,
        'y' => $count
    ];
}

    // Output JSON for Highcharts
    echo json_encode([
        'states' => $states,
        'series' => $seriesData,
        'months' => $months,
        'monthlySeries' => $monthlySeriesFormatted,
		'pieData' => $pieData
    ]);

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}