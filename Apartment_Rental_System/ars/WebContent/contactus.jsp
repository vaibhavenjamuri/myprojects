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
<body id="page6">
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
    <input type="hidden"  class="input"  name="servicetype" value="1"/>

    
      <ul id="menu">
        <li><a href="index.jsp"><span><span>Search Apartments</span></span></a></li>
        <li id="menu_active"><a href="contactus.jsp"><span><span>Contact Us</span></span></a></li>
        <li   class="end"><a href="login.jsp"><span><span>Login</span></span></a></li>
      </ul>
      </form>
    </nav>
  
    <script type="text/javascript">
    
    
    function performAction(viewType) {
    	document.linkForm.viewType.value=viewType;
    	document.linkForm.action = "offersServlet";
    	document.linkForm.submit();
    }
        
    
    </script>

  </header>
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
      <article class="col1">
        <div class="box1">
          <h2 class="top">Contact Us</h2>
          <div class="pad">
            <div class="wrapper pad_bot1">
              <p class="cols pad_bot2"><strong>Country:<br>
                City:<br>
                Address:<br>
                Email:</strong></p>
              <p class="color1 pad_bot2">USA<br>
                San Diego<br>
                Beach st. 54<br>
                <a href="#">ars@mail.com</a></p>
            </div>
          </div>
         
        </div>
      </article>
      <article class="col2">
        <h3 class="pad_top1" align="center">Enquiry Form</h3>
        <form id="ContactForm" action="enquiryServlet" method="post">
         <input type="hidden" class="input" name="viewType" value="enquirysubmit">
          <div>
          
           <div  class="wrapper"> 
              <core:if test="${not empty errorMsg}">
           <font color="red"> <core:out value="${errorMsg}"></core:out> </font>
            </core:if>
            </div>
            
            
            <div  class="wrapper"> <span>Name:</span>
              <input type="text" class="input" name="custname" value="customer">
            </div>
            <div  class="wrapper"> <span>Email:</span>
              <input type="text" class="input" name="emailid" value="customer@gmail.com">
            </div>
            <div  class="textarea_box"> <span>Message:</span>
              <textarea name="message" cols="1" rows="1">Clarification on baggage allowance....</textarea>
            </div>
         <div  align="center">   <input type="submit" value="Submit" /> </div> </div>
        </form>
      </article>
    </div>
  </section>
  <!--content end-->
  
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>