<?php 
session_start();
include "connection.php";
 $farmer_id =    $_SESSION['farmer_id'];
$request =  "SELECT productfarmer.balanceA, productfarmer.balanceB, productfarmer.product_id, product.product_name, productfarmer.farmer_id 
FROM productfarmer, product 
WHERE productfarmer.product_id = product.product_id 
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
<body>
<?php include 'sidebar.php'; ?>
	  <?php include 'menu_product.php'; ?>
	<div>
	<div class="Mcontent">
		<br><br><br><br>
		<?php if(mysqli_num_rows($result)>0) { ?>
		<table align="center" border="0" width="60%" cellpadding="0" cellspacing="0">
		  <td><hr></td>
		  <td width="30%" align="center"><h2><font color="#1168da">List of Product Available</font></h2></td>
		  <td><hr></td>
		</table>
		
		<thead>
		<form action="" method="post">
		<table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
			<tr align="center">
			  <td width="7%" style="background-color: #a6a6a6;">No.</td>
			  <td  style="background-color: #a6a6a6;">Product Name</td>
			  <td  width="25%" style="background-color: #a6a6a6;">Weight A</td>
			  <td width="25%"  style="background-color: #a6a6a6;">Weight B</td>          
			</tr>
			
		</thead>
		<?php $rowNumber = 1; while($row = mysqli_fetch_assoc($result)){ ?>
		<tbody id="myTable">
			<tr>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $rowNumber; ?>.</td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["product_name"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["balanceA"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["balanceB"]; ?></td>
			  <td><br><br></td>
			</tr>
		</tbody>
<?php $rowNumber++; } ?>
		</table>
		<?php }
		else {
			echo "<script>alert('no data found!');</script>";
			}
		?>		</form>
		
	</div>
	</div>
</body>
</html>
