<?php
chdir('storage');
$files = scandir(getcwd());

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Storage</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Online Storage</h1>
  </header>
  <main>
    <section>
      <h2>Upload</h2>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="input-file">File:</label>
        <input type="file" name="berkas" id="input-file">
        <button type="submit">Upload</button>
      </form>
    </section>
    <hr>
    <section>
      <h2>Download</h2>
      <ul id="f-list">
<?php
foreach ($files as $file) {
  if(is_file($file) && substr($file, 0, 1)!=='.') {
    echo '<li>';
    echo '<a href="storage/' . $file . '" class="f-name">' . $file . '</a>';
    echo '<span class="f-size">10kb</span>';
    echo '<a href="#" class="f-del">x</a>';
    echo '</li>';
  }
}
?>
      </ul>
    </section>
  </main>
</body>
</html>