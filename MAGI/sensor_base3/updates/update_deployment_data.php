<?php
// Start session if not already started
session_start();

// Include database connection file
require_once 'db_connection.php'; // Adjust the path to your connection file

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $index = isset($_POST['editIndex']) ? intval($_POST['editIndex']) : null;
    $deploymentDate = isset($_POST['deploymentDate']) ? $_POST['deploymentDate'] : null;
    //$stationType = isset($_POST['stationType']) ? $_POST['stationType'] : null;
    $stationNameDisplay = isset($_POST['stationNameDisplay']) ? $_POST['stationNameDisplay'] : null;

    // Validate input
    if ($index === null || !$deploymentDate || !$stationNameDisplay) {
        echo "Error: All fields are required!";
        exit;
    }

    // Update data in the database
    try {
        // Prepare SQL query
        $stmt = $pdo->prepare("UPDATE tg_identification_details 
                               SET deployment_date = :deploymentDate                                                                 
                               WHERE station_name = :stationNameDisplay ");

        // Bind parameters
        $stmt->bindParam(':deploymentDate', $deploymentDate);
        //$stmt->bindParam(':stationType', $stationType);
        $stmt->bindParam(':stationNameDisplay', $stationNameDisplay);
        //$stmt->bindParam(':id', $index); // Assuming index corresponds to `id`

        // Execute query
        if ($stmt->execute()) {
			$stmt2 = $pdo->prepare("SELECT * FROM tg_identification_details WHERE station_name = :stationNameDisplay");
        $stmt2->bindParam(':stationNameDisplay', $stationNameDisplay);
		 if ($stmt2->execute()) {
		$updatedData = $stmt2->fetchAll(PDO::FETCH_ASSOC);
 
        // Update session variables
        $_SESSION['cart21'] = array_column($updatedData, 'deployment_date');
        //$_SESSION['cart22'] = array_column($updatedData, 'type_of_station');
        //$_SESSION['cart23'] = array_column($updatedData, 'station_name');
		 }
        // Redirect to homepage
        header("Location: ../deploymentdates3.php");
        exit();
			 
exit();
        } else {
            echo "Error updating data.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
