<?php

use TechStore\Classes\Models\Order;

require_once("../../app.php");

if ($request->getHas('id')) {
  $id =$request->get('id');
  
 $order = new Order;
 $order->update("status = 'approved' ",$id);

 $session->set('success','order approved');
 $request->aredierct('order.php?id='.$id);

}




















?>