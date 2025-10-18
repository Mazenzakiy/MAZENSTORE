<?php

use TechStore\Classes\Models\Admin;
use TechStore\Classes\Validation\Validator;

require_once("../../app.php");



if ($request->postHas("submit") ) {
  $name = $request->post("name");
  $email = $request->post("email");
  $password = $request->post("password");
  $confirmPassword = $request->post("confirmPassword");
  


  // validation 
  // call class Validator
  $validator = new Validator;

  $validator->validate('name', $name, ['required', 'str', 'max']);
  $validator->validate('email', $email, ['required', 'email', 'max']);
  
  
  if (! empty($password && ! $password == $confirmPassword)) {
    $validator->validate('passwsord',$password,['required', 'str', 'max']);
  }
  
  if ($validator->hasErrors()) {
    $session->set('errors', $validator->getErrors());

    $request->aredierct("profile.php");
  } else {
   

   $ad= new Admin;
   
   if (!empty($password)) {
      // update query with password
      $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
      $ad->update(" name='$name' ,email='$email' , `password`='$hashedPassword' ",$session->get('adminId'));
   }else {
      // update query with password
      $ad->update(" name='$name' ,email='$email' ",$session->get('adminId'));
   }

   $session->set('success','profile edited successfully');

   $request->aredierct('handlers/handle-logout.php');   
   
   
    
    
  }
}else {
      $request->aredierct("profile.php");   
}
