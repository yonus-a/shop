<?php

$id = $_GET['id'];

if($id) {
  session_start();

  if(isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $cart[] = $id;
    $_SESSION['cart'] = array_unique($cart); 
  } else {
    $_SESSION['cart'] = [$id];
  }

  header("location:/shop/products.php?message=محصول به سبد خرید اضافه شد");
}
