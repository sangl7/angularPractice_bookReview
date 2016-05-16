<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/master.css')?>"/>
</head>
<body>
	<div id="container">
		<div id="header">
			<p class="pull-right"><a href="/main/review_Home">Home</a>
			<a href="/main/logout">Logout</a></p>
		</div>
		<div class="clear">
		</div>
		<div>
			<h2><?=$reviews[0]['bookTitle']?></h2>
			<h3>Author: <?=$reviews[0]['author']?></h3>
			<div id="leftPane">
				<h3>Reviews</h3>
<?php
			foreach($reviews as $value)
		 		{
		 			echo 
		 				"<div class='eachReview'>
		 					<p>Rating: ";
		 			for ($i = 0; $i < $value['rating']; $i++){
		 				echo '★';
		 			};
		 			for ($i = 0; $i < 5 - $value['rating']; $i++){
		 				echo '☆';
		 			}
		 					
		 			echo "</p>
		 					<p><a href='/main/userInfo/".$value['user_id']."'>".$value['name']."</a> says: ".$value['review']."</p>";

		 			echo "<p>Posted On ".$value['created']."</p>";
		 			if ($this->session->userdata('id') === $value['user_id']){
		 				echo "<p><a href='/main/deleteReview/".$value['id']."'>Delete this review</p>";
		 			};
		 			echo "</div>";
		 				
		 		}
?>
			</div>
			<div id="rightPane">
				<form action="/main/addBookReview" method="post">
					<p class="boldTitle">Add a review: </p>
					<textarea id="reviewBox" name="review"></textarea>
					
					<p>Rating
						<select name="rating">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					Stars</p>
					<input type="submit" value="Add Book And Review"/>
					<input type="hidden" name="title" value="<?=$reviews[0]['bookTitle']?>">
					<input type="hidden" name="authorName" value="<?=$reviews[0]['author']?>">
				</form>
			</div>
		</div>
	</div>
</body>
</html>