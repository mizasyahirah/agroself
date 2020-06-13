<?php
session_start();
include "connection.php";

  $id = 			$_POST['id'];
  $name = 			$_POST['name'];
  $location = 		$_POST['location'];
  
  $sql = "	UPDATE 	videos
			SET 	name = '$name', location = '$location'
			WHERE  	id = '$id'";

  $execute =   mysqli_query($conn, $sql) or die (mysqli_error($conn));  
		
?>