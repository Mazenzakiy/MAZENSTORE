<?php

require_once("../app.php");

use TechStore\Classes\Cart;

$cart=new Cart();


if ($request->getHas('id')) {
    $id=$request->get('id');

    $cart->remove($id);

    $request->redierct("cart.php");



}