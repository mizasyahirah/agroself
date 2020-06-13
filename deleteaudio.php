<?php 
	session_start();
	include('connection.php');

	$audio = $_GET["audio_id"];
	

	// echo $desc;
	// echo $audio;

	$sql = "DELETE FROM `audio` WHERE `audio_id`= '$audio'";
	$result = mysqli_query($conn, $sql);

	if($result == TRUE){
				echo '<script language="javascript">';
				echo 'alert("Deleted!");';
				echo 'window.location.href="audio.php";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
				echo 'alert("delete Fail");';
				echo 'window.location.href="audio.php";';
				echo '</script>';
			}

			mysqli_close($conn);
		
?>