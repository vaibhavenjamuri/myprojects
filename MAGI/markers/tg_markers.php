<?php
include('../db_connection_magi.php');

 //$start_date = $_GET['sdate'];
 // $recv_date = $_GET['edate'];
 //if($start_date==""&&$recv_date=="")
	
//{

 
 //$sql4="select platform_id, last_reported_latitude,last_reported_longitude, last_reported_time,status from t_platforms_live where project like 'TG'";
 //$sql4="select platform_id, last_reported_latitude,last_reported_longitude, last_reported_time,status from t_platform_present where programme like 'TG'";

//}
//else
//{
 	//$sql4="select programme,platform_id, last_reported_latitude,last_reported_longitude,last_reported_time,status from t_platform_present where programme like 'TG' and last_reported_time BETWEEN '".$start_date."' AND '".$recv_date."'";
 	$sql4="select programme,platform_id, last_reported_latitude,last_reported_longitude,last_reported_time,status from t_platform_present where programme like 'TG' ";

//}
$jsonArray = array();
$jsonArray2 = array();
$results = $mysqli->query($sql4);
$jsonArrayItem = array();
		if($results->num_rows >= 1)
		{
while($row=$results->fetch_array())
		{
				
				
				$jsonArrayItem['programme']=$row[0];
				
				
				
				$jsonArrayItem['station_id']=$row[1];
					$jsonArrayItem['coords']=[$row[2],$row[3]];
				
				
		 $jsonArrayItem['lotime']=$row[4];
			 $jsonArrayItem['status']=$row[5];
		

				 array_push($jsonArray, $jsonArrayItem);
				}
		}
		
		 echo json_encode($jsonArray);
	
	
	
	

?>