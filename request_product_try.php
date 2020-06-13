<?php 
session_start();
include "connection.php";


$shop =     "";
$sql =      "SELECT    shop_name, seller_id
             FROM      seller";
$result =    mysqli_query($conn, $sql) or die (mysqli_error($conn));
while($row = mysqli_fetch_assoc ($result)){
	  $shop .= "<option value = '{$row['seller_id']}'>{$row['shop_name']}";}

$product =     "";
$sql1 =      "SELECT    product_id, product_name 
             FROM      product";
$result1 =    mysqli_query($conn, $sql1) or die (mysqli_error($conn));
while($row = mysqli_fetch_assoc ($result1)){
	  $product .= "<option value = '{$row['product_id']}'>{$row['product_name']}</option>";}


if(isset ($_POST['request'])){

	  $weightA = $_POST['weightA'];
	  $weightB =   $_POST['weightB'];
	  $shipping_type =   $_POST['shipping_type'];
	  $status =   $_POST['status'];
	  $date =    $_POST['date'];
	  $seller_id =    $_SESSION['seller_id'];
	  $productfarmer_id =  $_POST['productfarmer_id'];
	  

	   $sql =    "INSERT INTO  productfarmer (weightA , weightB, balanceA, balanceB, date,  farmer_id, product_id)
		 VALUES 		 ('$weightA' , '$weightB', '$weightA', '$weightB', '$date', '$farmer_id', '$product_id')";
		 
		$execute = mysqli_query ($conn, $sql) or die (mysqli_error($conn));
	
	echo "<script>alert('Update New Product Produce Success!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=product_produce.php'/>";
    }	   
 
 mysqli_close ($conn);
?><!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Agroself</title>
    <link rel="icon" href="vegetable.png" type="image/gif" sizes="16x16">
</head>
<style>
	input[type=text], input[type=number]{
	padding: 8px;
	text-indent: 0.1in;
	}

	button {
		background-color: tomato;
		color: white;
		padding: 10px 18px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
		opacity: 0.9;
	}

	button:hover {
		opacity:1;
	}

	hr {
		border: 1px solid #f1f1f1;
		margin-bottom: 25px;
	}
	@media screen and (max-width: 990px) {
  .myInput td  {
    float: none;
    display: block;
  }
}
</style>
<body>
	<?php include 'sidebar.php'; ?>
	  <?php include 'menu_product.php'; ?>
	<div class="myInput">
	<thead>
	<form action="" method="post">
		<table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
			<tr align="center">
			  <td>Shop Name</td>                 
			  <td>Name of Product</td>
			  <td>Weight Gred A</td>                 
			  <td>Weight Gred B</td>                 
			</tr>
		</thead>
		<tbody id="myTable">
			<tr align="center">
			  <td>
			  	<input list="browser" name="seller_id">
      			<datalist id="browser">
				  <option value =""></option>
				  <?php echo $shop;?>
				  </datalist>
			  </td>


			  <td><select name = "product_id">
				  <option value ="">Product Name</option>
				  <?php echo $product;?></td>
			  <td><input type="number" name="weight_a" placeholder="Weight Gred A" min="0"></td>
			  <td><input type="number" name="weight_b" placeholder="Weight Gred B" min="0"></td>
			  <td><button type="submit" class="sumbitbtn" name="request">SUBMIT</button></td>
			</tr>
		</tbody>
		</table>
	</form>
	</div>

	<div>
	<div class="Mcontent">
		<br><br><br><br>
		<table align="center" border="0" width="60%" cellpadding="0" cellspacing="0">
		  <td><hr></td>
		  <td width="30%" align="center"><h2><font color="#1168da">List of Product Request</font></h2></td>
		  <td><hr></td>
		</table>
		
		<thead>
		<form action="" method="post">
		<table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
			<tr align="center">
			  <td width="5%" style="background-color: #a6a6a6;">No.</td>
			  <td width="15%"  style="background-color: #a6a6a6;">Shop Name</td>   
			  <td width="15%"  style="background-color: #a6a6a6;">Location Shop</td>              
			  <td  width="15%" style="background-color: #a6a6a6;">Name of Product</td>
			  <td width="15%"  style="background-color: #a6a6a6;">Weight Gred A</td>                 
			  <td width="15%" style="background-color: #a6a6a6;">Weight Gred B</td>
			  <td width="7%"  style="background-color: #a6a6a6;">Status</td>
			  <td  style="background-color: #a6a6a6;">Action</td>
			</tr>
			
		</thead>
		<tbody id="myTable">
			<tr>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"></td>			  
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center">update</a>
			  <td><br><br></td>
			</tr>
		</tbody>
		</table>
		</form>
		
	</div>
	</div>
			   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	  $("#myInput").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#myTable tr").filter(function() {
		  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	  });
	});
	</script>
</body>
</html>

