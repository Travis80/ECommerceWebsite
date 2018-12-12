<?php

session_start();

$_SESSION['page_title'] = "Login";
include 'pseudoDatabaseFunctions.php';

$r = new Recorder();
$r->startRecording($_SESSION['user_name']);
$r->addClick($_SESSION['page_title']);

if(isset($_POST['username']) && isset($_POST['password']))
{
	$check = new UserHandler();
	$newUser = $check->checkUser($_POST['username'], $_POST['password']);
	if($newUser)
	{
		$_SESSION['loggedin'] = true;
		//set username variable
		$_SESSION['user_name'] = $_POST['username'];
		if($_SESSION['user_name'] == "travis")
			$_SESSION['name'] = "Travis Woods";
		if($_SESSION['user_name'] == "jonathan")
			$_SESSION['name'] = "Jonathan Guzman";
		if($_SESSION['user_name'] == "matthew")
			$_SESSION['name'] = "Matthew Weigel";
		header('Location: index.php');
	}
	else
	{
		header('Location: signin.php');
	}
}
include 'topmenu.php';
	print('<div style="margin: 0 auto; width: 60%;">');
		print('<form method="post" action="">');
			print('<label>Account details<label></br></br>');
			print('<input class="textbox" type="text" placeholder="username" name="username"><br/></br>');
			print('<input class="textbox" type="password" placeholder="password" name="password"><br/></br>');
			print('<input class="page-button" type="submit" value="Login" style="min-width: 100px; border-radius: 10px; border: none;"><br/>');
		print('</form>');
		print('</br>');
		print('<form method="post" action="register.php">');
			print('<input class="page-button" type="submit" value="Register" style="min-width: 100px; border-radius: 10px; border: none;"><br/>');
		print('</form>');
	print('</div>');
include 'footermenu.php';

?>
