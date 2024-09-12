<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

if (isset($_GET['aid'])) {

  $upQry = "update tbl_post set report_status=2 where post_id=" . $_GET['aid'];
  if ($conn->query($upQry)) {
    $selqry = "select * from tbl_post where post_id=" . $_GET['aid'];
    $result = $conn->query($selqry);
    while ($row = $result->fetch_assoc()) {
      $message = "Your Post : <b>" . $row['post_caption'] . "</b> -  was removed from feeds by the Admin";
      $Insqry = 'insert into tbl_notification (notification_type,notification_class,message,seller_id,sent_on)values("post removed","mdi mdi-comment-remove-outline","' . $message . '","' . $row['seller_id'] . '",current_timestamp())';
      $conn->query($Insqry);
    }
    ?>
    <script>
      alert("post Removed from feeds");
      window.location = "PostReportVerify.php"
    </script>

    <?php
  } else {
    ?>
    <script>
      alert("failed");
    </script>
    <?php
  }
}
?>
<?php
if (isset($_GET['rid'])) {
  $upQry = "update tbl_post set report_status=3 where post_id=" . $_GET['rid'];
  echo $upQry;
  if ($conn->query($upQry)) {

    $selqry = "select * from tbl_post where post_id=" . $_GET['rid'];
    $result = $conn->query($selqry);
    while ($row = $result->fetch_assoc()) {
      $message = "Your Post : <b>" . $row['post_caption'] . " </b>- which was reported was retained to feeds by the Admin";
      $Insqry = 'insert into tbl_notification (notification_type,notification_class,message,seller_id,sent_on)values("post retained","mdi mdi-comment-check-outline","' . $message . '","' . $row['seller_id'] . '",current_timestamp())';
      $conn->query($Insqry);
    } ?>
    <script>
      alert("the post is kept");
      window.location = "PostReportVerify.php"
    </script>
    <?php
  } else {
    ?>
    <script>
      alert("failed");
    </script>
    <?php
  }
}

?>


<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Reported Post Verification</title>
  <link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />


</head>

<body>
  <div class="content-wrapper">
    <div class="row">
      <br>
      <?php
      $selQry = "select * from tbl_seller s inner join tbl_post p on s.seller_id=p.seller_id inner join tbl_post_report r on p.post_id=r.post_id inner join tbl_customer c on r.customer_id=c.customer_id where report_status=1";
      $res = $conn->query($selQry);
      $i = 0;
        ?>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Posts Being Reported</h4>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                    <th >Sl.no.</th>
                      <th >Post</th>
                      <th >Reason to report</th>
                      <th >Posted by</th>
                      <th >Reported by</th>
                      <th >Reported on</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    while ($row = $res->fetch_assoc()) {
                      $i++;
                      $postid = $row['post_id'];
                      ?>
                      <tr>
                        <td align="center">
                          <?php echo $i; ?>
                        </td>

                        <td align="center"><a href="EachPost.php?rid=<?php echo $row['post_id'] ?>" target="_blank" style="text-decoration:none;">
                        <?php echo $row['post_caption'];?></a>
                        </td>
                        <td align="center">
                          <?php echo $row['report_content']; ?>
                        </td>
                        <td align="center">
                          <?php echo $row['sell_name'] . "<br>" . $row['sell_email']; ?>
                        </td>
                        <td align="center">
                          <?php echo $row['cus_name'] . "<br>" . $row['cus_email']; ?>
                        </td>
                        <td align="center">
                          <?php echo $row['report_time']; ?>
                        </td>
                        <td align="center">
                          <a href="PostReportVerify.php?aid=<?php echo $row['post_id'] ?>" style="text-decoration:none;">remove post</a><br>
                          <a href="PostReportVerify.php?rid=<?php echo $row['post_id'] ?>" style="text-decoration:none;">keep post</a>
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
        <br><br>

      <?php
      $selQry = "select * from tbl_seller s inner join tbl_post p on s.seller_id=p.seller_id inner join tbl_post_report r on p.post_id=r.post_id inner join tbl_customer c on r.customer_id=c.customer_id where report_status=2";
      $res = $conn->query($selQry);
      $i = 0;
        ?>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Posts Removed</h4>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                    <th >Sl.no.</th>
                      <th >Post</th>
                      <th >Reason to report</th>
                      <th >Posted by</th>
                      <th >Reported by</th>
                      <th >Reported on</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    while ($row = $res->fetch_assoc()) {
                      $i++;
                      ?>

                      <tr>
                        <td align="center">
                          <?php echo $i; ?>
                        </td>
                        <td align="center"><a href="EachPost.php?rid=<?php echo $row['post_id'] ?>" target="_blank" style="text-decoration:none;">
                        <?php echo $row['post_caption'];?></a></td>
                        <td align="center">
                          <?php echo $row['report_content']; ?>
                        </td>
                        <td align="center">
                          <?php echo $row['sell_name'] . "<br>" . $row['sell_email']; ?>
                        </td>
                        <td align="center">
                          <?php echo $row['cus_name'] . "<br>" . $row['cus_email']; ?>
                        </td>
                        <td align="center">
                          <?php echo $row['report_time']; ?>
                        </td>
                        <td align="center">
                          <a href="PostReportVerify.php?rid=<?php echo $row['post_id'] ?>" style="text-decoration:none;">keep post</a>
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
      <br>
      <br>


      <?php
      $selQry = "select * from tbl_seller s inner join tbl_post p on s.seller_id=p.seller_id inner join tbl_post_report r on p.post_id=r.post_id inner join tbl_customer c on r.customer_id=c.customer_id where report_status=3";
      $res = $conn->query($selQry);
      $i = 0;
      ?>

        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Posts Kept</h4>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th >Sl.no.</th>
                      <th >Post</th>
                      <th >Reason to report</th>
                      <th >Posted by</th>
                      <th >Reported by</th>
                      <th >Reported on</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    while ($row = $res->fetch_assoc()) {
                      $i++;
                      ?>
                      <tr>
                        <td align="center">
                          <?php echo $i; ?>
                        </td>
                        <td align="center"><a href="EachPost.php?rid=<?php echo $row['post_id'] ?>" target="_blank" style="text-decoration:none;">
                        <?php echo $row['post_caption'];?></a></td>
                        <td align="center">
                          <?php echo $row['report_content']; ?>
                        </td>
                        <td align="center">
                          <?php echo $row['sell_name'] . "<br>" . $row['sell_email']; ?>
                        </td>
                        <td align="center">
                          <?php echo $row['cus_name'] . "<br>" . $row['cus_email']; ?>
                        </td>
                        <td align="center">
                          <?php echo $row['report_time']; ?>
                        </td>
                        <td align="center">
                          <a href="PostReportVerify.php?aid=<?php echo $row['post_id'] ?>" style="text-decoration:none;">remove post</a><br>
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
  </div>
</body>

<?php
ob_end_flush();
include('Foot.php');
?>
<html>