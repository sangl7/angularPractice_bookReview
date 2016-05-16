<!DOCTYPE html>
<html>
<head>
	<title>Book Review</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/master.css')?>"/>
</head>
<body>
	<div id="container">
		<div id="header">
			<p>Welcome, <?=$this->session->userdata('name');?>!</p>
			<p class="pull-right"><a href="/main/addReviewForm">Add Book and Review</a>
			<a href="/main/logout">Logout</a></p>
		</div>
	</div>
	<div id="recentReview">
		<h4>Recent Book Reviews</h4>
		 <?php

		 		foreach($reviews as $value)
		 		{
		 			$urlBookTitle = url_title($value['bookTitle']);
		 			echo 
		 				"<div>
		 					<a href='/main/bookPage/".$urlBookTitle."'>".$value['bookTitle']."</a>
		 					<p>Rating: ";
		 			for ($i = 0; $i < $value['rating']; $i++){
		 				echo '★';
		 			};
		 			for ($i = 0; $i < 5 - $value['rating']; $i++){
		 				echo '☆';
		 			}
		 					
		 			echo "</p>
		 					<p><a href='/main/userInfo/".$value['user_id']."'>".$value['name']."</a> says: ".$value['review']."</p>
		 					<p class='dateLine'>".$value['created']."
		 					</p></div>";

		 		}
		 ?>
	</div>
	<div id="bookLists">
	</div>
</body>
</html>