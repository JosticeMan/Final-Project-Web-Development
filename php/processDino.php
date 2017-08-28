<!DOCTYPE html>
<!-- Creator: Justin Yau  -->
<html>

	<head>
		<title> </title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<style> 
			
			@keyframes menuhover
			{
				0% {}
				100% {background-color: #00cccc;}
			}
			
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
			
			.information
			{
				font: bold 16pt calibri;
			}
			
			div.menu
			{
				width: 100%;
				position: absolute;
				left: 0px;
			}
			
			div.menu ul
			{
				width: 100%;
				list-style-type: none;
				float: left;
			}

			div.menu ul li
			{
				background-color: #00b3b3;
				width: 24.82%;
				height: 50px;
				line-height: 50px;
				text-align: center;
				border: 1px solid #006666;
				float: left;
				color: #000099;
				font-size: 18px;
				font-family: Impact, Charcoal, sans-serif;
				font-weight: bold;
				position: relative;
			}
			
			div.menu ul li:hover
			{
				animation-name: menuhover;
				animation-duration: 1s;
				animation-iteration-count: infinite;
			}

			div.menu, div.menu ul, div.menu ul li
			{
				margin: 0px;
				padding: 0px;
			}

			div.menu ul ul
			{
				display: none;
			}

			div.menu ul li:hover > ul
			{
				display: block;
			}

			a.menusec
			{
				text-decoration: none;
				color: #000099;
			}
			
			img#logo
			{
				height: 15%;
				width: 10%;
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
			
		<div class = "information">
			<marquee style = "color: #00b3b3;" DIRECTION=LEFT > You've sucessfully add your dinosaur, <?php $survivor = $_GET["Survivor"]; echo "".$survivor; ?>, to your ARK Dino Database! </marquee>	
		</div>

		<img id = "logo" src = "../images/logo.jpg" /> 
		
		<div class = "menu">
			<ul>
				<!-- Home Icon -->
				<li>
					<a href = "homepage.php?Survivor=<?php echo $survivor ?>" class = "menusec"> 
						<i class="fa fa-home"></i>
					</a>
					</label>
				</li>
				<!-- Add Dinosaurs -->
				<li> 
					<a href = "addDino.php?Survivor=<?php echo $survivor ?>" class = "menusec"> Add Dinosaur </a>
				</li>
				<!-- View Dinosaurs -->
				<li> 
					<a href = "viewDino.php?Survivor=<?php echo $survivor ?>" class = "menusec"> View Dinosaurs </a>
				</li> 
				<!-- Remove Dinosaurs -->
				<li>
					<a href = "removeDino.php?Survivor=<?php echo $survivor ?>" class = "menusec"> Remove Dinosaurs </a>
				</li>
			</ul>
		</div>
		
		<div style = "position: relative; top: 70px;">
			<?php
				include_once "utilities.php";
				
				$hostname = "localhost";
				$db = "justin_yau_period_9";
				$conn = new PDO("mysql:host=$hostname;dbname=$db", "root", "");
				
				$dinotype = $_POST['dtype'];
				$dinoname = $_POST['dname'];
				$dinolevel = $_POST['dlevel'];
				$dinohealth = $_POST['dhealth'];
				$dinostamina = $_POST['dstam'];
				$dinooxygen = $_POST['doxygen'];
				$dinofood = $_POST['dfood'];
				$dinodamage = $_POST['ddmg'];
				$dinospeed = $_POST['dspeed'];
				
				$cmd = "SELECT * FROM `survivordinosaurs` WHERE `Survivor` = '$survivor' AND `Dino Type` = '$dinotype' AND `Dino Name` = '$dinoname' 
				AND `Dino Level` = '$dinolevel' AND `Dino Health` = '$dinohealth' AND `Dino Stamina` = '$dinostamina' AND
				`Dino Oxygen` = '$dinooxygen' AND `Dino Food` = '$dinofood' AND `Dino Melee Damage` = '$dinodamage' AND 
				`Dino Movement Speed` = '$dinospeed'";
				
				$result = $conn->prepare($cmd);
				$result->execute();
				
				if ($result->rowCount() > 0)
				{
					displayMessage("You already have this dino in your database! Please add a different dinosaur!", "addDino.php?Survivor=$survivor");
				}
				else
				{
					$cmd = "INSERT INTO `survivordinosaurs` VALUES ('$survivor', '$dinotype', '$dinoname', '$dinolevel', '$dinohealth', '$dinostamina', '$dinooxygen', '$dinofood', '$dinodamage', '$dinospeed')";
					$result = $conn->prepare($cmd);
					$result->execute();
					displayMessage("Dinosaur successfully added! Click on me to view your Dinosaurs!", "viewDino.php?Survivor=$survivor");
				}
			
			?>
		</div>
	</body>
	
</html>