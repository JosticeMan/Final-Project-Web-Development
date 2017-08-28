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
				createDinoList();
				getElement();
				addChoices();
			}
			
			function getElement()
			{
				dinoChoices = document.getElementById("dchoices");
			}
			
			function createDinoList()
			{
				dinoList = ["Archaeopteryx", "Argentavis", "Dimorphodon", "Icthyornis", "Lymantria", "Onyc", "Pelagornia", "Pteranodon", "Quetzal", "Tapejara", "Vulture", "Wyvern"];
			}
			
			function addChoices()
			{
				for(var i = 0; i < dinoList.length; i++)
				{
					var option = document.createElement("option");
					option.text = dinoList[i];
					option.value = dinoList[i];
					dinoChoices.add(option);
				}
			}
			
		</script>
	</head>
	
	<body onload = "initialize();">

		<img id = "bckgrnd" src = "../images/background.jpg" />
			
		<div class = "information">
			<marquee style = "color: #00b3b3;" DIRECTION=LEFT > Please fill out the form, <?php $survivor = $_GET["Survivor"]; echo "".$survivor; ?>, to remove a dinosaur from your ARK Dino Database! </marquee>	
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
		
		<form method = "POST" action = "processRemove.php?Survivor=<?php echo $survivor ?>" style = "position: relative; top: 70px; color: #006666;">
			<span class = "information"> Remove a dinosaur </span> <br />
			Dinosaur Type: <select id = "dchoices" name = "dtype"> </select> <span style = "color: red"> * </span> <br /> 
			Dinosaur Name: <input type = "text" name = "dname" required/> <span style = "color: red"> * </span> <br />
			Dinosaur Level: <input type = "text" name = "dlevel" required/> <span style = "color: red"> * </span> <br />
			Dinosaur Health: <input type = "text" name = "dhealth" required/> <span style = "color: red"> * </span> <br />
			Dinosaur Stamina: <input type = "text" name = "dstam" required/> <span style = "color: red"> * </span> <br />
			Dinosaur Oxygen: <input type = "text" name = "doxygen" required/> <span style = "color: red"> * </span> <br />
			Dinosaur Food: <input type = "text" name = "dfood" required/> <span style = "color: red"> * </span> <br />
			Dinosaur Melee Damage: <input type = "text" name = "ddmg" required/> <span style = "color: red"> * </span> <br />
			Dinosaur Movement Speed: <input type = "text" name = "dspeed" required/> <span style = "color: red"> * </span> <br /> <br />
			<input type = "submit" value = "Remove Dino!" style = "border-radius: 5px; color: #006666;"/>
		</form>
		
	</body>
	
</html>