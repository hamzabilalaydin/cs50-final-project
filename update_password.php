<?php
require 'login.kontrol.php';
require 'sayfa.ust.php';
require_once('db.php');

if (isset($_POST['adsoyad_form'])) {

  $adsoyad  = $_POST['adsoyad_form'];
  $parola = $_POST['parola_form'];
  $id = $_GET['id'];

  $sql = "UPDATE kullanicilar SET adsoyad = :adsoyad_form, parola = :parola_form WHERE id = :id";
  $SORGU = $DB->prepare($sql);

  $SORGU->bindParam(':adsoyad_form',  $adsoyad);
  $SORGU->bindParam(':parola_form', $parola);
  $SORGU->bindParam(':id', $id);

  // die(date("H:i:s"));
  $SORGU->execute();
  echo "<i><b>User Updated...</b></i>";
  // After successfully updating the user's information, add a query parameter
  @session_start();
  $_SESSION['girisyapti'] = 0;
  header('location: index.php');

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
          <label for="adsoyad" class="form-label">User Name</label>
          <input type="text" name='adsoyad_form' class="form-control" style='background-color: #DAC0A3' value='<?php echo $kullanici['adsoyad'];  ?>' id="adsoyad" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="parola" class="form-label">Password</label>
          <input type="password" name='parola_form' class="form-control" style='background-color: #DAC0A3' value='<?php echo $kullanici['parola']; ?>' id="parola">
        </div>
          <button type="submit" class="btn text-white" style='background-color: #0F2C59'>Update</button>
          <a href='index.php' class='btn text-white' style='background-color: #0F2C59'>Back</a>
    </form>

  </div>
  
<?php require 'sayfa.alt.php'; ?>