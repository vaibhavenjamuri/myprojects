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
    <input type="hidden" name="flightcode" value="" />
    <input type="hidden" name="viewType" value="bookflightconfirm" />
    <table width="100%" >
    <tr>
        <td colspan="8"> <h4>Flight Details</h4> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
     <tr>
     <th>Flight Code</th>
     <th>Source</th>
     <th>Destination</th>
     <th>Journey Time(hh:mm)</th>
     <th>Departure(hh:mm)</th>
     <th>Economic Fare($)</th>
     <th>Executive Fare($)</th>
      </tr> 
      
      <tr><td colspan="7">&nbsp;</td></tr> 
    <tr align="center">
    <td><core:out value="${flight.flightCode}"></core:out> </td>
    <td><core:out value="${flight.source}"></core:out> </td>
     <td><core:out value="${flight.destination}"></core:out> </td>
     <td><core:out value="${flight.totalTime}"></core:out> </td>
     <td><core:out value="${flight.departureTime}"></core:out> </td>
      <td><core:out value="${flight.econSeatFare}"></core:out> </td>
     <td><core:out value="${flight.execSeatFare}"></core:out> </td>
    
    </tr>
    
    
      <tr><td colspan="7">&nbsp;</td></tr> 
      </table>
      
      <table>
      
       <tr><td colspan="4">&nbsp;</td></tr>
    
    
    <tr>
        <td colspan="4"> <h4>Passenger Details</h4> </td>
            </tr>
   
    <tr><td>&nbsp;</td></tr>  
       <tr>
        <td> Travel Date : </td>
        <td> <input type="text"  class="input"  name="todate"  value="${todate}"/></td>
        
        <td align="right"> Return Date : </td>
        <td> <input type="text"  class="input"  name="frodate"  value="${frodate }"/></td>
            </tr>
   
   
   
    <tr><td>&nbsp;</td></tr>  
       <tr>
        <td> Name : </td>
        <td> <input type="text"  class="input"  name="name1"  value="customer1"/></td>
        
        <td align="right"> Age : </td>
        <td> <input type="text"  class="input"  name="age1"  value="23"/></td>
            </tr>
           <tr><td colspan="7">&nbsp;</td></tr> 
        <tr>
        <td> Name  : </td>
        <td> <input type="text"  class="input"  name="name2"  value="customer2"/></td>
        
         <td align="right"> Age : </td>
        <td> <input type="text"  class="input"  name="age2"  value="30"/></td>
            </tr>
            
               <tr><td colspan="7">&nbsp;</td></tr> 
        <tr>
        <td> Name  : </td>
        <td> <input type="text"  class="input"  name="name3"  value="customer3"/></td>
        
         <td align="right"> Age : </td>
        <td> <input type="text"  class="input"  name="age3"  value="45"/></td>
            </tr>
            
               <tr><td colspan="7">&nbsp;</td></tr> 
        <tr>
        <td> Name : </td>
        <td> <input type="text"  class="input"  name="name4"  value=""/></td>
        
         <td align="right"> Age : </td>
        <td> <input type="text"  class="input"  name="age4"  value=""/></td>
            </tr>
            
               <tr><td colspan="7">&nbsp;</td></tr> 
        <tr>
        <td> Name  : </td>
        <td> <input type="text"  class="input"  name="name5"  value=""/></td>
        
         <td align="right"> Age : </td>
        <td> <input type="text"  class="input"  name="age5"  value=""/></td>
            </tr>
            
              <tr><td>&nbsp;</td></tr>
   

     <tr>
        <td>Seat Type : </td>
        <td> 
		<select name="seattype"> 
     	<option value="econ">Economic</option>
     	<option value="exec">Executive</option>
		</select>
</td>
</tr>
            
   
            <tr><td>&nbsp;</td></tr>
    <tr>
        <td colspan="8"> <h4>Offer Details</h4> </td>
            </tr>
   
    <tr><td>&nbsp;</td></tr>
   

     <tr>
        <td>Offer Type : </td>
        <td> 
		<select name="offertype"> 
   
   <core:forEach var="offer" items="${offersList}">
   <option value="${offer.offerId }"><core:out value="${offer.offerName }"/> (<core:out value="${offer.discount }"/> %)</option>
   
   </core:forEach>
</select>
</td>
</tr>   
   
            <tr><td>&nbsp;</td></tr>
    <tr>
        <td colspan="8"> <h4>Payment Details</h4> </td>
            </tr>
   
    <tr><td>&nbsp;</td></tr>
    
        <tr>
        <td>Card Type : </td>
        <td> 
		<select name="cardtype"> 
		<option value="mastercard">Master Card</option>
		<option value="visa">Visa</option>
		</select>
		</td>
         <td> Card Number : </td>
        <td> <input type="text"  class="input"  name="cardnumber"  value="123456789567"/></td>
            </tr>
            
            <tr><td>&nbsp;</td></tr>
    
      
      <tr>
        <td>Expiration Date : </td>
        <td> 
		<select name="expmm"> 
		<option value="mm">MM</option>
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09" selected>09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		</select>
		
		<select name="expyyyy"> 
		<option value="yyyy">YYYY</option>
		<option value="2016">2016</option>
		<option value="2017" selected>2017</option>
		<option value="2018">2018</option>
		<option value="2019">2019</option>
		</select>
		</td>
         <td> Cvv Number : </td>
        <td> <input type="password"  class="input"  name="cvv"  value="123"/></td>
            </tr>
            
          <tr><td colspan="2">&nbsp;</td></tr>
               <tr><td>
                   <a href="#" class="button1" onClick="document.ContactForm.submit();"><strong>Book Flight</strong></a>
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