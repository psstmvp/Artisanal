<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Bar Chart Report</title>
	<link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />

    <!-- Include necessary CSS and JavaScript libraries -->

    <script src="../Assets/JQ/jQuery.js "></script>
    <script src="../Assets/Admin/vendors/chart.js"></script>
</head>
<body>
<div class="content-wrapper">
    <center>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" >Report on Followers of Sellers</h4>
                <canvas id="barChart2"  height="200"></canvas>
            </div>
        </div>
    </div>
    </center>
</div>
    </body>
    <script>
        $(function() {
            'use strict';

            var xValues = [
                <?php
                $sel = "select * from tbl_seller where sell_ver_status=1";
                $row = $conn->query($sel);
                while ($data = $row->fetch_assoc()) {
                    echo "'" . $data["sell_name"] . "',";
                }
                ?>
            ];

            var yValues = [
                <?php
                $sel = "select * from tbl_seller where sell_ver_status=1";
                $row = $conn->query($sel);
                while ($data = $row->fetch_assoc()) {
                    $sel1 ="select count(*) as id from tbl_follow where seller_id = '".$data["seller_id"]."'";
                    $row1 = $conn->query($sel1);
                    while ($data1 = $row1->fetch_assoc()) {
                        echo $data1["id"] . ",";
                    }
                }
                ?>
            ];
            function generatePastelBrightColorPalettes(numColors) {
  const fillColors = [];
  const borderColors = [];
  const colorStep = 360 / numColors;
  for (let i = 0; i < numColors; i++) {
    const hue = Math.round(i * colorStep);
    
    // Generate pastel RGB values for bright colors
    const saturation = 50 + Math.random() * 30; // Adjust the saturation range
    const lightness = 65 + Math.random() * 30;  // Adjust the lightness for pastel effect

    const fillColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 0.65)`; // 0.5 alpha value for fill
    const borderColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 1)`;  // 1 alpha value for border

    fillColors.push(fillColor);
    borderColors.push(borderColor);
  }
  return { fillColors, borderColors };
}

// Call the function with the number of colors:
const { fillColors, borderColors } = generatePastelBrightColorPalettes(xValues.length);

            var data = {
                labels: xValues,
                datasets: [{
                    label: '# of followers',
                    data: yValues,
                    backgroundColor:fillColors,
                    borderColor:borderColors,
                    borderWidth: 1,
                    fill: false
                }]
            };

            if ($("#barChart2").length) {
                var barChartCanvas = $("#barChart2").get(0).getContext("2d");
                var barChart = new Chart(barChartCanvas, {
                    type: 'bar',
                    data: data,
                    options: {
                        // You can configure chart options here
                    }
                });
            }
        });
    </script>

    <?php
    include("Foot.php");
    ob_flush();
    ?>

</html>
