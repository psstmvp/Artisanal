<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$msg = "";
$sellerid = $_SESSION['sid'];
if (isset($_POST["btnsubmit"])) {
  $fcontent = $_POST["txtfeedcontent"];
  $insqry = "insert into tbl_feedback(feedback_content,feedback_time,seller_id) values('" . $fcontent . "',current_timestamp()," . $sellerid . ")";
  if ($conn->query($insqry)) {
    $msg = "Your feedback has been sent..Thank You for your valuable feedback";
  } else {
    $msg = "feedback Submission Failed";
  }
}
?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Seller Feedback</title>
</head>

<body>
  <div class="content-wrapper">
    <center>

      <form id="form1" name="form1" method="post" action="">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card" style="margin-top:30px;">
            <div class="card-body">
              <h4 class="card-title" style="color:#234A6F;font-size:23px;">Send Your Feedbacks</h4>
              <table>

                <tr>
                  <td>Feedback Content:</td>
                  <td>
                    <textarea name="txtfeedcontent" id="txtfeedcontent" row="150" col="30"
                      class="form-control"></textarea>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div style="margin:15px;text-align:right;">
                      <input type="submit" name="btnsubmit" class="btn btn-primary" style="background-color:#2865AF;"
                        value="Submit" />
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </form>
      <h4>
        <?php echo $msg; ?>
      </h4>
    </center>
  </div>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>