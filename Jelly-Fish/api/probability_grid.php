<?php
// Database connection settings
$host = "localhost";
$username = "webser";
$password = "WebSer3010";
$dbname = "jellyfish_db";



$checkboxId=$_GET['checkboxId'];
try {
	$latLngs=[];
	$totallatlng=[];
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to fetch latitude and longitude
	if($checkboxId=='winter'){
    
    //$stmt = $pdo->prepare("SELECT latitude, longitude,date_from,date_to FROM jf_info WHERE (MONTH(date_from) BETWEEN 12 AND 12 OR MONTH(date_from) BETWEEN 1 AND 2) AND (MONTH(date_to) BETWEEN 12 AND 12 OR MONTH(date_to) BETWEEN 1 AND 2)");
	// $stmt = $pdo->prepare("SELECT a.latitude, a.longitude, b.species_name as species FROM jf_info a,jf_species b, jf_species_data c where a.sno=c.sno and c.species_id=b.species_id and (MONTH(a.date_from) <= 2 OR MONTH(a.date_to) >= 12)");
	// $stmt = $pdo->prepare("SELECT a.latitude, a.longitude, b.species_name as species FROM jf_info a,jf_species b, jf_species_data c where a.sno=c.sno and c.species_id=b.species_id and (MONTH(a.date_from) <= 2 OR MONTH(a.date_to) >= 12)");
	//$stmt = $pdo->prepare("SELECT latitude, longitude FROM jf_info where (MONTH(date_from) <= 2 OR MONTH(date_to) >= 12)");
	$stmt = $pdo->prepare("SELECT latitude,longitude,date_from,date_to FROM jf_info WHERE   (DATEDIFF(LEAST(date_to, STR_TO_DATE(CONCAT(YEAR(date_from), '-12-31'), '%Y-%m-%d')), 
      GREATEST(date_from, STR_TO_DATE(CONCAT(YEAR(date_from), '-12-01'), '%Y-%m-%d'))) >= 0)OR(DATEDIFF(LEAST(date_to, STR_TO_DATE(CONCAT(YEAR(date_to), '-02-28'), '%Y-%m-%d')), 
      GREATEST(date_from, STR_TO_DATE(CONCAT(YEAR(date_to), '-01-01'), '%Y-%m-%d'))) >= 0  )");
	}
	else if($checkboxId=='summer'){
    //$stmt = $pdo->prepare("SELECT latitude, longitude FROM jf_info WHERE (MONTH(date_from) BETWEEN 3 AND 5) AND (MONTH(date_to) BETWEEN 3 AND 5)");
	//$stmt = $pdo->prepare("SELECT a.latitude, a.longitude, b.species_name as species FROM jf_info a,jf_species b, jf_species_data c where a.sno=c.sno and c.species_id=b.species_id and (MONTH((date_from)) <= 5 AND MONTH((date_to)) >= 3)");
	//$stmt = $pdo->prepare("SELECT latitude, longitude FROM jf_info where (MONTH((date_from)) <= 5 AND MONTH((date_to)) >= 3)");
	$stmt = $pdo->prepare("SELECT latitude,longitude,date_from,date_to FROM jf_info WHERE   (    DATEDIFF(LEAST(date_to, STR_TO_DATE(CONCAT(YEAR(date_from), '-05-31'), '%Y-%m-%d')), 
      GREATEST(date_from, STR_TO_DATE(CONCAT(YEAR(date_from), '-03-01'), '%Y-%m-%d'))    ) >= 0    OR    DATEDIFF(      LEAST(date_to, STR_TO_DATE(CONCAT(YEAR(date_to), '-05-31'), '%Y-%m-%d')), 
      GREATEST(date_from, STR_TO_DATE(CONCAT(YEAR(date_to), '-03-01'), '%Y-%m-%d'))    ) >= 0  )");	
	  }
	else if($checkboxId=='monsoon')
	{
    //$stmt = $pdo->prepare("SELECT latitude, longitude FROM jf_info WHERE (MONTH(date_from) BETWEEN 6 AND 9) AND (MONTH(date_to) BETWEEN 6 AND 9)");
    // $stmt = $pdo->prepare("SELECT a.latitude, a.longitude, b.species_name as species FROM jf_info a,jf_species b, jf_species_data c where a.sno=c.sno and c.species_id=b.species_id and (MONTH(date_from) <= 9 AND MONTH(date_to) >= 6)");
	//$stmt = $pdo->prepare("SELECT latitude, longitude FROM jf_info where (MONTH(date_from) <= 9 AND MONTH(date_to) >= 6)");
	$stmt = $pdo->prepare("SELECT latitude,longitude,date_from,date_to
FROM jf_info
WHERE 
  (
    DATEDIFF(
      LEAST(date_to, STR_TO_DATE(CONCAT(YEAR(date_from), '-09-30'), '%Y-%m-%d')), 
      GREATEST(date_from, STR_TO_DATE(CONCAT(YEAR(date_from), '-06-01'), '%Y-%m-%d'))
    ) >= 0
    OR
    DATEDIFF(
      LEAST(date_to, STR_TO_DATE(CONCAT(YEAR(date_to), '-09-30'), '%Y-%m-%d')), 
      GREATEST(date_from, STR_TO_DATE(CONCAT(YEAR(date_to), '-06-01'), '%Y-%m-%d'))
    ) >= 0
  )");
	}
	else if($checkboxId=='post-monsoon'){
	//$stmt = $pdo->prepare("SELECT latitude, longitude FROM jf_info WHERE (MONTH(date_from) BETWEEN 10 AND 11) AND (MONTH(date_to) BETWEEN 10 AND 11)");
  	//$stmt = $pdo->prepare("SELECT a.latitude, a.longitude, b.species_name as species FROM jf_info a,jf_species b, jf_species_data c where a.sno=c.sno and c.species_id=b.species_id and (MONTH(date_from) <= 11 AND MONTH(date_to) >= 10)");
	//$stmt = $pdo->prepare("SELECT a.latitude, a.longitude, b.species_name as species FROM jf_info a,jf_species b, jf_species_data c where a.sno=c.sno and c.species_id=b.species_id and (MONTH(date_from) <= 11 AND MONTH(date_to) >= 10)");
	//$stmt = $pdo->prepare("SELECT latitude, longitude  FROM jf_info where (MONTH(date_from) <= 11 AND MONTH(date_to) >= 10)");
	$stmt = $pdo->prepare("SELECT latitude,longitude,date_from,date_to
FROM jf_info
WHERE 
  (
    DATEDIFF(
      LEAST(date_to, STR_TO_DATE(CONCAT(YEAR(date_from), '-11-30'), '%Y-%m-%d')), 
      GREATEST(date_from, STR_TO_DATE(CONCAT(YEAR(date_from), '-10-01'), '%Y-%m-%d'))
    ) >= 0
    OR
    DATEDIFF(
      LEAST(date_to, STR_TO_DATE(CONCAT(YEAR(date_to), '-11-30'), '%Y-%m-%d')), 
      GREATEST(date_from, STR_TO_DATE(CONCAT(YEAR(date_to), '-10-01'), '%Y-%m-%d'))
    ) >= 0
  )");

	}
			 $stmt->execute();
 $stmt2 = $pdo->prepare("SELECT latitude, longitude FROM jf_info");
   $stmt2->execute();
    // Fetch data as an associative array
    $latLngs = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totallatlng = $stmt2->fetchAll(PDO::FETCH_ASSOC); // Store the 'count' value in a variable
    // Return data as JSON
    echo json_encode(['status' => 'success', 'latLngs' => $latLngs,'totallatlng'=>$totallatlng]);

} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>