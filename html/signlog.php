<?php
      $_SESSION['Log'] 	= 	true;
		if(!isset($_SESSION["Log"]) || $_SESSION["Log"] !== true)
		{
			header("location: login.php");
			exit;
		}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>SignUp and Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container" id="container">
<div class="form-container sign-up-container">

<form action="signup.php" method="post">
	<h1>Create Account</h1>
	<input type="text" class="input" name="first_name" placeholder="First Name">
	<input type="text" class="input" name="last_name" placeholder="Last Name">
	<input type="text" class="input" name="phone_number" placeholder="Phone Number">
	<select name="role">
		  <option value="farmer">Farmer</option>
		  <option value="seller">Seller</option>
		</select> 
	<input type="password" name="password" placeholder="Password">
	<input type="password" class="input" name="retypepassword" placeholder="Retype Password">
	<button type="submit" class="btn" name="register">SignUp</button>
</form>
</div>
<div class="form-container sign-in-container">
	<form action="login.php" method="post">
		<h1>Sign In</h1>
	<input type="text" name="phone_number" placeholder="Phone Number">
	<input type="password" name="password" placeholder="Password">
	<a href="">Forgot Your Password</a>
	<button type="submit" class="btn" name="login">Sign In</button>

	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Welcome Back!</h1>
			<p>To keep connected with us please login with your personal info</p>
			<button class="ghost" id="signIn">Sign In</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>Hello, Friend!</h1>
			<p>Enter your details and start journey with us</p>
			<button class="ghost" id="signUp">Sign Up</button>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>


</body>
</html>








