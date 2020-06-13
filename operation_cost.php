<?php 
session_start();
include "connection.php";

$product =     "";
$sql =      "SELECT    product_id, product_name 
             FROM      product";
$result =    mysqli_query($conn, $sql) or die (mysqli_error($conn));
while($row = mysqli_fetch_assoc ($result)){
	  $product .= "<option value = '{$row['product_id']}'>{$row['product_name']}</option>";}

$season =     "";
$sql1 =      "SELECT    season_id, end_date
             FROM      season
             where end_date = '0000-00-00'";
$result1 =    mysqli_query($conn, $sql1) or die (mysqli_error($conn));
while($row = mysqli_fetch_assoc ($result1)){
	  $season.= $row['season_id'];}

if(isset ($_POST['register_item'])){

	  $price = $_POST['price'];
	  $item =   $_POST['item'];
	  $date =    $_POST['date'];
	  $season_id =  $_POST['season_id'];	  

	   $sql =    "INSERT INTO  operation (item , price, date, season_id)
		 VALUES 		 ('$item' , '$price', '$date', '$season_id')";
		 
		$execute = mysqli_query ($conn, $sql) or die (mysqli_error($conn));
	
	echo "<script>alert('Update New Item Success!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=operation_cost.php'/>";
}	

if(isset ($_POST['register_date'])){

	  $start_date = $_POST['start_date'];
	  $end_date =   $_POST['end_date'];
	  $product_id =  $_POST['product_id'];	  

	   $sql =    "INSERT INTO  Season (start_date , end_date, product_id)
		 VALUES 		 ('$start_date' , '$end_date', '$product_id')";
		 
		$execute = mysqli_query ($conn, $sql) or die (mysqli_error($conn));
	
	echo "<script>alert('Update New Item Success!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=operation_cost.php'/>";
}
			  
$sql =    "SELECT    operation_id, item, date, price, operation.season_id, season.end_date
		 FROM      operation, season
		 where		operation.season_id = season.season_id
		 AND       season.end_date = '0000-00-00'";

$result = 	mysqli_query($conn, $sql) or die (mysqli_error($conn));
				  
$sumprice =     "SELECT sum(price) as sumprice, price   FROM  operation";
$executeSum =  mysqli_query($conn, $sumprice) or die (mysqli_error($conn));
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
	  <?php include 'menu_cost.php'; ?>
	  <div>
	<thead>
	<form action="" method="post">
		<table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
			<tr align="center">
			  <td>Start Date</td>
			  <td><input type="date" name="start_date"></td>
			  <td>End Date</td>                             
			  <td><input type="date" name="end date"></td>
			  <td> <select name = "product_id">
				  <option value ="">Product Name</option>
				  <?php echo $product;?>
			  <td><button type="submit" class="sumbitbtn" name="register_date">SUBMIT</button></td>
			</tr>
		</table>
	</form>
	</div>
	<div>
	<thead>
	<form action="" method="post">
		<table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
			<tr align="center">
			  <td>Date</td>                 
			  <td>Name of Item</td>
			  <td>Price</td>
			  <td>Season</td>                 
			</tr>
		</thead>
		<tbody id="myTable">
			<tr align="center">
			  <td><input type="date" name="date" placeholder="Date"autofocus required></td>
			  <td><input type="text" name="item" placeholder="Name of Item"></td>
			  <td><input type="text" name="price" placeholder="Price" min="0"></td>
			  <td><input type="text" name="season_id" value="<?php echo $season;?>" readonly>
			  	</td>
			  <td><button type="submit" class="sumbitbtn" name="register_item">SUBMIT</button></td>
			</tr>
		</tbody>
		</table>
	</form>
	</div>

	<div>
	<div class="Mcontent">
		<?php if(mysqli_num_rows($result)>0) { ?>
		<table align="center" border="0" width="60%" cellpadding="0" cellspacing="0">
		  <td><hr></td>
		  <td width="30%" align="center"><h2><font color="#1168da">List of cost</font></h2></td>
		  <td><hr></td>
		</table>
		
		<thead>
		<form action="" method="post">
		<table align="center" border="0" width="60%" cellpadding="5" cellspacing="0">
			<tr align="center">
			  <td width="7%" style="background-color: #a6a6a6;">No.</td>
			  <td width="15%"  style="background-color: #a6a6a6;">Date</td>                 
			  <td  style="background-color: #a6a6a6;">Name of Item</td>
			  <td width="15%"  style="background-color: #a6a6a6;">Price</td>                 
			  <td  style="background-color: #a6a6a6;">Action</td>
			</tr>
			
		</thead>
		<?php $rowNumber = 1; while($row = mysqli_fetch_assoc($result)){ ?>
		<tbody id="myTable">
			<tr>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $rowNumber; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["date"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["item"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["price"]; ?></td>
			  <td style="border-bottom: 1px solid #b3b3b3;" align="center">update</a>
			</tr>
		</tbody>
		<?php $rowNumber++; } ?>
		<tr>

			  <td></td>
			  <td></td>
			  <td align="right">Total Price :</td>
			  <td align="center"> RM <?php while($row=mysqli_fetch_assoc($executeSum)){ echo $row['sumprice']; }?></a>
			  <td></td>
			</tr>
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

