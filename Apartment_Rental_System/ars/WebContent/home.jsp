<!DOCTYPE html>
<html lang="en">
<head>
<title>Apartmental Rental System</title>
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
		 <li    id="menu_active"><a href="#"><span><span>Manage Reservation</span></span></a></li>
		  <li ><a href="#" onClick="performAction('viewapartments');"><span><span>View Apartments</span></span></a></li>
		  <li><a href="#" onClick="performAction('viewvisits');"><span><span>View Visits</span></span></a></li>
		  </core:when>
		  <core:otherwise>
		  <li    id="menu_active"><a href="#"><span><span>Manage Reservation</span></span></a></li>
		   <li><a href="paybill.jsp"><span><span>Pay Rent</span></span></a></li>
		  <li ><a href="#" onClick="performAction('services');"><span><span>Service Requests</span></span></a></li>
		  </core:otherwise>
		  </core:choose>
        <li><a href="#" onClick="performAction('viewprofile');"><span><span>Manage Profile</span></span></a></li>
         <li class="end"><a href="#" onClick="logoutAction('logout');"><span><span>Logout</span></span></a></li>
       
      </ul>
      </form>
    </nav>
    
    <script type="text/javascript">
    
    function logoutAction(viewType) {
    	
    	document.linkForm.viewType.value=viewType;
    	document.linkForm.action = "loginServlet";
    	document.linkForm.submit();
    }
    
    function performAction(viewType) {
    	document.linkForm.viewType.value=viewType;
    	document.linkForm.action = "servicesServlet";
    	if(viewType=='viewprofile') {
    		document.linkForm.action = "profileServlet";
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
      <form name="ContactForm" id="ContactForm" action="servicesServlet" method="post"> 
          <table width="100%" >
    <tr>
        <td colspan="8"> <h4>Reservation Details</h4> </td>
            </tr>
            
            
              <tr><td>&nbsp;</td></tr>
            <tr>
            <td colspan="8"> 
            <core:if test="${not empty errorMsg}">
             <font color="red"><core:out value="${errorMsg}"></core:out></font>
            </core:if>
            
            </td>
              </tr>
              <tr><td>&nbsp;</td></tr>
       
       
            <tr><td>&nbsp;</td></tr>
     <tr>
     <th>Apt. No.</th>
     <th>Flat No.</th>
     <th>Rent($)</th>
     <th>Bedrooms</th>
     <th>Bathrooms</th>
     <th>Location</th>
     <th>Check-In Date</th>
     <th>Payment</th>
      </tr> 
      
      <tr><td colspan="7">&nbsp;</td></tr> 
    <tr align="center">
    <td><core:out value="${apartment1.aptNo}"></core:out> </td>
    <td><core:out value="${apartment1.flatNo}"></core:out> </td>
     <td><core:out value="${apartment1.rent}"></core:out> </td>
     <td><core:out value="${apartment1.bedrooms}"></core:out> </td>
     <td><core:out value="${apartment1.bathrooms}"></core:out> </td>
     <td><core:out value="${apartment1.location}"></core:out> </td>
    <td><core:out value="${user.checkinDate}"></core:out></td>
    <td><core:out value="${user.payment}"></core:out></td>
    
    </tr>
    
    </table>
    </form>
    </div>
  </section>
 
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>