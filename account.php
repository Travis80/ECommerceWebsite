<?php

//Session starts so we have access to the $_SESSION[] array
session_start();
//So all of our files will be in php 
//format so that we can control what
//we display easier and have better
//support for html and javascript

$_SESSION['page_title'] = "Account";


if(!isset($_SESSION['loggedin']))
{
	header('Location: signin.php');
}if(isset($_POST['newname'])){
	$_SESSION['name'] = $_POST['newname'];
}if(isset($_POST['newemail'])){
	$_SESSION['email'] = $_POST['newemail'];
}if(isset($_POST['newaddress'])){
	$_SESSION['address'] = $_POST['newaddress'];
}

include 'topmenu.php';
include 'pseudoDatabaseFunctions.php';

$r = new Recorder();
$r->startRecording($_SESSION['user_name']);
$r->addClick($_SESSION['page_title']);
/**************************************/
/////////Declare Javascript functions here

print('<script type="text/javascript">');
	print('
		function example(parameters)
		{
			//Add code in here
		}
	');
print('</script>');

/////////End Javascript functions here
/**************************************/
/////////Page contents goes here
print('<div style="margin: 0 auto; width: 60%;">');
	$username = $_SESSION['user_name'];
	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
	$address = $_SESSION['address'];

	echo "<h2>Account Information</h2>";
	echo "<img src='/img/defaultaccount.png'>";
	echo "<p>Username: $username</p>";
	echo "<p>Name: $name</p>";
	echo "<p>Email: $email</p>";
	echo "<p>Address: $address</p>";

print('</div>');
//Need more clarification on how it should be represented
print('<div style="margin: 0 auto; width: 60%;">');
	print('<h2>Orders</h2>');
	print('<div>');
		foreach($_SESSION['order'] as $item)
		{
			print('<img src="'.$item[5].'" style="max-width: 64px;">');
		}
		print('<p>Shipping details</p>');
		print('<p>Billing details</p>');
	print('</div>');
	print('</br>');
	print('<a href="#billingdeets"><button style="border: none; border-radius: 10px; padding: 10px; float: left; min-width: 192px;">billing/shipping</button></a>');
	print('<a href="changeAccountDetails.php"><button style="border: none; border-radius: 10px; padding:10px; float: center; min-width:192px;">change account details</button></a>');
	print('<a href="changepassword.php"><button style="border: none; border-radius: 10px; padding: 10px; float: right; min-width: 192px;">change password</button></a>');
print('</div>');
print('</br>');
print('</br>');
print('</br>');

/////////Page contents end here
/**************************************/
include 'footermenu.php';
?>
