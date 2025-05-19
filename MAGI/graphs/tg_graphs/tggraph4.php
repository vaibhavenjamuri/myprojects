<?php
 // if (isset($_POST['submit'])) 
	 // {
include('../../db_connection_tg.php');
$markerValue3 = $_GET['pid'];
$today_date=date("Y-m-d");
		$sixMonthsAgo = date("Y-m-d", strtotime("-6 months"));
	$sql4="SELECT observation_time,enc from t_tide_guage_incois_hourly where station_id='".$markerValue3."' and observation_time between '".$sixMonthsAgo."' and '".$today_date."'";
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
		// echo"<script>console.log(".json_encode($jsonArray).")</script>";
		
		//header('Content-type: application/json');
		
		 echo json_encode($jsonArray);
	
	
//}
?>