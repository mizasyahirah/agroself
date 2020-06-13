<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>

<div class="wrapper">
    <div class="title">
      Login
    </div>
    <div class="form">
    <form method="post" action="login.php">        
      <div class="inputfield">
          <label>Phone Number</label>
          <input type="text" class="input" name="phone_number">
       </div> 
       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input" name="password">
       </div>  
       <div class="inputfield">
          <a href="register.php">New Member</a>
          <a href="forgotpassword.php">Forgot Password ?</a>
       </div>

      <div class="inputfield">
        <button type="submit" class="btn" name="login">SignUp</button>
      </div>
    </form>
  </div>
</div>  
    
</body>
</html>