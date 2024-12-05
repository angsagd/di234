<?php
require_once 'function.php';
cek_session();

$fullname = addslashes($_POST['fullname']);
$city = addslashes($_POST['city']);
$username = addslashes($_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// query insert data
db_query("INSERT INTO users (fullname, city, username, password) 
          VALUES ('$fullname', '$city', '$username', '$password')");
// redirect ke halaman: user.php
header('location: user.php');
exit;