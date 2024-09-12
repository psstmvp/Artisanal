<?php   
 session_start();  
 $cusid=$_SESSION['uid'];

include("../Assets/Connection/Connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	
require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

	$cusqry="select *from tbl_customer where customer_id='".$cusid."'";
	$cusres=$conn->query($cusqry);
	if($cusrow=$cusres->fetch_assoc())
	
	{ $email=$cusrow['cus_email'];
	  $cusname=$cusrow['cus_name'];
	  
  				 //Email Code Start
				$mail = new PHPMailer(true);
		
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'artisanalhelp@gmail.com'; // Your gmail
			$mail->Password = 'lzjtzxpdnkkflamj'; // Your gmail app password
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
		  
			$mail->setFrom('artisanalhelp@gmail.com'); // Your gmail
		  
			$mail->addAddress($email);
		  
			$mail->isHTML(true);
		  
			$mail->Subject = "Order Received";
			$mail->Body ="Hello ".$cusname.",<br> Your order was received. The details and updates can be viewed in our website. Please kindly wait for your updates. <br> Thank you ";
		  if($mail->send())
		  {
			?>
			<script>   
            window.location="MyOrder.php";
        </script>
		<?php
		  }
		  else
		  {
			echo "Failed";
		  }
}
//Email Code End
?>