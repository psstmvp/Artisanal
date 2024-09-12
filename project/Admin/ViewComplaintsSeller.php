<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>View Complaints</title>
</head>

<body>
  <div class="content-wrapper">


    <div class="col-lg-13 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Complaints from seller</h4>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th style="text-align:center;">SL No</th>
                  <th style="text-align:center;">Customer Name</th>
                  <th style="text-align:center;">Customer Contact</th>
                  <th style="text-align:center;">Customer Email</th>
                  <th style="text-align:center;">Complaint title</th>
                  <th style="text-align:center;">Complaint Description</th>
                  <th style="text-align:center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sels = "SELECT * FROM tbl_complaint co inner join tbl_seller s on co.seller_id=s.seller_id";
                $ress = $conn->query($sels);
                $i = 0;
                while ($rows = $ress->fetch_assoc()) {
                  $i++;
                  ?>
                  <tr>
                    <td align="center">
                      <?php echo $i; ?>
                    </td>
                    <td align="center">
                      <?php echo $rows['sell_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rows['sell_contact']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rows['sell_email']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rows['complaint_title']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rows['complaint_content']; ?>
                    </td>
                    <?php
                    if ($rows['complaint_status'] == 0) {
                      ?>
                      <td><a
                          href="ReplyComplaints.php?rid=<?php echo $rows['seller_id'] ?>&iid=1&coid=<?php echo $rows['complaint_id']; ?>">Reply</a>
                      </td>
                      <?php
                    } else {
                      ?>
                      <td align="center">
                        <?php echo $rows['complaint_reply'] ?>
                      </td>
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
  </div>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>