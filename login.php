<?php
require_once 'function.php';
cek_session(true);

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Member</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Login Member</h1>
  </header>
  <main>
    <form id="login-form" action="validasi.php" method="post">
<?php
if(isset($_SESSION['error'])) {
  echo '<div class="alert">';
  echo $_SESSION['error'];
  echo '</div>';
  unset($_SESSION['error']);
}
?>
      <div class="row">
        <label for="input-username">Username</label>
        <input type="text" name="username" id="input-username" class="input-text" autofocus required>
      </div>
      <div class="row">
        <label for="input-password">Password</label>
        <input type="password" name="password" id="input-password" class="input-text" required>
      </div>
      <div class="row">
        <label>
          <input type="checkbox" name="remember">
          Simpan login
        </label>
      </div>
      <div class="row">
        <button type="submit">Login</button>
      </div>
    </form>
  </main>
</body>
</html>