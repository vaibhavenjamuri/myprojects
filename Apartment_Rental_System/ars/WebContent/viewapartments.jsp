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

    
      <ul id="menu">
        <li id="menu_active"><a href="index.jsp"><span><span>Search Apartments</span></span></a></li>
        <li><a href="contactus.jsp"><span><span>Contact Us</span></span></a></li>
        <li   class="end"><a href="login.jsp"><span><span>Login</span></span></a></li>
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
        
    function linkAction(aptId) {
    	var userName = '${username}';
    	if(userName==null || userName.trim().length==0) {
    		alert("Please login to Visit or Reserve Selected apartment.");
    	}
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
    <input type="hidden" name="viewType" value="bookflight" />
    
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
  <td><a href="#" class="button1" onClick="linkAction('${apartment.aptId}');"><strong>Visit</strong></a> 
  <br/>
  <br/>
  <br/>
  <br/>
  <a href="#" class="button1" onClick="linkAction('${apartment.aptId}');"><strong>Reserve</strong></a> 
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