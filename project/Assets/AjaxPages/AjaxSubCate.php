<?php 
include("../Connection/Connection.php");
?>

<option value="">-----select----</option>
       <?php 
	   
	   $selqry="SELECT *FROM tbl_subcategory where category_id=".$_GET['xid'];
	   $reslt=$conn->query($selqry);
	   while($row=$reslt->fetch_assoc())
	   {?>
       <option value= "<?php echo $row['subcat_id']?>"> <?php echo $row['subcat_name']?></option>
       <?php }?>