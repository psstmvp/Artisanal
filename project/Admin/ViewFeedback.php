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
  <title>View Feedbacks</title>
</head>

<body>


  <div class="content-wrapper">
    <div class="col-lg-13 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Feedbacks from sellers</h4>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th style="text-align:center;">SL No:</th>
                  <th style="text-align:center;">Seller Name:</th>
                  <th style="text-align:center;">Seller Contact:</th>
                  <th style="text-align:center;">Seller Email:</th>
                  <th style="text-align:center;">Feedback Content</th>
                  <th style="text-align:center;">Feedback Time:</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $selc = "SELECT * FROM tbl_feedback f inner join tbl_seller s on f.seller_id=s.seller_id";
                $resc = $conn->query($selc);
                $i = 0;
                while ($rowc = $resc->fetch_assoc()) {
                  $i++;
                  ?>
                  <tr>
                    <td align="center">
                      <?php echo $i; ?>
                    </td>
                    <td align="center">
                      <?php echo $rowc['sell_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rowc['sell_contact']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rowc['sell_email']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rowc['feedback_content']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rowc['feedback_time']; ?>
                    </td>
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

    <div class="col-lg-13 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Feedbacks from customers</h4>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th style="text-align:center;">SL No:</th>
                  <th style="text-align:center;">Customer Name:</th>
                  <th style="text-align:center;">Customer Contact:</th>
                  <th style="text-align:center;">Customer Email:</th>
                  <th style="text-align:center;">Feedback Content</th>
                  <th style="text-align:center;">Feedback Time:</th>


                </tr>
              </thead>
              <tbody>
                <?php
                $selu = "SELECT * FROM tbl_feedback f inner join tbl_customer c on f.customer_id=c.customer_id";
                $resu = $conn->query($selu);
                $i = 0;
                while ($rowu = $resu->fetch_assoc()) {
                  $i++;
                  ?>
                  <tr>
                    <td align="center">
                      <?php echo $i; ?>
                    </td>
                    <td align="center">
                      <?php echo $rowu['cus_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rowu['cus_contact']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rowu['cus_email']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rowu['feedback_content']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rowu['feedback_time']; ?>
                    </td>

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