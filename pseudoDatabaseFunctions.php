<?php

class ProductHandler
{

	public $products;
	
	function makeProducts()
	{
		$this->products = array();
		$productFile = fopen("products_wip.txt", "r") or die("Unable to retrieve products");
		while(!feof($productFile))
		{
			$id = fgets($productFile);
			$pName = fgets($productFile);
			$path = fgets($productFile);
			$desc = fgets($productFile);
			$cat = fgets($productFile);
			//$tags = fgets($productFile);
			$price = fgets($productFile);
			$newProd = new ProductObject($id, $pName, $path, $desc, $cat, $price);
			$this->products[] = $newProd;
		}
		fclose($productFile);
		return $this->products;
	}

	function getPage($currentPage)
	{
		//Page 1 needs to be indexed at 0
		$start = 10 * $currentPage;
		$end = $start + 10;
		for($i = $start; $i < $end; $i++)
		{
			if($this->products[$i] == NULL)
				break;
			else
				$pageProducts[] = $this->products[$i];
		}
		return $pageProducts;
	}

	//Only searches by the description currently
	function searchProducts($search)
	{
	    $query = strtolower($search);
		foreach($this->products as $product)
		{
			$descript = explode(" ", $product->cat);
			foreach($descript as $keyword)
			{
				if(strtolower($keyword) == strtolower($query))
				{
					$searchProducts[] = $product;
				}
			}
		}
		return $searchProducts;
	}

	function getItem($id)
	{
		foreach($this->products as $product)
		{
			if(trim($product->id) == $id)
			{
				return $product;
			}
		}
		return false;
	}
}

class ProductObject
{
	public $id;
	public $oName;
	public $path;
	public $desc;
	public $cat;
	public $price;

	public function __construct($pId, $pName, $pPath, $pDesc, $pCat, $pPrice)
	{
		$this->id = $pId;
		$this->oName = $pName; 
		$this->path = $pPath;
		$this->desc = $pDesc;
		$this->cat = $pCat;
		$this->price = $pPrice;
	}
}

class UserHandler
{
	public $Users;

	private function getUsers()
	{
		$this->Users = array();
		$userFile = fopen("users.txt", "r") or die("Unable to retrieve users");
		while(!feof($userFile))
		{
			$username = fgets($userFile);
			$password = fgets($userFile);
			$newUser = new User($username, $password);
			$this->Users[] = $newUser;
		}
		fclose($userFile);
		return $this->Users;
	}

	public function checkUser($username, $password)
	{
		$this->getUsers();
		foreach($this->Users as $user)
		{
			if(trim($user->uUsername) == $username && trim($user->uPassword) == $password)
			{
				return $user;
			}
		}
		return false;
	}

	public function addUser($username, $password)
	{
		$userFile = fopen("./users.txt", "a") or die("Unable to register at this time");
		fwrite($userFile, $username."\n".$password."\n");
		fclose($userFile);
	}
}

class User
{
	public $uUsername;
	public $uPassword;
	public $uEmail;
	public $uAddress;

	public function __construct($username, $password)
	{
		$this->uUsername = $username;
		$this->uPassword = $password;
		$this->uEmail = "No email address entered";
		$this->uAddress = "No address entered";
	}
}

class Recorder
{
	//public $records;
	public $user;
	public $pointer;

	public function startRecording($username)
	{
		if($username == NULL)
		{
			$username = "guest";
		}
		$this->user = $username;
		//$this->records = array();
		$this->pointer = 0;
	}

	public function addClick($value)
	{
		$event = new Event($this->user, $value, date("H:i:s M d Y"));
		$event->writeEvent();
		$this->pointer++;
	}
}

class Event
{
	public $eUser;
	public $eValue;
	public $eTime;

	public function __construct($user, $value, $time)
	{
		$this->eUser = $user;
		$this->eValue = $value;
		$this->eTime = $time;
	}

	public function writeEvent()
	{
		$eventFile = fopen("./events.txt", "a") or die("Unable to record at this time");
		fwrite($eventFile, $this->eUser." clicked ".$this->eValue." at ".$this->eTime."\n");
		fclose($eventFile);
	}
}

?>
