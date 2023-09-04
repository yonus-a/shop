<?php
  session_start();

  if(isset($_SESSION['loggedIn'])) {
    unset($_SESSION['loggedIn']);
    header('location:/shop');
  }

?>