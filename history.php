<?php 
session_start();
include "connection.php";

$farmer_id =    $_SESSION['farmer_id'];
$sql =    "SELECT    orders.order_id, orders.weightA , orders.weightB, orders.date, productfarmer.farmer_id, productfarmer.product_id, product.product_name
      FROM      orders, productfarmer, product
      WHERE     orders.productfarmer_id = productfarmer.productfarmer_id 
      AND     productfarmer.product_id = product.product_id
      AND     productfarmer.farmer_id = '$farmer_id'";
      
$result =   mysqli_query($conn, $sql) or die (mysqli_error($conn));
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
	<div class="Mcontent">
		<?php if(mysqli_num_rows($result)>0) { ?>
		<br><br><br><br>
		<table align="center" border="0" width="60%" cellpadding="0" cellspacing="0">
		  <td><hr></td>
		  <td width="30%" align="center"><h2><font color="#1168da">History</font></h2></td>
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
			</tr>
			
		</thead>
		<?php $rowNumber = 1; while($row = mysqli_fetch_assoc($result)){ ?>
		<tbody id="myTable">
			<tr>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $rowNumber; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["date"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["product_name"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["weightA"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["weightB"]; ?></td>
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

