<?php
require 'login.kontrol.php';
require 'sayfa.ust.php';
require_once('db.php');


$my_id = $_SESSION['id'];

$sql = "SELECT * FROM review WHERE kullanici_id = :kullanici_id";
$SORGU = $DB->prepare($sql);
$SORGU->bindParam(':kullanici_id',  $my_id);
$SORGU->execute();
$REVIEW = $SORGU->fetchAll(PDO::FETCH_ASSOC);
var_dump();

echo "
<div class='row text-center'>
  <h3 class='alert alert-primary'>{$REVIEW[0]['review']}</h3>
</div>
";

echo nl2br($REVIEW[0]['duyuru']);
echo "<br><hr>";

require 'sayfa.alt.php';
