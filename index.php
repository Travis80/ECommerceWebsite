<?php
//comment
//Session starts so we have access to the $_SESSION[] array
session_start();
//So all of our files will be in php 
//format so that we can control what
//we display easier and have better
//support for html and javascript
$_SESSION['page_title'] = "Home";
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

//The class is created in the head and since topmenu.php is included, its like its combined
//with the file so you can call functions and elements within it with php and javascript
//but not because javascipt has scope to the file, but because its within the same page
//was flex-container
print('<div style="width: 80%; margin: 0 auto;" class="flex-container2">');
	//Just fills out the divs
	//for($i = 1; $i <= 50; $i++)
	
	foreach($val as $item)
	{
		print('<div class="image-container"><a href="productdetails.php?id='.$item->id.'" class="linknorm"><img style="max-width: 256px; max-height: 228px;" src="'.$item->path.'"/><br><div class="item-name">'.$item->oName.'</div></a></div>');
	}
print('</div>');
print('<p style="text-align: center;"><a class="page-link" href="index.php?page_number='.($page-1).'" class="linknorm"><<<</a><a class="page-number"> '.($page+1).' </a><a class="page-link" href="index.php?page_number='.($page+1).'" class="linknorm">>>></a></p>');

/////////Page contents end here
/**************************************/
include 'footermenu.php';
?>
