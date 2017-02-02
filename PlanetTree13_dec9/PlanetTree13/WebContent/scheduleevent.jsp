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

       resultset1 =statement1.executeQuery("select * from contributor_details") ;
       resultset2 =statement2.executeQuery("select * from volunteer_login where user_type='Lead Volunteer'") ;
       resultset3 =statement3.executeQuery("select * from requestor_details") ;
%>

<form action="ScheduleEventServlet1" method="post">
 <input type="hidden" name="viewType1" value="" />
  <core:if test="${not empty errorMsg}">
  <font color="red"><core:out value="${errorMsg}"></core:out></font>
           </core:if>
    <h5> Select UniqueId</h5>
    <select name="uniqueid9">
        <%  while(resultset1.next()){ %>
            <option><%= resultset1.getString(6)%></option>
        <% } %>
        </select><br><br>
          <h5> Location </h5>
    <select name="address1">
        <%  while(resultset3.next()){ %>
            <option><%= resultset3.getString(8)%></option>
        <% } %>
        </select><br><br>


    <h5> Lead Volunteer</h5>
        <select name="lvolunteer">
        <%  while(resultset2.next()){ %>
            <option><%= resultset2.getString(2)%></option>
        <% } %>
        </select><br><br>
        <h5>Event Date</h5>
          <select name="day">
          <option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09" selected>09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
				</select>
        <select name="mm"> 
		<option value="mm">MM</option>
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09" selected>09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		</select>
		
		<select name="yyyy"> 
		<option value="yyyy">YYYY</option>
		<option value="2016">2016</option>
		<option value="2017" selected>2017</option>
		<option value="2018">2018</option>
		<option value="2019">2019</option>
		</select><br><br>


<%
//**Should I input the codes here?**
        }
        catch(Exception e)
        {
             out.println("wrong entry"+e);
        }
%>
<br>
<input type="submit" value="Schedule Event"/>
</form>
</BODY>
</HTML>