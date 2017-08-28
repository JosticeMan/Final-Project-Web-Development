<?php
	function displayMessage($msg, $url)
	{
		echo "<a href = '$url' class = 'information'>$msg</a>";
	}
	
	function createDatabaseConnection($hostname, $db)
	{
	 return new PDO("mysql:host=$hostname;dbname=$db", "root", "");
	}
?>