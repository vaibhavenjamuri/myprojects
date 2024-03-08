<?php
   ob_start();
   session_start();
?>

<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  

<title> Login Page </title>  
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
	#text {display:none;color:red}
</style>   
</head>    
<body>    



    <center> <h1>Login Form </h1> </center>   
<form align="center" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
			
        <div class="container" >   
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="username" id="username" style="width:20%" required>  </br>
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" id="password"  style="width:20%" required>  </br>
            <button type="submit"  name="login" id="login" style="width:8%" >Login</button>   </br>
			<p id="text">WARNING! Caps lock is ON.</p>
         <a href="Register.php">Click here to register</a>

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






  if (isset($_POST['login']))
  {
	  $conn=pg_connect("host=localhost port=5432 dbname=testDB user=postgres password=123");

$username=$_POST['username'];
$password=$_POST['password'];
    $result =pg_query($conn,"SELECT * FROM login where userid='$username' and password=crypt('$password', password)");
	$row  = pg_fetch_row($result );
 echo "<script type='text/javascript'>alert($username,$password);</script>";

    if(is_array($row))
    {
		
  
  $_SESSION["userid"]=$row[0];
  $_SESSION["password"]=$row[1];

        $_SESSION["fist_name"]=$row[2];
		
	
        $_SESSION["last_name"]=$row[3]; 
		   
           header("location:welcome.php");
    }
    else
    {
        echo "Invalid Email ID/Password";
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
<script>
var input = document.getElementById("password");
var text = document.getElementById("text");
input.addEventListener("keyup", function(event) {

if (event.getModifierState("CapsLock")) {
    text.style.display = "block";
  } else {
    text.style.display = "none"
  }
});
</script>
</html>  