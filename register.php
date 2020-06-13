<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>
	<link rel="stylesheet" href="signup.css">
</head>
<body>
<form action="signup.php" method="post">
<div class="wrapper">
    <div class="title">
      Registration Form
    </div>
    <div class="form">
       <div class="inputfield">
          <label>First Name</label>
          <input type="text" class="input" name="first_name" autofoucs required>
       </div>  
        <div class="inputfield">
          <label>Last Name</label>
          <input type="text" class="input" name="last_name" required>
       </div>  
        <div class="inputfield">
          <label>Role</label>
          <div class="custom_select" >
            <select name="role">
              <option value="farmer">Farmer</option>
              <option value="seller">Seller</option>
            </select>
          </div>
       </div>  
      <div class="inputfield">
          <label>Phone Number</label>
          <input type="text" class="input" name="phone_number" placeholder="eg: 01XXXXXXXX" required>
       </div> 
      <div class="inputfield">
          <label>Address</label>
          <input type="text" class="input" name="address">       
        </div> 
       <div class="inputfield">
          <label>City</label>
          <input type="text" class="input" name="city" required>
       </div>  
       <div class="inputfield">
          <label>State</label>
          <input type="text" class="input" name="state" required>
       </div>
       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input" name="password" placeholder="6-pin password" required>
       </div>  
      <div class="inputfield">
          <label>Confirm Password</label>
          <input type="password" class="input" name="retypepassword" placeholder="retype password" required>
       </div> 
       <div class="inputfield">
          <label>Question 1</label>
          <input type="text" class="input" placeholder="What is your secret word ?" required>
       </div>
       <div class="inputfield">
          <label>Question 2</label>
          <input type="text" class="input" placeholder="What a favourite name you like ?">
       </div>
      <div class="inputfield">
        <button type="submit" class="btn" name="register">SignUp</button>
      </div>
    </div>
  </form>
</div>	
	
</body>
</html>