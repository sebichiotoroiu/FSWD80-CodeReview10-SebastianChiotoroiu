<?php  

include 'connection.php';

$id=$_GET['id'];

function deleteRecord($conn,$id) {
	global $conn;
	$sql = "DELETE FROM media WHERE ISBN =".$id.";";
	$result=mysqli_query($conn,$sql);

}
deleteRecord($conn,$id);
header("Location: inventory.php");
die;


?>