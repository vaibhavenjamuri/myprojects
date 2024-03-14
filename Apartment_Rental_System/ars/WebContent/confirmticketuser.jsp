<!DOCTYPE html>
<html lang="en">
<head>
<title>AirLines | Services</title>
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
      <h1><a href="index.html" id="logo">AirLines</a></h1>
      <span id="slogan">Fast, Frequent &amp; Safe Flights</span>
      <nav id="top_nav">
        
      </nav>
    </div>
    <nav>
    <form name="linkForm" method="post">
    <input type="hidden"  class="input"  name="viewType" value=""/>
    <input type="hidden"  class="input"  name="pnr"  value=""/>
            <ul id="menu">
		 <li  ><a href="#" onClick="performAction('viewticket');"><span><span>Manage Tickets</span></span></a></li>
		  <li   id="menu_active"><a href="#" onClick="performAction('viewflights');"><span><span>View Flights</span></span></a></li>
        <li><a href="#" onClick="performAction('viewprofile');"><span><span>Manage Profile</span></span></a></li>
        <li><a href="#" onClick="performAction('viewhistory');"><span><span>View History</span></span></a></li>
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
    		document.ContactForm.submit();
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
	
	    </div>
    <form name="ContactForm" id="ContactForm" method="post" action="servicesServlet">
    <input type="hidden" name="viewType" value="bookflightconfirm2" />
    <table>
    <tr>
        <td colspan="2"> <h4>PNR Status : <core:out value="${bookedTicket.pnr}"></core:out></h4> </td>
            </tr>
    
            
        <tr><td>&nbsp;</td></tr>
            <tr>
            <td colspan="2"> 
            <core:if test="${not empty errorMsg}">
             <font color="red"><core:out value="${errorMsg}"></core:out></font>
            </core:if>
            
            </td>
              </tr>
              <tr><td>&nbsp;</td></tr>
              
      
      <tr><td colspan="4">&nbsp;</td></tr> 
    <tr>
    <td width="30%" class="inputtable"> Flight Code :</td>
    <td width="10%" class="inputtable"><core:out value="${bookedTicket.flightCode}"/></td>
    
    <td class="inputtable">Cost($) :</td>
    <td class="inputtable"><core:out value="${bookedTicket.totalFare}"/> </td>
    
    </tr>
    
    <tr >
    <td class="inputtable">Source :</td>
    <td class="inputtable"><core:out value="${bookedTicket.source}"/> </td>
    
    <td class="inputtable">Destination :</td>
    <td class="inputtable"><core:out value="${bookedTicket.destination}"/> </td>
    
    </tr>
    
    <tr >
    <td class="inputtable">Departure Time(hh:mm) :</td>
    <td class="inputtable"> <core:out value="${bookedTicket.departureTime}"/></td>
    
    <td class="inputtable">Journey Time(hh:mm) :</td>
    <td class="inputtable"><core:out value="${bookedTicket.totalTime}"/></td>
    
    </tr>
    
    <tr >
    <td class="inputtable">Travel Date :</td>
    <td class="inputtable"><core:out value="${bookedTicket.travelDate}"/></td>
    
    <td class="inputtable">Total Passengers :</td>
    <td class="inputtable"><core:out value="${bookedTicket.totalPassengers}"/> </td>
    
        </tr>
    
    <tr >
    
    <td class="inputtable">Passenger Names :</td>
    <td class="inputtable"> <core:out value="${bookedTicket.passengerNames}"/></td>
    
    <td class="inputtable">Seat Numbers :</td>
    <td class="inputtable"><core:out value="${bookedTicket.seatNumbers}"/> </td>
    
    </tr>
    
    <core:if test="${not empty bookedTicket.froDate }">

<tr >
    <td class="inputtable">Return Date :</td>
    <td class="inputtable"><core:out value="${bookedTicket.froDate}"/></td>
    
    <td class="inputtable">Total Passengers :</td>
    <td class="inputtable"><core:out value="${bookedTicket.totalPassengers}"/> </td>
    
        </tr>
    
    <tr >
    
    <td class="inputtable">Passenger Names :</td>
    <td class="inputtable"> <core:out value="${bookedTicket.passengerNames}"/></td>
    
    <td class="inputtable">Seat Numbers :</td>
    <td class="inputtable"><core:out value="${bookedTicket.froSeatNumbers}"/> </td>
    
    </tr>
    
    
    </core:if>

   <tr><td colspan="2">&nbsp;</td></tr>
               <tr><td>
                   <a href="#" class="button1" onClick="window.open('printticket2.jsp','bravawindow','width=900,height=800,toolbar=0 resizable=1');"><strong>Print</strong></a>
                  </td></tr>
    
    </table>
    </form>
  </section>
  
  <footer>
    <div class="wrapper">
      
    </div>
  </footer>
  <!--footer end-->
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>