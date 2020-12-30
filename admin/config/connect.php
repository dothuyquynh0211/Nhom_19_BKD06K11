<?php  
$conn = mysqli_connect("localhost","root","","bkd06k11");
if(!$conn)
{
	die("Ket noi that bai".mysqli_connect_error($conn));
}
?>