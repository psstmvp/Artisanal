<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

if (isset($_POST['btnsave'])) {
   $selQry = "select * from tbl_city c inner join tbl_district d on c.district_id=d.district_id where city_id='" . $_POST['ddlcity'] . "'";
   $res = $conn->query($selQry);
   $row = $res->fetch_assoc();
   $district = $row['district_name'];
   $city = $row['city_name'];
   $pincode = $row['pincode'];

   $deliveryadd = $_POST['txtname'] . "<br>" . $_POST['txtaddress'] . "<br>" . $pincode . "<br>" . $city . "<br>" . $district . "<br> Contact:" . $_POST['txtcontact'];
   $upqry = "update tbl_order set delivery_address='" . $deliveryadd . "' where order_id=" . $_GET['odid'] . "";
   if ($conn->query($upqry)) {

      ?>
      <script>
         window.location = "PlaceOrder.php"
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
   <title>Edit address</title>
   <style>
      .container-add {
         width: 470px;
         background-color: #ffffff;
         padding: 20px;
         border-radius: 20px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         display: flex;
         flex-direction: column;
         margin-top: 30px;
      }

      .label {
         display: flex;
         justify-content: center;
         padding: 10px;

      }

      .label input[text] {
         display: flex;
         justify-content: flex-start;

      }

      .form-control {
        
         max-width: 200px;

      }
      .boxdiv{
         width: 180px;
         display: flex;
         justify-content: flex-start;
      }
  input[type="number"]::-webkit-inner-spin-button,
		input[type="number"]::-webkit-outer-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}
   </style>
</head>

<body>
   <h3 align="center" style="color:#2865AF;"> DELIVERY ADDRESS</h3>
   <form method="post">
      <center>
         <div style="text-align: center;" class=container-add>
            <div class="label">
            <div class="boxdiv">

                  <label for="txtname">Name </label>
               </div>
               <div class="boxdiv">
                  <input class="form-control" type="text" name="txtname" required pattern="[A-Za-z ]{2,30}"
                      title="Must contain only alphabets and length should be between 2 - 30 characters.">
               </div>

            </div>
            <div class="label">
               <div class="boxdiv">
                  <label for="txtcontact">Contact </label>
               </div>
               <div class="boxdiv">
                  <input class="form-control" type="text" name="txtcontact" required pattern="\d{10}" title="Must contain exactly 10 digits.">
               </div>
            </div>
            <div class="label">
            <div class="boxdiv">
                  <label for="txtaddress">Address </label>
               </div>
               <div class="boxdiv">
                  <input class="form-control" type="text" name="txtaddress" required />
               </div>
            </div>
            <div class="label">
            <div class="boxdiv">
                  <label for="ddldistrict">District </label>
               </div>
               <div class="boxdiv">
                  <select class="form-control" name="ddldistrict" id="ddldistrict" onChange="getCity(this.value)"
                     required>
                     <option value="">-----select-----</option>
                     <?php
                     $dselqry = "select * from tbl_district";
                     $dreslt = $conn->query($dselqry);
                     while ($drow = $dreslt->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $drow['district_id'] ?>">
                           <?php echo $drow['district_name'] ?>
                        </option>
                     <?php } ?>
                  </select>
               </div>
            </div>
            <div class="label">
            <div class="boxdiv">
                  <label for="ddlcity">City </label>
               </div>
               <div class="boxdiv">
                  <select class="form-control" name="ddlcity" id="ddlcity" onChange="getPin(this.value)" required>
                     <option value="">-----select-----</option>
                  </select>
               </div>
            </div>
            <div class="label">
            <div class="boxdiv">
                  <label for="pincode">Pincode </label>
               </div>
               <div class="boxdiv">
                  <span class="form-control" id="pincode">- - - - - -</span>
               </div>
            </div>
            

             <div style="margin-top:25px;text-align:center;"><input class="btn btn-primary"
                  style="background-color:#2865AF;border-radius: 20px; width:120px;height: 50px;" type="submit" name="btnsave" id="btnsubmit"
                  value="save" />
              </div>

         </div>
      </center>
   </form>

   <script src="../Assets/JQ/jQuery.js "></script>
   <script>
      function getCity(ddid) {
         $.ajax({
            url: "../Assets/AjaxPages/AjaxCity.php?pid=" + ddid,
            success: function (html) {
               $("#ddlcity").html(html);
            }
         });
      }
      function getPin(ctid) {
         $.ajax({
            url: "../Assets/AjaxPages/AjaxPincode.php?cid=" + ctid,
            success: function (html) {
               $("#pincode").html(html);
            }
         });
      }
   </script>

</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>