<?php
require_once 'function.php';
cek_session();

$fullname = addslashes($_POST['fullname']);
$city = addslashes($_POST['city']);

$sql = "UPDATE users SET fullname = '$fullname', city = '$city'";
if(!empty($_POST['password'])) {
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $sql .= ", password = '$password'";
}
$sql .= " WHERE id = {$_POST['id']}";

// query update data
db_query($sql);
// redirect ke halaman: user.php
header('location: user.php');
exit;