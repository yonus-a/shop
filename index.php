<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="main.js" defer></script>
    <title>online shop</title>
  </head>
  <body>
    <?php 
      require("components/header.php");
    ?>
    <!-- content -->
    <?php 
      require("components/hero.php");
    ?>
    <?php 
      require("components/welcome.php");
    ?>
    <!-- content -->
    <?php
     require("components/footer.php");
    ?>
  </body>
</html>