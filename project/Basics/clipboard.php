
Conversation opened. 1 unread message.

Skip to content
Using Gmail with screen readers

1 of 719
(no subject)
Inbox

Fathima Sheen K S
21:12 (32 minutes ago)
to me



<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
    
require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

include("../Assets/Connection/Connection.php");

if(isset($_POST["btnregister"]))
{
    $name = $_POST["txtname"];
    $contact = $_POST["txtcontact"];
    $email = $_POST["txtemail"];
    $gender = $_POST["btngender"];
    $house = $_POST["txthousename"];
    $area = $_POST["txtarea"];
    $districtid = $_POST["sel_district"];
    $placeid = $_POST["sel_place"];
    $dob = $_POST["txtdob"];
    
    $photo = $_FILES["filephoto"]["name"];
    $tempphoto = $_FILES["filephoto"]["tmp_name"];
    move_uploaded_file($tempphoto, '../Assets/File/User/' . $photo);
    $password = $_POST["txtpassword"];

    $selu = "select * from tbl_center where center_email='" . $email . "'";
    $ru = $con->query($selu);
  
    if ($rowu = $ru->fetch_assoc()) {
        ?>
        <script>
            alert("Can't use this email for user registration...Please try using another email...");
            window.location="UserRegistration.php"
        </script>
        <?php
    }
    $sela = "select * from tbl_admin where admin_email='" . $email . "'";
    $rua = $con->query($sela);
  
    if ($rowa = $rua->fetch_assoc()) {
        ?>
        <script>
            alert("Can't use this email for user registration...Please try using another email...");
            window.location="UserRegistration.php"
        </script>
        <?php
    }

    $sel = "select * from tbl_user where user_email='" . $email . "'";
    $r = $con->query($sel);
  
    if ($row = $r->fetch_assoc()) {
        ?>
        <script>
            alert("Account already exists for this email");
            window.location="UserRegistration.php"
        </script>
        <?php
    } else {
        $insqry = "insert into tbl_user(user_name,user_contact,user_email,user_gender,user_house,user_area,city_id,user_photo,user_password,user_dob,user_doj)
        values('".$name."','".$contact."','".$email."','".$gender."','".$house."','".$area."',".$placeid.",'".$photo."','".$password."','".$dob."',curdate())";
        if ($con->query($insqry)) {
            //Email Code Start
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hobbiomini@gmail.com'; // Your gmail
            $mail->Password = 'itunzneuztnyzahb'; // Your gmail app password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
          
            $mail->setFrom('hobbiomini@gmail.com'); // Your gmail
          
            $mail->addAddress($email);
          
            $mail->isHTML(true);
          
            $mail->Subject = "Welcome to HOBBIO...Follow your passion";
            $mail->Body = "Hello " .$name.",<br>Thank You for choosing HOBBIO .<br>Always gratefull to receive your profile.<br>You can use our website to learn your favorite extracurricular activity.<br>Follow Your Passion.<br><br>Thank you and HAPPY LEARNING...😊💕 ";
            if ($mail->send()) {
                echo "Sended";
            } else {
                echo "Failed";
            }
            //Email Code End
            ?>
            <script>
                alert("Successfully registered..")
                window.location="Login.php"
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Registration Failed..")
                window.location="UserRegistration.php"
            </script>
            <?php
        }
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hobbio::NewUser</title>
    <style>
        body {
            background: linear-gradient(to right, #f65d5f, #f78a33);
            font-family: 'Playfair Display', serif;
            color: white;
        }

        h1 {
            font-size: 36px;
        }

        #container {
            max-width: 1000px;
            background-color: #dab79024;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input, select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            margin-top: 20px;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #f0934b;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: rgb(98, 36, 31, 75%);
        }
    </style>
</head>

<body>
    <center>
        <h1>User Registration</h1>
        <div id="container">
            <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="" 
            onsubmit="return validateForm();">
                <center>
                    <table width="641" rules="none" align="center">
                        <tr>
                            <td width="301" style='font-size: 20px; font-family: "Playfair Display", serif;'>Name:</td>
                            <td width="324" style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtname"></label>
                                <input type="text" name="txtname" id="txtname" required placeholder="Enter Name" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" />
                            </td>
                        </tr>
                        <tr>
                            <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Contact:</td>
                            <td style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtcontact"></label>
                                <input type="text" name="txtcontact" id="txtcontact" required placeholder="Enter Contact Number" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" />
                            </td>
                        </tr>
                        <tr>
                            <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Email:</td>
                            <td style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtemail"></label>
                                <input type="email" name="txtemail" id="txtemail" required placeholder="Enter Email" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" />
                            </td>
                        </tr>
                      
                        <tr>
    <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Gender:</td>
    <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>
        <div style="display: flex; justify-content: space-between;">
            <label style="display: flex; align-items: center;">
                <input type="radio" name="btngender" id="male" required  value="Male" style="margin: 0 5px 0 0;" />
                Male
            </label>
            <label style="display: flex; align-items: center;">
                <input type="radio" name="btngender" id="female"  value="Female" style="margin: 0 5px 0 0;" />
                Female
            </label>
            <label style="display: flex; align-items: center;">
                <input type="radio" name="btngender" id="others" value="Others" style="margin: 0 5px 0 0;" />
                Others
            </label>
        </div>
    </td>
</tr>





    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>House Name:</td>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txthousename"></label>
      <input type="text" name="txthousename" id="txthousename" required placeholder="Enter House Name" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"/>
      </td>
    </tr>
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif ;'>Area:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtarea"></label>
      <input type="text" name="txtarea" id="txtarea" required placeholder="Enter Area" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"/>
      </td>
    </tr>
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>District:</td>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" required  onchange="getPlace(this.value)" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;">
        <option value="">---select---</option> 
       <?php
        $seldistrict="select *from tbl_district";
        $resdis=$con->query($seldistrict);
        while($rowdis=$resdis->fetch_assoc())
        {
        ?>
      
        <option value="<?php echo $rowdis['district_id'] ?>"> <?php echo $rowdis['district_name']?></option> 
        <?php
        }
        ?> 
     
        
        
      </select></td>
    </tr> 
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>City</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="sel_place"></label>
        <select name="sel_place" id="sel_place" required  style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;">
        <option value="">---Select---</option>
      </select>
      </td>
    </tr>
    <tr>
    <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Date Of Birth:</td>
    <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>
    <input type="date" name="txtdob" id="txtdob" required style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"/> </td>
    </tr>
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Photo:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtphoto"></label>
      <input type="file" name="filephoto" id="filephoto" required accept=".jpg, .jpeg, .png, .gif" 
      style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" /> </td>
    </tr>
    
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Password:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" required placeholder="Enter Password" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"
      

      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}" title="Must
...

