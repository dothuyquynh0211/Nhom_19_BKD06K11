<?php  
$conn = mysqli_connect("localhost","root","","chungarden");
if(!$conn)
{
	die("Ket noi that bai".mysqli_connect_error($conn));
}
?>