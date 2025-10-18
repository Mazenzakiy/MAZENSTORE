<?php

use TechStore\Classes\Cart;
use TechStore\Classes\Models\Admin;
use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetails;

require_once("app.php");

// require_once "classes/Request.php" ;
// require_once "classes/Session.php" ;
// require_once "classes/Db.php" ;
// require_once "classes/models/product.php" ;
// require_once "classes/models/order.php" ;
// require_once "classes/models/categ.php" ;
// require_once "classes/models/orderDetails.php" ;
// require_once "classes/validation/ValidatoinRule.php";
// require_once "classes/validation/Validator.php";    
// require_once "classes/validation/Required.php";
// require_once "classes/validation/Email.php";
// require_once "classes/validation/Numeric.php";
// require_once "classes/validation/Str.php";
// require_once "classes/validation/Max.php";    




// $request =new Request;
// $session = new Session ;

// echo $request->getHas('as');

// $session->set('name',"mazen adel") ;

// echo $session->get('name') ;

// var_dump($session->has('name'));

// $session->set('age',23);

// echo "<pre>" ;
// print_r($_SESSION) ;
// echo "</pre>" ;

// $session->remove('age') ;


// echo "<pre>" ;
// print_r($_SESSION) ;
// echo "</pre>" ;

// $product=new Product;
// $result = $product->getCount();

// echo "<pre>" ;
// print_r($result) ;
// echo "</pre>" ;

// $v=new Validator;
// $v->validate('age','12',[ 'required','numeric']);

// echo "<pre>" ;
// var_dump($v->hasErrors());
// echo "</pre>" ;

// echo "<pre>" ;
// var_dump($result) ;
// echo "</pre>" ;


//echo $request->get("name");


// to test numbers of products and total cost
// $cart=new Cart ;
// echo $cart->count();
// echo $cart->total();


// $admin=new Admin;
// $result=$admin->login("kareem@admin.com","123456",$session);

// echo"<pre>";
// var_dump($result);
// echo"</pre>";


// echo"<pre>";
// var_dump($_SESSION);
// echo"</pre>";

// $admin->logout($session);

// echo"<pre>";
// var_dump($_SESSION);
// echo"</pre>";


// $order=new Order;

// $result=$order->selectId(2,"orders.*, SUM(price*qty) AS total");

// $deatil=new OrderDetails;
// $resultDeatils=$deatil->selectWithProduct(2);


// echo "<pre>" ;
// print_r($resultDeatils);
// echo "</pre>";



?>