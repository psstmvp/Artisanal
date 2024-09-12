<?php
include("../Connection/Connection.php");
session_start();
$_SESSION['uid'];
if (isset($_GET['fid'])) {
  $countfollow = 0;
  $checkfollow = '';

$selQry = "select * from tbl_follow where customer_id=" . $_SESSION['uid'] . " and seller_id=" . $_GET['fid'] . "";
$res = $conn->query($selQry);
if ($row = $res->fetch_assoc()) {

  $sql = "delete from tbl_follow where customer_id=" . $_SESSION['uid'] . " and seller_id=" . $_GET['fid'] . "";
  if ($conn->query($sql)) 
  {
    $selfollow = "SELECT COUNT(*) as f FROM tbl_follow WHERE seller_id=" . $_GET['fid'] . "";
     $rlt = $conn->query($selfollow);
     $follow = $rlt->fetch_assoc();
     $countfollow = $follow['f'];
    
  }
      $check = "select * from tbl_follow where seller_id=" . $_GET['fid']." and customer_id=" . $_SESSION['uid'];
      $resCheck = $conn->query($check);
      if($dataCheck = $resCheck->fetch_assoc())
      $checkfollow = true;
      else
      $checkfollow = false;

} else {
  $sql = "insert into tbl_follow(customer_id,seller_id)values('" . $_SESSION['uid'] . "','" . $_GET['fid'] . "')";
  if ($conn->query($sql)) {
   
    $selfollow = "SELECT COUNT(*) as f FROM tbl_follow WHERE seller_id=" . $_GET['fid'] . "";
     $rlt = $conn->query($selfollow);
     $follow = $rlt->fetch_assoc();
     $countfollow = $follow['f'];
    
  }
$check = "select * from tbl_follow where seller_id=" . $_GET['fid']." and customer_id=" . $_SESSION['uid'];
      $resCheck = $conn->query($check);
      if($dataCheck = $resCheck->fetch_assoc())
      $checkfollow = true;
      else
      $checkfollow = false;
    
}

$response = array(
  'countfollow' => $countfollow,
  'checkfollow' => $checkfollow
);

// Convert the array to JSON
$jsonResponse = json_encode($response);

// Echo the JSON response
echo $jsonResponse;
}