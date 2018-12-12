<?php

session_start();

$_SESSION['page_title'] = "Account";

if(!isset($_SESSION['loggedin']))
{
	header('Location: signin.php');
}

include 'topmenu.php';
	print('<div style="margin: 0 auto; width: 60%;">');
		print('<form method="post" action="">');
			print('<label>Change Password<label></br></br>');
			print('<input type="password" placeholder="old password" name="oldpass"><br/></br>');
			print('<input type="password" placeholder="new password" name="newpass"><br/></br>');
			print('<input type="submit" value="Change Password" style="min-width: 100px; border-radius: 10px; border: none; padding: 4px;"><br/>');
		print('</form>');
	print('</div>');
include 'footermenu.php';

?>
