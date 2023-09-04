<?php

$name = &$_POST['name'];
$price = &$_POST['price'];
$image = &$_FILES['image'];
$id = &$_GET['id'];
$imageName = &$image['name'];

if(!empty($id)) {
  require("utils/db.php");
  
  $conn = db_connect();
  
  $sql1 = "SELECT * FROM product WHERE id=$id";
  $product = $conn->query($sql1)->fetch_assoc();
  
  if(!empty($name) && !empty($price)) {
    $sql2 = "UPDATE product SET name='$name', price=$price WHERE id=$id";

    if($conn->query($sql2) === true) {
      header("location:/shop/update_product.php");
    } 

    if(!empty($imageName)) {
      $sql3 = "UPDATE product SET image='$imageName' WHERE id=$id";

      if($conn->query($sql3) === true) {
        $target_dir = 'images/products/';
        $target_file = $target_dir . basename($image["name"]);
        move_uploaded_file($image["tmp_name"], $target_file);
        header("location:/shop/update_product.php");
      }
    }
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
        <h1>ویرایش محصول</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?id=".$id; ?>" method="post" enctype="multipart/form-data">
          <label>
            نام *
            <input type="text" name="name" required value="<?php echo $product['name']; ?>">
          </label>
          <label>
            قیمت *
            <input type="number" name="price" required value="<?php echo $product['price']; ?>">
          </label>
          <label>
            تصویر * 
            <input type="file" name="image">
            <?php echo $product['image']; ?>
          </label>
          <button type="submit">ویرایش</button>
        </form>
      </div>
    </div>
  </body>
</html>
