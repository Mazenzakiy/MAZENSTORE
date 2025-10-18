<?php 
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes\Validation;
use TechStore\Classes\Validation\ValidationRule ;
require_once("ValidatoinRule.php");


class Image implements ValidationRule {
    public function check(string $name, $value)
    {
        $allowdExtentions=['png','jpg','jpeg','gif'];
        $extention= pathinfo($value['name'],PATHINFO_EXTENSION);

        if (! in_array($extention,$allowdExtentions)) {
            return "$name extention is not allowed,please uploads png ,jpg ,jpeg ,gif ";
        }
        return false ;
    }
}




?>