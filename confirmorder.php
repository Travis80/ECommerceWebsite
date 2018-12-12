<?php

//Session starts so we have access to the $_SESSION[] array
session_start();
//So all of our files will be in php 
//format so that we can control what
//we display easier and have better
//support for html and javascript
$_SESSION['page_title'] = "Checkout";
foreach($_POST as $price)
{
	$sum += $price;
}
if($sum == 0)
{
	//print('<script>alert("No items in cart")</script>');
	header("Location: cart.php");
}

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
		function validate()
		{
		    var name = document.getElementById("name");
			var email = document.getElementById("email");
			var address = document.getElementById("address");
			var phone = document.getElementById("phone");
			var zip = document.getElementById("zip");
			var city = document.getElementById("city");
			if (name.value == "") {
			    alert("Name field required");
				return false;
				name.value.setAttribute(border, red);
			} else if (email.value == "") {
			    alert("Email required");
				return false;
	        } else if (address.value == "") {
			    alert("Address required");
				return false;
			} else if (phone.value == "") {
			    alert("Phone number required");
				return false;
			} else if (zip.value == "") {
			    alert("Zip code field");
				return false;
			} else if (city.value == "") {
			    alert("City required");
				return false;
			} else if (phone.value.length < 10){
			    alert("Invalid phone number");
				return false;
			}
		}
	');
print('</script>');

/////////End Javascript functions here
/**************************************/
/////////Page contents goes here

print('<form id="form" method="post" action="ordercomplete.php" onSubmit="return validate();">');
print('<div class="flex-container" style="width: 70%; margin: 0 auto;">');
	print('<div>');
		//Left column
		print('<input class="textbox" id="name" type="text" placeholder="name" placeholder="name" ></br></br>');
		print('<input class="textbox" id="email" type="email" placeholder="email" placeholder="email" ></br></br>');
		print('<input class="textbox" id="phone" type="text" placeholder="phone" placeholder="phone" ></br></br>');
		print('<input class="textbox" id="address" type="text" placeholder="address" placeholder="address" style="max-width: 90px; margin-right: 10px;">');
		print('<input class="textbox" type="text" placeholder="apt" placeholder="apt" style="max-width: 40px;"></br></br>');
		print('<input class="textbox" id="zip" type="number" placeholder="zip" style="max-width: 50px; margin-right: 5px;">');
		print('<input class="textbox" id="city" type="text" placeholder="city" style="max-width: 80px;"></br></br>');
		print('<select class="textbox" style="max-width: 100px; margin-right: 10px;">');
			print('<option>Texas</option>');
			print('<option>Louisiana</option>');
			print('<option>Oklahoma</option>');
			print('<option>Arizona</option>');
			print('<option>New Mexico</option>');
			print('<option>Alabama</option>');
			print('<option>Georgia</option>');
			print('<option>Florida</option>');
			print('<option>Mississippi</option>');
			print('<option>Kansas</option>');
			print('<option>Arkansas</option>');
			print('<option>Nevada</option>');
			print('<option>Tennesse</option>');
		print('</select>');
		print('<select class="textbox" style="max-width: 120px;">');
			print('<option>United States</option>');
			print('<option>United Kingdom</option>');
			print('<option>Canada</option>');
			print('<option>Mexico</option>');
			print('<option>Spain</option>');
			print('<option>Germany</option>');
			print('<option>France</option>');
			print('<option>Japan</option>');
			print('<option>China</option>');
			print('<option>Australia</option>');
		print('</select>');
	print('</div>');
	print('<div>');
		print('<input class="textbox" type="number" placeholder="credit card number" style="max-width: 256px;"></br></br>');
		print('<select class="textbox" style="max-width: 120px; margin-right: 10px;">');
		for($i = 1; $i < 32; $i++)
			print("<option>$i</option>");
		print('</select>');
		print('<select class="textbox" style="max-width: 100px; margin-right: 10px;">');
			print("<option>January</option>");
			print("<option>February</option>");
			print("<option>March</option>");
			print("<option>April</option>");
			print("<option>May</option>");
			print("<option>June</option>");
			print("<option>July</option>");
			print("<option>August</option>");
			print("<option>September</option>");
			print("<option>October</option>");
			print("<option>November</option>");
			print("<option>December</option>");
		print('</select>');
		print('<input class="textbox" type="number" placeholder="CSV" style="margin-top: 20px; max-width: 45px;">');
		print('<p style="text-align: right;">subtotal: $'.$sum.'.00</p>');
		print('<p style="text-align: right;">shipping: $4.99</p>');
		print('<p style="text-align: right;"><strong>Total: $'.($sum + 4.99).'</strong></p>');
		print('<input type="checkbox" style="text-align: left;"> create new account?</br>');
		print('<input type="checkbox" style="text-align: left;"> I have read the ToS</br>');
		print('<input class="checkout-button" type="submit" value="Complete Order" style="margin-top: 20px; border: none; border-radius: 10px; padding: 10px;">');
		//Right column
		//need more clarification
	print('</div>');
print('</div>');
print('</form>');

/////////Page contents end here
/**************************************/
include 'footermenu.php';
?>
