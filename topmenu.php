<?php

session_start();
print('<!DOCTYPE html>');

print('
	<head>
	<!-This is a comment
	Everything for the header will go here
	like the title and stylesheet to include
	-->
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<title>UI Project</title>
	<style>
		body {
			background-color: #eaeafa;
			background-image: url("../img/background.jpg");
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
			font-family: "Oswald";
		}
		.page-number{
			font-size: 200%;
		}
		.page-link {
			font-size: 200%;
			color: #000000;
			text-decoration: none;
			transition: 0.2s;
		}
		.page-link:hover {
			color: #f15a22;
		}
		a.navbar {
			float: left;
			display: block;
			text-decoration: none;
			color: white;
			background-color: green;
			padding: 10px;
		}
		.flex-container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}
		.flex-container > div {
			width: 256px;
			height: 256px;
			text-align: center;
		}
		.flex-container2 {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}
		.flex-container2 > div {
			max-width: 256px;
			max-height: 256px;
			text-align: center;
			transition: 0.2s
		}
		.flex-container2 > div:hover{
			transform: scale(1.2);
		}
		.flex-checkout {
			display: flex;
			flex-wrap: wrap;
			justify-content: left;
		}
		.flex-checkout > div {
			width: 256px;
			height: 256px;
			text-align: center;
		}
		.status {
			float:right;
			text-decoration: none;
			color: #000000;
		}
		.linknorm {
			text-decoration: none;
			color: black;
		}
		.textbox {
			border-radius: 10px;
			border: 5px solid transparent;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 10px;
			padding-left: 10px;
			transition: 0.2s
		}
		.textbox:active {
			border: 5px solid #0c2340;
		}
		.page-title {
			color: #ffffff;
			text-align: center;
			background-color: #3b00b3;
			margin-left: -200px;
			margin-right: -200px;
			margin-top: -10px;
			padding-top: 20px;
			padding-bottom: 20px;
			border-bottom: 5px solid #f15a22;
		}
		.logo {
			height: 60px;
		}
		.image-container {
			margin-bottom: 30px;
			padding-bottom: 30px;
			margin-left: 12px;
			margin-right: 12px;
			border-radius: 5px;
			border: 5px solid #0c2340;
			transition: 0.5s;
		}
		.image-container:hover {
			border: 5px solid #f15a22;
		}
		.page-button {
			background-color: #000000;
			border: none;
			color: #ffffff;
			border-radius: 10px;
			padding: 12px;
			transition: 0.2s;
		}
		.page-button:hover {
			background-color: gray;

		}
		.checkout-button {
			background-color: #000000;
			color: #ffffff;
			transition: 0.2s;
			border-radius: 10px;
			padding-top: 10px;
			padding-bottom: 10px;
			padding-left: 14px;
			padding-right: 14px;
			border: none;
		}
		.checkout-button:hover {
			transform: scale(1.2);
		}
		.search-bar {
			border-radius: 10px;
			border: none;
			padding: 12px;
			margin-right: 10px;
		}
		.x-button {
			padding-left: 10px;
			padding-right: 10px;
			text-decoration: none;
			margin-right: 20px;
			font-weight: 800%;
			background-color: #000000;
			color: #ffffff;
			border-radius: 5px;
			transition: 0.2s;
		}
		.x-button:hover {
			transform: scale(1.5);
			background-color: red;
			color: #000000;
		}
		.item-name {
			font-size: 200%;

		}
	</style>
	</head>
	');
	print('<body>');
	print('<div style="width: 80%; height: 10em; text-align: center; margin: 0 auto;">');
		print('<a href="index.php" style="text-decoration: none; color: black;"><p class="page-title"><img class="logo" src="../img/logo.png"> </p></a>');
		if($_SESSION['page_title'] == "Account")
		{
			print('<a href="signout.php" class="status">Signout<a>');
		}
		else if($_SESSION['page_title'] == "Login")
		{
			print('<a href="signin.php" class="status">Account<a>');
		}
		else if(isset($_SESSION['loggedin']))
		{
			print('<a href="account.php" class="status">Account<a>');
		}
		else {
			print('<a href="signin.php" class="status">Sign in here<a>');
		}
		print('</br>');
		print('<a href="cart.php" class="status">Cart<a>');
		print('<h1 style="text-align: left; float: left;">'.$_SESSION['page_title'].'<h1>');
		print('<form action="searchresults.php" method="post" style="float: right;">');
			print('<input type="text" placeholder="looking for something?" name="search" class="search-bar">');
			print('<input type="submit" value="search" class="page-button">');
		print('</form>');
	print('</div>');
	print('<br><br><br><br>')
?>
