<?php

require("utils/db.php");

$conn = db_connect();

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

$conn->close();
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
      <?php if(isset($_GET['message'])): ?>
        <div class="message">
          <?php 
            echo $_GET['message'];
          ?>
        </div>
      <?php endif; ?>
      <div class="products">
        <?php while($product = $result->fetch_assoc()): ?>
          <div class="card">
              <img src="images/products/<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?>">
              <div class="card__body">
              <h2><?php echo $product['name'] ?></h2>
              <div class="flex-wrapper">
                <strong><?php echo $product['price'] ?>تومان</strong>
                <form action="actions/add_to_cart.php">
                  <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                  <button type="submit">افزودن به سبد</button>
                </form>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    <!-- content -->
    <?php
      require("components/footer.php");
    ?>
    <script>
      const msg = document.querySelector(".message");
      setTimeout(() => {
        msg.style.display = 'none';
      }, 1000);
    </script>
  </body>
</html>


