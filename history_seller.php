<?php 
session_start();
include "connection.php";

$seller_id =    $_SESSION['seller_id'];
$sql =    "SELECT  orders.weightA , orders.weightB, orders.status, orders.date, orders.productfarmer_id, productfarmer.product_id, product.product_name, seller_id, productfarmer.farmer_id, farmer.company_name 
FROM productfarmer, product, orders, farmer 
WHERE orders.productfarmer_id = productfarmer.productfarmer_id
AND productfarmer.product_id = product.product_id 
AND productfarmer.farmer_id = farmer.farmer_id
AND seller_id = '$seller_id'";

$result = 	mysqli_query($conn, $sql) or die (mysqli_error($conn));
 
 mysqli_close ($conn);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Agroself</title>
</head>
	  <?php include 'menu_seller.php'; ?>
	<div>
	<div class="Mcontent">
		<?php if(mysqli_num_rows($result)>0) { ?>
		<br><br><br><br>
		<table align="center" border="0" width="60%" cellpadding="0" cellspacing="0">
		  <td><hr></td>
		  <td width="30%" align="center"><h2><font color="#1168da">History of Order</font></h2></td>
		  <td><hr></td>
		</table>
		
		<thead>
		<form action="" method="post">
		<table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
			<tr align="center">
			  <td width="7%" style="background-color: #a6a6a6;">Date</td> 
			  <td width="30%"  style="background-color: #a6a6a6;">Company Name</td>    
			  <td  width="30%" style="background-color: #a6a6a6;">Name of Product</td>
			  <td width="15%"  style="background-color: #a6a6a6;">Weight Gred A</td>
			  <td width="15%"  style="background-color: #a6a6a6;">Weight Gred B</td>
			          
			</tr>
			
		</thead>
		<?php $rowNumber = 1; while($row = mysqli_fetch_assoc($result)){ ?>
		<tbody id="myTable">
			<tr>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["date"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["company_name"]; ?></td>
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
</body>
</html>
