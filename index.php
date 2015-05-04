<?php
require_once('connection.php');
session_start();


if(isset($_SESSION['errors']))
{
	foreach($_SESSION['errors'] as $error)
	{
		echo "<p>" . $error . "</p>";
	}
	session_unset();
}
?>

<html>
<head>
	<title>form validation</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>
	<h2>Login</h2>
	<form action="process.php" method="post">
		<input type="hidden" name="action" value="login">
		<input type="text" name="email" placeholder="email">
		<input type="password" name="password" placeholder="password">
		<input type="submit" value="Submit">
	</form>

	<h2>Register</h2>
	<form action="process.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="action" value="register">
		<input type="text" name="first_name" placeholder="first name">
		<input type="text" name="last_name" placeholder="last name">
		<input type="text" name="email" placeholder="email">
		<input type="password" name="password" placeholder="password">
		<input type="password" name="confirm_password" placeholder="confirm password">
		<input type="date" name="birthdate" placeholder="birthdate">
		<input type="file" name="profile">
		<input type="submit" value="Submit">
	</form>
</body>
</html>