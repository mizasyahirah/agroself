<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style type="text/css">
 	body {
 	font-family: Arial, Helvetica, sans-serif;
 	}
 	nav {
	padding: 0;
	float: left;
	width: 20%;
	}

	nav ul li {
	margin: 5px;
	padding: 8px;
	border-top: 7px;
	border-bottom: 2px solid tomato;
	list-style-type: none;
	}

	nav ul li a {
	display: block;
	color: black;
	padding: 5px 0px;
	text-decoration: none;
	}

	nav ul li a:hover{
	display: block;
	text-decoration: none;
	color: white;
	background-color: maroon;
	padding: 5px 0px;
	}

	footer{
	clear: both;
	padding: 10px;
	color: white;
	background-color: black;
	text-align: center;
	font-size: 13px;
	}
	@media only screen and (max-width: 800px){
	nav, footer{
	width: 100%;
	padding: 0;
	}
	}

</style>
</head>
<body>

<nav>
  <ul>Other:
    <li><a href="product_produce.php">Product Produce</a></li>
     <li><a href="request_product.php">Request Product</a></li>
    <li><a href="product_available.php">Product Available</a></li>
    <li><a href="history.php">History</a></li>    
  </ul>
</nav>
</body>
</html>
