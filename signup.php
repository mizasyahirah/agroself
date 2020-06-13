<?php 
session_start();
include "connection.php";

	 if (isset ($_POST['register'])){
		 
		  $first_name   = $_POST['first_name'];
		  $lastname   = $_POST['last_name'];
		  $phonenumber   = $_POST['phone_number'];
		  $password = $_POST['password'];
		  $retypepassword = $_POST['retypepassword'];
		  $role = $_POST['role'];

		  if($role == 'farmer'){
			  if($password == $retypepassword){	
			  
				  $sql = "INSERT INTO farmer (farmer_id, first_name, last_name, phone_number, password)
						  VALUES           ('101', '$first_name', '$lastname', '$phonenumber', '$password')";
				  $execute = mysqli_query ($conn, $sql) or die (mysqli_error($conn));
				  
					if ($execute){
						echo "<script>alert('Register Success!');</script>";
						echo "<meta http-equiv='refresh' content='0; url=product_produce.php'/>";
						}
					else{
						echo "<script>alert('Register Fail!');</script>";
					}
				}
			 else{
					echo "<script>alert('Retype Password!');</script>";
				}
			}
			elseif($role == 'seller'){
				if($password == $retypepassword){	
			  
				  $sql = "INSERT INTO seller (seller_id, first_name, last_name, phone_number, password)
						  VALUES           ('10', '$first_name', '$lastname', '$phonenumber', '$password')";
				  $execute = mysqli_query ($conn, $sql) or die (mysqli_error($conn));
				  
					if ($execute){
						echo "<script>alert('Register Success!');</script>";
						echo "<meta http-equiv='refresh' content='0; url=signlog.php'/>";
						}
					else{
						echo "<script>alert('Register Fail!');</script>";
					}
				}
			 else{
					echo "<script>alert('Retype Password!');</script>";
				}
			}
	 }
	 mysqli_close ($conn);
?>