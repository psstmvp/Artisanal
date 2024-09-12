<?php
$servername="localhost";
$username="root";
$password="";
$database="db_Artisanal";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn)
    {
		echo "connection failed";
	}

?>
