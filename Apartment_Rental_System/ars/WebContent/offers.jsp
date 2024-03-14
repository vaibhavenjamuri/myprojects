<!DOCTYPE html>
<html lang="en">
<head>
<title>AirLines | Offers</title>
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
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">.main, .tabs ul.nav a, .content, .button1, .box1, .top { behavior:url("../js/PIE.htc")}</style>
<![endif]-->


<%@ taglib prefix="core" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt"%>
<%@ taglib uri="http://jakarta.apache.org/taglibs/datetime-1.0" prefix="dt" %>


</head>
<body id="page2">
<div class="main">
  <!--header -->
  <header>
    <div class="wrapper">
      <h1><a href="index.html" id="logo">AirLines</a></h1>
      <span id="slogan">Fast, Frequent &amp; Safe Flights</span>
      <nav id="top_nav">
        <ul>
          <li><a href="index.html" class="nav1">Home</a></li>
          <li><a href="#" class="nav2">Sitemap</a></li>
          <li><a href="contacts.html" class="nav3">Contact</a></li>
        </ul>
      </nav>
    </div>
   <nav>
        <form name="linkForm" method="post">
    <input type="hidden"  class="input"  name="viewType" value=""/>
    
      <ul id="menu">
        <li><a href="index.jsp"><span><span>View Flights</span></span></a></li>
        <li id="menu_active"><a href="#" onClick="performAction('viewoffers');"><span><span>Offers</span></span></a></li>
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
    
    
    </script>

  </header>
  <!-- / header -->
   
    <table width="100%">
    <tr>
        <td colspan="5"> <h4>Offer Details</h4> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
     <tr>
     <th>Offer Name</th>
     <th>Discount (%)</th>
     <th>Validity</th>
     <th>Source</th>
     <th>Destination</th>
      </tr>  
         
           <tr><td colspan="5">&nbsp;</td></tr> 
    <core:forEach var="offer" items="${offersList}">
    <tr align="center">
    <td><core:out value="${offer.offerName}"></core:out> </td>
    <td><core:out value="${offer.discount}"></core:out> </td>
     <td><core:out value="${offer.validity}"></core:out> </td>
     <td><core:out value="${offer.source}"></core:out> </td>
     <td><core:out value="${offer.destination}"></core:out> </td>
    
    </tr>
    
    </core:forEach>
    
    </table>
</body>
</html>