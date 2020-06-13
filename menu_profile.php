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
    <li><a href="profile.php">My Profile</a></li>
     <li><a href="uploadimage.php">My Product</a></li>
    <li><a href="video.php">My Video</a></li>
  </ul>
</nav>
</body>
</html>
