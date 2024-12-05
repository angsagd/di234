<?php
require_once 'function.php';

// hapus session
unset($_SESSION['user']);

// redirect ke halaman login
header('location: login.php');
exit;