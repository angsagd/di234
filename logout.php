<?php
session_start();
// hapus session
unset($_SESSION['username']);

// redirect ke halaman login
header('location: login.php');
exit;