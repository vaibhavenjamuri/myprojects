<?php
header('Access-Control-Allow-Origin: *');
?>
<html>
<head>
	<title>Update Data Requisition</title>
	<!--<link rel="stylesheet" type="text/css" href="http://172.16.1.57/Joomla_4.2.6/templates/at_locky/css/jquery-ui.css" />
    <link rel="stylesheet" href="http://www.jacklmoore.com/colorbox/example4/colorbox.css">
    <link rel="stylesheet" type="text/css" href="http://172.16.1.57/Joomla_4.2.6/templates/at_locky/css/style.css" />
    <link rel="stylesheet" type="text/css" href="http://172.16.1.57/Joomla_4.2.6/templates/at_locky/bootstrap-4.0.0/dist/css/bootstrap.min.css" />
<script type="text/javascript" src="http://172.16.1.57/Joomla_4.2.6/templates/at_locky/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="http://172.16.1.57/Joomla_4.2.6/templates/at_locky/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://172.16.1.57/Joomla_4.2.6/templates/at_locky/js/jquery-ui.js"></script>
    <script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script> -->
	
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="http://www.jacklmoore.com/colorbox/example4/colorbox.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>

<style>
.datepicker{ z-index:99999 !important; }
</style>
	<script>
	$(function(){
			// $('body').on('focus',".datepicker", function()
			// {
    			// $(this).datepicker({dateFormat:"yy-mm-dd",changeMonth: true,changeYear: true,yearRange:"1900:2050"});
			 // });
		 $("body").delegate(".datepicker", "focusin", function(){
         $(this).datepicker();
		 });
    });
			
		
	
	function updatedatarequest2()
		{
		// var updateConfirm = confirm("Are you sure you want to edit the given entry ?");
			// if(updateConfirm)
			// {
				alert("Updated Successfully");
				// $.post("UpdateDataRequest.php",
					// $("#updateForm2").serialize(),
					// function(data) {
						// $.colorbox ({
							// html:   data,
							// open:   true,
							// iframe: false,
							// width:  "70%",
							// height: "70%"
						// });
					// }, "html");
					// window.setTimeout(function() {
    // $.colorbox.close();
 // }, 3000);
 
					window.location=document.referrer;
					 // return location.href="ListDataRequest.php";
			// // 
			// }
		}
		function updatedatarequest3(){
			
            $.colorbox({
				 href: "#pop",
                html:"<h4 style='text-align:center;color:green'>Submitted Successfully</h4>",
                width:  "50%",
				height: "50%"
              

            });
			window.location=document.referrer;
		}
	</script>
	
<?php
header('Access-Control-Allow-Origin: *');
$joomlaUserName="R Venkat Shesu";
#require_once("../../../odis/getUserInfo.php");
#	if(is_null($joomlaUserName)){
#		echo '<html><body><center>Please login with authenticated user to access <br /> <br />Please contact <br /><br /><hr />	DMG <br /> </center> </body></html>';
#	} else if(!in_array(11,$joomlaGroups)){
#		echo '<html><body><center>Dear '.$joomlaUserName.' your are not authenticated to access </center> </body></html>';
#	} else 
{

	if (isset($_POST['UpdateForm2'])) 
	{
		## connect mysql server
		$mysqli = new mysqli("localhost", "webser","WebSer3010", "sensor_base3");
		# check connection
		if ($mysqli->connect_errno) 
		{
			echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
			exit();
		}
		$status = $_POST['status'];
		$mode = $_POST['mode'];
		$cost = $_POST['cost'];
		$actuals = $_POST['actuals'];
		$servedate=$_POST['servedate'];
		$comments = $_POST['comments'];
		$sno= $_POST['sno'];
		$sql = "UPDATE `arg_mb_identification_details` SET status=?,mode=?,cost=?,comments=? where sno=?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sssss", $status,$mode,$cost,$comments,$sno);
		if ($stmt->execute()) 
		{
			$stmt->close();
			
			$tz = 'Asia/Kolkata';
			$tz_obj = new DateTimeZone($tz);
			$today = new DateTime("now", $tz_obj);
			$today_formatted = $today->format('Y-m-d  H:i:s');
			$detail = "Updated: Status=".$status;
			$sql = "INSERT  INTO `t_request_summary` (`SNO`,`detail`,`who`,`when`) VALUES (?,?,?,?)";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("ssss", $sno,$detail,$joomlaUserName,$today_formatted);
			if (!$stmt->execute()) 
			{
				echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
				exit();
			}
				
			//echo "<html><head><meta http-equiv='refresh' content='2; url=ListDataRequest.php'></head><body><p>Data updated successfully!!! <br><br> <a href='ViewDataRequest.php?sno=" . $sno ."'>View Record</a></p></body></html>";
			// echo "<html><head></head><body><p>Data updated successfully!!!</p></body></html>";
			echo '<script type="text/javascript">',
				'updatedatarequest2();',
				'</script>';
		} 
		else 
		{
			echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
			exit();
		}
	}
	else
	{
		## connect mysql server
		$mysqli = new mysqli("localhost", "webser","WebSer3010", "db_administration");
		# check connection
		if ($mysqli->connect_errno) 
		{
			echo "error retrieving record";
			exit();
		}
		$sno = $_POST['sno'];
		$sql = "select recv_date,contact_id,unique_id,purpose,status,comments,req_type,cost,mode,actuals,date_of_serve from `t_data_request` WHERE `SNO` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("s", $sno);
		if($stmt->execute())
		{	
			$stmt ->store_result();
			if ($stmt->num_rows >= 1) 
			{
				$stmt->bind_result($recv_date,$contact_id,$unique_id,$purpose,$status,$comments,$req_type,$cost,$mode,$actuals,$date_of_serve);
				if($stmt->fetch())
				{
					$sql2= "select name,org,position_name,phone,email,address from `t_contact` WHERE `ID` = ?";
					$stmt2 = $mysqli->prepare($sql2);
					$stmt2->bind_param("s", $contact_id);
					if($stmt2->execute())
					{	
						$stmt2->store_result();
						if ($stmt2->num_rows >= 1) 
						{
							$stmt2->bind_result($NAME,$ORG,$POSITION,$PHONE,$EMAIL,$ADDR);
							if($stmt2->fetch())
							{

?>

</head>
<body>
	<div style="width: 500px; margin: 0 auto;">
	<div style="text-align: center;">	
			<h1>Update Data Request</h1>
		</div>
		<div id="pop" style=""> <div>
		<form id="updateForm2" action="<?=$_SERVER['PHP_SELF']?>" method="post">
			<div style="border:solid lightgray thin;padding:15px">
				<div style="text-align: left; ">
					<b>Data Request No: </b><?php echo $unique_id; ?></br></br>
					<b>Received Date : </b><?php echo $recv_date; ?></br></br>
					<b>Request Type : </b>
				<?php 
					if(strcmp($req_type,"G")==0) echo "Government"; 
					else if(strcmp($req_type,"U")==0) echo "University";
					else if(strcmp($req_type,"I")==0) echo "INCOIS";
					else if(strcmp($req_type,"FG")==0) echo "Foreign Government";
					else if(strcmp($req_type,"FU")==0) echo "Foreign University";
					else if(strcmp($req_type,"C")==0) echo "Commercial";
					else if(strcmp($req_type,"FC")==0) echo "Foreign Commercial";	
				?>
					</br></br>
					<b>Purpose : </b><?php echo $purpose; ?></br>
					<br/></br>
					<b>Request Description:-</b></br>
					<div style="border:solid thin lightgray;padding:23px">
					
				<?php
								$sql3 = "select programme_id,parameters,region,start_date,end_date from `t_request_details` WHERE `REQUEST_ID` = ?";
								$stmt3 = $mysqli->prepare($sql3);
								$stmt3->bind_param("s", $sno);
								if($stmt3->execute())
								{	
									$stmt3 ->store_result();
									if ($stmt3->num_rows >= 1) 
									{
										$stmt3->bind_result($programme_id,$param,$region,$start_date,$end_date);
										$pcount=1;
										while($stmt3->fetch())
										{
											$sql4 = "SELECT PROGRAMME_NAME from `t_programme` WHERE `PROGRAMME_ID` = ?";
											$stmt4 = $mysqli->prepare($sql4);
											$stmt4->bind_param("s", $programme_id);
											if($stmt4->execute())
											{
												$stmt4 ->store_result();
												if ($stmt4->num_rows >= 1) 
												{
													$stmt4->bind_result($PNAME);
													while($stmt4->fetch())
													{
														$programme=$PNAME;
													}	
												}	
											}	
								
				?>
					<?php echo $pcount.". ";$pcount++; ?> <b>Programme :  </b><?php echo $programme; ?></br></br>
					&nbsp &nbsp <b>Parameters : </b><?php echo $param; ?></br></br>
					&nbsp &nbsp <b>Region : </b><?php echo $region; ?></br></br>
					&nbsp &nbsp <b>Start Date : </b><?php echo $start_date; ?></br>	</br>	
					&nbsp &nbsp <b>End Date : </b><?php echo $end_date; ?></br>

				<?php
										}
									}
								}

				?>
				</div></br>
					<br/>
					<b>Contact Information:-</b></br></br>
					<div style="border:solid thin lightgray;padding:23px">
					&nbsp &nbsp <b>Name :</b> <?php echo $NAME; ?><br />	</br>
					&nbsp &nbsp <b>Organization : </b><?php echo $ORG; ?></br></br>
					&nbsp &nbsp <b>Designation : </b><?php echo $POSITION; ?><br /></br>
					&nbsp &nbsp <b>Phone / Mobile : </b><?php echo $PHONE; ?><br /></br>
					&nbsp &nbsp <b>Email Id : </b><?php echo $EMAIL; ?><br /></br>
					&nbsp &nbsp <b>Address : </b><?php echo $ADDR; ?><br/>
					</div><br/>
					<b>Date of Serve : </b><input type="date"  id="servedate" name="servedate" class="form-control"  style="width:151px;"/></br>
			
					<b>Mode of Transfer: <select name="mode" class="form-control" style="width:151px;">
						<option value="" <?php if(strcmp($mode,"")==0) echo "selected"; ?> >Select Mode</option>
						<option value="CD/DVD" <?php if(strcmp($mode,"CD/DVD")==0) echo "selected"; ?> >CD/DVD</option>
						<option value="E-Mail" <?php if(strcmp($mode,"E-Mail")==0) echo "selected"; ?> >E-Mail</option>		
						<option value="FTP" <?php if(strcmp($mode,"FTP")==0) echo "selected"; ?> >FTP</option>
						<option value="HardCopy" <?php if(strcmp($mode,"HardCopy")==0) echo "selected"; ?> >Hard Copy</option>
					</select><br />
					<b>Cost: <input type="text"  class="form-control"style="width:151px;" name="cost" value="
						<?php echo $cost; ?>" /><br />
						Actuals: <input type="text"  class="form-control"style="width:151px;" name="actuals" value="
						<?php echo $actuals; ?>" /><br />
					
					<b>Comments: <input type="text"  class="form-control" style="width:151px;" name="comments" value="
						<?php echo $comments; ?>" /><br />
					<b>Status: <select name="status" class="form-control" style="width:203px;">
						<option value="Received" <?php if(strcmp($status,"Received")==0) echo "selected"; ?> >Received</option>
						<option value="Under Process" <?php if(strcmp($status,"Under Process")==0) echo "selected"; ?> >Under Process</option>
						<option value="Provided" <?php if(strcmp($status,"Provided")==0) echo "selected"; ?> >Provided</option>			<option value="partiallyprovided" <?php if(strcmp($status,"partiallyprovided")==0) echo "selected"; ?> >Partially Provided</option>
						<option value="Not Provided" <?php if(strcmp($status,"Not Provided")==0) echo "selected"; ?> >Not Provided</option>
						<option value="Requisition Form Provided" <?php if(strcmp($status,"Requisition Form Provided")==0) echo "selected"; ?> >Requisition Form Provided</option>
						<option value="Duplicate" <?php if(strcmp($status,"Duplicate")==0) echo "selected"; ?> >Duplicate</option>
					</select><br />
				</div>
				<div style="text-align:center;padding-top:10px">
					<input type="hidden" name="sno" value="<?php echo $sno; ?>" />
					<input type="hidden" name="UpdateForm2" value="Update" />
					<input type="submit"  class="btn btn-outline-primary" name="submit" value="Update" />
				</div>
			</div>
		</form>
		<!--div align="center"><a href="ListDataRequest.php">[Back]</a></div-->
	</div>
</body>
</html>
<?php							
							}	
						}
						else
						{
							echo "error retrieving record";			
						}
					}
					else
					{
						echo "error retrieving record";
					}
				}	
			}
			else
			{
				echo "error retrieving record";			
			}	
		}
		else
		{
			echo "error retrieving record";
		}
	}
}
?>