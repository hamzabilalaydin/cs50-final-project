<?php
require 'login.kontrol.php';
require 'yetki.kontrol.php';
require 'sayfa.ust.php';

require_once('db.php');

if (isset($_POST['adsoyad_form'])) {
  ///////////////////////////////////////
  /////////////////////////////////////// GÜNCELLEME İŞLEMİ
  ///////////////////////////////////////
  // echo "<pre>"; print_r($_POST);
  // echo "<pre>"; print_r($_GET);

  $adsoyad  = $_POST['adsoyad_form'];
  $eposta = $_POST['eposta_form'];
  $id    = $_GET['id'];

  $sql = "UPDATE kullanicilar SET adsoyad = :adsoyad_form, eposta = :eposta_form WHERE id = :id";
  $SORGU = $DB->prepare($sql);

  $SORGU->bindParam(':adsoyad_form',  $adsoyad);
  $SORGU->bindParam(':eposta_form', $eposta);
  $SORGU->bindParam(':id',    $id);

  // die(date("H:i:s"));
  $SORGU->execute();
  echo "<i><b>User Updated...</b></i>";
}

$id    = $_GET['id'];

$sql = "SELECT * FROM kullanicilar WHERE id = :id";
$SORGU = $DB->prepare($sql);

$SORGU->bindParam(':id', $id);

$SORGU->execute();

$kullanicilar = $SORGU->fetchAll(PDO::FETCH_ASSOC);
$kullanici  = $kullanicilar[0];

?>


<div class='container'>
  <div class="offset-3 col-6">

    <div class='row text-center'>
      <h1 class='alert' style='background-color: #DAC0A3; color: #0F2C59'>Update User</h1>
    </div>

    <form method="POST">
        <div class="mb-3">
          <label for="adsoyad" class="form-label">Kullanıcı Adı:</label>
          <input type="text" name='adsoyad_form' class="form-control" style='background-color: #DAC0A3' value='<?php echo $kullanici['adsoyad'];  ?>' id="adsoyad" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="eposta" class="form-label">Eposta:</label>
          <input type="email" name='eposta_form' class="form-control" style='background-color: #DAC0A3' value='<?php echo $kullanici['eposta']; ?>' id="eposta">
        </div>
          <button type="submit" class="btn text-white" style='background-color: #0F2C59'>Update</button>
          <a href='list.php' class='btn text-white' style='background-color: #0F2C59'>Back</a>
    </form>

  </div>
  
<?php require 'sayfa.alt.php'; ?>