<?php
require_once 'function.php';
cek_session();

if(!isset($_GET['id'])) {
  header('location: user.php');
  exit;
}

$id = $_GET['id'];
$result = db_query("SELECT * FROM users WHERE id = $id");
if(mysqli_num_rows($result) === 0) {
  header('location: user.php');
  exit;
}
$row = mysqli_fetch_assoc($result);

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Member</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Edit Member</h1>
  </header>
  <?php show_nav(); ?>
  <main>
    <form id="edit-form" action="update.php" method="post">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <div class="row">
        <label for="input-fullname">Fullname</label>
        <input type="text" name="fullname" id="input-fullname" class="input-text" value="<?= $row['fullname'] ?>" autofocus required>
      </div>
      <div class="row">
        <label for="input-city">City</label>
        <input type="text" name="city" id="input-city" class="input-text" value="<?= $row['city'] ?>" required>
      </div>
      <hr>
      <div class="row">
        <label for="input-username">Username</label>
        <input type="text" id="input-username" class="input-text" value="<?= $row['username'] ?>" readonly>
      </div>
      <div class="row">
        <label for="input-password">Password</label>
        <input type="password" name="password" id="input-password" class="input-text" placeholder="Biarkan kosong jika tidak diubah">
      </div>
      <div class="row">
        <a href="detail.php?id=<?= $row['id'] ?>" class="btn-link">Back</a>
        <button type="submit">Update</button>
      </div>
    </form>
  </main>
</body>
</html>