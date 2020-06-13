<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style type="text/css">
 	body {
 	font-family: Arial, Helvetica, sans-serif;
 	margin: 0px;
 	}
 	nav{
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

	@media only screen and (max-width: 800px){
	nav{
	width: 100%;
	padding: 0;
	}
	}

</style>
</head>
<body>

<nav>
  <ul>Other:
  	<li><a href="development_cost.php">Development Cost</a></li>
    <li><a href="operation_cost.php">Operation Cost</a></li>    
  </ul>
</nav>
</body>
</html>
