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
            <ul id="menu">
        <li><a href="addapartments.jsp"><span><span>Modify Flight Details</span></span></a></li>
        <li><a href="viewpassengers.jsp"><span><span>View Passengers</span></span></a></li>
        <li   id="menu_active"><a href="modifyoffers.jsp"><span><span>Modify Offers</span></span></a></li>
         <li><a href="#" onClick="modifyFlight('enquiryhome');"><span><span>View Enquiries</span></span></a></li>
        <li class="end"><a href="index.jsp"><span><span>Logout</span></span></a></li>
      </ul>
    </nav>
     <script type="text/javascript">
    
    function modifyFlight(viewType) {
    	document.ContactForm.viewType.value=viewType;
    	if(viewType=='enquiryhome') {
    		document.ContactForm.action="enquiryServlet";
    	}
    	document.ContactForm.submit();
    }    
    
    function updateOffer(offerId) {
    	document.ContactForm.viewType.value="editofferdetails";
    	document.ContactForm.selectedoffer.value=offerId;
    	document.ContactForm.submit();
    }
    </script>
  </header>
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
	
	      <article class="col1">
        <div class="box1">
          <h2 class="top">Apartment Details</h2>
          <div class="pad">
           
            <ul class="pad_bot2 list1">
              <li> <a href="addoffers.jsp">Add New Offer</a> </li>
              <li> <a  href="#" onClick="modifyFlight('editoffer');">Edit Offer Details</a> </li>
              <li><a href="#" onClick="modifyFlight('deleteoffer');">Delete Offer Details</a> </li>
            </ul>
          </div>
        </div>
      </article>  
	
      <article class="col2">
      
 <h3 class="pad_top1" align="center">Edit Offer Details</h3>
        <form name="ContactForm" id="ContactForm" action="offersServlet" method="post">
        <input type="hidden"  class="input"  name="viewType" required="required" value="editoffer"/>
        <input type="hidden"  class="input"  name="selectedoffer" required="required" value=""/>
        <table align="center">
                    
        <tr>
        <td> Offer Name : </td>
        <td> <input type="text"  class="input"  name="offername"  value="offer1"/></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
                    
              <tr><td>&nbsp;</td></tr>
              <tr>
					<td colspan="2" align="center"><input type="submit" value="Search" /></td>
				</tr>
		
              </table>
    </form>
    
      </article>
    </div>
    
    <table width="100%">
    <tr>
        <td colspan="6"> <h4>Offer Details</h4> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
     <tr>
     <th>Offer Name</th>
     <th>Discount (%)</th>
     <th>Validity</th>
     <th>Source</th>
     <th>Destination</th>
     <th>Action</th>
      </tr>  
         
           <tr><td colspan="4">&nbsp;</td></tr> 
    <core:forEach var="offer" items="${offersList}">
    <tr align="center">
    <td><core:out value="${offer.offerName}"></core:out> </td>
    <td><core:out value="${offer.discount}"></core:out> </td>
     <td><core:out value="${offer.validity}"></core:out> </td>
     <td><core:out value="${offer.source}"></core:out> </td>
     <td><core:out value="${offer.destination}"></core:out> </td>
    <td><a href="#"  onClick="updateOffer('<core:out value="${offer.offerId}"/>');">Edit</a></td>
    
    </tr>
    
    </core:forEach>
    
    </table>
    
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