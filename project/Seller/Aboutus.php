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
    <title>About us</title>
    <link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />

</head>

<body>
    <div class="content-wrapper"  style="background-size: cover;background-repeat: no-repeat;
	background-image: url('../Assets/File/Admin/bg6.jpg');">
        <center>
            <div class="col-lg-7 grid-margin stretch-card" >
                <div class="card"  style=" background-color: rgba(105, 135, 185, 0.5);">
                    <div class="card-body">
                        <h4 class="card-title" style="color:#234A6F;font-size:23px;">About Us</h4>
                    <span style="color:white;">
                        The Objective of Artisanal is to support small handicraft business and make a website that is
                        fully dedicated to handmade
                        products which attracts customer who like or prefer unique handmade products over machine-made
                        mass-produced products. Artisanal sells a wide range of handmade products like paintings, bags,
                        wallets, hats, key chains, cups, home decors etc. And simple cloths like scarves, mufflers,
                        sweaters, Beanies etc. Artisanal wants to give an amazing online shopping experience to everyone
                        who visits the site.</span>

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