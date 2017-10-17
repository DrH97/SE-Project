<?php	
	//Creating connection
	$conn=mysqli_connect("localhost", "root","","student");  
	if(!$conn){

		 die ("Could not connect to database".mysqli_connect_error()); 
	}
	
	
?>