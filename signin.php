<?php

$username = &$_POST['username'];
$password = &$_POST['password'];

if($username != "" && $password != "") {
  require("utils/db.php");

  $conn = db_connect();

  $add_sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
  $check_sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

  session_start();

  if($conn->query($check_sql)->num_rows > 0) {
    $_SESSION['loggedIn'] = 'yes';
    header("location:/shop");
  } elseif($conn->query($add_sql) === true) {
    $_SESSION['loggedIn'] = 'yes';
    header("location:/shop");
  }

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
    <div class="signin">
      <div class="wrapper">
        <h2>ثبت نام | ورود</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <label>
            نام کاربری:
            <input type="text" name="username" required>
          </label>
          <label>
            رمز عبور:
            <input type="password" name="password" required>
          </label>
          <button type="submit">ورود</button>
        </form>
      </div>
    </div>
  </body>
</html>
