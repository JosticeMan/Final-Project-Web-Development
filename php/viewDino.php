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
			
			table#dinotable
			{
				border-collapse: collapse;
				color: #000000;
			}
			
			table#dinotable, table#dinotable tr, table#dinotable td
			{
				border: solid 2px #000000;
			}
			
			img.dino
			{
				height: 30px;
				width: 40px;
			}
			
			#myInput
			{
				background-image: url('../images/search.png'); /* Add a search icon to input */
				background-size: 30px 30px;
				background-position: 10px 12px; /* Position the search icon */
				background-repeat: no-repeat; /* Do not repeat the icon image */
				width: 50%; /* Full-width */
				font-size: 16px; /* Increase font-size */
				padding: 12px 20px 12px 40px; /* Add some padding */
				border: 1px solid #ddd; /* Add a grey border */
				margin-bottom: 12px; /* Add some space below the input */
			}
			
		</style>

		<script>
		
			function initialize() 
			{

			}
			
			function search() 
			{
				// Declare variables 
				var input = document.getElementById("myInput");
				var filter = input.value.toUpperCase();
				var table = document.getElementById("dinotable");
				var tr = table.getElementsByTagName("tr");

				// Loop through all table rows, and hide those who don't match the search query
				for (i = 2; i < tr.length; i++) 
				{
					td = tr[i].getElementsByTagName("td")[2];
					if (td) 
					{
					  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) 
					  {
						tr[i].style.display = "";
					  } 
					  else 
					  {
						tr[i].style.display = "none";
					  }
					} 
				}
			}
			
		</script>
	</head>
	
	<body onload = "initialize();">

		<img id = "bckgrnd" src = "../images/background.jpg" />
			
		<div class = "information">
			<marquee style = "color: #00b3b3;" DIRECTION=LEFT > Here is your list of the dinosaurs you've added to the database, <?php $survivor = $_GET["Survivor"]; echo "".$survivor; ?>! </marquee>	
		</div>

		<img id = "logo" src = "../images/logo.jpg" /> 
		
		<div class = "menu">
			<ul>
				<!-- Home Icon -->
				<li>
					<a href = "homepage.php?Survivor=<?php echo $survivor ?>" class = "menusec"> 
						<i class="fa fa-home"></i>
					</a>
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
		
		<div class = "information" style = "position: relative; top: 70px;">
			Here is a list of the dinosaurs that you've added to the database!
		</div>
		
		<input type="text" id="myInput" onkeyup="search();" placeholder="Search for dino names.." style = "position: relative; top: 90px;">
		
		<table id = "dinotable" style = "position: relative; top: 110px;">
			<tr> 
				<td colspan = 10> <span class = "information"> Dinosaurs: </span> </td>
			</tr>
			<tr>
				<td> <span class = "information"> Dinosaur </span> </td>
				<td> <span class = "information"> Dinosaur Type </span> </td>
				<td> <span class = "information"> Dinosaur Name </span> </td>
				<td> <span class = "information"> Dinosaur Level </span> </td>
				<td> <span class = "information"> Dinosaur Health </span> </td>
				<td> <span class = "information"> Dinosaur Stamina </span> </td>
				<td> <span class = "information"> Dinosaur Oxygen </span> </td>
				<td> <span class = "information"> Dinosaur Food </span> </td>
				<td> <span class = "information"> Dinosaur Melee Damage </span> </td>
				<td> <span class = "information"> Dinosaur Movement Speed </span> </td>
			</tr>
			<?php
				include_once "utilities.php";
				
				$hostname = "localhost";
				$db = "justin_yau_period_9";
				$conn = new PDO("mysql:host=$hostname;dbname=$db", "root", "");
				
				$cmd = "SELECT * FROM `survivordinosaurs` WHERE `Survivor` = '$survivor'";
				$result = $conn->prepare($cmd);
				$result->execute();
				
				$numRows = $result->rowCount();
				if($numRows == 0)
				{	
					echo "<tr> <td colspan = 10> <span class = 'information'> You have not added any dinosaurs yet! </span> <br />";
					displayMessage("Click me to go add one!", "addDino.php?Survivor=$survivor");
					echo "</td> </tr>";
				}
				else
				{
					for ($i = 0; $i < $numRows; $i++)
					{
						$data = $result->fetch();
						echo "<tr> <td> <img class = 'dino' src = '../images/".$data['Dino Type'].".png' /> </td> <td> ".$data['Dino Type']."</td> <td> ".$data['Dino Name']."</td> <td> ".$data['Dino Level']."</td> <td> ".$data['Dino Health']."</td> <td> ".$data['Dino Stamina']." </td> <td> ".$data['Dino Oxygen']."</td> <td> ".$data['Dino Food']."</td> <td> ".$data['Dino Melee Damage']."</td> <td> ".$data['Dino Movement Speed']."</td> </tr>";
					}
				}
			?>
		</table>
		
	</body>
	
</html>