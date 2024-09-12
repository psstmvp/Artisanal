<?php 
include("../Connection/Connection.php");
session_start();
$uid=$_SESSION['uid'];
if (isset($_GET['reid']))
{
$postid=$_GET['reid'];
$postcontent=$_GET['mes'];

$insreport="insert into tbl_post_report(customer_id,post_id,report_content,report_time) values(" . $uid . "," . $postid . ",'" . $postcontent . "',current_timestamp())";
$conn->query($insreport);

$upQry="update tbl_post set report_status=1 where post_id=".$postid."";
$conn->query($upQry);

$selqry="select * from tbl_post where post_id=" . $postid;
    $result = $conn->query($selqry);
   while ($row = $result->fetch_assoc()) {
    $message="Your Post : <b>".$row['post_caption']." </b>-  was reported by some customer and is temporarily removed from feeds ";
    $Insqry='insert into tbl_notification (notification_type,notification_class,message,seller_id,sent_on)values("post reported","mdi mdi-comment-alert","'.$message.'","'.$row['seller_id'].'",current_timestamp())';
    $conn->query($Insqry);

    $message="A post : <b>".$row['post_caption']." </b>-  was reported. Please take action";
    $insqry='insert into tbl_notification (notification_type,notification_class,message,admin_id,sent_on)values("post reported","mdi mdi-comment-alert-outline","'.$message.'",1,current_timestamp())';
    $conn->query($insqry);
  } 
}
?>