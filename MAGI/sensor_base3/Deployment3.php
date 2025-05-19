<?php
session_start();

?>

<html>

<head>
    <title>Add Sensor Data</title>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="http://www.jacklmoore.com/colorbox/example4/colorbox.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" />
	
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
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
#main{
	width:93%;
}
    </style>
    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="multiselect-dropdown-main/multiselect-dropdown.js"></script>

    <script type="text/javascript">
	$(".chosen-select").chosen({
  no_results_text: "Oops, nothing found!"
});
	var total_text;
        //$(function () {
			//const platform = "<?php echo isset($_SESSION['platform']) ? $_SESSION['platform'] : ''; ?>";
			//if (platform) {
            //$('#tstation').val(platform); // Selects the option with the matching value
			//}
			// const sname = "<?php echo isset($_SESSION['sname']) ? $_SESSION['sname'] : ''; ?>";
			// if (sname) {
            // $('#sname1').val(sname); // Selects the option with the matching value
			// }
            // $(".datepicker").datepicker({
                // dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "1900:2050"
            // });
			
       
        //});
		
        // function progSelect() {
            // var s = document.getElementById('tstation');
            // if (s.selectedIndex == 0) {
                // alert("Please select valid station from the given list");
            // }
        // }
        // function orgSelect() {
           // // var cntdefault = "<label>Name :</label> <input type=\"text\" name=\"cname\" id=\"cname\" value=\"\">";
            // var cntdefault = "<div class=\"row\"><div class=\"col-md-6\"><label>Name :</label></div> <div class=\"col-md-6\"><input type=\"text\" class=\"form-control\" name=\"cname\" id=\"cname\" value=\"\"> </div></div>";
            // document.getElementById('desg').value = "";
            // document.getElementById('phone').value = "";
            // document.getElementById('email').value = "";
            // document.getElementById('addr').value = "";
            // var s = document.getElementById('org');
            // if (s.selectedIndex == s.length - 1) {
                // //document.getElementById('OrgOther').style.height = 'auto';
              // // document.getElementById('OrgOther').style.height='auto';
                       // //document.getElementById('OrgOther').style.display='block';
                // document.getElementById('OrgOther').style.display = 'contents';
            
                // // document.getElementById('NameDiv').style.display="contents";
                 // document.getElementById('orgname').value = "";
                // $("#NameDiv").html(cntdefault);
            // }
            // else {
                // document.getElementById('OrgOther').style.height = '0px';
                // document.getElementById('OrgOther').style.display = 'none';
                // if (document.getElementById('OrgText') != null)
                    // document.getElementById('OrgText').value = "";
                // if (s.selectedIndex == 0) {
                    // alert("Please select valid organisation from the given list or 'New Organisation' to enter a new organisation");
                    // document.getElementById('orgname').value = "";
                 
                            // $("#NameDiv").html(cntdefault);
                // }
                // else {
                    // // document.getElementById('NameDiv').style.display="contents";
                    // document.getElementById('orgname').value = s.value;
                    // getEmpList();
                // }
            // }

        // }


        // function getEmpList(type) {
            // $.get("ListOrgContacts.php", { name: document.getElementById('orgname').value }, function (data) { $("#NameDiv").html(data); });
        
        // }

        // function cntSelect(type) {
            // var s = document.getElementById('CntList');
            // if (s.selectedIndex == s.length - 1) {
                // document.getElementById('CntOther').style.height = 'auto';
                // document.getElementById('CntOther').style.display = 'block';
                // document.getElementById('cname').value = "";
                // document.getElementById("desg").value = "";
                // document.getElementById("phone").value = "";
                // document.getElementById("email").value = "";
                // document.getElementById("addr").value = "";
            // }
            // else {
                // document.getElementById('CntOther').style.height = '0px';
                // document.getElementById('CntOther').style.display = 'none';
                // if (document.getElementById('CntText') != null)
                    // document.getElementById('CntText').value = "";
                // if (s.selectedIndex == 0) {
                    // alert("Please select valid contact from the given list or 'New Contact' to enter a new contact");
                    // document.getElementById('cname').value = "";
                    // document.getElementById("desg").value = "";
                    // document.getElementById("phone").value = "";
                    // document.getElementById("email").value = "";
                    // document.getElementById("addr").value = "";
                // }
                // else {
                    // document.getElementById('cname').value = s.options[s.selectedIndex].text;
                    // document.getElementById('cid').value = s.value;
                    // getEmpDetails();
                // }
            // }
        // }

        // function getEmpDetails() {
            // $.get("GetCntDetail.php", { id: document.getElementById('cid').value },
                // function (data) {
                    // var cntDetails = data.split('%'); document.getElementById("desg").value = cntDetails[1];
                    // document.getElementById("phone").value = cntDetails[2];
                    // document.getElementById("email").value = cntDetails[3];
                    // document.getElementById("addr").value = cntDetails[4];
                // });
        // }
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
function stype2check() {
  var checkBox = document.getElementById("stype2");
  var text = document.getElementById("sname1");
  if (checkBox.checked == true){
	   document.getElementById("stype1").checked=false;
	    document.getElementById("sname2").style.display="none";
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}

function stype1check() {
  var checkBox = document.getElementById("stype1");
  var text = document.getElementById("sname2");
  if (checkBox.checked == true){
	  document.getElementById("sname1").style.display="none";
	  document.getElementById("stype2").checked=false;
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}

function myFunction() {
	var y=document.getElementById("tstation");
	var text = y.options[y.selectedIndex].text;
	if(text=="Wave Rider Buoy")
	{
		document.getElementById("sname1").innerHTML =
                    null;
  var x = document.getElementById("sname1");
  var option1 = document.createElement("option");
   var option2 = document.createElement("option");
    var option3 = document.createElement("option");
	 var option4 = document.createElement("option");
	  var option5 = document.createElement("option");
var option6 = document.createElement("option");
	  var option7 = document.createElement("option");
	  var option8 = document.createElement("option");
	  var option9 = document.createElement("option");
	  var option10 = document.createElement("option");
	  var option11 = document.createElement("option");
	  var option12 = document.createElement("option");
	  var option13= document.createElement("option");
	  var option14 = document.createElement("option");
	  var option15 = document.createElement("option");
	  var option16 = document.createElement("option");
  option1.text = "Digha";
  option2.text = "Gopalpur";
  option3.text = "Gopalpur old";
  option4.text = "Kanyakumari";
   option5.text = "Karwar";
   option6.text = "Kavaratti";
   option7.text = "Kollam";
   option8.text = "Kozhikode";
   option9.text = "Kiwi5";
   option10.text = "Krishnapatnam";
   option11.text = "Pondicherry";
   option12.text = "Ratnagiri";
   option13.text = "Tuticorin";
   option14.text = "Veraval";
   option15.text = "Versova";
   option16.text = "Vizag";
   
  x.add(option1);
   x.add(option2);
    x.add(option3);
	 x.add(option4);
	  x.add(option5);
	  x.add(option6);
   x.add(option7);
    x.add(option8);
	 x.add(option9);
	  x.add(option10);
	  x.add(option11);
   x.add(option12);
    x.add(option13);
	 x.add(option14);
	  x.add(option15);
	  x.add(option16);
	 
	}
	else if(text=="Tide Guage")
	{
		document.getElementById("sname1").innerHTML =
                    null;
		var x = document.getElementById("sname1");
  var option1 = document.createElement("option");
   var option2 = document.createElement("option");
    var option3 = document.createElement("option");
	 var option4 = document.createElement("option");
	  var option5 = document.createElement("option");
	  var option6 = document.createElement("option");
	  var option7 = document.createElement("option");
	  var option8 = document.createElement("option");
	  var option9 = document.createElement("option");
	  var option10 = document.createElement("option");
	  var option11 = document.createElement("option");
	  var option12 = document.createElement("option");
	  var option13= document.createElement("option");
	  var option14 = document.createElement("option");
	  var option15 = document.createElement("option");
	  var option16 = document.createElement("option");
	  var option17 = document.createElement("option");
	  var option18 = document.createElement("option");
		var option19 = document.createElement("option");
	var option20 = document.createElement("option");
	var option21 = document.createElement("option");
	var option22 = document.createElement("option");
	 var option23 = document.createElement("option");
	  var option24 = document.createElement("option");
	   var option25 = document.createElement("option");
	     var option26 = document.createElement("option");
		  var option27 = document.createElement("option");
	  var option28 = document.createElement("option");
	  var option29 = document.createElement("option");
	  var option30 = document.createElement("option");
	  var option31 = document.createElement("option");
	  var option32 = document.createElement("option");
	  var option33= document.createElement("option");
	  var option34 = document.createElement("option");
	  var option35 = document.createElement("option");
	  var option36 = document.createElement("option");
	  var option37 = document.createElement("option");
	 
	   
	   
	   
	   
  option1.text = "Aerial Bay";
 
   option2.text = "Campbell Bay";
  option3.text = "Chennai";
  option4.text = "Cochin";
   option5.text = "Ennore";
   option6.text = "Garden Reach";
   option7.text = "JNPT-Mumbai";
   option8.text = "Kakinada";
   option9.text = "Kandla";
   option10.text = "Karwar";
   option11.text = "Kavaratti";
   option12.text = "Krishnapatnam";
   option13.text = "Minicoy";
   option14.text = "Nagapattinam";
   option15.text = "Nancowry";
   option16.text = "New Mangalore";
   option17.text = "Okha";
   option18.text = "Port Blair";
   option19.text = "Paradip";
   option20.text = "Tuticorin";
   option21.text = "Visakhapatnam";
   option22.text = "Jaigarh";
   option23.text = "Adani Hazira";
   option24.text = "Beypore";
   option25.text = "Car Nicobar";
   option26.text = "Hutbay";
   option27.text = "Machilipatnam";
   option28.text = "Marmagao";
   option29.text = "Rangatbay";
      option30.text = "Veraval";
      option31.text = "Dhamra";
      option32.text = "Digha (old)";
      option33.text = "Gopalpur";
      option34.text = "Puducherry";
      option35.text = "Kollam";
      option36.text = "Porbandar";
      option37.text = "Jakhau";
   
   
  x.add(option1);   x.add(option2);
    x.add(option3);	 x.add(option4);
	  x.add(option5);	  x.add(option6);
   x.add(option7);    x.add(option8);
	 x.add(option9);	  x.add(option10);
	  x.add(option11);   x.add(option12);
    x.add(option13);	 x.add(option14);
	  x.add(option15);	  x.add(option16);
	 x.add(option17);	  x.add(option18);
	    x.add(option19);x.add(option20);x.add(option21);x.add(option22);x.add(option23); x.add(option24);x.add(option25);x.add(option26);x.add(option27);x.add(option28);
		  x.add(option29);x.add(option30);x.add(option31);x.add(option32);x.add(option33); x.add(option34);x.add(option35);x.add(option36);x.add(option37);		  					 
}
else if(text=="Moored Buoy")
	{
		document.getElementById("sname1").innerHTML =
                    null;
		var tt = document.getElementById("sname1");
  var option1 = document.createElement("option");
option1.text = "test3";
tt.add(option1);
}
}


    </script>
</head>

<body>
    <!-- Start MenuBar-->
    

        	

    <div style="text-align: center;">
        <h1>Add Deployment Details</h1>
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
                            <select class="form-control" name="tstation" id="tstation"  onchange="myFunction()" required>
							<option value="<?php echo isset($_SESSION['platform']) ? $_SESSION['platform'] : ''; ?>"><?php echo isset($_SESSION['platform']) ? $_SESSION['platform'] : ''; ?></option>
							<!--<option value="">Select Platform</option>
							<option value="Tide Guage">Tide Guage</option>
                                <option value="Wave Rider Buoy">Wave Rider Buoy</option>
                                <option value="Moored Buoy">Moored Buoy</option>-->
                            
                            </select>
                        </div>
                    </div>
               
                <input type="text" class="form-control" id= "hide1" name="hide1" hidden>
                    <div class="row form-group">
                        <div class="col-md-3">

                            <label>Station Name:</label>
							

                        </div>
						<input type="checkbox" id="stype1" name="stype1" value="new" onclick="stype1check()" >
<label for="new" >New</label><input type="checkbox" id="stype2" name="stype2" value="old" onclick="stype2check()" checked>
<label for="old">Old</label>
                        <div class="col-md-9">
<select class="form-control" name="sname1" id="sname1"  onchange="progSelect()" style="display:none">
							<!--<option value="">Station Name</option>
							<option value="<?php echo isset($_SESSION['sname']) ? $_SESSION['sname'] : ''; ?>"><?php echo isset($_SESSION['sname']) ? $_SESSION['sname'] : ''; ?></option>-->
                            </select>
							
                            <input type="text"  class="form-control" id="sname2" name="sname2" value="<?php echo isset($_SESSION['sname']) ? $_SESSION['sname'] : ''; ?>">
                        </div>
                    </div>
					 
					 <div class="row form-group">
                        <div class="col-md-3">

                            <label>Latitude:</label>
                        </div>
                        <div class="col-md-9">
							
                               <input type="text" class="form-control " name="lat" required/>
                             </div>
                    </div>
					 <div class="row form-group">
                        <div class="col-md-3">

                            <label>Longitude:</label>
                        </div>
                        <div class="col-md-9">
							
                               <input type="text" class="form-control " name="lng" required/>
                             </div>
                    </div>
					
					 <div class="row form-group">
                        <div class="col-md-3">

                            <label>Deployment Date & Time:</label>
                        </div>
                        <div class="col-md-9">

                            <input type="datetime-local" class="form-control" name="ddate" step="1" required>
                        </div>
                    </div>
					
					  <div class="row form-group">
                        <div class="col-md-3">

                            <label>Sensor Model:</label>
                        </div>
                        <div class="col-md-9">
						


  <select name="smodel[]" id="smodel" data-placeholder="Begin typing a name to filter..." multiple class="chosen-select" multiple multiselect-search="true">
    
    
  


						
 <!--<select class="form-control" name="smodel" id="smodel"   required>-->
 
							<option value="">Select Sensor Model</option>
							
                                
                               <?php
    $mysqli = new mysqli("localhost", "webser", "WebSer3010", "sensor_base2");
    # check connection
    if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }
    $sql = "SELECT distinct(sensor_model) from `sensor_model_details`";
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
                              <input type="submit"/>
							
                        </div>
                    </div>
					
					 <div class="row form-group">
                        <div class="col-md-3">

                            <label>Bathymetry:</label>
                        </div>
                        <div class="col-md-9">

                            <input type="text" class="form-control" name="bathy" required>
                        </div>
                    </div>
					<div class="row form-group">
                        <div class="col-md-3">

                            <label>Measurement Height:</label>
                        </div>
                        <div class="col-md-9">

                            <input type="text" class="form-control" name="height" required>
                        </div>
                    </div>
					
               


            <div class="row">
                <div class="col-md-12 offset-md-6">
	 <button type=" submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </div>
    </div>
   


    </form>
    </div>
    
    
    <!-- End Bootstrap Form-->



    <?php
    if (isset($_POST['submit'])) {
        ## connect mysql server
        $mysqli = new mysqli("localhost", "webser", "WebSer3010", "sensor_base3");
        # check connection
        if ($mysqli->connect_errno) {
            echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
            exit();
        }
        ## query database
        ## prepare data for insertion
        ## $unq = $_POST['unique'];
        $tstation =$_POST['tstation'];
      //$sname1=$_POST['sname1'];
	  $sname2=$_POST['sname2'];
	  $lat=$_POST['lat'];
	  $lng=$_POST['lng'];
        $ddate = $_POST['ddate'];
		$smodel=$_POST['smodel'];
		$bathy=$_POST['bathy'];
		$height=$_POST['height'];
                // $mode = $_POST['mode'];
        // pname,min,max
      		// echo '<script type="text/javascript">alert(total_text);</script>';
  // echo '<script type="text/javascript">document.write(tt);</script>';
	// $phpVar= '<script>document.writeln(total_text);</script>';
$phpVar=$_POST['hide1'];
	  // echo $phpVar;
        # check if username and email exist else insert
        $exists = "";
		//if (isset($_POST['stype1'])) {
			if(isset($_POST["smodel"])) 
		{ 
			// Retrieve each selected option 
			foreach ($_POST['smodel'] as $smodel)
			{
				//if($_POST['tstation']=='Tide guage')
	//{
		  //$sql = "SELECT Deployment_Date,Station_Name from Deployment_Details where Deployment_Date= ? and Station_Name= ? and Sensor_Model= ?";
		 // $sql = "SELECT a.Deployment_Date,b.Station_Name  from tg_identification_details a, sensor_models b where a.Deployment_Date=b.Deployment_Date and a.Deployment_Date= ? and a.Station_Name= ? and b.Sensor_Model= ?";
		 // $stmt1 = $mysqli->prepare($sql);
		   //$stmt1->bind_param("sss", $ddate,$sname2,$smodel);
	//}
	
		//else if($_POST['tstation']=='Wave Rider Buoy')
		//{
			$sql = "SELECT a.deployment_date,a.platform_id from platform_identification_details a, sensor_models b where a.deployment_date=b.deployment_date and a.deployment_date= ? and a.platform_id= ? and b.sensor_model= ?";
			//$stmt1 = $mysqli->prepare($sql);
		   //$stmt1->bind_param("sss", $ddate,$sname2,$smodel);
	//}
		
		
      
						     $stmt1 = $mysqli->prepare($sql);
							  //echo $tstation,$sname2,$smodel,$lat,$lng,$ddate;
                $stmt1->bind_param("sss", $ddate,$sname2,$smodel);

				if ($stmt1->execute()) {
					  echo '<script type="text/javascript">alert("Data already exists");</script>';
					 
					 $stmt1->store_result();
					  //$stmt->close();
					    if ($stmt1->num_rows >0) {
						   // if ($c1 >1){
							// echo "<p><b>Error:</b> Data already exists!!!</p>";
						 //echo '<script type="text/javascript">alert("Station Name '.$sname2.' with Deployment Details and  '.$smodel. ' Sensor already exists");</script>';
						}
						
						
									//else {
				// echo '<script type="text/javascript">alert("'.$smodel.' Inserted");</script>';
                $stmt1->close();
			  
			
//echo '<script type="text/javascript">alert("'.$smodel. '");</script>';
				//if($_POST['tstation']=='Tide guage')
	//{
		         //$sql1 = "INSERT  INTO tg_identification_details (type_of_station,`station_name`,`latitude`,`longitude`,`Deployment_Date`) VALUES (?,?,?,?,?)";
				// $stmt2 = $mysqli->prepare($sql1);
					// $stmt2->bind_param("sssss", $tstation,$sname2,$lat,$lng,$ddate,$smodel,$bathy,$height);
					
					 
	//}
	//else if($_POST['tstation']=='Wave Rider Buoy')
		//{
	    $sql1 = "INSERT INTO platform_identification_details (type_of_platform,platform_id,latitude,longitude,deployment_date,retrieved_drift_date,sensor_model,bathymetry,measurement_height) VALUES (?,?,?,?,?,'NULL',?,?,?)";
		 //echo "hii";
		$stmt2 = $mysqli->prepare($sql1);
		$stmt2->bind_param("ssssssss", $tstation,$sname2,$lat,$lng,$ddate,$smodel,$bathy,$height);
		//echo "<pre>" . $sql1 . "</pre>";
		$stmt2->execute();
		//echo "<pre>" . $tstation ."," . $sname2 .",". $lat .",". $lng ."," . $ddate ."</pre>";
		
		//}
		 $sql2 = "INSERT  INTO sensor_models (platform_id,deployment_date,sensor_model,type_of_platform) VALUES (?,?,?,?)";
		  $stmt3 = $mysqli->prepare($sql2);
					 $stmt3->bind_param("ssss",$sname2,$ddate,$smodel,$tstation);
$stmt3->execute();
				
				//echo '<script type="text/javascript">alert("'.$smodel. '");</script>';
				
					echo '<script type="text/javascript">alert("Submitted Successfully");</script>';
				//}
				}  
				} 
				  
		}
		$sql1 = "SELECT * FROM platform_identification_details WHERE type_of_platform=? AND platform_id = ? order by deployment_date desc";
			  $stmt2 = $mysqli->prepare($sql1);
			  $stmt2->bind_param('ss', $tstation,$sname2);
        
		 if ($stmt2->execute()) {
			 $result = $stmt2->get_result(); // Get the result set

		$updatedData = $result->fetch_all(MYSQLI_ASSOC);
 
        // Update session variables
		$_SESSION['cart21'] = array_column($updatedData, 'type_of_platform');
		$_SESSION['cart22'] = array_column($updatedData, 'platform_id');
        $_SESSION['cart23'] = array_column($updatedData, 'deployment_date');
		$_SESSION['cart24'] = array_column($updatedData, 'retrieved_drift_date');
		 }
		echo "<script>
        parent.$.colorbox.close();
        parent.window.location.href = 'deploymentdates3.php';
    </script>";
    exit();
		//header("Location:deploymentdates3.php");
				//exit();
		//}
		// else if(isset($_POST['stype2'])){
			// echo '<script type="text/javascript">alert("entered stype2");</script>';
			 // if(isset($_POST["smodel"])) 
		// { 
			// // Retrieve each selected option 
			// foreach ($_POST['smodel'] as $smodel)
			// {
			// $sql = "SELECT a.deployment_date,a.platform_id from platform_identification_details a, sensor_models b where a.deployment_date=b.deployment_date and a.deployment_date= ? and a.platform_id= ? and b.sensor_model= ?";

						     // $stmt1 = $mysqli->prepare($sql);
                // $stmt1->bind_param("sss", $ddate,$sname2,$smodel);
				// if ($stmt1->execute()) {
					 // // echo '<script type="text/javascript">alert("'.$smodel.'Data already exists");</script>';
					 
					 // $stmt1->store_result();
					  // //$stmt->close();
					    // if ($stmt1->num_rows >0) {
						   // // if ($c1 >1){
							// // echo "<p><b>Error:</b> Data already exists!!!</p>";
						 // echo '<script type="text/javascript">alert("Data already exists");</script>';
						// }
									// else {
				// // echo '<script type="text/javascript">alert("'.$smodel.' Inserted");</script>';
                // $stmt1->close();
		
		
				         
				
						

		
			// // Retrieve each selected option 
		
// echo '<script type="text/javascript">alert(" '.$smodel. '");</script>';
					 // $sql2 = "INSERT INTO `deployment_details`
// (`platform`,
// `station_name`,
// `latitude`,
// `longitude`,
// `deployment_date`,
// `sensor_model`,
// `bathymetry`,
// `mesurement_height`)
// VALUES
// (?,?,?,?,?,?,?,?);";
                // $stmt2 = $mysqli->prepare($sql2);
				// // echo $ddate,$rdate,$sname,$smodel;
                // $stmt2->bind_param("ssssssss", $tstation,$sname1,$lat,$lng,$ddate,$smodel,$bathy,$height);
					// $stmt2->execute();
					 // echo '<script type="text/javascript">alert("stype2 executed");</script>';
				// }
				// }
				// }
				// // }
			
              // // if ($stmt->execute()) {
                    // // $stmt2->close();
					  // // for ($i=1;$i<=$phpVar;$i++)
				// // {
					

                    // // }
              		
	// }
						
				
			   // }
			  
			   

				
				//$mysqli->close();
				//echo "<script>window.location.href='deploymentdates3.php';</script>";
				
				//exit();
	}

    ?>
   <!-- <div align="center"><a href="ListDataReception.php">[Back]</a></div>
    </div>-->
</div>

</body>

</html>

