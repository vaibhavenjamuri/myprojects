<!DOCTYPE html>
<html lang="en">
<head>
<title>AirLines | Services</title>
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

<style>
#div {
   float: left; /* or right */
}
</style>
</head>
<body id="page4">
<div class="main">
  
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
      <form name="ContactForm" id="ContactForm" action="servicesServlet" method="post"> 
          <table width="60%" >
    <tr>
        <td colspan="2"> <h4>Print Ticket</h4> </td>
            </tr>
              
      
      <tr><td colspan="4">&nbsp;</td></tr> 
    <tr>
    <td width="20%" class="inputtable">Apt No. :</td>
    <td width="10%" class="inputtable"><core:out value="${apartment1.aptNo}"/></td>
    
    <td width="30%" class="inputtable"> Flat No. :</td>
    <td width="10%" class="inputtable"><core:out value="${apartment1.flatNo}"/> </td>
    </tr>
    
    <tr >
    <td class="inputtable">Rent($) :</td>
    <td class="inputtable"><core:out value="${payment.amount}"/> </td>
    
    <td class="inputtable">Payment made for :</td>
    <td class="inputtable"><core:out value="${payment.month}"/> - <core:out value="${payment.year}"/> </td>
    
    </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
    
    <tr>
    <td colspan="4" align="center"><input type="button" value="Print Receipt" onClick="window.print()"></td>
    </tr>
    </table>
    </form>
    </div>
  </section>
 
</div>


</script>
</body>
</html>