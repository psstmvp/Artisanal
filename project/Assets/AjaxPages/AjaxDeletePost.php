<?php 
include("../Connection/Connection.php");
session_start();
$sid=$_SESSION['sid'];

if(isset($_GET['postId']))
{


  $sql = "delete from tbl_post where post_id=" . $_GET['postId'] ."";
    $conn->query($sql);
    
    
} 