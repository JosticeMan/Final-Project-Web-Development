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
			<marquee style = "color: #00b3b3;" DIRECTION=LEFT > Welcome <?php $survivor = $_GET["Survivor"]; echo "".$survivor; ?>, to your ARK Dino Database! </marquee>	
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
		
		<div style = "position: relative; top: 40px;"> 
			<p>
				<span class = "information" style = "color: #196666;">
					Welcome to ARK: Survival Evolved's Database! <br />
					You can add or view dinosaurs that you've added to the database! <br />
					This site was intended to make it easier to track either your breeding dinosaurs or normal tamed dinosaurs! <br />
					Latest Patch: v258.6
				</span>
			</p>
			<br />
			<iframe width="560" height="315" src="https://www.youtube.com/embed/FhZQSjeMJ2k" frameborder="0" allowfullscreen></iframe> <br /> 
			<span class = "information" style = "color: #00b3b3;">
				* New Primitive+ update. Requires server update for Prim+ compatibility!!! <br />
				* Updated Host Settings Menu (you can now set most Server Settings thru this UI, and also set which Engrams are available) <br />
				* Updated various sounds <br />
				* Changed Spider to be able to attack and shoot webbing while moving, and also now the Rider can aim the webbing <br />
				* Rebalanced Broodmother (WIP - Current changes include: AI Improvements. She'll spawn minions more efficiently, the spider webs from these minions are much more effective than they were previously, she'll be smarter at targeting when people are out of range and will shoot skill shots better. As well as reductions to her overall health and damage.) <br />
			</span>
		</div>
		
	</body>
	
</html>