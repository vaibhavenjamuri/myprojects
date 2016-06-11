<!DOCTYPE html>
<html>
	<head>
		<!-- Created by project Group number: 04 --> 
		<meta charset="utf-8">
		<title> NewRegister Page </title>
		
		<!-- calling to existing CSS file -->
		<link rel="stylesheet" type="text/css" href="group42Style.css"/>
		
		<!-- calling to existing javascript file -->
		<script type="text/javascript" src="formValidation.js">
			
		</script>
	</head>
	<body background=image3.jpeg>
		<div class="banner">
			<h1> PVC Software Limited </h1>
			<div class="transbox">
				<p> Adding manpower to a late software project makes it later! </p>
			</div>
		</div>
		<nav>
			<ul class="firstul">
				<li><a href="Home.html">Home</a></li>
				<li><a href="Technologies.html">Technologies</a>
					<ul class="secondul">
						<li><a href="#">HTML5</a></li>
						<li><a href="#">CSS3</a></li>
						<li><a href="#">JavaScript</a></li>
						<li><a href="#">PHP</a></li>
						<li><a href="#">MySQL</a></li>
					</ul>
				</li>
				<li><a href="Request.html">Requests</a></li>
				<li><a href="Reachus.html">ReachUs</a></li>
			</ul>
		</nav> <br> 
		
		<!-- Creating a form to get the user input values -->
		<form action="Newregistration.php" align="center" onsubmit="return formValidation()" method="post">
			<p> <label>First Name: </label>
				<select name="dropdown">
					<option value="Mr.">Mr.</option>
					<option value="Ms.">Ms.</option>
				</select>
			
				<input type="text" id="firstName" name="firstname" maxlength="25" size="25" autofocus>  </p> 
				
				
			<p> <label>Last Name:</label>
				<input type="text" id="lastName" name="lastname" size="15" maxlength="15"> </p> 
				
			<p> <label>Mobile Number:</label>
				<!-- <input type="text" id="areaCode" size="4" placeholder="code"> -->
				<input type="text" id="mobileNumber" name="mobilenumber" size="10" maxlength="10"> </p> 
				
			<p> <label>Your EmailID:</label>
				<input type="text" id="mailId" size="25" name="mailid" placeholder="some@thing.com"> </p> 
			
			<p> <label>Current Date:</label>
				<input type="date" id="currentDate" name="currentdate" </p>
			
			<p> <label>Expected project completion Date:</label>
				<input type="date" id="expectedDate" name="expecteddate" </p> <br> <br>
				
			<p> <textarea maxlength="100" rows="4" cols="50" name="projectdetails" placeholder="Provide requirements about your project" required></textarea> </p> 
				
			<p> <input type="checkbox" id="agree" value="check" > I have read and agree to <a href="project_terms_andconditions.pdf">Terms and Conditions</a> </p> <br>
				
			<p> <input type="submit" id="submit" value="Submit" name="submit">
				<input type="reset" value="Clear"> </p>
				
				<input type = "hidden" name = "insert" value = 1/>
				
				
			</form>	
			
			<?php
			//Starting of PHP code 
			// This if condition is used to insert the values into database once after click on submit button	
			if ( isset($_POST['insert'] ) and $_POST['insert'] == 1) {
				
				$actualRef = "";
				$extraRef = "";
				$i;
				$j;
	
				for ($i = 0; $i < 8; $i++)	{
		
					$randomCharCode = mt_rand(47, 123);
		
					if (($randomCharCode > 47 && $randomCharCode < 58) || ($randomCharCode > 64 && $randomCharCode < 91) || ($randomCharCode > 96 && $randomCharCode < 123)) {
						$charValue = chr($randomCharCode);		
						$actualRef .= $charValue;
					
					} // End of if
		
				} // End of for
	
					// If random password is less than 8 characters then append number of reandom generated number equal to 8 - length of actual password.
				if (strlen($actualRef) < 8)	{
					$lengthOfRef = (8 - strlen($actualRef));
			
						// This for loop generating number of random numbers and it makes a characters password.
					for ($j = 0; $j < $lengthOfRef; $j++)	{
						$randomNumber = mt_rand(0, 9);
						$extraRef .= $randomNumber;			
					} // End of for
				
					$actualRef .= $extraRef;
		
				} // End of if
				
				//Declaring databse connection variables
				$servername = 'localhost';
				$username = 'root';
				$password = '';
				$dbname = 'project';
				$result;
			
				//Declaring php variables to insert data into table 
				$firstname = $_POST["firstname"];
				$lastname = $_POST["lastname"];
				$mobilenumber = $_POST["mobilenumber"];
				$mailid = $_POST["mailid"];
				$projectdetails = $_POST["projectdetails"];
				$expecteddate = $_POST["expecteddate"];
				$todaydate = date("Y-m-d"); //Declaring and getting todays date here
				
				//INSERT query
				$sql = "INSERT INTO customer (referencenum,firstname,lastname,mobilenumber,mailid,projectdetails,currentdate,expecteddate,status) 
				VALUES ('$actualRef','$firstname','$lastname','$mobilenumber','$mailid','$projectdetails','$todaydate','$expecteddate','In Review');";
				
				//Making conection my using servername, username and password of database
				$connection = new mysqli($servername, $username, $password, $dbname);
				
					//Making connection to required database				
					if($connection->connect_error){
				  	 //if connection to database fails display the appropriate error message
				   	die ("Connection failed: " .$connection->connect_error);
					} // end of if
				
					try {
						if ($connection->query($sql)) {
							// if connection is sucess then display appropriate message on the same screen
				   			echo "<script type='text/javascript'>alert('Thank You for registration with PVC Software. Please make note the below REFERENCE NUMBER for future  use "  .$actualRef. " ')</script>";
							$_POST['insert'] == 0;
						} else {
							// if connection failed due to an reason display appropriate error message on the same screen
				   			die ("Insert Failed " . mysqli_error($connection));			   		
						}
					} catch (Exception $e)	{
						echo ("Error: " .$e->getMessage()); // Error handling
					} // end of try catch
				
					//unsetting insert value
					unset($_POST['insert']);
					
					// Closing connection
					$connection->close();
					
				
			} // end of starting if
				
			?> 
		
	</body>
</html>