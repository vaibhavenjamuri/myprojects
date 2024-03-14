
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
<body id="page4" onload="myFunction();">
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
            <ul id="menu">
      
          <li id="menu_active"><a href="Accounts.jsp"><span><span>Accounts</span></span></a></li>
      
         <li id="menu_active"><a href="viewenquiries.jsp" onClick="modifyFlight('enquiryhome');"><span><span>View Requests</span></span></a></li>
        <li id="menu_active" class="end"><a href="index.jsp"><span><span>Logout</span></span></a></li>
      </ul>
    </nav>
    
    <script type="text/javascript">
    function myFunction() {
    //alert("hi");
    var amenitiesString = '${apartment.amenities}';
//    alert(amenitiesString)
    var amenities = amenitiesString.split(",");
    
    
 
    var selectObj = document.getElementById('amenities');
	  for(var i = 0; i < amenities.length; i++) {
		  for(var j = 0; j < selectObj.length; j++) {
				var sub = amenities[i].trim();
		     if(selectObj.options[j].value.toLowerCase() == sub.toLowerCase()) {
		       selectObj.options[j].selected = true;
		     }
		  }
		   }
	

	  var flatType ='${apartment.flatType}';
	  selectObj = document.getElementById('flattype');
	  for(var j = 0; j < selectObj.length; j++) {
			var flat = flatType.trim();
	     if(selectObj.options[j].value.toLowerCase() == flat.toLowerCase()) {
	       selectObj.options[j].selected = true;
	     }
	  }
	  
	  var bedrooms ='${apartment.bedrooms}';
	  selectObj = document.getElementById('bedrooms');
	  for(var j = 0; j < selectObj.length; j++) {
			var br = bedrooms.trim();
	     if(selectObj.options[j].value.toLowerCase() == br.toLowerCase()) {
	       selectObj.options[j].selected = true;
	     }
	  }
	  
	  var bathrooms ='${apartment.bathrooms}';
	  selectObj = document.getElementById('bathrooms');
	  for(var j = 0; j < selectObj.length; j++) {
			var btr = bathrooms.trim();
	     if(selectObj.options[j].value.toLowerCase() == btr.toLowerCase()) {
	       selectObj.options[j].selected = true;
	     }
	  }
	  
	  var advance ='${apartment.advance}';
	  selectObj = document.getElementById('deposit');
	  for(var j = 0; j < selectObj.length; j++) {
			var advance1 = advance.trim();
	     if(selectObj.options[j].value.toLowerCase() == advance1.toLowerCase()) {
	       selectObj.options[j].selected = true;
	     }
	  }
	  
	  var bond ='${apartment.bond}';
	  selectObj = document.getElementById('agreement');
	  for(var j = 0; j < selectObj.length; j++) {
			var bond1 = bond.trim();
	     if(selectObj.options[j].value.toLowerCase() == bond1.toLowerCase()) {
	       selectObj.options[j].selected = true;
	     }
	  }
	  
	  var status ='${apartment.status}';
	  selectObj = document.getElementById('status');
	  for(var j = 0; j < selectObj.length; j++) {
			var stat = status.trim();
	     if(selectObj.options[j].value.toLowerCase() == stat.toLowerCase()) {
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
    
    function submitForm() {
    	var addApartment = document.forms.ContactForm;
  	 
       var selectedamenities = "";
       var x = 0;

       for (x=0;x<addApartment.amenities.length;x++)
       {
      	 if (addApartment.amenities[x].selected && addApartment.amenities[x].value!='select')
          {
      		selectedamenities = selectedamenities + addApartment.amenities[x].value;
      		selectedamenities = selectedamenities + ",";
          }
       }
       document.ContactForm.selectedamenities.value=selectedamenities;
//       alert(document.ContactForm.selectedamenities.value);
      	document.ContactForm.submit();
    }
    </script>
  </header>
  <!-- / header -->
  
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