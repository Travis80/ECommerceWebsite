<?php

//Session starts so we have access to the $_SESSION[] array
session_start();
//So all of our files will be in php 
//format so that we can control what
//we display easier and have better
//support for html and javascript


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

$_SESSION = array();
session_destroy();

header('Location: index.php');

/////////Page contents end here
/**************************************/
include 'footermenu.php';
?>
