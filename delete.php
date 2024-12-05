<?php
require_once 'function.php';
cek_session();

if(!isset($_GET['id'])) {
  header('location: user.php');
  exit;
}

// cek apakah user yang akan dihapus adalah user yang sedang login
if($_GET['id'] == $_SESSION['user']['id']) {
  header('location: detail.php?id='.$_GET['id']);
  exit;
}

// query hapus data
db_query("DELETE FROM users WHERE id = {$_GET['id']}");
// redirect ke halaman: user.php
header('location: user.php');
exit;