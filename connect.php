<?php 
	$connection = new mysqli('localhost', 'root','','dbobandof1');
	
	if (!$connection){
		die (mysqli_error($mysqli));
	}
	session_start();
		
?>