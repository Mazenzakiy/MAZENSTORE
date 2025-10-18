<?php

use TechStore\Classes\Models\Admin;
use TechStore\Classes\Validation\Validator;

require_once("../../app.php");



if ($request->postHas("submit") ) {
   $email = $request->post("email");
   $password = $request->post("password");
  


  // validation 
  // call class Validator
  $validator = new Validator;

  $validator->validate('email', $email, ['required', 'email', 'max']);
  $validator->validate('password', $password, ['required', 'str', 'max']);
  
  
  
  if ($validator->hasErrors()) {
    $session->set('errors', $validator->getErrors());

    $request->aredierct("login.php");
  } else {
   

   $ad= new Admin;
   
   $isLogin= $ad->login($email,$password,$session);
   
   if ($isLogin) {
    $request->aredierct("index.php");
   }else {
    $session->set("errors",['credentials are not correct']);
    $request->aredierct("login.php");
   }
    
    
  }
}else {
      $request->aredierct("login.php");   
}
