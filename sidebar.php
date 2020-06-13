<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;
margin: 0;
}

.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 18px;
  color: white;
  text-decoration: none;
  font-size: 20px;
}
.navbar2{
  float: right;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #4CAF50;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  cursor: pointer;
  font-size: 20px;  
  border: none;
  outline: none;
  color: white;
  padding: 18px 25px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 10px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.show {
  display: block;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
</style>
<body>
<div class="navbar">
  <a class="active" href=""><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="product_produce.php"><i class="fa fa-fw fa-apple"></i> Product</a>   
  <a href="operation_cost.php"><i class="fa fa-fw fa-money"></i> Cost</a>
  <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
  <div class="navbar2">
    <div class="dropdown">
  <button class="dropbtn" onclick="myFunction()">Profile
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content" id="myDropdown">
    <a href="profile.php">Profile</a>
    <a href="forgotpassword.php">Change Password</a>
    <a href="logout.php">Logout</a>
  </div>
  </div>
</div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
</body>
</html> 
