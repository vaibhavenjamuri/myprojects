<?php

#require_once("../../../odis/getUserInfo.php");
require_once("/var/www/ODIS/getUserInfo.php");

	if(is_null($joomlaUserName)){
		echo '<html><body><center>Please login with authenticated user to access <br /> <br />Please contact <br /><br /><hr />	DMG <br /> </center> </body></html>';
	} else if(!in_array(10,$joomlaGroups)){
		echo '<html><body><center>Dear '.$joomlaUserName.' your are not authenticated to access </center> </body></html>';
	} else 
{
?>
<html>


<head>
<title>Data Request List</title>
<link rel="stylesheet" type="text/css" href="../ExternalLibraries/css/jquery-ui.css" />
            <link rel="stylesheet" type="text/css" href="../ExternalLibraries/css/datatables.css" />
            <link rel="stylesheet" href="../ExternalLibraries/css/colorbox.css">
            <link rel="stylesheet" type="text/css" href="../ExternalLibraries/css/style.css" />
            <link rel="stylesheet" type="text/css" href="../ExternalLibraries/css/bootstrap.min.css" />
<style>
table {
width: 100%;
border-collapse: collapse;
}


td,
th {
border: 1px solid black;
padding-left: 5px;
padding-right: 5px
}


.filterTable td {
border: 1px solid black;
padding-left: 0px;
}


form {
margin-bottom: 0em;
}


.styled-table {
border: 1px solid lightgrey;
border-collapse: collapse;
margin: 66px 0;
margin-left: auto;
margin-right: auto;
font-size: 0.9em;
font-family: sans-serif;
min-width: 400px;
box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}


.styled-table thead tr {
position: sticky;
top: 0;
background-color: #009879;
color: #ffffff;
text-align: left;
}


.styled-table th,
.styled-table td {
padding: 12px 15px;
}


.styled-table tbody tr {
border-bottom: 1px solid #dddddd;
}


.styled-table tbody tr:nth-of-type(even) {
background-color: #f3f3f3;
}


.styled-table tbody tr:last-of-type {
border-bottom: 2px solid #009879;
}


.styled-table thead th {}


.filterTable td {
border: 1px solid white;
padding-left: 0px;
}


form {
margin-bottom: 0em;
}
</style>


	    <script type="text/javascript" src="../ExternalLibraries/js/jquery-1.10.2.js"></script>
            <script type="text/javascript" src="../ExternalLibraries/js/jquery-ui.js"></script>
            <script type="text/javascript" src="../ExternalLibraries/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="../ExternalLibraries/js/datatables.js"></script>
            <script src="../ExternalLibraries/js/colorbox.js"></script> 
<script type="text/javascript">
$(function () {
$(".datepicker").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "1900:2050" });
$('th').on("click", function (event) { if (event.target.nodeName == 'SELECT') event.stopImmediatePropagation(); });
$('.styled-table').DataTable({
columnDefs: [{ targets: [0, 5], orderable: false }], order: [],
initComplete: function () {
this.api().columns().every(function () {
var column = this;
// if(column.selector.cols!=0 && column.selector.cols!=3 && column.selector.cols!=6)
if (column.selector.cols != 6) {
var select = $('<br><select style="width:150px"><option value="">All</option></select>')
.appendTo($(column.header()))
.on('change', function () { var val = $.fn.dataTable.util.escapeRegex($(this).val()); column.search(val ? '^' + val + '$' : '', true, false).draw(); });
column.data().unique().sort().each(function (d, j) { if (d != '') select.append('<option value="' + d + '">' + d + '</option>') });
}
});
}
});
});




function updatedatarequest(sno) {
var updateConfirm = confirm("Are you sure you want to edit the given entry ?");
if (updateConfirm) {
document.updateForm.sno.value = sno;
//document.updateForm.submit();


$.post("http://172.16.1.151/utilities/Administrations/UpdateDataRequest.php",
$("#updateForm").serialize(),
function (data){

$.colorbox({

html: data,

//href: "http://172.16.1.151/utilities/Administrations/UpdateDataRequest.php?sno=" + sno,

open: true,

iframe: false,

width: "50%",

height: "100%"

});

}, "html");
return false;
}
}


function viewdatarequest(sno) {
document.viewForm.sno.value = sno;
//document.viewForm.submit();
//$.get("ViewDataRequest.php",
// $("#viewForm").serialize(),
// function(data) {
$.colorbox({
href: "http://172.16.1.151/utilities/Administrations/ViewDataRequest.php?sno=" + sno,
open: true,
iframe: true,
width: "50%",
height: "100%"
});
// }, "html");
return false;
}
function adddatarequest() {
//$.get("index.php",
// $("#addForm").serialize(),
// function(data) {
$.colorbox({
href: "http://172.16.1.151/utilities/Administrations/Add_Data_Requests.php",
open: true,
iframe: true,
width: "50%",
height: "100%"
});
// }, "html");
return false;
}

function statdasboard()
{


//$.get("index.php",
//$("#addForm").serialize(),
//function(data) {
$.colorbox ({
href:   "http://172.16.1.151/utilities/Administrations/Dashboard.php",
open:   true,
iframe: true,
width:  "80%",
height: "100%"
});
//}, "html");
return false;




}


function toggleFilterDiv() {
if (document.getElementById("FilterDiv").style.visibility == 'visible') {
document.getElementById("FilterDiv").style.visibility = 'hidden';
document.getElementById("FilterDiv").style.height = '0px';
}
else {
document.getElementById("FilterDiv").style.visibility = 'visible';
document.getElementById("FilterDiv").style.height = 'auto';
}
}
function Clear() {


document.getElementById("cname").value = "name";
document.getElementById("prog").value = "oprog";
document.getElementById("status").value = "ostatus";


}
</script>
</head>


<body>
<div>
<?php
$mysqli = new mysqli("localhost", "webser", "WebSer#3010", "db_administration");
if ($mysqli->connect_errno) {
echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
exit();
}
?>

<form name="updateForm" id="updateForm" action="UpdateDataRequest.php" method="post"> <input type="hidden"
value="" name="sno" /> </form>
<form name="viewForm" id="viewForm" action="ViewDataRequest.php"> <input type="hidden" value="" name="sno" />
</form>
<div style="text-align:right;padding-bottom:10px"> <a href="#" onclick="toggleFilterDiv()">Filter</a> <a
href="#" onclick="Clear()">Clear</a> </div>
<div id="FilterDiv" class="border"
style=" <?php if (!isset($_GET['cname']))
echo "visibility:hidden;height:0px;padding-top: 15px; padding-bottom: 10px;"; ?>">
<form action="<?= $_SERVER['PHP_SELF'] ?>">
<div class="container">
<div class="row">
<!--<div class="col-md-1"> <label>Name :</label> </div>-->
<!--<div class="col-md-3">--> 

<select name="cname" id="cname" class="form-control" hidden>
<?php
echo "<option value='All'>All</option>";
$sql2 = "SELECT contact_id,name,organisation from t_contact where contact_id in (select distinct(contact_id) from t_data_request)";
$results2 = $mysqli->query($sql2);
if ($results2->num_rows >= 1) {
while ($row2 = $results2->fetch_array()) {
echo "<option ";
if (isset($_GET['cname']) && strcmp($row2[0], $_GET['cname']) == 0)
echo "selected ";
echo "value='" . $row2[0] . "'>" . $row2[1] . " (" . $row2[2] . ")" . "</option>";
}
}
$results2->free();
?>
</select>

<!--</div>-->
<div class="col-md-2"> <label><b>Programme :</b></label> </div>
<div class="col-md-2"> <select name="prog" id="prog" class="form-control">
<?php
echo "<option value='All'>All</option>";
$sql2 = "SELECT programme_id,programme_name from t_programme where programme_id in (select distinct(programme_id) from t_request_details)";
$results2 = $mysqli->query($sql2);
if ($results2->num_rows >= 1) {
while ($row2 = $results2->fetch_array()) {
echo "<option ";
if (isset($_GET['prog']) && strcmp($row2[0], $_GET['prog']) == 0)
echo "selected ";
echo "value='" . $row2[0] . "'>" . $row2[1] . "</option>";
}
}
$results2->free();
?>
</select>
</div>
<div class="col-md-1">
<label><b>Status :</b></label>
</div>
<div class="col-md-2">
<select name="status" id="status" class="form-control">
<?php
echo "<option value='All'>All</option>";
$sql2 = "SELECT distinct(status) from t_data_request";
$results2 = $mysqli->query($sql2);
if ($results2->num_rows >= 1) {
while ($row2 = $results2->fetch_array()) {
echo "<option ";
if (isset($_GET['status']) && strcmp($row2[0], $_GET['status']) == 0)
echo "selected ";
echo "value='" . $row2[0] . "'>" . $row2[0] . "</option>";
}
}
$results2->free();
?>
</select>
</div>
<div class="col-md-1">
<label><b>Received Date :</b></label>
</div>
<div class="col-md-2">
<input class="datepicker form-control" type="text" size="10" name="sdate" <?php if (isset($_GET['sdate']))
echo "value=\"" . $_GET['sdate'] . "\"";
else
echo "value=\"1990-01-01\""; ?> /> - <input class="datepicker form-control" type="text"
size="10" name="edate" <?php if (isset($_GET['edate']))
echo "value=\"" . $_GET['edate'] . "\"";
else
echo "value=\"" . date("Y-m-d", strtotime(date("m/d/Y") . "+1 days")) . "\""; ?> />
</div>

<div class="col-md-2">
 <input type="submit" class="btn btn-outline-primary" value="Filter Results" />
</div>
</div>
</div></br>

</form>
</div></br>
<div class="col text-center">

<input type="button" class="btn btn-outline-primary" onclick="adddatarequest()"
value="Add Data Request" />&nbsp;
<input type="button" class="btn btn-outline-primary" onclick="statdasboard()" value="Statistical Dashboard"/>&nbsp;

<a href="http://172.16.1.151/index.php/administration/data-requests" class="btn btn-outline-primary">List All
Results</a>

</div>
<table class="styled-table" style="font-size:12px">
<thead>
<tr>
<th style="width: 15%; text-align: left;padding-top: 10px">Name</th>
<th style="width: 7%; text-align: left;padding-top: 10px">Organization</th>
<th style="width: 5%; text-align: left;padding-top: 10px">Email</th>
<th style="width: 15%; text-align: left;padding-top: 10px">Requested data</th>
<th style="width: 15%; text-align: left;padding-top: 10px">Received Date</th>
<th style="width: 10%; text-align: left;padding-top: 10px">Status</th>
<th style="width: 15%;text-align: center">Action</th>
</tr>
</thead>
<tbody>
<?php
//$sql = "SELECT contact_id,date(received_date) as received_date,status,request_id from t_data_request";
//if (isset($_GET['cname']))
//$sql = $sql . " where contact_id=? and status=? and received_date between ? and ? and request_id in (select distinct(request_id) from t_request_details where programme_id=?)";
//$stmt = $mysqli->prepare($sql);
//if (isset($_GET['cname']))
//$stmt->bind_param("sssss", $_GET['cname'], $_GET['status'], $_GET['sdate'], $_GET['edate'], $_GET['prog']);

if (isset($_GET['cname'])=="All"&&$_GET['status']!="All"&&$_GET['prog']!="All")
{
$sql = "SELECT contact_id,date(received_date) as received_date,status,request_id from `t_data_request` where  status=? and received_date between ? and ? and request_id in (select distinct(request_id) from `t_request_details` where programme_id=?) order by received_date desc";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssss",$_GET['status'],$_GET['sdate'],$_GET['edate'],$_GET['prog']);
}


else if (isset($_GET['cname'])=="All"&&$_GET['status']=="All"&&$_GET['prog']!="All")
{
$sql = "SELECT contact_id,date(received_date) as received_date,status,request_id from `t_data_request` where received_datebetween ? and ? and request_id in (select distinct(request_id ) from `t_request_details` where programme_id=?) order by received_date desc";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss",$_GET['sdate'],$_GET['edate'],$_GET['prog']);
}
else if (isset($_GET['cname'])=="All"&&$_GET['status']!="All"&&$_GET['prog']=="All")
{
$sql = "SELECT contact_id,date(received_date) as received_date,status,request_id from `t_data_request` where status=? and received_date between ? and ? order by received_date desc";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss",$_GET['status'],$_GET['sdate'],$_GET['edate'],);
}


 else if (isset($_GET['cname'])=="All"&&$_GET['status']=="All"&&$_GET['prog']=="All")
{
$sql = "SELECT contact_id,date(received_date) as received_date,status,request_id from `t_data_request` where received_date between ? and ? order by received_date desc";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss",$_GET['sdate'],$_GET['edate']);
}
else if (isset($_GET['cname'])!="All"&&isset($_GET['status'])!="All"&&isset($_GET['cname'])!="All")
{


$sql = "SELECT contact_id,date(received_date) as received_date,status,request_id from `t_data_request` order by received_date desc";
if (isset($_GET['cname']))
$sql = $sql . " where contact_id=? and status=? and recv_date between ? and ? and sno in (select distinct(REQUEST_ID) from `t_request_details` where PROGRAMME_ID=?) ";
$stmt = $mysqli->prepare($sql);
if (isset($_GET['cname']))
$stmt->bind_param("sssss", $_GET['cname'],$_GET['status'],$_GET['sdate'],$_GET['edate'],$_GET['prog']);
}


if (isset($_GET['cname']))
{


$_SESSION['cname']= $_GET['cname'];
}
if (isset($_GET['status']))
{
$_SESSION['status']=$_GET['status'];
}
if (isset($_GET['sdate']))
{
$_SESSION['sdate']=$_GET['sdate'];
}
if (isset($_GET['edate']))
{
$_SESSION['edate']=$_GET['edate'];
}
if (isset($_GET['prog']))
{
$_SESSION['prog']=$_GET['prog'];

}
if ($stmt->execute()) {
$stmt->store_result();
if ($stmt->num_rows >= 1) {
$stmt->bind_result($contact_id, $received_date, $status, $request_id);
while ($stmt->fetch()) {
$sql2 = "SELECT name,organisation,email from t_contact WHERE contact_id = ?";
$stmt2 = $mysqli->prepare($sql2);
$stmt2->bind_param("s", $contact_id);
if ($stmt2->execute()) {
$stmt2->store_result();
if ($stmt2->num_rows >= 1) {
$stmt2->bind_result($name, $organisation, $email);
while ($stmt2->fetch()) {
$contact_name = $name;
$contact_org = $organisation;
$contact_email = $email;
}
}
}

$programme = "";
$sql2 = "select programme_id,parameters from t_request_details where request_id = ?";
//$sql2 = "SELECT programme_name from t_programme WHERE programme_id IN (select programme_id from t_request_details where request_id = ?)";
$stmt2 = $mysqli->prepare($sql2);
$stmt2->bind_param("s", $request_id);
if ($stmt2->execute()) {
$stmt2->store_result();
if ($stmt2->num_rows > 1) {
$stmt2->bind_result($PROG, $PARAM);
while ($stmt2->fetch()) {
$sql3 = "SELECT programme_name from t_programme WHERE programme_id = ?";
$stmt3 = $mysqli->prepare($sql3);
$stmt3->bind_param("s", $PROG);
if ($stmt3->execute()) {
$stmt3->store_result();
$stmt3->bind_result($PROG_NAME);
if ($stmt3->fetch()) {
$programme = $PROG_NAME . " (" . $PARAM . ")" . "," . $programme;
}
}
}
} else if ($stmt2->num_rows == 1) {
$stmt2->bind_result($PROG, $PARAM);
if ($stmt2->fetch()) {
$sql3 = "SELECT programme_name from t_programme WHERE programme_id = ?";
$stmt3 = $mysqli->prepare($sql3);
$stmt3->bind_param("s", $PROG);
if ($stmt3->execute()) {
$stmt3->store_result();
$stmt3->bind_result($PROG_NAME);
if ($stmt3->fetch()) {
$programme = $PROG_NAME . " (" . $PARAM . ")";
}
}
}
}
}
?>
<tr>
<td style="width: 15%; text-align: left;padding-top: 10px">
<?php echo $contact_name; ?>
</td>
<td style="width: 7%; text-align: left;padding-top: 10px">
<?php echo $contact_org; ?>
</td>
<td style="width: 5%; text-align: left;padding-top: 10px">
<?php echo $contact_email; ?>
</td>
<td style="width: 15%; text-align: left;padding-top: 10px">
<?php echo $programme; ?>
</td>
<td style="width: 15%; text-align: left;padding-top: 10px">
<?php echo $received_date; ?>
</td>
<td style="width: 10%; text-align: left;padding-top: 10px">
<?php echo $status; ?>
</td>
<td style="width: 15%;text-align: center">
<input type="button" class="btn btn-outline-primary"
onclick="viewdatarequest('<?php echo $request_id; ?>')" value="View" />&nbsp;
<input type="button" class="btn btn-outline-primary"
onclick="updatedatarequest('<?php echo $request_id; ?>')" value="Edit" />

</td>
</tr>
<?php
}
} else {
?>
<tr>
<td colspan=7 style="text-align:center;vertical-align:center">No data available</td>
</tr>
<?php
}
}
?>
</tbody>
</table>
</div>
</body>

</html>
<?php
}
?>

