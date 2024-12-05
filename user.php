<?php
require_once 'function.php';
cek_session();

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>User Management</h1>
  </header>
  <?php show_nav(); ?>
  <main>
    <table id="user-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Kota</th>
          <th>Username</th>
          <th>Terdaftar</th>
        </tr>
      </thead>
      <tbody>
<?php
// query data users
$result = db_query('SELECT * FROM users');
$no = 1;
while($row = mysqli_fetch_assoc($result)) {
  echo '<tr>';
  echo '<td>' . $no++ . '</td>';
  echo '<td><a href="detail.php?id=' . $row['id'] . '">' . $row['fullname'] . '</td>';
  echo '<td>' . $row['city'] . '</td>';
  echo '<td>' . $row['username'] . '</td>';
  echo '<td>' . $row['created_at'] . '</td>';
  echo '</tr>';
}

?>
      </tbody>
    </table>
    <hr>
    <a class="btn-link" href="new.php">Add New Member</a>
  </main>
</body>
</html>