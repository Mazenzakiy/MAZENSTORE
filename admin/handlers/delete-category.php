<?php

use TechStore\Classes\Models\Catg;
use TechStore\Classes\Models\Product;

require_once("../../app.php");

if ($request->getHas('id')) {
  $id= $request->get('id');

}

$cat= new Catg;
$cat->delete($id);



$session->set('success',"category deleted successfully");
$request->aredierct('categories.php');
?>