<?php 
session_start();
include "connection.php";

$query = "SELECT productfarmer.productfarmer_id, productfarmer.balanceA, productfarmer.balanceB, productfarmer.product_id, product.product_name, product.image, productfarmer.farmer_id, farmer.company_name
            FROM productfarmer, product, farmer 
            WHERE productfarmer.product_id = product.product_id
            AND productfarmer.farmer_id = farmer.farmer_id ";
            $result = mysqli_query($conn,$query);
 
 mysqli_close ($conn);
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
    </style>
</head>
<body>
<?php include 'menu_seller.php'; ?>
    <div class="container" style="width: 65%">
        <h2>Product</h2>
        <?php
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="">

                            <div class="product">
                                <a href=""><?php echo $row["company_name"]; ?></a>
                                <a href="order.php?productfarmer_id=<?php echo $row["productfarmer_id"]; ?>">
                                <img src="<?php echo $row["image"]; ?>" class="img-responsive"></a>

                                <h5 class="text-info"><?php echo $row["product_name"]; ?></h5>

                                <h5 class="text-danger"><?php echo $row["balanceA"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["balanceB"]; ?></h5>
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>

    </div>


</body>
</html>
