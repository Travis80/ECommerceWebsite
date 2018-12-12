<?php

//Session starts so we have access to the $_SESSION[] array
session_start();
//So all of our files will be in php 
//format so that we can control what
//we display easier and have better
//support for html and javascript
//$_SESSION['cart'] = array();
foreach($_SESSION['cart'] as $item)
{
	if($_REQUEST['rid'] == $item[2])
	{
		$_SESSION['cart'][$item[2]] = null;
	}
}

$_SESSION['page_title'] = "My Cart";

include 'topmenu.php';
include 'pseudoDatabaseFunctions.php';

$r = new Recorder();
$r->startRecording($_SESSION['user_name']);
$r->addClick($_SESSION['page_title']);
/**************************************/

$prod = new ProductHandler();
$prod->makeProducts();
//$val = $prod->getItem($_REQUEST['id']);
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

print('<div class="flex-container" style="width: 50%; margin: 0 auto;">');
	foreach($_SESSION['cart'] as $item)
	{
		if($item == null)
		{
			print('<p>Your cart is empty</p>');
			continue;
		}
		else
		{
			print('<div>');
				print('<p style="float: left"><a class="x-button" href="cart.php?rid='.$item[2].'" class="linknorm">X</a></p>');
				print('<img src="'.$item[5].'" style="max-width: 160px; float: left;">');
				print('<ul style="margin-left: 200px;">');
					print('<li>'.$item[2].'</li>');
					print('<li>'.$item[1].'</li>');
					print('<li>'.$item[0].'</li>');
					print('<li>'.$item[3].'</li>');
				print('</ul>');
			print('</div>');
			print('<div>');
				print('<p style="font-size:400%; float: right">$'.(intval($item[4]) * $item[3]).'.00</p>');
			print('</div>');
		}
	}
print('</div>');
print('<div style="width: 6%; margin: 0 auto;">');
	print('<form method="post" action="confirmorder.php">');
		print('<input type="submit" value="Checkout" class="checkout-button">');
		foreach($_SESSION['cart'] as $item)
		{
			print('<input type="hidden" name="'.$item[2].'" value="'.(intval($item[4]) * $item[3]).'">');
		}
	print('</form>');
print('</div>');

/////////Page contents end here
/**************************************/
include 'footermenu.php';
?>
