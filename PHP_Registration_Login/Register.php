<?php
   ob_start();
   session_start();
?>
<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  

<title> Registration Page </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  

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
        
     
 .container {   
        padding: 25px;   
        background-color: lightblue;  
    }   
</style>   
</head>    
<body>    


    <center> <h1>Registration Form </h1> </center>   
<form align="center" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
			
        <div class="container" >   
            <label>First Name : </label>   
            <input type="text" placeholder="Enter fistname" id="fistname" name="fistname" value="<?php if (isset($_POST['fistname'])) echo $_POST["fistname"];?>" style='width:20%' required>  </br>
            <label>Last Name : </label>   
            <input type="text" placeholder="Enter lastname" id="lastname" name="lastname" value="<?php if (isset($_POST['lastname'])) echo $_POST["lastname"];?>" style='width:20%' required>  </br>
			 <label>Username : </label>   
            <input type="text" placeholder="Enter Username" id="username" name="username" value="<?php if (isset($_POST['username'])) echo $_POST["username"];?>" style='width:20%' required>  </br>
			<label>Password : </label>   
            <input type="password" placeholder="Enter Password" id="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST["password"];?>" style='width:20%' required>  </br>
            <button type="submit" name="submit" id="submit" style="width:8%">Submit</button>   </br>
          <a href="index.php">Click here to login</a>
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
	  
$fistname=$_POST['fistname'];
$lastname=$_POST['lastname'];
$username=$_POST['username'];

// Given password
$password = $_POST['password'];;

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}else{
	
    $result1 =pg_query($conn,"SELECT * FROM login where userid='$username'");
	$row  = pg_fetch_row($result1);


    if(is_array($row))
    {
		if($row[0]==$username)
		{
echo "Username already exits!";

		}
		
		
	}
	else{
		  $query ="INSERT INTO login VALUES ('$username',crypt('$password', gen_salt('bf')),'$fistname','$lastname',NULL,LOCALTIMESTAMP)";
	
       
   // $query = "INSERT INTO employee(first_name,last_name,city_name,email)
	 // values ('$first_name','$last_name','$city_name','$email')";
	
	
	
	
	
	 if($result = pg_query($query)){
		 	 
		echo "Data Added Successfully.";
	 }
		}
	
	
	
	
  

	 
		 
		
	 
 }
}
   
		
?>
</body>     
</html>  