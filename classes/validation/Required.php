<?php 
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes\Validation;
use TechStore\Classes\Validation\ValidationRule ;
require_once("ValidatoinRule.php");


class Required implements ValidationRule {
    public function check(string $name, $value)
    {
        if (empty($value)) {
            return "$name is required";
        }
        return false ;
    }
}




?>