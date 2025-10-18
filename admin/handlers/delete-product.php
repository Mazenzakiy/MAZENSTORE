<?php

use TechStore\Classes\Models\Product;

require_once("../../app.php");

if ($request->getHas('id')) {
  $id= $request->get('id');
 
}

$product= new Product;

$imgName=$product->selectId($id,'img')['img'];

//echo $imgName ;

unlink(PATH."uploads/$imgName");

$product->delete($id);



$session->set('success',"product deleted successfully");
$request->aredierct('products.php');
?>