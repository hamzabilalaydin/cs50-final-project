<?php
@session_start(); // Oturumu aç
@session_destroy(); // Oturumu sonlandır
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Bookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body style='background-color: #F8F0E5' class='text-white'>
<br><br>
<h1 class='text-center mt-5' style='color: #0F2C59'>Signed Out</h1>

<div class='text-center'>
  <a href='login.php' class='mt-4 mb-5 btn text-white' style='background-color: #0F2C59'>Log In</a>
</div>

<?php require 'sayfa.alt.php'; ?>