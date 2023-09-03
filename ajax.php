<?php
require_once('db.php');

if (isset($_GET['isim_form'])) {
  $Aranan = $_GET['isim_form'];
  $Aranan = "%{$Aranan}%";
} else {
  $Aranan = "";
}

$sql = "SELECT * FROM kullanicilar 
        WHERE 
          adsoyad LIKE :isim_form OR
          unvan   LIKE :isim_form OR
          birim   LIKE :isim_form OR
          telefon LIKE :isim_form
        LIMIT 100";
$SORGU = $DB->prepare($sql);
$SORGU->bindParam(':isim_form', $Aranan);
$SORGU->execute();
$kullanicilar = $SORGU->fetchAll(PDO::FETCH_ASSOC);

foreach ($kullanicilar as $kullanici) {
  echo "
  <tr>
    <td>{$kullanici['adsoyad']}</td>
    <td>{$kullanici['unvan']}</td>
    <td>{$kullanici['birim']}</td>
    <td>{$kullanici['telefon']}</td>
  </tr>
  ";
}
?>
