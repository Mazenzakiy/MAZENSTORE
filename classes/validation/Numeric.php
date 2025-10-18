<?php 
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes\Validation;


class Numeric implements ValidationRule{
    public function check(string $name, $value)
    {
        if (!is_numeric($value)) {
            return "$name must be numbers";
        }
        return false ;
    }
}




?>