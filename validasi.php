<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == 'admin' && $password == 'secret') {
  // Jika login berhasil
  // buat session dengan username sebagai tanda sudah login
  $_SESSION['username'] = $username;
  // redirect ke halaman: member.php
  header('location: member.php');
  exit;
} else {
  // Jika login gagal
  // buat session dengan pesan kesalahan
  $_SESSION['error'] = 'Username / Password salah';
  // redirect ke halaman: login.php
  header('location: login.php');
  exit;
}