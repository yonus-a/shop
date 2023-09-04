<?php

 function db_connect() {
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "shop";
  
  $conn = new mysqli($hostname, $username, $password, $dbname);

  if($conn->connect_error) die("Connection Faild!".$conn->connect_error);

  return $conn;
 }
