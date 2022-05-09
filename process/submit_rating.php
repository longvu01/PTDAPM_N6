<?php

$connect = new PDO("mysql:host=localhost;dbname=ptpm_db", "root", "");

if(isset($_POST["rating_data"])){

	$data = array(
		':user_name'	=> $_POST["user_name"],
		':user_rating' => $_POST["rating_data"],
		':user_review' => $_POST["user_review"],
		':current_index'	=> $_POST["current_index"],
		':datetime' => time()
	);

	$sql = "
	INSERT INTO review_table 
	(cid,user_name, user_rating, user_review, datetime) 
	VALUES (:current_index, :user_name, :user_rating, :user_review, :datetime)
	";

	$statement = $connect->prepare($sql);

	$statement->execute($data);

	echo "Bạn đã đánh giá thành công!";
}

if(isset($_POST["action"])){

	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$current_index = $_POST['current_index'];

	$sql = "SELECT * FROM review_table WHERE cid = " .$current_index ." ORDER BY review_id DESC";

	$result = $connect->query($sql, PDO::FETCH_ASSOC);

	foreach($result as $row){
		$review_content[] = array(
			'user_name'	 =>	$row["user_name"],
			'user_review' => $row["user_review"],
			'rating' =>	$row["user_rating"],
			'datetime' => date('l, F d y h:i:s', $row["datetime"])
		);

		if($row["user_rating"] == '5'){
			$five_star_review++;
		}

		if($row["user_rating"] == '4'){
			$four_star_review++;
		}

		if($row["user_rating"] == '3'){
			$three_star_review++;
		}

		if($row["user_rating"] == '2'){
			$two_star_review++;
		}

		if($row["user_rating"] == '1'){
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating += $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating' =>	number_format($average_rating, 1),
		'total_review' => $total_review,
		'five_star_review' => $five_star_review,
		'four_star_review' => $four_star_review,
		'three_star_review' => $three_star_review,
		'two_star_review' => $two_star_review,
		'one_star_review' => $one_star_review,
		'review_data'	 =>	$review_content
	);

	echo json_encode($output);

}
