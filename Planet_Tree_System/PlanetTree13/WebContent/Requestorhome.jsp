<!DOCTYPE html>
<html lang="en">
<head>
<title>PlanetTree System</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Cabin_400.font.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
<script type="text/javascript" src="js/jquery.jqtransform.js" ></script>
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<%@ taglib prefix="core" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt"%>
<%@ taglib uri="http://jakarta.apache.org/taglibs/datetime-1.0" prefix="dt" %>

</head>
<body id="page4">
<div class="main">
  <!--header -->
  <header>
    <div class="wrapper">
      <h1>  </h1>
       <h1>&nbsp  </h1>
	   <h1>&nbsp  </h1>
	   <br/>
	   
	   <br/>
	   <h1>&nbsp  </h1>
    </div>
    <nav>
    <form name="linkForm" method="post">
    <input type="hidden"  class="input"  name="viewType" value=""/>
    <input type="hidden"  class="input"  name="pnr"  value=""/>
            <ul id="menu">
          <core:choose>
          <core:when test="${user.userType=='customer' }">  
		
		  </core:when>
		  <core:otherwise>
		  
		  <li ><a href="#" onClick="performAction('services');"><span><span>Service Requests</span></span></a></li>
		  </core:otherwise>
		  </core:choose>
		   <li id="menu_active" class="end"><a href="#" onClick="performAction('services');"><span><span>Service Requests</span></span></a></li>
        <li id="menu_active" class="end"><a href="#" onClick="performAction('viewprofile');"><span><span>Manage Profile</span></span></a></li>
         <li id="menu_active" class="end"><a href="#" onClick="logoutAction('logout');"><span><span>Logout</span></span></a></li>
       
      </ul>
      </form>
    </nav>
    
    <script type="text/javascript">
    
    function logoutAction(viewType) {
    	
    	document.linkForm.viewType.value=viewType;
    	document.linkForm.action = "RequestLoginServlet";
    	document.linkForm.submit();
    }
    
    function performAction(viewType) {
    	document.linkForm.viewType.value=viewType;
    	document.linkForm.action = "servicesServlet";
    	if(viewType=='viewprofile') {
    		document.linkForm.action = "RequestorprofileServlet";
    	}
    	document.linkForm.submit();
    }
    
    function performAction1(viewType,pnr) {
    	document.linkForm.viewType.value=viewType;
    	document.linkForm.pnr.value=pnr;
    	document.linkForm.action = "servicesServlet";
    	if(viewType=='cancelticket') {
    	var r = confirm("Are you sure to cancel ticket " + pnr);
    	if(r==true) {
    		document.linkForm.submit();
    	}else {
    		return false;
    	}
    	}else {
    		var window1 = window.open("printticket.jsp","bravawindow","width=800,height=800,toolbar=0 resizable=1");
    		window1.pnr=pnr;
    	}
    	//document.linkForm.submit();    	
    }
    
    function printticket(viewType,pnr,flightcode,source,destination,departuretime,totaltime,traveldate,cost,totalpassengers,passengernames,seatnumbers) {
    	var window1 = window.open("printticket.jsp","bravawindow","width=900,height=800,toolbar=0 resizable=1");
    	window1.pnr=pnr;
    	window1.flightcode=flightcode;
    	window1.source=source;
    	window1.destination=destination;
    	window1.departuretime=departuretime;
    	window1.totaltime=totaltime;
    	window1.traveldate=traveldate;
    	window1.cost=cost;
    	window1.totalpassengers=totalpassengers;
    	window1.passengernames=passengernames;
    	window1.seatnumbers=seatnumbers;
    }
    </script>

    
  </header>
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
    
      
          
           <article class="col2">
        <h3 class="pad_top1" align="center">Raise Service Request</h3>
        <form id="ContactForm" name="ContactForm" action="enquiryServlet" method="post">
         <input type="hidden" class="input" name="viewType" value="updateenquiry">
         <input type="hidden" class="input" name="id" value="${enquiry.id}">
       
          
           <div  class="wrapper"> 
              <core:if test="${not empty errorMsg}">
           <font color="red"> <core:out value="${errorMsg}"></core:out> </font>
            </core:if>
            </div>
            
            
            <div  class="wrapper"> <span>Name:</span>
              <input type="text" class="input" name="custname" required="required" value="${enquiry.name}">
            </div>
            <div  class="wrapper"> <span>Email:</span>
              <input type="email" class="input" name="emailid" data-toggle="popover" data-content="You can use letters numbers and periods" required="required" value="${enquiry.emailId}">
            </div>
            
        <div  class="wrapper">
       
        
            <div  class="textarea_box"> <span>Address</span>
              <textarea name="message" cols="1" rows="1">${user.address1}</textarea>
            </div>
            <input type="submit" value="generate co-ordinates">
            <span>Latitude</span>
             <textarea name="lat" cols="1" rows="1"></textarea>
             
                <span>Longitude</span>
             <textarea name="long" cols="1" rows="1"></textarea>
         
            <div  class="textarea_box"> <span>Reason for request</span>
              <textarea name="message" cols="1" rows="1">${enquiry.message}</textarea>
            </div>
            
            <div  class="wrapper"> <span>contact</span>
              <input type="text" class="input" name="custname" value="${user.contactNumber}">
            </div>
            
        <br/>
         <div  align="center">   <input type="submit" value="Submit" /> </div> </div>
        </form>
      </article>
    
  
    </div>
  </section>
 
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript">Cufon.now();
function initialize() {
    var address1= document.form.address.value;

        geocoder = new google.maps.Geocoder();
        geocoder.geocode({
        'address': address1
        }, function(results, status) {      
            var lat=results[0].geometry.location.lat();    
            var lng=results[0].geometry.location.lng();   
alert(results[0].geometry.location.lat());	
alert(results[0].geometry.location.lng());				
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
</body>
</html>