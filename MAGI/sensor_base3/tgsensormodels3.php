<?php
session_start();
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
    <title>Deployment Dates</title>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="http://www.jacklmoore.com/colorbox/example4/colorbox.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <!--<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" />-->
    <style type="text/css">

		.styled-table {
		 border: 1px solid lightgrey;
    border-collapse: collapse;
    margin: 25px 0;
	margin-left: auto; 
  margin-right: auto;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

	

		.filterTable td {border: 1px solid white;padding-left: 0px;}
		form { margin-bottom: 0em; }
		
	
	
        label {
            display: inline-block;
            width: 150px;
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

.modal {
    display: none; /* Hidden by default */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4); /* Black with opacity */
}

.modal-content {
    background-color: white;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}


    </style>
    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--<script type="text/javascript" src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>-->
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
	var total_text;
        $(function () {
            $(".datepicker").datepicker({
                dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "1900:2050"
            });
        });
       
        function orgSelect() {
          

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
  "<div id='input_text"+total_text+"_wrapper' class='row'><div><div class='col-md-3'><input type='text' class='input_text' placeholder='Sensor Name' id='smodel"+total_text+"' name='smodel"+total_text+"'></div><div class='col-md-3'><input type='text' placeholder='Sensor Type' id='stype"+total_text+"' name='stype"+total_text+"'></div><div class='col-md-3'><input type='text' placeholder='Parameter Name' id='pname"+total_text+"' name='pname"+total_text+"'></div></div><div><div class='col-md-2'><input type='text'  placeholder='Minimum Range' id='min"+total_text+"' name='min"+total_text+"' ></div><div class='col-md-2'><input type='text'  placeholder='Maximum Range' id='max"+total_text+"' name='max"+total_text+"'></div></div><div class='col-md-2'><input type='button' value='Remove' class='btn btn-primary' onclick=remove_field('input_text"+total_text+"');></div></div></br>";
}
function remove_field(id)
{
//   document.getElementById(id+"_wrapper").innerHTML="";
const element = document.getElementById(id+"_wrapper");
element.remove();

//   alert(id);
}

function doalert(elmt) 
{
      // var total_text=document.getElementById("button22").value;
	  var total_text=elmt.value;
	  document.getElementById("hide1").value = total_text;
	// alert(document.getElementById("hide1").value);
 // var tt23= document.getElementById("hide1").value;

 

return false;

	
    }
	
	   function openEditModal3(index) {
    // Get the button element that was clicked
  var button = document.querySelectorAll(".edit-btn")[index];

    // Get data from the button's data attributes
    var newDeployment = button.getAttribute('data-ddate');
    var type = button.getAttribute('data-type');
    var name = button.getAttribute('data-name');
	var model = button.getAttribute('data-model');
	var make = button.getAttribute('data-make');
	var stype = button.getAttribute('data-stype');
	
	// if (type=="Tide Guage"){
		// document.getElementById('retrieved').style.display="none";
		// document.getElementById('retrieved-label').style.display="none";
	// }
	// else if (type=="Wave Rider Buoy"){
		// document.getElementById('retrieved').style.display="block";
		// document.getElementById("retrieved").required = 
            // true;
		// document.getElementById('retrieved-label').style.display="block";
	 // var retrieved = button.getAttribute('data-retrieved');
	 // document.getElementById('retrieved').value = retrieved;
	 
	// }

    // Populate modal fields with current data
	 document.getElementById('editIndex1').value = index;
     document.getElementById('type').value = type;
            document.getElementById('name').value = name;
            document.getElementById('ddate').value = newDeployment;
			document.getElementById('smodel').value = model;
			document.getElementById('smake').value = make;
			document.getElementById('stype').value = stype;
           
			console.log(index);
var modal = new bootstrap.Modal(document.getElementById('editModal2'));
    modal.show();
	// console.log(button.getAttribute('data-deployment-date')); // Should log "2015-10-29 00:00:00"
// console.log(button.getAttribute('data-station-type')); // Should log "Tide guage"
// console.log(button.getAttribute('data-station-name')); // Should log "Adani Hazira"
	 
// console.log( deploymentDate);
// console.log( stationType);
// console.log( stationName);
}
    </script>
</head>

<body>
    <!-- Start MenuBar-->
    <svg class="fish" id="fish">
  <path
     id="fish2"
     d="m 172.04828,20.913839 c 0.0489,-0.444179 -0.2178,-0.896934 -1.01784,-1.415715 -0.72801,-0.475049 -1.4826,-0.932948 -2.2149,-1.401138 -1.6035,-1.028129 -3.29018,-1.969653 -4.89798,-3.079244 -4.67074,-3.24131 -10.22127,-4.404923 -15.76322,-5.1509392 -2.27235,-0.286401 -4.81223,-0.168925 -6.72186,-1.574351 -1.48174,-1.081294 -4.04993,-4.828523 -6.86506,-6.456038 -0.4862,-0.290688 -2.77227,-1.44486897 -2.77227,-1.44486897 0,0 1.30939,3.55000597 1.60951,4.26429497 0.69542,1.644664 -0.38158,3.063809 -0.83262,4.642447 -0.29069,1.0418502 2.13772,0.8129002 2.26463,1.7827212 0.18179,1.432007 -4.15197,1.936211 -6.59152,2.417263 -3.65634,0.715146 -7.91635,2.082841 -11.56925,0.884071 -4.3046,-1.38313 -7.37269,-4.129669 -10.46566,-7.2354952 1.43801,6.7252892 5.4382,10.6028562 5.6157,11.4226162 0.18607,0.905509 -0.45961,1.091584 -1.04099,1.682394 -1.28967,1.265655 -6.91566,7.731125 -6.93366,9.781383 1.61379,-0.247815 3.56115,-1.660957 4.9803,-2.485862 1.58035,-0.905509 7.60593,-5.373029 9.29347,-6.065023 0.38587,-0.160351 5.0549,-1.531476 5.09434,-0.932949 0.0695,0.932949 -0.30784,1.137031 -0.18436,1.527189 0.22638,0.746016 1.44144,1.465449 2.02282,1.985088 1.50918,1.292237 3.21044,2.42841 4.27373,4.156252 1.49203,2.401827 1.55805,4.999163 1.98251,7.677102 0.99469,-0.111473 2.0091,-2.17545 2.55961,-2.992638 0.51278,-0.772598 2.38639,-4.07136 3.09725,-4.275442 0.67227,-0.204082 2.75511,0.958673 3.50284,1.180763 2.85973,0.848057 5.644,1.353976 8.56032,1.353976 3.50799,0.0094 12.726,0.258104 19.55505,-4.800226 0.75545,-0.567658 2.55703,-2.731104 2.55703,-2.731104 0,0 -0.37644,-0.577091 -1.04785,-0.790605 0.89779,-0.584808 1.8659,-1.211633 1.94993,-1.925922 z"
     style="fill:#528484;fill-opacity:1"
     inkscape:connector-curvature="0"
     sodipodi:nodetypes="cccccccccccccccccccccccccccccccc" />
  <path
     sodipodi:nodetypes="cccccccccccccccccccccccccccccccc"
     inkscape:connector-curvature="0"
     style="fill:#528484;fill-opacity:1"
     d="m 234.99441,42.953992 c 0.0489,-0.44418 -0.2178,-0.896934 -1.01784,-1.415715 -0.72801,-0.47505 -1.4826,-0.932949 -2.2149,-1.401138 -1.6035,-1.02813 -3.29018,-1.969653 -4.89798,-3.079245 -4.67074,-3.24131 -10.22127,-4.404923 -15.76322,-5.150939 -2.27235,-0.286401 -4.81223,-0.168925 -6.72186,-1.574351 -1.48174,-1.081294 -4.04993,-4.828523 -6.86506,-6.456038 -0.4862,-0.290688 -2.77227,-1.444869 -2.77227,-1.444869 0,0 1.30939,3.550006 1.60951,4.264295 0.69542,1.644664 -0.38158,3.063809 -0.83262,4.642447 -0.29069,1.04185 2.13772,0.8129 2.26463,1.782721 0.18179,1.432007 -4.15197,1.936211 -6.59152,2.417263 -3.65634,0.715146 -7.91635,2.082842 -11.56925,0.884072 -4.3046,-1.383131 -7.37269,-4.12967 -10.46566,-7.235496 1.43801,6.725289 5.4382,10.602857 5.6157,11.422617 0.18607,0.905508 -0.45961,1.091583 -1.04099,1.682394 -1.28967,1.265654 -6.91566,7.731125 -6.93366,9.781382 1.61379,-0.247815 3.56115,-1.660957 4.9803,-2.485862 1.58035,-0.905509 7.60593,-5.373029 9.29347,-6.065023 0.38587,-0.160351 5.0549,-1.531476 5.09434,-0.932948 0.0695,0.932948 -0.30784,1.137031 -0.18436,1.527188 0.22638,0.746016 1.44144,1.46545 2.02282,1.985088 1.50918,1.292237 3.21044,2.42841 4.27373,4.156252 1.49203,2.401827 1.55805,4.999163 1.98251,7.677102 0.99469,-0.111473 2.0091,-2.17545 2.55961,-2.992638 0.51278,-0.772598 2.38639,-4.071359 3.09725,-4.275442 0.67227,-0.204082 2.75511,0.958673 3.50284,1.180763 2.85973,0.848057 5.644,1.353976 8.56032,1.353976 3.50799,0.0094 12.726,0.258104 19.55505,-4.800226 0.75545,-0.567658 2.55703,-2.731104 2.55703,-2.731104 0,0 -0.37644,-0.57709 -1.04785,-0.790605 0.89779,-0.584808 1.8659,-1.211633 1.94993,-1.925921 z"
     id="fish3" />
  <path
     id="fish6"
     d="m 200.07076,80.737109 c 0.0489,-0.44418 -0.2178,-0.896934 -1.01784,-1.415715 -0.72801,-0.47505 -1.4826,-0.932949 -2.2149,-1.401138 -1.6035,-1.02813 -3.29018,-1.969653 -4.89798,-3.079245 -4.67074,-3.24131 -10.22127,-4.404923 -15.76322,-5.150939 -2.27235,-0.286401 -4.81223,-0.168925 -6.72186,-1.574351 -1.48174,-1.081294 -4.04993,-4.828523 -6.86506,-6.456038 -0.4862,-0.290688 -2.77227,-1.444869 -2.77227,-1.444869 0,0 1.30939,3.550006 1.60951,4.264295 0.69542,1.644664 -0.38158,3.063809 -0.83262,4.642447 -0.29069,1.04185 2.13772,0.8129 2.26463,1.782721 0.18179,1.432007 -4.15197,1.936211 -6.59152,2.417263 -3.65634,0.715146 -7.91635,2.082842 -11.56925,0.884072 -4.3046,-1.383131 -7.37269,-4.12967 -10.46566,-7.235496 1.43801,6.725289 5.4382,10.602857 5.6157,11.422617 0.18607,0.905508 -0.45961,1.091583 -1.04099,1.682394 -1.28967,1.265654 -6.91566,7.731125 -6.93366,9.781382 1.61379,-0.247815 3.56115,-1.660957 4.9803,-2.485862 1.58035,-0.905509 7.60593,-5.373029 9.29347,-6.065023 0.38587,-0.160351 5.0549,-1.531476 5.09434,-0.932948 0.0695,0.932948 -0.30784,1.137031 -0.18436,1.527188 0.22638,0.746016 1.44144,1.46545 2.02282,1.985088 1.50918,1.292237 3.21044,2.42841 4.27373,4.156252 1.49203,2.401827 1.55805,4.999163 1.98251,7.677102 0.99469,-0.111473 2.0091,-2.17545 2.55961,-2.992638 0.51278,-0.772598 2.38639,-4.071359 3.09725,-4.275442 0.67227,-0.204082 2.75511,0.958673 3.50284,1.180763 2.85973,0.848057 5.644,1.353976 8.56032,1.353976 3.50799,0.0094 12.726,0.258104 19.55505,-4.800226 0.75545,-0.567658 2.55703,-2.731104 2.55703,-2.731104 0,0 -0.37644,-0.57709 -1.04785,-0.790605 0.89779,-0.584808 1.8659,-1.211633 1.94993,-1.925921 z"
     style="fill:#528484;fill-opacity:1"
     inkscape:connector-curvature="0"
     sodipodi:nodetypes="cccccccccccccccccccccccccccccccc" />
  <path
     sodipodi:nodetypes="cccccccccccccccccccccccccccccccc"
     inkscape:connector-curvature="0"
     style="fill:#528484;fill-opacity:1"
     d="m 77.275623,89.018799 c 0.0489,-0.44418 -0.2178,-0.896934 -1.01784,-1.415715 -0.72801,-0.47505 -1.4826,-0.932949 -2.2149,-1.401138 -1.6035,-1.02813 -3.29018,-1.969653 -4.89798,-3.079245 -4.67074,-3.24131 -10.22127,-4.404923 -15.76322,-5.150939 -2.272347,-0.286401 -4.812227,-0.168925 -6.721857,-1.574351 -1.48174,-1.081294 -4.04993,-4.828523 -6.86506,-6.456038 -0.4862,-0.290688 -2.77227,-1.444869 -2.77227,-1.444869 0,0 1.30939,3.550006 1.60951,4.264295 0.69542,1.644664 -0.38158,3.063809 -0.83262,4.642447 -0.29069,1.04185 2.13772,0.8129 2.26463,1.782721 0.18179,1.432007 -4.15197,1.936211 -6.59152,2.417263 -3.65634,0.715146 -7.91635,2.082842 -11.56925,0.884072 -4.3046,-1.383131 -7.37269,-4.12967 -10.46566,-7.235496 1.43801,6.725289 5.4382,10.602857 5.6157,11.422617 0.18607,0.905508 -0.45961,1.091583 -1.04099,1.682394 -1.28967,1.265654 -6.9156603,7.731122 -6.9336603,9.781382 1.6137903,-0.24782 3.5611503,-1.66096 4.9803003,-2.48586 1.58035,-0.90551 7.60593,-5.37303 9.29347,-6.065025 0.38587,-0.160351 5.0549,-1.531476 5.09434,-0.932948 0.0695,0.932948 -0.30784,1.137031 -0.18436,1.527183 0.22638,0.74602 1.44144,1.46546 2.02282,1.98509 1.50918,1.29224 3.21044,2.42841 4.27373,4.15625 1.49203,2.40183 1.55805,4.999171 1.98251,7.677111 0.99469,-0.11148 2.0091,-2.17545 2.55961,-2.99264 0.51278,-0.7726 2.38639,-4.071361 3.09725,-4.275441 0.67227,-0.20408 2.75511,0.95867 3.50284,1.18076 2.85973,0.84806 5.644,1.35398 8.560317,1.35398 3.50799,0.009 12.726,0.2581 19.55505,-4.80023 0.75545,-0.56766 2.55703,-2.7311 2.55703,-2.7311 0,0 -0.37644,-0.57709 -1.04785,-0.79061 0.89779,-0.58481 1.8659,-1.211632 1.94993,-1.92592 z"
     id="fish4" />
  <path
     id="fish5"
     d="m 127.65312,60.900973 c 0.0489,-0.44418 -0.2178,-0.896934 -1.01784,-1.415715 -0.72801,-0.47505 -1.4826,-0.932949 -2.2149,-1.401138 -1.6035,-1.02813 -3.29018,-1.969653 -4.89799,-3.079245 -4.67074,-3.24131 -10.22127,-4.404923 -15.76322,-5.150939 -2.27235,-0.286401 -4.812228,-0.168925 -6.721858,-1.574351 -1.48174,-1.081294 -4.04993,-4.828523 -6.86506,-6.456038 -0.4862,-0.290688 -2.77227,-1.444869 -2.77227,-1.444869 0,0 1.30939,3.550006 1.60951,4.264295 0.69542,1.644664 -0.38158,3.063809 -0.83262,4.642447 -0.29069,1.04185 2.13772,0.8129 2.26463,1.782721 0.18179,1.432007 -4.15197,1.936211 -6.59152,2.417263 -3.65634,0.715146 -7.91635,2.082842 -11.56925,0.884072 -4.3046,-1.383131 -7.37269,-4.12967 -10.46566,-7.235496 1.43801,6.725289 5.4382,10.602857 5.6157,11.422617 0.18607,0.905508 -0.45961,1.091583 -1.04099,1.682394 -1.28967,1.265654 -6.91566,7.731125 -6.93366,9.781382 1.61379,-0.247815 3.56115,-1.660957 4.9803,-2.485862 1.58035,-0.905509 7.60593,-5.373029 9.29347,-6.065023 0.38587,-0.160351 5.0549,-1.531476 5.09434,-0.932948 0.0695,0.932948 -0.30784,1.137031 -0.18436,1.527188 0.22638,0.746016 1.44144,1.46545 2.02282,1.985088 1.50918,1.292237 3.21044,2.42841 4.27373,4.156252 1.49203,2.401827 1.55805,4.999163 1.98251,7.677102 0.99469,-0.111473 2.0091,-2.17545 2.55961,-2.992638 0.51278,-0.772598 2.38639,-4.071359 3.09725,-4.275442 0.67227,-0.204082 2.75511,0.958673 3.50284,1.180763 2.85973,0.848057 5.643998,1.353976 8.560318,1.353976 3.50799,0.0094 12.726,0.258104 19.55506,-4.800226 0.75545,-0.567658 2.55703,-2.731104 2.55703,-2.731104 0,0 -0.37644,-0.57709 -1.04785,-0.790605 0.89779,-0.584808 1.8659,-1.211633 1.94993,-1.925921 z"
     style="fill:#528484;fill-opacity:1"
     inkscape:connector-curvature="0"
     sodipodi:nodetypes="cccccccccccccccccccccccccccccccc" />
  <path
      d="m 68.19699,20.522295 c 0.0489,-0.44418 -0.2178,-0.896934 -1.01784,-1.415715 -0.72801,-0.47505 -1.4826,-0.932949 -2.2149,-1.401138 -1.6035,-1.02813 -3.29018,-1.969653 -4.89798,-3.079245 C 55.39553,11.384887 49.845,10.221274 44.30305,9.4752582 42.0307,9.1888572 39.49082,9.3063332 37.58119,7.900907 36.09945,6.819613 33.53126,3.072384 30.71613,1.444869 30.22993,1.154181 27.94386,0 27.94386,0 c 0,0 1.30939,3.550006 1.60951,4.264295 0.69542,1.644664 -0.38158,3.063809 -0.83262,4.642447 -0.29069,1.0418502 2.13772,0.8129002 2.26463,1.782721 0.18179,1.432007 -4.15197,1.936211 -6.59152,2.417263 -3.65634,0.715146 -7.91635,2.082842 -11.56925,0.884072 C 8.52001,12.607667 5.45192,9.8611282 2.35895,6.755302 3.79696,13.480591 7.79715,17.358159 7.97465,18.177919 8.16072,19.083427 7.51504,19.269502 6.93366,19.860313 5.64399,21.125967 0.018,27.591438 0,29.641695 1.61379,29.39388 3.56115,27.980738 4.9803,27.155833 c 1.58035,-0.905509 7.60593,-5.373029 9.29347,-6.065023 0.38587,-0.160351 5.0549,-1.531476 5.09434,-0.932948 0.0695,0.932948 -0.30784,1.137031 -0.18436,1.527188 0.22638,0.746016 1.44144,1.46545 2.02282,1.985088 1.50918,1.292237 3.21044,2.42841 4.27373,4.156252 1.49203,2.401827 1.55805,4.999163 1.98251,7.677102 0.99469,-0.111473 2.0091,-2.17545 2.55961,-2.992638 0.51278,-0.772598 2.38639,-4.071359 3.09725,-4.275442 0.67227,-0.204082 2.75511,0.958673 3.50284,1.180763 2.85973,0.848057 5.644,1.353976 8.56032,1.353976 3.50799,0.0094 12.726,0.258104 19.55505,-4.800226 0.75545,-0.567658 2.55703,-2.731104 2.55703,-2.731104 0,0 -0.37644,-0.57709 -1.04785,-0.790605 0.89779,-0.584808 1.8659,-1.211633 1.94993,-1.925921 z"
     id="fish1" />
</svg>
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
				                <a href="Deployment.php" style="text-decoration:none;display:block">Add Deployment Details</a></br>

                <a href="Retrieval.php" style="text-decoration:none;display:block">Add Retrieval Details</a>
                <!-- <a href="#careers">A</a>  -->
            </div>
        </div>
		 </div>
    <!-- End MenuBar-->

    <div style="text-align: center;">
        <h1>List Sensor Models</h1>
    </div>

    <!-- Start Bootstrap Form-->
   

<div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="updates/update_wrb_dep_data.php" >
			 <input type="hidden" id="editIndex1" name="editIndex1" />
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="row_id" id="rowId">
                    <div class="mb-3">
                        <label for="type" class="form-label">Type of Station</label>
                        <input type="text" class="form-control" id="type" name="type" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Station Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="newDeployment" class="form-label">Deployment Date</label>
                        <input type="datetime-local" class="form-control" id="ddate" name="ddate" step="1" required>
                    </div>
					<div class="mb-3">
                        <label for="sensormodel" id="sensormodel-label" class="form-label">Sensor Model</label>
                        <input type="text" class="form-control" id="smodel" name="smodel" step="1" >
                    </div>
					<div class="mb-3">
                        <label for="sensormake" id="sensormake-label" class="form-label">Sensor Make</label>
                        <input type="text" class="form-control" id="smake" name="smake" step="1" >
                    </div>
					<div class="mb-3">
                        <label for="sensortype" id="sensortype-label" class="form-label">Sensor Type</label>
                        <input type="text" class="form-control" id="stype" name="stype" step="1" >
                    </div>
                   <!-- <div class="mb-3">
                        <label for="retrieved" id="retrieved-label" class="form-label">Retrieved Date</label>
                        <input type="datetime-local" class="form-control" id="retrieved" name="retrieved" step="1" >
                    </div>
                    <div class="mb-3">
                        <label for="redeployment" class="form-label">Redeployment Date</label>
                        <input type="datetime-local" class="form-control" id="redeployment" name="redeployment" step="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="maintenance" class="form-label">Maintenance Date</label>
                        <input type="datetime-local" class="form-control" id="maintenance" name="maintenance" step="1" required>
                    </div>-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

 <div class="container">

 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="List_Details_Sensor3.php">Station (<?= $_SESSION['sname']; ?>)</a></li>
	<li class="breadcrumb-item"><a href="deploymentdates3.php">Deployment Date (<?=$_SESSION['ddate']?>)</a></li>
	
	<li class="breadcrumb-item active" aria-current="page">Sensor Models</li>
  </ol>
</nav>
   

  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
   
	
 




                    <input type="hidden" class="form-control" id= "hide1" name="hide1">           
   <table class="styled-table" style="margin-left:auto;margin-right:auto">
                                <thead>
                                    <tr>
									<!--<th style="width: 5%"></th>-->
									<th >Sensor Models</th>
									<th>Sensor Make</th>
									<th >Sensor Type</th>
									<th>Sensor Document</th>
									<th>Action</th>
									</tr>
                                </thead>
                                <tbody>
								
								<?php
                			$animals=$_SESSION['cart17'];
							 $arrLength = count($animals);
							 $i=0;
				 while($arrLength!=0)
				{
					?>
                                <tr>
                                    
						  <td >
							 									<input type="submit" id="button24" name="button24" class="btn btn-link" onclick="doalert(this);" value="<?php if(isset($_SESSION['cart17'][$i])){echo "" . $_SESSION['cart17'][$i] . "";}else{echo "Data not available";} ?>" />

							 </td>
							 
							  <td ><?php if(isset($_SESSION["cart18"][$i])){ echo "" . $_SESSION['cart18'][$i] . "";} else{echo "Data not available";}?></td>
							 <td ><?php if(isset($_SESSION["cart19"][$i])){ echo "" . $_SESSION['cart19'][$i] . "";}else{echo "Data not available";} ?></td>
							 <td style="text-align:center"> <a href="Sensor_Model_Docs/<?php if(isset($_SESSION["cart17"][$i])){echo "" . $_SESSION['cart17'][$i] . "";}else{echo "Data not available";};?>.pdf"><img src="images/PDF_file_icon.png" width="33px" height="40px"></a></td>		
							<td>
                   
					<button  class="btn btn-primary edit-btn"
							onclick="openEditModal3(<?php echo $i; ?>)" 
							type="button"
                        data-type="<?php echo $_SESSION['platform']; ?>"
                        data-name="<?php echo $_SESSION['sname']; ?>"
						data-ddate="<?php echo $_SESSION['ddate']; ?>"
                        data-model="<?php echo $_SESSION['cart17'][$i];?>"
                        data-make="<?php echo $_SESSION['cart18'][$i]; ?>"
						data-stype="<?php echo $_SESSION['cart19'][$i]; ?>">
                        Edit
                    </button>
                </td>
                                </tr>
	 <?php $arrLength--;
						 $i++;
						 } ?>
 
                                </tbody>
                            </table>
							</form>

 <?php 
	
if(isset($_POST['button24']))
{
	 // echo "<script>alert('" .$_POST['hide1'] . "')</script>"; 

	$phpVar=$_POST['hide1'];
	$_SESSION['smodel'] = 	$phpVar;


// echo "<script>alert('this is " . $_SESSION["phpVar"] . "')</script>"; 
$mysqli = new mysqli("localhost", "webser","WebSer3010", "sensor_base3");
	# check connection
	if ($mysqli->connect_errno) 
	{
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
	$smodel=$_SESSION['smodel'];
	 
		
		$sql2="SELECT b.parameter,b.unit,b.min_range,b.max_range FROM sensor_model_details a, sensor_parameter_details b where a.sensor_id=b.id and a.sensor_model=?";
		
	
		$stmt = $mysqli->prepare($sql2);
					$stmt->bind_param("s", $smodel);
					if($stmt->execute())
					{
						
						$stmt->bind_result($param,$unit,$min_range,$max_range);
							
							
							$_SESSION['cart30']=array();
							 $_SESSION['cart31']=array();
							 $_SESSION['cart32']=array();
							  $_SESSION['cart33']=array();
				 while($row=$stmt->fetch())
				 {
				
	
		 
		   array_push($_SESSION['cart30'],$param);
	array_push($_SESSION['cart31'],$unit);
	array_push($_SESSION['cart32'],$min_range);
	array_push($_SESSION['cart33'],$max_range);
		 
				 }
				

}
 echo "<script>window.location.href='tgsensorparameters3.php';</script>";  
					}
					


      ?>     
                                
                           
    
    
    <!-- End Bootstrap Form-->



   
  
</div>
<footer
          class="text-center text-lg-start text-white"
          style="background-color: #1c2331;"
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