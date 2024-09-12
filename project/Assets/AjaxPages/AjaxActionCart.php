<?php
session_start();
include("../Connection/Connection.php");


    if ($_GET["action"]=="Delete") {
        $id = $_GET["id"];
        $delQry = "delete from tbl_cart where cart_id='" .$id. "'";
        $conn->query($delQry);
    }
    if ($_GET["action"]=="Update") {
        $id = $_GET["id"];
        $qty = $_GET["qty"];
        $upQry = "update tbl_cart set cart_quantity = '" .$qty. "' where cart_id='" .$id. "'";
        $conn->query($upQry);
    }
    if ($_GET["action"]=="Move") {
		$id = $_GET["id"];
		$selCart="select * from tbl_cart where cart_id=".$id."";
		$cres=$conn->query($selCart);
		$crow=$cres->fetch_assoc();
		$proid=$crow['product_id'];
		
		$selQry="select * from tbl_wishlist where customer_id=".$_SESSION['uid']." and product_id=".$proid."";
        $res=$conn->query($selQry);
       if(!$row=$res->fetch_assoc())
       {
	   $sql= "insert into tbl_wishlist(customer_id,product_id)values('".$_SESSION['uid']."','".$proid."')";
       $conn->query($sql);
	   }
	
        $delQry = "delete from tbl_cart where cart_id='" .$id. "'";
        $conn->query($delQry);
        
    }
?>