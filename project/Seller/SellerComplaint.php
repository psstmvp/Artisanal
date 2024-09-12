<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$msg = "";
$sellid = $_SESSION['sid'];
if (isset($_POST["btnsubmit"])) {
  $comtitle = $_POST["txtcomtitle"];
  $comcontent = $_POST["txtcomcontent"];
  $insqry = "insert into tbl_complaint(complaint_title,complaint_content,seller_id,created_on) values('" . $comtitle . "','" . $comcontent . "'," . $sellid . ",current_timestamp())";
  if ($conn->query($insqry)) {
    $selqry = "select * from tbl_complaint co inner join tbl_seller c on co.seller_id=c.seller_id where co.seller_id=" . $sellid . " ORDER BY created_on DESC LIMIT 1";
    $result = $conn->query($selqry);
    while ($row = $result->fetch_assoc()) {
      $message = "A complaint was received from Seller <b>" . $row['sell_name'] . "</b>";
      $Insqry = 'insert into tbl_notification (notification_type,notification_class,message,admin_id,sent_on)values("complaint received","mdi mdi-comment-alert", "' . $message . '",1,current_timestamp())';
      $conn->query($Insqry);
    }
    $msg = "Your Complaint Has Been Submitted";
  } else {
    $msg = "Complaint Submission Failed";
  }
}
?>



<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Seller Complaint</title>
</head>

<body>
  <div class="content-wrapper">
    <center>
      <form id="form1" name="form1" method="post" action="">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" style="color:#234A6F;font-size:23px;">Report Your Complaints Here..</h4>
              <table>
                <tr>
                  <td width="207">Complaint Title:</td>
                  <td width="186"><label for="txtcomtitle"></label>
                    <input type="text" name="txtcomtitle" id="txtcomtitle" class="form-control" />
                  </td>
                </tr>
                <tr>
                  <td>Complaint Content:</td>
                  <td>
                    <textarea name="txtcomcontent" id="txtcomcontent" row="50" col="30" class="form-control"></textarea>
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

        <?php echo $msg ?>
        <br /><br />

        <div class="col-lg-13 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Your previous complaints</h4>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                    <tr>
                      <th style="text-align:center;">SL No:</th>
                      <th style="text-align:center;">Complaint Title:</th>
                      <th style="text-align:center;">Complaint Content:</th>
                      <th style="text-align:center;">Admin Reply:</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sel = "SELECT * FROM tbl_complaint where seller_id=" . $sellid;
                    $res = $conn->query($sel);
                    $i = 0;
                    while ($row = $res->fetch_assoc()) {
                      $i++;
                      ?>
                      <tr>
                        <td align="center">
                          <?php echo $i; ?>
                        </td>
                        <td align="center">
                          <?php echo $row['complaint_title']; ?>
                        </td>
                        <td align="center">
                          <?php echo $row['complaint_content']; ?>
                        </td>
                        <?php
                        if ($row['complaint_status'] == 1) {
                          ?>
                          <td align="center">
                            <?php echo $row['complaint_reply']; ?>
                          </td>
                          <?php
                        } else {
                          ?>
                          <td align="center">Waiting...</td>
                          <?php
                        }
                        ?>
                      </tr>
                      <?php
                    }
                    ?>


                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </form>
    </center>
  </div>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>