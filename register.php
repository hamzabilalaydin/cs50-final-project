<?php


if (isset($_POST['adsoyad_form'])) {
  
  require_once('db.php');
  
  $adsoyad  = $_POST['adsoyad_form'];
  $eposta  = $_POST['eposta_form'];
  $parola = $_POST['parola_form'];
  
  $sql = "INSERT INTO kullanicilar (adsoyad, eposta, parola) VALUES (:adsoyad_form, :eposta_form, :parola_form)";
  $SORGU = $DB->prepare($sql);
  
  $SORGU->bindParam(':adsoyad_form',  strtoupper($adsoyad));
  $SORGU->bindParam(':eposta_form',  $eposta);
  $SORGU->bindParam(':parola_form', $parola);

  $SORGU->execute();
  echo '
      <div class="alert text-center alert-warning mt-5 alert-dismissible fade show" role="alert">
        User Registered...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
    header("location: index.php");
    die();
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
      <h1 class='alert alert' style='color: #0F2C59'>REGISTER</h1>
    </div>

    <form method="POST">
        <div class="mb-3">
          <label for="adsoyad" class="form-label" autocomplete='off' style='color: #0F2C59'><b>Name</b></label>
          <input type="text" name='adsoyad_form' class="shadow-lg form-control" id="adsoyad" style='background-color: #DAC0A3' aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="eposta" class="form-label" autocomplete='off'style='color: #0F2C59' ><b>Email</b></label>
          <input type="text" name='eposta_form' class="shadow-lg form-control" id="eposta" style='background-color: #DAC0A3' aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="parola" class="form-label" style='color: #0F2C59'><b>Password</b></label>
          <input type="password" name='parola_form' class="shadow-lg form-control" id="parola" style='background-color: #DAC0A3'>
        </div>
        <div>
          <button type="submit" class="btn text-white" href='login.php' style='background-color: #0F2C59'><a href='login.php' style='text-decoration:none' class='text-white'>REGISTER</a></button>
        </div>
    </form>

  </div>

<?php require 'sayfa.alt.php'; ?>