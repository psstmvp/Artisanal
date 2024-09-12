<?php 
include("../Connection/Connection.php");
session_start();
$uid=$_SESSION['uid'];

if(isset($_GET['ccid']))
{
  $selQry="select * from tbl_comments where comment_id=" . $_GET['ccid'] ."";
  $res=$conn->query($selQry);
  if($row=$res->fetch_assoc())
  $postid=$row['post_id'];


  $sql = "delete from tbl_comments where comment_id=" . $_GET['ccid'] ."";
    $conn->query($sql);
    
    $selcomment = "SELECT COUNT(*) as c FROM tbl_comments WHERE post_id=" . $postid . "";
    $rst = $conn->query($selcomment);
    $comm = $rst->fetch_assoc();
    echo $comm['c'];
    
} 