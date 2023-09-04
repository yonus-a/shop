<?php

$id = &$_GET['id'];

if(!empty($id)) {
  require("../utils/db.php");

  $conn = db_connect();

  $sql = "DELETE FROM product WHERE id=$id";

  if($conn->query($sql) === true) {
    header("location:/shop/update_product.php");
  }

  $conn->close();
}

