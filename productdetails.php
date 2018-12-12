<?php

//Session starts so we have access to the $_SESSION[] array
session_start();
//So all of our files will be in php 
//format so that we can control what
//we display easier and have better
//support for html and javascript

//product name

if(isset($_REQUEST['id']))
{
	//then do some db query with the id to find its name, price and description
	$_SESSION['browse_id'] = $_REQUEST['id']; //without db option
}
if(isset($_REQUEST['color']) && isset($_REQUEST['size']) && isset($_SESSION['browse_id']) && isset($_REQUEST['price']))
{
	//Added to cart
	//header('Location: confirmaddtocart.php');
	$arrItem = array();
	$arrItem[0] = $_REQUEST['color'];
	$arrItem[1] = $_REQUEST['size'];
	$arrItem[2] = $_SESSION['browse_id'];
	$arrItem[3] = $_REQUEST['quantity'];
	$arrItem[4] = $_REQUEST['price'];
	$arrItem[5] = $_REQUEST['path'];
	$arrItem[6] = $_REQUEST['desc'];
	$_SESSION['cart'][$_SESSION['browse_id']] = $arrItem;
	header('Location: index.php');
	//var_dump($_SESSION['cart']);
}

$_SESSION['page_title'] = "Product Details";

include 'topmenu.php';
include 'pseudoDatabaseFunctions.php';

$r = new Recorder();
$r->startRecording($_SESSION['user_name']);
$r->addClick($_SESSION['page_title']);

$prod = new ProductHandler();
$prod->makeProducts();
$val = $prod->getItem($_REQUEST['id']);

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
$price = explode(".", $val->price);
$finalPrice = trim($price[0], "$");

print('</br></br>');
/*print('<div style="float: left; margin-left: 25%;">');
	print('<a href="#preview"><img src="XBox.jpg" style="max-width: 64px;"></a>');
	print('</br>');
	print('<a href="#preview"><img src="XBox.jpg" style="max-width: 64px;"></a>');
	print('</br>');
	print('<a href="#preview"><img src="XBox.jpg" style="max-width: 64px;"></a>');
	print('</br>');
	print('<a href="#preview"><img src="XBox.jpg" style="max-width: 64px;"></a>');
print('</div>');*/
print('<div style="width: 30%; margin: 0 auto">');
	print('<img src="'.$val->path.'" style="min-width: 100%; margin: 0 auto;">');
	print('</br>');
	print('<br>');
	print('<select class="textbox" id="size" style="float: left; min-width: 100px; margin-right: 10px;">');
		print('<option>Small</option>');
		print('<option>Medium</option>');
		print('<option>Large</option>');
	print('</select>');
	print('<select class="textbox" id="color" style="float: left; min-width: 100px; margin-right: 10px;">');
		print('<option>Red</option>');
		//print('<option>Green</option>');
		//print('<option>Blue</option>');
	print('</select>');
	print('<br><br>');
	print('<input class="textbox" type="number" placeholder="quantity" id="quantity">');
	print('</br>');
	print('<p style="font-size: 400%; float: right;">'.$val->price.'</p>');
	print('</br>');
	print('</br>');
	print('<script>
		function sendRequest()
		{
			var color = document.getElementById("color").value;
			var size = document.getElementById("size").value;
			var quantity = document.getElementById("quantity").value;
			if(quantity=="")
			 	alert("Please enter a quantity");
			else
			{
				var url = "productdetails.php?size="+size+"&color="+color+"&quantity="+quantity+"&price="+'.$finalPrice.'+"&path='.rtrim($val->path, "\n").'";
				location.href = url;
			}
		}
	
	</script>');
	//print('<form method="post" action="#" style="margin: 0 auto; text-align: center;">');
		print('<button class="page-button" onclick="sendRequest();" style="border: none; border-radius: 10px; min-width: 120px; min-height: 40px; font-size: 20px;">add to cart</button>');
		//this probably should be in javascript
		//print('<input type="hidden" value="" name="color">');
		//print('<input type="hidden" value="" name="size">');
		//print('<input type="hidden" value="'.$price.'" name="price">');
		//print('<input type="hidden" value="quantity" name="quantity">');
		//print('<form>');
	print('<h3>Product Description</h3>');
	print('<p style="font-size: 25px;">'.$val->desc.'</p>');
print('</div>');

/////////Page contents end here
/**************************************/
include 'footermenu.php';
?>
