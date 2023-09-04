<?php

session_start();

if(!isset($_SESSION['loggedIn'])) {
  header("location:/shop/signin.php");
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
    <div class="admin-panel">
      <?php 
        require("components/admin_nav.php");
      ?>
      <div class="container">
        <h1>به پنل مدریت خوش آمدید !</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus doloribus explicabo aut consequuntur maxime recusandae molestiae sint minima aliquam, quis incidunt provident laboriosam ex corrupti inventore soluta pariatur eos repellendus?</p>
      </div>
    </div>
  </body>
</html>
