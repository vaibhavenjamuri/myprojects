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
  <!--header -->
  <header>
    <div class="wrapper">
      <h1> </h1>
       <h1>&nbsp;  </h1>
	   <h1>&nbsp;  </h1>
	   <br/>
	   
	   <br/>
	   <h1>&nbsp;  </h1>
    </div>
    <nav>
        
    <input type="hidden"  class="input"  name="viewType" value=""/>

    
      <ul id="menu">
         
     	 <li id="menu_active" class="end"><a href="index.jsp"><span><span>Home</span></span></a></li>
     	 <li id="menu_active"><a href="AboutPlanetPC.jsp"><span><span>About PlanetTree</span></span></a></li>
      	 
      
      </ul>
     
    </nav>
    
  </header>
  <!-- / header -->

   <!--content -->
  <section id="content">
  <div class="wrapper pad1">
  <form name="form3" id="form3" method="post" action="UniqueIdServlet">

<table>
 <tr>
            <td colspan="2"> 
            <core:if test="${not empty errMsg}">
            <font color="red"> <core:out value="${errMsg}"></core:out></font>
            </core:if>
            
            </td>
              </tr>
    <tr><td>Enter UniqueId</td></tr>
<tr><td><input type="text"  class="input" pattern="^[RM|SM|RB|CA]{2}\-\d{5}"   data-pattern-error="Please use only letters for your city." name="Suniqueid"></td></tr>
<tr><td><input type="submit" value="search"></td></tr>
</table>
</form>
  </div>
  <form name="ContactForm" id="ContactForm" method="post" onsubmit="return valid_credit_card(this)" action="paymentServlet">
     <input type="hidden" name="viewType" value="Contributor" />
   <table width="100%" >
    
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
            <td colspan="7"> 
            <core:if test="${not empty errorMsg}">
             <font color="red"><core:out value="${errorMsg}"></core:out></font>
             <b>Your UniqueId is</b><font color="blue"> <core:out  value="${payment.RMUniqueId1}"></core:out>
        </font>
            </core:if>
         
            </td>
              </tr>
  
       <tr>
       <td colspan="8"> <h4>Contributor Details</h4> </td>
            </tr>
            <tr>
             <td> Cardholder Name : </td>
        <td> <input type="text"  class="input" required="required" name="user_name"></td>
            </tr>
   
    <tr><td>&nbsp;</td></tr>
    
        <tr>
        <td>Card Type : </td>
        <td> 
		<select name="cardtype"> 
		<option value="mastercard">Master Card</option>
		<option value="visa">Visa</option>
		</select>
		</td>
         <td> Card Number : </td>
        <td> <input type="number"  class="input"  name="cardno"  required="required" >
       
        </td>
            </tr>
            
            <tr><td>&nbsp;</td></tr>
  
      
      <tr>
        <td>Expiration Date : </td>
        <td> 
		<select name="expmm"> 
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
		
		<select name="expyyyy"> 
		<option value="yyyy">YYYY</option>
		<option value="2016">2016</option>
		<option value="2017" selected>2017</option>
		<option value="2018">2018</option>
		<option value="2019">2019</option>
		</select>
		</td>
         <td> Cvv Number : </td>
        <td> <input type="password"  class="input"  name="cvv" maxlength="3" value="123"></td>
            </tr>
            
           <tr><td>&nbsp;</td></tr>
<tr><td>Billing Address:</td>
<td><input class="input" type="text" required="required" name="billAdd"></td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td><input id="RedMaple1" type="checkbox" name="Red Maple">Red Maple</td>
<td><select id="Red_Maple" name="noOfRedMaple" onchange="myFunction1()" >

<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>

</select>     
</td>

<td>Cost: <input type="text" name="Cost1"></td>
<td>Unique Id is: <input type="text" name="rmuniqueid1"><input type="text" name="rmuniqueid2"> <input type="text" name="rmuniqueid3"> <input type="text" name="rmuniqueid4"></td>
</tr>


<tr>
<td><input id="SugarMaple1" type="checkbox" name="Sugar Maple">Sugar Maple</td>
<td><select id="Sugar_Maple" name="noOfSugarMaple" onchange="myFunction2()" >
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>

</select>     
</td>
<td>Cost: <input type="text" name="Cost2"></td>
<td>Unique Id is: <input type="text" name="smuniqueid1"> <input type="text" name="smuniqueid2"> <input type="text" name="smuniqueid3"> <input type="text" name="smuniqueid4"></td>
</tr>

<tr>
<td><input id="RiverBirch1" type="checkbox" name="River Birch">River Birch</td>
<td><select id="River_Birch" name="noOfRiverBirch" onchange="myFunction3()" >
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>

</select>  
</td>
<td>Cost: <input type="text" name="Cost3"></td>
<td>Unique Id is: <input type="text" name="rbuniqueid1"> <input type="text" name="rbuniqueid2"> <input type="text" name="rbuniqueid3"> <input type="text" name="rbuniqueid4"></td>
</tr>

<tr>
<td><input id="Catalpa1" type="checkbox" name="Catalpa">Catalpa</td>
<td><select id="Catalpa" name="noOfCatalpa" onchange="myFunction4()" >
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>

</select>     
</td>

<td>Cost: <input type="text" name="Cost4"></td>

<td>Unique Id is: <input type="text" name="cauniqueid1"> <input type="text" name="cauniqueid2"> <input type="text" name="cauniqueid3"> <input type="text" name="cauniqueid4"></td>
</tr>



<tr><td>Total:<input type="text" name="Total"></td></tr>

       
               <tr><td>
                  <input type="submit" value="submit">
                  </td></tr>  
    
</table>
  </form>
  </section>
  </div>
  
<script type="text/javascript">


var c1;
var c2;
var c3;
var c4;
var Total;


document.ContactForm.Cost1.value =0 ;
document.ContactForm.Cost2.value =0 ;
document.ContactForm.Cost3.value =0 ;
document.ContactForm.Cost4.value =0 ;
var c1=parseInt(document.ContactForm.Cost1.value);
var c2=parseInt(document.ContactForm.Cost2.value);
var c3=parseInt(document.ContactForm.Cost3.value);
var c4=parseInt(document.ContactForm.Cost4.value);
document.ContactForm.Total.value =c1+c2+c3+c4;
var c = document.getElementById('RedMaple1');
var d = document.getElementById('SugarMaple1');
var e = document.getElementById('RiverBirch1');
var f = document.getElementById('Catalpa1'); 

document.ContactForm.noOfRedMaple.value ="0";
document.ContactForm.noOfSugarMaple.value ="0";
document.ContactForm.noOfRiverBirch.value ="0";
document.ContactForm.noOfCatalpa.value ="0";
/*
window.onload = function() {
	  
	
	  
	  c.onclick = function() {
	    if (c.checked == true) {document.getElementById('Red_Maple').disabled = false;
	    document.ContactForm.Cost1.value =0;
	    document.ContactForm.noOfRedMaple.value ="0";
	    }
	    else {document.getElementById('Red_Maple').disabled = true;
	    document.ContactForm.Cost1.value =0 ;
	    document.ContactForm.rmuniqueid1.value="";
	    document.ContactForm.rmuniqueid2.value="";
	    document.ContactForm.rmuniqueid3.value="";
	    document.ContactForm.rmuniqueid4.value="";
	    document.ContactForm.noOfRedMaple.value ="0";
	    }
	    var c1=parseInt(document.ContactForm.Cost1.value);
	    var c2=parseInt(document.ContactForm.Cost2.value);
	    var c3=parseInt(document.ContactForm.Cost3.value);
	    var c4=parseInt(document.ContactForm.Cost4.value);
	    
	    document.ContactForm.Total.value =c1+c2+c3+c4;
	   
	  
	    
	  }
	  d.onclick = function() {
		    if (d.checked == true) {document.getElementById('Sugar_Maple').disabled = false;
		    document.ContactForm.Cost2.value =0;
		
		    }
		    else {document.getElementById('Sugar_Maple').disabled = true;
		    
		    document.ContactForm.Cost2.value =0;
		    document.ContactForm.smuniqueid1.value="";
		    document.ContactForm.smuniqueid2.value="";
		    document.ContactForm.smuniqueid3.value="";
		    document.ContactForm.smuniqueid4.value="";
		    document.ContactForm.noOfSugarMaple.value ="0";
		    }
		    var c1=parseInt(document.ContactForm.Cost1.value);
		    var c2=parseInt(document.ContactForm.Cost2.value);
		    var c3=parseInt(document.ContactForm.Cost3.value);
		    var c4=parseInt(document.ContactForm.Cost4.value);
		    
		    document.ContactForm.Total.value =c1+c2+c3+c4;
		 
	}


e.onclick = function() {
    if (e.checked == true) {document.getElementById('River_Birch').disabled = false;
    document.ContactForm.Cost3.value =0;
    
    }
    else {document.getElementById('River_Birch').disabled = true;
    
    document.ContactForm.Cost3.value =0;
    document.ContactForm.rbuniqueid1.value="";
    document.ContactForm.rbuniqueid2.value="";
    document.ContactForm.rbuniqueid3.value="";
    document.ContactForm.rbuniqueid4.value="";
    
    document.ContactForm.noOfRiverBirch.value ="0";
    }
    var c1=parseInt(document.ContactForm.Cost1.value);
    var c2=parseInt(document.ContactForm.Cost2.value);
    var c3=parseInt(document.ContactForm.Cost3.value);
    var c4=parseInt(document.ContactForm.Cost4.value);
    
    document.ContactForm.Total.value =c1+c2+c3+c4;
}



f.onclick = function() {
    if (f.checked == true) {document.getElementById('Catalpa').disabled = false;
    document.ContactForm.Cost4.value =0;
    }
    else {document.getElementById('Catalpa').disabled = true;
    
    document.ContactForm.Cost4.value =0;
    document.ContactForm.cauniqueid1.value="";
    document.ContactForm.cauniqueid2.value="";
    document.ContactForm.cauniqueid3.value="";
    document.ContactForm.cauniqueid4.value="";
    document.ContactForm.noOfCatalpa.value ="0";
    }
    var c1=parseInt(document.ContactForm.Cost1.value);
    var c2=parseInt(document.ContactForm.Cost2.value);
    var c3=parseInt(document.ContactForm.Cost3.value);
    var c4=parseInt(document.ContactForm.Cost4.value);
    
    document.ContactForm.Total.value =c1+c2+c3+c4;
    


}

}
*/

function myFunction1() {
    var x = document.ContactForm.noOfRedMaple.value;
   
    RMuniqueId1 ='RM'+'-'+Math.random(100).toString().substr(2, 5);
    RMuniqueId2 ='RM'+'-'+Math.random(100).toString().substr(2, 5);
    RMuniqueId3 ='RM'+'-'+Math.random(100).toString().substr(2, 5);
    RMuniqueId4 ='RM'+'-'+Math.random(100).toString().substr(2, 5);
    if(x=="0"){
        document.ContactForm.Cost1.value =0 ;
        document.ContactForm.rmuniqueid1.value="";
        document.ContactForm.rmuniqueid2.value="";
        document.ContactForm.rmuniqueid3.value="";
        document.ContactForm.rmuniqueid4.value="";
      }
  
    else if(x=="1"){
    document.ContactForm.Cost1.value =50 ;
    document.ContactForm.rmuniqueid1.value=RMuniqueId1;
    document.ContactForm.rmuniqueid2.value="";
    document.ContactForm.rmuniqueid3.value="";
    document.ContactForm.rmuniqueid4.value="";
  }
else if(x=="2"){
	
 document.ContactForm.Cost1.value =100 ;
 document.ContactForm.rmuniqueid1.value=RMuniqueId1;
 document.ContactForm.rmuniqueid2.value=RMuniqueId2;
 document.ContactForm.rmuniqueid3.value="";
 document.ContactForm.rmuniqueid4.value="";
}
else if(x=="3"){
 document.ContactForm.Cost1.value=150 ;
 document.ContactForm.rmuniqueid1.value=RMuniqueId1;
 document.ContactForm.rmuniqueid2.value=RMuniqueId2;
 document.ContactForm.rmuniqueid3.value=RMuniqueId3;
 document.ContactForm.rmuniqueid4.value="";
}
else if(x=="4"){
 document.ContactForm.Cost1.value=200 ;
 document.ContactForm.rmuniqueid1.value=RMuniqueId1;
 document.ContactForm.rmuniqueid2.value=RMuniqueId2;
 document.ContactForm.rmuniqueid3.value=RMuniqueId3;
 document.ContactForm.rmuniqueid4.value=RMuniqueId4;
}

    var c1=parseInt(document.ContactForm.Cost1.value);
    var c2=parseInt(document.ContactForm.Cost2.value);
    var c3=parseInt(document.ContactForm.Cost3.value);
    var c4=parseInt(document.ContactForm.Cost4.value);

    document.ContactForm.Total.value=c1+c2+c3+c4;
}

function myFunction2() {
	
    var x = document.ContactForm.noOfSugarMaple.value;
    
    SMuniqueId1 ='SM'+'-'+Math.random(100).toString().substr(2, 5);
    SMuniqueId2 ='SM'+'-'+Math.random(100).toString().substr(2, 5);
    SMuniqueId3 ='SM'+'-'+Math.random(100).toString().substr(2, 5);
    SMuniqueId4 ='SM'+'-'+Math.random(100).toString().substr(2, 5);
   
    if(x=="0"){
        document.ContactForm.Cost2.value =0 ;
       
        document.ContactForm.smuniqueid1.value="";
        document.ContactForm.smuniqueid2.value="";
        document.ContactForm.smuniqueid3.value="";
        document.ContactForm.smuniqueid4.value="";
        }
    
    else if(x=="1"){
    document.ContactForm.Cost2.value =65 ;
   
    document.ContactForm.smuniqueid1.value=SMuniqueId1;
    document.ContactForm.smuniqueid2.value="";
    document.ContactForm.smuniqueid3.value="";
    document.ContactForm.smuniqueid4.value="";
    }
    
else if(x=="2"){
	
 document.ContactForm.Cost2.value=130 ;
 document.ContactForm.smuniqueid1.value=SMuniqueId1;
 document.ContactForm.smuniqueid2.value=SMuniqueId2;
 document.ContactForm.smuniqueid3.value="";
 document.ContactForm.smuniqueid4.value="";
}
else if(x=="3"){
 document.ContactForm.Cost2.value=195 ;
 document.ContactForm.smuniqueid1.value=SMuniqueId1;
 document.ContactForm.smuniqueid2.value=SMuniqueId2;
 document.ContactForm.smuniqueid3.value=SMuniqueId3;
 document.ContactForm.smuniqueid4.value="";
}
else if(x=="4"){
 document.ContactForm.Cost2.value=260 ;

 document.ContactForm.smuniqueid1.value=SMuniqueId1;
 document.ContactForm.smuniqueid2.value=SMuniqueId2;
 document.ContactForm.smuniqueid3.value=SMuniqueId3;
 document.ContactForm.smuniqueid4.value=SMuniqueId4;
}

    var c1=parseInt(document.ContactForm.Cost1.value);
    var c2=parseInt(document.ContactForm.Cost2.value);
    var c3=parseInt(document.ContactForm.Cost3.value);
    var c4=parseInt(document.ContactForm.Cost4.value);



document.ContactForm.Total.value=c1+c2+c3+c4;


}
function myFunction3() {
    var x = document.ContactForm.noOfRiverBirch.value;
    RBuniqueId1 ='RB'+'-'+Math.random(100).toString().substr(2, 5);
    RBuniqueId2 ='RB'+'-'+Math.random(100).toString().substr(2, 5);
    RBuniqueId3 ='RB'+'-'+Math.random(100).toString().substr(2, 5);
    RBuniqueId4 ='RB'+'-'+Math.random(100).toString().substr(2, 5);
    if(x=="0"){
        document.ContactForm.Cost3.value=0 ;
        document.ContactForm.rbuniqueid1.value="";
        document.ContactForm.rbuniqueid2.value="";
        document.ContactForm.rbuniqueid3.value="";
        document.ContactForm.rbuniqueid4.value="";
      }
    
    else if(x=="1"){
    document.ContactForm.Cost3.value=25 ;
    document.ContactForm.rbuniqueid1.value=RBuniqueId1;
    document.ContactForm.rbuniqueid2.value="";
    document.ContactForm.rbuniqueid3.value="";
    document.ContactForm.rbuniqueid4.value="";
  }
else if(x=="2"){
 document.ContactForm.Cost3.value=50 ;
 document.ContactForm.rbuniqueid1.value=RBuniqueId1;
 document.ContactForm.rbuniqueid2.value=RBuniqueId2;
 document.ContactForm.rbuniqueid3.value="";
 document.ContactForm.rbuniqueid4.value="";
}
else if(x=="3"){
 document.ContactForm.Cost3.value=100 ;
 document.ContactForm.rbuniqueid1.value=RBuniqueId1;
 document.ContactForm.rbuniqueid2.value=RBuniqueId2;
 document.ContactForm.rbuniqueid3.value=RBuniqueId3;
 document.ContactForm.rbuniqueid4.value="";
}
else if(x=="4"){
	
 document.ContactForm.Cost3.value=150 ;
 document.ContactForm.rbuniqueid1.value=RBuniqueId1;
 document.ContactForm.rbuniqueid2.value=RBuniqueId2;
 document.ContactForm.rbuniqueid3.value=RBuniqueId3;
 document.ContactForm.rbuniqueid4.value=RBuniqueId4;
}
    var c1=parseInt(document.ContactForm.Cost1.value);
    var c2=parseInt(document.ContactForm.Cost2.value);
    var c3=parseInt(document.ContactForm.Cost3.value);
    var c4=parseInt(document.ContactForm.Cost4.value);

document.ContactForm.Total.value=c1+c2+c3+c4;
}
function myFunction4() {
	
    var x = document.ContactForm.noOfCatalpa.value;
    CAuniqueId1 ='CA'+'-'+Math.random(100).toString().substr(2, 5);
    CAuniqueId2 ='CA'+'-'+Math.random(100).toString().substr(2, 5);
    CAuniqueId3 ='CA'+'-'+Math.random(100).toString().substr(2, 5);
    CAuniqueId4 ='CA'+'-'+Math.random(100).toString().substr(2, 5);
    if(x=="0"){
        document.ContactForm.Cost4.value=0 ;
        document.ContactForm.cauniqueid1.value="";
        document.ContactForm.cauniqueid2.value="";
        document.ContactForm.cauniqueid3.value="";
        document.ContactForm.cauniqueid4.value="";
      }
    
    else if(x=="1"){
    document.ContactForm.Cost4.value=35 ;
    document.ContactForm.cauniqueid1.value=CAuniqueId1;
    document.ContactForm.cauniqueid2.value="";
    document.ContactForm.cauniqueid3.value="";
    document.ContactForm.cauniqueid4.value="";
  }
else if(x=="2"){
 document.ContactForm.Cost4.value=70 ;
 document.ContactForm.cauniqueid1.value=CAuniqueId1;
 document.ContactForm.cauniqueid2.value=CAuniqueId2;
 document.ContactForm.cauniqueid3.value="";
 document.ContactForm.cauniqueid4.value="";
}
else if(x=="3"){
 document.ContactForm.Cost4.value=105 ;
 document.ContactForm.cauniqueid1.value=CAuniqueId1;
 document.ContactForm.cauniqueid2.value=CAuniqueId2;
 document.ContactForm.cauniqueid3.value=CAuniqueId3;
 document.ContactForm.cauniqueid4.value="";
}
else if(x=="4"){
 document.ContactForm.Cost4.value=140 ;
 document.ContactForm.cauniqueid1.value=CAuniqueId1;
 document.ContactForm.cauniqueid2.value=CAuniqueId2;
 document.ContactForm.cauniqueid3.value=CAuniqueId3;
 document.ContactForm.cauniqueid4.value=CAuniqueId4;
}
  var c1=parseInt(document.ContactForm.Cost1.value);
  var c2=parseInt(document.ContactForm.Cost2.value);
  var c3=parseInt(document.ContactForm.Cost3.value);
  var c4=parseInt(document.ContactForm.Cost4.value);
document.ContactForm.Total.value=c1+c2+c3+c4;

}

function valid_credit_card(ContactForm) {
	
var valid=false;

		var value=document.ContactForm.cardno.value;
		  // accept only digits, dashes or spaces
		
			if (/[^0-9-\s]+/.test(value)) return false;

			// The Luhn Algorithm. It's so pretty.
			var nCheck = 0, nDigit = 0, bEven = false;
			value = value.replace(/\D/g, "");
			if(value.length<16||value.length>16)
			{
			alert("Invalid CardNumber");
		return false;
			}
			for (var n = value.length - 1; n >= 0; n--) {
				var cDigit = value.charAt(n),
					  nDigit = parseInt(cDigit, 10);
					
					  			 
				if (bEven) {
					if ((nDigit *= 2) > 9) nDigit -= 9;
				}

				nCheck += nDigit;
				bEven = !bEven;
				
			}
			
					
				if ((nCheck % 10)!= 0)
					{
					alert("Invalid Cardno");
					return false;
					}
				else{
					return true;
				}
					
	}
</script>
</body>
</html>