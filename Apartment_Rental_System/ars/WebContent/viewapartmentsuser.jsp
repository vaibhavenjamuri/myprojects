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
		 <li  ><a href="home.jsp"><span><span>Manage Reservation</span></span></a></li>
		  <li   id="menu_active"><a href="#" onClick="performAction('viewapartments');"><span><span>View Apartments</span></span></a></li>
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
    <div class="for_banners">
      <article class="col1">
                  <core:if test="${not empty errorMsg}">
             <font color="red"><core:out value="${errorMsg}"></core:out></font>
            </core:if>
      
        <div class="tabs">
          <ul class="nav">
            <li class="selected"><a href="#">Search Apartments</a></li>
          </ul>
          <div class="content">
            <div class="tab-content" id="Flight">
              <form id="form_1" name="form_1" action="servicesServlet" method="post">
              <input type="hidden" class="input" name="viewType" id="viewType"  value="searchapartments">
                <div>
					                 
                    <table>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr>
                    <td>Apartment Type</td>
                    <td><select name="flattype"  class="input7">
                    	<option value="1" selected>Studio</option>
                    	<option value="2">Apartment</option>                
                    </select></td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    
                     <tr>
                    <td>Bedrooms</td>
                    <td><select name="bedrooms"  class="input7">
                    	<option value="1" selected>1</option>
                    	<option value="2">2</option>
                    	<option value="3">3</option>
                    	<option value="4" >4</option>
                    	<option value="5">5</option>
                    
                    </select></td>
                    </tr>
                    
                        <tr><td colspan="2">&nbsp;</td></tr>
                    
                     <tr>
                    <td>Bathrooms</td>
                    <td><select name="bathrooms"  class="input7">
                    	<option value="1" selected>1</option>
                    	<option value="2">2</option>
                    	<option value="3">3</option>
                    	<option value="4" >4</option>
                    	<option value="5">5</option>
                    
                    </select></td>
                    </tr>
                    
                    <tr><td colspan="2">&nbsp;</td></tr>
                
                <tr>
                    <td>Rent Range($)</td>
                    <td><select name="from" class="input8">
                    <option value="200">200</option>
                    	<option value="300" selected>300</option>
                    	<option value="400">400</option>
                      </select>     
                    <select name="to" class="input8">
                    <option value="500">500</option>
                    	<option value="600" selected>600</option>
                    	<option value="700">700</option>
                      </select>
                     </td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                
                
                
                <tr>
                    <td>Location</td>
                    <td><select name="location" class="input7">
                    <option value="ming">Ming Street</option>
                    	<option value="king">King Street</option>
                    	<option value="hudson">Hudson Street</option>
                      </select>
                    </td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                
                
                
                <tr>
                    <td>City</td>
                    <td><select name="city" class="input7">
                    <option value="warrensburg">Warrensburg</option>
                    	<option value="kansas" >Kansas</option>
                    	<option value="rolla">Rolla</option>
                      </select>
                    </td>
                    </tr>
                    
                    <tr><td colspan="2">&nbsp;</td></tr>
                
                
                
                <tr>
                    <td>State</td>
                    <td><select name="state" class="input7">
                    <option value="missouri">Missouri</option>
                    	<option value="Newyork" >Newyork</option>
                    	<option value="California">California</option>
                      </select>
                    </td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
               <tr><td>
                   <a href="#" class="button1" onClick="document.form_1.submit();"><strong>Search</strong></a>
                  </td></tr>
                  </table>
                </div>
              </form>
            </div>
            
            
          </div>
        </div>
      </article>
    </div>
    
  </section>
 
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>