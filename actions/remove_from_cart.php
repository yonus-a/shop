<?php

$id = $_GET['id'];

if($id) {
  session_start();

  if(isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array_filter($_SESSION['cart'], function($val) {
      global $id;
      return $val !== $id;
    }); 
  } 

  header("location:/shop/cart.php");
}
