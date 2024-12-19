<?php
require_once 'function.php';
cek_session();

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
  <?php show_nav(); ?>
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
    $size = filesize($file);
    if($size>=pow(2, 20)) $size = round($size/pow(2, 20), 1) . ' MB';
    elseif($size>=pow(2, 10)) $size = round($size/pow(2, 10), 1) . ' KB';
    else $size = $size . ' B';
    echo '<li>';
    echo '<a href="storage/' . $file . '" class="f-name">' . $file . '</a>';
    echo '<span class="f-size">'.$size.'</span>';
    echo '<a href="unlink.php?f='.$file.'" class="f-del" onclick="return konfirmasi()">x</a>';
    echo '</li>';
  }
}
?>
      </ul>
    </section>
  </main>
  <script>
    function konfirmasi() {
      return confirm('Apakah Anda yakin menghapus dat ini?');
    }
  </script>
</body>
</html>