<?php
session_start();

const DB_HOST = 'localhost';
const DB_USER = 'webuser';
const DB_PASS = 'webuser';
const DB_NAME = 'di234';

const NAVMENU = [
  'Home' => 'member.php',
  'Users' => 'user.php',
  'Add' => 'new.php',
  'Storage' => 'download.php',
  'Profile' => 'profile.php',
  'Logout' => 'logout.php'
];

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
  foreach(NAVMENU as $label => $link) {
    echo '<li> ';
    echo '<a href="'.$link.'">'.$label.'</a> ';
    echo '</li> ';
  }
  echo '</ul> ';
  echo '</nav> ';
}