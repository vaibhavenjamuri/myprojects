

<?php
 // if (isset($_POST['submit'])) 
	 // {
$mysqli = new mysqli("172.16.1.151", "do","Vishnu#3010","db_wave_rider_buoy");
		# check connection
		if ($mysqli->connect_errno) 
		{
			echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
			exit();
		}
//$markerValue1 = $_GET['pid'];
// $markerValue2 = $_POST['parameter'];
// $markerValue3 = $_POST['sdate'];
// $markerValue4 = $_POST['edate'];
//echo"<script>console.log(".$markerValue1.")</script>";
// echo"<script>console.log($markerValue2)</script>";
// echo"<script>console.log($markerValue3)</script>";
// echo"<script>console.log($markerValue4)</script>";

$sql4="SELECT observation_time,hm0 from t_wrb_merged where observation_time between '2024-01-01' and '2024-04-01'";
$jsonArray = array();
$jsonArray2 = array();
$results = $mysqli->query($sql4);
$jsonArrayItem = array();
		if($results->num_rows >= 1)
		{
while($row=$results->fetch_array())
		{
				
				
				
				$jsonArrayItem['label']=gmdate('Y-m-d',strtotime($row[0]));
				$jsonArrayItem['y']=$row[1];

				 array_push($jsonArray, $jsonArrayItem);
				}
		}
		// echo"<script>console.log(".json_encode($jsonArray).")</script>";
		
		//header('Content-type: application/json');
		
		 //echo json_encode($jsonArray);
		 //echo $jsonArray;
		 $jsonArray2=json_encode($jsonArray);
		echo"<script>console.log(".$jsonArray2.")</script>";
				// echo"<script>myfunc('".$jsonArray2."');</script>";
				
	 // }
?>

