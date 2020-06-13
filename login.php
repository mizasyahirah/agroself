<?php
session_start();

include "connection.php";

	$phone_number= $_POST ['phone_number'];
	$password =    $_POST ['password'];
		
	$sql = 	 "SELECT farmer_id, phone_number, password 
				FROM farmer WHERE phone_number = '$phone_number' and password = '$password'";
	$sql2 =  "SELECT seller_id, phone_number, password 
				FROM seller WHERE phone_number = '$phone_number' and password = '$password'";	

	$execute =  mysqli_query ($conn, $sql) or die (mysqli_error($conn));
	$execute2 = mysqli_query ($conn, $sql2) or die (mysqli_error($conn));
	
	//check row
	if(mysqli_num_rows($execute) == 1){
		while ($row = mysqli_fetch_assoc ($execute)){

			$_SESSION ["farmer_id"] = $row ["farmer_id"];
			$_SESSION['log'] = true;
		}
		echo "<script>alert('Login Success!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=product_produce.php'/>";
	    }
		
	else if(mysqli_num_rows($execute2) == 1){
		while ($row = mysqli_fetch_assoc ($execute2)){
		//set the session
		$_SESSION ["seller_id"] = $row ["seller_id"];
		$_SESSION['log'] = true;
		}
		echo "<script>alert('Login Success!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=Cart.php'/>";
		}
	
	else{
		echo "<script>alert('Login Failed!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=signin.php'/>";
	}
	
mysqli_close ($conn);
?>