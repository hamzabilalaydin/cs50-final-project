<?php
@session_start();

if (isset($_SESSION['girisyapti'])) {
  // Oturum açmış
  header("location: index.php");
  die();
}


if (isset($_POST['eposta_form'])) {
  // Form gönderildi. Şimdi işimize bakalım
  // 1.DB'na bağlan
  // 2.SQL hazırla ve çalıştır
  // 3.Gelen sonuç 1 satırsa GİRİŞ BAŞARILI değilse, BAŞARISIZ
  require_once('db.php');

  $sql = "SELECT * FROM kullanicilar WHERE eposta = :eposta_form AND parola = :parola_form";
  $SORGU = $DB->prepare($sql);

  $SORGU->bindParam(':eposta_form', $_POST['eposta_form']);
  $SORGU->bindParam(':parola_form', $_POST['parola_form']);

  $SORGU->execute();

  $CEVAP = $SORGU->fetchAll(PDO::FETCH_ASSOC);
  //var_dump($CEVAP);
  // echo "Gelen cevap " .  count($CEVAP) . " adet satırdan oluşuyor";
  if (count($CEVAP) == 1) {
    //echo "<h1>GİRİŞ BAŞARILI!</h1>";
    @session_start();
    $_SESSION['girisyapti'] = 1;
    $_SESSION['adsoyad'] = $CEVAP[0]['adsoyad']; // Kullanıcının adını alalım
    $_SESSION['id'] = $CEVAP[0]['id']; // Kullanıcının ID'sini alalım
    $_SESSION['rol'] = $CEVAP[0]['rol']; // Kullanıcının ROL'ünü alalım
    header("location: index.php");
    die();
  } else {
    echo "<h1 class='text-center mt-5' style='color: #0F2C59'>WRONG EMAIL OR PASSWORD!</h1>";
    //header("location: hata.php");
    //die();
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body style='background-color: #F8F0E5'>

<div class='container'>
  <div class="offset-2 col-8">
    <br><br>
    <div class='mt-5 row text-center'>
      <h1 class='shadow-lg alert alert' style='background-color: #DAC0A3; color: #0F2C59'>YOUR BOOKSTORE</h1>
    </div>
    <div class='row text-center'>
      <h1 class='alert alert' style='color: #0F2C59'>LOGIN</h1>
    </div>

    <form method="POST">
        <div class="mb-3">
          <label for="eposta" class="form-label" autocomplete='off'style='color: #0F2C59' >Email</label>
          <input type="text" name='eposta_form' class="shadow-lg form-control" id="eposta" style='background-color: #DAC0A3' aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="parola" class="form-label" style='color: #0F2C59'>Password</label>
          <input type="password" name='parola_form' class="shadow-lg form-control" id="parola" style='background-color: #DAC0A3'>
        </div>
        <div>
          <button type="submit" class="btn text-white" style='background-color: #0F2C59'>LOGIN</button>
          <button type="submit" class="btn text-white" style='background-color: #0F2C59'><a href='register.php' style='text-decoration:none' class='text-white'>REGISTER</a></button>
        </div>
    </form>

  </div>

<?php require 'sayfa.alt.php'; ?>