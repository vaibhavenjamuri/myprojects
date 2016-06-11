<html>
	<head>
		<!-- Created by project Group number: 04 --> 
		<meta charset="utf-8">
		<title> Status Page </title>
		
		<link rel="stylesheet" type="text/css" href="group42Style.css"/>
		
		<script type="text/javascript" src="formvalidation.js">			
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
		</nav>
		
		<p align="center">Please enter reference number to get status of project <br><br> </p>
				
		<form action="status.php" align="center" onsubmit="return validateRefNum()" method="post">
			
			<p> <input type="text" id="refNumber" name="refnum" size="09" maxlength="8" >  <br> <br> </p>
					
			<p> <input type="submit" value="Submit">
				<input type="reset"  value="Clear"> </p>
				<input type="hidden" name="insert" value=1/>
					
		</form>
			
		
		<?php
				
				//Starting of PHP code 
				// This if condition is used to insert the values into database once after click on submit button
				if (isset($_POST["insert"]) and $_POST["insert"] == 1) {
				
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "project";
				$result;
				
				$refnum = $_POST['refnum'];
									
				$sql = "SELECT expecteddate,status FROM customer WHERE referencenum = '$refnum'";
				
					$connection = new mysqli($servername,$username,$password,$dbname);
					
					if ($connection->connect_error)	{
						die ("Connection failed: " .$connection->connect_error);
					}
					
					try {
						$result = $connection->query($sql);
						
						$expecteddate = 'expecteddate';
						$status = 'status';
				
						$row = $result->fetch_assoc();
						
						// Below if condition checks if data found for the provided reference number or not
						if (empty($row))	{
						 echo "Don't found any data for the entered reference number";
						} else {
						
						echo 'Your project status is: ' . '<em>' . '<b>' . $row[$status] . '</b>' .'</em>' . '</br>' . 
							 'And expected completion of your project is: ' . '<b>' . $row[$expecteddate] . '</b>'. '</br>'.
							 'For more details please send a mail to ' . '<div class="mail">customercare@pvcsoft.com </div>' . '</br>' .
							 //'For more details please send a mail to ' . '<style="color:red;">customercare@pvcsoft.com </style>' . '</br>' .
							 'Thank You!!!';
						}
					} catch (Exception $e) {
						echo("Error: " .$e->getMessage());
					}
				// Closing Db2 connection
				$connection->close();
				// Unsetting the insert value 
				unset($_POST['insert']);
				
				}
		?>		
		
	</body>
</html>
