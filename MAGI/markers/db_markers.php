<?php

include('../db_connection_magi.php');
//$start_date = $_GET['sdate'];
  //$recv_date = $_GET['edate'];

//if($start_date==""&&$recv_date=="")
	//if(isset($start_date)&&isset($recv_date))
//{
// $sql4="select t.station_id, t.latitude, t.longitude,u2.MaxTime from 
 // (SELECT station_id,max(observation_time) as MaxTime FROM db_wave_rider_buoy.t_wrb_merged group by station_id) u2
 // INNER JOIN db_wave_rider_buoy.t_wrb_positions t ON t.station_id = u2.station_id where cast(u2.MaxTime as date)";
  //$sql4="select platform_id, last_reported_latitude,last_reported_longitude, last_reported_time,status from t_platform_present where programme like 'CWRB'";

//}
//else
//{
	// $sql4="select t.station_id, t.latitude, t.longitude,u2.MaxTime from 
 // (SELECT station_id,max(observation_time) as MaxTime FROM db_wave_rider_buoy.t_wrb_merged group by station_id) u2
 // INNER JOIN db_wave_rider_buoy.t_wrb_positions t ON t.station_id = u2.station_id where cast(u2.MaxTime as date) BETWEEN '".$start_date."' AND '".$recv_date."'";
  	//$sql4="select programme,platform_id, last_reported_latitude,last_reported_longitude,last_reported_time,status from t_platform_present where programme like 'CWRB' and last_reported_time BETWEEN '".$start_date."' AND '".$recv_date."'";
  	$sql4="select programme,platform_id, last_reported_latitude,last_reported_longitude,last_reported_time,status from t_platform_present where programme like 'DB'";

//}

$jsonArray = array();
$jsonArray2 = array();
$results = $mysqli->query($sql4);
$jsonArrayItem = array();
		if($results->num_rows >= 1)
		{
while($row=$results->fetch_array())
		{
				
				
				
				//$jsonArrayItem['label']=gmdate('Y-m-d H:i:s',strtotime($row[0]));
				//$jsonArrayItem['value']=$row[1];
				$jsonArrayItem['programme']=$row[0];
				
				$jsonArrayItem['station_id']=$row[1];
					$jsonArrayItem['coords']=[$row[2],$row[3]];
				//$jsonArrayItem['lat']=$row[1];
				//$jsonArrayItem['lng']=$row[2];
				
				
		 $jsonArrayItem['lotime']=$row[4];
			 $jsonArrayItem['status']=$row[5];
		
				//$station_id1=json_encode($station_id);

				 array_push($jsonArray, $jsonArrayItem);
				}
			 echo json_encode($jsonArray);
		}
		// echo"<script>console.log(".json_encode($jsonArray).")</script>";
		
		//header('Content-type: application/json');
		else{
			 echo json_encode($jsonArray);
		}
	
	
	

?>