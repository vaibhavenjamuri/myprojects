<!DOCTYPE html>
<html lang="en">
<head>
<title>Apartment Finder</title>
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
    <input type="hidden"  class="input"  name="pnr"  value=""/>
            <ul id="menu">
          <core:choose>
          <core:when test="${user.userType=='customer' }">  
		 <li  ><a href="home.jsp"><span><span>Manage Reservation</span></span></a></li>
		   <li ><a href="#" onClick="performAction('viewapartments');"><span><span>View Apartments</span></span></a></li>
		  <li><a href="#" onClick="performAction('viewvisits');"><span><span>View Visits</span></span></a></li>
		  </core:when>
		  <core:otherwise>
		  <li ><a href="#"><span><span>Manage Reservation</span></span></a></li>
		   <li><a href="paybill.jsp" ><span><span>Pay Rent</span></span></a></li>
		  <li ><a href="#" onClick="performAction('services');"><span><span>Service Requests</span></span></a></li>
		  </core:otherwise>
		  </core:choose>
        <li   id="menu_active"><a href="#" onClick="performAction('viewprofile');"><span><span>Manage Profile</span></span></a></li>
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
    </script>
  </header>
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1" align="center">
    
 <h3 class="pad_top1">Edit Profile</h3>
        <form id="ContactForm" name="ContactForm" action="profileServlet" method="post">
        <input type="hidden"  class="input"  name="viewType" required="required" value="updateprofile"/>
        <input type="hidden"  class="input"  name="oldusername" required="required" value="${user.userName}"/>
        <input type="hidden"  class="input"  name="customerid" required="required" value="${user.customerId}"/>
        <table align="center">
        
                <tr><td>&nbsp;</td></tr>
            <tr>
            <td colspan="2"> 
            <core:if test="${not empty errorMsg}">
             <font color="red"><core:out value="${errorMsg}"></core:out></font>
            </core:if>
            
            </td>
              </tr>
              <tr><td>&nbsp;</td></tr>
              
        
        <tr>
        <td> User Name: </td>
        <td> <input type="text"  class="input"  name="username" required="required" value="${user.userName}"/></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr> <td>Password:</td>
            <td> <input type="password" class="input" name="userpass" required="required" value="${user.newPass}"/></td>
              </tr>
              
                   <tr><td>&nbsp;</td></tr>
              
        <tr>
        <td>  Security Question: </td>
        <td>  <select name="securityquestion">
        <option value="1">What is the name of your favorite teacher?</option>
        <option value="2">What is the name of your pet?</option>
        <option value="3">What is the name of your first employer?</option>
        <option value="4">What is the name of your best friend?</option>        
        </select></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr> <td>Security Answer:</td>
            <td> <input type="password" class="input" name="securityanswer" required="required" value="${user.securityAnswer }"/></td>
              </tr>
              
              <tr><td>&nbsp;</td></tr>
               <tr>
        <td>  First Name: </td>
        <td> <input type="text"  class="input"  name="firstname" required="required" value="${user.firstName }"/></td>
            </tr>
            
            <tr><td>&nbsp;</td></tr>
             <tr>
        <td>  Middle Name: </td>
        <td> <input type="text"  class="input"  name="middlename" required="required" value="${user.middleName }"/></td>
            </tr>
            
            <tr><td>&nbsp;</td></tr>  
             <tr>
        <td>  Last Name: </td>
        <td> <input type="text"  class="input"  name="lastname" required="required" value="${user.lastName }"/></td>
            </tr>
            
            <tr><td>&nbsp;</td></tr>
             <tr>
        <td>  Mobile Number: </td>
        <td> <input type="text"  class="input"  name="mobileno" required="required" value="${user.contactNumber }"/></td>
            </tr>
           
            <tr><td>&nbsp;</td></tr>
            <tr>
        <td>  Email Id: </td>
        <td> <input type="text"  class="input"  name="emailid" required="required" value="${user.emailId }"/></td>
            </tr>
            
            
              <tr><td>&nbsp;</td></tr>
              <tr>
					<td colspan="2" align="center"><input type="submit" value="Update" /></td>
				</tr>
				
				
				

              </table>
    </form>
    </div>
  </section>
  <!--content end-->
 
  <!--footer end-->
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>