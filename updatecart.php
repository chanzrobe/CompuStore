<?php
session_start();
include_once("config.php");

//empty cart by distroying current session
if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
{
	$return_url = base64_decode($_GET["return_url"]); //return url
	session_destroy();
	header('Location:'.$return_url);
}

//add item in shopping cart
if(isset($_POST["type"]) && $_POST["type"]=='add')
{
	$product_code 	= filter_var($_POST["laptopid"], FILTER_SANITIZE_STRING); //product code
	$product_qty 	= filter_var($_POST["quantity"], FILTER_SANITIZE_NUMBER_INT); //product code
	$return_url 	= base64_decode($_POST["return_url"]); //return url


	//MySqli query - get details of item from db using product code
	$results = $mysqli->query("SELECT brand, price FROM kingston.laptop WHERE laptopid='$product_code' LIMIT 1");
	$obj = $results->fetch_object();
	
	if ($results) { //we have the product info 
		
		//prepare array for the session variable
		$new_product = array(array('name'=>$obj->product_name, 'code'=>$product_code, 'qty'=>$product_qty, 'price'=>$obj->price));
		
		if(isset($_SESSION["laptop"])) //if we have the session
		{
			$found = false; //set found item to false
			
			foreach ($_SESSION["laptop"] as $cart_itm) //loop through session array
			{
				if($cart_itm["code"] == $product_code){ //the item exist in array

					$laptop[] = array('name'=>$cart_itm["brand"], 'code'=>$cart_itm["laptopid"], 'qty'=>$product_qty, 'price'=>$cart_itm["price"]);
					$found = true;
				}else{
					//item doesn't exist in the list, just retrive old info and prepare array for session var
					$laptop[] = array('name'=>$cart_itm["brand"], 'code'=>$cart_itm["laptopid"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
				}
			}
			
			if($found == false) //we didn't find item in array
			{
				//add new user item in array
				$_SESSION["laptop"] = array_merge($laptop, $new_product);
			}else{
				//found user item in array list, and increased the quantity
				$_SESSION["laptop"] = $laptop;
			}
			
		}else{
			//create a new session var if does not exist
			$_SESSION["laptop"] = $new_product;
		}
		
	}
	
	//redirect back to original page
	header('Location:'.$return_url);
}

//remove item from shopping cart
if(isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["laptop"]))
{
	$product_code 	= $_GET["removep"]; //get the product code to remove
	$return_url 	= base64_decode($_GET["return_url"]); //get return url

	
	foreach ($_SESSION["laptop"] as $cart_itm) //loop through session array var
	{
		if($cart_itm["code"]!=$product_code){ //item does,t exist in the list
			$laptop[] = array('name'=>$cart_itm["brand"], 'code'=>$cart_itm["laptopid"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
		}
		
		//create a new product list for cart
		$_SESSION["laptop"] = $product;
	}
	
	//redirect back to original page
	header('Location:'.$return_url);
}
?>