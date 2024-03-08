<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="font-awesome/4.7.0/css/font-awesome.css">
 <script src="Bootstrap/jquery.min.js" type="text/javascript"></script>
 <link rel="Stylesheet" href="datepicker/datepicker.css" />
 <script type="text/javascript" src="datepicker/bootstrap-datepicker.js"></script>
 
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
input,select{   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
	button {   
       background-color: #4CAF50;   
       width: 100%;  
        color: orange;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
		 .center {
  margin: auto;
  width: 25%;
  border: 3px solid green;
  padding: 10px;
}
.tbcenter {
  margin: auto;
  width: 25%;
  padding: 10px;
}
</style>
</head>
<body>
<?php
      session_start();
		$var_value = $_SESSION["fist_name"];
		
        ?>
<div class="navbar">
  <a href="welcome.php">Home</a>
  <a href="#news">About</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> 
  <a href="#news"></a>
   <div class="dropdown" style="float: right">
    <button class="dropbtn"><b>Welcome</b>&nbsp &nbsp<?php echo $var_value ?>  <?php echo $_SESSION["last_name"] ?>
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
	  <a href="changepassword.php">change password</a>
      <a href="logout.php">Logout</a>
   
    </div>
  </div> 
</div>
</br>
<div class="center" >
<h1>Job Application Form</h1>
<form  method="post" >

<table border="0" cellpadding="5" cellspacing="0">
<tr> <td style="width: 50%">
<label for="First_Name"><b>First name *</b></label><br />
<input name="First_Name" type="text" maxlength="50" value="<?php echo $_SESSION["fist_name"];?>" style="width:100%;max-width: 260px" readonly/>
</td> <td style="width: 50%">
<label for="Last_Name"><b>Last name *</b></label><br />
<input name="Last_Name" type="text" maxlength="50" value="<?php  echo $_SESSION["last_name"];?>" style="width:100%;max-width: 260px" readonly/>
</td> </tr>
<tr> <td colspan="2">
<label for="Date of Birth"><b>Date of Birth *</b></label><br />
<input name="DOB" id="DOB" type="text"  value="<?php if (isset($_POST['DOB'])) echo $_POST["DOB"];?>" style="width:100%;max-width: 535px" required/>
</td> </tr> 
 <tr> <td colspan="2">
<label for="Email_Address"><b>Email *</b></label><br />
<input name="Email_Address" type="text" maxlength="100" value="<?php if (isset($_POST['Email_Address'])) echo $_POST["Email_Address"];?>" style="width:100%;max-width: 535px" required/>
</td> </tr>  <tr> <td colspan="2">
<label for="Position"><b>Position you are applying for *</b></label><br />
<select id="Position" name="Position" value="<?php if (isset($_POST['Position'])) echo $_POST["Position"];?>"  style="width:100%;max-width: 260px">
    <option value="Software_Developer">Software Developer</option>
    <option value="Business_Analyst">Business Analyst</option>
    <option value="PHP_Developer">PHP Developer</option>
   
  </select>

</td> </tr>   <tr> <td>
<label for="Phone"><b>Phone *</b></label><br />
<input name="Phone" type="text" maxlength="50" value="<?php if (isset($_POST['Phone'])) echo $_POST["Phone"];?>" style="width:100%;max-width: 260px" required/>
</td>  </tr> <tr> <td colspan="2">
<label for="Relocate"><b>Are you willing to relocate?</b></label><br />
<input name="Relocate" type="radio" <?php if (isset($_POST['Relocate'])) echo "checked";?> value="yes"  /> Yes     
<input name="Relocate" type="radio" <?php if (isset($_POST['Relocate'])) echo "checked";?> value="no" /> No      
<input name="Relocate" type="radio" <?php if (isset($_POST['Relocate'])) echo "checked";?> value="notsure" /> Not sure
 </tr> <tr> <td colspan="2">
<label for="Organization"><b>Highest Qualification</b></label><br />
<input name="Qualification" type="text" maxlength="100" value="<?php if (isset($_POST['Qualification'])) echo $_POST["Qualification"];?>" style="width:100%;max-width: 535px" />
</td> </tr> 
<tr> <td colspan="2">
 Select image to upload:
  <input type="file" name="uploadfile"  style="width:100%;max-width: 535px" />
</td> <td><button type="submit"
                        name="upload">
                  UPLOAD
                </button></td></tr> 

</table>
<table class="tbcenter" border="0" cellpadding="5" cellspacing="0">
<tr> <td>
<button type="submit" name="submit" >Submit</button>
</td> 
<td>
<button type="submit" name="Download" >Download</button>
</td> 
<td>
<button type="submit" name="Print" >Print</button>
</td> 
</tr>

</form>

</div>
<script>
 $(document).ready(function () {
            $('#DOB').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                endDate: "today"
            });
 });
</script>
<?php 
 $conn=pg_connect("host=localhost port=5432 dbname=testDB user=postgres password=Ecil@123");
$userid=$_SESSION["userid"];	
// $query = "SELECT photo_image FROM applicant WHERE userid='$userid'";
$query = "SELECT encode(photo_image, 'base64') AS photo_image  FROM applicant WHERE userid='$userid'";

$res = pg_query($conn, $query);
$data = pg_fetch_result($res, 'photo_image');
 // $unes_image = pg_unescape_bytea($data);
 ?>

<?php 
#$file_name = "woman2.jpg";
// $img = fopen($file_name, 'wb') or die("cannot open image\n");
// fwrite($img, $unes_image) or die("cannot write image data\n");
// fclose($img);

// echo pg_unescape_bytea($data);
// echo '<img src="F:\Vaibhav/'.$unes_image.'" />';
// print $unes_image;
// echo '<img src="'.$unes_image.'" />';
// header('Content-type: image/jpeg');
echo base64_decode($data);
pg_close($conn); 

 





  if (isset($_POST['submit']))
  {
	  $conn=pg_connect("host=localhost port=5432 dbname=testDB user=postgres password=Ecil@123");
	  
$userid=$_SESSION["userid"];	  
$DOB=$_POST['DOB'];
$Email_Address=$_POST['Email_Address'];
$Position=$_POST['Position'];
$Phone=$_POST['Phone'];
$Relocate=$_POST['Relocate'];
$Qualification=$_POST['Qualification'];


 echo "<script type='text/javascript'>alert($DOB);</script>";
 // $es_data = pg_escape_bytea($target_file);
$query ="INSERT INTO applicant VALUES ('$userid','$DOB','$Email_Address','$Position',$Phone,'$Relocate','$Qualification',NULL);";

		 if($result=pg_query($query)){
		 	 
		echo "Submitted Successfully.";
	 }
  }
	
?>

 <?php
error_reporting(0);
?>
<?php
  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "C:/xampp/htdocs/uploads/".$filename;
       
		 
   $conn=pg_connect("host=localhost port=5432 dbname=testDB user=postgres password=Ecil@123");
  
        // Get all the submitted data from the form
		
        $query = "update applicant set photo_image='$filename' where userid='$userid'";
   echo "<script type='text/javascript'>alert('entered query');</script>";
   echo "<script type='text/javascript'>alert($tempname);</script>";
      echo "<script type='text/javascript'>alert($folder);</script>";
        // Execute query
   pg_query($conn, $query);
            echo "<script type='text/javascript'>alert('executed query');</script>";
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
				  echo $msg;
        }else{
            $msg = "Failed to upload image";
			 echo $msg;
      }


 $result = pg_query($db, "SELECT * FROM applicant");
while($data = pg_fetch_result($result))
{
  
      ?>
<img src="<?php print $data['photo_image']; ?>">
  
<?php
}
  }
?>

	<!--	 <p class="hint-text"><br><b>Welcome</b>&nbsp//</p>
<div class="text-center">Want to Leave the Page? <br><a href="logout.php">Logout</a></div>-->
 		  

	

</body>
</html>