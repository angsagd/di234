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
  <title>Profile Member</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Profile Member</h1>
  </header>
  <?php show_nav(); ?>
  <main>
    <table id="detail-table">
      <tr>
        <td>Fullname</td>
        <td>:</td>
        <td><?= $row['fullname'] ?></td>
      </tr>
      <tr>
        <td>City</td>
        <td>:</td>
        <td><?= $row['city'] ?></td>
      </tr>
      <tr>
        <td>Username</td>
        <td>:</td>
        <td><?= $row['username'] ?></td>
      </tr>
      <tr>
        <td>Terdaftar</td>
        <td>:</td>
        <td><?= $row['created_at'] ?></td>
      </tr>
    </table>
    <hr>
    <a class="btn-link" href="user.php">Back</a>
    <a href="edit.php?id=<?= $row['id'] ?>" class="btn-link">Edit</a>
    <?php
    if($row['id'] != $_SESSION['user']['id']) {
      echo '<a href="delete.php?id=' . $row['id'] . '" class="btn-link" onclick="return konfirmasi()">Delete</a>';
    }
    ?>
  </main>
  <script>
    function konfirmasi() {
      return confirm('Apakah anda ingin menghapus data user <?= $row['fullname'] ?>?');
    }
  </script>
</body>
</html>