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
<%@ page import="java.sql.*" %>
<%ResultSet resultset1 =null;%>
<%
    try{
//Class.forName("com.mysql.jdbc.Driver").newInstance();
Connection connection = 
         DriverManager.getConnection
            ("jdbc:mysql://localhost:3306/ars?user=root&password=admin");

       Statement statement1 = connection.createStatement() ;
      

       resultset1 =statement1.executeQuery("select * from schedule_event") ;
    }
catch(Exception e)
{
     out.println("wrong entry"+e);
}
      
%>


</head>
<body id="page4">

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
          
       <li  id="menu_active"><a href="VolunteerHome.jsp"><span><span>View Schedules</span></span></a></li>
          <li  id="menu_active"><a href="Vmanageprofile.jsp"><span><span>ManageProfile</span></span></a></li>
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

	function updateEnquiry(enquiryId) {
    	document.ContactForm.viewType.value="editenquirydetails";
    	document.ContactForm.selectedenquiry.value=enquiryId;
    	document.ContactForm.submit();
    }
    
    </script>
    
  </header>
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
	
	      <article class="col1">
     
      </article>  
	
      <article class="col2">
      
 
    
      </article>
    </div>
    <core:if test="${not empty errorMsg}">
             <font color="red"><core:out value="${errorMsg}"></core:out></font>
       
            </core:if>
    <table width="100%">
   
     <tr>
    
     
    
       <th>UniqueId</th>
     <th>Scheduled Date</th>
     <th>Lead Volunteer</th>
      <th>Volunteer</th>
      <th>Location</th>
    
      </tr>  
          <%  while(resultset1.next()){
          	String id=resultset1.getString(2);
          	 %>
          <tr align="center"><td><%= resultset1.getString(2)%></td>
               <td><%= resultset1.getString(5)%></td>
                <td><%= resultset1.getString(3)%></td>
          <td><%= resultset1.getString(4)%></td>
           <td><%= resultset1.getString(6)%></td>
           <td><form name="f" action="ScheduleEventServlet2" method="post">
             <input type="hidden" name="id" value="<%=id%>" />
        <input type="hidden" name="viewType1" value="scheduleevent3"/>
           <input id="bvolunteer" type="checkbox" name="bvolunteer" value="${user.userName}" /> I want to be volunteer
            <input type="submit" value="Update"/>
          
            </form></td>
        <% } %>
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
<script type="text/javascript">
window.onload = function() {
	  
	var c = document.getElementById('bvolunteer');
	  
	  c.onclick = function() {
	    if (c.checked == true)
	    	document.f.bvolunteer.value=${user.userName};
	  }
	    
	  

</script>
</body>
</html>