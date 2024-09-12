<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$msg = "";
if (isset($_POST["btnsubmit"])) {
  $tname = strtoupper($_POST["txttype"]);

  $seltyp = "select * from tbl_type where type_name='" . $tname . "'";
  $res = $conn->query($seltyp);
  if (!($row = $res->fetch_assoc())) {
    $insQry = "insert into tbl_type(type_name)values('" . $tname . "')";

    if ($conn->query($insQry)) {
      $msg = "record inserted..";
    } else {
      $msg = "Insertion Failed..";

    }
  } else { ?>
    <script>
      alert("already exist");
      window.location = "Type.php"
    </script>
    <?php
  }
}
?>

<?php
if (isset($_GET['did'])) {
  $delQry = "delete from tbl_type where type_id=" . $_GET['did'];
  if ($conn->query($delQry)) { ?>
    <script>
      alert("deleted");
      window.location = "Type.php"
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
  <title>Type</title>
  <link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
</head>

<body>
  <div class="content-wrapper">
    <center>

      <form class="forms-sample" id="form1" name="form1" method="post">

        <input type="hidden" name="txtid" value="<?php echo $districtid ?>" />
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Enter a Type Here..</h4>
              <div class="table-responsive">
                <table class="table table-hover">
                  <tr>
                    <div class="form-group row">
                      <td><label for="txttype" class="col-sm-3 col-form-label">Type
                        </label></td>
                      <div class="col-sm-9">
                        <td><input type="text" class="form-control" name="txttype" required pattern="[A-Za-z]{0,30}"
                      title="Must contain only alphabets and length should be upto 30 characters."></td>
                      </div>
                    </div>
                  </tr>
                  <tr>
                    <td align="left"><button type="submit" name="btnsubmit"
                        class="btn btn-outline-primary btn-fw">Save</button></td>
                    <td align="right"><button type="reset" name="btncancel"
                        class="btn btn-outline-secondary btn-fw">Cancel</button></td>

                  </tr>
                  <tr>
                    <td height="31" colspan="2" align="center">
                      <?php echo $msg ?>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>

    </center>
    </form>
    <center>
      <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Types Included</h4>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="text-align:center;">sl.no.</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $selQry = "select * from tbl_type";
                  $res = $conn->query($selQry);
                  $i = 0;
                  while ($row = $res->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                      <td align="center">
                        <?php echo $i; ?>
                      </td>
                      <td align="center">
                        <?php echo $row['type_name']; ?>
                      </td>
                      <td>
                        <a class="btn btn-outline-danger btn-icon-text btn-sm"
                          href="Type.php?did=<?php echo $row['type_id'] ?>">Delete <i
                            class="ti-trash btn-icon-append"></i></a>
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
    </center>
  </div>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>