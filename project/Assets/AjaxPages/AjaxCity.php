<?php 
include("../Connection/Connection.php");
?>

<option value="">-----select-----</option>
       <?php 
	   
	   $selqry="SELECT *FROM tbl_city where district_id=".$_GET['pid'];
	   $reslt=$conn->query($selqry);
	   while($row=$reslt->fetch_assoc())
	   {?>
       <option value= "<?php echo $row['city_id']?>"> <?php echo $row['city_name']?></option>
       <?php }?>