<%@ page import="java.sql.*" %>
<%ResultSet resultset1 =null;%>
<%ResultSet resultset2 =null;%>
<%ResultSet resultset3 =null;%>
<!DOCTYPE html>
<HTML  lang="en">
<HEAD>
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
</HEAD>

<BODY id="page4">
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
         
         <li id="menu_active"><a href="Account1.jsp"><span><span>Accounts</span></span></a></li>
        
        <li id="menu_active"><a href="PullReports.jsp"><span><span>Pull Reports</span></span></a></li>
       <li  id="menu_active"><a href="viewenquiries.jsp"><span><span>View Requests</span></span></a></li>
          <li  id="menu_active"><a href="scheduleevent.jsp"><span><span>Schedule Event</span></span></a></li>
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

<%
    try{
//Class.forName("com.mysql.jdbc.Driver").newInstance();
Connection connection = 
         DriverManager.getConnection
            ("jdbc:mysql://localhost:3306/ars?user=root&password=admin");

       Statement statement1 = connection.createStatement() ;
       Statement statement2 = connection.createStatement() ;
       Statement statement3 = connection.createStatement() ;

      
       resultset2 =statement2.executeQuery("select * from volunteer_login") ;
       resultset3 =statement3.executeQuery("select * from requestor_login") ;
%>


  
           <h2 align="center">Volunteer Accounts</h2>
           <table  align="center">
          <tr>
    
     
    
     <th>Username</th>
     <th>Usertype</th>
      <th>EmailId</th>
      <th>Action</th>
     
      </tr>  
    
        <%  while(resultset2.next()){ 
        String n=resultset2.getString(8);
        %>
         <tr>
   
            <td><%= resultset2.getString(1)%></td>
             <td><%= resultset2.getString(3)%></td>
             <td><%= resultset2.getString(7)%></td>
             <td><form action="DeleteVAccountServlet" method="post">
             <input type="hidden" name="id" value="<%=n%>" />
        <input type="hidden" name="viewType1" value="VDelete"/>
           
            <input type="submit" value="Delete"/>
          
            </form></td>
             </tr>
        <% } %>
       </table>
       <br><br>
       
         <h2 align="center"> Requestor Accounts</h2>
   <table  align="center">
    <tr>
    
     
    
     <th>Username</th>
     <th>Usertype</th>
      <th>EmailId</th>
      <th>Action</th>
      </tr>  
   
    
        <%  while(resultset3.next()){ 
        String n=resultset3.getString(8);
        %>
        <tr>
            <td><%= resultset3.getString(1)%></td>
             <td><%= resultset3.getString(3)%></td>
             <td><%= resultset3.getString(7)%></td>
             <td><form action="DeleteRAccountServlet" method="post">
             <input type="hidden" name="id" value="<%=n%>" />
        <input type="hidden" name="viewType1" value="RDelete"/>
           
            <input type="submit" value="Delete"/>
          
            </form></td>
               </tr>
        <% } %>
     </table>
<%
//**Should I input the codes here?**
        }
        catch(Exception e)
        {
             out.println("wrong entry"+e);
        }
%>
<br>

</BODY>
</HTML>