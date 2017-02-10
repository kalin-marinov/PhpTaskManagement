<?php
$model = new LoginViewModel();
if(isset($_MODEL)) $model = $_MODEL;
?>

  <form action="/Pages/login.php/" method="POST" class="centered top-spaced">
    <h1> Login. </h1>
    <label name="username">Username</label>
    <input type="text" name="username" required value="<?= $model->username ?>" placeholder="username" />

    <label name="password">Password</label>
    <input type="password" name="password" required placeholder="password" />

    <input type="submit" value="Login" />

    <p class="error-box">
      <?= $model->errors ?>
    </p>

    <p> Not a user yet?
      <a href="/pages/register.php">  Create an account </a>
    </p>


  </form>