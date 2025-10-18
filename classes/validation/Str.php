<?php 
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes\Validation;


class Str implements ValidationRule{
    public function check(string $name, $value)
    {
        if (! is_string($value)) {
            return "$name must be string";
        }
        return false ;
    }
}




?>