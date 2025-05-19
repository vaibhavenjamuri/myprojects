	
	
// Initialize Leaflet map

// var map = L.map('map', {center: [14, 80],zoom:6,minZoom: 5});
		// var southWest = new L.LatLng(-45,15),northEast = new L.LatLng(30,120),
				// //var southWest = new L.LatLng(-45,15),northEast = new L.LatLng(50,100),
		// bounds = new L.LatLngBounds(southWest, northEast);
		// //m.fitBounds(bounds);
		// map.on('drag', function() {
			// map.panInsideBounds(bounds, { animate: true });
		// });
		
		
	var center = [15, 78]; // Define the center of the map
var zoomLevel = 5 ; // Default zoom level
var minZoomLevel = 5; // Minimum zoom level to restrict zooming out

var map = L.map('map', {
  center: center,
  zoom: zoomLevel,
  //minZoom: minZoomLevel, // Restrict zoom out
  maxBoundsViscosity: 1.0 // Ensure smooth enforcement of bounds
});

// Calculate bounds dynamically based on the center position
var southWest = L.latLng(center[0] - 30, center[1] - 25); // Adjust these offsets as needed
var northEast = L.latLng(center[0] + 15 , center[1] + 25); // Adjust these offsets as needed
var bounds = L.latLngBounds(southWest, northEast);

// Restrict map bounds to prevent excessive panning
map.setMaxBounds(bounds);

//Prevent zooming out beyond the minimum zoom level
map.on('zoomend', function () {
  if (map.getZoom() < minZoomLevel) {
    map.setZoom(minZoomLevel);
  }
});

// Ensure the map stays within bounds when dragging
map.on('drag', function () {
  map.panInsideBounds(bounds, { animate: true });
});		


					

// Define bounds for India excluding Jammu and Kashmir
// const legend = L.control({ position: "topright" });

// legend.onAdd = function () {
  // // let div = L.DomUtil.create("div", "description");
		 // var c3 = L.DomUtil.create('div','sidebar');
		   
		 // c3.innerHTML="<form  method='post' id='dateForm'><label>Date Range</label></br><label>Start Date </label><input type='date'  id='start_date' name='start_date' /></br><label>End Date </label> <input type='date' id='end_date' name='end_date' /><input type='submit' name='submit'  value='Submit' /></form>";
	


   
  // return c3;
// };


// legend.addTo(map);

var color_legend = L.control({ position: 'bottomright' });

color_legend.onAdd = function () {
    var div = L.DomUtil.create('div', 'info legend');
    var labels = [
        "<i style='background: green'></i> Reporting",
        "<i style='background: yellow'></i> Not Reporting",
        "<i style='background: red'></i> Retrieved",
		"<i class='blinking'></i> Stopped Reporting (24 hrs)"
    ];

    //div.innerHTML = "<strong>Legend</strong><br>" + labels.join('<br>');
   div.innerHTML = labels.join('<br>');
   return div;
};

color_legend.addTo(map);

var layerGroup1 = L.layerGroup().addTo(map);
var layerGroup2 = L.layerGroup().addTo(map);
var layerGroup3 = L.layerGroup().addTo(map);
var layerGroup4 = L.layerGroup().addTo(map);
var layerGroup5 = L.layerGroup().addTo(map);
var layerGroup6 = L.layerGroup().addTo(map);
var layerGroup7 = L.layerGroup().addTo(map);
// var overlay = {
// 'Tide Guage': layerGroup1,
// 'Wave Rider Buoy': layerGroup2,
// 'Moored Buoy':layerGroup3,
// 'Coastal HF Radar':layerGroup4,
// 'Tsunami Buoy':layerGroup5
// };
var overlay = {
    //'<img src="path/to/icon1.png" style="width: 16px; height: 16px; vertical-align: middle;"> Tide Gauge': layerGroup1,
	'<img src="images/itriangle.png"  style="width: 16px; height: 16px; vertical-align: middle;"> Tide Gauge': layerGroup1,
     '<img src="images/rhombus.png" style="width: 16px; height: 16px; vertical-align: middle;"> Wave Rider Buoy': layerGroup2,
   '<img src="images/circle.png" style="width: 16px; height: 16px; vertical-align: middle;"> Moored Buoy': layerGroup3,
    '<img src="images/radar.png" style="width: 16px; height: 16px; vertical-align: middle;"> Coastal HF Radar': layerGroup4,
     '<img src="images/star.png" style="width: 16px; height: 16px; vertical-align: middle;"> Tsunami Buoy': layerGroup5,
	 '<img src="images/star-burst.jpg" style="width: 16px; height: 16px; vertical-align: middle;"> Drifting Buoy': layerGroup6,
	 '<img src="images/plus.png" style="width: 16px; height: 16px; vertical-align: middle;"> Ship Mounted AWS': layerGroup7
};
	 L.control.layers(null,overlay).addTo(map);

L.HtmlIcon = L.Icon.extend({
	options: {
		/*
		html: (String) (required)
		iconAnchor: (Point)
		popupAnchor: (Point)
		*/
	},

	initialize: function (options) {
		L.Util.setOptions(this, options);
	},

	createIcon: function () {
		var div = document.createElement('div');
		div.innerHTML = this.options.html;
		return div;
	},

	createShadow: function () {
		return null;
	}
});



const HTMLIcon = L.HtmlIcon.extend({
    options : {
        html : "<div class=\"map__marker\"></div>",
    }
});
// Add base map layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

var tideIconprop = L.Icon.extend({
    options: {
       
        iconSize:     [25, 30],
       
       
    }
});
var wrbIconprop = L.Icon.extend({
    options: {
       
        iconSize:     [32, 43],
       
       
    }
});


function mbgraph(pid)
			{
			$.colorbox ({
								href:   "graphs/mb_graphs/mbgraph.html?pid="+pid,
								open:   true,
								iframe: true,
								left: "2px",
								width:  "100%",
								height: "100%"
							});	
			}

var tideIcon1 = new tideIconprop({iconUrl: 'images/traingle_green.png'});
var tideIcon2 = new tideIconprop({iconUrl: 'images/traingle_red.png',className: 'blink'});
var tideIcon4 = new tideIconprop({iconUrl: 'images/traingle_red.png'});
var tideIcon3 = new tideIconprop({iconUrl: 'images/traingle_yellow2.png'});
var wrbIcon1 = new tideIconprop({iconUrl: 'images/rhombus_green.png'});
var wrbIcon3 = new tideIconprop({iconUrl: 'images/rhombus_yellow.png'});
var wrbIcon2 = new tideIconprop({iconUrl: 'images/rhombus_red.png',className: 'blink'});
var wrbIcon4 = new tideIconprop({iconUrl: 'images/rhombus_red.png'});
var chfrIcon1 = new tideIconprop({iconUrl: 'images/radar-green.png'});
var chfrIcon2 = new tideIconprop({iconUrl: 'images/radar-red.png'});
var chfrIcon3 = new tideIconprop({iconUrl: 'images/radar-red.png',className: 'blink'});
var chfrIcon4 = new tideIconprop({iconUrl: 'images/radar-yellow.png'});
var tbIcon1 = new tideIconprop({iconUrl: 'images/star-green.png'});
var tbIcon2 = new tideIconprop({iconUrl: 'images/star-red.png'});
var tbIcon3 = new tideIconprop({iconUrl: 'images/star-red.png',className: 'blink'});
var tbIcon4 = new tideIconprop({iconUrl: 'images/star-yellow.png'});
var dbIcon1 = new tideIconprop({iconUrl: 'images/sun-burst-green.png'});
var dbIcon2 = new tideIconprop({iconUrl: 'images/sun-burst-red.png'});
var dbIcon3 = new tideIconprop({iconUrl: 'images/sun-burst-red.png',className: 'blink'});
var dbIcon4 = new tideIconprop({iconUrl: 'images/sun-burst-yellow.png'});
var smaws1 = new tideIconprop({iconUrl: 'images/plus-green.png'});
var smaws2 = new tideIconprop({iconUrl: 'images/plus-red.png'});
var smaws3 = new tideIconprop({iconUrl: 'images/plus-red.png',className: 'blink'});
var smaws4 = new tideIconprop({iconUrl: 'images/plus-yellow.png'});



 const date1 = new Date().toUTCString();
   const date5 = new Date(date1);
     var sno=1;
	  // var sdate=document.getElementById("start_date").value;
 // var edate=document.getElementById("end_date").value;
   var tg_active;
  var tg_inactive;
    var wrb_active;
  var wrb_inactive;
   var wrb_retrieved;
    var mb_active;
  var mb_inactive;
  var mb_retrieved;
  	  var chfr_active;
  var chfr_inactive;	
 var chfr_retrieved;
 var tb_active;
  var tb_inactive;	
 var tb_retrieved;
 
 
 const today = new Date();

    // Calculate the date 15 days ago
    const fifteenDaysAgo = new Date();
    fifteenDaysAgo.setDate(today.getDate() - 15);

    // Format the dates to YYYY-MM-DD
    const formatDate = (date) => {
      const year = date.getFullYear();
      const month = String(date.getMonth() + 1).padStart(2, '0');
      const day = String(date.getDate()).padStart(2, '0');
      return `${year}-${month}-${day}`;
    };
	 const formatDate1 = (date) => {
      const year = date.getFullYear();
      const month = String(date.getMonth() + 1).padStart(2, '0');
      const day = String(date.getDate()).padStart(2, '0');
      return `${day}-${month}-${year}`;
    };

    // Set the values of the input fields
    // document.getElementById('start_date').value = formatDate(fifteenDaysAgo);
    // document.getElementById('end_date').value = formatDate(today);
	// var sdate=document.getElementById("start_date").value;
 // var edate=document.getElementById("end_date").value;
 var sdate=formatDate(fifteenDaysAgo);
  var edate=formatDate(today);
  var sdate1=formatDate1(fifteenDaysAgo);
  var edate1=formatDate1(today);
  
main();
//platform_data=document.querySelector('input[name="optradio"]:checked').value;

$("input[name$='optradio']").click(function() {
        var platform_data = $(this).val();

        //$("div.desc").hide();
        //$("#Cars" + test).show();
		
		if(platform_data=="tideguage"){
		document.getElementById('info-container').style.display="block";
		document.getElementById('info-container1').style.display="none";		
		document.getElementById('info-container2').style.display="none";
		document.getElementById('info-container3').style.display="none";
		document.getElementById('info-container4').style.display="none";
		document.getElementById('info-container7').style.display="none";
	document.getElementById('info-container8').style.display="none";
	document.getElementById('info-container6').style.display="none";
	document.getElementById('info-container5').style.display="none";
	}
	else if(platform_data=="waveriderbuoy"){
		document.getElementById('info-container1').style.display="block";
		document.getElementById('info-container7').style.display="none";
	document.getElementById('info-container8').style.display="none";
	document.getElementById('info-container6').style.display="none";
	document.getElementById('info-container5').style.display="none";
		document.getElementById('info-container').style.display="none";
		document.getElementById('info-container2').style.display="none";
		document.getElementById('info-container3').style.display="none";
		document.getElementById('info-container4').style.display="none";
	}
	else if(platform_data=="mooredbuoy"){
	document.getElementById('info-container2').style.display="block";
	document.getElementById('info-container7').style.display="none";
	document.getElementById('info-container8').style.display="none";
	document.getElementById('info-container6').style.display="none";
	document.getElementById('info-container5').style.display="none";
	document.getElementById('info-container1').style.display="none";
	document.getElementById('info-container').style.display="none";
	document.getElementById('info-container3').style.display="none";
	document.getElementById('info-container4').style.display="none";
	}
	else if(platform_data=="coastalhfradar"){
	document.getElementById('info-container3').style.display="block";
	
		document.getElementById('info-container7').style.display="none";
	document.getElementById('info-container8').style.display="none";
	document.getElementById('info-container6').style.display="none";
	document.getElementById('info-container5').style.display="none";
	document.getElementById('info-container2').style.display="none";
	document.getElementById('info-container1').style.display="none";
	document.getElementById('info-container').style.display="none";
	document.getElementById('info-container4').style.display="none";
	
	}
	else if(platform_data=="tsunamibuoy"){
	document.getElementById('info-container4').style.display="block";
	document.getElementById('info-container7').style.display="none";
	document.getElementById('info-container8').style.display="none";
	document.getElementById('info-container6').style.display="none";
	document.getElementById('info-container5').style.display="none";
	document.getElementById('info-container3').style.display="none";
	document.getElementById('info-container2').style.display="none";
	document.getElementById('info-container1').style.display="none";
	document.getElementById('info-container').style.display="none";
	}
	else if(platform_data=="driftingbuoy"){
    document.getElementById('info-container5').style.display="block";
	document.getElementById('info-container8').style.display="none";
	document.getElementById('info-container7').style.display="none";
	document.getElementById('info-container6').style.display="none";
	document.getElementById('info-container4').style.display="none";
	document.getElementById('info-container3').style.display="none";
	document.getElementById('info-container2').style.display="none";
	document.getElementById('info-container1').style.display="none";
	document.getElementById('info-container').style.display="none";
	}
	else if(platform_data=="coastalaws"){
	document.getElementById('info-container6').style.display="block";
	document.getElementById('info-container8').style.display="none";
	document.getElementById('info-container7').style.display="none";
	   document.getElementById('info-container5').style.display="none";
	document.getElementById('info-container4').style.display="none";
	document.getElementById('info-container3').style.display="none";
	document.getElementById('info-container2').style.display="none";
	document.getElementById('info-container1').style.display="none";
	document.getElementById('info-container').style.display="none";
	}
	else if(platform_data=="shipmountedaws"){
	document.getElementById('info-container7').style.display="block";
	document.getElementById('info-container8').style.display="none";
	document.getElementById('info-container6').style.display="none";
	document.getElementById('info-container5').style.display="none";
	document.getElementById('info-container4').style.display="none";
	document.getElementById('info-container3').style.display="none";
	document.getElementById('info-container2').style.display="none";
	document.getElementById('info-container1').style.display="none";
	document.getElementById('info-container').style.display="none";
	}
	else if(platform_data=="xbtxctd"){
	document.getElementById('info-container8').style.display="block";
	document.getElementById('info-container7').style.display="none";
	document.getElementById('info-container6').style.display="none";
	document.getElementById('info-container5').style.display="none";
	document.getElementById('info-container4').style.display="none";
	document.getElementById('info-container3').style.display="none";
	document.getElementById('info-container2').style.display="none";
	document.getElementById('info-container1').style.display="none";
	document.getElementById('info-container').style.display="none";
	}
		
    });
	
function main()
{
	 
	tgmarks();
wrbmarks();
mrdby_marks();
chfr_marks();
tb_marks();
tgdetails();
wrbdetails();
mrddetails();
chfrdetails();
tbdetails();
dbdetails();
cawsdetails();
smawsdetails();
xbtxctddetails();

var reporting=tg_active+wrb_active+mb_active;
var not_reporting=tg_inactive+wrb_inactive+mb_inactive;
var retrieved=tg_retrieved+wrb_retrieved+mb_retrieved;
var total=reporting+not_reporting+retrieved;
let header_text='';
header_text += '<table id=main_header><tr><td><b>TOTAL PLATFORMS:</b></td><td style="color: blue;"><b>'+total+'</b></td><td ><b>PLATFORMS REPORTING:</b></td><td style="color: green;"><b>'+
reporting+'</b></td><td><b>PLATFORMS NOT REPORTING:</b></td><td style="color: #c0c011;"><b>'+not_reporting+'</b></td><td><b>PLATFORMS RETRIEVED:</b></td><td style="color: red;"><b>'+retrieved+'</b></td></table>';   
   var header = document.getElementById('header');
   header.style.display = 'block';
    document.getElementById('header').innerHTML = header_text;
let platforms_radio_buttons_text='';	
platforms_radio_buttons_text +='<form><table><tr><td><label class="radio-inline"><input type="radio" name="optradio" value="tideguage" checked>Tide Guage</label></td><td><label class="radio-inline">'   
 +'<input type="radio" name="optradio" value="waveriderbuoy">Wave Rider Buoy</label></td><td><label class="radio-inline"><input type="radio" name="optradio" value="mooredbuoy">Moored Buoy'
     +'</label></td>'
     +'<td><label class="radio-inline">'
       +'<input type="radio" name="optradio" value="coastalhfradar">Coastal HF Radar</label></td>'
     +'<td><label class="radio-inline"><input type="radio" name="optradio" value="tsunamibuoy">Tsunami Buoy</label></td></tr>'
	 +'<tr><td><label class="radio-inline"><input type="radio" name="optradio" value="driftingbuoy">Drifting Buoy</label></td>'
	 +'<td><label class="radio-inline"><input type="radio" name="optradio" value="coastalaws">Coastal AWS</label></td>'
	 +'<td><label class="radio-inline"><input type="radio" name="optradio" value="shipmountedaws">Ship Mounted AWS</label></td>'
	 +'<td><label class="radio-inline"><input type="radio" name="optradio" value="xbtxctd">XBTD/XCTD</label></td>'
	 +'</tr></table></form>';
	var platforms_radio_buttons = document.getElementById('platforms_radio_buttons');
   platforms_radio_buttons.style.display = 'block';
    document.getElementById('platforms_radio_buttons').innerHTML = platforms_radio_buttons_text;
	
	platform_data=document.querySelector('input[name="optradio"]:checked').value;
	if(platform_data=="tideguage"){
		document.getElementById('info-container').style.display="block";
		
	}
	else if(platform_data=="waveriderbuoy"){
		document.getElementById('info-container1').style.display="block";
	}
	else if(platform_data=="mooredbuoy"){
	document.getElementById('info-container2').style.display="block";
	}
	else if(platform_data=="coastalhfradar"){
	document.getElementById('info-container3').style.display="block";
	}
	else if(platform_data=="tsunamibuoy"){
	document.getElementById('info-container4').style.display="block";
	}
	else if(platform_data=="driftingbuoy"){
	document.getElementById('info-container5').style.display="block";
	}
	else if(platform_data=="coastalaws"){
	document.getElementById('info-container6').style.display="block";
	}
	else if(platform_data=="shipmountedaws"){
	document.getElementById('info-container7').style.display="block";
	}
	else if(platform_data=="xbtxctd"){
	document.getElementById('info-container8').style.display="block";
	}
	
	let header_text2='';
header_text2 +='Status of the Stations/Buoys from '+sdate1+' to '+edate1;
var header2 = document.getElementById('header2');
   header2.style.display = 'block';
    document.getElementById('header2').innerHTML = header_text2;

}

  
			
	 // document.getElementById('dateForm').addEventListener('submit', function(event) {
    // event.preventDefault();  // Prevent the form from submitting the traditional way
    
    // //sdate = document.getElementById('start_date').value;  // Get the current value of the date input
	 // //sdate = new Date().toJSON().slice(0,10).replace(/-/g,'/');
	// //edate = document.getElementById('end_date').value; 
	
	
	// const today = new Date();
// const before15Days = new Date();
// before15Days.setDate(today.getDate() - 15);

// sdate=today.toISOString().split('T')[0]
// edate=before15Days.toISOString().split('T')[0]
    
     
  // main()
   
// });
	// const today = new Date();
// const before15Days = new Date();
// before15Days.setDate(today.getDate() - 15);

// sdate=today.toISOString().split('T')[0]
// edate=before15Days.toISOString().split('T')[0]	 
function tgmarks()
{
layerGroup1.clearLayers();

$.ajax({
	        url: 'markers/tg_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
	       
	        cache: false,
	       
	        success: function (data) {
	            
	             var markers = JSON.parse(data);
	           
	  	 var sno=1;
		
for (var i = 0; i < markers.length; i++) {

    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
	//if(hours>24)
	//{
		// tglist1=L.marker(marker.coords,{
		// icon: tideIcon2
		 
		 //}).addTo(map);
	//}
		//if(marker.station_id=='Digha')
		//{
			//marker.coords=[21.6290000,87.5480000];
		//}
		if(marker.status=='R')
	{
	
    
	 tglist1=L.marker(marker.coords,{
		 icon: tideIcon4
		 
		 }).addTo(map);

	   	  //text1 += '<tr bgcolor=red><td>'+sno+'</td><td>'+marker.station_id+'</td><td>'+marker.coords+'</td><td >'+marker.lotime+'</td><td><a href=http://172.16.1.57/export_excel2 target=_blank>Download</a></td></tr></tbody>';

}
else if(marker.status=='N')
	{
	
    
	 tglist1=L.marker(marker.coords,{
		 icon: tideIcon3
		 
		 }).addTo(map);


}
else if(marker.status=='A')
{
	 
	   tglist1=L.marker(marker.coords,{
		   icon: tideIcon1
		   
		   }).addTo(map);
	  

}

	//var labelText = marker.station_id;
	var labelText = "TG";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-weight: bold">'+labelText+'</div>'
    });
	 tglist2=L.marker(marker.coords, { icon: text }).addTo(map).bindPopup('<b>Platform:</b> Tide Guage</br><b>Station:</b>'+marker.station_id+'</br><b>Deployment LatLng:</b>'+marker.coords+'</br><b>last_reported_time:</b>'+marker.lotime+'</br><a href=graphs/tg_graphs/tggraph2.html?pid='+marker.station_id+'  target=_blank ><img src="images/map.png" alt="Plot" style="width:31px;height:31px;"></a>&nbsp<a href=http://172.16.1.57/export_excel2 target=_blank><img src="images/download.png" alt="Download" style="width:31px;height:31px;"></a></br><a href=sensor_base3/metadata.php?pid='+marker.station_id+'&programme='+marker.programme+' target=_blank>Metadata</a>');
	 layerGroup1.addLayer(tglist1);
	 layerGroup1.addLayer(tglist2);
	   sno++;
			
}
 
			
}
 });
 
 }
 
 function wrbmarks()
 {
	 layerGroup2.clearLayers();
  $.ajax({
	        url: 'markers/wrb_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
	        
	        cache: false,
	        
	        success: function (data) {
	            
	             var markers = JSON.parse(data);
	            

	   

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
	 //if(hours>24)
	 //{
		// wrblist1=L.marker(marker.coords,{
		   //icon: wrbIcon2
		   
       
		   
		   //}).addTo(map);
	// }
		//if(marker.station_id=='Pondicherry')
		//{
			//marker.coords=[11.87436,79.84236];
		//}
		if(marker.status=='R')
	{
		
   

wrblist1=L.marker(marker.coords,{
		   icon: wrbIcon4
		   
       
		   
		   }).addTo(map);
}
else if(marker.status=='N')
	{
		
    

wrblist1=L.marker(marker.coords,{
		   icon: wrbIcon3
		        		   
		   }).addTo(map);
}
else if(marker.status=='A')
{
	   	   	   	
				  wrblist1=L.marker(marker.coords,{
		   icon: wrbIcon1
		   
		   }).addTo(map);
}
//$_SESSION['platform']=marker.programme;
//$_SESSION['sname']=marker.station_id;
	
	var labelText = "WRB";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="margin-left: -6px;    margin-top: -2px;    width: 21px;    height: 12px;font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	 wrblist2=L.marker(marker.coords, { icon: text }).addTo(map).bindPopup('<b>Platform:</b> Wave Rider Buoy</br><b>Station:</b>'+marker.station_id+'</br><b>Deployed Lnglat:</b>'+marker.coords+'</br><b>last_reported_time:</b>'+marker.lotime+'</br><a href=graphs/wrb_graphs/wrbgraph.html?pid='+marker.station_id+'  target=_blank><img src="images/map.png" alt="Download" style="width:31px;height:31px;"></a>&nbsp<a href=http://172.16.1.57/export_excel2 target=_blank><img src="images/download.png" alt="Download" style="width:31px;height:31px;"></a></br><form action="metadata.php" method="POST"><button type="submit" name="button22" class="btn btn-link" ><a href=sensor_base3/metadata.php?pid='+marker.station_id+'&programme='+marker.programme+' target=_blank>Metadata</a></button><form>');
	  layerGroup2.addLayer(wrblist1);
	  layerGroup2.addLayer(wrblist2);
	   //sno++;
}


}
 });
 }
 
  function mrdby_marks()
 {
	 layerGroup3.clearLayers();
  $.ajax({
	        url: 'markers/mb_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
	        
	        cache: false,
	        
	        success: function (data) {
	            
	             var markers = JSON.parse(data);
	            

	   

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
	//if(hours>24)
		if(marker.status=='R')
	{
    mrdlist1=L.circleMarker(marker.coords, {
        radius: 13,
        fillColor: "red",
        color: "red",
        weight: 0,
        opacity: 1,
        fillOpacity: 0.4,
        className: 'blink'
	   }).addTo(map);
	   
	   

}
else if(marker.status=='N')
	{
    mrdlist1=L.circleMarker(marker.coords, {
        radius: 13,
        fillColor: "yellow",
        color: "yellow",
        weight: 0,
        opacity: 1,
        fillOpacity: 0.4,
      
	   }).addTo(map);

}

else if(marker.status=='A')
{
	mrdlist1=L.circleMarker(marker.coords, {
        radius: 13,
        fillColor: "green",
        color: "green",
        weight: 0,
        opacity: 1,
        fillOpacity: 0.4
	   }).addTo(map);
	   	   	   	  //
}
	
	var labelText = "MB";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	 mrdlist2=L.marker(marker.coords, { icon: text }).addTo(map).bindPopup('<b>Platform:</b> Moored Buoy</br><b>Station:</b>'+marker.station_id+'</br><b>Deployed Lnglat:</b>'+marker.coords+'</br><a href=graphs/mb_graphs/mbgraph.html?pid='+marker.station_id+' target=_blank><img src="images/map.png" alt="Plot" style="width:31px;height:31px;"></a>&nbsp<a href=http://172.16.1.57/export_excel2 target=_blank><img src="images/download.png" alt="Download" style="width:31px;height:31px;"></a></br><a href=sensor_base3/List_Details_Sensor3.php target=_blank>Metadata</a>');
	  layerGroup3.addLayer(mrdlist1);
	  layerGroup3.addLayer(mrdlist2);
	   //sno++;
}


}
 });
 }
	function chfr_marks()
 {
	 layerGroup4.clearLayers();
  $.ajax({
	        url: 'markers/chfr_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
	        
	        cache: false,
	        
	        success: function (data) {
	            
	             var markers = JSON.parse(data);
	            

	   

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
	//if(hours>24)
		if(marker.status=='R')
	{
    // chfrlist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "red",
        // color: "red",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4,
        // className: 'blink'
	   // }).addTo(map);

chfrlist1=L.marker(marker.coords,{
		   icon: chfrIcon2
		   
       
		   
		   }).addTo(map);
}
else if(marker.status=='N')
	{
    // chfrlist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "yellow",
        // color: "yellow",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4,
      
	   // }).addTo(map);
	   
	   chfrlist1=L.marker(marker.coords,{
		   icon: chfrIcon4
		   
       
		   
		   }).addTo(map);

}

else if(marker.status=='A')
{
	// chfrlist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "green",
        // color: "green",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4
	   // }).addTo(map);
	     chfrlist1=L.marker(marker.coords,{
		   icon: chfrIcon1
		   
       
		   
		   }).addTo(map);
	   
}
	
	var labelText = "CHFR";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	chfrlist2=L.marker(marker.coords, { icon: text }).addTo(map).bindPopup('<b>Platform:</b>Coastal HF Radar</br><b>Station:</b>'+marker.station_id+'</br><b>Deployed Lnglat:</b>'+marker.coords+'</br><a href=graphs/chfr_graphs/chfr_graph.html?pid='+marker.station_id+ 'target=_blank><img src="images/map.png" alt="Plot" style="width:31px;height:31px;"></a>&nbsp<a href=http://172.16.1.57/export_excel2 target=_blank><img src="images/download.png" alt="Download" style="width:31px;height:31px;"></a></br><a href=sensor_base3/List_Details_Sensor3.php target=_blank>Metadata</a>');
	  layerGroup4.addLayer(chfrlist1);
	  layerGroup4.addLayer(chfrlist2);
	   //sno++;
}


}
 });
 }
	function tb_marks()
 {
	 layerGroup5.clearLayers();
  $.ajax({
	        url: 'markers/tb_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
	        
	        cache: false,
	        
	        success: function (data) {
	            
	             var markers = JSON.parse(data);
	            

	   

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
	//if(hours>24)
		if(marker.status=='R')
	{
    // tblist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "red",
        // color: "red",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4,
        // className: 'blink'
	   // }).addTo(map);

tblist1=L.marker(marker.coords,{
		   icon: tbIcon2
		   
       
		   
		   }).addTo(map);
}
else if(marker.status=='N')
	{
    // tblist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "yellow",
        // color: "yellow",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4,
      
	   // }).addTo(map);
	   
tblist1=L.marker(marker.coords,{
		   icon: tbIcon4
		   
       
		   
		   }).addTo(map);
}

else if(marker.status=='A')
{
	// tblist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "green",
        // color: "green",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4
	   // }).addTo(map);
	   
	   tblist1=L.marker(marker.coords,{
		   icon: tbIcon1
		   
       
		   
		   }).addTo(map);
	   
}
	
	var labelText = "TB";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	tblist2=L.marker(marker.coords, { icon: text }).addTo(map).bindPopup('<b>Platform:</b>Tsunami Buoy</br><b>Station:</b>'+marker.station_id+'</br><b>Deployed Lnglat:</b>'+marker.coords+'</br><a href=graphs/tb_graphs/tbgraph.html?pid='+marker.station_id+ 'target=_blank><img src="images/map.png" alt="Plot" style="width:31px;height:31px;"></a>&nbsp<a href=http://172.16.1.57/export_excel2 target=_blank><img src="images/download.png" alt="Download" style="width:31px;height:31px;"></a></br><a href=sensor_base3/List_Details_Sensor3.php target=_blank>Metadata</a>');
	  layerGroup5.addLayer(tblist1);
	  layerGroup5.addLayer(tblist2);
	   //sno++;
}


}
 });
 }	
 
 	function db_marks()
 {
	 layerGroup5.clearLayers();
  $.ajax({
	        url: 'markers/db_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
	        
	        cache: false,
	        
	        success: function (data) {
	            
	             var markers = JSON.parse(data);
	            

	   

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
	//if(hours>24)
		if(marker.status=='R')
	{
    // tblist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "red",
        // color: "red",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4,
        // className: 'blink'
	   // }).addTo(map);
	   
	   dblist1=L.marker(marker.coords,{
		   icon: dbIcon2
		   
       
		   
		   }).addTo(map);

}
else if(marker.status=='N')
	{
    // tblist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "yellow",
        // color: "yellow",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4,
      
	   // }).addTo(map);
	   
	      dblist1=L.marker(marker.coords,{
		   icon: dbIcon4
		   
       
		   
		   }).addTo(map);

}

else if(marker.status=='A')
{
	// tblist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "green",
        // color: "green",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4
	   // }).addTo(map);
	   
	      dblist1=L.marker(marker.coords,{
		   icon: dbIcon1
		   
       
		   
		   }).addTo(map);
}
	
	var labelText = "DB";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	dblist2=L.marker(marker.coords, { icon: text }).addTo(map).bindPopup('<b>Platform:</b>Drifting Buoy</br><b>Station:</b>'+marker.station_id+'</br><b>Deployed Lnglat:</b>'+marker.coords+'</br><a href=graphs/tb_graphs/tbgraph.html?pid='+marker.station_id+ 'target=_blank><img src="images/map.png" alt="Plot" style="width:31px;height:31px;"></a>&nbsp<a href=http://172.16.1.57/export_excel2 target=_blank><img src="images/download.png" alt="Download" style="width:31px;height:31px;"></a></br><a href=sensor_base3/List_Details_Sensor3.php target=_blank>Metadata</a>');
	  layerGroup6.addLayer(dblist1);
	  layerGroup6.addLayer(dblist2);
	   //sno++;
}


}
 });
 }	
 
  	function smaws_marks()
 {
	 layerGroup5.clearLayers();
  $.ajax({
	        url: 'markers/smaws_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
	        
	        cache: false,
	        
	        success: function (data) {
	            
	             var markers = JSON.parse(data);
	            

	   

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
	//if(hours>24)
		if(marker.status=='R')
	{
    // tblist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "red",
        // color: "red",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4,
        // className: 'blink'
	   // }).addTo(map);
	   
	   smawslist1=L.marker(marker.coords,{
		   icon: smawsIcon2
		   
       
		   
		   }).addTo(map);

}
else if(marker.status=='N')
	{
    // tblist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "yellow",
        // color: "yellow",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4,
      
	   // }).addTo(map);
	   
	      smawslist1=L.marker(marker.coords,{
		   icon: smawsIcon4
		   
       
		   
		   }).addTo(map);

}

else if(marker.status=='A')
{
	// tblist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "green",
        // color: "green",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4
	   // }).addTo(map);
	   
	      smawslist1=L.marker(marker.coords,{
		   icon: smawsIcon1
		   
       
		   
		   }).addTo(map);
}
	
	var labelText = "TB";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	smawslist2=L.marker(marker.coords, { icon: text }).addTo(map).bindPopup('<b>Platform:</b>Ship Mounted AWS</br><b>Station:</b>'+marker.station_id+'</br><b>Deployed Lnglat:</b>'+marker.coords+'</br><a href=graphs/tb_graphs/tbgraph.html?pid='+marker.station_id+ 'target=_blank><img src="images/map.png" alt="Plot" style="width:31px;height:31px;"></a>&nbsp<a href=http://172.16.1.57/export_excel2 target=_blank><img src="images/download.png" alt="Download" style="width:31px;height:31px;"></a></br><a href=sensor_base3/List_Details_Sensor3.php target=_blank>Metadata</a>');
	  layerGroup7.addLayer(smawslist1);
	  layerGroup7.addLayer(smawslist2);
	   //sno++;
}


}
 });
 }	
	
	  	function xbtxctd_marks()
 {
	 layerGroup5.clearLayers();
  $.ajax({
	        url: 'markers/xbtxctd_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
	        
	        cache: false,
	        
	        success: function (data) {
	            
	             var markers = JSON.parse(data);
	            

	   

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
	//if(hours>24)
		if(marker.status=='R')
	{
    // tblist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "red",
        // color: "red",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4,
        // className: 'blink'
	   // }).addTo(map);
	   
	   xbtxctdlist1=L.marker(marker.coords,{
		   icon: xbtxctdIcon2
		   
       
		   
		   }).addTo(map);

}
else if(marker.status=='N')
	{
    // tblist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "yellow",
        // color: "yellow",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4,
      
	   // }).addTo(map);
	   
	        xbtxctdlist1=L.marker(marker.coords,{
		   icon: xbtxctdIcon4
		   
       
		   
		   }).addTo(map);

}

else if(marker.status=='A')
{
	// tblist1=L.circleMarker(marker.coords, {
        // radius: 13,
        // fillColor: "green",
        // color: "green",
        // weight: 0,
        // opacity: 1,
        // fillOpacity: 0.4
	   // }).addTo(map);
	   
	       xbtxctdlist1=L.marker(marker.coords,{
		   icon: xbtxctdIcon1
		   
       
		   
		   }).addTo(map);
}
	
	var labelText = "TB";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	xbtxctdlist2=L.marker(marker.coords, { icon: text }).addTo(map).bindPopup('<b>Platform:</b>XBT/XCTD</br><b>Station:</b>'+marker.station_id+'</br><b>Deployed Lnglat:</b>'+marker.coords+'</br><a href=graphs/tb_graphs/tbgraph.html?pid='+marker.station_id+ 'target=_blank><img src="images/map.png" alt="Plot" style="width:31px;height:31px;"></a>&nbsp<a href=http://172.16.1.57/export_excel2 target=_blank><img src="images/download.png" alt="Download" style="width:31px;height:31px;"></a></br><a href=sensor_base3/List_Details_Sensor3.php target=_blank>Metadata</a>');
	  layerGroup8.addLayer(xbtxctdlist1);
	  layerGroup8.addLayer(xbtxctdlist2);
	   //sno++;
}


}
 });
 }	
 function tgdetails()
{
	tg_retrieved=0
	tg_inactive=0;
	 tg_active=0;

	
$.ajax({
	        url: 'markers/tg_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
			async: false,
	        cache: false,
	        success: function (data) {
	             var markers = JSON.parse(data);
				let text1='';
				if(sdate==""&&edate=="")
				{
				
	       text1 += '<div style="background-color:ghostwhite"><center style="font-size: 15px;color: darkblue;"><h2 class="toggle-header"><span class="toggle-icon-box"><span class="toggle-icon">-</span></span><b>TIDE GUAGE (Reporting Stations Since its Inception)</b></h2></center></div><table border=1 id=info-table class="toggle-table">';
				}
				else
				{
					// text1 += '<div style="background-color:ghostwhite"><center style="color:black"><h2 class="toggle-header"><span class="toggle-icon-box"><span class="toggle-icon">-</span></span><b>TIDE GUAGE</b></h2></center></div><table border=1 id=info-table class="toggle-table"><tbody>';
					text1 += '<div style="background-color:ghostwhite"><center style="color:black"><h2><b>TIDE GUAGE</b></h2></center></div><table border=1 id=info-table class="toggle-table"><tbody>';

				}
	  	 var sno=1;
	var c=0;
	
		 
for (var i = 0; i < markers.length; i++) {

	var kk=markers.length/6;

    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
	if(c%6==0)
{
	text1 += '<tr>';
}
		if(marker.status=='N')
	{
	 
    
	   	  text1 += '<td bgcolor=gold>'+marker.station_id+'</td>';
		  
		 tg_inactive++;

}
else if(marker.status=='R')
	{
	 
    
	   	  text1 += '<td bgcolor=red>'+marker.station_id+'</td>';
		  
		 tg_retrieved++;

}
else
{
	
	   	   	  text1 += '<td bgcolor=green>'+marker.station_id+'</td>';
  tg_active++;
}
 c++;
if(c%6==0)
{
	text1 += '</tr>';
}
	var labelText = "TG";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-weight: bold">'+labelText+'</div>'
    });
	   sno++;
		
}
 text1 += '</tbody></table>';   
 text1 += '<center><b style="color:darkblue;font-size:18px">Status:<span style="color:green">'+tg_active+ '</span>/<span style="color:#c0c011">'+tg_inactive+'</span>/<span style="color:red">'+tg_retrieved+'</span></b></center>';   

   var infoContainer = document.getElementById('info-container');
   infoContainer.style.display = 'none';
  
			 document.getElementById('info-container').innerHTML = text1;
			  //let text44='';
 //text44 += '<center><b style="color:darkblue;font-size:18px">Tide Guage (<span style="color:green">Reporting</span>/<span style="color:#c0c011">Not Reporting</span>/<span style="color:red">Retrieved</span>):<span style="color:green">'+tg_active+ '</span>/<span style="color:#c0c011">'+tg_inactive+'</span>/<span style="color:red">'+tg_retrieved+'</span></b></center>';   
 //text44 += '<center><b style="color:darkblue;font-size:18px">Tide Guage:<span style="color:green">'+tg_active+ '</span>/<span style="color:#c0c011">'+tg_inactive+'</span>/<span style="color:red">'+tg_retrieved+'</span></b></center>';   

			 //var report1 = document.getElementById('report1');
    //report1.style.display = 'none';
  
			  //document.getElementById('report1').innerHTML = text44;
			
}
 });
}

 function wrbdetails()
{
	 wrb_retrieved=0;
wrb_active=0;
wrb_inactive=0;	
$.ajax({
	        url: 'markers/wrb_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
			async: false,
	        cache: false,
	        success: function (data) {
	             var markers = JSON.parse(data);
				let text2='';
				if(sdate==""&&edate=="")
				{
	        text2 += '<div style="background-color:ghostwhite"><center style="font-size: 15px;color: darkblue;"><h2 class="toggle-header"><span class="toggle-icon-box"><span class="toggle-icon">-</span></span><b>WAVE RIDER BUOY (Reporting Stations Since its Inception)</b></h2></center></div><table border=1 id=info-table class="toggle-table">';
				}
				else{
					  text2 += '<div style="background-color:ghostwhite"><center style="color:black"><h2><b>WAVE RIDER BUOY</b></h2></center></div><table border=1 id=info-table class="toggle-table">';
				}
	  	 var sno=1;

	   
var c=0;

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
if(c%6==0)
{
	text2 += '<tr>';
}
		if(marker.status=='N')
	{
	
    
	   	  text2 += '<td bgcolor=gold>'+marker.station_id+'</td>';
		  
		 wrb_inactive++;

}
else if(marker.status=='R')
	{
	
    
	   	  text2 += '<td bgcolor=red>'+marker.station_id+'</td>';
		  
		 wrb_retrieved++;

}
else
{
	
	   	   	  text2 += '<td bgcolor=green>'+marker.station_id+'</td>';
 wrb_active++;
}
 c++;
if(c%6==0)
{
	text2 += '</tr>';
}
	
	var labelText = "WRB";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	   sno++;
}

text2 += '</table>';   
//text2 += '</br><center ><b style="color:darkblue;font-size:18px">Wave Rider Buoy (<span style="color:green">Reporting</span>/<span style="color:#c0c011">Not Reporting</span>/<span style="color:red">Retrieved</span>):<span style="color:green">'+wrb_active+ '</span>/<span style="color:#c0c011">'+wrb_inactive+'</span>/<span style="color:red">'+wrb_retrieved+'</span></b></center>';   
text2 += '</br><center ><b style="color:darkblue;font-size:18px">Status:<span style="color:green">'+wrb_active+ '</span>/<span style="color:#c0c011">'+wrb_inactive+'</span>/<span style="color:red">'+wrb_retrieved+'</span></b></center>';   

   var infoContainer = document.getElementById('info-container1');
   infoContainer.style.display = 'none';
  
			 document.getElementById('info-container1').innerHTML = text2;
}
 });
 }

 function mrddetails()
{
	 mb_active=0;
 mb_inactive=0;	
mb_retrieved=0;
$.ajax({
	        url: 'markers/mb_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
			async: false,
	        cache: false,
	        success: function (data) {
	             var markers = JSON.parse(data);
				let text3='';
				if(sdate==""&&edate=="")
				{
	        text3 += '<div style="background-color:ghostwhite"><center style="font-size: 15px;color: darkblue;"><h2><b>MOORED BUOY (Reporting Stations Since its Inception)</b></h2></center></div><table border=1 id=info-table >';
				}
				else{
					  text3 += '<div style="background-color:ghostwhite"><center style="color:black"><h2><b>MOORED BUOY</b></h2></center></div><table border=1 id=info-table >';
				}
	  	 var sno=1;

	   
var c=1;

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
if(c%6==0)
{
	text3 += '<tr>';
}
		if(marker.status=='N')
	{
	
    
	   	  text3 += '<td bgcolor=gold>'+marker.station_id+'</td>';
		  mb_inactive++;
		 

}
else if(marker.status=='R')
	{
	
    
	   	  text3 += '<td bgcolor=red>'+marker.station_id+'</td>';
		  mb_retrieved++;
		 

}
else
{
	
	   	   	  text3 += '<td bgcolor=green>'+marker.station_id+'</td>';
 mb_active++;
}
 c++;
if(c%6==0)
{
	text3 += '</tr>';
}
	
	var labelText = "WRB";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	   sno++;
}

text3 += '</table>';   
text3 += '</br><center><b style="color:darkblue;font-size:18px">Status:<span style="color:green">'+mb_active+ '</span>/<span style="color:#c0c011">'+mb_inactive+'</span>/<span style="color:red">'+mb_retrieved+'</span></b></center>';   

   var infoContainer = document.getElementById('info-container2');
   infoContainer.style.display = 'none';
  
			 document.getElementById('info-container2').innerHTML = text3;
}
 });
 }
 
  function chfrdetails()
{
	 chfr_active=0;
 chfr_inactive=0;	
chfr_retrieved=0;
$.ajax({
	        url: 'markers/chfr_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
			async: false,
	        cache: false,
	        success: function (data) {
	             var markers = JSON.parse(data);
				let text4='';
				if(sdate==""&&edate=="")
				{
	        text4 += '<div style="background-color:ghostwhite"><center style="font-size: 15px;color: darkblue;"><h2><b>COASTAL HF RADAR (Reporting Stations Since its Inception)</b></h2></center></div><table border=1 id=info-table >';
				}
				else{
					  text4 += '<div style="background-color:ghostwhite"><center style="color:black"><h2><b>COASTAL HF RADAR</b></h2></center></div><table border=1 id=info-table >';
				}
	  	 var sno=1;

	   
var c=1;

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
if(c%6==0)
{
	text4 += '<tr>';
}
		if(marker.status=='N')
	{
	
    
	   	  text4 += '<td bgcolor=gold>'+marker.station_id+'</td>';
		 chfr_inactive++;
		 

}
else if(marker.status=='R')
	{
	
    
	   	  text4 += '<td bgcolor=red>'+marker.station_id+'</td>';
		  chfr_retrieved++;
		 

}
else
{
	
	   	   	  text4 += '<td bgcolor=green>'+marker.station_id+'</td>';
 chfr_active++;
}
 c++;
if(c%6==0)
{
	text4 += '</tr>';
}
	
	
	var labelText = "CHFR";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	   sno++;
}

text4 += '</table>';   
text4 += '</br><center><b style="color:darkblue;font-size:18px">Status:<span style="color:green">'+chfr_active+ '</span>/<span style="color:#c0c011">'+chfr_inactive+'</span>/<span style="color:red">'+chfr_retrieved+'</span></b></center>';   

   var infoContainer = document.getElementById('info-container3');
   infoContainer.style.display = 'none';
  
			 document.getElementById('info-container3').innerHTML = text4;
}
 });
 }
 
   function tbdetails()
{
	tb_active=0;
 tb_inactive=0;	
tb_retrieved=0;
$.ajax({
	        url: 'markers/tb_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
			async: false,
	        
	        cache: false,
	        
	        success: function (data) {
	           
	             var markers = JSON.parse(data);
				let text5='';
				if(sdate==""&&edate=="")
				{
	        text5 += '<div style="background-color:ghostwhite"><center style="font-size: 15px;color: darkblue;"><h2><b>TSUNAMI BUOY (Reporting Stations Since its Inception)</b></h2></center></div><table border=1 id=info-table >';
				}
				else{
					  text5 += '<div style="background-color:ghostwhite"><center style="color:black"><h2><b>TSUNAMI BUOY</b></h2></center></div><table border=1 id=info-table >';
				}
	  	 var sno=1;

	   
var c=1;

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
if(c%6==0)
{
	text5 += '<tr>';
}
		
		if(marker.status=='N')
	{
	
    
	   	  text5 += '<td bgcolor=gold>'+marker.station_id+'</td>';
		 tb_inactive++;
		 

}
else if(marker.status=='R')
	{
	
    
	   	  text5 += '<td bgcolor=red>'+marker.station_id+'</td>';
		  tb_retrieved++;
		 

}
else
{
	
	   	   	  text5 += '<td bgcolor=green>'+marker.station_id+'</td>';
tb_active++;
}
 c++;
if(c%6==0)
{
	text5 += '</tr>';
}
	
	var labelText = "TB";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	   sno++;
}

text5 += '</table>';   
text5 += '</br><center><b style="color:darkblue;font-size:18px">Status:<span style="color:green">'+tb_active+ '</span>/<span style="color:#c0c011">'+tb_inactive+'</span>/<span style="color:red">'+tb_retrieved+'</span></b></center>';   

   var infoContainer = document.getElementById('info-container4');
   infoContainer.style.display = 'none';
  
			 document.getElementById('info-container4').innerHTML = text5;
}
 });
 }
  function dbdetails()
{
	tb_active=0;
 tb_inactive=0;	
tb_retrieved=0;
$.ajax({
	        url: 'markers/db_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
			async: false,
	        
	        cache: false,
	        
	        success: function (data) {
	           
	             var markers = JSON.parse(data);
				let text5='';
				if(sdate==""&&edate=="")
				{
	        text5 += '<div style="background-color:ghostwhite"><center style="font-size: 15px;color: darkblue;"><h2><b>DRIFTING BUOY (Reporting Stations Since its Inception)</b></h2></center></div><table border=1 id=info-table >';
				}
				else{
					  text5 += '<div style="background-color:ghostwhite"><center style="color:black"><h2><b>DRIFTING BUOY</b></h2></center></div><table border=1 id=info-table >';
				}
	  	 var sno=1;

	   
var c=1;

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
if(c%6==0)
{
	text5 += '<tr>';
}
		
		if(marker.status=='N')
	{
	
    
	   	  text5 += '<td bgcolor=gold>'+marker.station_id+'</td>';
		 tb_inactive++;
		 

}
else if(marker.status=='R')
	{
	
    
	   	  text5 += '<td bgcolor=red>'+marker.station_id+'</td>';
		  tb_retrieved++;
		 

}
else
{
	
	   	   	  text5 += '<td bgcolor=green>'+marker.station_id+'</td>';
tb_active++;
}
 c++;
if(c%6==0)
{
	text5 += '</tr>';
}
	
	var labelText = "TB";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	   sno++;
}

text5 += '</table>';   
text5 += '</br><center><b style="color:darkblue;font-size:18px">Status:<span style="color:green">'+tb_active+ '</span>/<span style="color:#c0c011">'+tb_inactive+'</span>/<span style="color:red">'+tb_retrieved+'</span></b></center>';   

   var infoContainer = document.getElementById('info-container5');
   infoContainer.style.display = 'none';
  
			 document.getElementById('info-container5').innerHTML = text5;
}
 });
 }
 function cawsdetails()
{
	tb_active=0;
 tb_inactive=0;	
tb_retrieved=0;
$.ajax({
	        url: 'markers/caws_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
			async: false,
	        
	        cache: false,
	        
	        success: function (data) {
	           
	             var markers = JSON.parse(data);
				let text5='';
				if(sdate==""&&edate=="")
				{
	        text5 += '<div style="background-color:ghostwhite"><center style="font-size: 15px;color: darkblue;"><h2><b>COASTAL AWS (Reporting Stations Since its Inception)</b></h2></center></div><table border=1 id=info-table >';
				}
				else{
					  text5 += '<div style="background-color:ghostwhite"><center style="color:black"><h2><b>COASTAL AWS</b></h2></center></div><table border=1 id=info-table >';
				}
	  	 var sno=1;

	   
var c=1;

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
if(c%6==0)
{
	text5 += '<tr>';
}
		
		if(marker.status=='N')
	{
	
    
	   	  text5 += '<td bgcolor=gold>'+marker.station_id+'</td>';
		 tb_inactive++;
		 

}
else if(marker.status=='R')
	{
	
    
	   	  text5 += '<td bgcolor=red>'+marker.station_id+'</td>';
		  tb_retrieved++;
		 

}
else
{
	
	   	   	  text5 += '<td bgcolor=green>'+marker.station_id+'</td>';
tb_active++;
}
 c++;
if(c%6==0)
{
	text5 += '</tr>';
}
	
	var labelText = "TB";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	   sno++;
}

text5 += '</table>';   
text5 += '</br><center><b style="color:darkblue;font-size:18px">Status:<span style="color:green">'+tb_active+ '</span>/<span style="color:#c0c011">'+tb_inactive+'</span>/<span style="color:red">'+tb_retrieved+'</span></b></center>';   

   var infoContainer = document.getElementById('info-container6');
   infoContainer.style.display = 'none';
  
			 document.getElementById('info-container6').innerHTML = text5;
}
 });
 }
  function smawsdetails()
{
	tb_active=0;
 tb_inactive=0;	
tb_retrieved=0;
$.ajax({
	        url: 'markers/smaws_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
			async: false,
	        
	        cache: false,
	        
	        success: function (data) {
	           
	             var markers = JSON.parse(data);
				let text5='';
				if(sdate==""&&edate=="")
				{
	        text5 += '<div style="background-color:ghostwhite"><center style="font-size: 15px;color: darkblue;"><h2><b>SHIP MOUNTED AWS (Reporting Stations Since its Inception)</b></h2></center></div><table border=1 id=info-table >';
				}
				else{
					  text5 += '<div style="background-color:ghostwhite"><center style="color:black"><h2><b>SHIP MOUNTED AWS</b></h2></center></div><table border=1 id=info-table >';
				}
	  	 var sno=1;

	   
var c=1;

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
if(c%6==0)
{
	text5 += '<tr>';
}
		
		if(marker.status=='N')
	{
	
    
	   	  text5 += '<td bgcolor=gold>'+marker.station_id+'</td>';
		 tb_inactive++;
		 

}
else if(marker.status=='R')
	{
	
    
	   	  text5 += '<td bgcolor=red>'+marker.station_id+'</td>';
		  tb_retrieved++;
		 

}
else
{
	
	   	   	  text5 += '<td bgcolor=green>'+marker.station_id+'</td>';
tb_active++;
}
 c++;
if(c%6==0)
{
	text5 += '</tr>';
}
	
	var labelText = "TB";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	   sno++;
}

text5 += '</table>';   
text5 += '</br><center><b style="color:darkblue;font-size:18px">Status:<span style="color:green">'+tb_active+ '</span>/<span style="color:#c0c011">'+tb_inactive+'</span>/<span style="color:red">'+tb_retrieved+'</span></b></center>';   

   var infoContainer = document.getElementById('info-container7');
   infoContainer.style.display = 'none';
  
			 document.getElementById('info-container7').innerHTML = text5;
}
 });
 }
 function xbtxctddetails()
{
	tb_active=0;
 tb_inactive=0;	
tb_retrieved=0;
$.ajax({
	        url: 'markers/xbtxctd_markers.php?sdate='+sdate+'&edate='+edate,
	        type: 'POST',
			async: false,
	        
	        cache: false,
	        
	        success: function (data) {
	           
	             var markers = JSON.parse(data);
				let text5='';
				if(sdate==""&&edate=="")
				{
	        text5 += '<div style="background-color:ghostwhite"><center style="font-size: 15px;color: darkblue;"><h2><b>XBT/XCTD (Reporting Stations Since its Inception)</b></h2></center></div><table border=1 id=info-table >';
				}
				else{
					  text5 += '<div style="background-color:ghostwhite"><center style="color:black"><h2><b>XBT/XCTD</b></h2></center></div><table border=1 id=info-table >';
				}
	  	 var sno=1;

	   
var c=1;

for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
	 var date2 = new Date(marker.lotime);
	  
	   date2.setHours(date2.getHours() + 5);
date2.setMinutes(date2.getMinutes() + 30);
	var hours = Math.floor(Math.abs(date5 - date2)) / 36e5;
if(c%6==0)
{
	text5 += '<tr>';
}
		
		if(marker.status=='N')
	{
	
    
	   	  text5 += '<td bgcolor=gold>'+marker.station_id+'</td>';
		 tb_inactive++;
		 

}
else if(marker.status=='R')
	{
	
    
	   	  text5 += '<td bgcolor=red>'+marker.station_id+'</td>';
		  tb_retrieved++;
		 

}
else
{
	
	   	   	  text5 += '<td bgcolor=green>'+marker.station_id+'</td>';
tb_active++;
}
 c++;
if(c%6==0)
{
	text5 += '</tr>';
}
	
	var labelText = "TB";
    var text = L.divIcon({
        className: 'text-label',
        html: '<div style="font-size:8px;font-weight: bold; text-align: center;">'+labelText+'</div>'
    });
	   sno++;
}

text5 += '</table>';   
text5 += '</br><center><b style="color:darkblue;font-size:18px">Status:<span style="color:green">'+tb_active+ '</span>/<span style="color:#c0c011">'+tb_inactive+'</span>/<span style="color:red">'+tb_retrieved+'</span></b></center>';   

   var infoContainer = document.getElementById('info-container8');
   infoContainer.style.display = 'none';
  
			 document.getElementById('info-container8').innerHTML = text5;
}
 });
 }
document.addEventListener("DOMContentLoaded", function () {
  const toggleHeaders = document.querySelectorAll(".toggle-header");

  toggleHeaders.forEach((header) => {
    header.addEventListener("click", function () {
      const table = this.parentElement.parentElement.nextElementSibling;
      const icon = this.querySelector(".toggle-icon");
      const iconBox = this.querySelector(".toggle-icon-box");

      if (!table.classList.contains("hide")) {
        table.style.maxHeight = getComputedStyle(table).height; // Capture current height
        table.offsetHeight; // Trigger reflow
        table.classList.add("hide");
        setTimeout(() => {
          table.style.display = "none"; // Remove space after animation
        }, 500); // Match the transition duration
        icon.textContent = "+";
        iconBox.style.transform = "rotate(0deg)";
      } else {
        table.style.display = ""; // Restore display before animation
        table.offsetHeight; // Trigger reflow
        table.classList.remove("hide");
        icon.textContent = "-";
        iconBox.style.transform = "rotate(180deg)";
      }
    });
  });
});

