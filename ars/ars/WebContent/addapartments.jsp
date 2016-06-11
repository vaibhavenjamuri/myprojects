
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
        <li  id="menu_active"><a href="#"><span><span>Modify Apartment Details</span></span></a></li>
        <li><a href="viewpassengers.jsp"><span><span>View Payment Reports</span></span></a></li>
        <li><a href="#" onClick="modifyFlight('enquiryhome');"><span><span>View Services/Enquiries</span></span></a></li>
        <li class="end"><a href="index.jsp"><span><span>Logout</span></span></a></li>
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
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
	
	      <article class="col1">
        <div class="box1">
          <h2 class="top">Apartment Details</h2>
          <div class="pad">
           
            <ul class="pad_bot2 list1">
              <li> <a href="addapartments.jsp">Add Apartment Details</a> </li>
              <li> <a href="#" onClick="modifyFlight('editapartment');">Edit Apartment Details</a> </li>
              <li><a  href="#" onClick="modifyFlight('deleteapartment');">Delete Apartment Details</a> </li>
            </ul>
          </div>
        </div>
      </article>  
	
      <article class="col2">
      
 <h3 class="pad_top1" align="center">
 <core:choose>
 <core:when test="${mode=='edit'}">Edit Apartment Details</core:when>
 <core:otherwise>Add New Apartment</core:otherwise>
  </core:choose> 
 </h3>
        <form id="ContactForm" name="ContactForm" action="viewApartmentsServlet" method="post">
        <input type="hidden"  class="input"  name="selectedamenities" required="required" value=""/>
        <core:choose>
 <core:when test="${mode=='edit'}"> <input type="hidden"  class="input"  name="viewType" required="required" value="updateapartment"/>
 <input type="hidden"  class="input"  name="apartmentcode" required="required" value="${apartment.aptId}"/>
 </core:when>
 <core:otherwise> <input type="hidden"  class="input"  name="viewType" required="required" value="addapartment"/>
 
 </core:otherwise>
 
  </core:choose> 
       
        <table width="100%">
        
        
        <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
            <td colspan="2"> 
            <core:if test="${not empty errorMsg}">
             <font color="red"><core:out value="${errorMsg}"></core:out></font>
            </core:if>
            
            </td>
              </tr>
              <tr><td>&nbsp;</td></tr>
              
              
         <tr>
        <td colspan="2"> <h4>Apartment Details</h4> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            
              <tr> <td width="80%">Apartment Name:</td>
            <td width="20%"> <input type="text" class="input" name="aptname" required="required" value="${apartment.aptNo}"/></td>
              </tr>
            
            <tr><td>&nbsp;</td></tr>
            
              <tr> <td>Flat Name:</td>
            <td> <input type="text" class="input" name="flatname" required="required" value="${apartment.flatNo}"/></td>
              </tr>
         
         <tr><td>&nbsp;</td></tr>
         
                <tr>
        <td> Flat Type : </td>
        <td>  <select name="flattype" id="flattype">
        <option value="select">Select</option>
         <option value="1">Studio</option>
        <option value="2">Apartment</option>
        </select>  
                </td>
            </tr>
              
         <tr><td>&nbsp;</td></tr>
         
         
                <tr>
        <td> Bed Rooms : </td>
        <td>  <select name="bedrooms" id="bedrooms">
        <option value="select">Select</option>
         <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        
        </select>  
                </td>
            </tr>
        <tr><td>&nbsp;</td></tr>
                <tr>
        <td> Bath Rooms : </td>
        <td>  <select name="bathrooms" id="bathrooms">
        <option value="select">Select</option>
         <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        
        </select>  
                </td>
            </tr>
            
            <tr><td>&nbsp;</td></tr>  
             <tr>
        <td>  Maximum persons : </td>
        <td> <input type="text"  class="input"  name="maxpersons" required="required" value="${apartment.maxPersons}"/></td>
            </tr>
                
            <tr><td>&nbsp;</td></tr>  
             <tr>
        <td>  Rent per Month($) : </td>
        <td> <input type="text"  class="input"  name="rent" required="required" value="${apartment.rent}"/></td>
            </tr>
         <tr><td>&nbsp;</td></tr>
             <tr>
        <td>  Other Charges($) : </td>
        <td> <input type="text"  class="input"  name="othercharges" required="required" value="${apartment.otherCharges}"/></td>
            </tr>
         
        <tr><td>&nbsp;</td></tr>
                <tr>
        <td> Deposit rent(in months) : </td>
        <td>  <select name="deposit" id="deposit">
        <option value="select">Select</option>
         <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        
        </select>  
                </td>
            </tr>
            
        <tr><td>&nbsp;</td></tr>
                <tr>
        <td> Agreement(in years) : </td>
        <td>  <select name="agreement" id="agreement">
        <option value="select">Select</option>
         <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        
        </select>  
                </td>
            </tr>
        <tr><td>&nbsp;</td></tr>
                <tr>
        <td> Amenities : </td>
        <td>  <select name="amenities" id="amenities" multiple size="10" style="width:200px;">
        <option value="select">Select</option>
         <option value="1">Swimming Pool</option>
        <option value="2">Garden</option>
        <option value="3">Washer</option>
        <option value="4">Dryer</option>
        <option value="5">Fridge</option>
        <option value="6">Heater</option>
        <option value="7">Fitness Center</option>
        <option value="8">Furniture</option>
        </select>  
                </td>
            </tr>
            
              <tr><td>&nbsp;</td></tr>
         
                <tr>
        <td> Status : </td>
        <td>  <select name="status" id="status">
        <option value="select">Select</option>
         <option value="1">Vacant</option>
        <option value="2">Occupied</option>
        <option value="3">Renovation</option>
        </select>  
                </td>
            </tr>
            
            
            
            <tr><td>&nbsp;</td></tr>
            
                  <tr>
        <td> Location : </td>
        <td> <input type="text"  class="input"  name="location" required="required" value="${apartment.location}"/></td>
            </tr>
            
            <tr><td>&nbsp;</td></tr>  
             <tr>
        <td>  City : </td>
        <td> <input type="text"  class="input"  name="city" required="required" value="${apartment.city}"/></td>
            </tr>
            
            
                  <tr><td>&nbsp;</td></tr>
             <tr>
        <td>  State : </td>
        <td> <input type="text"  class="input"  name="state" required="required" value="${apartment.state}"/></td>
            </tr>
            
              <tr><td>&nbsp;</td></tr>
              
              
                  <tr><td>&nbsp;</td></tr>
             <tr>
        <td>  Description : </td>
        <td> <textarea name="description">
        <core:out value="${apartment.description}"/>
        </textarea></td>
            </tr>
            
              <tr><td>&nbsp;</td></tr>
              <tr>
  <core:choose>
 <core:when test="${mode=='edit'}">
 <td colspan="2" align="center"><input type="button" onClick="submitForm();" value="Update Apartment" /></td>
 </core:when>
 <core:otherwise>
 <td colspan="2" align="center"><input type="button" onClick="submitForm();" value="Add Apartment" /></td>
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