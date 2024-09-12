<?php

//submit_rating.php
include("../Connection/Connection.php");
session_start();
if (isset($_POST["add"])) {
	
	 $ins = "INSERT INTO tbl_rating(customer_id,rating_value,rating_comment,rating_date,cart_id)VALUES('" . $_SESSION['uid'] . "','" . $_POST["rating_data"] . "','" . $_POST["user_review"] . "',NOW(),'" .$_POST["cart_id"]. "')";

	if ($conn->query($ins)) {

		$average_rating = 0;
		$total_review = 0;
		$five_star_review = 0;
		$four_star_review = 0;
		$three_star_review = 0;
		$two_star_review = 0;
		$one_star_review = 0;
		$total_user_rating = 0;
		$review_content = array();

		$query1 = "SELECT * FROM tbl_rating r inner join tbl_cart  ca on  ca.cart_id=r.cart_id where ca.product_id ='" .$_POST["product_id"] . "' ORDER BY rating_id DESC";

		$result1 = $conn->query($query1);


		while ($row1 = $result1->fetch_assoc()) {


			if ($row1["rating_value"] == '5') {
				$five_star_review++;
			}

			if ($row1["rating_value"] == '4') {
				$four_star_review++;
			}

			if ($row1["rating_value"] == '3') {
				$three_star_review++;
			}

			if ($row1["rating_value"] == '2') {
				$two_star_review++;
			}

			if ($row1["rating_value"] == '1') {
				$one_star_review++;
			}

			$total_review++;

			$total_user_rating = $total_user_rating + $row1["rating_value"];

		}


		if ($total_review == 0 || $total_user_rating == 0) {
			$average_rating = 0;
		} else {
			$average_rating = $total_user_rating / $total_review;
		}

		?>
		<p align="center" style="color:#F96;font-size:20px;padding: 30px;">
			<?php
			if ($average_rating == 5 || $average_rating == 4.5) {
				?>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<?php
			}
			if ($average_rating == 4 || $average_rating == 3.5) {
				?>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<?php
			}
			if ($average_rating == 3 || $average_rating == 2.5) {
				?>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<?php
			}
			if ($average_rating == 2 || $average_rating == 1.5) {
				?>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<?php
			}
			if ($average_rating == 1) {
				?>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<?php
			}
			if ($average_rating == 0) {
				?>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
				<?php
			}
			?>
			<br> <span>Based on
				<?php echo "(" . $total_review . ")" ?>
			</span>

		</p>
		<?php

	} else {
		echo "Your Review & Rating Insertion Failed";
	}

}
if (isset($_POST["check"])) {

	$ins = "INSERT INTO tbl_rating(customer_id,rating_value,rating_comment,rating_date,cart_id)VALUES('" . $_SESSION['uid'] . "','" . $_POST["rating_data"] . "','" . $_POST["user_review"] . "',NOW(),'" .$_POST["cart_id"]. "')";

	if ($conn->query($ins)) {

		echo "Your Review & Rating Inserted successfully";

	} else {
		echo "Your Review & Rating Insertion Failed";
	}

}
if (isset($_POST["action"])) {

	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM tbl_rating r inner join tbl_cart  ca on  ca.cart_id=r.cart_id  inner join tbl_customer c on r.customer_id=c.customer_id where ca.product_id = '" . $_POST["pid"] . "'  ORDER BY r.rating_id DESC
	";

	$result = $conn->query($query);

	while ($row = $result->fetch_assoc()) {
		$review_content[] = array(
			'user_name' => $row["cus_name"],
			'user_review' => $row["rating_comment"],
			'rating' => $row["rating_value"],
			'datetime' => $row["rating_date"]
		);

		if ($row["rating_value"] == '5') {
			$five_star_review++;
		}

		if ($row["rating_value"] == '4') {
			$four_star_review++;
		}

		if ($row["rating_value"] == '3') {
			$three_star_review++;
		}

		if ($row["rating_value"] == '2') {
			$two_star_review++;
		}

		if ($row["rating_value"] == '1') {
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["rating_value"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating' => number_format($average_rating, 1),
		'total_review' => $total_review,
		'five_star_review' => $five_star_review,
		'four_star_review' => $four_star_review,
		'three_star_review' => $three_star_review,
		'two_star_review' => $two_star_review,
		'one_star_review' => $one_star_review,
		'review_data' => $review_content
	);

	echo json_encode($output);

}

?>