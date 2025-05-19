<?php 
session_start();
// if(isset($_POST['button22']))
// {
	 // echo "<script>alert('" .$_POST['hide1'] . "')</script>"; 
	 $sname = $_GET['pid'];
	 
	//$sname=$_SESSION['station_id'];
	 //$_SESSION['sname'] = 	$sname;
// echo "<script>alert('this is " . $_SESSION["phpVar"] . "')</script>"; 
$mysqli = new mysqli("172.16.1.146", "u_operations","Vaibhav#3010", "db_metadata");
	
	if ($mysqli->connect_errno) 
	{
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
	 //$tstation = $_SESSION['programme'];
	 $tstation=$_GET['programme'];
	 $_SESSION['platform']=$tstation;
	 $_SESSION['sname']=$sname;
if ($tstation=="Moored Buoy"){
		$sql2 = "SELECT deployment_date,retrieval_date,platform_id,wmo_number,type_of_station,country,deployment_latitude,deployment_longitude,water_depth,operating_environment,observation_frequency,period_of_deployment,deployment_ship,cruise_number,platform_type,diameter from arg_mb_identification_details where type_of_station= ? and platform_id=?";
		$stmt = $mysqli->prepare($sql2);

					$stmt->bind_param("ss", $tstation,$sname);
					
					if($stmt->execute())
					{
						$stmt->bind_result($ddate,$rdate,$platform_id,$wmo_number,$type_of_station,$country,$deployment_latitude,$deployment_longitude,$water_depth,$operation_environment,$observation_frequency,$period_of_deployment,$deployment_ship,$cruise_number,$platform_type,$diameter);
						
							 $_SESSION['cart1']=array();
							 $_SESSION['cart2']=array();
							 $_SESSION['cart3']=array();
							 $_SESSION['cart4']=array();
							 $_SESSION['cart5']=array();
							 $_SESSION['cart6']=array();
							 $_SESSION['cart7']=array();
							 $_SESSION['cart8']=array();
							 $_SESSION['cart9']=array();
							 $_SESSION['cart10']=array();
							 $_SESSION['cart11']=array();
							 $_SESSION['cart12']=array();
							 $_SESSION['cart13']=array();
							 $_SESSION['cart14']=array();
							 $_SESSION['cart15']=array();
							 $_SESSION['cart16']=array();														 
				  while($row=$stmt->fetch())					
				 {			 
		array_push($_SESSION['cart1'],$ddate);
		array_push($_SESSION['cart2'],$rdate);
		array_push($_SESSION['cart3'],$platform_id);
		array_push($_SESSION['cart4'],$wmo_number);
		array_push($_SESSION['cart5'],$type_of_station);
		array_push($_SESSION['cart6'],$country);
		array_push($_SESSION['cart7'],$deployment_latitude);
		array_push($_SESSION['cart8'],$deployment_longitude);
		array_push($_SESSION['cart9'],$water_depth);
		array_push($_SESSION['cart10'],$operation_environment);
		array_push($_SESSION['cart11'],$observation_frequency);
		array_push($_SESSION['cart12'],$period_of_deployment);
		array_push($_SESSION['cart13'],$deployment_ship);
		array_push($_SESSION['cart14'],$cruise_number);
		array_push($_SESSION['cart15'],$platform_type);
		array_push($_SESSION['cart16'],$diameter);		
				 }				
}
					}	
					else{
	//else if ($_SESSION['platform']=="Tide Guage"){
		$sql2 = "SELECT programme, platform_id,deployment_time,last_reported_time from t_platform where programme= ? and platform_id=? order by deployment_time desc";	
		$stmt = $mysqli->prepare($sql2);

					$stmt->bind_param("ss", $tstation,$sname);
					
					if($stmt->execute())
					{
						$stmt->bind_result($type_of_station,$sname1,$ddate,$rdate);
						
							 $_SESSION['cart21']=array();
							 $_SESSION['cart22']=array();
							 $_SESSION['cart23']=array();
							 $_SESSION['cart24']=array();									 
				  while($row=$stmt->fetch())					
				 {			
		
		array_push($_SESSION['cart21'],$type_of_station);
		array_push($_SESSION['cart22'],$sname1);
		array_push($_SESSION['cart23'],$ddate);
		array_push($_SESSION['cart24'],$rdate);		
				 }
}				
	//}
	
	//else if ($_SESSION['platform']=="Wave Rider Buoy"){
		// $sql2 = "SELECT type_of_station, station_name,new_deployment_date,retrieved_drift_date,redeployment_date,maintenance_date from wrb_identification_details where type_of_station= ? and station_name=? order by sequence";	
		// $stmt = $mysqli->prepare($sql2);
					// $stmt->bind_param("ss", $tstation,$sname);
					
					// if($stmt->execute())
					// {
						// $stmt->bind_result($type_of_station,$sname1,$new_deployment_date,$retrieved_drift_date,$redeployment_date,$maintenance_date);
						
							 // $_SESSION['cart31']=array();
							 // $_SESSION['cart32']=array();
							 // $_SESSION['cart33']=array();
							  // $_SESSION['cart34']=array();
							   // $_SESSION['cart35']=array();
							    // $_SESSION['cart36']=array();
							
							 
				  // while($row=$stmt->fetch())
					
				 // {
			
		// array_push($_SESSION['cart31'],$type_of_station);
		// array_push($_SESSION['cart32'],$sname1);
		// // if($new_deployment_date=="0000-00-00 00:00:00")
		// // {
			// // array_push($_SESSION['cart33'],"--");
		// // }
		// // else{
		// array_push($_SESSION['cart33'],$new_deployment_date);
		// // }
		// // if($retrieved_drift_date=="0000-00-00 00:00:00")
		// // {
			// // array_push($_SESSION['cart34'],"--");
		// // }
		// // else{
		// array_push($_SESSION['cart34'],$retrieved_drift_date);
		// // }
		// // if($redeployment_date=="0000-00-00 00:00:00")
		// // {
		// // array_push($_SESSION['cart35'],"--");
		// // }
		// // else{
			// array_push($_SESSION['cart35'],$redeployment_date);
		// // }
		// // if($maintenance_date=="0000-00-00 00:00:00")
		// // {
		// // array_push($_SESSION['cart36'],"--");
		// // }
		// // else{
		// array_push($_SESSION['cart36'],$maintenance_date);		
		// // }				
// }
						}				
	//}	
					//}
					 //echo json_encode($_SESSION['cart24']);
			    echo "<script>window.location.href='deploymentdates3.php';</script>";
				
	//}

      ?>  