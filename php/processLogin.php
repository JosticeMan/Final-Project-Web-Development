<!DOCTYPE html>
<!-- Creator: Justin Yau  -->
<html>

	<head>
		<title> </title>
		
		<style> 
			
			body
			{
				text-align: center;
			}
			
			img#bckgrnd
			{
				position: fixed;
				top: 0px;
				left: 0px;
				z-index: -1;
				width: 100%;
				height: 100%;
			}
			
			img#logo
			{
				height: 50%;
				width: 50%;
			}
			
			.information
			{
				font: bold 16pt calibri;
			}
			
		</style>

		<script>
		
			function initialize() 
			{
				
			}
			
		</script>
	</head>
	
	<body onload = "initialize();">

		<img id = "bckgrnd" src = "../images/background.jpg" />
		
		<img id = "logo" src = "../images/logo.jpg" /> 
		
		<div class = "information">
			<?php
				include_once "utilities.php";
				
				$hostname = "localhost";
				$db = "justin_yau_period_9";
				$conn = new PDO("mysql:host=$hostname;dbname=$db", "root", "");
				
				if (array_key_exists("newuser", $_POST))
				{
					registerNewUser($_POST['sname'], $_POST['slevel']);
				}
				else
				{
					loginUser($_POST['sname'], $_POST['slevel']);
				}
				
				function registerNewUser($uname, $level)
				{
					global $conn;
		
					$cmd = "SELECT * FROM `simplesurvivors` WHERE `Survivor` = '$uname'";
					$result = $conn->prepare($cmd);
					$result->execute();
					
					if ($result->rowCount() > 0)
					{
						displayMessage("That survivor already exists in the ARK! Please go back and try a different name.", "../index.html");
					}
					else
					{
						$cmd = "INSERT INTO `simplesurvivors` VALUES ('$uname', '$level')";
						$result = $conn->prepare($cmd);
						$result->execute();
						displayMessage("Survivor successfully added. Please login in again. Click me to go back to the login screen.", "../index.html");
					}
				}
				
				function loginUser($uname, $level)
				{
					global $conn;
					
					$cmd = "SELECT `Level` FROM `simplesurvivors` WHERE `Survivor` = '$uname'";
					$result = $conn->prepare($cmd);
					$result->execute();
					
					if ($result->rowCount() == 0)
					{
						displayMessage("Survivor name or level is incorrect. Please go back and try again!", "../index.html");
					}
					else
					{
						$data = $result->fetch();
						if ($data['Level'] == $level)
						{
							displayMessage("Welcome back to the ARK, $uname! Click on me to proceed!", "homepage.php?Survivor=$uname");
						}
						else
						{
							displayMessage("Survivor name or level is incorrect. Please go back and try again!", "../index.html");
						}
					}
				}
				
			?>
		</div>
		
	</body>
	
</html>

