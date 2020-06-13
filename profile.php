<?php
session_start();
include "connection.php";

$farmer_id = $_SESSION["farmer_id"];


$sql = "SELECT farmer_id, first_name, last_name, phone_number, location_farm, company_name
		FROM farmer
		WHERE farmer_id = '$farmer_id'";	
							  
$result = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));

$data = mysqli_fetch_assoc ($result);

mysqli_close ($conn);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Agroself</title>
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');


body{
  background: pink;
}

.wrapper{
  max-width: 500px;
  width: 100%;
  background: #fff;
  margin: 20px auto;
  box-shadow: 1px 1px 2px rgba(0,0,0,0.125);
  padding: 30px;
}

.wrapper .title{
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 25px;
  color: #fec107;
  text-transform: uppercase;
  text-align: center;
}

.wrapper .form{
  width: 100%;
}

.wrapper .form .inputfield{
  margin-bottom: 15px;
  display: flex;
  align-items: center;
}

.wrapper .form .inputfield label{
   width: 200px;
   color: #757575;
   margin-right: 10px;
  font-size: 14px;
}

.wrapper .form .inputfield p{
   font-size: 14px;
   color: #757575;
}

.wrapper .form .inputfield:last-child{
  margin-bottom: 0;
}

@media (max-width:420px) {
  .wrapper .form .inputfield{
    flex-direction: column;
    align-items: flex-start;
  }
  .wrapper .form .inputfield label{
    margin-bottom: 5px;
  }
  
}
      h2{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <?php include 'sidebar.php'; ?>
    <?php include 'menu_profile.php'; ?>

      <form action="" method="post">
<div class="wrapper">
    <div class="title">
      Profile Detail
    </div>
    <div class="form">
       <div class="inputfield">
          <label>First Name</label>
          <label><?php echo $data ["first_name"];?></label>
       </div>  
        <div class="inputfield">
          <label>Last Name</label>
          <label><?php echo $data ["last_name"];?></label>
       </div>    
      <div class="inputfield">
          <label>Phone Number</label>
          <label><?php echo $data ["phone_number"];?></label>
       </div> 
       <div class="inputfield">
          <label>Company Name</label>
          <label><?php echo $data ["company_name"];?></label>
       </div>
      <div class="inputfield">
          <label>Address</label>
          <label><?php echo $data ["location_farm"];?></label>       
        </div> 
       
  </form>
</div>      
	
  </body>
</html>