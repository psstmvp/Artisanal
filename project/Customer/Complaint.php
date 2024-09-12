<?php
ob_start();
include('Head.php');   
include("../Assets/Connection/Connection.php");
$msg="";
$cusid=$_SESSION['uid'];
if(isset($_POST["btnsubmit"])){
$comtitle=$_POST["txtcomtitle"];
$comcontent=$_POST["txtcomcontent"];
$insqry="insert into tbl_complaint(complaint_title,complaint_content,customer_id,created_on) values('".$comtitle."','".$comcontent."',".$cusid.",current_timestamp())";
if($conn->query($insqry))
{

  $selqry = "select * from tbl_complaint co inner join tbl_customer c on co.customer_id=c.customer_id where co.customer_id=".$cusid." ORDER BY created_on DESC LIMIT 1";
        $result = $conn->query($selqry);
        while ($row = $result->fetch_assoc()) {
            $message = "A complaint was received from customer <b>" . $row['cus_name'] . "</b>";
            $Insqry = 'insert into tbl_notification (notification_type,notification_class,message,admin_id,sent_on)values("complaint received","mdi mdi-comment-alert","' . $message . '",1,current_timestamp())';
            $conn->query($Insqry);
        }
$msg="Your Complaint Has Been Submitted";
}
else
{
$msg="Complaint Submission Failed";
}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Complaint</title>
<link rel="stylesheet" href="../Assets/CssPages/FeedComp.css" />
</head>

<body>
<center><br />
<h3>Report Your Complaints Here..</h3><br /><br />
<form id="form1" name="form1" method="post" action="">
<div style="text-align: center;" class="container-add">
  <div class="label">
    <label for="txtcomtitle">Complaint Title</label>
    <input class="form-control" type="text" name="txtcomtitle" id="txtcomtitle" />
  </div>
  <div class="label">
    <label for="txtcomcontent">Complaint Content</label>
    <textarea class="form-control" name="txtcomcontent" id="txtcomcontent" rows="5" cols="30"></textarea>
  </div>
  <div style="margin-top: 25px; text-align: center;">
    <input class="btn" type="submit" name="btnsubmit" value="Submit" />
  </div>
</div>


<?php echo $msg?>
<br /><br />
<h3>Your previous complaints</h3><br />
<table>
  <tr>
    <th>SL No:</th>
    <th>Complaint Title:</th>
    <th>Complaint Content:</th>
    <th>Admin Reply:</th>
  </tr>
  <?php
  $selc = "SELECT * FROM tbl_complaint where customer_id = " . $cusid;
  $resc = $conn->query($selc);
  $i = 0;
  while ($rowc = $resc->fetch_assoc()) {
    $i++;
  ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $rowc['complaint_title']; ?></td>
      <td><?php echo $rowc['complaint_content']; ?></td>
      <?php
      if ($rowc['complaint_status'] == 1) {
      ?>
        <td class="admin-reply"><?php echo $rowc['complaint_reply']; ?></td>
      <?php
      } else {
      ?>
        <td class="admin-reply">Waiting...</td>
      <?php
      }
      ?>
    </tr>
  <?php
  }
  ?>
</table>


</form><br /><br />
</center>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>