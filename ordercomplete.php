<?php

//Session starts so we have access to the $_SESSION[] array
session_start();
//So all of our files will be in php 
//format so that we can control what
//we display easier and have better
//support for html and javascript

$_SESSION['page_title'] = "Order Completed";
foreach($_SESSION['cart'] as $item)
	$_SESSION['order'][] = $item;
$_SESSION['cart'] = array();

include 'topmenu.php';
include 'pseudoDatabaseFunctions.php';

$r = new Recorder();
$r->startRecording($_SESSION['user_name']);
$r->addClick($_SESSION['page_title']);
/**************************************/
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
	print('<p>Your order has been received and will be processed soon</p><br>');
print('</div>');
print('<div class="flex-container" style="width: 80%; margin: 0 auto;">');
	print('<button style="border: none; border-radius: 10px; padding: 12px;"><a href="index.php" style="text-decoration: none; color:#000;">Return to home</a></button>');
print('</div>');
/////////Page contents end here
/**************************************/
include 'footermenu.php';
?>
