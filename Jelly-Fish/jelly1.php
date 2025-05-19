<html>
<head>
	<title>Insitu Data Download</title>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
	
	<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.8.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>

<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	
	  <script src="https://cdn.jsdelivr.net/npm/leaflet@1.8.0/dist/leaflet.js"></script>
	  <script src="https://unpkg.com/@turf/turf/turf.min.js"></script>
<script src="leaflet.shpfile.js"></script>
	    <script src="https://d3js.org/d3.v6.min.js"></script>
		<!--<script src="https://d3js.org/d3-hexbin.v0.2.min.js"></script>-->
	  <script src="https://unpkg.com/leaflet-hexbin@0.4.0/leaflet-hexbin.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/rbush@2.0.2/rbush.min.js"></script>
	  <script src="https://unpkg.com/@turf/turf@6.5.0/turf.min.js"></script>
<script src="https://calvinmetcalf.github.io/leaflet-ajax/dist/leaflet.ajax.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/leaflet-textpath@1.2.0/leaflet.textpath.min.js"></script>
		<script src="shp.js"></script>
		<script src="js/NonTiledLayer.js"></script>
		<script src="https://unpkg.com/leaflet.graticule@0.1.0/dist/Leaflet.Graticule.min.js"></script>
		<style type="text/css">
	
.octagon {
  width: 27px;
  aspect-ratio: 1;
  --o:calc(50%*tan(-22.5deg));
  clip-path: polygon(
    var(--o) 50%,
    50% var(--o),
    calc(100% - var(--o)) 50%,
    50% calc(100% - var(--o))
  );
  //background: #3B8686;
}
		* {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
 .hexagon { stroke: #333; stroke-width: 1; fill-opacity: 0.6; }
    /* Fit body to viewport height and width */
    html, body {
	font-size: 14px;
	color: #fff;

      height: 100vh;
      width: 100vw;
      overflow: hidden; /* Disable scrollbars */
      //display: flex;
      justify-content: center; /* Center content horizontally */
      align-items: center; /* Center content vertically */
      font-family: Museo Sans Cyrl, sans-serif;
    }

    /* Example content styling */
    .content {
      text-align: center;
    }
		
		
		
		.fade-in {
  animation: fade-in 2s linear infinite;
}
@keyframes fade-in {
  from { opacity: 0; }
  to { opacity: 1; }
}
	#map {
	
    
		
		position: relative;
				font-size: 14px;
				height: 100%;
				width: 100%;
				background:#D3D3D3;
				//background:white;
				z-index:1;
				overflow:hidden;
			}
		.label-container {
            cursor: pointer;
            font-weight: bold;
            display: flex;
            align-items: center;
            user-select: none;
            margin: 10px 0;
        }

        .arrow {
            margin-right: 5px;
            transition: transform 0.3s ease;
        }

        .arrow.down {
            transform: rotate(90deg);
        }

        .nested-checkbox {
            margin-left: 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease;
        }

        .show {
            max-height: 200px; /* Adjust based on the content height */
        }
		.container1{
			//display: flex;
			
			max-width: 90%;
    margin: 0 auto;
    padding: 10px;
			margin-left: 100px;
			position:absolute;
  
   //max-width: 300px;
      //margin: 20px auto;
      //padding: 20px;
      background: rgba(0, 0, 0, 0.6); /* Black transparent background */
      border-radius: 10px; /* Curved borders */
      color: #fff;
      //font-family: Arial, sans-serif;
  
  
    //height: -webkit-fill-available;
	z-index:1000;
		}
		 @media (max-width: 600px) {
      .checkbox-container {
        max-width: 90%;
        padding: 15px;
      }
    }
		.right{
			flex: 4;
				border: 1px solid black;
			
		}
		.left{
		flex: 1;
		border: 1px solid black;
		padding:5px;
		background-color: aliceblue;
		}
		
	
.legend i {
  height: 25px;
  width: 25px;
  
  border-radius: 50%;
  display: inline-block;
}
.legend2,.legend, {
        background-color: white;
        padding: 10px;
        line-height: 18px;
        color: #555;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        z-index: 1000; /* Higher z-index to ensure it's above the map */
		margin-bottom: 230px;
    }
    .legend2 i {
        width: 18px;    /* Define width for color box */
        height: 18px;   /* Define height for color box */
        display: inline-block;
        margin-right: 8px;
        opacity: 0.9;
        border-radius: 3px;
    }
	 .legend7 { position: absolute; bottom: 30px; left: 10px; background: white; padding: 10px; z-index: 1000;  color: #555; }

  .my-div-icon  {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    font-size: 10px;
  }
  .jellyfish-container {
   
	position: fixed;
    width: 100px; /* Adjust width as needed */
    height: 100px; /* Adjust height as needed */
	padding-left:168px;
	 bottom: 0px;

  
}

.jellyfish {
    position: absolute;
   
    animation: floatUp 10s linear infinite;
}

@keyframes floatUp {
    0% {
        bottom: 0;
    }
    100% {
        bottom: 100vh;
    }
}
 #year-slider { width: 80%; 
 
//margin: 20px auto; 
margin: 49px auto;
display:none;
}




 #year-checkbox-container {
// width: 80%;
    // left: 10%;
    // height: 300px; /* Adjust height for mobile devices */
     overflow-y: auto;
     padding: 10px;



       position: absolute;
             top: 40%; /* Position it at the top of the map */
             //left: 320px; /* Add some space from the left edge */
			//margin-left: 320px;
           left: 3%;
		    width: 235px;
            //transform: translateX(-50%);
            //display: flex;
            //flex-wrap: wrap;
            //gap: 10px;
            background: rgba(0, 0, 0, 0.6); /* Black transparent background */
			 // border-radius: 10px; /* Curved borders */
       color: #fff;
            //padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            //z-index: 1000; /* High z-index to ensure it's on top */
			column-count:3; /* Number of columns */
            //column-gap: 38px;
			//overflow-y:scroll;
			height:500px;
			display:none;
			z-index:1000;
    }

    /* Style for each checkbox item */
    .checkbox-item {
        display: flex;
        align-items: center;
    }

    /* Style for checkbox color indicator */
    .checkbox-color {
        width: 18px;
        height: 18px;
        margin-right: 5px;
        border-radius: 3px;
    }





        
		span{
			color:white;
		}
		
		
		// @media (max-width: 768px) {
    // #year-checkbox-container {
        // width: 26%;
        // left: 0;
        // top: auto;
        // bottom: 10%; /* Position at bottom on smaller screens */
        // grid-template-columns: 1fr; /* Single column layout for smaller screens */
    // }
// }

// @media (min-width: 769px) and (max-width: 1200px) {
    // #year-checkbox-container {
        // grid-template-columns: repeat(2, 1fr);
        // width: 26%;
        // left: 0; /* Center horizontally */
    // }
// }
			


#year-checkbox-container::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: darkgrey;
}

#year-checkbox-container::-webkit-scrollbar
{
	width: 12px;
	background-color: grey;
}

#year-checkbox-container::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: grey;
}
#incois-logo{
	position: absolute;;
	z-index:1000;
}

.leaflet-top{
	display:none;
}
			#slideTag {
  position: fixed;
  top: 5%;
  right: -150px; /* Start off-screen */
  transform: translateY(-50%);
  padding: 10px 20px;
  background: rgba(0, 0, 0, 0.6); /* Black transparent background */
  color: white;
  font-weight: bold;
  font-size: 16px;
  border-radius: 8px 0 0 8px; /* Rounded left corner */
  cursor: pointer;
  transition: right 0.9s ease-in-out;
  white-space: nowrap; /* Prevent text wrapping */
  z-index:1000;
font-size: 30px;
font-family: serif;

}
.leaflet-bottom  {
margin-bottom: 91px;
    margin-right: 391px;
}
.leaflet-left {
left: 1302px;
    bottom: 215px;
}

 
.north-arrow {
    position: absolute;
    top: 13%; /* Adjust based on desired placement */
    right: 19%; /* Adjust based on desired placement */
    z-index: 2000;
    transform: translate(0, -50%); /* Optional: centers the element vertically */
}

@media (max-width: 768px) { /* For tablets and smaller */
    .north-arrow {
        top: 15%; /* Adjust for smaller screens */
        right: 10%;
    }
}

@media (max-width: 480px) { /* For phones */
    .north-arrow {
        top: 20%;
        right: 15%;
    }
}
		.border1{
			  top: 50%;
            left: 50%;
			transform: translate(-50%, -50%);
			border: 10px solid black;
			height:95%;
			width:78%;
			
			 position: absolute;
			 z-index: 1000;
		}



        // html, body {
    // font-size: 16px; /* Base font-size */
    // height: 100%;
    // width: 100%;
    // margin: 0;
    // overflow: hidden; /* Prevent scrolling */
// }

// /* Adjust container for smaller screens */
// .container1 {
    // max-width: 90%;
    // margin: 0 auto;
    // padding: 10px;
// }

// /* Responsive map and legend positioning */
// #map {
    // height: 100%;
    // width: 100%;
    // position: relative;
    // z-index: 1;
    // background: #a3bbff;
// }

// /* Responsive styles for year-checkbox-container */
// #year-checkbox-container {
    // width: 80%;
    // left: 10%;
    // height: 300px; /* Adjust height for mobile devices */
    // overflow-y: auto;
    // padding: 10px;
// }

@media (max-width: 600px) {
    .container1 {
        margin-left: 0;
        padding: 10px;
    }
    .jellyfish-container {
        bottom: 20px;
        left: calc(50% - 50px); /* Center horizontally */
    }
    #year-checkbox-container {
        width: 100%;
        left: 0;
    }
}

/* Medium screen adjustments */
@media (max-width: 1024px) {
    .container1 {
        width: 70%;
        padding: 15px;
    }
    #year-checkbox-container {
        height: 400px;
    }
}
		/* Style the main scale container */
.leaflet-control-scale {
    border-top: 2px solid black; /* Top border */
    border-left: 2px solid black; /* Left border */
    border-right: 2px solid black; /* Right border */
    border-bottom: none;          /* Remove bottom border */
    background: none;             /* Remove background */
    box-shadow: none;             /* Remove any default box shadow */
    padding: 0;                   /* Remove padding */
    margin-bottom: 10px;                    /* Remove margin */
}

/* Style the horizontal scale line */
.leaflet-control-scale-line {
    position: relative;
    top: -16px;          /* Move text closer to the top of the line */
    text-align: center;     /* Center-align the text */
    font-size: 12px;        /* Adjust text size */
    font-weight: bold;      /* Bold font for scale text */
    color: black;           /* Text color */
    background: none;       /* Remove background for the text */
}

/* Style the actual horizontal line */
.leaflet-control-scale-line-inner {
    background-color: black; /* Horizontal line color */
    height: 2px;             /* Horizontal line thickness */
}

/* Optional: Hide any additional box lines */
.leaflet-control-scale-line:not(.leaflet-control-scale-line-inner) {
    border: none;
}
.grid-label {
    font-size: 12px;
    color: black;
    font-weight: bold;
    background: rgba(255, 255, 255, 0.7);
    padding: 0 3px;
    border-radius: 3px;
    white-space: nowrap;
    pointer-events: none;
}
.legend,.legend6 {
	background-color:white;
	border-radius:5px;
	padding:10px;
	// margin-left: 529px;
	// margin-bottom: 119px;
	color:black;
	font-weight:600;
}
[id^="legend-checkbox"] {
	display:none;
	
}

.year-checkbox{
display:none;
	
}
			</style>
	  
	  </head>	
	  <body> 
	  <!--<div style="text-align: center; background-color: antiquewhite; color: chocolate;box-shadow: 0px 4px 5px #aaaaaa;">
		<h2>Jellyfish Distribution Information System</h2>
		
		
	</div>-->

	 <div id="map"> 
	  <!--<div class="legend7" id="legend7"></div>-->
  <!--<div id="incois-logo" ><img src="images/logo.png" style="height:100px;width:100px; border-radius:50%"></img></div>
<div id="slideTag">
  JELLY FISH OCCURRENCE PORTAL
</div>-->

<!--<div id="year-slider" style="z-index: 999;"></div>-->
 <div class="north-arrow">
        <img src="north-arrow.png" style="height:80px;width:80px" alt="north-arrow" class="north-arrow">
    </div>
	  <div class="container1">
	   <!--<div class="left">-->
	  <!--<h2></h2>-->
	
  <div>
   <div class="label-container" onclick="toggleSubCheckboxes(this)">
    <span class="arrow">&#9654;</span> <!-- Right-pointing arrow -->
              <span><a href="jelly-dashboard.php">Dashboard</a></span>
		 </div>
        <div class="label-container" onclick="toggleSubCheckboxes(this)">
            <span class="arrow">&#9654;</span> <!-- Right-pointing arrow -->
        <label for="parent1">Occurences</label>
		 </div>
        <div class="nested-checkbox" id="nested1">
		
		
			<input type="checkbox" id="cities" name="group1" onclick="exclusiveCheck(this, 'group1');makePhpCall(this, 'cities')" >
            <label for="child1-1">Cities</label><br>
            <input type="checkbox" id="tot_occur" name="group1" onclick="exclusiveCheck(this, 'group1');makePhpCall(this, 'tot_occur')" >
            <label for="child1-1">Type of Occurences</label><br>
            <input type="checkbox" id="child1-2" name="group1" onclick="exclusiveCheck(this, 'group1')">
            <label for="child1-2">Present Occurences</label><br>
            <input type="checkbox" id="child1-3" name="group1" onclick="exclusiveCheck(this, 'group1');makePhpCall(this, 'spc_occur')">
            <label for="child1-3">Species Wise Occurences</label><br>
			<!--<input type="checkbox" id="child1-4" name="group1" onclick="exclusiveCheck(this, 'group1')">
            <label for="child1-4">Type of Occurences</label><br>-->
			<input type="checkbox" id="child1-5" name="group1" onclick="exclusiveCheck(this, 'group1');makePhpCall(this, 'yearwise_occur')" >
            <label for="child1-5">Year Wise Occurences</label><br>
        </div>
    </div>

    <div>
       <div class="label-container" onclick="toggleSubCheckboxes(this)">
            <span class="arrow">&#9654;</span> <!-- Right-pointing arrow -->
        <label for="parent2">Duration</label>
		 </div>
        <div class="nested-checkbox" id="nested2">
            <input type="checkbox" id="child2-1" name="group2" onclick="exclusiveCheck(this, 'group2');makePhpCall(this, 'duration')">
            <label for="child2-1">Total No.of.Days</label><br>
            <!--<input type="checkbox" id="child2-2">
            <label for="child2-2">Species Duration</label><br>
            <input type="checkbox" id="child2-3">
            <label for="child2-3">No.of.Days in an Year</label><br>-->
        </div>
    </div>
	 <div>
       <div class="label-container" onclick="toggleSubCheckboxes(this)">
            <span class="arrow">&#9654;</span> <!-- Right-pointing arrow -->
        <label for="parent3">Frequency</label>
		 </div>
        <div class="nested-checkbox" id="nested2">
            <input type="checkbox" id="child3-1" name="group3" onclick="exclusiveCheck(this, 'group3');makePhpCall(this, 'frequency')">
            <label for="child3-1">Frequency of Occurrences by Area</label><br>
            <!--<input type="checkbox" id="child3-2" name="group3" onclick="exclusiveCheck(this, 'group3')">
            <label for="child3-2">Child 3-2</label><br>
            <input type="checkbox" id="child3-3" name="group3" onclick="exclusiveCheck(this, 'group3')">
            <label for="child3-3">Child 3-3</label><br>-->
        </div>
    </div>
	 <div>
        <div class="label-container" onclick="toggleSubCheckboxes(this)">
            <span class="arrow">&#9654;</span> <!-- Right-pointing arrow -->
        <label for="parent4">Jellyfish Probability</label>
		 </div>
        <div class="nested-checkbox" id="nested2" >
            <input type="checkbox" id="winter" name="group4" onclick="exclusiveCheck(this, 'group4');makePhpCall(this, 'winter')">
            <label for="child4-1">Winter</label><br>
            <input type="checkbox" id="summer" name="group4" onclick="exclusiveCheck(this, 'group4');makePhpCall(this, 'summer')">
            <label for="child4-2">Summer</label><br>
            <input type="checkbox" id="monsoon" name="group4" onclick="exclusiveCheck(this, 'group4');makePhpCall(this, 'monsoon')">
            <label for="child4-3">Monsoon</label><br>
			<input type="checkbox" id="post-monsoon" name="group4" onclick="exclusiveCheck(this, 'group4');makePhpCall(this, 'post-monsoon')">
            <label for="child4-3">Post-monsoon</label><br>
        </div>
    </div>
 <!--<div class="jellyfish-container">
        <img src="jellyfish.gif" alt="Jellyfish" class="jellyfish">
    </div>-->
	
	
	
<!--</div>-->
    
         <!--<div class="right">-->
	 
	 
	  
	  <!--</div>-->
	  
	  </div>
	  
	  <div id="year-checkbox-container" >
	  
	  </div>
	  <!-- <div id="legend4">
    <h4>Occurrences Count</h4>
    <div><span style="background-color: #FF0000;">&nbsp;&nbsp;&nbsp;&nbsp;</span> High (50+)</div>
    <div><span style="background-color: #FFA500;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Medium (20-49)</div>
    <div><span style="background-color: #FFFF00;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Low (1-19)</div>
    <div><span style="background-color: #A9A9A9;">&nbsp;&nbsp;&nbsp;&nbsp;</span> None (0)</div>
</div>-->
   <!-- <div class="border1">   </div>-->
	  </div>  
	 
	 
	 
	<script>

	// var m = L.map('map', {
  // center: [18, 78],
  // zoom: 6,
  // minZoom: 5, // Prevent zooming out too far
  // maxBounds: bounds, // Restrict panning to the specified bounds
  // maxBoundsViscosity: 1.0 // Makes it harder to move outside bounds
// });
// // Prevent zooming out beyond the minZoom level
// m.on('zoomend', function () {
  // if (m.getZoom() < m.options.minZoom) {
    // m.setZoom(m.options.minZoom);
  // }
// });



			// var southWest = new L.LatLng(-45,15),northEast = new L.LatLng(30,120),
					
			 // bounds = new L.LatLngBounds(southWest, northEast);
			
			// // Keep the map within the specified bounds when dragging
			// m.on('drag', function() {
				// m.panInsideBounds(bounds, { animate: true });
			// });
			
						const openStreetMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors',
        transparent: true,
    });

    const topoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        maxZoom: 17,
        attribution: '© OpenTopoMap contributors',
		 transparent: true,
    });
	
	const cartoLight = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors, © CARTO',
});
const cartoDark = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors, © CARTO',
});

const esriWorldStreetMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
    maxZoom: 20,
    attribution: '© Esri, HERE, Garmin, FAO, NOAA, USGS, © OpenStreetMap contributors',
});
const usgsImagery = L.tileLayer('https://basemap.nationalmap.gov/ArcGIS/rest/services/USGSImageryOnly/MapServer/tile/{z}/{y}/{x}', {
    maxZoom: 16,
    attribution: 'USGS Imagery',
});
const esriWorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
	maxZoom: 16,
    attribution: '© Esri & the GIS User Community',
});


var baseMaps = {
    "OpenStreetMap": openStreetMap,
    "TopoMap": topoMap,
    "Carto Light": cartoLight,
    "Carto Dark": cartoDark,
    "ESRI World Street Map": esriWorldStreetMap,
    "USGS Imagery": usgsImagery,
    "ESRI World Imagery": esriWorldImagery,
};

			
	var center = [15, 78]; // Define the center of the map
var zoomLevel = 6; // Default zoom level
var minZoomLevel = 6; // Minimum zoom level to restrict zooming out

var m = L.map('map', {
  center: center,
  zoom: zoomLevel,
  minZoom: minZoomLevel, // Restrict zoom out
  maxBoundsViscosity: 1.0, // Ensure smooth enforcement of bounds
   //layers: [esriWorldStreetMap]
});
L.control.layers(baseMaps).addTo(m);
// Calculate bounds dynamically based on the center position
// var southWest = L.latLng(center[0] - 10, center[1] - 10); // Adjust these offsets as needed
// var northEast = L.latLng(center[0] + 10, center[1] + 10); // Adjust these offsets as needed
var southWest = L.latLng(center[0] - 10, center[1] - 10); // Adjust these offsets as needed
var northEast = L.latLng(center[0] + 10, center[1] + 10); // Adjust these offsets as needed
	// const southWest = L.latLng(-66, 24);
      // const northEast = L.latLng(24, 94);


var bounds = L.latLngBounds(southWest, northEast);

// Restrict map bounds to prevent excessive panning
m.setMaxBounds(bounds);

// Prevent zooming out beyond the minimum zoom level
m.on('zoomend', function () {
  if (m.getZoom() < minZoomLevel) {
    m.setZoom(minZoomLevel);
  }
});

// Ensure the map stays within bounds when dragging
m.on('drag', function () {
  m.panInsideBounds(bounds, { animate: true });
});		
			
			// var shpfile = new L.Shapefile('India_shapefile1.zip', {
			// style : function(feature) { return {weight: 1,
      // fillOpacity: 0.5, // Adjust fill opacity as needed
      // color: 'black', // Border color
      // fillColor: 'white' }},
			// // onEachFeature: function(feature, layer) {
				// // if (feature.properties) {
					// // layer.bindPopup(Object.keys(feature.properties).map(function(k) {
						// // if(k=='CNTRY_NAME')
						// // return 'Name' + ": " + feature.properties[k];
					// // }).join("<br />"), {
						// // maxHeight: 200
					// // });
					// // //layer.unbindPopup();
				// // }
			// // }
		// });
		// shpfile.addTo(m);
		// shpfile.once("data:loaded", function() {
			// console.log("finished loaded shapefile");
		// });		

   shp("India_shapefile1.zip").then(function (geojson) {
      L.geoJSON(geojson, {
        style: {
          color: "black",        // Border line
          weight: 1,
          fillColor: "white",     // Land = grey
          fillOpacity: 0.8
        }
      }).addTo(m);		
   });

	L.control.scale({
    position: 'bottomright', // Position of the scale control
    metric: true,            // Display metric units (kilometers/meters)
    imperial: false          // Hide imperial units (miles/feet)
}).addTo(m);	


var southWest1 = L.latLng(center[0] - 9.0, center[1] - 12); // Adjust these offsets as needed
var northEast1 = L.latLng(center[0] + 9.2, center[1] + 16); 

var bounds1 = L.latLngBounds(southWest1, northEast1);

//L.rectangle(bounds1, { color: 'black', weight: 8, fillOpacity: 0 }).addTo(m);

// Add latitude and longitude labels along the border
function addBorderLabels(map, bounds1, interval) {
    var south = bounds1.getSouth();
    var north = bounds1.getNorth();
    var west = bounds1.getWest();
    var east = bounds1.getEast();

    // Add latitude labels (west and east borders)
for (var lat = bounds1.getSouth(); lat <= bounds1.getNorth(); lat += 2) {
    L.polyline([
        [lat, bounds1.getWest()],
        [lat, bounds1.getEast()]
    ], {color: 'gray',
        weight: 2,
        //opacity: 0.5
		}).addTo(m);
}
for (var lng = bounds1.getWest(); lng <= bounds1.getEast(); lng += 2) {
    L.polyline([
        [bounds1.getSouth(), lng],
        [bounds1.getNorth(), lng]
    ], {color: 'gray',
        weight: 2,
        //opacity: 0.5
		}).addTo(m);
}
// L.marker([lat, bounds1.getWest() - 0.4], {
    // icon: L.divIcon({
        // className: 'grid-label',
        // html: lat.toFixed(1) + '°',
        // iconSize: [0, 0],
        // iconAnchor: [10, 0]  // position right of marker
    // })
// }).addTo(m);
//const offset = 0;

// Lat labels (west and east)
for (let lat = bounds1.getSouth(); lat <= bounds1.getNorth(); lat += 2) {
    // west side
    L.marker([lat, bounds1.getWest() - 1.2], {
        icon: L.divIcon({
            className: 'grid-label',
            html: lat.toFixed(1) + ' ° N',
            iconSize: [0, 0],
            iconAnchor: [0, 0]
        })
    }).addTo(m);

    // east side
    L.marker([lat, bounds1.getEast()+0.1], {
        icon: L.divIcon({
            className: 'grid-label',
            html: lat.toFixed(1) + ' ° N',
            iconSize: [0, 0],
            iconAnchor: [0, 0]
        })
    }).addTo(m);
}

// Lng labels (north and south)
for (let lng = bounds1.getWest(); lng <= bounds1.getEast(); lng += 2) {
    // north side
    L.marker([bounds1.getNorth()+0.5, lng], {
        icon: L.divIcon({
            className: 'grid-label',
            html: lng.toFixed(1) + ' ° E',
            iconSize: [0, 0],
            iconAnchor: [0, 0]
        })
    }).addTo(m);

    // south side
    L.marker([bounds1.getSouth()-0.3, lng], {
        icon: L.divIcon({
            className: 'grid-label',
            html: lng.toFixed(1) + ' ° E',
            iconSize: [0, 0],
            iconAnchor: [0, 0]
        })
    }).addTo(m);
}
   // Add longitude labels (north and south borders)
    // for (var lng = west; lng <= east; lng += interval) {
        // // Draw a small line on the north side
        // L.polyline(
            // [[north - 0.3, lng], [north + 0.1, lng]],
            // { color: 'black', weight: 1 }
        // ).addTo(map);

        // // Add longitude label on the north side
        // L.marker([north, lng], {
            // icon: L.divIcon({
                // className: 'grid-label',
                // html: lng.toFixed(1) + '°',
                // iconSize: [0, 0],
                // iconAnchor: [0, -15] // Position label slightly above
            // })
        // }).addTo(map);

        // // Draw a small line on the south side
        // L.polyline(
            // [[south - 0.1, lng], [south + 0.3, lng]],
            // { color: 'black', weight: 1 }
        // ).addTo(map);

        // // Add longitude label on the south side
        // L.marker([south, lng], {
            // icon: L.divIcon({
                // className: 'grid-label',
                // html: lng.toFixed(1) + '°',
                // iconSize: [0, 0],
                // iconAnchor: [0, 20] // Position label slightly below
            // })
        // }).addTo(map);
    // }
}

// Add border labels with an interval of 2°
addBorderLabels(m, bounds1, 2);
// Outer polygon covering the whole world (or large enough area)
var outer = [
    [90, -180],
    [90, 180],
    [-90, 180],
    [-90, -180],
    [90, -180] // close polygon
];

var inner = [
    [bounds1.getNorth(), bounds1.getWest()],
    [bounds1.getNorth(), bounds1.getEast()],
    [bounds1.getSouth(), bounds1.getEast()],
    [bounds1.getSouth(), bounds1.getWest()],
    [bounds1.getNorth(), bounds1.getWest()]  // close polygon
];


// Create polygon with hole: outer polygon with inner hole
L.polygon([outer, inner], {
    color: '#fff',
    fillColor: '#fff',
    fillOpacity: 1,
    stroke: false
}).addTo(m);

			
			// L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		// attribution: ''
	// }).addTo(m);
	
	// L.tileLayer('https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.{ext}', {
	
	// attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	// ext: 'png'
// }).addTo(m);
	
	window.addEventListener("load", function() {
  // document.getElementById("slideTag").style.right = "0px";
});
	var mooredIconprop = L.Icon.extend({
		options: {
		   
			iconSize:     [25, 25],
		   
			iconAnchor:   [12.5, 12.5],
		   
			popupAnchor:  [-3, -76]
		}
	});
	
	
	var greenIcon = L.icon({
    iconUrl: 'images/Jellyfish.png',
    //shadowUrl: 'leaf-shadow.png',

    iconSize:     [38, 95], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

const baseJellyfishImage = 'images/Jellyfish.png'; 
	let jellyfishLayerGroup = L.layerGroup().addTo(m);
	let geoJsonLayer=L.layerGroup().addTo(m);
	
	
	
	var colorMap = {};

// Generate a distinct color for each year using a predefined color palette
var colors = [
    '#FF5733', '#33FF57', '#3357FF', '#FF33A8', '#33FFF5', '#F5FF33', '#FF6F61', '#6B5B95', '#88B04B',
    '#F7CAC9', '#92A8D1', '#955251', '#B565A7', '#009B77', '#DD4124', '#D65076', '#45B8AC', '#EFC050',
    '#5B5EA6', '#9B2335', '#DFCFBE', '#55B4B0', '#E15D44', '#7FCDCD', '#BC243C', '#C3447A', '#98B4D4',
    '#F4A460', '#00CED1', '#DA70D6', '#FF8C00', '#8A2BE2', '#D2691E', '#4B0082', '#00FA9A', '#FFD700',
    '#DC143C', '#9932CC', '#FF4500', '#B22222', '#228B22', '#8B4513', '#9ACD32', '#00FF7F', '#FF69B4',
    '#CD5C5C', '#7FFF00', '#8FBC8F', '#FF6347', '#40E0D0', '#FFA07A'
];


// Fetch all jellyfish data for all years
  let allJellyfishMarkers = [];
var jellyfishData = {}; // Object to store data grouped by year
var jellyfishData1 = {};
 var yearToOccurrenceMap={};
 let gridCells = [];
 let legend7 = L.control({ position: 'bottomleft' });
 
 
	
// Function to create fancy checkboxes for each year
function createYearCheckboxes(years,yearToOccurrenceMap) {
	 // var checkboxContainer1 = document.getElementById('year-checkbox-container1');
	  // checkboxContainer1.innerHTML = '<h6>Yearly Occurrences</h6>'; // Clear any existing checkboxes
    var checkboxContainer = document.getElementById('year-checkbox-container');
    checkboxContainer.innerHTML = '<h6>Year-Wise Occurrences</h6><br>'; // Clear any existing checkboxes
checkboxContainer.style.zIndex="1000";
    // Create "Select All" checkbox
    
	 
	  //selectAllCheckbox.checked = true; // Check the "Select All" checkbox
		   
	 

    console.log('Creating checkboxes for years:', years);
console.log('Creating checkboxes for years:', yearToOccurrenceMap);	// Debugging: log the years being used for checkboxes
	
	 
const occurrences = ['beach strand', 'swarming'];
occurrences.forEach(occurrence => {
    const occurrenceDiv = document.createElement('div');
    const occurrenceCheckbox = document.createElement('input');
    occurrenceCheckbox.type = 'checkbox';
    occurrenceCheckbox.id = occurrence + '-checkbox';

    occurrenceCheckbox.addEventListener('change', function () {
        const yearCheckboxes = document.querySelectorAll('input[type="checkbox"].year-checkbox');
        yearCheckboxes.forEach(checkbox => {
            const year = checkbox.value;
            if (yearToOccurrenceMap[year].includes(occurrence)) {
                if (this.checked) {
                    checkbox.checked = true;
                    displayJellyfishData(year, occurrence); // Display only relevant data
                } else {
                    removeJellyfishData(year); // Remove data for the year when unchecked
                    checkbox.checked = false;
                }
            }
        });
    });

    const occurrenceLabel = document.createElement('label');
    occurrenceLabel.htmlFor = occurrence + '-checkbox';
    occurrenceLabel.textContent = occurrence.charAt(0).toUpperCase() + occurrence.slice(1);
    occurrenceDiv.appendChild(occurrenceCheckbox);
    occurrenceDiv.appendChild(occurrenceLabel);
    checkboxContainer.appendChild(occurrenceDiv);
});
	
	
	 var selectAllCheckbox = document.createElement('input');
     selectAllCheckbox.type = 'checkbox';
     selectAllCheckbox.id = 'select-all';
    // selectAllCheckbox.addEventListener('change', function () {
        // var checkboxes = document.querySelectorAll('input[type="checkbox"].year-checkbox');
        // checkboxes.forEach(checkbox => {
            // checkbox.checked = this.checked; // Check or uncheck all based on "Select All" checkbox state
            // checkbox.dispatchEvent(new Event('change')); // Trigger change event for each checkbox
        // });
    // });

     var selectAllLabel = document.createElement('label');
     selectAllLabel.textContent = 'Select All';
     selectAllLabel.appendChild(selectAllCheckbox);
    
     checkboxContainer.appendChild(selectAllLabel); // Add "Select All" checkbox to the container

    years.forEach(year1 => {
        var checkboxItem = document.createElement('div');
        checkboxItem.className = 'checkbox-item';

        var checkboxColor = document.createElement('div');
        checkboxColor.className = 'checkbox-color';
        checkboxColor.style.backgroundColor = colorMap[year1];

        var checkboxLabel = document.createElement('label');
        checkboxLabel.textContent = year1;

        var checkboxInput = document.createElement('input');
        checkboxInput.type = 'checkbox';
        checkboxInput.value = year1;
        checkboxInput.className = 'year-checkbox'; // Add a class for easier selection
        checkboxInput.style.marginRight = '5px';
		//checkboxInput.checked = true;
		 //displayJellyfishData(year);
		 
		 
		 selectAllCheckbox.addEventListener('change', function () {
            if (this.checked) {
                displayJellyfishData(year1);
				checkboxInput.checked=true;
            } else {
				checkboxInput.checked=false;
				//jellyfishLayerGroup.clearLayers();
                removeJellyfishData(year1);
				
            }
            // Update "Select All" checkbox state based on individual checkbox states
            // updateSelectAllCheckbox();
        });
		 // if(selectAllCheckbox.checked==false){
			      // removeJellyfishData(year);
		   // }
			   
		 
          //selectAllCheckbox.dispatchEvent(new Event('change')); // Trigger the change event
        checkboxInput.addEventListener('change', function () {
            if (this.checked) {
                displayJellyfishData(year1);
            } else {
				selectAllCheckbox.checked = false;
                removeJellyfishData(year1);
				
            }
            // Update "Select All" checkbox state based on individual checkbox states
            // updateSelectAllCheckbox();
        });

        checkboxItem.appendChild(checkboxInput);
        checkboxItem.appendChild(checkboxColor);
        checkboxItem.appendChild(checkboxLabel);
        checkboxContainer.appendChild(checkboxItem);
    });
	
	
        
}



function updateSelectAllCheckbox() {
    const yearCheckboxes = document.querySelectorAll('input[type="checkbox"].year-checkbox');
    const selectAllCheckbox = document.getElementById('select-all');
    const allChecked = Array.from(yearCheckboxes).every(checkbox => checkbox.checked);
    selectAllCheckbox.checked = allChecked;
}


function displayJellyfishData(year1, occurrenceType = null) {
    if (jellyfishData[year1]) {
        jellyfishData[year1].forEach(location => {
            const { latitude, longitude, year, species_name, state, type_of_occurence } = location;

            // Only display if the occurrence matches or if no occurrenceType filter is provided
            if (!occurrenceType || type_of_occurence === occurrenceType) {
                createColoredIcon(baseJellyfishImage, colorMap[year1], (icon) => {
                    const marker = L.marker([latitude, longitude], { icon }).bindPopup(`
                        Year: ${year}<br>
                        Type of Occurrence: ${type_of_occurence}<br>
                        Species Name: ${species_name}<br>
                        State: ${state}`);
                    
                    location.marker = marker; // Store marker in the location object
                    marker.addTo(jellyfishLayerGroup); // Add marker to the map
                });
            }
        });
    }
}



// Function to remove jellyfish data for the deselected year
function removeJellyfishData(year) {
	
    if (jellyfishData[year]) {
        jellyfishData[year].forEach(location => {
            if (location.marker) {
                jellyfishLayerGroup.removeLayer(location.marker); // Remove the specific marker from the layer group
            }
        });
    }
}




    



function createColoredIcon(baseImage, color, callback) {
    const img = new Image();
    img.src = baseImage;
    img.onload = function () {
        const canvas = document.createElement('canvas');
        canvas.width = img.width;
        canvas.height = img.height;
        const ctx = canvas.getContext('2d');

        ctx.drawImage(img, 0, 0);
        ctx.globalCompositeOperation = 'source-atop';
        ctx.fillStyle = color;
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        callback(L.icon({
            iconUrl: canvas.toDataURL(),
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15]
        }));
    };
}


	  function toggleSubCheckboxes(labelContainer) {
            // Collapse any expanded section and reset arrows
            const allLabels = document.querySelectorAll('.label-container');
            allLabels.forEach(label => {
                const arrow = label.querySelector('.arrow');
                const nestedDiv = label.nextElementSibling;
                
                if (label !== labelContainer) {
                    arrow.classList.remove('down');
                    nestedDiv.classList.remove('show');
                    // Uncheck child checkboxes when collapsing
                    const childCheckboxes = nestedDiv.querySelectorAll('input[type="checkbox"]');
                    childCheckboxes.forEach(child => {
                        child.checked = false;
                    });
                }
            });

            // Toggle the clicked section
            const arrow = labelContainer.querySelector('.arrow');
            const nestedDiv = labelContainer.nextElementSibling;
            const isExpanded = arrow.classList.contains('down');
            
            if (isExpanded) {
                // If already expanded, collapse it
                arrow.classList.remove('down');
                nestedDiv.classList.remove('show');
            } else {
                // Otherwise, expand it
                arrow.classList.add('down');
                nestedDiv.classList.add('show');
            }
        }
let markerLayer = L.layerGroup();

function clearMarkers() {
   for(var i = 0; i < circleMarker5.length; i++){
    this.m.removeLayer(circleMarker5[i]);
}
}
        function exclusiveCheck(checkbox, groupName) {
            // Uncheck other checkboxes within the same parent group
            const checkboxes = document.querySelectorAll(`input[name="${groupName}"]`);
            checkboxes.forEach(cb => {
                if (cb !== checkbox) {
                    cb.checked = false;
                }
            });	
			        }
					



  
	
// Fetch lat/lng data from the API

function frquency_grid()
{
fetch('api/grid.php')
  .then(response => response.json())
  .then(data => {
    if (data.status !== 'success') {
      console.error('Error fetching data:', data.message);
      return;
    }
    
    const latLngs = data.latLngs; // Array of { latitude, longitude, type_of_occurrence }
    const jellyfishData = latLngs;
    
    // Create octagonal grid
    //const bounds = m.getBounds(); // Get current bounds of the Leaflet map
	const southWest = L.latLng(-45, 15);
      const northEast = L.latLng(30, 120);
      const bounds = L.latLngBounds(southWest, northEast);
    const gridSize = 50; // Adjust grid size as needed
    //const grid = createOctagonalGrid(bounds, gridSize);
const bbox = [bounds.getWest(), bounds.getSouth(), bounds.getEast(), bounds.getNorth()];
const grid = turf.hexGrid(bbox, gridSize, { units: 'kilometers' });

    // Calculate occurrences
    grid.features.forEach(cell => {
		
  
      const occurrences = jellyfishData.filter(point =>
        turf.booleanPointInPolygon([point.longitude, point.latitude], cell)
      );
      cell.properties.count = occurrences.length; // Add count to each grid cell
	 
    });

	
    // Add grid to the map
  geoJsonLayer=L.geoJSON(grid, {
      style: feature => ({
        fillColor: getColor1(feature.properties.count),
        color: '#000000',
        weight: 1,
		opacity: 0.025, 
        fillOpacity: feature.properties.count > 0 ? 0.7 : 0
      }),
	 
	  onEachFeature: (feature, layer) => {
	   layer.on('click', () => {
      const count = feature.properties.count || 0;
      L.popup()
        .setLatLng(layer.getBounds().getCenter()) // Popup at the center of the grid cell
        .setContent(`Occurrences: ${count}`)
        .openOn(m);
    });
  }
	  
    }).addTo(m);

    // Add legend to the map
    addLegendToMap(m,grid);
  })
  .catch(err => console.error('Fetch error:', err));




// Function to get color based on count
function getColor1(count) {
  if (count > 30) return '#990000';
  if (count > 20) return '#cc0000';
  if (count > 10) return '#ff3333';
  if (count > 5) return '#ff6666';
  if (count > 1) return '#ff9999';
  return '#ffcccc'; // For counts <= 1
}

// Function to add a legend
	function addLegendToMap(m,grid) {
			  // const legend7 = L.control({ position: 'bottomleft' });
			  const sampleCell = grid.features[0];
			  const areaInMeters = turf.area(sampleCell);
			  const areaInKilometers = (areaInMeters / 1_000_000).toFixed(2); // Convert to km² and fix to 2 decimals
			  legend7.onAdd = function () {
				const div = L.DomUtil.create('div', 'info legend');
				// Define the ranges
				const grades = [1, 6, 11, 21];
				const colors = ['#ffcccc', '#ff9999', '#ff6666', '#ff3333', '#cc0000'];

				// Add header
				//div.innerHTML = `<h4>Occurrences (Each Hexagonal Grid Area: ${areaInKilometers} km²)</h4>`;
				div.innerHTML += `<h6 style="font-weight:600">Frequency of Occurrences</h6>`;

				// Loop through grades and create a label for each interval
				grades.forEach((start, index) => {
				  let end;
				  if (index < grades.length - 1) {
					end = grades[index + 1] - 1;
					div.innerHTML += `<i style="background:${colors[index]}"></i> ${start}-${end}<br>`;
				  } else {
					// Last range: 21-30 or 21+
					div.innerHTML += `<i style="background:${colors[index]}"></i> ${start}+<br>`;
				  }
				});
				
				return div;
			  };
			  legend7.addTo(m);
			}
		}
	
	
		function probability_grid(checkboxId)
		{
			fetch('api/probability_grid.php?checkboxId='+checkboxId)
			  .then(response => response.json())
			  .then(data => {
				if (data.status !== 'success') {
				  console.error('Error fetching data:', data.message);
				  return;
				}
				const latLngs = data.latLngs; // Array of { latitude, longitude, type_of_occurrence }
				const total_count=data.totallatlng;
				const jellyfishData = latLngs;
				const jellyfishData_allseasons=total_count;
				// Create octagonal grid
				const southWest = L.latLng(-45, 15);
				const northEast = L.latLng(30, 120);
				//const southWest = L.latLng(5, 68); // More west and south
				//const northEast = L.latLng(22, 105); // More east to include Andaman

				const bounds = L.latLngBounds(southWest, northEast);
				//const bounds = m.getBounds(); // Get current bounds of the Leaflet map
				const gridSize = 50; // Adjust grid size as needed
				//const grid = createOctagonalGrid(bounds, gridSize);
				const bbox = [bounds.getWest(), bounds.getSouth(), bounds.getEast(), bounds.getNorth()];
				const grid = turf.hexGrid(bbox, gridSize, { units: 'kilometers' });
				// Calculate occurrences
				let maxCount = 0;
				let  maxoccurarr = [];
				grid.features.forEach(cell => {
					const occurrences = jellyfishData.filter(point =>
					turf.booleanPointInPolygon([point.longitude, point.latitude], cell)
					);
					const occurrences2 = jellyfishData_allseasons.filter(point =>
					turf.booleanPointInPolygon([point.longitude, point.latitude], cell)
					);
					cell.properties.count = occurrences.length; // Add count to each grid cell
					cell.properties.total_count=occurrences2.length;
					
					maxoccurarr.push(cell.properties.total_count);
					
					// console.log(maxoccurarr);
					//console.log(cell.properties.count);
					//cell.properties.total_count=jellyfishData_alllatlngs.length;
					//cell.properties.total_per=Math.round((cell.properties.count/cell.properties.total_count)*100)||0;
					// if (cell.properties.count > maxCount) {
						// maxCount = cell.properties.count;
					// }
					cell.properties.occurrences = occurrences.map(point => ({
						latitude: point.latitude,
						longitude: point.longitude,
						species:point.species
					})); // Add detailed data
					
				});
				 //console.log(maxoccurarr);
				let maxValue = Math.max(...maxoccurarr);
				grid.features.forEach(cell => {
					 //console.log(maxValue);
				if (maxValue > 0 && cell.properties.total_count > 0) {
					//console.log(cell.properties.count);
					//console.log(cell.properties.total_count);
					cell.properties.total_per = Math.round(
					(cell.properties.count / cell.properties.total_count) * 
						(1 + cell.properties.total_count / maxValue) * 
						100
					) || 0;
				} else {
					cell.properties.total_per = 0;
				}
				});
				if (geoJsonLayer) {
					m.removeLayer(geoJsonLayer);
				}
				// Add grid to the map
				geoJsonLayer=L.geoJSON(grid, {
					style: feature => ({
						fillColor: getColor1(feature.properties.total_per,checkboxId),
						color: '#000000',
						weight: 1,
						opacity: 0.025, 
						fillOpacity: feature.properties.total_per > 0 ? 0.7 : 0
					}),
					noClip: true,
					onEachFeature: (feature, layer) => {
						layer.on('click', () => {
							const total_per = feature.properties.total_per || 0;
							// const total_count = feature.properties.total_count || 0;
							const occurrences = feature.properties.occurrences || []; // Array of points
							const count = feature.properties.count || 0;
							const speciesFrequency = occurrences.reduce((acc1, occ1) => {
								acc1[occ1.species] = (acc1[occ1.species] || 0) + 1;
								return acc1;
							}, {});
							const species_a = Object.entries(speciesFrequency)
							.sort(([speciesA], [speciesB]) => speciesA - speciesB) // Sort by year
							.map(([species, count]) => `${species} (${count})`);
							const center = layer.getBounds().getCenter();
							const offsetLatLng = L.latLng(center.lat - 3.0, center.lng);
							// const popupContent = `
							// <b>Weighted Probability:</b> ${total_per}%<br>
							// <b>Occurrences:</b> ${count}<br>
							// <strong>Occurrence Species:</strong>${species_a.join(', ')}
						  // `;
							const popupContent = `
							<b>Weighted Probability:</b> ${total_per}%
						  `;

							L.popup()
							.setLatLng(offsetLatLng) // Popup at the center of the grid cell
							//.setContent(`<b>Weighted Probability:</b> ${total_per}%`)
							.setContent(popupContent)
							.openOn(m);
						});
					}
				}).addTo(m);
				// Add legend to the map
				addLegendToMap(m,grid,checkboxId);
			})
			// .catch(err => console.error('Fetch error:', err));
		}

// Attach map events



// Function to get color based on count
		function getColor1(count,checkboxId) {
			if (checkboxId=='winter'){
				if (count >= 110) return '#003366';
				if (count >= 80 && count < 110) return '#004c99';   
				if (count >= 50 && count < 80) return '#0066cc';
				if (count >= 20 && count <50) return '#007fff';
				if (count >=10 && count < 30) return '#3399ff';
				if (count >= 1 && count < 10) return '#99ccff'; // For counts <= 1
			}
			if (checkboxId=='summer'){
				if (count >= 110) return '#993d00';				 

					if (count >= 80 && count < 110) return '#cc5200';
				if (count >= 50 && count < 80) return '#e66000';         
				if (count >= 20 && count <50)  return '#ff8000';
				if (count >=10 && count < 30) return '#ff9d33';
				if (count >= 1 && count < 10)	return '#ffc285'; 
			}
			if (checkboxId=='monsoon'){
		 // if (count >= 95) return '#1f1f1f';				

		  // if (count > 70) return '#2f2f2f';           
		  // if (count > 30) return '#4f4f4f';         
		  // if (count > 10) return '#808080';              
		  // if (count > 5) return '#a9a9a9';
		  // return '#d3d3d3'; // For counts <= 1
				if (count >= 110) return '#063F33';
				if (count >= 80 && count < 110) return '#0A5E4D';          
				if (count >= 50 && count < 80) return '#0D7C66';         
				if (count >= 20 && count <50) return '#389E87';              
				if (count >=10 && count < 30) return '#6EB9A4';
				if (count >= 1 && count < 10)return '#f2f2f2'; 
			}
			if (checkboxId=='post-monsoon'){
				if (count >= 110) return '#4d0099';
				if (count >= 80 && count < 110) return '#7a00cc';      
				if (count >= 50 && count < 80) return '#9933ff';         
				if (count >= 20 && count <50) return '#b266ff';              
				if (count >=10 && count < 30) return '#d1a3ff';
				if (count >= 1 && count < 10)return '#e6ccff'; 
			}
		}
		// Function to add a legend
		function addLegendToMap(m,grid,checkboxId) {
		  // const legend7 = L.control({ position: 'bottomleft' });
		  const sampleCell = grid.features[0];
		  const areaInMeters = turf.area(sampleCell);
		  const areaInKilometers = (areaInMeters / 1_000_000).toFixed(2); // Convert to km² and fix to 2 decimals
		  legend7.onAdd = function () {
			const div = L.DomUtil.create('div', 'info legend');
			const grades = [1,5, 10, 30, 70, 95];
			if (checkboxId=='winter'){
 colors1 = ['#003366', '#004c99', '#0066cc', '#007fff', '#3399ff', '#99ccff']; // High to Low (top to bottom)			
}
			if (checkboxId=='summer'){
				//colors1= ['#ffcc99', '#ffb366', '#ff9933', '#ff8000', '#e67300', '#cc6600'];
				 colors1 = ['#993d00', '#cc5200', '#e66000', '#ff8000', '#ff9d33', '#ffc285'];
			}				 
			if (checkboxId=='monsoon'){
				//colors1 = ['#d3d3d3', '#a9a9a9', '#808080', '#4f4f4f', '#2f2f2f', '#1f1f1f'];
				colors1 = ['#063F33', '#0A5E4D', '#0D7C66', '#389E87', '#6EB9A4', '#f2f2f2'];
			}
			if (checkboxId=='post-monsoon'){
				colors1 = ['#4d0099', '#7a00cc', '#9933ff', '#b266ff', '#d1a3ff', '#e6ccff'];
			}
			// Add area information to the legend
			// div.innerHTML = `<h4>Occurrences (Each Heaxagonal Grid Area: ${areaInKilometers} km²)</h4>`;
			if (checkboxId=='winter'){
			  // div.innerHTML = `<h6 style="font-weight:600">Weighted Probability of Occurrences</h6>`;
			}
			if (checkboxId=='summer'){
				// div.innerHTML = `<h6 style="font-weight:600">Weighted Probability of Occurrences</h6>`;
			}
			if (checkboxId=='monsoon'){
				// div.innerHTML = `<h6 style="font-weight:600">Weighted Probability of Occurrences</h6>`;
			}
			if (checkboxId=='post-monsoon'){
				// div.innerHTML = `<h6 style="font-weight:600">Weighted Probability of Occurrences</h6>`;
			}
			// grades.forEach((grade, index) => {
			  // const range = index === grades.length - 1
				// ? `>${grades[index]}%` // For >30
				// : `${grades[index]}-${grades[index + 1]}%`;
			  // div.innerHTML += `
				// <i style="background:${colors1[index]}"></i> ${range}<br>`;
			// });
			// return div;
	div.innerHTML += `
      <div style="display: flex; flex-direction: column; align-items: center;"><h6 style="font-weight:600">Weighted Probability of Occurrence</h6>
        <span style="font-size: 12px; margin-bottom: 5px;color:black">High</span>
        <div style="width: 20px; height: 150px; background: linear-gradient(to bottom, ${colors1.join(', ')}); border: 1px solid #ccc;"></div>
        <span style="font-size: 12px; margin-top: 5px;color:black">Low</span>
      </div>
    `;

    // Add percentage range labels next to the gradient
    // div.innerHTML += `
      // <div style="display: flex; flex-direction: column; justify-content: space-between; height: 150px; margin-left: 30px; font-size: 12px;">
        // ${grades.map((grade, index) =>
            // `<span style="margin-top: ${index === 0 ? '0' : 'auto'};">${index === grades.length - 1 ? `>${grade}%` : `${grade}%`}</span>`).join('')}
      // </div>
    // `;

    return div;
	
	
	
	
	
	
  };
  legend7.addTo(m);
}

	function createMoveEndHandler(checkboxId) {
  return function () {
    probability_grid(checkboxId);
  };
}
	
	// function handleGridUpdate(checkboxId) {
	
  // if (checkboxId=='summer'||checkboxId=='winter'||checkboxId=='monsoon'||checkboxId=='post-monsoon')
	// {
  // probability_grid(checkboxId);
	// }
	
//}
	
	
	








		
		
		
		 function makePhpCall(checkbox, checkboxId) {
			  var randomColor = function () {
  var color = '#';
  var chars = '0123456789ABCDEF'.split('');
  for (var i = 0; i< 6; i++)
  color +=chars[Math.floor(Math.random() * 16)];
  return color;
  };
    let legend = L.control({ position: "bottomleft" });
	legend.onAdd = function(m) {
  var div = L.DomUtil.create("div", "legend");
  // div.innerHTML += "<h4>Legend</h4>";
  div.innerHTML += '<table><tr><td><svg width=20 height=20> <circle cx=10 cy=10 r=8 fill=red fill-opacity=0.3 stroke=red stroke-opacity=0.5 stroke-width=1 /></svg></td><td><span style="color:black">Swarming</span></td></tr> <tr><td><svg width=20 height=20> <circle cx=10 cy=10 r=8 fill=blue fill-opacity=0.3 stroke=blue stroke-opacity=0.5 stroke-width=1 /></svg></td><td><span style="color:black">Beach Strand</span></td></tr></table>';
 
  
  

  return div;
};
    let legend55 = L.control({ position: "bottomleft" });
	legend55.onAdd = function(m) {
  var div = L.DomUtil.create("div", "legend");
  // div.innerHTML += "<h4>Legend</h4>";
  div.innerHTML += '<table>  <tr>  <td><i style="background: red"></i></td>'
  +'<td><span style="color:black">West Bengal</span></td>  </tr>   <tr>  <td><i style="background: black"></i></td>'
  +'<td><span style="color:black">Gujarat</span></td>   </tr>    <tr>  <td><i style="background: pink"></i></td>'
  +'<td><span style="color:black">Maharashtra</span></td>   </tr>    <tr>  <td><i style="background: orange"></i></td>'
  +'<td><span style="color:black">Gujarat</span></td>   </tr>    <tr>   <td><i style="background: red"></i></td>'
  +'<td><span style="color:black">Andhra Pradesh</span></td>   </tr>    <tr>  <td><i style="background: brown"></i></td>'
  +'<td><span style="color:black">Odisha</span></td>   </tr>    <tr>  <td><i style="background: blue"></i></td>'
  +'<td><span style="color:black">Andaman & Nicobar</span></td>   </tr>    <tr>  <td><i style="background: blue"></i></td>'
  +'<td><span style="color:yellow">Lakshdweep</span></td>   </tr>    <tr>  <td><i style="background: white"></i></td>'
 +'<td><span style="color:black">Tamilnadu</span></td>  </tr>  </table>';
 
  
  

  return div;
};

	 let legend2 = L.control({position: 'bottomleft'});

let legend6 = L.control({ position: 'bottomleft' });

  

   

		
            if (checkbox.checked) {
				
				
				
				geoJsonLayer.clearLayers();
				 legend7.remove();
				// console.log(checkboxId);
				  var circleMarker1=[];
				  var circleMarker11=[];
				   var circleMarker2=[];
				   var circleMarker22=[];
				    var circleMarker3=[];
				   var circleMarker4=[];
				   var circleMarker5=[];
			
			if(checkboxId=="cities")
					 {
				 var existingLegend6 = document.querySelector('.legend6');
    if (existingLegend6) {
      existingLegend6.remove();
    }		 
			  
				
	 document.getElementById("year-checkbox-container").style.display = "none";
	
						  legend2.remove();
						   markerLayer.clearLayers();
						 	   legend55.addTo(m);	
							 jellyfishLayerGroup.clearLayers();
							   
							   
				<?php
				//$var1="<script>document.writeline(checkboxId)</script>";
			
				
				
					// echo "<script>console.log(".$var1.");</script>";
		 
		$mysqli = new mysqli("localhost", "webser","WebSer3010","jellyfish_db");
		# check connection
		if ($mysqli->connect_errno) 
		{
			echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
			exit();
		}
		
		
			
			$sql_jf_latlng="SELECT state,type_of_occurence,latitude,longitude,source from jf_info order by type_of_occurence";
			$results = $mysqli->query($sql_jf_latlng);
			if($results->num_rows >= 1)
			{
				
				while($row=$results->fetch_array())
				{
					
				
					$state=$row[0];
					 //$type_of_occurence=$row[1];
					 if($state=="Andaman and Nicobar")
					 {
				
					
					$lat=$row[2];
					$lng=$row[3];
					$source=$row[4];
	   ?>
					
 circleMarker1 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
	radius:8,
    fillColor: 'blue',
    color:'blue',
    weight:1,
    opacity: 1,
    fillOpacity:1
   
}).bindPopup(`<b>Source:</b></br><?=$source?>`);
markerLayer.addLayer(circleMarker1);

		
	<?php
		
					}
				 else if($state=="Andhra Pradesh")
				 {
					 $lat=$row[2];
					$lng=$row[3];
					$source=$row[4];
	?>
				
	circleMarker2 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
	radius:8,
    fillColor: 'red',
    color:'red',
    weight:1,
    opacity: 1,
    fillOpacity:1
   
}).bindPopup(`<b>Source:</b></br><?=$source?>`);;
markerLayer.addLayer(circleMarker2);	
		
	
					<?php 
					
					}
					 else if($state=="Goa")
				 {
					 $lat=$row[2];
					$lng=$row[3];
					$source=$row[4];
	?>
				
	circleMarker3 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
	radius:8,
    fillColor: 'violet',
    color:'violet',
    weight:1,
    opacity: 1,
    fillOpacity:1
   
}).bindPopup(`<b>Source:</b></br><?=$source?>`);;
markerLayer.addLayer(circleMarker3);	
		
	
					<?php 
					
					}
					 else if($state=="Gujarat")
				 {
					 $lat=$row[2];
					$lng=$row[3];
					$source=$row[4];
	?>
				
	circleMarker4 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
	radius:8,
    fillColor: 'indigo',
    color:'indigo',
    weight:1,
    opacity: 1,
    fillOpacity:1
   
}).bindPopup(`<b>Source:</b></br><?=$source?>`);;
markerLayer.addLayer(circleMarker4);	
		
	
					<?php 
					
					}
					 else if($state=="Karnataka")
				 {
					 $lat=$row[2];
					$lng=$row[3];
					$source=$row[4];
	?>
				
	circleMarker5 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
	radius:8,
    fillColor: 'green',
    color:'green',
    weight:1,
    opacity: 1,
    fillOpacity:1
   
}).bindPopup(`<b>Source:</b></br><?=$source?>`);;
markerLayer.addLayer(circleMarker5);	
		
	
					<?php 
					
					}
					 else if($state=="Kerala")
				 {
					 $lat=$row[2];
					$lng=$row[3];
					$source=$row[4];
	?>
				
	circleMarker6 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
	radius:8,
    fillColor: 'orange',
    color:'orange',
    weight:1,
    opacity: 1,
    fillOpacity:1
   
}).bindPopup(`<b>Source:</b></br><?=$source?>`);;
markerLayer.addLayer(circleMarker6);	
		
	
					<?php 
					
					}
					 else if($state=="Lakshadweep")
				 {
					 $lat=$row[2];
					$lng=$row[3];
					$source=$row[4];
	?>
				
	circleMarker7 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
	radius:8,
    fillColor: 'yellow',
    color:'yellow',
    weight:1,
    opacity: 1,
    fillOpacity:1
   
}).bindPopup(`<b>Source:</b></br><?=$source?>`);;
markerLayer.addLayer(circleMarker7);	
		
	
					<?php 
					
					}
					 else if($state=="Maharashtra")
				 {
					 $lat=$row[2];
					$lng=$row[3];
					$source=$row[4];
	?>
				
	circleMarker8 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
	radius:8,
    fillColor: 'pink',
    color:'pink',
    weight:1,
    opacity: 1,
    fillOpacity:1
   
}).bindPopup(`<b>Source:</b></br><?=$source?>`);;
markerLayer.addLayer(circleMarker8);	
		
	
					<?php 
					
					}
					 else if($state=="Odisha")
				 {
					 $lat=$row[2];
					$lng=$row[3];
					$source=$row[4];
	?>
				
	circleMarker9 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
	radius:8,
    fillColor: 'brown',
    color:'brown',
    weight:1,
    opacity: 1,
    fillOpacity:1
   
}).bindPopup(`<b>Source:</b></br><?=$source?>`);;
markerLayer.addLayer(circleMarker9);	
		
	
					<?php 
					
					}
					 else if($state=="Tamil Nadu")
				 {
					 $lat=$row[2];
					$lng=$row[3];
					$source=$row[4];
	?>
				
	circleMarker10 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
	radius:8,
    fillColor: 'white',
    color:'white',
    weight:1,
    opacity: 1,
    fillOpacity:1
   
}).bindPopup(`<b>Source:</b></br><?=$source?>`);;
markerLayer.addLayer(circleMarker10);	
		
	
					<?php 
					
					}
					 else if($state=="West Bengal")
				 {
					 $lat=$row[2];
					$lng=$row[3];
					$source=$row[4];
	?>
				
	circleMarker11 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
	radius:8,
    fillColor: 'black',
    color:'black',
    weight:1,
    opacity: 1,
    fillOpacity:1
   
}).bindPopup(`<b>Source:</b></br><?=$source?>`);;
markerLayer.addLayer(circleMarker11);	
		
	
					<?php 
					
					}
					}
				
				 }
		

	
	 // else if($var1='yearwise_occur')
	 // {
		 // console.log('bye');
	 // }
	 
	
	
	  ?>
	

	

  //markerLayer.addLayer(circleMarker22);
markerLayer.addTo(m);
	   }
			
		
				 if(checkboxId=="tot_occur")
					 {
				 var existingLegend6 = document.querySelector('.legend6');
    if (existingLegend6) {
      existingLegend6.remove();
    }		 
			  
				
	 document.getElementById("year-checkbox-container").style.display = "none";
	
						  legend2.remove();
						   markerLayer.clearLayers();
						 	   legend.addTo(m);	
							 jellyfishLayerGroup.clearLayers();
							   
							   
				<?php
				$var1="<script>document.writeline(checkboxId)</script>";
			
				
				
					// echo "<script>console.log(".$var1.");</script>";
		 
		$mysqli = new mysqli("localhost", "webser","WebSer3010","jellyfish_db");
		# check connection
		if ($mysqli->connect_errno) 
		{
			echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
			exit();
		}
		
		
			
			$sql_jf_latlng="SELECT state,type_of_occurence,latitude,longitude from jf_info order by type_of_occurence";
			$results = $mysqli->query($sql_jf_latlng);
			if($results->num_rows >= 1)
			{
				
				while($row=$results->fetch_array())
				{
					
				
					$state=$row[0];
					 $type_of_occurence=$row[1];
					 if($type_of_occurence=="beach strand")
					 {
				
					
					$lat=$row[2];
					$lng=$row[3];
					
	   ?>
					
 circleMarker1 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
	radius:8,
    fillColor: 'blue',
    color:'blue',
    weight:1,
    opacity: 0.5,
    fillOpacity:0.3
   
});
markerLayer.addLayer(circleMarker1);

		
	<?php
		
					}
				 else if($type_of_occurence=="swarming")
				 {
					 $lat=$row[2];
					$lng=$row[3];
					
	?>
				
	circleMarker2 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
	radius:8,
    fillColor: 'red',
    color:'red',
    weight:1,
    opacity: 0.5,
    fillOpacity:0.3
   
});
markerLayer.addLayer(circleMarker2);	
		
	
					<?php 
					
					}
					}
				
				 }
		

	
	 // else if($var1='yearwise_occur')
	 // {
		 // console.log('bye');
	 // }
	 
	
	
	  ?>
	

	

  //markerLayer.addLayer(circleMarker22);
markerLayer.addTo(m);
	   }
	 else if(checkboxId=='yearwise_occur')
		 
	  {
		   var existingLegend = document.querySelector('.legend');
			  
				 var existingLegend2 = document.querySelector('.legend2');
				 var existingLegend6 = document.querySelector('.legend6');
    if (existingLegend) {
      existingLegend.remove();
    }
	
	if (existingLegend2) {
      existingLegend2.remove();
    }
	
    if (existingLegend6) {
      existingLegend6.remove();
    }		 
		   // legend2.remove();
		   // legend.remove();
		  markerLayer.clearLayers();
	jellyfishLayerGroup.clearLayers();
		  // markerLayer.clearLayers();
		  			 // legend.remove();
					 document.getElementById("year-checkbox-container").style.display = "block";
					
					 fetch('api/species-wise.php') // Replace with the actual path to your PHP file
    .then(response => response.json())
    .then(data => {
        // Organize the data by year
		 jellyfishData = {};
		 	  colorMap = {};
			    yearToOccurrenceMap = {};
        data.forEach(entry => {
            const { latitude, longitude, year,species_name,state, type_of_occurence } = entry;
			
            if (!jellyfishData[year]) {
                 jellyfishData[year] = [];
				//jellyfishData[type_of_occurence] = [];
                colorMap[year] = colors[Object.keys(colorMap).length % colors.length]; // Assign a color to the year
            }
            jellyfishData[year].push({ latitude, longitude, year,species_name,state, type_of_occurence });
			
			 if (!yearToOccurrenceMap[year]) {
                yearToOccurrenceMap[year] = [];
            }
            if (!yearToOccurrenceMap[year].includes(type_of_occurence)) {
                yearToOccurrenceMap[year].push(type_of_occurence);
            }
        });

        // Create checkboxes for the years
        createYearCheckboxes(Object.keys(jellyfishData).sort(),yearToOccurrenceMap);
		
    })
    .catch(error => console.error('Error fetching data:', error));
	 
	  }

  // <?php 
  // $mysqli = new mysqli("localhost", "webser","WebSer3010","jellyfish_db");
		// # check connection
		// if ($mysqli->connect_errno) 
		// {
			// echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
			// exit();
		// }

// $sql_jf_latlng1="SELECT YEAR(date_from),latitude,longitude FROM `jf_info` order by YEAR(date_from);";
			// $results1 = $mysqli->query($sql_jf_latlng1);
			// if($results1->num_rows >= 1)
			// {
				
				// while($row=$results1->fetch_array())
				// {
					
				
					// $year=$row[0];
					
					
					// // $ldate=$row[1];
					
					// $lat=$row[1];
					// $lng=$row[2];
					// ?>
					
					// var myIcon = L.divIcon({
  // className: 'my-div-icon',
  // html: ,
  // iconAnchor: [2, 5]
// });
			  // circleMarker3 = L.circleMarker([<?=$lat?>,<?=$lng?>], {
				 
				
		 // radius:11,
    // fillColor: randomColor(),
    // color:randomColor(),
    // weight:1,
    // opacity: 1,
    // fillOpacity:1
   
// });
// circleMarker4=L.marker([<?=$lat?>,<?=$lng?>], {
	
  // icon: myIcon
// }).addTo(m);
 
  
  // markerLayer.addLayer(circleMarker3);
 // markerLayer.addLayer(circleMarker4);
  
	// <?php 


		
				// }
				
			// }
  
  
  // ?>
		

					// markerLayer.addTo(m);
					
					
					

				
					 
					 
					  else if(checkboxId=='spc_occur')
						  {
							  var existingLegend = document.querySelector('.legend');
			  
				 var existingLegend2 = document.querySelector('.legend2');
				 var existingLegend6 = document.querySelector('.legend6');
    if (existingLegend) {
      existingLegend.remove();
    }
	
	if (existingLegend2) {
      existingLegend2.remove();
    }
	var existingLegend6 = document.querySelector('.legend6');
    if (existingLegend6) {
      existingLegend6.remove();
    }		 
							   // legend2.remove();
							   // legend.remove();
							  markerLayer.clearLayers();
	jellyfishLayerGroup.clearLayers();
							   document.getElementById("year-checkbox-container").style.display = "block";
							
							  fetch('api/species-wise.php') // Replace with the actual path to your PHP file
							  
    .then(response => response.json())
    .then(data1 => {
        // Organize the data by year
		   jellyfishData = {};
		  colorMap = {};
        data1.forEach(entry => {
            const { latitude, longitude, species_name, year,state, type_of_occurence } = entry;
			
            if (!jellyfishData[species_name]) {
                jellyfishData[species_name] = [];
                colorMap[species_name] = colors[Object.keys(colorMap).length % colors.length]; // Assign a color to the year
            }
            jellyfishData[species_name].push({ latitude, longitude, year,species_name,state, type_of_occurence });
			
			 if (!yearToOccurrenceMap[species_name]) {
                yearToOccurrenceMap[species_name] = [];
            }
            if (!yearToOccurrenceMap[species_name].includes(type_of_occurence)) {
                yearToOccurrenceMap[species_name].push(type_of_occurence);
            }
        });

        // Create checkboxes for the years
        createYearCheckboxes(Object.keys(jellyfishData).sort(),yearToOccurrenceMap);
		
    })
    .catch(error => console.error('Error fetching data:', error));
	  }
	  
	
	  else if(checkboxId=='duration'){
		   document.getElementById("year-checkbox-container").style.display = "none";
		   legend.remove();
		    var existingLegend = document.querySelector('.legend');
			   
				
    if (existingLegend) {
      existingLegend.remove();
    }
		    //legend2.remove();
							  markerLayer.clearLayers();
	jellyfishLayerGroup.clearLayers();
							   //document.getElementById("year-checkbox-container").style.display = "block";
							   //yearSlider.style.display = "block";
							   
							    fetchJellyfishDays();
		 
		  
 legend6.onAdd = function() {
        const div = L.DomUtil.create('div', 'info legend6');
        const categories = [
            // { range: "1 to 7 days", color: "#FFE4E1", radius: 5, min: 1, max: 7 },
            // { range: "8 to 15 days", color: "#FFB6C1", radius: 8, min: 8, max: 15 },
            // { range: "16 to 31 days", color: "#FF69B4", radius: 12, min: 16, max: 31 },
            // { range: "32 to 62 days", color: "#DB7093", radius: 16, min: 32, max: 62 },
            // { range: "63 to 92 days", color: "#C71585", radius: 20, min: 63, max: 92 },
            // { range: "93 to 183 days", color: "#8B0000", radius: 24, min: 93, max: 183 },
            // { range: "184 to 243 ++++++++++++++++++++++days", color: "#FF4500", radius: 28, min: 184, max: 243 },
            // { range: "244 to 366 days", color: "#FF8C00", radius: 32, min: 244, max: 366 }
			 { range: "1 week", color: "#FFE4E1", radius: 5, min: 1, max: 7 },
            { range: "2 weeks", color: "#FFB6C1", radius: 8, min: 8, max: 15 },
            { range: "1 month", color: "#FF69B4", radius: 12, min: 16, max: 31 },
            { range: "2 months", color: "#DB7093", radius: 16, min: 32, max: 62 },
            { range: "3 months", color: "#C71585", radius: 20, min: 63, max: 92 },
            { range: "6 months", color: "#FF4500", radius: 24, min: 93, max: 183 },
            { range: "8 months", color: "#FF8C00", radius: 28, min: 184, max: 243 },
            { range: "1 year", color: "#BD0026", radius: 32, min: 244, max: 367 }
        ];

        // Create legend HTML with checkboxes
        div.innerHTML += "<h6><b>Duration</b></h6>";
        categories.forEach((cat, index) => {
            div.innerHTML += `
                <div style="display: flex; align-items: center; margin-bottom: 4px;">
				<table>
				<tr>
                    <td><input type="checkbox" id="legend-checkbox-${index}"  checked
                        onchange="updateVisibleMarkers()"></td>
                  <td style="display: flex;
    justify-content: center;   
    align-items: center;width:42px"><label for="legend-checkbox-${index}" style="margin-left: 4px;">
                        <div style="
                            background-color: ${cat.color};
                            width: ${cat.radius}px;
                            height: ${cat.radius}px;
                            border-radius: 50%;
                            display: inline-block;
                            margin-right: 8px;
							
                        "></div></td>
                        <td><label style="color: black;font-weight:600">${cat.range}</label>
                    </label></td></tr></table>
                </div>`;
        });

        return div;
    };
    legend6.addTo(m);
		  
		  
		  
		  
		  
		  
	  }
	  
	   
					  
					  // <?php
						   // $mysqli = new mysqli("localhost", "webser","WebSer3010","jellyfish_db");
		// # check connection
		// if ($mysqli->connect_errno) 
		// {
			// echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
			// exit();
		// }

// $sql_jf_latlng1="SELECT YEAR(date_from),latitude,longitude FROM `jf_info` order by YEAR(date_from);";
			// $results1 = $mysqli->query($sql_jf_latlng1);
			// if($results1->num_rows >= 1)
			// {
				
				// while($row=$results1->fetch_array())
				// {
					
				
					// $year=$row[0];
					
					
					// // $ldate=$row[1];
					
					// $lat=$row[1];
					// $lng=$row[2];
					
				// }
			// }  
					  
		 
	  
				 // ?>
				 
				   else if(checkboxId=='frequency'){
					   
					   document.getElementById("year-checkbox-container").style.display = "none";
		   legend.remove();
		    var existingLegend = document.querySelector('.legend');
			  var existingLegend2 = document.querySelector('.legend2');
			
				 var existingLegend6 = document.querySelector('.legend6');
				 
    if (existingLegend) {
      existingLegend.remove();
    }
	 if (existingLegend2) {
      existingLegend2.remove();
    }
		   if (existingLegend6) {
      existingLegend6.remove();
    }
		  //legend2.remove();
							  markerLayer.clearLayers();
	jellyfishLayerGroup.clearLayers();
					   
					frquency_grid();
					   
					   
		   
	   }
	   
	    else if(checkboxId=='winter'){
			
			 probability_grid(checkboxId);

    // Attach the moveend event with the selected checkbox ID
    // m.off('moveend'); // Remove previous moveend handlers to avoid duplicates
    // m.on('moveend', createMoveEndHandler(checkboxId));
			
		}
	    else if(checkboxId=='summer'){
			
			probability_grid(checkboxId);

    // Attach the moveend event with the selected checkbox ID
    // m.off('moveend'); // Remove previous moveend handlers to avoid duplicates
    // m.on('moveend', createMoveEndHandler(checkboxId));
		}
				 else if(checkboxId=='monsoon'){
			
			probability_grid(checkboxId);

    // Attach the moveend event with the selected checkbox ID
    // m.off('moveend'); // Remove previous moveend handlers to avoid duplicates
    // m.on('moveend', createMoveEndHandler(checkboxId));
		}
		 else if(checkboxId=='post-monsoon'){
			
			probability_grid(checkboxId);

    // Attach the moveend event with the selected checkbox ID
    // m.off('moveend'); // Remove previous moveend handlers to avoid duplicates
    // m.on('moveend', createMoveEndHandler(checkboxId));
		}
				
			 }
			
			


		 
		 else{
			  gridCells = []; 
			 legend.remove();
			  var existingLegend = document.querySelector('.legend');
			   
				 var existingLegend2 = document.querySelector('.legend2');
    if (existingLegend) {
      existingLegend.remove();
    }
	
	if (existingLegend2) {
      existingLegend2.remove();
    }
	var existingLegend6 = document.querySelector('.legend6');
    if (existingLegend6) {
      existingLegend6.remove();
    }		 
	markerLayer.clearLayers();
	jellyfishLayerGroup.clearLayers();
	geoJsonLayer.clearLayers();
	document.getElementById("year-checkbox-container").style.display = "none";
		 }
		 
		 }
		
		 
// Define marker radius based on days out
function getRadius(daysout) {
    if (daysout >= 1 && daysout <= 7) return 5; // 1 week
    if (daysout >= 8 && daysout <= 15) return 8; // 2 weeks
    if (daysout >= 16 && daysout <= 31) return 12; // 1 month
    if (daysout >= 32 && daysout <= 62) return 16; // 2 months
    if (daysout >= 63 && daysout <= 92) return 20; // 3 months
    if (daysout >= 93 && daysout <= 183) return 24; // 6 months
    if (daysout >= 184 && daysout <= 243) return 28; // 8 months
    if (daysout >= 244 && daysout <= 366) return 32; // 1 year
    return 4; // default radius for cases not covered
}

// Define color based on days out (optional)
function getColor(daysout) {
    if (daysout >= 1 && daysout <= 7) return "#FFE4E1";   // Light pink for 1 week
    if (daysout >= 8 && daysout <= 15) return "#FFB6C1";  // Light pink for 2 weeks
    if (daysout >= 16 && daysout <= 31) return "#FF69B4"; // Hot pink for 1 month
    if (daysout >= 32 && daysout <= 62) return "#DB7093"; // Medium violet red for 2 months
    if (daysout >= 63 && daysout <= 92) return "#C71585"; // Red-violet for 3 months
    if (daysout >= 93 && daysout <= 183) return "#FF4500"; // Dark red for 6 months
    if (daysout >= 184 && daysout <= 243) return "#FF8C00"; // Orange-red for 8 months
    if (daysout >= 244 && daysout <= 367) return "#BD0026"; // Dark orange for 1 year
    return "#808080"; // Grey for cases not covered
}



function updateVisibleMarkers() {
    // Clear all markers from the map layer group
    jellyfishLayerGroup.clearLayers();

    // Get the categories and checkbox states
    const categories = [
        { min: 1, max: 7, checkboxId: "legend-checkbox-0" },
        { min: 8, max: 15, checkboxId: "legend-checkbox-1" },
        { min: 16, max: 31, checkboxId: "legend-checkbox-2" },
        { min: 32, max: 62, checkboxId: "legend-checkbox-3" },
        { min: 63, max: 92, checkboxId: "legend-checkbox-4" },
        { min: 93, max: 183, checkboxId: "legend-checkbox-5" },
        { min: 184, max: 243, checkboxId: "legend-checkbox-6" },
        { min: 244, max: 367, checkboxId: "legend-checkbox-7" }
    ];

    // Loop through all markers and add them based on checked checkboxes
    allJellyfishMarkers.forEach(marker => {
        const daysout = marker.options.daysout;

        // Determine if the marker should be visible
        let isVisible = false;
        categories.forEach(category => {
            const checkbox = document.getElementById(category.checkboxId);
            if (checkbox.checked && daysout >= category.min && daysout <= category.max) {
                isVisible = true;
            }
        });

        // Add marker if it matches a checked range
        if (isVisible) {
            jellyfishLayerGroup.addLayer(marker);
        }
    });
}
function fetchJellyfishDays() {
    fetch('api/duration.php')
        .then(response => response.json())
        .then(data => {
            // Clear existing markers from the map layer group
            jellyfishLayerGroup.clearLayers();

            // Loop through the data and create markers for each jellyfish location
            data.forEach(location => {
                const { latitude, longitude, daysout, state, type_of_occurence } = location;

                // Determine marker radius and color based on daysout
                const radius = getRadius(daysout/7);
                const fillColor = getColor(daysout);

                const marker=L.circleMarker([latitude, longitude], {
					daysout:daysout,
                    radius: radius,
                    fillColor: fillColor,
                    color: fillColor,
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 0.8
                })
                .bindPopup(`No. of Days of Occurrence: ${daysout}<br>State: ${state}<br>Type of Occurrence: ${type_of_occurence}`)
                 allJellyfishMarkers.push(marker);
                jellyfishLayerGroup.addLayer(marker);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
		
}



   


		 
		 
	
	
	
	
  
	</script>
	
		
	
 </body>

</html>