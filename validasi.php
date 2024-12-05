<?php
require_once 'function.php';

$username = addslashes($_POST['username']);
$password = $_POST['password'];

// cek apakah username sudah ada / terdaftar
$result = db_query("SELECT * FROM users WHERE username = '$username'");
// jika username ada / terdaftar hanya 1
if(mysqli_num_rows($result) === 1) {
  $row = mysqli_fetch_assoc($result);
  // cek apakah password sesuai
  if(password_verify($password, $row['password'])) {
    // simpan login user ke session
    $_SESSION['user'] = $row;
    header('location: member.php');
    exit;
  }
}

$_SESSION['error'] = 'Username / Password salah';
// redirect ke halaman: login.php
header('location: login.php');
exit;
