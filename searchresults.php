<?php

//Session starts so we have access to the $_SESSION[] array
session_start();

$_SESSION['page_title'] = "Search";
$query = $_POST['search'];
if(!isset($_REQUEST['page_number']) || $_REQUEST['page_number'] < 0)
	$page = 0;
else
	$page = $_REQUEST['page_number'];

include 'topmenu.php';
include 'pseudoDatabaseFunctions.php';

$r = new Recorder();
$r->startRecording($_SESSION['user_name']);
$r->addClick($_SESSION['page_title']);

$prod = new ProductHandler();
$prod->makeProducts();
$val = $prod->getPage($page);
$search = $prod->searchProducts($query);

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
print('<div style="width: 80%; margin: 0 auto;">');
	print('<h2>Search results for "'.$query.'"</h2>');
print('</div>');
print('<div style="float: left; background-color: #ccc; padding-right: 100px; padding-left: 10px; border: 3px solid #bbb;">');
	print('<h3 style="text-align: center;">refine search</h3>');
	if(strtolower($query) == "jeans")
	{
		print('<input type="checkbox" value="Blue">Blue (2)</br>');
	}
	if(strtolower($query) == "tshirt" || strtolower($query) == "t-shirt")
	{
		print('<input type="checkbox" value="Red">Red (1)</br>');
		print('<input type="checkbox" value="Black">Black (1)</br>');
	}
	if(strtolower($query) == "shirt")
	{
		print('<input type="checkbox" value="Red">Red (4)</br>');
		print('<input type="checkbox" value="Black">Black (2)</br>');
		print('<input type="checkbox" value="Blue">Blue (4)</br>');
		print('<input type="checkbox" value="Grey">Grey (2)</br>');
		print('<input type="checkbox" value="Pink">Pink (1)</br>');
		print('<input type="checkbox" value="Purple">Purple (1)</br>');
		print('<input type="checkbox" value="Denim">Denim (1)</br>');
	}
print('</div>');
print('<div style="width: 80%; margin: 0 auto;" class="flex-container">');
	foreach($search as $item)
	{
		print('<div><a href="productdetails.php?id='.$item->id.'" style="text-decoration: none; color: black;"><img style="max-width: 256px; max-height: 256px;" src="'.$item->path.'"/>'.$item->oName.'</a></div>');
	}
print('</div>');
print('<p style="text-align: center;"><a href="searchresults.php?page_number='.($page-1).'" class="linknorm"><<<</a> '.($page+1).' <a href="searchresults.php?page_number='.($page+1).'" class="linknorm">>>></a></p>');
print('</br>');
print('</br>');
print('</br>');
print('</br>');

/////////Page contents end here
/**************************************/
include 'footermenu.php';
?>
