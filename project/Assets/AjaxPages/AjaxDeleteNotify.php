<?php 
include("../Connection/Connection.php");
if(isset($_GET['noid']))
{


  $sql = "delete from tbl_notification where notification_id=" . $_GET['noid'] ."";
    $conn->query($sql);
    
    
} 