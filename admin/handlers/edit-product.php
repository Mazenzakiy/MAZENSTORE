<?php

use TechStore\Classes\File;
use TechStore\Classes\Models\Product;
use TechStore\Classes\Validation\Validator;

require_once("../../app.php");



if ($request->postHas("submit")) {
  $id = $request->post("id");
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
  $validator->validate('description', $description, ['required', 'str']);
  if ($img['error']==0) {
    
    $validator->validate('image', $img, ['image']);
  }



  if ($validator->hasErrors()) {
    $session->set('errors', $validator->getErrors());
    $request->aredierct("add-product.php");
  } else {

    $product=new Product;
    $imagName=$product->selectId($id,'img')['img'];

  
    if ($img['error']==0) {
      unlink(PATH."uploads/".$imagName);
      $file= new File($img);
      $imagName= $file->rename()->uploads();
    }
    $product->update(" name='$name' ,`desc`='$description',price='$price' ,
     pieces_no='$pieces_no' ,cat_id='$cat_id', img='$imagName' ",$id);


    $session->set('success', 'profile edited successfully');

    $request->aredierct('products.php');
  }
} else {
  $request->aredierct("products.php");
}
