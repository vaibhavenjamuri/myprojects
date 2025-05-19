<?php
include('../../db_connection_mb.php');
$markerValue1 = $_GET['pid'];
// $markerValue3 = str_replace('_', '',$markerValue1);
// $markerValue4 = $_GET['par_name'];
// $markerValue2 = $_POST['parameter'];
// $markerValue3 = $_POST['sdate'];
// $markerValue4 = $_POST['edate'];
 // echo"<script>console.log(".$markerValue1.")</script>";
// echo"<script>console.log($markerValue2)</script>";
 // echo"<script>console.log($markerValue3)</script>";
 // echo"<script>console.log($markerValue4)</script>";

$sql4="SELECT observation_time,air_pressure from t_ndbp_omni_merged where buoy_id='".$markerValue1."' and observation_time between '2024-11-01 00:00:00' and '2024-11-12 00:00:00'";
$jsonArray = array();
$jsonArray2 = array();
$results = $mysqli->query($sql4);
$jsonArrayItem = array();
		if($results->num_rows >= 1)
		{
while($row=$results->fetch_array())
		{
				
				
				
				$jsonArrayItem['label']=gmdate('Y-m-d H:i:s',strtotime($row[0]));
				$jsonArrayItem['value']=$row[1];

				 array_push($jsonArray, $jsonArrayItem);
				}
		}
		
		
		//header('Content-type: application/json');
		
		 echo json_encode($jsonArray);
	
	

?>