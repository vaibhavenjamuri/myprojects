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
        <li ><a href="addapartments.jsp"><span><span>Modify Flight Details</span></span></a></li>
        <li  id="menu_active"><a href="viewpassengers.jsp"><span><span>View Passengers</span></span></a></li>
        <li><a href="modifyoffers.jsp"><span><span>Modify Offers</span></span></a></li>
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
    </script>
  </header>
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
	
      
 <h3 class="pad_top1" align="center">View Passenger Details</h3>
        <form id="ContactForm" action="profileServlet" method="post">
        <input type="hidden"  class="input"  name="viewType" required="required" value="register"/>
        <table width="100%" align="center">
                    
        <tr >
        <td align="right"> Flight Name or Code : </td>
        <td> <input type="text"  class="input"  name="flightname" required="required" value="F001"/></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
                    
              <tr><td>&nbsp;</td></tr>
              <tr>
					<td colspan="2" align="center"><input type="submit" value="Search" /></td>
				</tr>
		
              </table>
    </form>
    
    </div>
    
    <table width="100%">
    <tr>
        <td colspan="2"> <h4>Flight Details</h4> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
     <tr>
     <th>Flight Code</th>
     <th>Source</th>
     <th>Destination</th>
     <th>Arrival</th>
     <th>Departure</th>
     <th>Total Seats</th>
     <th>Action</th>
      </tr>  
         
    
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