<?php
session_start();
include "connection.php";

$id = $_GET['id'];
$sql = 	     "SELECT  id, name, location 
			  FROM videos";
		 
$result = 	mysqli_query($conn,$sql) or die (mysqli_error($conn));
$data = 	mysqli_fetch_assoc($result);
?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Update Video</title>
</head>
<style>
		body {
			margin:0;
			background-color: #ffe6ff;
			font-family: Arial, Helvetica, sans-serif;
		}

		* {
			box-sizing: border-box
		}
</style>
<body>
      <?php
        include("connection.php");
     
        if(isset($_POST['but_upload'])){
            $maxsize = 5242880; // 5MB
            $id = $_POST['id'];         
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
                        $query = "UPDATE videos SET name = '$name',
                        location ='$target_file'
                        WHERE id = '$id'";

                        mysqli_query($conn,$query);
                        echo "Upload successfully.";
                    }
                }

            }else{
                echo "Invalid file extension.";
            }
        
        }
        ?>
    </head>
    <body>
        <form method="post" action="" enctype='multipart/form-data'>
            <input type='file' name='file' />
            <input type="hidden" name = "id" value ="<?php echo $data["id"]; ?>" >
            <input type='submit' value='Upload' name='but_upload'>
        </form>
        </div>
        <div class="topnav" > 
         <button onclick="goBack()">Back</button>
    </div>
    
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>