<?php
session_start();
  include 'connection.php';
  
  if(isset($_POST['reset'])){
    
    $phone_number =  $_POST['phone_number'];
    $newpass =  $_POST['newpass'];
    $newpass2 = $_POST['newpass2'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    
    $sql4 = "SELECT farmer_id, phone_number
             FROM farmer WHERE phone_number = '$phone_number' and question1 = '$question1' and question2 = '$question2' ";
    $sql5 =  "SELECT seller_id, phone_number
              FROM seller WHERE phone_number = '$phone_number' and question1 = '$question1' and question2 = '$question2'";

    $execute4 =  mysqli_query ($conn, $sql4) or die (mysqli_error($conn));
    $execute5 =  mysqli_query ($conn, $sql5) or die (mysqli_error($conn));
    
    if(mysqli_num_rows($execute4)>0){
  
      while ($row = mysqli_fetch_assoc($execute4)){
        if($newpass == $newpass2){  
          
        $sql =     "UPDATE farmer
              SET password = '$newpass2' 
              WHERE phone_number = '$phone_number' and question1 = '$question1' and question2 = '$question2'";
        $execute =  mysqli_query ($conn,$sql) or die (mysqli_error ($conn));
        
          if($execute){
            echo "<script>alert('Reset Success!');</script>";
            echo "<meta http-equiv='refresh' content='0; url=signin.php'/>";
          }
          else{
            echo "<script>alert('Reset Fail!');</script>";
          }
        }
        else{
            echo "<script>alert('Cannot Reset Password!');</script>";
        }
      }
    }
    elseif(mysqli_num_rows($execute5)>0){

      while ($row = mysqli_fetch_assoc($execute5)){
        if($newpass == $newpass2){  
          
        $sql =     "UPDATE seller
              SET password = '$newpass2' 
              WHERE phone_number = '$phone_number' and question1 = '$question1' and question2 = '$question2'";
        $execute =  mysqli_query ($conn,$sql) or die (mysqli_error ($conn));
        
          if($execute){
            echo "<script>alert('Reset Success!');</script>";
            echo "<meta http-equiv='refresh' content='0; url=signin.php'/>";
          }
          else{
            echo "<script>alert('Reset Fail!');</script>";
          }
        }
        else{
            echo "<script>alert('Cannot Reset Password!');</script>";
        }
      }

    }
    else{
          echo "<script>alert('Your phone number or current password are wrong!');</script>";
      }
  }
  mysqli_close ($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="signup.css">
</head>
<body>
<form action="" method="post">
<div class="wrapper">
    <div class="title">
      Reset Password
    </div>
    <div class="form">
      <div class="inputfield">
          <label>Phone Number</label>
          <input type="text" class="input" name="phone_number" placeholder="eg: 01XXXXXXXX">
       </div> 
       <div class="inputfield">
          <label>Question 1</label>
          <input type="text" class="input" name="question1" placeholder="What is your secret word ?">
       </div>
       <div class="inputfield">
          <label>Question 2</label>
          <input type="text" class="input" name="question2" placeholder="What a favourite name you like ?">
       </div>
       <div class="inputfield">
          <label>New Password</label>
          <input type="password" class="input" name="newpass" placeholder="6-pin password">
       </div>  
      <div class="inputfield">
          <label>Confirm Password</label>
          <input type="password" class="input" name="newpass2" placeholder="Retype password">
       </div> 
       
      <div class="inputfield">
        <button type="submit" class="btn" name="reset">Reset</button>
      </div>
    </div>
  </form>
</div>  
  
</body>
</html>