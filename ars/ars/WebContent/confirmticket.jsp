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
    
      <ul id="menu">
        <li id="menu_active"><a href="index.jsp"><span><span>View Flights</span></span></a></li>
        <li><a href="#" onClick="performAction('viewoffers');"><span><span>Offers</span></span></a></li>
        <li><a href="services.jsp"><span><span>Services</span></span></a></li>
        <li><a href="contactus.jsp"><span><span>Contact Us</span></span></a></li>
        <li class="end"><a href="login.jsp"><span><span>Login</span></span></a></li>
      </ul>
      </form>
    </nav>
    
    
    <script type="text/javascript">
    
    
    function performAction(viewType) {
    	document.linkForm.viewType.value=viewType;
    	document.linkForm.action = "offersServlet";
    	document.linkForm.submit();
    }
    
    function bookFlight(flightCode) {
    	document.ContactForm.flightcode.value=flightCode;
    	document.ContactForm.action = "servicesServlet";
    	document.ContactForm.submit();
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