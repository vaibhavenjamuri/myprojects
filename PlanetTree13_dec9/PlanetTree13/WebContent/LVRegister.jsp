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
<body id="page4">
<div class="main">
  <!--header -->
  <header>
    <div class="wrapper">
      <h1> </h1>
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
       <li id="menu_active" class="end"><a href="index.jsp"><span><span>Home</span></span></a></li>
         <li id="menu_active" class="end"><a href="AboutPlanetPV.jsp"><span><span>About PlanetTree</span></span></a></li>
        <li  id="menu_active" class="end"><a href="LVolunteerLogin.jsp"><span><span>Lead Volunteer Login</span></span></a></li>
      </ul>
      
      </form>
    </nav>
    
  </header>
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1" align="center">
    
 <h3 class="pad_top1">New User Form</h3>
        <form id="ContactForm" action="LVolunteerProfileServlet" method="post">
        <input type="hidden"  class="input"  name="viewType" required="required" value="register"/>
        <table align="center">
        <tr>
        <td> User Name*: </td>
        <td> <input type="text"  class="input"  name="username" required="required" value="customer1"/></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr> <td>Password*:</td>
            <td> <input type="password" class="input" name="userpass" required="required" value="customer1"/></td>
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
            <tr> <td>Security Answer*:</td>
            <td> <input type="password" class="input" name="securityanswer" required="required" value="customer"/></td>
              </tr>
              
              <tr><td>&nbsp;</td></tr>
               <tr>
        <td>  First Name*: </td>
        <td> <input type="text"  class="input"  name="firstname" required="required" value="customer1"/></td>
            </tr>
            
            <tr><td>&nbsp;</td></tr>
             <tr>
        <td>  Middle Name: </td>
        <td> <input type="text"  class="input"  name="middlename"  value="customer1"/></td>
            </tr>
            
            <tr><td>&nbsp;</td></tr>  
             <tr>
        <td>  Last Name*: </td>
        <td> <input type="text"  class="input"  name="lastname" required="required" value="customer1"/></td>
            </tr>
            
            <tr><td>&nbsp;</td></tr>
             <tr>
        <td>  Mobile Number*: </td>
        <td> <input type="text"  class="input"  name="mobileno" data-toggle="popover" data-content="Please use valid format" pattern="^\d{3}\d{3}\d{4}$" required="required" value="8121689601"/></td>
            </tr>
           
            <tr><td>&nbsp;</td></tr>
            <tr>
        <td>  Email Id*: </td>
        <td> <input type="email" name="emailid" data-toggle="popover" data-content="You can use letters numbers and periods" class="input" ></td>
            </tr>
            
                      <tr><td>&nbsp;</td></tr>
<tr>
<td>Address1*:</td>
<td><input type="text" class="input" name="Address1" required="required"/></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>Address2:</td>
<td><input type="text" class="input" name="Address2" required="required"/></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>Address3:</td>
<td><input type="text" class="input" name="Address3"/></td>
</tr>
<tr><td>&nbsp;</td></tr>
              <tr>
					<td colspan="2" align="center"><input type="submit" value="Register" /></td>
				</tr>
				
				
			
	

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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>