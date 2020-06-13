<?php 
session_start();
include "connection.php";


$product =     "";
$sql =      "SELECT    product_id, product_name 
             FROM      product";
$result =    mysqli_query($conn, $sql) or die (mysqli_error($conn));
while($row = mysqli_fetch_assoc ($result)){
	  $product .= "<option value = '{$row['product_id']}'>{$row['product_name']}</option>";}

if(isset ($_POST['register_productproduce'])){

	  $weightA = $_POST['weightA'];
	  $weightB =   $_POST['weightB'];
	  $date =    $_POST['date'];
	  $farmer_id =    $_SESSION['farmer_id'];
	  $product_id =  $_POST['product_id'];
	  

	   $sql =    "INSERT INTO  productfarmer (weightA , weightB, balanceA, balanceB, date,  farmer_id, product_id)
		 VALUES 		 ('$weightA' , '$weightB', '$weightA', '$weightB', '$date', '$farmer_id', '$product_id')";
		 
		$execute = mysqli_query ($conn, $sql) or die (mysqli_error($conn));
	
	echo "<script>alert('Update New Product Produce Success!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=product_produce.php'/>";
}	   

$farmer_id =    $_SESSION['farmer_id'];
$sql1 =    "SELECT    productfarmer_id, weightA , weightB, balanceA, date, productfarmer.farmer_id, productfarmer.product_id, product.product_name  
			FROM      productfarmer, product 
			WHERE     productfarmer.product_id = product.product_id 
			AND       productfarmer.farmer_id = '$farmer_id'";
$result1 = 	mysqli_query($conn, $sql1) or die (mysqli_error($conn));
 
 mysqli_close ($conn);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Agroself</title>
</head>
<style>
	input[type=text], input[type=date], input[type=number]{
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
</style>
<body>
	 <?php include 'sidebar.php'; ?>
	  <?php include 'menu_product.php'; ?>
	<div>
	<thead>
	<form action="" method="post">
		<table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
			<tr align="center">
			  <td>Date</td>                 
			  <td>Name of Product</td>
			  <td>Weight Gred A</td>                 
			  <td >Weight Gred B</td>
			</tr>
		</thead>
		<tbody id="myTable">
			<tr align="center">
			  <td><input type="date" name="date" placeholder="Date"autofocus required></td>
			  <td> <select name = "product_id">
				  <option value ="">Product Name</option>
				  <?php echo $product;?>
			  <td><input type="number" name="weightA" placeholder="Weight Gred A" min="0"></td>
			  <td><input type="number" name="weightB" placeholder="Weight Gred B" min="0"></td>
			  <td><button type="submit" class="sumbitbtn" name="register_productproduce">SUBMIT</button></td>
			</tr>
		</tbody>
		</table>
	</form>
	</div>

	<div>
	<div class="Mcontent">
		<br><br><br><br>
		<?php if(mysqli_num_rows($result)>0) { ?>
		<table align="center" border="0" width="60%" cellpadding="0" cellspacing="0">
		  <td><hr></td>
		  <td width="30%" align="center"><h2><font color="#1168da">List of Product Produce</font></h2></td>
		  <td><hr></td>
		</table>
		
		<thead>
		<form action="" method="post">
		<table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
			<tr align="center">
			  <td width="7%" style="background-color: #a6a6a6;">No.</td>
			  <td width="15%"  style="background-color: #a6a6a6;">Date</td>                 
			  <td  style="background-color: #a6a6a6;">Name of Product</td>
			  <td width="15%"  style="background-color: #a6a6a6;">Weight Gred A</td>                 
			  <td width="15%" style="background-color: #a6a6a6;">Weight Gred B</td>
			  <td  style="background-color: #a6a6a6;">Action</td>
			</tr>
			
		</thead>
		<?php $rowNumber = 1; while($row = mysqli_fetch_assoc($result1)){ ?>
		<tbody id="myTable">
			<tr>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $rowNumber; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["date"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["product_name"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["weightA"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["weightB"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center">update</a>
			  <td><br><br></td>
			</tr>
		</tbody>
		<?php $rowNumber++; } ?>
		</table>
		  <?php }
			else {
				echo "<script>alert('no data found!');</script>";
				} ?>
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

