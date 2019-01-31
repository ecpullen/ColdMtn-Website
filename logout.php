<?php
	session_start();
 	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- File: logout.php
	Ethan Pullen & Dhruv Joshi
	2/2019-->
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
	<fieldset id="Login">
		<legend>Login</legend>
		<form id="loginform" action="admin.php" method="POST">
			<p>Username:</p>
			<input type="text" name="username" placeholder="enter your username" required>
			<p>Password:</p>
			<input type="password" name="password" placeholder="enter your password" required>
			<br/>
			<button type="submit">Enter</button>
		</form>
	</fieldset>
</body>
</html>