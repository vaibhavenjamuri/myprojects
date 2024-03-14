<!DOCTYPE html>
<html lang="en">
<head>
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
		 <li><a href="home.jsp"><span><span>Manage Reservation</span></span></a></li>
		  <li     id="menu_active"><a href="#" onClick="performAction('viewapartments');"><span><span>View Apartments</span></span></a></li>
		  <li><a href="#" onClick="performAction('viewvisits');"><span><span>View Visits</span></span></a></li>
		  </core:when>
		  <core:otherwise>
		  <li    id="menu_active"><a href="#"><span><span>Manage Reservation</span></span></a></li>
		   <li ><a href="paybill.jsp"><span><span>Pay Rent</span></span></a></li>
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
    
    function linkAction(aptId,viewType) {
    	document.ContactForm.viewType.value = viewType;
    	document.ContactForm.aptid.value = aptId;
    	document.ContactForm.submit();
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
    

    function bookFlight(flightCode) {
    	document.ContactForm.flightcode.value=flightCode;
    	document.linkForm.viewType.value="bookflight";
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
    <input type="hidden" name="aptid" value="" />
    <input type="hidden" name="viewType" value="" />
   <table width="100%" >
   
    <tr>
        <td>Apartment Type : </td>
        <td> <core:if test="${apartment1.flatType==1}">Studio </core:if>
        <core:if test="${apartment1.flatType==2}">Apartment </core:if>
         </td>
        <td> Rent Range($) : </td>
        <td> <core:out value="${apartment1.fromRent }"/> to <core:out value="${apartment1.toRent }"/> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
   <tr>
        <td>Bedrooms : </td>
        <td> <core:out value="${apartment1.bedrooms }"/>
         </td>
        <td> Bathrooms : </td>
        <td> <core:out value="${apartment1.bathrooms }"/> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
   
   <tr>
        <td>Location : </td>
        <td> <core:out value="${apartment1.location }"/>
         </td>
        <td> City : </td>
        <td> <core:out value="${apartment1.city }"/> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
   
   
   
    <tr>
        <td colspan="4"> <h4>Search Results : <core:out value="${results}"/> apartment(s) found.</h4> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            
           </table>
    <core:set var="i" value="1" scope="page"/>
    <table  width="100%">
     
    <core:forEach var="apartment" items="${apartmentsList}">
    <tr>
    <td>
  <table>
    <tr>
  <td>Apt. Name :</td> <td><core:out value="${apartment.aptNo}"/> </td></tr>
 <tr><td>Flat No :</td>   <td><core:out value="${apartment.flatNo}"/> </td></tr>
     <tr><td>Bedrooms : </td> <td><core:out value="${apartment.bedrooms}"/> </td></tr>
     <tr><td>Bathrooms :</td> <td><core:out value="${apartment.bathrooms}"/> </td></tr>
     <tr><td>Maximum Persons :</td> <td><core:out value="${apartment.maxPersons}"/> </td></tr>
     <tr><td>Rent($) : </td> <td><core:out value="${apartment.rent}"/> </td></tr>
     <tr><td>Other Charges($) : </td> <td><core:out value="${apartment.otherCharges}"/> </td></tr>
     <tr><td>Location :</td> <td><core:out value="${apartment.location}"/> </td></tr>
     <tr><td>Rent Deposit(in Months) :</td> <td><core:out value="${apartment.advance}"/> </td></tr>
     <tr><td>Agreement(in years) :</td> <td><core:out value="${apartment.bond}"/> </td></tr>
     <tr><td>Description :</td> <td><core:out value="${apartment.description}"/> </td></tr>
    
    </table>
    </td>
    
    <td>
  <table>
  <tr>
  <core:if test="${i=='1' }">
  <td>  <img src="images/im1.jpg" style="width:104px;height:128px;"></td>
  <td>  &nbsp;</td>
  <td>  <img src="images/im2.jpg" style="width:104px;height:128px;"></td>
  <td>  &nbsp;</td>
   <td>  <img src="images/im3.jpg" style="width:104px;height:128px;"></td>
  <td>  &nbsp;</td>
  <td>  <img src="images/im4.jpg" style="width:104px;height:128px;"></td>
  </core:if>
  <core:if test="${i=='2' }">
  <td>  <img src="images/im5.jpg" style="width:104px;height:128px;"></td>
  <td>  &nbsp;</td>
  <td>  <img src="images/im9.jpg" style="width:104px;height:128px;"></td>
  <td>  &nbsp;</td>
   <td>  <img src="images/im7.jpg" style="width:104px;height:128px;"></td>
  <td>  &nbsp;</td>
  <td>  <img src="images/im8.jpg" style="width:104px;height:128px;"></td>
  </core:if>
  <core:choose>
  <core:when test="${i=='1'}"><core:set var="i" value="2"/>
  </core:when>
  <core:otherwise><core:set var="i" value="1" />
  </core:otherwise>
  </core:choose>
  <td>  &nbsp;</td>
  <td>  &nbsp;</td>
  <td>  &nbsp;</td>
  <td><a href="#" class="button1" onClick="linkAction('${apartment.aptId}','visit');"><strong>Visit</strong></a> 
  <br/>
  <br/>
  <br/>
  <br/>
  <a href="#" class="button1" onClick="linkAction('${apartment.aptId}','reserve');"><strong>Reserve</strong></a> 
  </td>
  </tr>
         </table>
    </td>
      
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    </core:forEach>
    </table>
    
    </form>
  </section>
  <!--content end-->
  <!--footer -->
  <footer>
    <div class="wrapper">
      
    </div>
  </footer>
  <!--footer end-->
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>