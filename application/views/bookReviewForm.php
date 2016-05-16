<!DOCTYPE html>
<html>
<head>
	<title>Add Book and Review</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/master.css')?>"/>
</head>
<body>
	<div id="container">
		<div id="navBar">
			<p class="pull-right">
				<a href="/main/review_Home">Home</a>
				<a href="/main/logout">Logout</a>
			</p>
		</div>
		<div class="clear">
		</div>
		<div id="addForm">
			<h4>Add a New Book Title and a Review</h4>
			<form action="/main/addBookReview" method="post">
				<p>Book Title: <input type="text" name="title" id="bookTitle"/></p>
				<p>Author:</p>
				<p class="inputLabel">Choose from the list
					<select name="authorNameSelected" id="selectAuthor">
						<option>Choose One...</option>
<?php
						foreach($reviews as $value){
							echo '<option value="'.$value['author'].'">'.$value['author'].'</option>';
						}
						
?>
					</select>
				</p>
				<p class="inputLabel">Or add a new author: 
					<input type="text" name="authorName" id="inputAuthor"/>
				</p>
				<p>Review: <textarea name="review"></textarea>
				</p>
				<p>Rating
					<select name="rating">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</p>
				<input type="submit" value="Add Book And Review"/>
			</form>
		</div>
	</div>
</body>
</html>