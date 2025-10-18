<?php 
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes\Models;

use TechStore\Classes\Db;

// categ
class Catg extends Db {
    public function __construct()
    {
        $this->table="cats";
        $this->connect();
    }
}




?>