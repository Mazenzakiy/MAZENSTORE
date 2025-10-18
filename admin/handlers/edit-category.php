<?php

use TechStore\Classes\Models\Catg;
use TechStore\Classes\Validation\Validator;

require_once("../../app.php");

if ($request->postHas("submit")) {
  $id = $request->post("id");
  $name = $request->post("name");






  // validation 
  // call class Validator
  $validator = new Validator;
  $validator->validate('name', $name, ['required', 'str', 'max']);

  if ($validator->hasErrors()) {
    $session->set('errors', $validator->getErrors());
    $request->aredierct("edit-category.php");
  } else {

    $cat=new Catg;
    

  
    
    $cat->update(" name='$name' ",$id);


    $session->set('success', 'profile edited successfully');

    $request->aredierct('categories.php');
  }
} else {
  $request->aredierct("categories.php");
}
