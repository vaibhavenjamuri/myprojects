<!DOCTYPE html>
<html lang="en">
<head>
<title>AirLines | Services</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="js/jQuery/css/jquery-ui.css" type="text/css" />

<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script src='js/jQuery/js/jquery-ui.min.js' type='text/javascript' charset='utf-8'></script>
<script src='js/jQuery/js/jquery-1.8.2.min.js' type='text/javascript'>	</script>
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
      <h1><a href="index.html" id="logo">AirLines</a></h1>
      <span id="slogan">Fast, Frequent &amp; Safe Flights</span>
      <nav id="top_nav">
        
      </nav>
    </div>
    <nav>
            <ul id="menu">
        <li><a href="addapartments.jsp"><span><span>Modify Flight Details</span></span></a></li>
        <li><a href="viewpassengers.jsp"><span><span>View Passengers</span></span></a></li>
        <li   id="menu_active"><a href="modifyoffers.jsp"><span><span>Modify Offers</span></span></a></li>
         <li><a href="#" onClick="modifyFlight('enquiryhome');"><span><span>View Enquiries</span></span></a></li>
        <li class="end"><a href="index.jsp"><span><span>Logout</span></span></a></li>
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
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
	
	      <article class="col1">
        <div class="box1">
          <h2 class="top">Apartment Details</h2>
          <div class="pad">
           
             <ul class="pad_bot2 list1">
              <li> <a href="addoffers.jsp">Add New Offer</a> </li>
              <li> <a  href="#" onClick="modifyFlight('editoffer');">Edit Offer Details</a> </li>
              <li><a  href="#" onClick="modifyFlight('deleteoffer');">Delete Offer Details</a> </li>
            </ul>
            
          </div>
        </div>
      </article>  
	
      <article class="col2">
      
 <h3 class="pad_top1" align="center">

<core:choose>
 <core:when test="${mode=='edit'}">Edit Offer Details</core:when>
 <core:otherwise>Add New Offer</core:otherwise>
  </core:choose> 


</h3>
        <form id="ContactForm" name="ContactForm" action="offersServlet" method="post">
         
         <core:choose>
         <core:when test="${mode=='edit'}"> <input type="hidden"  class="input"  name="viewType" required="required" value="updateoffer"/>
 <input type="hidden"  class="input"  name="offerid" required="required" value="${offer.offerId}"/>
 </core:when>
 <core:otherwise> <input type="hidden"  class="input"  name="viewType" required="required" value="addoffer"/></core:otherwise>
  </core:choose> 
  
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
        <td> Offer Name: </td>
        <td> <input type="text"  class="input"  name="offername" required="required" value="${offer.offerName}"/></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr> <td>Discount (%):</td>
            <td> <input type="text" class="input" name="discount" required="required" value="${offer.discount }"/></td>
              </tr>
              
                   <tr><td>&nbsp;</td></tr>
              
        <tr>
        <td>  Validity : </td>
        <td>  <select name="month">
           <option value="MM">MM</option>
           <option value="01">01</option>
           <option value="02">02</option>
           <option value="03" selected>03</option>
        </select>
        <select name="date">
          <option value="DD">DD</option>
           <option value="01" selected>01</option>
           <option value="02">02</option>
           <option value="03" >03</option> 
        </select>
        
        <select name="year">
           <option value="YYYY">YYYY</option>
            <option value="2015" selected>2015</option>
           <option value="2016">2016</option>
           <option value="2017" >2017</option> 
        </select>
        </td>
            </tr>
        
                   <tr><td>&nbsp;</td></tr>
              
        <tr>
        <td>  Source : </td>
        <td>  <select name="source">
           <option value="anywhere">Anywhere</option>
           <option value="India">India</option>
           <option value="NewYork">New York</option>
           <option value="California" selected>California</option>
        </select>
        </td>
            </tr>
 
                                <tr><td>&nbsp;</td></tr>
              
        <tr>
        <td>  Destination : </td>
        <td>  <select name="destination">
           <option value="anywhere">Anywhere</option>
           <option value="India">India</option>
           <option value="NewYork">New York</option>
           <option value="California" selected>California</option>
        </select>
        </td>
            </tr> 
               
              <tr><td>&nbsp;</td></tr>
              
              
              <tr>
		<core:choose>
 <core:when test="${mode=='edit'}">
 <td colspan="2" align="center"><input type="submit" value="Update Offer" /></td>
 </core:when>
 <core:otherwise>
 <td colspan="2" align="center"><input type="submit" value="Add Offer" /></td>
 </core:otherwise>
  </core:choose>
	
				</tr>
              </table>
    </form>
      </article>
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