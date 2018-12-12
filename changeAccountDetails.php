<?php

session_start();

$_SESSION['page_title'] = "Account";

if(!isset($_SESSION['loggedin']))
{
	header('Location: signin.php');
}





include 'topmenu.php';
	print('<div style="margin: 0 auto; width: 60%;">');
		print('<form method="post" action="account.php">');
			print('<label>Account Details<label></br></br>');
			print('<input type="text" placeholder="name" name="newname"><br/></br>');
			print('<input type="text" placeholder="email" name="newemail"><br/></br>');
			print('<input type="text" placeholder="address" name="newaddress"><br/></br>');
			print('<input type="submit" value="Change Account Details" style="min-width: 100px; border-radius: 10px; border: none; padding: 4px;"><br/>');
		print('</form>');
	print('</div>');
include 'footermenu.php';

?>
