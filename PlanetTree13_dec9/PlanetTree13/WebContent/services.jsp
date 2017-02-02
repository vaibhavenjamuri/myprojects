<!DOCTYPE html>
<html lang="en">
<head>
<title>PlanetTree System</title>
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
<body id="page6">
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
		 
		
		  </core:when>
		  <core:otherwise>
		  
		
		
		  </core:otherwise>
		  </core:choose>
		  <li   id="menu_active"><a href="services.jsp" "><span><span>Raise Request</span></span></a></li>
        <li id="menu_active"><a href="Rmanageprofile.jsp"><span><span>Manage Profile</span></span></a></li>
         <li id="menu_active" class="end"><a href="#" onClick="logoutAction('logout');"><span><span>Logout</span></span></a></li>
       
      </ul>
      </form>
    </nav>

    
    <script type="text/javascript">
    
    function logoutAction(viewType) {
    	
    	document.linkForm.viewType.value=viewType;
    	document.linkForm.action = "RequestLoginServlet";
    	document.linkForm.submit();
    }
    
    function performAction(viewType) {
    	document.linkForm.viewType.value=viewType;
    	if(viewType=='viewprofile') {
    		document.linkForm.action = "manageprofile.jsp";
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
    		document.linkForm.submit();
    	}else {
    		return false;
    	}
    	}else {
    		var window1 = window.open("printticket.jsp","bravawindow","width=800,height=800,toolbar=0 resizable=1");
    		window1.pnr=pnr;
    	}
    	//document.linkForm.submit();    	
    }
    
   
    </script>

  </header>
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1" >
         <form name="form3" id="form3" method="post" action="ReqStatusServlet">
<table align="center">
<tr>  <td colspan="2"> 
            <core:if test="${not empty errMsg}">
            <font color="red"> <core:out value="${errMsg}"></core:out></font>
            </core:if>
            
            </td></tr>
    <tr><td>Enter exact location to check your request </td></tr>
<tr><td><input type="text"  class="input" name="Add"></td></tr>
<tr><td><input type="submit" value="search"></td></tr>
</table>
</form>
      <article class="col2">
        <h3 class="pad_top1" align="center">Raise Request</h3>
        <form id="ContactForm" name="ContactForm"  action="enquiryServlet" method="post">
         <input type="hidden" class="input" name="viewType" value="enquirysubmit">
         <input type="hidden" class="input" name="id" value="${enquiry.id}">
          <div>
          
           <div  class="wrapper"> 
              <core:if test="${not empty errorMsg}">
           <font color="red"> <core:out value="${errorMsg}"></core:out> </font>
            </core:if>
            </div>
            
            
            <div  class="wrapper"> <span>Name*:</span>
              <input type="text" class="input" name="custname" value="${enquiry.name}" required>
            </div>
            <div  class="wrapper"> <span>Email*:</span>
              <input type="email" class="input" name="emailid" data-toggle="popover" data-content="You can use letters numbers and periods" value="${enquiry.emailId}" required>
            </div>
            
        
       
          
             <div  class="wrapper"> <span>Location*</span>
              <input type="text" class="input" name="Address1"  id="Address1" value="${enquiry.address1}" onchange="mySF()">
            </div>
        
          
            <span>Latitude</span>
            <input type="text" class="input" name="lat">
             
                <span>Longitude</span>
             <input type="text" class="input" name="long">
             
            <div  class="wrapper"> <span>Contact*</span>
              <input type="text" class="input" name="custname" data-toggle="popover" data-content="Please use valid format" pattern="^\d{3}\d{3}\d{4}$"  value="${user.contactNumber}">
            </div>
            
             <div  class="wrapper"> <span>Number of trees*</span>
              <input type="text" class="input" name="NoTrees" required>
            </div>
            
              <div  class="wrapper"> <span>Species*</span>
              <input type="text" class="input" name="Species" required>
            </div>
            
             <div  class="textarea_box"> <span>Reason for Request*:</span>
              <textarea name="message" cols="1" rows="1" required>${enquiry.message}</textarea>
            </div>
            
          
            
        <br/>
         <div  align="center">   <input type="submit" value="Submit" /> </div> </div>
        </form>
      </article>
    </div>
  </section>
  <!--content end-->
 
</div>
 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
 
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script>
function mySF() {
	var lat;
    var address1= document.ContactForm.Address1.value;

        geocoder = new google.maps.Geocoder();
        geocoder.geocode({
        'address': address1
        }, function(results, status) {      
            var lat=results[0].geometry.location.lat();    
            var lng=results[0].geometry.location.lng();   

			
        });
    }

    google.maps.event.addDomListener(window, 'load', mySF);
    </script>
</body>
</html>