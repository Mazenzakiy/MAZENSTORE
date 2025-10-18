<?php
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes;


// now we need to make class called Requset has functions which deal with data in SUPER GLOBAL POST,GET (($_POST,$_GET))
class Request {
  // function called get which return value of method>GET
  // public >> so that i use it direct from object class Request by using arrow(>>) operator 
  public function get(string $key){
    return $_GET[$key];
  }
  
  // function called post which return value of method>POST
  public function post(string $key){
    return $_POST[$key];
  }

  // function called post which return value of method>POST
  public function files(string $key){
    return $_FILES[$key];
  } 

  // fuction to ensure safety from hacking if some one put some html in any field to access any data from database
  public function postClean(string $key){
    return trim(htmlspecialchars($_POST[$key])) ;
  }

  // function to check if key is exist or no
  /// ((Note)) type hinting >> put to parameter a dataType and the type of return so that 
  /// if we put wrong ipnut it throw error which easy to us to notes that.
  //  isset to check if the element exist return true else return false 
  public function getHas(string $key) : bool 
  {
    return isset($_GET[$key]) ;
  }

  // function to check if key is exist or no
  //// ((Note)) type hinting >> put to parameter a dataType and the type of return so that if we put wrong ipnut it throw error which easy to us to notes that.
  public function postHas(string $key) : bool 
  {
    return isset($_POST[$key]) ;
  }


  // this function to redierct a path this way called absoelute way take path from beging website 
  public function redierct( $path){
    header("location: ".URL.$path);
  }

  public function aredierct($path){
    header("location: ".AURL.$path);
  }




}







?>