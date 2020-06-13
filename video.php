<!doctype html>
<html>
    <head>
        <?php
        include("connection.php");
        session_start();

        if(isset($_POST['but_upload'])){
            $maxsize = 5242880; // 5MB
            $farmer =  $_SESSION['farmer_id'];          
            $name = $_FILES['file']['name'];
            $target_dir = "videos/";
            $target_file = $target_dir . $_FILES["file"]["name"];

            // Select file type
            $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

            // Check extension
            if( in_array($videoFileType,$extensions_arr) ){
                
                // Check file size
                if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                    echo "File too large. File must be less than 5MB.";
                }else{
                    // Upload
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                        // Insert record
                        $query = "INSERT INTO videos(name,location,farmer_id) VALUES('".$name."','".$target_file."',' $farmer')";

                        mysqli_query($conn,$query);
                        echo "<script>alert('Upload Success!');</script>";
                echo "<meta http-equiv='refresh' content='0; url=video.php'/>";
                    }
                }

            }else{
                echo "Invalid file extension.";
            }
        
        }
        ?>

    </head>
    <body>
        <?php include 'sidebar.php'; ?>
    <?php include 'menu_profile.php'; ?>
    <h3>New Video</h3>
        <form method="post" action="" enctype='multipart/form-data'>
            <input type='file' name='file' />
            <input type='submit' value='Upload' name='but_upload'>
        </form>
        <div class="Mcontent">
         <?php  
         $farmer =       $_SESSION['farmer_id'];
        $sql = "SELECT *
        FROM videos 
        WHERE  farmer_id = '$farmer'
        ORDER BY id DESC";

         $fetchVideos = mysqli_query($conn, $sql) ; ?>
        <table align="center" border="0" width="60%" cellpadding="0" cellspacing="0">
          <td><hr></td>
          <td width="30%" align="center"><h2><font color="#1168da">Collection of Video Farm</font></h2></td>
          <td><hr></td>
        </table>
        
        <thead>
        <form action="" method="post">
        <table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
            <tr align="center">
              <td width="7%" style="background-color: #a6a6a6;">No.</td>
              <td width="15%"  style="background-color: #a6a6a6;">Video</td>
              <td  width="45%" style="background-color: #a6a6a6;">Action</td>
            </tr>
            
        </thead>
        <?php $rowNumber = 1;while($row = mysqli_fetch_assoc($fetchVideos)){
            $location = $row['location']; ?>
        <tbody id="myTable">
            <tr>
              <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $rowNumber; ?></td>
              <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo "<div >";
            echo "<video src='".$location."' controls width='320px' height='200px' >";
            echo "</div>"; ?>
        </td>
              <td style="border-bottom: 1px solid #b3b3b3;" align="center"><a href="update_video.php?id=<?php echo $row["id"]; ?>">update</a>
              <a href="delete_video.php?id=<?php echo $row["id"]; ?>">delete</a>


              <td><br><br></td>
            </tr>
        </tbody>
        <?php $rowNumber++; } ?>
        </table>
        </form>
       </div> 
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
    </body>
</html>