<!DOCTYPE html>
<html lang="en">
<head>
<title>Apartment Rental System</title>
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
            <ul id="menu">
        <li  id="menu_active"><a href="#"><span><span>Modify Apartment Details</span></span></a></li>
        <li><a href="viewpassengers.jsp"><span><span>View Payment Reports</span></span></a></li>
        <li><a href="#" onClick="modifyFlight('enquiryhome');"><span><span>View Services/Enquiries</span></span></a></li>
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
    
    function deleteApartment(aptId) {
    	document.ContactForm.viewType.value="deleteapartmentdetails";
    	document.ContactForm.selectedapartment.value=aptId;
    	var r = confirm("Are you sure to delete ? ");
    	if(r==true) {
    		document.ContactForm.submit();
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
	
	      <article class="col1">
        <div class="box1">
          <h2 class="top">Modify Apartment Details</h2>
          <div class="pad">
           
            <ul class="pad_bot2 list1">
              <li> <a href="addapartments.jsp">Add Apartment Details</a> </li>
               <li> <a href="#" onClick="modifyFlight('editapartment');">Edit Apartment Details</a> </li>
              <li><a  href="#" onClick="modifyFlight('deleteapartment');">Delete Apartment Details</a> </li>
            </ul>
          </div>
        </div>
      </article>  
	
      <article class="col2">
      
 <h3 class="pad_top1" align="center">Delete Apartment Details</h3>
        <form name="ContactForm" id="ContactForm" action="viewApartmentsServlet" method="post">
        <input type="hidden"  class="input"  name="viewType" required="required" value="deleteapartment"/>
        <input type="hidden"  class="input"  name="selectedapartment" required="required" value=""/>
        <table align="center">
                    
        <tr>
        <td> Apartment or Flat Name : </td>
        <td> <input type="text"  class="input"  name="apartmentname"  value=""/></td>
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
    
 <table width="100%" >
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
     <th>Action</th>
      </tr> 
      
      <tr><td colspan="7">&nbsp;</td></tr> 
    <core:forEach var="apartment" items="${apartmentsList}">
    <tr align="center">
    <td><core:out value="${apartment.aptNo}"></core:out> </td>
    <td><core:out value="${apartment.flatNo}"></core:out> </td>
     <td><core:out value="${apartment.flatType}"></core:out> </td>
     <td><core:out value="${apartment.bedrooms}"></core:out> </td>
     <td><core:out value="${apartment.bathrooms}"></core:out> </td>
     <td><core:out value="${apartment.rent}"></core:out> </td>
     <td><core:out value="${apartment.location}"></core:out> </td>
      <td><a href="#"  onClick="deleteApartment('<core:out value="${apartment.aptId}"/>');">Delete</a></td>
    
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