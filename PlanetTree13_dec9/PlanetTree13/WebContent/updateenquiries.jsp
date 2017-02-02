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
<body id="page6" onLoad="myFunction();">
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
     
        <li  id="menu_active"><a href="#"><span><span>View Requests</span></span></a></li>
        <li id="menu_active" class="end"><a href="index.jsp"><span><span>Logout</span></span></a></li>
      </ul>
    </nav>


     <script type="text/javascript">
    
     function myFunction() {
   		

    		  var flatType ='${enquiry.serviceType}';
    		  selectObj = document.getElementById('servicetype');
    		  for(var j = 0; j < selectObj.length; j++) {
    				var flat = flatType.trim();
    		     if(selectObj.options[j].value.toLowerCase() == flat.toLowerCase()) {
    		       selectObj.options[j].selected = true;
    		     }
    		  }

     }  
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
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
          <article class="col1">
        
      </article> 
      <article class="col2">
        <h3 class="pad_top1" align="center">Update Enquiry</h3>
        <form id="ContactForm" name="ContactForm" action="enquiryServlet" method="post">
         <input type="hidden" class="input" name="viewType" value="updateenquiry">
         <input type="hidden" class="input" name="id" value="${enquiry.id}">
       
          
          
            
            
            <div  class="wrapper"> <span>Name:</span>
              <input type="text" class="input" name="custname" value="${enquiry.name}">
            </div>
            <div  class="wrapper"> <span>Email:</span>
              <input type="text" class="input" name="emailid" value="${enquiry.emailId}">
            </div>
            
        <div  class="wrapper"> <span>Service Type:</span>
       
          <select name="servicetype" id="servicetype">
        <option value="select">Select</option>
         <option value="1">Enquiries</option>
        <option value="2">Apartment Change</option>
        <option value="2">Maintenance</option>
        <option value="3">Other</option>
        </select>
       
            
            <div  class="textarea_box"> <span>Message:</span>
              <textarea name="message" cols="1" rows="1">${enquiry.message}</textarea>
            </div>
            
             <div  class="textarea_box"> <span>Response:</span>
              <textarea name="response" cols="1" rows="1">${enquiry.response}</textarea>
            </div>
            
              
       <div  class="wrapper"> <span>Status :</span>
        <select name="status">
        <option value="Open">Open</option>
        <option value="Close">Close</option>
        <option value="Pending">Pending</option>
        </select> </div>
        
         <div  class="textarea_box"> <span>Address:</span>
              <textarea name="Address1" cols="1" rows="1"></textarea>
            </div>
            
        <br/>
         <div  align="center">   <input type="submit" value="Update" /> </div> </div>
        </form>
      </article>
    </div>
  </section>
  <!--content end-->
 
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>