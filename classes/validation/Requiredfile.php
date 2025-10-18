<?php 
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes\Validation;
use TechStore\Classes\Validation\ValidationRule ;
require_once("ValidatoinRule.php");


class RequiredFile implements ValidationRule {
    public function check(string $name, $value)
    {
        if ($value['error'] != 0) {
            return "$name is required";
        }
        return false ;
    }
}




?>