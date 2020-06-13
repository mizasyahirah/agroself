<?php 
    session_start();
    include('connection.php');
?>
<!DOCTYPE html> <!-- Connect with database -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="adminpagestyle.css" />
    <title>audio</title>
</head>
<html>
    <body>
        <?php include 'sidebar.php'; ?>
      <?php include 'menu_profile.php'; ?>

        <h3>ADD AUDIO</h3>
            </tr>
                
        <form enctype="multipart/form-data" action="audio.php" method="post"> <!-- This is add item form -->
                
            <tr align="left">
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000000000000000" />
                <td><h3>Audio File:</h3></td>
                <td>
                     <input name="file" type="file">
                 </td>
            </tr>
            <tr align="left">
                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="100000" /> -->
                <td><h3>Description File:</h3></td>
                <td>
                     <input class="input" name="description_entered" type="text">
                 </td>
            </tr>
            
            <tr align="centre">
                <td></td>
                <td>
                     
                <input class="btn success" type="submit" name="add" value="ADD">
                <button type="reset" class="btn default">Reset</button><br><br>
                </td>
            </tr>
        </form>
</table>
</div>
</td>
   <!-- This is a code for display item information -->
    <td width="72%" align="left" valign="top"> 
        <table width="70%" cellpadding="5" cellspacing="0" valign="left">
       
            <tr align="center">
                
                <td width="7%" style="background-color: #a6a6a6; width="15%">TITLE:</td>
                <td width="7%" style="background-color: #a6a6a6; width="20%">FILE NAME:</td>
                <td width="7%" style="background-color: #a6a6a6; width="20%">PLAY:</td>
                <td width="7%" style="background-color: #a6a6a6; width="8%" colspan="2">ACTION:</td>
                
          </tr>
          
          <?php
          $sql = "SELECT * FROM audio ORDER BY description";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0 )
                    {
                    while($row = mysqli_fetch_array($result))
                    {
            ?>

                <tr align="center" width="20%" height="40">
                    <form action="playaudio.php" method="post">
                    <input name="audio_id" value="<?php echo $row['audio_id']; ?>" hidden />
                    <td style="border-bottom : 1px solid #b3b3b3;"><h5><input name="description" value="<?php echo $row['description']; ?>" placeholder="<?php echo $row['description']; ?>" /></h5></td>
                    <td style="border-bottom : 1px solid #b3b3b3;"><h5><?php echo $row['filename']; ?></h5></td>
                    <td style="border-bottom : 1px solid #b3b3b3;"><audio src="<?php echo $row['filename']; ?>" controls>
                    </audio></td>

                    <td style="border-bottom : 1px solid #b3b3b3;"><button 
                    class="btn success">Update</button></td>
                </form>
                    <td style="border-bottom : 1px solid #b3b3b3;"><a href="deleteaudio.php?audio_id=<?php echo $row['audio_id'];?>" 
                    onclick="return confirm('Are You Sure?')" class="danger">Delete</td>
                </tr>
                <?php
                }
                    }
                ?>
</table>

</div>
<!-- This is insert coding -->
<?php
        if(isset($_POST['add'])){
            $name= $_FILES['file']['name'];
            $tmp_name= $_FILES['file']['tmp_name'];
            $position= strpos($name, "."); 
            $fileextension= substr($name, $position + 1);
            $fileextension= strtolower($fileextension);
            $description= $_POST['description_entered'];
            $path= 'Uploads/Files/';
            $name2=$path.$name;

            if (!empty($name)){
            if (move_uploaded_file($tmp_name, $path.$name)) {
                $insert = mysqli_query($conn, "INSERT INTO audio (description, filename) VALUES ('$description', '$name2')");
                if($insert){



                echo '<script language="javascript">';
                echo 'alert("Audio file uploaded!");';
                echo 'window.location.href="audio.php";';
                echo '</script>';
            }

            }
            }
        }

            ?>


</body>

</html>