<?php 
    include("../Assets/Connection/Connection.php");
    session_start();
    $sellerId = $_SESSION['sid'];

    $sql = "SELECT * FROM tbl_notification WHERE seller_id = ".$sellerId." ORDER BY sent_on DESC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($notification = mysqli_fetch_assoc($result)) {
            

    $seltime = "SELECT sent_on,
CASE
WHEN TIMESTAMPDIFF(SECOND, STR_TO_DATE(sent_on, '%Y-%m-%d %H:%i:%s'), NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(SECOND, STR_TO_DATE(sent_on, '%Y-%m-%d %H:%i:%s'), NOW()), ' seconds ago')
WHEN TIMESTAMPDIFF(MINUTE, STR_TO_DATE(sent_on, '%Y-%m-%d %H:%i:%s'), NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(MINUTE, STR_TO_DATE(sent_on, '%Y-%m-%d %H:%i:%s'), NOW()), ' minutes ago')
WHEN TIMESTAMPDIFF(HOUR, STR_TO_DATE(sent_on, '%Y-%m-%d %H:%i:%s'), NOW()) < 24 THEN CONCAT(TIMESTAMPDIFF(HOUR, STR_TO_DATE(sent_on, '%Y-%m-%d %H:%i:%s'), NOW()), ' hours ago')
WHEN TIMESTAMPDIFF(DAY, STR_TO_DATE(sent_on, '%Y-%m-%d %H:%i:%s'), NOW()) < 7 THEN CONCAT(TIMESTAMPDIFF(DAY, STR_TO_DATE(sent_on, '%Y-%m-%d %H:%i:%s'), NOW()), ' days ago')
WHEN TIMESTAMPDIFF(WEEK, STR_TO_DATE(sent_on, '%Y-%m-%d %H:%i:%s'), NOW()) < 4 THEN CONCAT(TIMESTAMPDIFF(WEEK, STR_TO_DATE(sent_on, '%Y-%m-%d %H:%i:%s'), NOW()), ' weeks ago')
WHEN TIMESTAMPDIFF(MONTH, STR_TO_DATE(sent_on, '%Y-%m-%d %H:%i:%s'), NOW()) < 12 THEN CONCAT(TIMESTAMPDIFF(MONTH, STR_TO_DATE(sent_on, '%Y-%m-%d %H:%i:%s'), NOW()), ' months ago')
ELSE CONCAT(TIMESTAMPDIFF(YEAR, STR_TO_DATE(sent_on, '%Y-%m-%d %H:%i:%s'), NOW()), ' years ago')
END AS time_elapsed
FROM tbl_notification
WHERE notification_id = " . $notification['notification_id'] . "";


$restime = $conn->query($seltime);
$rowTime = $restime->fetch_assoc();
$timeElapsed = $rowTime['time_elapsed'];

           echo" <div class='notification-ui_dd-content'>";

            echo"<div class='notification-list notification-list--unread'>";
               echo" <div class='notification-list_content'>";
                  echo"  <div class='notification-list_img'>";
                  echo"      <i class='". $notification['notification_class']."' style='font-size:40px; color:#0A418B; padding-right:15px'></i>";
                   echo" </div>";
                   echo "<div class='notification-list_detail' >";
                     echo  " <p><b>". $notification['notification_type'] ."</b></p>";
                      echo  "<p class='text-muted'>". $notification['message']."</p>";
                      echo  "<p class='text-muted'><small>". $timeElapsed."</small></p>";
                      echo"</div>";
                      echo"</div>";
                      echo"<div>";
                      echo"<button class='view-button' onclick=DeleteNotification(".$notification['notification_id'].")>clear</button>";
                      echo"</div>";
                      echo"</div>";
                      
                      echo"</div>";
            
        }
    } else {
        echo "No notifications to display.";
    }

?>
