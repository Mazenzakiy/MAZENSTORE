<?php 
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes\Validation;


// we must make an interface to make a rule function to be 
// impelmented in all classes 
interface ValidationRule
{
    public function check(string $name,$value);
}






?>