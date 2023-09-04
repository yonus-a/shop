<header>
  <div class="container">
    <nav>
      <ul role="menubar">
        <li role="none">
          <a href="/shop" role="menuitem" class="active">خانه</a>
        </li>
        <li role="none">
          <a href="products.php" role="menuitem">محصولات</a>
        </li>
        <li role="none">
          <a href="cart.php" role="menuitem">سبد خرید</a>
        </li>
        <li role="none">
          <a href="admin.php" role="menuitem">پنل مدیریت</a>
        </li>
      </ul>
      <?php if(!isset($_SESSION['loggedIn'])): ?>
        <a href="signin.php" class="login">ورود |‌ ثبت نام</a>
      <?php endif; ?>
      <?php if(isset($_SESSION['loggedIn'])): ?>
        <a href="actions/signout.php" class="login">خروج از حساب</a>
      <?php endif; ?>
    </nav>
  </div>
</header>
