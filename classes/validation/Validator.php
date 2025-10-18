<?php
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes\Validation;


class Validator
{
    private $errors = [];
    public function validate(string $name, $value, array $rules)
    {
        foreach ($rules as $rule) {
            // now we must do OPEN-COLSE the second sold
            // if i add claas for a new rule i don,t need to 
            //make changes in validtor class 
            // because we make class with the same name of rule     
            $className="TechStore\\Classes\\Validation\\" . $rule;
            $obj = new $className;

            $error = $obj->check($name, $value);
            if ($error !== false) {
                $this->errors[] = $error;
                break;
            }
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }
}
