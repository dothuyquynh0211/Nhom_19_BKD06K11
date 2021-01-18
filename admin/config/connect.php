<?php  
$conn = mysqli_connect("localhost","root","","chunGarden");
if(!$conn)
{
	die("Ket noi that bai".mysqli_connect_error($conn));
}
?>