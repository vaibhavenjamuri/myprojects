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
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
	
	      <article class="col1">
     
      </article>  
	
      <article class="col2">
      
 
 <form name="Form2" id="Form2" action="ContributorDetailsServlet" method="post">
        
        <table align="center" width="100%">
                    
        
            <tr><td>&nbsp;</td></tr>
                    
              <tr><td>&nbsp;</td></tr>
             
		     <tr>
					<td colspan="2" align="center"><input type="submit" value="Show Contributor Details" /></td>
				</tr>
              </table>
    </form>
    
   
 <form name="Form2" id="Form2" action="TreesPlanted" method="post">
        
        <table align="center" width="100%">
                    
        
            <tr><td>&nbsp;</td></tr>
                    
              <tr><td>&nbsp;</td></tr>
             
		     <tr>
					<td colspan="2" align="center"><input type="submit" value="List of trees Planted" /></td>
				</tr>
              </table>
    </form>
    
    <form name="Form3" id="Form3" action="TotalFundsServlet" method="post">
        
        <table align="center" width="100%">
                    
        
            <tr><td>&nbsp;</td></tr>
                    
              <tr><td>&nbsp;</td></tr>
             
		     <tr>
					<td colspan="2" align="center"><input type="submit" value="Show Total Funds" /></td>
				</tr>
              </table>
    </form>
      
 <form name="Form2" id="Form2" action="ScheduleEvent1Servlet" method="post">
        
        <table align="center" width="100%">
                    
        
            <tr><td>&nbsp;</td></tr>
                    
              <tr><td>&nbsp;</td></tr>
             
		     <tr>
					<td colspan="2" align="center"><input type="submit" value="List of scheduled events" /></td>
				</tr>
              </table>
    </form>
       
    
    
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