<?php

$name = &$_POST['name'];
$price = &$_POST['price'];
$image = &$_FILES['image'];


if(!empty($name) && !empty($price) && !empty($image)) {
  require("utils/db.php");

  $conn = db_connect();
  
  $imageName = $image['name'];
  $sql = "INSERT INTO product (name, price, image) VALUES ('$name', $price, '$imageName')";

  if($conn->query($sql) === true) {
    $target_dir = 'images/products/';
    $target_file = $target_dir . basename($image["name"]);
    move_uploaded_file($image["tmp_name"], $target_file);
    header("location:/shop/products.php");
  } else {
    echo $conn->error;
  }
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
    <div class="add-product">
      <?php 
        require("components/admin_nav.php");
      ?>
      <!-- content -->
      <div class="container">
        <h1>اضافه کردن محصول</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
          <label>
            نام *
            <input type="text" name="name" required>
          </label>
          <label>
            قیمت *
            <input type="number" name="price" required>
          </label>
          <label>
            تصویر * 
            <input type="file" name="image" required>
          </label>
          <button type="submit">اضافه کردن</button>
        </form>
      </div>
    </div>
  </body>
</html>
