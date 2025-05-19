<?php
//Database connection credentials
$host = 'localhost';
$username = 'u_web';
$password = 'Venkat#3010';
// $host = '172.16.1.151';
// $username = 'do';
// $password = 'Vishnu#3010';

$database1 = isset($_GET['database1']) ? $_GET['database1'] : '';
$table1 = $_GET['table1'];
$xaxis1 = $_GET['xaxis1'];
$yaxis1 = $_GET['yaxis1'];
$stationId1 = $_GET['stationId1'];
$stationsel1 = $_GET['stationsel1'];
$database2= isset($_GET['database2']) ? $_GET['database2'] : '';
$table2 = $_GET['table2'];
$xaxis2 = $_GET['xaxis2'];
$yaxis2 = $_GET['yaxis2'];
$stationsel2 = $_GET['stationsel2'];
$stationId2 = $_GET['stationId2'];
$database3 = isset($_GET['database3']) ? $_GET['database3'] : '';
$table3 = $_GET['table3'];
$xaxis3 = $_GET['xaxis3'];
$yaxis3 = $_GET['yaxis3'];
$stationsel3 = $_GET['stationsel3'];
$stationId3 = $_GET['stationId3'];
$database4 = isset($_GET['database4']) ? $_GET['database4'] : '';
$table4 = $_GET['table4'];
$xaxis4 = $_GET['xaxis4'];
$yaxis4 = $_GET['yaxis4'];
$stationsel4 = $_GET['stationsel4'];
$stationId4 = $_GET['stationId4'];


$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];

$min=$_GET['min'];
$max=$_GET['max'];



 $data1=[];
 $data2=[];
$data3=[];
$data4=[];
try {
    // Connect to MySQL for the first database
	if ($database1 !== 'null' && !empty($database1)) {

		 

    $pdo1 = new PDO("mysql:host=$host;dbname=$database1", $username, $password);

    // Query to fetch data from the first table
    $stmt1 = $pdo1->prepare("SELECT `$xaxis1` AS x, `$yaxis1` AS y FROM `$table1` WHERE `$stationId1` = :stationsel1 AND `$xaxis1` BETWEEN :startDate AND :endDate AND `$yaxis1` BETWEEN :min AND :max ORDER BY `$xaxis1` ASC");
   
	$stmt1->execute(['stationsel1' => $stationsel1,'startDate' => $startDate, 'endDate' => $endDate,'min' => $min, 'max' => $max]);
    $data1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
	
}


if ($database2 !== 'null' && !empty($database2)) {

	

    // Connect to MySQL for the second database
    $pdo2 = new PDO("mysql:host=$host;dbname=$database2", $username, $password);

    // Query to fetch data from the second table
    $stmt2 = $pdo2->prepare("SELECT `$xaxis2` AS x, `$yaxis2` AS y FROM `$table2` WHERE `$stationId2` = :stationsel2 AND `$xaxis2` BETWEEN :startDate AND :endDate AND `$yaxis2` BETWEEN :min AND :max ORDER BY `$xaxis2` ASC");
    $stmt2->execute(['stationsel2' => $stationsel2,'startDate' => $startDate, 'endDate' => $endDate,'min' => $min, 'max' => $max]);
    $data2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
 }
 if ($database3 !== 'null' && !empty($database3)) {

	 
 $pdo3 = new PDO("mysql:host=$host;dbname=$database3", $username, $password);
  $stmt3 = $pdo3->prepare("SELECT `$xaxis3` AS x, `$yaxis3` AS y FROM `$table3` WHERE `$stationId3` = :stationsel3 AND `$xaxis3` BETWEEN :startDate AND :endDate AND `$yaxis3` BETWEEN :min AND :max ORDER BY `$xaxis3` ASC");
    $stmt3->execute(['stationsel3' => $stationsel3,'startDate' => $startDate, 'endDate' => $endDate,'min' => $min, 'max' => $max]);
    $data3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
}
if ($database4 !== 'null' && !empty($database4)) {

	 
	 $pdo4 = new PDO("mysql:host=$host;dbname=$database4", $username, $password);
	  $stmt4 = $pdo4->prepare("SELECT `$xaxis4` AS x, `$yaxis4` AS y FROM `$table4` WHERE `$stationId4` = :stationsel4 AND `$xaxis4` BETWEEN :startDate AND :endDate AND `$yaxis4` BETWEEN :min AND :max ORDER BY `$xaxis4` ASC");
    $stmt4->execute(['stationsel4' => $stationsel4,'startDate' => $startDate, 'endDate' => $endDate,'min' => $min, 'max' => $max]);
    $data4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
 }
    // Format data for Highcharts
    $formattedData = [
        [
            'name' => "$table1 - $yaxis1",
            'data' => array_map(function($row) {
                return [strtotime($row['x']) * 1000, (float)$row['y']];
            }, $data1)
        ],
        [
            'name' => "$table2 - $yaxis2",
            'data' => array_map(function($row) {
                return [strtotime($row['x']) * 1000, (float)$row['y']];
            }, $data2)
        ],
		[
            'name' => "$table3 - $yaxis3",
            'data' => array_map(function($row) {
                return [strtotime($row['x']) * 1000, (float)$row['y']];
            }, $data3)
        ],
		[
            'name' => "$table4 - $yaxis4",
            'data' => array_map(function($row) {
                return [strtotime($row['x']) * 1000, (float)$row['y']];
            }, $data4)
        ]
    ];


    echo json_encode($formattedData);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
