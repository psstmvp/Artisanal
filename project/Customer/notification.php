<?php
ob_start();
include('Head.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Notification Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap);

        body {
            font-family: "Roboto", sans-serif;
            background: #EFF1F3;
            min-height: 100vh;
            position: relative;
        }

        .section-50 {
            padding: 50px 0;
        }

        .m-b-50 {
            margin-bottom: 50px;
        }

        .dark-link {
            color: #333;
        }

        .heading-line {
            position: relative;
            padding-bottom: 5px;
        }

        .heading-line:after {
            content: "";
            height: 4px;
            width: 75px;
            background-color: #29B6F6;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .notification-ui_dd-content {
            margin-bottom: 30px;
        }

        .notification-list {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 20px;
            margin-bottom: 7px;
            background: #fff;
            -webkit-box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
        }

        .notification-list--unread {
            border-left: 2px solid #29B6F6;
        }

        .notification-list .notification-list_content {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .notification-list .notification-list_content .notification-list_img img {
            height: 48px;
            width: 48px;
            border-radius: 50px;
            margin-right: 20px;
        }

        .notification-list .notification-list_content .notification-list_detail p {
            margin-bottom: 5px;
            line-height: 1.2;
        }

        .notification-list .notification-list_feature-img img {
            height: 48px;
            width: 48px;
            border-radius: 5px;
            margin-left: 20px;
        }

        .view-button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #175699;
            /* Button background color */
            color: rgb(255, 255, 255);
            /* Button text color */
            text-decoration: none;
            /* Remove underline from the link */
            border: none;
            border-radius: 5px;
            /* Rounded corners */
            cursor: pointer;
        }

        .view-button:hover {
            background-color: #6da1d2;
            /* Button background color on hover */
        }
    </style>
</head>

<body>


    <section class="section-50">
        <div class="container" style="width:750px;">
            <h3 class="m-b-50 heading-line">Notifications <i class="fa fa-bell text-muted"></i></h3>

            <div id="notification-list">

            </div>

        </div>
    </section>

    <script>
        // Function to fetch and display notifications
        function fetchNotifications() {
            $.ajax({
                url: 'fetchnotifications.php', // PHP script to fetch notifications
                method: 'POST', // Or use GET, depending on your implementation
                data: { action: 'fetch_notifications' }, // Optional data to identify the action
                success: function (data) {
                    $('#notification-list').html(data);
                }
            });
        }

        // Fetch notifications on page load
        fetchNotifications();

        // Periodically check for new notifications (every 30 seconds)
        setInterval(fetchNotifications, 30000);

        function DeleteNotification(noid) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxDeleteNotify.php?noid=" + noid,
                success: function (html) {
                    fetchNotifications();

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