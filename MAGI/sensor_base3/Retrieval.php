<?php
$joomlaUserName="R Venkat Shesu";
#require_once("../../../odis/getUserInfo.php");
#if(is_null($joomlaUserName)){
#		echo '<html><head><title>Data Request for Restricted Data Sets</title></head><body><center>Please login with authenticated user to access HF RADAR Data <br /> Data access will be provided on <a target="_blank" href="/utilities/DataRequisitionForm.pdf"> request </a>. <br /><br />Please contact <br /><br /><hr />	Director<br />Indian National Centre for Ocean Information Services (INCOIS)<br />Ocean Valley, P.B. No: 21<br />Pragathi Nagar (BO)<br />Nizampet (SO)<br />HYDERABAD - 500 090<br /><br />Ph: 91-40-23886001<br />Fax: 91-40-23895001<br />E-Mail : <a href="mailto:director@incois.gov.in"> director@incois.gov.in </a><hr /></center> </body></html>';
#	} else if(!in_array(10,$joomlaGroups)){
#		echo '<html><head><title>Data Request for Restricted Data Sets</title></head><body><center>Dear '.$joomlaUserName.' your are not authenticated to access HF RADAR Data <br /> Data access will be provided on <a target="_blank" href="/utilities/DataRequisitionForm.pdf"> request </a>. <br /><br />Please contact <br /><br /><hr />	Director<br />Indian National Centre for Ocean Information Services (INCOIS)<br />Ocean Valley, P.B. No: 21<br />Pragathi Nagar (BO)<br />Nizampet (SO)<br />HYDERABAD - 500 090<br /><br />Ph: 91-40-23886001<br />Fax: 91-40-23895001<br />E-Mail : <a href="mailto:director@incois.gov.in"> director@incois.gov.in </a><hr /></center> </body></html>';
#	} else 
{
?>
<html>

<head>
    <title>Add Sensor Data</title>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="http://www.jacklmoore.com/colorbox/example4/colorbox.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" />
    <style type="text/css">
	
        label {
            display: inline-block;
            width: 150px;
			font-weight:600;
        }

        .form-control {
            width: 50%
        }
		footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;
  margin-top:20px;
}
    </style>
    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>

    <script type="text/javascript">
	var total_text;
        $(function () {
            $(".datepicker").datepicker({
                dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "1900:2050"
            });
        });
        function progSelect() {
            var s = document.getElementById('tstation');
            if (s.selectedIndex == 0) {
                alert("Please select valid station from the given list");
            }
        }
        function orgSelect() {
           // var cntdefault = "<label>Name :</label> <input type=\"text\" name=\"cname\" id=\"cname\" value=\"\">";
            var cntdefault = "<div class=\"row\"><div class=\"col-md-6\"><label>Name :</label></div> <div class=\"col-md-6\"><input type=\"text\" class=\"form-control\" name=\"cname\" id=\"cname\" value=\"\"> </div></div>";
            document.getElementById('desg').value = "";
            document.getElementById('phone').value = "";
            document.getElementById('email').value = "";
            document.getElementById('addr').value = "";
            var s = document.getElementById('org');
            if (s.selectedIndex == s.length - 1) {
                //document.getElementById('OrgOther').style.height = 'auto';
              // document.getElementById('OrgOther').style.height='auto';
                       //document.getElementById('OrgOther').style.display='block';
                document.getElementById('OrgOther').style.display = 'contents';
            
                // document.getElementById('NameDiv').style.display="contents";
                 document.getElementById('orgname').value = "";
                $("#NameDiv").html(cntdefault);
            }
            else {
                document.getElementById('OrgOther').style.height = '0px';
                document.getElementById('OrgOther').style.display = 'none';
                if (document.getElementById('OrgText') != null)
                    document.getElementById('OrgText').value = "";
                if (s.selectedIndex == 0) {
                    alert("Please select valid organisation from the given list or 'New Organisation' to enter a new organisation");
                    document.getElementById('orgname').value = "";
                 
                            $("#NameDiv").html(cntdefault);
                }
                else {
                    // document.getElementById('NameDiv').style.display="contents";
                    document.getElementById('orgname').value = s.value;
                    getEmpList();
                }
            }

        }


        function getEmpList(type) {
            $.get("ListOrgContacts.php", { name: document.getElementById('orgname').value }, function (data) { $("#NameDiv").html(data); });
        
        }

        function cntSelect(type) {
            var s = document.getElementById('CntList');
            if (s.selectedIndex == s.length - 1) {
                document.getElementById('CntOther').style.height = 'auto';
                document.getElementById('CntOther').style.display = 'block';
                document.getElementById('cname').value = "";
                document.getElementById("desg").value = "";
                document.getElementById("phone").value = "";
                document.getElementById("email").value = "";
                document.getElementById("addr").value = "";
            }
            else {
                document.getElementById('CntOther').style.height = '0px';
                document.getElementById('CntOther').style.display = 'none';
                if (document.getElementById('CntText') != null)
                    document.getElementById('CntText').value = "";
                if (s.selectedIndex == 0) {
                    alert("Please select valid contact from the given list or 'New Contact' to enter a new contact");
                    document.getElementById('cname').value = "";
                    document.getElementById("desg").value = "";
                    document.getElementById("phone").value = "";
                    document.getElementById("email").value = "";
                    document.getElementById("addr").value = "";
                }
                else {
                    document.getElementById('cname').value = s.options[s.selectedIndex].text;
                    document.getElementById('cid').value = s.value;
                    getEmpDetails();
                }
            }
        }

        function getEmpDetails() {
            $.get("GetCntDetail.php", { id: document.getElementById('cid').value },
                function (data) {
                    var cntDetails = data.split('%'); document.getElementById("desg").value = cntDetails[1];
                    document.getElementById("phone").value = cntDetails[2];
                    document.getElementById("email").value = cntDetails[3];
                    document.getElementById("addr").value = cntDetails[4];
                });
        }
        function fillHidden(field) {
            if (field == "Org") {
                document.getElementById("orgname").value = document.getElementById("OrgText").value;
            }
            else if (field == "Cnt") {
                document.getElementById("cname").value = document.getElementById("CntText").value;
                alert(document.getElementById("cname").value);
               
            }
        
        }

        function jsfunction(){
            $.colorbox({
                html:"<h4 style='text-align:center;color:green'>Submitted Successfully</h4>",
                width:  "20%",
				height: "15%",
              

            });
//             window.setTimeout(function() {
//     $.colorbox.close();
// }, 3000);
            return false;
        }

        function add_field()
{
    
  var total_text=document.getElementsByClassName("input_text");
  total_text=total_text.length+1;
  // document.cookie = "tt = " + total_text;
document.getElementById("hide1").value = total_text;
  document.getElementById("field_div").innerHTML=document.getElementById("field_div").innerHTML+
  "<div id='input_text"+total_text+"_wrapper' class='row'><div><div class='col-md-3'><input type='text' class='input_text' placeholder='Sensor Name' id='smodel"+total_text+"' name='smodel"+total_text+"' ></div><div class='col-md-3'><input type='text' placeholder='Sensor Type' id='stype"+total_text+"' name='stype"+total_text+"'></div><div class='col-md-3'><input type='text' placeholder='Parameter Name' id='pname"+total_text+"' name='pname"+total_text+"'></div></div><div><div class='col-md-2'><input type='text'  placeholder='Minimum Range' id='min"+total_text+"' name='min"+total_text+"' ></div><div class='col-md-2'><input type='text'  placeholder='Maximum Range' id='max"+total_text+"' name='max"+total_text+"'></div></div><div class='col-md-2'><input type='button' value='Remove' class='btn btn-primary' onclick=remove_field('input_text"+total_text+"');></div></div></br>";


}
function remove_field(id)
{
//   document.getElementById(id+"_wrapper").innerHTML="";
const element = document.getElementById(id+"_wrapper");
element.remove();

//   alert(id);
}
    </script>
</head>

<body>
    <!-- Start MenuBar-->
    
    <div class="navbar container-fluid" style="justify-content:left">
        <!--<a href="#home">Home</a> -->
        <div class="subnav">
            <img src="incois_logo.jpg" alt="..." height="36">
   
            </div>
			<div class="subnav">
          
           
            <a class="subnavbtn" href="List_Details_Sensor3.php" style="text-decoration: none;">List Details Sensor</a>
            </div>
   
        
           
          <div class="subnav" style="background-color:deepskyblue">
            <button class="subnavbtn">Sensor Data <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content" style="">
                <a href="Add_Sensor.php" style="text-decoration:none;display:block">Add Sensor Details</a></br>
				                <a href="Deployment2.php" style="text-decoration:none;display:block">Add Deployment Details</a></br>

                <a href="Retrieval.php" style="text-decoration:none;display:block">Add Retrieval Details</a>
                <!-- <a href="#careers">A</a>  -->
            </div>
        </div>
		 </div>
		
       

    <div style="text-align: center;">
        <h1>Add Retrieval Details</h1>
    </div>

    <!-- Start Bootstrap Form-->
    <div class="container">
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="container">
        
            <div id="main" style="border:solid 1px">
                
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label>Platform:</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" name="tstation" id="tstation" onchange="this.form.submit()" >
							<option value="">Select Platform</option>
							<option value="Tide guage"<?php if (isset($_POST['tstation']))echo ($_POST['tstation']=='Tide guage'?'selected':'')?>>Tide guage</option>
                               <option value="Wave Rider Buoy" <?php if (isset($_POST['tstation']))echo ($_POST['tstation']=='Wave Rider Buoy'?'selected':'')?>>Wave Rider Buoy</option>
								
                                <option value="Moored Buoy" <?php  if (isset($_POST['tstation']))echo($_POST['tstation']=='Moored Buoy'?'selected':'')?>>Moored Buoy</option>
                              
                            </select>
                        </div>
                    </div>
               
                <input type="text" class="form-control" id= "hide1" name="hide1" hidden>
                    <div class="row form-group">
                        <div class="col-md-3">

                            <label>Station Name:</label>
                        </div>
                        <div class="col-md-9">
 <select class="form-control" name="sname" id="sname"  Onchange="this.form.submit()" required>
							<option value="">Select Station Name</option>
							
                                
                               <?php
    $mysqli = new mysqli("localhost", "webser", "WebSer3010", "sensor_base3");
    # check connection
    if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }
	 $sname = $_POST['sname'];
	 if($_POST['tstation']=='Tide guage')
	{
    $sql = "SELECT distinct(station_name) from tg_identification_details where type_of_station='" .$_POST['tstation'] . "'";
	}
	else if($_POST['tstation']=='Wave Rider Buoy')
	{
    $sql = "SELECT distinct(station_name) from wrb_identification_details where type_of_station='" .$_POST['tstation'] . "'";
	}	
    //$sql = "SELECT distinct(station_name) from `Deployment_details` where platform='" .$_POST['tstation'] . "'";
    $results = $mysqli->query($sql);
    if ($results->num_rows >= 1) {
        while ($row = $results->fetch_array()) {
            // echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
			$selected = "";
                if ($row['0'] == $sname) {
                    $selected = " selected";
                }
			 echo '<option value="' . htmlspecialchars($row['0']) . '"' . $selected . '>' 
                . htmlspecialchars($row['0']) 
                . '</option>';
        }
    }
    $results->free();
    $mysqli->close();

                                ?>
                            </select>
                           
                        </div>
                    </div>
					  <div class="row form-group">
                        <div class="col-md-3">

                            <label>Deployment Date:</label>
                        </div>
                        <div class="col-md-9">
<select class="form-control" name="ddate" id="ddate"   required>
							<option value="">Select Deployment Date</option>
							
                                
                               <?php
    $mysqli = new mysqli("localhost", "webser", "WebSer3010", "sensor_base3");
    # check connection
    if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }
	if($_POST['tstation']=='Tide guage')
	{
    $sql = "SELECT distinct(DEPLOYMENT_DATE) from tg_identification_details where station_name='" .$_POST['sname'] . "'";
	}
	else if($_POST['tstation']=='Wave Rider Buoy')
	{
    $sql = "SELECT distinct(new_deployment_date) from wrb_identification_details where station_name='" .$_POST['sname'] . "'";
	}	
	
    $results = $mysqli->query($sql);
    if ($results->num_rows >= 1) {
        while ($row = $results->fetch_array()) {
            echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
        }
    }
    $results->free();
    $mysqli->close();

                                ?>
                            </select>
                            
                        </div>
                    </div>
					 <div class="row form-group">
                        <div class="col-md-3">

                            <label>Retrieval Date:</label>
                        </div>
                        <div class="col-md-9">
							
                             <input type="datetime-local" class="form-control" name="rdate" step="1" required>
                             
                           
                        </div>
                    </div>
					
               

            <div class="row">
                <div class="col-md-12 offset-md-6">
	 <button type=" submit" name="Rsubmit" value="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </div>
    </div>
    </div>


    </form>
    </div>
    
    
    <!-- End Bootstrap Form-->



    <?php
    if (isset($_POST['Rsubmit'])) {
        ## connect mysql server
        $mysqli = new mysqli("localhost", "webser", "WebSer3010", "sensor_base3");
        # check connection
        if ($mysqli->connect_errno) {
            echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
            exit();
        }
        
        $tstation =$_POST['tstation'];
        $sname = $_POST['sname'];
        $ddate = $_POST['ddate'];
        $rdate = $_POST['rdate'];
        
        
        
       
		
$phpVar=$_POST['hide1'];
	  
        $exists = "";
		
		if($_POST['tstation']=='Tide guage')
	{
    $sql = "SELECT Deployment_Date Station_Name from tg_identification_details where station_name='" .$_POST['sname'] . "'";
	 $stmt1 = $mysqli->prepare($sql);
     $stmt1->bind_param("sss", $ddate,$sname);
	}
	else if($_POST['tstation']=='Wave Rider Buoy')
	{
    $sql = "SELECT Deployment_Date,retrieved_date, Station_Name from wrb_identification_details where station_name='" .$_POST['sname'] . "'";
	 $stmt1 = $mysqli->prepare($sql);
                $stmt1->bind_param("sss", $ddate,$rdate,$sname);
	}	
									
	
       
					
			
                  if ($stmt1->execute()) {
					 // echo '<script type="text/javascript">alert("'.$smodel.'Data already exists");</script>';
					 
					 $stmt1->store_result();
					  //$stmt->close();
					    if ($stmt1->num_rows >0) {
						   // if ($c1 >1){
							// echo "<p><b>Error:</b> Data already exists!!!</p>";
							 echo '<script type="text/javascript">alert("Retrieved Date Already Updated");</script>';
						}
									else {
				// echo '<script type="text/javascript">alert("'.$smodel.' Inserted");</script>';
                $stmt1->close();
			  
			    // for ($i=1;$i<=$phpVar;$i++)
				// {
					
                # insert data into mysql database
                $sql = "UPDATE `deployment_details` SET `retrieved_date`=? WHERE `Deployment_Date`= ? and `Station_Name`= ?";
                $stmt2 = $mysqli->prepare($sql);
				 // echo $ddate,$rdate,$sname;
                $stmt2->bind_param("sss",$rdate,$ddate,$sname);
		
			if ($stmt2->execute())
			{
				
				 
				echo '<script type="text/javascript">alert("Retrieved Date Updated Successfully");</script>';
				
			}
				// }
			// echo '<script type="text/javascript">alert("Inserted");</script>';
              // if ($stmt->execute()) {
                    $stmt2->close();
					  // for ($i=1;$i<=$phpVar;$i++)
				// {
					 
					
                   
				// }
            
			   

				
				$mysqli->close();
	}
									}
						}

    ?>
   <!-- <div align="center"><a href="ListDataReception.php">[Back]</a></div>
    </div>-->
</div>
<footer
          class="text-center text-lg-start text-white"
          style="background-color: #1c2331"
          >
          <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      ©
      <a class="text-white" href="https://incois.gov.in/"
         >INCOIS</a
        >
    </div>
    <!-- Copyright -->
  </footer>
</body>

</html>
<?php
}
?>