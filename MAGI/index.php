<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAGI</title>
	<link rel="stylesheet" href="style2.css">
   <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.8.0/dist/leaflet.css" />
	<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    <style>
        #map { height: 87vh; height:100%}
        .blink {
			animation: blinker 1s linear infinite;
            //animation: blink-animation 1s steps(5, start) infinite;
            //-webkit-animation: blink-animation 1s steps(5, start) infinite;
        }
        // @keyframes blink-animation {
            // to {
                // visibility: hidden;
            // }
        // }
        // @-webkit-keyframes blink-animation {
            // to {
                // visibility: hidden;
            // }
        // }
		#header {
			color:darkslateblue;
  //position: fixed;
    //top: 0;
    z-index: 10;
    background-color: beige;
	//width:48%;
	font-size: 15px;
  
    //padding: 3rem 20px;
}
#main_header td:nth-of-type(2n) {
padding-right: 10px;
font-size: 24px;
}
.info.legend {
    background: white;
    padding: 10px;
    font-size: 14px;
    color: #333;
    border-radius: 5px;
    border: 1px solid #ccc;
    line-height: 18px;
}

.info.legend i {
    width: 18px;
    height: 18px;
    float: left;
    margin-right: 8px;
    opacity: 0.7;
}
.info.legend i.blinking {
    background: red;
    animation: blinker 1s linear infinite;
}

@keyframes blinker {
    50% {
        opacity: 0;
    }
}	
#platforms_radio_buttons{
font-size: 13px;
}	
#header2{
	text-align:center;
	font-size: 19px;
	font-weight:600;
}
    </style>
</head>
<body>
 
 <div class="container">
    <div class="frame frame1">
       <div id="map" class="map">
	     </div>
	  <!-- <table id="legend" style="width: 100%;">
		  <tr >
		  
		  <td>
		 
<img src="images\traingle_green.png"  style="width:25px;height:30px;">
</td>
<td >Tide Guage</td>

<td>
  
<img src="images\rhombus_green.png"  style="width:25px;height:40px;">
</td>
<td>Wave Rider Buoy</td></tr>
<tr>
<td>
<svg height="30" width="30" xmlns="http://www.w3.org/2000/svg">
  <circle fill="green" opacity="1" stroke="none" cx="16" cy="16" r="13" fill-opacity="40%" />
   
  </circle>
</svg></td>
<td>Moored Buoy</td>
<td>
<svg height="30" width="30" xmlns="http://www.w3.org/2000/svg">
  <circle fill="red" opacity="1" stroke="none" cx="16" cy="16" r="13" fill-opacity="40%" />
    <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.1" />
  </circle>
</svg></td>
<td>Stopped reporting for over 24 hours</td></tr>
</table>-->
	 
         
		  

    </div>
    <div class="frame frame2" >
      <!-- Content for frame2 -->
	  <div id="header">
	 
  </div></br>
    <div id="header2">
	 
  </div>
  <div id="platforms_radio_buttons">
	 
  </div></br>
  </br></br></br>
	  
	  <div id="info-container">
	 
  </div>
  <div id="report1">
	 
  </div>
	    <div id="info-container1">
	 
  </div>
	  
     <div id="info-container2">
	 
  </div>
   <div id="info-container3">
	 
  </div>
   <div id="info-container4">
	 
  </div>
   <div id="info-container5">
	 
  </div>
   <div id="info-container6">
	 
  </div>
   <div id="info-container7">
	 
  </div>
   <div id="info-container8">
	 
  </div>
    </div>
	  <!--<div class="frame frame3" >
	 
	  </div>-->
	 
  </div>
    
    
	
   <!--<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>-->
	 <script src="https://cdn.jsdelivr.net/npm/leaflet@1.8.0/dist/leaflet.js"></script>
	<!--<script src="data.js"></script>-->
		
    <script src="script2.js"></script>
	
</body>
</html>
