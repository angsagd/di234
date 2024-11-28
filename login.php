<?php
session_start();

if(isset($_SESSION['username'])) {
  header('location: member.php');
  exit;
}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Member</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #333;
      color: #fff;
      padding: 10px 0;
      text-align: center;
    }
    main {
      padding: 20px;
    }
    form {
      display: flex;
      flex-direction: column;
      width: 300px;
      margin: 0 auto;
    }
    .row {
      margin-bottom: 14px;
    }
    label {
      display: inline-block;
      
      margin-bottom: 5px;
    }
    input.input-text {
      padding: 5px;
      width: 100%;
    }
    button {
      padding: 8px 24px;
      background-color: #333;
      color: #fff;
      border: none;
      cursor: pointer;
      border-radius: 4px;
    }
    .alert {
      background-color: #fee;
      color: #f00;
      padding: 5px;
      margin-bottom: 14px;
      border: 1px solid #f00;
      border-radius: 4px;
      text-align: center;
      width: 100%;
    }
  </style>
</head>
<body>
  <header>
    <h1>Login Member</h1>
  </header>
  <main>
    <form action="validasi.php" method="post">
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