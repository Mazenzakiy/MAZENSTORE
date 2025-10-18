<?php

use TechStore\Classes\Cart;
use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetails;
use TechStore\Classes\Validation\Validator;

require_once("../app.php");

$cart = new Cart;


if ($request->postHas("submit") and $cart->count()!==0) {
  $name = $request->post("name");
  $email = $request->post("email");
  $phone = $request->post("phone");
  $address = $request->post("address");


  // validation 
  // call class Validator
  $validator = new Validator;

  $validator->validate('name', $name, ['required', 'str', 'max']);
  if (!empty($email)) {
    $validator->validate('email', $email, ['email', 'max']);
  }else {
    $email="NULL";
  }
  $validator->validate('phone', $phone, ['required', 'str', 'max']);
  if (!empty($address)) {
    $validator->validate('address', $address, ['str', 'max']);
  }else {
    $address="NULL";
  }


  if ($validator->hasErrors()) {
    $session->set('errors', $validator->getErrors());

    $request->redierct("cart.php");
  } else {

    $order = new Order;
    $orderDetails = new OrderDetails;
   
    $orderId = $order->insertAndGetId("name,email,phone,address", "'$name','$email','$phone','$address'");

    foreach ($cart->all() as $prodId => $prodData) {
      $qty = $prodData["qty"];
      $orderDetails->insert("order_id,product_id,qty", " '$orderId','$prodId','$qty' ");
    }

    $cart->empty();

    $request->redierct("products.php");
  }
}else {
  $request->redierct("products.php");
}
