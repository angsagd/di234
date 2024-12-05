<?php
require_once 'function.php';
cek_session();

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Member</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Add New Member</h1>
  </header>
  <?php show_nav(); ?>
  <main>
    <form id="add-form" action="save.php" method="post">
      <div class="row">
        <label for="input-fullname">Fullname</label>
        <input type="text" name="fullname" id="input-fullname" class="input-text" autofocus required>
      </div>
      <div class="row">
        <label for="input-city">City</label>
        <input type="text" name="city" id="input-city" class="input-text" required>
      </div>
      <hr>
      <div class="row">
        <label for="input-username">Username</label>
        <input type="text" name="username" id="input-username" class="input-text" required>
      </div>
      <div class="row">
        <label for="input-password">Password</label>
        <input type="password" name="password" id="input-password" class="input-text" required>
      </div>
      <div class="row">
        <button type="submit">Save</button>
      </div>
    </form>
  </main>
</body>
</html>