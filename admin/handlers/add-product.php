<?php

use TechStore\Classes\File;
use TechStore\Classes\Models\Product;
use TechStore\Classes\Validation\Validator;

require_once("../../app.php");



if ($request->postHas("submit")) {
  $name = $request->post("name");
  $cat_id = $request->post("cat_id");
  $price = $request->post("price");
  $pieces_no = $request->post("pieces_no");
  $description = $request->post("desc");
  $img = $request->files("img");





  // validation 
  // call class Validator
  $validator = new Validator;


  $validator->validate('name', $name, ['required', 'str', 'max']);
  $validator->validate('category', $cat_id, ['required', 'numeric']);
  $validator->validate('price', $price, ['required', 'numeric']);
  $validator->validate('pieces number', $pieces_no, ['required', 'numeric']);
  $validator->validate('description', $description, ['required', 'str','max']);
  $validator->validate('image', $img, ['requiredfile', 'image']);



  if ($validator->hasErrors()) {
    $session->set('errors', $validator->getErrors());
    $request->aredierct("add-product.php");
  } else {




    $file = new File($img);

    $imageUploadName = $file->rename()->uploads();
    

    $product=new Product;
    $product->insert(" name ,`desc`,price , pieces_no , img, cat_id","'$name','$description','$price','$pieces_no','$imageUploadName','$cat_id'");


    $session->set('success', 'profile edited successfully');

    $request->aredierct('products.php');
  }
} else {
  $request->aredierct("add-product.php");
}
