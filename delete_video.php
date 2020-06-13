<?php
session_start();
include "connection.php";

$id = $_GET['id'];
$sql = "delete from videos WHERE id = '$id'";
$execute = mysqli_query($conn, $sql) or die (mysqli_error($conn));

		echo "<script>alert('delete video success')</script>";
		echo "<meta http-equiv='refresh' content='0; url=video.php'/>";

?>
