<?php 
include("../Connection/Connection.php");
?>
 <?php 
	$selqry="SELECT pincode FROM tbl_city where city_id=".$_GET['cid'];
	  $reslt=$conn->query($selqry);
	  $row=$reslt->fetch_assoc();
	  echo $row['pincode'];
	  ?>