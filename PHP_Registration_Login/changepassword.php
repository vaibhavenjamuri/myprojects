<?php
   ob_start();
   session_start();
   
?>

<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  

<title>Change Password Page</title>  
  
 <link rel="stylesheet" href="font-awesome/4.7.0/css/font-awesome.css">
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


button {   
       background-color: #4CAF50;   
       width: 100%;  
        color: orange;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
 .container,table {   
        padding: 25px;   
        background-color: lightblue;  
    }   
</style>   
</head>    
<body> 
<?php

		$var_value = $_SESSION["fist_name"];
		
        ?>
<div class="navbar">
  <a href="Welcome.php">Home</a>
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
    <center> <h1>Change Password</h1> </center>   
<form align="center" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
			
        <div class="container" >   
		<table align="center"><tr>
 			 <td align="right"><label>Username : </label></td>   
				
	
			 <td><input type="text"  id="username" name="username" value="<?php echo $_SESSION["userid"];?>" style='width:75%' readonly /></td></tr>
			
<!-- <label id="username" name="username" style="width:20%" required>  </br>-->
		<tr><td align="right"><label>Old Password : </label></td>   
            <td><input type="password" placeholder="Enter Password" id="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST["password"];?>" style='width:75%' required />   </td></tr>
			<tr><td align="right"><label>New Password : </label>   </td>
            <td><input type="password" placeholder="Enter New Password" id="newpassword" name="newpassword" value="<?php if (isset($_POST['newpassword'])) echo $_POST["newpassword"];?>" style='width:75%' required />  </td></tr>
			<tr><td align="right"><label>Confirm Password : </label>   </td>
           <td > <input type="password" placeholder="Enter Confirm Password" id="confirmpassword" name="confirmpassword" value="<?php if (isset($_POST['confirmpassword'])) echo $_POST["confirmpassword"];?>" style='width:75%' required />  </td></tr>
			   </table>
            <button type="submit" name="submit" id="submit" style="width:8%">Submit</button>   </br>
<!--<a href="index.php">Click here to login</a>   -->
        </div>   
    </form>     
	
	<?php
	
// $result = pg_query($conn, "SELECT * FROM login");  
// if (!$result) {  
 // echo "An error occurred.\n";  
 // exit;  
// }  
// while ($row = pg_fetch_row($result)) {  
 // echo "value1: $row[0]";  
 // echo "<br />\n";  

// }  






  if (isset($_POST['submit']))
  {
	  $conn=pg_connect("host=localhost port=5432 dbname=testDB user=postgres password=123");
	  
$username=$_POST["username"];
$password=$_POST["password"];
$newpassword=$_POST["newpassword"];
$confirmpassword=$_POST["confirmpassword"];
  $userid=$_SESSION["userid"];
  
	// echo $_SESSION["password"]; 
	// echo "<br>";
	// $hash = crypt('$password',$_SESSION["password"]);
	// echo $hash;
 // if ($password == $_SESSION["password"]) {
	 if (password_verify($password, $_SESSION["password"])){
	 // echo "<script type='text/javascript'>alert('original passwords matched');</script>";
	 if ($password==$newpassword){
		  echo "New Password and old password should be not be same.";
	  
	 }
	  else{
	if ($newpassword == $confirmpassword){
		  // Given password


// Validate password strength
$uppercase = preg_match('@[A-Z]@', $newpassword);
$lowercase = preg_match('@[a-z]@', $newpassword);
$number    = preg_match('@[0-9]@', $newpassword);
$specialChars = preg_match('@[^\w]@', $newpassword);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}else{
       $query ="UPDATE login set password=crypt('$newpassword', gen_salt('bf')),password_changed_date=LOCALTIMESTAMP where userid='$userid'"  ;
	// echo "<script type='text/javascript'>alert('new passwords matched and updated');</script>";
       
   // $query = "INSERT INTO employee(first_name,last_name,city_name,email) 
	 // values ('$first_name','$last_name','$city_name','$email')";
	 if($result = pg_query($query)){
		echo "Password Changed Successfully.";
	 }
	 else{
		echo "Error.";
	 }
 }
 }
 else{
	 echo "New Password and Confirm password should be same.";
 } 
 } 

		  	// echo "<script type='text/javascript'>alert('new passwords matched');</script>";

  }
  else{
	 echo "Incorrect Password";
 }
  }
   // $msg = '';
            
            // if (isset($_POST['login']) && !empty($_POST['username']) 
               // && !empty($_POST['password'])) {
				
               // if ($_POST['username'] == 'tutorialspoint' && 
                  // $_POST['password'] == '1234') {
                  // $_SESSION['valid'] = true;
                  // $_SESSION['timeout'] = time();
                  // $_SESSION['username'] = 'tutorialspoint';
                  
                  // echo 'You have entered valid use name and password';
               // }else {
                  // $msg = 'Wrong username or password';
               // }
            // }
		
?>
</body>     
</html>  