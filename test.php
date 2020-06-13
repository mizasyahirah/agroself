<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Editable Table Template | PrepBootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Editable Table <small>Bootstrap template, demonstrating an editable Table</small></h1>
</div>

<!-- Editable Table - START -->

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="text-center">Bootstrap Editable Table <span class="fa fa-edit pull-right bigicon"></span></h4>
        </div>
        <div class="panel-body text-center">            
            <div id="grid"></div>
        </div>
    </div>
</div>

<!-- you need to include the shieldui css and js assets in order for the grids to work -->
<link rel="stylesheet" type="text/css" href="http://www.prepbootstrap.com/Content/shieldui-lite/dist/css/light/all.min.css" />
<script type="text/javascript" src="http://www.prepbootstrap.com/Content/shieldui-lite/dist/js/shieldui-lite-all.min.js"></script>

<script type="text/javascript">
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
 
 if(mysqli_num_rows($result)>0) {
     $rowNumber = 1; while($row = mysqli_fetch_assoc($result)){ 
        echo $row["shop_name"];
        $rowNumber++; }
        }
        else {
            echo "<script>alert('no data found!');</script>";
            }
    ?>
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#grid").shieldGrid({
            dataSource: {
                data: gridData,
                schema: {
                    fields: {
                        name: { path: "shop_name", type: String },
                        
                    }
                }
            },
            sorting: {
                multiple: true
            },
            rowHover: false,
            columns: [
                { field: "name", title: "Person Name", width: "120px" },
                { field: "age", title: "Age", width: "80px" },
                { field: "company", title: "Company Name" },
                { field: "month", title: "Date of Birth", format: "{0:MM/dd/yyyy}", width: "120px" },
                { field: "isActive", title: "Active" },
                { field: "email", title: "Email Address", width: "250px" },
                { field: "transport", title: "Custom Editor", width: "120px" },                
                {
                    width: 150,
                    title: "Update/Delete Column",
                    buttons: [
                        { commandName: "edit", caption: "Edit" },
                        { commandName: "delete", caption: "Delete" }
                    ]
                }
            ],
            editing: {
                enabled: true,
                mode: "popup",
                confirmation: {
                    "delete": {
                        enabled: true,
                        template: function (item) {
                            return "Delete row with ID = " + item.id
                        }
                    }
                }
            }            
        });

       
    });
</script>

<style type="text/css">
    .sui-button-cell
    {
        text-align: center;
    }

    .sui-checkbox
    {
        font-size: 17px !important;
        padding-bottom: 4px !important;
    }

    .deleteButton img
    {
        margin-right: 3px;
        vertical-align: bottom;
    }

    .bigicon
    {
        color: #5CB85C;
        font-size: 20px;
    }
</style>

<!-- Editable Table - END -->

</div>

</body>
</html>