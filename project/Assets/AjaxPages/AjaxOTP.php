<?php
session_start();  
include("../Connection/Connection.php");
if( $_SESSION["token"]==$_GET['OTP'])
{
    
if($_SESSION['email']!= "")
{
$sel="select * from tbl_customer where cus_email='".$_SESSION['email']."'";
$res=$conn->query($sel);
if($row=$res->fetch_assoc())
{
$upQry="update tbl_customer set cus_otp_status=1 where cus_email='".$_SESSION['email']."'";
			$conn->query($upQry);
            $_SESSION["email"]="";
          
}
}
if($_SESSION['semail']!= "")
{
$sel="select * from tbl_seller where sell_email='".$_SESSION['semail']."'";
$res=$conn->query($sel);
if($row=$res->fetch_assoc())
{
$upQry="update tbl_seller set sell_otp_status=1 where sell_email='".$_SESSION['semail']."'";
			$conn->query($upQry);
            $_SESSION["semail"]="";
            $message="A New Seller has Registered please verify";
    		$insqry='insert into tbl_notification (notification_type,notification_class,message,admin_id,sent_on)values("New Seller","mdi mdi-account-search","'.$message.'",1,current_timestamp())';
    		$conn->query($insqry);
}

}
}
            ?>