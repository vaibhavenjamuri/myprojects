<!DOCTYPE html>
<html lang="en">
<head>
<title>Apartment rental system</title>
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
<body id="page6" >
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
            <ul id="menu">
          <li id="menu_active"><a href="Accounts.jsp"><span><span>Accounts</span></span></a></li>
        <li id="menu_active"><a href="PullReports.jsp"><span><span>Pull Reports</span></span></a></li>
        <li id="menu_active"><a href="viewenquiries.jsp"><span><span>View Requests</span></span></a></li>
        <li id="menu_active" class="end"><a href="index.jsp"><span><span>Logout</span></span></a></li>
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
   <table width="100%">
    <tr>
        <td colspan="7"> <h4>Requestor Accounts</h4> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
     <tr>
     <th>Name</th>
     
     <th>Mail Id</th>
      
     <th>test</th>
      </tr>  
      <tr><td colspan="7">&nbsp;</td></tr> 
    <core:forEach var="enquiry" items="${enquiryList}">
    <tr align="center">
    <td><core:out value="${enquiry.name}"></core:out> </td>
    
     <td><core:out value="${enquiry.emailId}"></core:out> </td>
     
    <td><core:out value="${user2.userName}"></core:out> </td>
    
    <td><a href="#"  onClick="updateEnquiry('<core:out value="${enquiry.id}"/>');">Edit</a></td>
    
    </tr>
    
    </core:forEach>
    <tr>
        <td colspan="7"> <h4>Requestor Accounts</h4> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
     <tr>
     <th>Name</th>
     
     <th>Mail Id</th>
      
     
      </tr>  
      <tr>
 <td><core:out value="${user2.userName}"></core:out> </td>
      <td>hii</td>
      </tr>
    
   
   
      </table>
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>