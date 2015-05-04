<?php
require_once('connection.php');
session_start();

if(isset($_POST['action']) && $_POST['action'] == "login")
{
  die('process.php - login');
  header('Location: index.php');
  exit();
}

elseif(isset($_POST['action']) && $_POST['action'] == "register")
{

	$errors = array();

	if(empty($_POST['first_name'])){
		$errors[] = "first name can't be blank.";
	}
	if(empty($_POST['last_name'])){
		$errors[] = "last name can't be blank.";
	}
	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$errors[] = "your email is blank or is invalid.";
	}
	if(empty($_POST['password'])){
		$errors[] = "password can't be blank.";
	}
	if(count($errors) > 0)
	{
		//if there are errors, assign the session variable
		$_SESSION['errors'] = $errors;
		header('Location: index.php');
	}
	else{
		// $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) 
		// VALUES ('{$_POST['first_name']}','{$_POST['last_name']}','{$_POST['email']}','{$_POST['password']}',NOW(),NOW() )";
		// run_mysql_query($query);
		$_SESSION['success'] = "Your information was valid!";
		//store info in seesion when session success
	    $_SESSION['email'] = $_POST['email'];
	    $_SESSION['first_name'] = $_POST['first_name'];
	    $_SESSION['last_name'] = $_POST['last_name'];
	    $_SESSION['password'] = $_POST['password'];
	    $_SESSION['confirm_password'] = $_POST['confirm_password'];
	    $_SESSION['birthdate'] = $_POST['birthdate'];
	    header('Location: success.php');
	}
}




?>