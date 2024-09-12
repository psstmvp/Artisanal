
<?php
include("../Connection/Connection.php");
session_start();
$selqry="select * from tbl_order where customer_id='".$_SESSION["uid"]."' and order_status='0'";

$result=$conn->query($selqry);
if($result->num_rows>0)
{
	
	if($row=$result->fetch_assoc())
	{
		$oid = $row["order_id"];
		
		
		
		$selqry="select * from tbl_cart where order_id='".$oid."' and product_id='".$_GET["id"]."'";
		//echo $selqry;
		$result=$conn->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
		
		 $insQry1="insert into tbl_cart(product_id,order_id)values('".$_GET["id"]."','".$oid."')";
         if($conn->query($insQry1))
          { 
             echo "Added to Cart";
                        }
                        else
                        {
	                       echo "Failed";
                        }
		}
		
	}
	
}
else
{
	

$insQry=" insert into tbl_order(customer_id,order_date)values('".$_SESSION["uid"]."',curdate())";
			if($conn->query($insQry))
			{
				$selqry1="select MAX(order_id) as id from tbl_order where customer_id=".$_SESSION["uid"];
                $result=$conn->query($selqry1);
				if($row=$result->fetch_assoc())
				{
					$bid=$row["id"];
					
					
					$selqry="select * from tbl_cart where order_id='".$oid."'and product_id='".$_GET["id"]."'";
		$result=$conn->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
					
					
	                   $insQry1="insert into tbl_cart(product_id,order_id)values('".$_GET["id"]."','".$oid."')";
                        if($conn->query($insQry1))
                        { 
                          echo "Added to Cart";
                        }
                        else
                        {
	                       echo "Failed";
                        }
					  
		}

                }
			}
}
?>
