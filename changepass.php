<?php
session_start();
  include 'connection.php';
  
  if(isset($_POST['reset'])){
    
    $phone_number =  $_POST['phone_number'];
    $password =  $_POST['password'];
    $newpass =  $_POST['newpass'];
    $newpass2 = $_POST['newpass2'];
    
    $sql4 =     "SELECT farmer_id, phone_number, password 
           FROM farmer WHERE phone_number = '$phone_number' and password = '$password' ";

    $execute4 =  mysqli_query ($conn, $sql4) or die (mysqli_error($conn));
    
    if(mysqli_num_rows($execute4)>0){
  
      while ($row = mysqli_fetch_assoc($execute4)){
        if($newpass == $newpass2){  
          
        $sql =     "UPDATE farmer
              SET password = '$newpass2' 
              WHERE phone_number = '$phone_number'";
        $execute =  mysqli_query ($conn,$sql) or die (mysqli_error ($conn));
        
          if($execute){
            echo "<script>alert('Reset Success!');</script>";
            echo "<meta http-equiv='refresh' content='0; url=sidebar.php'/>";
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
<html>
<head>
    <meta charset="utf-8">
    <title>Agroself</title>  
</head>
<style>
    body {
      margin:0;
      background-color: #ccffcc;
      font-family: Arial, Helvetica, sans-serif;
    }
  
    * {
      box-sizing: border-box;
      }
</style>
<body>
      <br></br><br></br><br></br>
            <table align="center" border="0" width="50%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="40%" align="center"><h2><font color="#1168da">RESET PASSWORD</font></h2></td>
              <td><hr></td>
            </table>
      <form method="post" action="">    
      <table align = "center" border="0" cellpadding="7" cellspacing="0" >
        <tr>
        <td>Phone Number</td>
        <td><input class="input" type="text" name="phone_number" autofocus required></td>
        </tr>
        
        <tr>
        <td>Current Password</td>
        <td><input class="input" type="password" minlength="6" name="password" required></td>
        </tr> 
        
        <tr>
        <td>New Password</td>
        <td><input class="input" type="password" placeholder="6-pin password" maxlength=6 name="newpass" required></td>
        </tr>
        
        <tr>
        <td></td>
        <td style = "font-style: italic">Use characters with a mix of letters & numbers</td>
        </tr>
        
        <tr>
        <td>Confirm Password</td>
        <td><input class="input" type="password" placeholder="6-pin password" maxlength=6 name="newpass2" required></td>
        </tr>
        
        <tr>
        <td></td>
        <td style = "font-style: italic">Retype your password</td>
        </tr>
        
        <tr>
        <td></td>     
        <td><input class="button" type="submit" name="reset" value="RESET">
        <input class="button" type="submit" value="Go Back" onclick="goBack()"></td>
        </tr>
        
      </table>
      </form>
  <br></br><br></br><br></br><br></br><br></br><br></br>
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>
</html>