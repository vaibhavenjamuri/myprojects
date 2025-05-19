<?php
// Start session if not already started
session_start();

// Include database connection file
require_once 'db_connection.php'; // Adjust the path to your connection file
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $index = isset($_POST['editIndex1']) ? intval($_POST['editIndex1']) : NULL;
    $deploymentDate = isset($_POST['ddate']) ? $_POST['ddate'] : NULL;
	$deploymentDate1=$deploymentDate;
	//$retrieved = isset($_POST['retrieved']) ? $_POST['retrieved'] : NULL;
	//$retrieved1=$retrieved;
    $stationType = isset($_POST['type']) ? $_POST['type'] : NULL;
	$name = isset($_POST['name']) ? $_POST['name'] : NULL;
	$sensorType = isset($_POST['stype']) ? $_POST['stype'] : NULL;
	$sensormake = isset($_POST['smake']) ? $_POST['smake'] : NULL;
	$sensormodel = isset($_POST['smodel']) ? $_POST['smodel'] : NULL;
	
	
	echo "Index: "  .$index . "<br>";
echo "Deployment Date: ". $deploymentDate . "<br>";
echo "Station Name: " . $name . "<br>";


if ($deploymentDate!=""){
	//$dateTime = DateTime::createFromFormat('Y-m-d\TH:i:s', $deploymentDate);
	 $dateTime = new DateTime($deploymentDate);
    $deploymentDate1 = $dateTime->format('Y-m-d H:i:s');
}
	if ($retrieved!=""){
	//$dateTime = DateTime::createFromFormat('Y-m-d\TH:i', $retrieved);
	 $dateTime = new DateTime($retrieved);
	$retrieved1 = $dateTime->format('Y-m-d H:i:s');
	}
	
	
    // Validate input
    // if ($index === null || !$deploymentDate || !$name || !$stationType|| !$retrieved) {
        // echo "Error: All fields are required!";
        // exit;
    // }
	echo "<script>console.log('Index: " . $index . "');</script>";
        echo "<script>console.log('Deployment Date: " . $deploymentDate1 . "');</script>";
		
        echo "<script>console.log('Station Name: " . $name . "');</script>";
        echo "<script>console.log('Current Deployment Date: " . $_SESSION['ddate'] . "');</script>";
         echo "<script>console.log('Station Name: " . $sensorType . "');</script>";
		  echo "<script>console.log('Station Name: " . $sensormake . "');</script>";
		   echo "<script>console.log('Station Name: " . $name . "');</script>";
		 echo "<script>console.log('stationType: " . $sensormodel . "');</script>";
		echo "Index: " . htmlspecialchars($index) . "<br>";
echo "Deployment Date: " . htmlspecialchars($deploymentDate1) . "<br>";

echo "Station Name: " . htmlspecialchars($name) . "<br>";
echo "Current Deployment Date: " . htmlspecialchars($_SESSION['ddate']) . "<br>";

    
	// if($stationType=="Tide Guage")
	// {
		 try {
			  $stmt = $pdo->prepare("UPDATE sensor_models 
                               SET sensor_model = '$sensormodel',
							   
                               WHERE platform_id = :stationNameDisplay and type_of_platform=:stationType and deployment_date='$deploymentDate1'");

        // Bind parameters
        //$stmt->bindParam(':deploymentDate', $deploymentDate1);
        $stmt->bindParam(':stationType', $stationType);
        $stmt->bindParam(':stationNameDisplay', $name);
		
        //$stmt->bindParam(':id', $index); // Assuming index corresponds to `id`

        // Execute query
        if ($stmt->execute()) {
			
			$stmt1 = $pdo->prepare("UPDATE sensor_model_details 
                               SET sensor_model = '$sensormodel',
							   
                               WHERE sensor_make = :sensormake and sensor_type=sensortype");

        // Bind parameters
        //$stmt->bindParam(':deploymentDate', $deploymentDate1);
        $stmt1->bindParam(':sensortype', $sensorType);
        $stmt1->bindParam(':sensormake', $sensormake);
		
		if ($stmt1->execute()) {
			
			$stmt2 = $pdo->prepare("SELECT * FROM sensor_model_details WHERE sensor_model=:sensormodel AND sensor_type = :sensortype and sensor_make=:sensormake");
			 $stmt2->bindParam(':sensormodel', $sensormodel);
		 $stmt2->bindParam(':sensortype', $sensorType);
        $stmt2->bindParam(':sensormake', $sensormake);
		 if ($stmt2->execute()) {
		$updatedData = $stmt2->fetchAll(PDO::FETCH_ASSOC);
 
        // Update session variables
		$_SESSION['cart17'] = array_column($updatedData, 'sensor_model');
		$_SESSION['cart18'] = array_column($updatedData, 'sensor_make');
		$_SESSION['cart19'] = array_column($updatedData, 'sensor_type');
        $_SESSION['cart24'] = array_column($updatedData, 'deployment_date');
        //$_SESSION['cart22'] = array_column($updatedData, 'type_of_station');
        //$_SESSION['cart23'] = array_column($updatedData, 'station_name');
		 }
        // Redirect to homepage
        header("Location: ../deploymentdates3.php");
        exit();
			 
exit();
        } 
		}
		else {
            echo "Error updating data.";
        }
		 }
		 
		 catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
		
	// }
	// else if($stationType=="Wave Rider Buoy"){
		
	// Update data in the database
    try {
		//echo $_SESSION['cart33'][$index];
		
        // Prepare SQL query
		// error_log("Session cart33 value: " . $_SESSION['cart33'][$index]);
// error_log("Session cart34 value: " . $_SESSION['cart34'][$index]);

        $stmt = $pdo->prepare("UPDATE platform_identification_details 
                               SET deployment_date = '$deploymentDate1', 
							   retrieved_drift_date='$retrieved1'
                               WHERE platform_id = :stationNameDisplay and type_of_platform=:stationType and deployment_date='" . $_SESSION['cart23'][$index] . "' and retrieved_drift_date='" . $_SESSION['cart24'][$index] . "'");
		 // $queryWithValues = "UPDATE wrb_identification_details 
                               // SET new_deployment_date = '$deploymentDate1'                                                                 
                               // WHERE station_name = :stationNameDisplay and type_of_station=:stationType                                                          
                               // and new_deployment_date='" . $_SESSION['cart33'][$index] . "' and retrieved_drift_date='" . $_SESSION['cart34'][$index] . "'";
        // echo "<pre>" . $queryWithValues . "</pre>";
		// Bind parameters
        //$stmt->bindParam(':deploymentDate', $deploymentDate1);
        $stmt->bindParam(':stationType', $stationType);
        $stmt->bindParam(':stationNameDisplay', $name);
        //$stmt->bindParam(':id', $index); // Assuming index corresponds to `id`
//$stmt->bindParam(':currentDeploymentDate', $_SESSION['cart33'][$index]);
//$stmt->bindParam(':currentRetrievedDate', $_SESSION['cart34'][$index]);
//echo $stmt;

   

        // Execute query
        if ($stmt->execute()) {
			  echo "<script>console.log('Update successful');</script>";
		$stmt2 = $pdo->prepare("SELECT * FROM platform_identification_details WHERE type_of_platform=:stationType AND platform_id = :stationNameDisplay order by deployment_date desc");
        $stmt2->bindParam(':stationNameDisplay', $name);
		$stmt2->bindParam(':stationType', $stationType);
		 if ($stmt2->execute()) {
		$updatedData = $stmt2->fetchAll(PDO::FETCH_ASSOC);
         // Update session variables
        $_SESSION['cart23'] = array_column($updatedData, 'deployment_date');
		$_SESSION['cart24'] = array_column($updatedData, 'retrieved_drift_date');
        //$_SESSION['cart22'] = array_column($updatedData, 'type_of_station');
        //$_SESSION['cart23'] = array_column($updatedData, 'station_name');
		 }
        // Redirect to homepage
         header("Location: ../tgsensormodels3.php");
        exit();
			 
exit();
        } else {
            echo "Error updating data.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
	}
	
//} 
else {
    echo "Invalid request.";
}
?>
