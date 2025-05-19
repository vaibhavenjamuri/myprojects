<?php

include('../db_connection_magi.php');

//$start_date = $_GET['sdate'];
 // $recv_date = $_GET['edate'];

//if($start_date==""&&$recv_date=="")
	//if(isset($start_date)&&isset($recv_date))
//{
//$sql4="select platform_id, last_reported_latitude,last_reported_longitude, last_reported_time,status from t_platform_present where programme like 'OMNI' OR programme like 'MetB'";
//}
//else
//{
	//$sql4="select platform_id, last_reported_latitude,last_reported_longitude,last_reported_time,status from t_platform_present where  (programme like 'OMNI' OR programme like 'MetB') and last_reported_time BETWEEN '".$start_date."' AND '".$recv_date."'";
	$sql4="select platform_id, last_reported_latitude,last_reported_longitude,last_reported_time,status from t_platform_present where  (programme like 'OMNI' OR programme like 'MetB')";

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
				
				$jsonArrayItem['station_id']=$row[0];
					$jsonArrayItem['coords']=[$row[1],$row[2]];
				//$jsonArrayItem['lat']=$row[1];
				//$jsonArrayItem['lng']=$row[2];
				
				
		 $jsonArrayItem['lotime']=$row[3];
		 $jsonArrayItem['status']=$row[4];
			
		
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