<?php 
require_once('db.php');

$sql = "SELECT * FROM kullanicilar WHERE id = :id";
$SORGU = $DB->prepare($sql);
$id = $_SESSION['id'];

$SORGU->bindParam(':id', $id);
$SORGU->execute();
$user = $SORGU->fetchAll(PDO::FETCH_ASSOC);
$new_name = $user[0]['adsoyad'];
?>

<!doctype html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Bookstore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body style='background-color: #F8F0E5'>
<br>
  <div class='container'>
    <div class='row text-center'>
      <h1><a href='index.php' style='text-decoration:none; color: #0F2C59 '>My Bookstore</a></h1>
      <h5 style='color:#C08261'><?php echo $new_name ?></h5>
      <div class='text-end'>
        <p><a href='logout.php' class="btn btn-sm text-white" style='background-color: #A73121'> Logout </a></p>
      </div>
      <hr>
    </div>