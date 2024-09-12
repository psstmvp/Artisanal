<?php
include("../Connection/Connection.php");
session_start();
if (isset($_GET['id'])) {
    $selQry = "select * from tbl_wishlist where customer_id=" . $_SESSION['uid'] . " and product_id=" . $_GET['id'] . "";
    $res = $conn->query($selQry);
    if ($row = $res->fetch_assoc()) {
        $sql = "delete from tbl_wishlist where customer_id=" . $_SESSION['uid'] . " and product_id=" . $_GET['id'] . "";
        if ($conn->query($sql))
         {
            echo "removed from Wishlist";
        }
    } else {
        $sql = "insert into tbl_wishlist(customer_id,product_id)values('" . $_SESSION['uid'] . "','" . $_GET['id'] . "')";
        if ($conn->query($sql)) 
        {
           echo "added to Wishlist";
        }

    }
}
?>