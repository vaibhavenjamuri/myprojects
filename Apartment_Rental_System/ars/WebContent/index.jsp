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
<body id="page1">
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
        <li id="menu_active"><a href="index.jsp"><span><span>Search Apartments</span></span></a></li>
        <li><a href="contactus.jsp"><span><span>Contact Us</span></span></a></li>
        <li class="end"><a href="login.jsp"><span><span>Login</span></span></a></li>
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
    <div class="for_banners">
      <article class="col1">
        <div class="tabs">
          <ul class="nav">
            <li class="selected"><a href="#Flight">Search Apartments</a></li>
          </ul>
          <div class="content">
            <div class="tab-content" id="Flight">
              <form id="form_1" name="form_1" action="servicesServlet" method="post">
              <input type="hidden" class="input" name="viewType" id="viewType"  value="searchapartments">
                <div>
                 
                    <table>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr>
                    <td>Apartment Type</td>
                    <td><select name="flattype"  class="input7">
                    	<option value="1" selected>Studio</option>
                    	<option value="2">Apartment</option>                
                    </select></td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    
                     <tr>
                    <td>Bedrooms</td>
                    <td><select name="bedrooms"  class="input7">
                    	<option value="1" selected>1</option>
                    	<option value="2">2</option>
                    	<option value="3">3</option>
                    	<option value="4" >4</option>
                    	<option value="5">5</option>
                    
                    </select></td>
                    </tr>
                    
                        <tr><td colspan="2">&nbsp;</td></tr>
                    
                     <tr>
                    <td>Bathrooms</td>
                    <td><select name="bathrooms"  class="input7">
                    	<option value="1" selected>1</option>
                    	<option value="2">2</option>
                    	<option value="3">3</option>
                    	<option value="4" >4</option>
                    	<option value="5">5</option>
                    
                    </select></td>
                    </tr>
                    
                    <tr><td colspan="2">&nbsp;</td></tr>
                
                <tr>
                    <td>Rent Range($)</td>
                    <td><select name="from" class="input8">
                    <option value="200">200</option>
                    	<option value="300" selected>300</option>
                    	<option value="400">400</option>
                      </select>     
                    <select name="to" class="input8">
                    <option value="500">500</option>
                    	<option value="600" selected>600</option>
                    	<option value="700">700</option>
                      </select>
                     </td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                
                
                
                <tr>
                    <td>Location</td>
                    <td><select name="location" class="input7">
                    <option value="ming">Ming Street</option>
                    	<option value="king">King Street</option>
                    	<option value="hudson">Hudson Street</option>
                      </select>
                    </td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                
                
                
                <tr>
                    <td>City</td>
                    <td><select name="city" class="input7">
                    <option value="warrensburg">Warrensburg</option>
                    	<option value="kansas" >Kansas</option>
                    	<option value="rolla">Rolla</option>
                      </select>
                    </td>
                    </tr>
                    
                    <tr><td colspan="2">&nbsp;</td></tr>
                
                
                
                <tr>
                    <td>State</td>
                    <td><select name="state" class="input7">
                    <option value="missouri">Missouri</option>
                    	<option value="Newyork" >Newyork</option>
                    	<option value="California">California</option>
                      </select>
                    </td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
               <tr><td>
                   <a href="#" class="button1" onClick="document.form_1.submit();"><strong>Search</strong></a>
                  </td></tr>
                  </table>
                </div>
              </form>
            </div>
            
            
          </div>
        </div>
      </article>
    </div>
    
  </section>
  <!--content end-->
 
</div>
<script type="text/javascript">Cufon.now();</script>
<script type="text/javascript">
$(document).ready(function () {
    tabs.init();
});

$(window).load(function () {
});
</script>
</body>
</html>