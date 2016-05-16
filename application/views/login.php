<!DOCTYPE html>
<html>
<head>
	<title>Login / Register</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/master.css')?>"/>
</head>
<body>
<div id="container">
	<h2>Welcome!</h2>
	<div id="register">
		<h3>Register</h3>
		<form action="/main/addNewUser" method="post">
			<p>Name: <input type="text" name="name"/></p>
			<p>Alias: <input type="text" name="alias"/></p>
			<p>Email: <input type="text" name="email"/></p>
			<p>password: <input type="password" name="password"/></p>
			<p id="pwWarn">Password should be at least 8 characters</p>
			<p>Confirm PW: <input type="password" name="passwordConf"/></p>
			<input type="submit" value="Register">
		</form>
	</div>
	<div id="login">
		<h3>Login</h3>
		<form action="/main/login" method="post">
		<p>Email: <input type="text" name="email"/></p>
		<p>Password: <input type="password" name="password" /></p>
		<input type="submit" value="Login">
	</div>
	<div id="errors">
<?php
	if (isset($errors)){
		echo $errors;
	}
?>
	</div>
</div>
</body>
</html>