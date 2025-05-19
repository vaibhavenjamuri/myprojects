<?php

session_start();
 // header("Location: http://172.16.1.57/sensor_base3/deploymentdates3.php", TRUE, 301);
				// exit();

 //exit();
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

	#button22{
		
  background: none!important;
  border: none;
  padding: 0!important;
  /*optional*/
  font-family: arial, sans-serif;
  /*input has OS specific font-family*/
  color: #069;
  text-decoration: underline;
  cursor: pointer;
	}
.styled-table {
		 border: 1px solid lightgrey;
    border-collapse: collapse;
    margin: 66px 0;
	margin-left: auto; 
  margin-right: auto;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
	 position: sticky;
  top: 0;
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

.styled-table thead th {
 
}
		.filterTable td {border: 1px solid white;padding-left: 0px;}
		form { margin-bottom: 0em; }
		
	
	
        label {
            display: inline-block;
            width: 150px;
			font-weight:600;
        }

        // .form-control {
            // width: 50%
        // }
		.ocean1 {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  color: white;
  text-align: center;
  margin-top:20px;
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
            return false;
        }

       
function remove_field(id)
{
const element = document.getElementById(id+"_wrapper");
element.remove();
}

function doalert(elmt) 
{
	  var total_text=elmt.value;
	  document.getElementById("hide1").value = total_text;	
return false;

	
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
        <div class="subnav">
            <img src="incois_logo.jpg" alt="..." height="36">
   
            </div>
 <div class="subnav" style="background-color:deepskyblue">
          
           
            <a class="subnavbtn" href="List_Details_Sensor3.php" style="text-decoration: none;">List Details Sensor</a>
            </div>			            
          <div class="subnav" >
            <button class="subnavbtn">Sensor Data <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content" style="">
                <a href="Add_Sensor.php" style="text-decoration:none;display:block">Add Sensor Details</a></br>
				                <a href="Deployment2.php" style="text-decoration:none;display:block">Add Deployment Details</a></br>

                <a href="Retrieval.php" style="text-decoration:none;display:block">Add Retrieval Details</a>
               
            </div>
        </div>
		 </div>       
    <div style="text-align: center;">
        <h1>List Station Details</h1>
    </div> 
    <div class="container">
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Stations</li>
  </ol>
</nav>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="container">
        
            <div id="main" >
                
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label>Type of Station:</label>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" name="tstation" id="tstation" required>
							<option value="">Select Station Type</option>
							   <option value="Tide Guage" <?php if (isset($_POST['tstation']))echo ($_POST['tstation']=='Tide Guage'?'selected':'')?>>Tide Guage</option>
                         <option value="Wave Rider Buoy" <?php if (isset($_POST['tstation']))echo ($_POST['tstation']=='Wave Rider Buoy'?'selected':'')?>>Wave Rider Buoy</option>
								
                                <option value="Moored Buoy" <?php  if (isset($_POST['tstation']))echo($_POST['tstation']=='Moored Buoy'?'selected':'')?>>Moored Buoy</option>
								 </select>
                        </div>
						 <div class="col-md-3">
                           <input type="submit" class="btn btn-primary" name="submit">
                        </div>
                    </div>
               
            </div>			
    </div>
	
    </div>

<input type="hidden" class="form-control" id= "hide1" name="hide1">
 
  
                              
   <table class="styled-table">
                                
                			<?php		
							if(isset($_POST['submit']) && !empty($_POST['tstation']))
							{	
	$mysqli = new mysqli("localhost", "webser","WebSer3010", "sensor_base3");
	
	if ($mysqli->connect_errno) 
	{
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
	 $tstation = $_POST['tstation'];
$_SESSION['platform']=$tstation;
if ($_SESSION['platform']=="Moored Buoy"){
		$sql2 = "SELECT distinct(platform_id) from arg_mb_identification_details where type_of_station= ?";
}
else{
// else if ($_SESSION['platform']=="Tide Guage"){
$sql2 = "SELECT distinct(platform_id) from platform_identification_details where type_of_platform= ?";
}
		// else if ($_SESSION['platform']=="Wave Rider Buoy"){
// $sql2 = "SELECT distinct(station_name) from wrb_identification_details where type_of_station= ?";
// }	
		$stmt = $mysqli->prepare($sql2);
					$stmt->bind_param("s", $tstation);
					if($stmt->execute())
					{
						$stmt->bind_result($sname);						
							?>
							<thead>
                                    <tr>
									<th style="text-align: center">Station Name</th>									
									</tr>
                                </thead>
                                <tbody>
							<?php	
				 while($row=$stmt->fetch())
				 {
				
	
	
		
		  $sname=$sname;
		  
				

		?>	
                                <tr>
                                   
							<td style="text-align: center">
							<input type="submit" id="button22" name="button22" class="btn btn-link"  onclick="doalert(this);" value="<?php echo $sname; ?>" /> </td>							                      
                                </tr>
								 
<?php 
}}} ?>   
                                </tbody>
                            </table>
  </form>
<?php 
if(isset($_POST['button22']))
{
	 // echo "<script>alert('" .$_POST['hide1'] . "')</script>"; 
	$sname=$_POST['hide1'];
	 $_SESSION['sname'] = 	$sname;
// echo "<script>alert('this is " . $_SESSION["phpVar"] . "')</script>"; 
$mysqli = new mysqli("localhost", "webser","WebSer3010", "sensor_base3");
	
	if ($mysqli->connect_errno) 
	{
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
	 $tstation = $_POST['tstation'];
if ($_SESSION['platform']=="Moored Buoy"){
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
		$sql2 = "SELECT type_of_platform, platform_id,deployment_date,retrieved_drift_date from platform_identification_details where type_of_platform= ? and platform_id=? order by deployment_date desc";	
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
			    echo "<script>window.location.href='deploymentdates3.php';</script>";
				
	}

      ?>     
  
                           
    
    
   
</div>
  
<footer
          class="text-center text-lg-start text-white"
          style="background-color: #1c2331;"
          >
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      ©
      <a class="text-white" href="https://incois.gov.in/"
         >INCOIS</a
        >
    </div>
  </footer>
</body>

</html>
<?php
}
?>