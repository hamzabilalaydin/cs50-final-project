<?php
require 'login.kontrol.php';
require 'yetki.kontrol.php';
require 'sayfa.ust.php';

if ($_SESSION['id'] == $_GET['id']) {
  echo "<h1 class='text-center'>Can Not Delete Yourself :)</h1>
  <div class='row text-start'>
    <p class='text-center'><a href='list.php' class='btn btn-md text-white' style='background-color:#0F2C59;'> Back </a></p>
  </div>
  ";
  
  die();
}

require_once('db.php');

$id    = $_GET['id'];

$sql = "DELETE FROM kullanicilar WHERE id = :id";
$SORGU = $DB->prepare($sql);

$SORGU->bindParam(':id', $id);

$SORGU->execute();
header('location: list.php');
?>

<div class='row text-start'>
  <p><a href='list.php' class="btn btn-primary btn-sm"> Back </a></p>
</div>

<?php require 'sayfa.alt.php'; ?>