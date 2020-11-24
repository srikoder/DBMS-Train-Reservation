<?php
$servername="localhost";
$username="root";
$password="Myadmin@2000";
$dbname="hospitaldata";

$conn= mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
	echo "Server Connected";

}
else{
	echo "Server Connection failed";
}



 ?>
