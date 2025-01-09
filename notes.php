<?php

chdir('notes');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];

  if(empty($title)) {
    $title = $_GET['n'];
    unlink($title . '.txt');
    header('Location: notes.php');
    exit;
  }

  $content = $_POST['content'];
  file_put_contents($title . '.txt', $content);
  header('Location: notes.php?n=' . $title);
  exit;
}

$files = scandir(getcwd());

$title = '';
$content = '';

if(isset($_GET['n']) && !empty($_GET['n'])) {
  $title = $_GET['n'];
  if(is_file($title . '.txt')) {
    $content = htmlspecialchars(file_get_contents($title . '.txt'));
  } else {
    header('Location: notes.php');
    exit;
  }
}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Online Notes</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
    }
    header {
      background-color: #2c3e50;
      color: #fff;
      padding: 20px;
      text-align: center;
      height: 10vh;
    }
    #notes-list {
      width: 20%;
      float: left;
      height: 80vh;
      overflow-y: scroll;
      border-right: 1px solid #bbb;
      background-color: #eee;
    }
    #notes-list ul {
      list-style: none;
      padding: 0;
    }
    #notes-list ul li a {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: #666;
    }
    #notes-list ul li a:hover {
      color: #000;
      background-color: #ddd;
    }
    #notes-list ul li a.active {
      color: #f30;
      background-color: #ccc;
      font-weight: bold;
    }
    #notes-content {
      width: 80%;
      float: left;
      height: 80vh;
    }
    #notes-content textarea {
      width: 100%;
      height: 100%;
      border: none;
      outline: none;
      resize: none;
      padding: 10px;
      font-size: 16px;
    }
    #notes-action {
      text-align: center;
      width: 100%;
      height: 10vh;
      float: left;
      padding: 10px;
      background-color: #2c3e50;
      color: #fff;
    }
    #notes-action label {
      display: inline-block;
      width: 50px;
    }
    #notes-action input {
      width: 200px;
      padding: 5px;
      border: none;
      outline: none;
      font-size: 16px;
    }
    #notes-action button {
      padding: 5px 10px;
      border: none;
      outline: none;
      background-color: #f30;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header>
    <h1>Simple Online Notes</h1>
  </header>
  <main>
    <form method="post" id="form-notes">
      <section id="notes-list">
        <ul><?php
        foreach ($files as $file) {
          if(is_file($file) && substr($file, -4) === '.txt' && $file[0] !== '.') {
            $name = substr($file, 0, -4);
            echo '<li><a href="?n=' . $name . '"';
            if($name === $title) echo ' class="active"';
            echo '>' . $name . '</a></li>';
          }
        }
        ?></ul>
      </section>
      <section id="notes-content">
        <textarea name="content" spellcheck="false" autofocus><?= $content ?></textarea>
      </section>
      <section id="notes-action">
        <label for="input-title">Title</label>
        <input id="input-title" type="text" name="title" value="<?= $title ?>" placeholder="note title">
        <button type="submit">Save</button>
      </section>
    </form>
  </main>
  <script></script>
</body>
</html>