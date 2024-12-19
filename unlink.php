<?php
require_once 'function.php';
cek_session();

chdir('storage');
$file = $_GET['f'];
unlink($file);

header('location: download.php');
exit;