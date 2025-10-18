<?php

use TechStore\Classes\File;
use TechStore\Classes\Models\Catg;
use TechStore\Classes\Models\Product;
use TechStore\Classes\Validation\Validator;

require_once("../../app.php");



if ($request->postHas("submit")) {
  $name = $request->post("name");

  // validation 
  // call class Validator
  $validator = new Validator;


  $validator->validate('name', $name, ['required', 'str', 'max']);



  if ($validator->hasErrors()) {
    $session->set('errors', $validator->getErrors());
    $request->aredierct("add-category.php");
  } else {

    $cat=new Catg;

    $cat->insert("name","'$name'");


    $session->set('success', 'category added successfully');

    $request->aredierct('categories.php');
  }
} else {
  $request->aredierct("add-category.php");
}
