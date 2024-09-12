<?php 
include("../Connection/Connection.php");
session_start();
$selid=$_SESSION['sid'];

   $upQry="update tbl_seller set sell_bio_status=1 where seller_id=".$selid."";
   $conn->query($upQry);
 ?>
           