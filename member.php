<?php
session_start();
// cek apakah user sudah login
// jika belum login, redirect ke halaman login
if(!isset($_SESSION['username'])) {
  $_SESSION['error'] = 'Harap login terlebih dahulu';
  header('location: login.php');
  exit;
}

$username = $_SESSION['username'];

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Member Area</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #333;
      color: #fff;
      padding: 10px 0;
      text-align: center;
    }
    main {
      padding: 20px;
    }
    hr {
      margin: 20px 0;
    }
    a.btn-link {
      padding: 8px 24px;
      background-color: #333;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Member Area</h1>
  </header>
  <main>
    <h2>Selamat Datang, <?= $username ?></h2>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, omnis eveniet. Quia consectetur, nemo nisi molestias fuga, saepe consequatur reiciendis asperiores nostrum nobis debitis fugiat ipsam quasi molestiae harum voluptas!</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis consectetur magni eligendi tempora earum quisquam deleniti aspernatur! Sint reiciendis blanditiis rem placeat sequi sed inventore saepe omnis in aperiam provident neque earum quas, amet error officia quaerat dolor corrupti, assumenda totam sunt? Incidunt, nisi quis aut quam nostrum eius necessitatibus!</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, nisi.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus repellendus explicabo, commodi ratione perferendis magni suscipit repudiandae, exercitationem et tempora saepe quos officia odit nemo, maxime dolorum obcaecati impedit totam dolores ad rem. Sit consectetur molestiae praesentium sequi iure saepe cum architecto autem et id, maxime pariatur alias recusandae. Tenetur deserunt beatae quas, provident tempora et corrupti cumque similique amet aut nisi nulla eligendi aliquam modi minus voluptas maxime. Autem et earum dolores, repellendus dignissimos assumenda id alias cum, voluptas veritatis distinctio delectus sint! Placeat architecto dolor molestiae fugit quas voluptatibus, maxime id nisi impedit veniam, minus facere, asperiores sit.</p>
    <hr>
    <a class="btn-link" href="logout.php">Logout</a>
  </main>
</body>
</html>