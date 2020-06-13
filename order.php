<?php
session_start();
include "connection.php";

$productfarmer_id = $_GET['productfarmer_id'];
$query = "SELECT productfarmer.productfarmer_id,productfarmer.balanceA, productfarmer.date, productfarmer.balanceB, productfarmer.product_id, product.product_name, product.image, productfarmer.farmer_id, farmer.company_name
            FROM productfarmer, product, farmer 
            WHERE productfarmer.product_id = product.product_id
            AND productfarmer.farmer_id = farmer.farmer_id 
            AND     productfarmer_id = '$productfarmer_id'";
 $result =  mysqli_query($conn,$query) or die (mysqli_error($conn));
$data =     mysqli_fetch_assoc($result);
 
if(isset ($_POST['order'])){

      $weightA = $_POST['weightA'];
      $weightB =   $_POST['weightB'];
      $shipping_type = $_POST['shipping_type'];
      $seller_id =    $_SESSION['seller_id'];
      $productfarmer_id =  $_GET['productfarmer_id'];
      $date= date("Y-m-d");

       $sql =    "INSERT INTO  orders (weightA , weightB, shipping_type, status, date,  seller_id, productfarmer_id)
         VALUES          ('$weightA' , '$weightB', '$shipping_type', 'pending', '$date', '$seller_id', '$productfarmer_id')";
         
        $execute = mysqli_query ($conn, $sql) or die (mysqli_error($conn));
    
    echo "<script>alert('Update New Product Produce Success!');</script>";
    echo "<meta http-equiv='refresh' content='0; url=product_produce.php'/>";
}


    

    mysqli_close ($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  
    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
        .uppercase{
            text-transform: uppercase;
            font-size: 20px;
        }
        
    </style>
</head>
<body>  
<div class="card">
    <div class="row">
        <aside class="col-sm-5 border-right">
<article class="gallery-wrap">

<div class="img-big-wrap">
    <div class="uppercase"><a href=""><?php echo $data["company_name"]; ?></a></div>
  <div> <a href="#"><img src="<?php echo $data["image"]; ?>"></a></div>
</div> <!-- slider-product.// -->
</article> <!-- gallery-wrap .end// -->
        </aside>
        <aside class="col-sm-7">
<article class="card-body p-5">
    <h3 class="uppercase"><?php echo $data["product_name"]; ?></h3>
<dl class="param param-feature">
  <dt>Date Released</dt>
  <dd><?php echo $data["date"]; ?></dd>
</dl>
<dl class="param param-feature">
  <dt>Available</dt>
  <dd>Weight Gred A: &nbsp;&nbsp;&nbsp;<?php echo $data["balanceA"]; ?>&nbsp;kg</dd>
  <dd>Weight Gred B: &nbsp;&nbsp;&nbsp;<?php echo $data["balanceB"]; ?>&nbsp;kg</dd>
</dl>

<hr>
<form action="" method="post">
    <div class="row">
        <div class="col-sm-5">
            <dl class="param param-inline">
              <dt>Weight Gred A: </dt>
              <dd>
                <input type="number" name="weightA" placeholder="Weight Gred A" min="0">
              </dd>
            </dl>
            <dl class="param param-inline">
              <dt>Weight Gred B: </dt>
              <dd>
                <input type="number" name="weightB" placeholder="Weight Gred B" min="0">
              </dd>
            </dl>
        </div> <!-- col.// -->
        <div class="col-sm-7">
            <dl class="param param-inline">
                  <dt>Shipping type: </dt>
                  <dd>
<select name="shipping_type" id="shipping_type">
  <option value="Pickup">Pickup</option>
  <option value="Delivery">Delivery</option>
  
</select></dd>
            </dl>  <!-- item-property .// -->
        </div> <!-- col.// -->
    </div> <!-- row.// -->
    <hr>
    <button class="btn btn-lg btn-outline-primary text-uppercase" type="submit" name="order">Add to cart </button>
    </form>
</article> <!-- card-body.// -->
        </aside> <!-- col.// -->
    </div> <!-- row.// -->
</div> <!-- card.// -->


</div>
</body>
</html>