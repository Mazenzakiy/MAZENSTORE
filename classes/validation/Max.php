<?php 
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes\Validation;



class Max implements ValidationRule{
    public function check(string $name, $value)
    {
        if (strlen($value)>255) {
            return "$name must be less than 255 characters";
        }
        return false ;
    }
}




?>