<?php

//Session starts so we have access to the $_SESSION[] array
session_start();
//So all of our files will be in php 
//format so that we can control what
//we display easier and have better
//support for html and javascript

if(isset($_POST['f_name'])) $fname = $_POST['f_name'];
if(isset($_POST['l_name'])) $lname = $_POST['l_name'];
if(isset($_POST['pass'])) $pass = $_POST['pass'];


include 'topmenu.php';
include 'pseudoDatabaseFunctions.php';

$r = new Recorder();
$r->startRecording($_SESSION['user_name']);
$r->addClick($_SESSION['page_title']);
/**************************************/

if(isset($_POST['submit']))
{
	$newUser = new UserHandler();
	$newUser->addUser($fname, $pass);
	$_SESSION['loggedin'] = true;
	$_SESSION["user_name"] = $fname;
	$_SESSION['name'] = $fname." ".$lname;
	header("Location: index.php");
}
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

print('<div class="flex-container" style="width: 80%; margin: 0 auto;">');
	print('<form method="post" action="register.php">');
		print('<input class="textbox" type="text" placeholder="First Name" name="f_name"></br></br>');
		print('<input class="textbox" type="text" placeholder="Last Name" name="l_name"></br></br>');
		print('<input class="textbox" type="password" placeholder="Password" name="pass"></br></br>');
		print('<input class="textbox" type="password" placeholder="Confirm Password" name="c_pass"></br></br>');
		print('<input class-"page-button" type="hidden" value="1" name="submit"></br></br>');
		print('<input class="page-button" type="submit" value="Register" name="register" style="border: none; border-radius: 10px; padding: 12px;"></br>');
	print('</form>');
print('</div>');

/////////Page contents end here
/**************************************/
include 'footermenu.php';
?>
