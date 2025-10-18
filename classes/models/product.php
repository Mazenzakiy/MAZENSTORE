<?php
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes\Models;

use TechStore\Classes\Db;


class Product extends Db
{

    public function __construct()
    {
        $this->table = "products";
        $this->connect();
    }

    // this function override to add spacefic query in item
    public function selectId($id, string $fields = "products.*")
    {
        $mysql = "SELECT $fields 
        FROM $this->table JOIN `cats`
        ON $this->table.cat_id=cats.id
        WHERE $this->table.id =$id ";
        $result = mysqli_query($this->conn, $mysql);
        return mysqli_fetch_assoc($result);
    }

    // this function override to select data from two tables
    public function selectAllWithCats(string $fields = "*"): array
    {
        $mysql = "SELECT $fields FROM $this->table JOIN cats 
        ON $this->table.cat_id=cats.id 
        ORDER BY $this->table.id DESC  ";
        $result = mysqli_query($this->conn, $mysql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
