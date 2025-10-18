<?php
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes;

class Cart
{


   public function __construct()
   {
      // Initialize the cart array if it doesn't exist
      if (!isset($_SESSION['cart'])) {
         $_SESSION['cart'] = [];
      }
   }

   // this function to add a assocaitive session array to put a product which user chose in his all browsing   
   public function add(string $id, array $data)
   {
      $_SESSION['cart'][$id] = $data;
   }

   // this function to count all products that user chosse 
   public function count()
   {
      return count($_SESSION['cart']);
   }


   // this finctoin to calculate all products price that user chosse

   public function total()
   {
      $total = 0;

      foreach ($_SESSION['cart'] as $id => $productData) {
         $total += ($productData['qty'] * $productData['price']);
      }
      return $total;
   }


   // this function to return all data in cart $_session
   public function all(){
      return $_SESSION['cart'];
   }

   // this function to remove an item from Session
   public function remove(string $id){
      unset($_SESSION['cart'][$id]);
   }

     // this function to empity all cart from Session
     public function empty(){
      $_SESSION['cart']=[];
   }
   
}
