<?php
ob_start();
include('Head.php');   
include("../Assets/Connection/Connection.php");
$msg="";
$userid=$_SESSION['uid'];
if(isset($_POST["btnsubmit"])){
$fcontent=$_POST["txtfeedcontent"];
$insqry="insert into tbl_feedback(feedback_content,feedback_time,customer_id) values('".$fcontent."',current_timestamp(),".$userid.")";
if($conn->query($insqry))
{
$msg="Your feedback has been sent..Thank You for your valuable feedback";
}
else
{
$msg="Feedback Submission Failed";
}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../Assets/CssPages/FeedComp.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback</title>
</head>

<body>
<center>
<h3>Send Your Feedbacks</h3><br />
<form id="form1" name="form1" method="post" action="">
<div style="text-align: center;" class="container-add">
  <div class="label">
    <label for="txtfeedcontent">Feedback Content</label>
    <textarea class="form-control" name="txtfeedcontent" id="txtfeedcontent" rows="5" cols="30"></textarea>
  </div>
  <div style="margin-top: 25px; text-align: center;">
    <input class="btn" type="submit" name="btnsubmit" value="Submit" />
  </div>
</div><br />
 
 
 
  </form>
  <h4><?php echo $msg;?></h4>
</center>

</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>