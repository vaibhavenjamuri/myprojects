<?php 
$joomlaUserName="R Venkat Shesu";
#require_once("../../../odis/getUserInfo.php");
#	if(is_null($joomlaUserName)){
#		echo '<html><body><center>Please login with authenticated user to access <br /> <br />Please contact <br /><br /><hr />	DMG <br /> </center> </body></html>';
#	} else if(!in_array(10,$joomlaGroups)||!in_array(11,$joomlaGroups)){
#		echo '<html><body><center>Dear '.$joomlaUserName.' your are not authenticated to access </center> </body></html>';
#	} else 
{
?>
<html>
<head>
	<title>Data Request Entry</title>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
	<style type="text/css">
    	label
		{
		    display:inline-block;
		    width:150px;
		}
	</style>
	<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript">
		$(function(){
			$('body').on('focus',".datepicker", function()
			{
    			$(this).datepicker({dateFormat:"yy-mm-dd",changeMonth: true,changeYear: true,yearRange:"1900:2050"});
			});
			addReq_detail();
		});
		function orgSelect()
        {
            var cntdefault = "<label>Name :</label> <input type=\"text\" name=\"cname\" id=\"cname\" value=\"\">";
			document.getElementById('desg').value="";
            document.getElementById('phone').value="";
            document.getElementById('email').value="";
			document.getElementById('addr').value="";
            var s = document.getElementById('org');
            if(s.selectedIndex==s.length-1)
            {
				document.getElementById('OrgOther').style.height='auto';
				document.getElementById('OrgOther').style.display='block';
				document.getElementById('orgname').value="";
				$("#NameDiv").html(cntdefault);
			}
			else
			{
				document.getElementById('OrgOther').style.height='0px';
				document.getElementById('OrgOther').style.display='none';
				if(document.getElementById('OrgText')!=null)
					document.getElementById('OrgText').value="";
				if(s.selectedIndex==0)
				{
					alert("Please select valid organisation from the given list or 'New Organisation' to enter a new organisation");
					document.getElementById('orgname').value="";
					$("#NameDiv").html(cntdefault);
				}
				else
				{    
					document.getElementById('orgname').value=s.value;
					getEmpList();
                }
            }    
        }
            
		function getEmpList(type)
        {
            $.get("ListOrgContacts.php",{name:document.getElementById('orgname').value}, function(data){ $("#NameDiv").html(data);});
        }
            
        function cntSelect(type)
        {
			var s = document.getElementById('CntList');
			if(s.selectedIndex==s.length-1)
			{
                document.getElementById('CntOther').style.height='auto';
                document.getElementById('CntOther').style.display='block';
                document.getElementById('cname').value="";
                document.getElementById("desg").value="";
				document.getElementById("phone").value="";
				document.getElementById("email").value="";
				document.getElementById("addr").value=""; 
			}
			else
			{
				document.getElementById('CntOther').style.height='0px';
				document.getElementById('CntOther').style.display='none';
				if(document.getElementById('CntText')!=null)
					document.getElementById('CntText').value="";
				if(s.selectedIndex==0)
				{
					alert("Please select valid contact from the given list or 'New Contact' to enter a new contact");
					document.getElementById('cname').value="";
					document.getElementById("desg").value="";
					document.getElementById("phone").value="";
					document.getElementById("email").value="";
					document.getElementById("addr").value="";
				}
				else
				{    
					document.getElementById('cname').value=s.options[s.selectedIndex].text;
					document.getElementById('cid').value=s.value;
					getEmpDetails();
				}
			}    
        }		
            
		function getEmpDetails()
		{
			$.get("GetCntDetail.php",{id:document.getElementById('cid').value}, 
			function(data){ var cntDetails = data.split('%'); document.getElementById("desg").value=cntDetails[1];
			document.getElementById("phone").value=cntDetails[2];
			document.getElementById("email").value=cntDetails[3];
			document.getElementById("addr").value=cntDetails[4]; });
		}
		function fillHidden(field)
		{
			if(field=="Org")
			{
				document.getElementById("orgname").value=document.getElementById("OrgText").value;
			}
			else if(field=="Cnt")
			{
				document.getElementById("cname").value=document.getElementById("CntText").value;
			}
		}
		function toggleCost()
            {
                if(document.getElementById("req_type").value=='C' || document.getElementById("req_type").value=='FC')
                    document.getElementById("CostDiv").style.display='block';
                else
                {
                    document.getElementById("CostDiv").style.display='none';
                    document.dataReqForm.cost.value="";
                }
            }

		var rc=0;    
		function addReq_detail()
		{
			var s = $('div').filter(function(){ return this.id.match(/rcontactextra\d+/); });
			if(s.length>0)
			{
				for(i=0;i<s.length;i++)
				{
					var id = s[i].id.slice(-1);
					var cdiv = document.getElementById("rcontactextra"+id);
					var idiv = document.getElementById("rcontacttoggle"+id); 
					if(cdiv.style.height!="0px")
					{
						cdiv.style.height="0px";
						idiv.innerHTML="+";
					}
				}
			}    
			
			var $html = $('#req_detail').clone();
			$html.find('#programme').attr('id','programme'+rc);
			$html.find('#programme'+rc).attr('name','programme'+rc);
			$html.find('#param').attr('id','param'+rc);
			$html.find('#param'+rc).attr('name','param'+rc);
			$html.find('#prog').attr('id','prog'+rc);
			$html.find('#prog'+rc).attr('name','prog'+rc);

			$html.find('#region').attr('id','region'+rc);
			$html.find('#region'+rc).attr('name','region'+rc);
			$html.find('#start_date').attr('id','start_date'+rc);
			$html.find('#start_date'+rc).attr('name','start_date'+rc);
			$html.find('#end_date').attr('id','end_date'+rc);
			$html.find('#end_date'+rc).attr('name','end_date'+rc);
			
			$html.find('#rcontacttoggle').attr('id','rcontacttoggle'+rc);
			$html.find('#rcontacttoggle'+rc).attr('href','javascript:toggleContact(\'other\',\''+rc+'\')');
			
			$('<div/>',{id:'req_detail'+rc,style: 'border:solid thin lightgray;margin-bottom:5px', html: $html.html() }).appendTo('#req_details');
			rc++;
		}

		function validateForm()
		{
			document.getElementById('rcount').value=$('select').filter(function(){ return this.id.match(/prog\d+/); }).length;
			if(document.getElementById('rdate').value.trim()===''){alert("Please enter valid received date");return false;}
			if(document.getElementById('req_type').value.trim()===''){alert("Please enter valid request type");return false;}
			if(document.getElementById('orgname').value.trim()===''){alert("Please select/enter valid organisation for contact");return false;}
			if(document.getElementById('cname').value.trim()===''){alert("Please select/enter valid name for contact");return false;}
			if(document.getElementById('email').value.trim()===''){alert("Please enter valid email for contact");return false;}
			var pcount=document.getElementById('rcount').value;
			for(i=0;i<pcount;i++)
			{
				if(document.getElementById('prog'+i).value.trim()==='select'){alert("Please select valid programme ("+(i+1)+")");return false;}
				if(document.getElementById('param'+i).value.trim()===''){alert("Please enter valid parameters for programme ("+document.getElementById('prog'+i).value+")");return false;}
			}
		}
	</script>
</head>
<body>	
	<div style="width: 500px; margin: 0 auto;">
		<div style="text-align: center;">
			<h1>Data Requisition</h1>
		</div>
		<form name="dataReqForm" action="<?=$_SERVER['PHP_SELF']?>" method="post" onsubmit="return validateForm();" >
			<div style="border:solid lightgray thin;padding:15px">
				<div style="text-align: left; ">
					<!-- <label>Data Request No :</label> <input type="text" name="unique" /></br> -->
					<label>Received Date :</label> <input type="text" id="rdate" name="rdate" class="datepicker" /></br>
					<label>Purpose :</label> <input type="text" name="purpose" /><br />
					<div id="req_details" style="margin-top:10px;margin-bottom:10px"></div>
					<input type="hidden" id="rcount" name="rcount" value="1" />
					<div id='newcontactbtn' style='padding-bottom: 10px;'>
						<input type='button' value="Add Another" onclick="addReq_detail()" />
                    </div>
					<label>Status :</label> <select name="status" >
						<option value="Received">Received</option>
						<option value="Under Process">Under Process</option>
						<option value="Provided">Provided</option>
						<option value="Partially Provided">Partially Provided</option>		
						<option value="Not Provided">Not Provided</option>
						<option value="Requisition Form Provided">Requisition Form Provided</option>
						<option value="Duplicate">Duplicate</option>
						<option value="Operational">Operationalized</option>
					</select><br />
					<label>Comments :</label> <input type="text" name="comment" /><br />
					<label>Mode of Transfer :</label> <select name="mode" >
						<option value="">Select Mode</option>
						<option value="CD/DVD">CD/DVD</option>
						<option value="E-Mail">E-Mail</option>
						<option value="FTP">FTP</option>
						<option value="HardCopy">Hard Copy</option>
					</select><br />	

					<label>Request Type :</label> <select name="req_type" id="req_type" onchange="toggleCost()">
						<option value="">Select Type</option>
						<option value="G">Government</option>
						<option value="U">University</option>
						<option value="I">INCOIS</option>
						<option value="FG">Foreign Government</option>
						<option value="FU">Foreign University</option>
						<option value="C">Commercial</option>
						<option value="FC">Foreign Commercial</option>
					</select><br />
					<div id="CostDiv" style="display:none"> 
					<label>Cost :</label> <input type="text" name="cost" /><br /></div>
					</br>
					Request Contact</br>
<?php
	$mysqli = new mysqli("localhost", "webser","WebSer#3010", "db_administration");
	# check connection
	if ($mysqli->connect_errno) 
	{
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
	$sql = "SELECT distinct ORG from `t_contact`";
	$results = $mysqli->query($sql);
	if($results->num_rows >= 1)
	{
?>
					<label>Organization :</label> <select name="org" id="org" onchange="orgSelect()">
						<option>Select Organisation</option>
<?php		
		while($row=$results->fetch_array())
		{
			echo "<option>" . $row[0] . "</option>";			
		}
?>
						<option>New Organisation</option>
					</select></br>
					<input type="hidden" id="orgname" name="orgname" value=""/>
					<div id="OrgOther" style="height:0px;display: none">
						<label></label> <input type="text" id="OrgText" value="" onchange="fillHidden('Org')" />
					</div>
<?php
	}
	else
	{
?>
					<label>Organization :</label> <input type="text" id="orgname" name="orgname" /><br />
<?php		
	}
	$results->free();
	$mysqli->close();
?>
					<div id="NameDiv">
						<label>Name :</label> <input type="text" name="cname" id="cname" /><br />	
					</div>
					<label>Designation :</label> <input type="text" name="desg" id="desg" /><br />
					<label>Phone / Mobile :</label> <input type="text" name="phone" id="phone"/><br />
					<label>Email Id :</label> <input type="text" name="email" id="email" /><br />
					<label>Address :</label> <textarea name="addr" id="addr" ></textarea><br /></br>
				</div>
				<div style="text-align:center;padding-top:10px">
					<input type="submit" name="submit" value="Submit" />
				</div>
			</div>
		</form>

<div id="req_detail" style="display:none">
	<label>Programme :</label> <select name="programme" id="prog" onchange="progSelect()">
		<option value="select">Select Programme</option>
	<?php
		$mysqli = new mysqli("localhost", "webser","WebSer#3010", "db_administration");
		# check connection
		if ($mysqli->connect_errno) 
		{
			echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
			exit();
		}
		$sql = "SELECT PROGRAMME_ID,PROGRAMME_NAME from `t_programme`";
		$results = $mysqli->query($sql);
		if($results->num_rows >= 1)
		{
			while($row=$results->fetch_array())
			{
				echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";			
			}
		}
		$results->free();
		$mysqli->close();
	?>
	</select><br />

	<label>Parameters :</label> <input type="text" id="param" name="param" /><br />
	<label>Region :</label> <input type="text" id="region" name="region" /><br />
	<label>Start date :</label> <input type="text" id="start_date" name="start_date" class="datepicker" /><br />
	<label>End date :</label> <input type="text" id="end_date" name="end_date" class="datepicker" /><br />
</div>

<?php
	if (isset($_POST['submit'])) 
	{
		## prepare data for insertion
		//$unq = $_POST['unique'];
		$recv_date = $_POST['rdate'];		
		$purpose = $_POST['purpose'];
		$status =$_POST['status'];
		$comments =$_POST['comment'];
		$mode =$_POST['mode'];
		$req_type =$_POST['req_type'];
		$cost =$_POST['cost'];
		
		//$programme = $_POST['programme'];
		//$param = $_POST['param'];
		//$region = $_POST['region'];
		//$start_date	= $_POST['start_date'];
		//$end_date	= $_POST['end_date'];
		
		$rcount = $_POST['rcount'];
		
		$name = $_POST['cname'];
		$org	= $_POST['orgname'];
		$desg	= $_POST['desg'];
		$phone	= $_POST['phone'];
		$email	= $_POST['email'];
		$address	= $_POST['addr'];
		
		$contact_id=0;

		## connect mysql server
		$mysqli = new mysqli("localhost", "webser","WebSer#3010", "db_administration");
		# check connection
		if ($mysqli->connect_errno) 
		{
			echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
			exit();
		}
		
		$totalRequest = 0;
		
		## Getting total number of request in a yearRange
		$sql = "SELECT count(*) from t_data_request WHERE date_format(RECV_DATE,'%Y-%m-%d') = \"".$recv_date."\"";
		$results = $mysqli->query($sql);
		if($results->num_rows == 1)
		{
			while($row=$results->fetch_array())
			{
				$totalRequest = $row[0];			
			}
		}
		$results->free();
		$unq = $recv_date.str_pad($totalRequest, 3, "0", STR_PAD_LEFT);
		$unq = str_replace("-","",$unq);
		
		## query database
		# check if username and org exist else insert
		$sql = "SELECT ID from `t_contact` WHERE `ORG` = ?  and `NAME` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("ss", $org,$name);
		if($stmt->execute())
		{	
			$stmt ->store_result();
			if ($stmt->num_rows >= 1) 
			{
				$stmt->bind_result($ID);
				while($stmt->fetch())
				{
					$contact_id=$ID;
				}	
			}
			else
			{
				$stmt->close();
				# insert data into mysql database
				$sql = "INSERT  INTO `t_contact` (`NAME`, `ORG`, `POSITION_NAME`,`PHONE`,`EMAIL`, `ADDRESS`) VALUES (?,?,?,?,?,?)";
				$stmt = $mysqli->prepare($sql);
				$stmt->bind_param("ssssss", $name,$org,$desg,$phone,$email,$address);
				if ($stmt->execute()) 
				{
					$stmt->close();
					$sql = "SELECT ID from `t_contact` WHERE `ORG` = ?  and `NAME` = ?";
					$stmt = $mysqli->prepare($sql);
					$stmt->bind_param("ss", $org,$name);
					if($stmt->execute())
					{
						$stmt ->store_result();
						if ($stmt->num_rows >= 1) 
						{
							$stmt->bind_result($ID);
							while($stmt->fetch())
							{
								$contact_id=$ID;
							}	
						}	
					}		
				}
				else 
				{
					echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
					exit();
				}
			}
		}
		else 
		{
			echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
			exit();
		}
		
		# check if username and email exist else insert
		$exists = ""; 
		$sql = "SELECT RECV_DATE,CONTACT_ID,UNIQUE_ID from `t_data_request` WHERE `CONTACT_ID` = ?  and `UNIQUE_ID` = ? and `RECV_DATE` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sss", $contact_id,$unq,$recv_date);
		if($stmt->execute())
		{	
			$stmt ->store_result();
			if ($stmt->num_rows >= 1) 
			{
				$exists .= "u";
			}
			if ($exists == "u") 
			{
				echo "<p><b>Error:</b> Data already exists!!!</p>";
			}
			else 
			{
				$stmt->close();
				# insert data into mysql database
				$sql = "INSERT  INTO `t_data_request` (`RECV_DATE`,`CONTACT_ID`,`UNIQUE_ID`,`PURPOSE`,`STATUS`,`COMMENTS`,`MODE`,`REQ_TYPE`,`COST`) VALUES (?,?,?,?,?,?,?,?,?)";
				$stmt = $mysqli->prepare($sql);
				$stmt->bind_param("sssssssss", $recv_date,$contact_id,$unq,$purpose,$status,$comments,$mode,$req_type,$cost);
				if ($stmt->execute()) 
				{
					$stmt->close();
					$sql = "SELECT SNO from `t_data_request` WHERE `CONTACT_ID` = ?  and `RECV_DATE` = ?";
					$stmt = $mysqli->prepare($sql);
					$stmt->bind_param("ss", $contact_id,$recv_date);
					if($stmt->execute())
					{
						$stmt ->store_result();
						if ($stmt->num_rows >= 1) 
						{
							$stmt->bind_result($ID);
							while($stmt->fetch())
							{
								$sno=$ID;
							}	
						}	
					}		
					
					if( isset($sno) && ($sno!=null) )
					{

						for($i=0;$i<$rcount;$i++)
						{
							$programme = $_POST['prog'.$i];
							$param = $_POST['param'.$i];
							$region = $_POST['region'.$i];
							$start_date	= $_POST['start_date'.$i];
							$end_date	= $_POST['end_date'.$i];

							$stmt->close();
							# insert data into mysql database
							$sql = "INSERT  INTO `t_request_details` (`REQUEST_ID`,`PROGRAMME_ID`,`PARAMETERS`,`REGION`,`START_DATE`,`END_DATE`) VALUES (?,?,?,?,?,?)";
							$stmt = $mysqli->prepare($sql);
							$stmt->bind_param("ssssss", $sno,$programme,$param,$region,$start_date,$end_date);
							if (!$stmt->execute()) 
							{
								echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
								exit();
							}
						}
						
						$tz = 'Asia/Kolkata';
						$tz_obj = new DateTimeZone($tz);
						$today = new DateTime("now", $tz_obj);
						$today_formatted = $today->format('Y-m-d  H:i:s');
						
						$detail = "Inserted: Status=".$status;
						$sql = "INSERT  INTO `t_request_summary` (`SNO`,`detail`,`who`,`when`) VALUES (?,?,?,?)";
						$stmt = $mysqli->prepare($sql);
						$stmt->bind_param("ssss", $sno,$detail,$joomlaUserName,$today_formatted);
						if (!$stmt->execute()) 
						{
							echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
							exit();
						}
												
					}
					echo "<p>Data entered successfully!!!</p>";
				} 
				else 
				{
					echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
					exit();
				}
			}
		}
		else
		{
			echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
			exit();	
		}
		$stmt->close();
		$mysqli->close();
	}
?>
		<!--div align="center"><a href="ListDataRequest.php">[Back]</a></div-->	
	</div>
</body>
</html>
<?php
}
?>