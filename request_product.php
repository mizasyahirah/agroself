<?php 
session_start();
include "connection.php";
 $farmer_id =    $_SESSION['farmer_id'];
$request =  "SELECT orders.order_id, orders.weightA, orders.weightB,orders.date, orders.status, orders.seller_id, seller.shop_name, orders.productfarmer_id, productfarmer.product_id, product.product_name, productfarmer.farmer_id 
FROM orders, seller, productfarmer, product 
WHERE orders.seller_id=seller.seller_id 
AND orders.productfarmer_id = productfarmer.productfarmer_id 
AND productfarmer.product_id = product.product_id 
AND status = 'pending' 
AND farmer_id = ' $farmer_id'";
$result =        mysqli_query($conn, $request) or die (mysqli_error($conn));
 


?>
<!DOCTYPE html>
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
	<div class="Mcontent">
		<?php if(mysqli_num_rows($result)>0) { ?>
		<br><br><br><br>
		<table align="center" border="0" width="60%" cellpadding="0" cellspacing="0">
		  <td><hr></td>
		  <td width="30%" align="center"><h2><font color="#1168da">List of Product Request</font></h2></td>
		  <td><hr></td>
		</table>
		
		<thead>
			<form action="update_status.php" method="post">
		<table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
			<tr align="center">
			  <td width="5%" style="background-color: #a6a6a6;">Date</td>
			  <td width="15%"  style="background-color: #a6a6a6;">Shop Name</td>
			  <td  width="15%" style="background-color: #a6a6a6;">Name of Product</td>
			  <td width="15%"  style="background-color: #a6a6a6;">Weight Gred A</td>          
			  <td width="15%" style="background-color: #a6a6a6;">Weight Gred B</td>
			  <td width="7%"  style="background-color: #a6a6a6;">Status</td>
			  <td  style="background-color: #a6a6a6;">Action</td>
			</tr>
		</thead>
		<?php $rowNumber = 1; while($row = mysqli_fetch_assoc($result)){ ?>
		<tbody id="myTable">
			
			<tr>
				<input name="order_id" value="<?php echo $row['order_id']; ?>" hidden />
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["date"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["shop_name"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["product_name"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["weightA"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["weightB"]; ?></td>
			  
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center">
			  <select name="status">
					  <option value="<?php echo $row["status"]; ?>"><?php echo $row["status"]; ?></option>
					  <option value="<?php if($row["status"] == 'pending') 
												{ echo "otw"; }
										   else { echo "pending";}?>"><?php if($row["status"] == 'pending') 
												{ echo "otw"; }
										   else { echo "pending";}?></option>
					</select>

</td>		  

			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><input type="submit"	class="button" name="update"></input></td>
			  <td><br><br></td>
			</tr>
		</tbody>
	</form>
		<?php $rowNumber++; } ?>
		</table>
		<?php }
		else {
			echo "<script>alert('no data found!');</script>";
			}
		?>
		
		
	</div>
	</div>
			  
</body>
</html>

