<?php
session_start();

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'di234';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Koneksi Gagal');

function db_query($sql) {
  global $conn;
  return mysqli_query($conn, $sql);
}

function cek_session($kondisi = false) {
  if(!$kondisi && !isset($_SESSION['user'])) {
    $_SESSION['error'] = 'Harap login terlebih dahulu';
    header('location: login.php');
    exit;
  } elseif($kondisi && isset($_SESSION['user'])) {
    header('location: member.php');
    exit;
  }
}

function show_nav() {
  echo '<nav> ';
  echo '<ul> ';
  echo '<li><a href="member.php">Home</a></li> ';
  echo '<li><a href="user.php">Users</a></li> ';
  echo '<li><a href="new.php">Add</a></li> ';
  echo '<li><a href="detail.php?id='.$_SESSION['user']['id'].'">Profile</a></li> ';
  echo '<li><a href="logout.php">Logout</a></li> ';
  echo '</ul> ';
  echo '</nav> ';
}