<?php
require_once 'function.php';
cek_session();

$id = $_SESSION['user']['id'];

header('location: detail.php?id=' . $id);
exit;