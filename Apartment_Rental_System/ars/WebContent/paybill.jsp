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
		 <li ><a href="home.jsp"><span><span>Manage Reservation</span></span></a></li>
		  <li    id="menu_active"><a href="#" onClick="performAction('viewapartments');"><span><span>View Apartments</span></span></a></li>
		  <li><a href="#" onClick="performAction('viewvisits');"><span><span>View Visits</span></span></a></li>
		  </core:when>
		  <core:otherwise>
		  <li ><a href="#"><span><span>Manage Reservation</span></span></a></li>
		   <li    id="menu_active"><a href="paybill.jsp"><span><span>Pay Rent</span></span></a></li>
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
    
    function printticket() {
    	var window1 = window.open("printticket.jsp","bravawindow","width=900,height=800,toolbar=0 resizable=1");
    	
    }
    </script>

  </header>
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
	
	    </div>
    <form name="ContactForm" id="ContactForm" method="post" action="paymentServlet">
    <input type="hidden" name="viewType" value="paybill" />
   
    <table width="100%" >
    
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
            <td colspan="7"> 
            <core:if test="${not empty errorMsg}">
             <font color="red"><core:out value="${errorMsg}"></core:out></font>
 			Click <a href="#" onClick="printticket();">here  </a> to take a printout of this page.           
            </core:if>
            
            </td>
              </tr>
              <tr><td>&nbsp;</td></tr>
    
    
    <tr>
        <td colspan="7"> <h4>Apartment Details</h4> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
     <tr>
     <th>Apartment Name</th>
     <th>Flat Name</th>
     <th>Flat Type</th>
     <th>Bedrooms</th>
     <th>Bathrooms</th>
     <th>Rent</th>
     <th>Location</th>
      </tr> 
      
      <tr><td colspan="7">&nbsp;</td></tr> 
    <tr align="center">
    <td><core:out value="${apartment1.aptNo}"></core:out> </td>
    <td><core:out value="${apartment1.flatNo}"></core:out> </td>
     <td><core:out value="${apartment1.flatType}"></core:out> </td>
     <td><core:out value="${apartment1.bedrooms}"></core:out> </td>
     <td><core:out value="${apartment1.bathrooms}"></core:out> </td>
     <td><core:out value="${apartment1.rent}"></core:out> </td>
     <td><core:out value="${apartment1.location}"></core:out> </td> 
      </table>
      
      <table>
      
       <tr><td colspan="4">&nbsp;</td></tr>
    
    
    <tr>
        <td colspan="4"> <h4>Rent Payment</h4> </td>
            </tr>
   
    <tr><td>&nbsp;</td></tr>  
       <tr>
        <td> Payment For : </td>
        <td>
             
        <select id="mon" name="mon"> 
        <option value="mon">MON </option>
        <option value="01" selected>01 </option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10 </option>
        <option value="11">11 </option>
        <option value="12">12 </option>
        </select>
        
        <select id="yyyy" name="yyyy"> 
        <option value="yyyy">YYYY </option>
        <option value="2015" selected>2015</option>
        <option value="2016">2016</option>
        
        </select>
        
        </td>
        </tr>
        
             <tr><td colspan="2">&nbsp;</td></tr>
         <tr>  
         <td> Payment($) : </td>
        <td> <input type="text"  class="input"  name="payment"  value="200"/></td>
            </tr>
            
           
             <tr><td colspan="2">&nbsp;</td></tr>
             
       
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
        <td> <input type="text"  class="input"  name="cardno"  value="123456789567"/></td>
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
                   <a href="#" class="button1" onClick="document.ContactForm.submit();"><strong>Pay Rent</strong></a>
                  </td></tr>  
    </table>
    </form>
  </section>
  
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>