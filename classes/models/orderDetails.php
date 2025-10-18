<?php 
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes\Models;
use TechStore\Classes\Db;


class OrderDetails extends Db {
    public function __construct()
    {
        $this->table="order_details";
        $this->connect();
    }



    public function selectWithProduct($orderId){
        $mysql="SELECT qty,name,price  
        FROM $this->table JOIN products
        ON $this->table.product_id=products.id
        WHERE order_id=$orderId";
        $result=mysqli_query($this->conn,$mysql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC) ;
    }
}




?>