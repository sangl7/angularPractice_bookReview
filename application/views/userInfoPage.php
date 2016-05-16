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
			<a href="/main/addReviewForm">Add Book and Review</a>
			<a href="/main/logout">Logout</a></p>
		</div>
		<div class="clear">
		<div id="userCard">
			<p>User Alias: <?=$userInfo[0]['alias']?></p>
			<p>Name: <?=$userInfo[0]['name']?></p>
			<p>Email: <?=$userInfo[0]['email']?></p>
			<p>Total Reviews: <?=count($userInfo)?></p>
		</div>
		<div id="reviewCard">
			<p>Posted Reviews on the following books:</p>
<?php
		foreach ($userInfo as $value){
			$urlBookTitle = url_title($value['bookTitle']);
			echo
				"<a class='bookLink' href='/main/bookPage/".$urlBookTitle."'>".$value['bookTitle']."</a>";
		}
?>
		</div>
	</div>
</body>