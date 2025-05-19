<?php
 // if (isset($_POST['submit'])) 
	 // {
include('../../db_connection_wrb.php');
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
$today_date=date("Y-m-d", strtotime("+1 day"));

$sixMonthsAgo = date("Y-m-d", strtotime("-6 months"));
$sql4="SELECT observation_time,ax from t_wrb_merged where  station_id='".$markerValue1."' and flag_ax=1 and observation_time between '".$sixMonthsAgo."' and '".$today_date."'";

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