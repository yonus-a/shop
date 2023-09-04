<?php

session_start();

require("utils/db.php");

if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
  $conn = db_connect();
  $cart = $_SESSION['cart'];
  $where = join(" OR ", array_map(function($val) {
    return "id=$val";
  }, $cart));

  $sql = "SELECT * FROM product WHERE $where";
  $result = $conn->query($sql);
  $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>online shop</title>
  </head>
  <body>
    <?php 
      require("components/header.php");
    ?>
    <!-- content -->
     <div class="container">
      <div class="products">
        <?php if(isset($result)): ?>
        <?php while($product = $result->fetch_assoc()): ?>
          <div class="card">
              <img src="images/products/<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?>">
              <div class="card__body">
              <h2><?php echo $product['name'] ?></h2>
              <div class="flex-wrapper">
                <strong><?php echo $product['price'] ?>تومان</strong>
                <form action="actions/remove_from_cart.php">
                  <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                  <button type="submit">حذف از سبد</button>
                </form>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php if(!isset($result)): ?>
          <h1>سبد خرید خالی است</h1>
        <?php endif; ?>
      </div>
      <!-- content -->
      </div>
      <?php
        require("components/footer.php");
      ?>
  </body>
</html>
