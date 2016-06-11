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
    <form name="linkForm" method="post" action="servicesServlet">
    <input type="hidden"  class="input"  name="viewType" value=""/>
    <input type="hidden"  class="input"  name="selectedvisit"  value=""/>
            <ul id="menu">
          <core:choose>
          <core:when test="${user.userType=='customer' }">  
		 <li ><a href="home.jsp"><span><span>Manage Reservation</span></span></a></li>
		  <li ><a href="#" onClick="performAction('viewapartments');"><span><span>View Apartments</span></span></a></li>
		  <li id="menu_active"><a href="#" onClick="performAction('viewvisits');"><span><span>View Visits</span></span></a></li>
		  </core:when>
		  <core:otherwise>
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
    

    function performAction(viewType) {
    	document.linkForm.viewType.value=viewType;
    	document.linkForm.action = "servicesServlet";
    	if(viewType=='viewprofile') {
    		document.linkForm.action = "profileServlet";
    	}
    	document.linkForm.submit();
    }
    
    
    function updateVisit(visitId) {
    	document.linkForm.viewType.value="editvisitdetails";
    	document.linkForm.selectedvisit.value=visitId;
    	document.linkForm.submit();
    }
    
    function logoutAction(viewType) {
    	
    	document.linkForm.viewType.value=viewType;
    	document.linkForm.action = "loginServlet";
    	document.linkForm.submit();
    }
    
    function deleteVisit(visitId) {
    	document.linkForm.viewType.value="deletevisitdetails";
    	document.linkForm.selectedvisit.value=visitId;
    	var r = confirm("Are you sure to delete ? ");
    	if(r==true) {
    		document.linkForm.submit();
    	}else {
    		return false;
    	}
    }
    </script>
  </header>
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
      
       <table width="100%" >
       
       <tr><td>&nbsp;</td></tr>
            <tr>
            <td colspan="2"> 
            <core:if test="${not empty errorMsg}">
            <font color="red"> <core:out value="${errorMsg}"></core:out></font>
            </core:if>
            
            </td>
              </tr>
              <tr><td>&nbsp;</td></tr>
         
    <tr>
        <td colspan="8"> <h4>Visit Details</h4> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
     <tr>
     <th>Apt. No.</th>
     <th>Flat No.</th>
     <th>Location</th>
     <th>Bedrooms</th>
     <th>Bathrooms</th>
     <th>Rent($)</th>
     <th>Visit Date</th>
     <th>Visit Time</th>
     <th>Action</th>
      </tr> 
      
      <tr><td colspan="7">&nbsp;</td></tr> 
    <core:forEach var="visit" items="${visitsList}">
    <tr align="center">
    <td><core:out value="${visit.aptNo}"></core:out> </td>
    <td><core:out value="${visit.flatNo}"></core:out> </td>
     <td><core:out value="${visit.location}"></core:out> </td>
     <td><core:out value="${visit.bedrooms}"></core:out> </td>
     <td><core:out value="${visit.bathrooms}"></core:out> </td>
    <td><core:out value="${visit.rent}"></core:out></td>
    <td><core:out value="${visit.visitDate}"></core:out></td>
     <td><core:out value="${visit.visitTime}"></core:out> </td>
    <td> <a href="#"  onClick="deleteVisit('<core:out value="${visit.visitId}"/>');">Delete</a></td>  
    </tr>
    
    </core:forEach>
    </table>
      
    </div>
  </section>
  <!--content end-->
 
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>