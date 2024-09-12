<?php 
include("../Connection/Connection.php");
session_start();
if(isset($_GET['caid'])){
	$upQry="update tbl_cart set cart_status=2 where cart_id=".$_GET['caid'];
	$conn->query($upQry);


	$selqry = "select * from tbl_customer cu inner join tbl_order o on o.customer_id=cu.customer_id inner join tbl_cart c on c.order_id=o.order_id inner join tbl_product p on c.product_id=p.product_id where c.cart_id=" . $_GET['caid'];
	$result = $conn->query($selqry);
	while ($row = $result->fetch_assoc()) {
		$message = " order  of product <b>" . $row['prod_name'] . "</b> from <b>" . $row['cus_name'] . "</b> was cancelled";
		$Insqry = 'insert into tbl_notification (notification_type,notification_class,message,seller_id,sent_on)values("order Cancelled","mdi mdi-package-variant-closed","' . $message . '","' . $row['seller_id'] . '",current_timestamp())';
		$conn->query($Insqry);
	}

}
    ?>