<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
if (isset($_POST["btnsend"])) {
    $reply = $_POST["txtreplycom"];
    $idid = $_GET['iid'];
    $id = $_GET['rid'];
    $comid = $_GET['coid'];


    if ($idid == 1) {

        $insqry = "update tbl_complaint set complaint_reply='" . $reply . "',complaint_status=1 where seller_id=" . $id . " and complaint_id=" . $comid;
        if ($conn->query($insqry)) {

            $selqry = "select * from tbl_complaint where complaint_id=" . $comid;
            $result = $conn->query($selqry);
            while ($row = $result->fetch_assoc()) {
                $message = "admin replied to your complaint : <b>" . $row['complaint_title'] . "</b> ";
                $Insqry = 'insert into tbl_notification (notification_type,notification_class,message,seller_id,sent_on)values("complaint","mdi mdi-comment-alert-outline","' . $message . '","' . $row['seller_id'] . '",current_timestamp())';
                $conn->query($Insqry);
            }

            ?>
            <script>
                alert("Complaint reply is saved");
                window.location = "ViewComplaints.php";

            </script>
            <?php
        }
    } else {

        $ins = "update tbl_complaint set complaint_reply='" . $reply . "',complaint_status=1 where customer_id=" . $id . " and complaint_id=" . $comid;
        if ($conn->query($ins)) {
            $selqry = "select * from tbl_complaint where complaint_id=" . $comid;
            $result = $conn->query($selqry);
            while ($row = $result->fetch_assoc()) {
                $message = "admin replied to your complaint : <b>" . $row['complaint_title'] . "</b> ";
                $Insqry = 'insert into tbl_notification (notification_type,notification_class,message,customer_id,sent_on)values("complaint","mdi mdi-comment-alert-outline","' . $message . '","' . $row['customer_id'] . '",current_timestamp())';
                $conn->query($Insqry);
            }

            ?>
            <script>
                alert("Complaint reply is saved");
                window.location = "ViewComplaints.php";

            </script>

            <?php
        }
    }
}

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reply complaints</title>
</head>

<body>
    <div class="content-wrapper">
        <center>
            <form method="post">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="color:#234A6F;font-size:23px;">Reply To complaints</h4>
                            <table>
                                <tr>
                                    <td>Enter your reply:</td>
                                    <td><textarea name="txtreplycom" rows="8" cols="50" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div style="margin:15px;text-align:center;">
                                            <input type="submit" name="btnsend" class="btn btn-primary"
                                                style="background-color:#2865AF;" value="SEND REPLAY" />
                                        </div>
                                    </td>
                                </tr>
                            </table>
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