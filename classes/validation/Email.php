<?php 
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes\Validation;



class Email implements ValidationRule{
    public function check(string $name, $value)
    {
        if (! filter_var($value,FILTER_VALIDATE_EMAIL)) {
            return "$name faild email";
        }
        return false ;
    }
}




?>