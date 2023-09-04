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
    <div class="update-product">
      <?php 
        require("components/admin_nav.php");
      ?>
      <!-- content -->
      <div class="container">
        <h1>ویرایش محصولات</h1>
        <ul>
          <?php while($product = $result->fetch_assoc()): ?>
            <li>
              <?php echo $product['name'] ?>
              <span>
                <a href="actions/delete_product.php?id=<?php echo $product['id'] ?>">
                  حذف
                </a>
                <a href="modify_product.php?id=<?php echo $product['id'] ?>">
                  ویرایش
                </a>
              </span>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </body>
</html>
