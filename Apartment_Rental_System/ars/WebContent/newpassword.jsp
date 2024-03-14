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
<core:set var="errorMsg" value="${errorMsg}"></core:set>
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
        <li><a href="index.jsp"><span><span>Search Apartments</span></span></a></li>
        <li><a href="contactus.jsp"><span><span>Contact Us</span></span></a></li>
        <li  id="menu_active" class="end"><a href="login.jsp"><span><span>Login</span></span></a></li>
      </ul>
      </form>
    </nav>
    
  </header>
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1" align="center">
    
 <h3 class="pad_top1">Login Form</h3>
        <form id="ContactForm" action="profileServlet" method="post">
        <input type="hidden"  class="input"  name="viewType" required="required" value="newpassword"/>
         <input type="hidden"  class="input"  name="username" required="required" value="<core:out value='${username}'/>"/>
        <table>
        
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
        <td>  New Password: </td>
        <td> <input type="password"  class="input"  name="newpass" required="required" value="customer1"/></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr> <td>Confirm Password:</td>
            <td> <input type="password" class="input" name="confirmpass" required="required" value="customer1"/></td>
              </tr>
              <tr><td>&nbsp;</td></tr>
              <tr>
					<td colspan="2" align="center"><input type="submit" value="Submit" /></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
             
              </table>
    </form>
    </div>
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