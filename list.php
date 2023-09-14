<?php
require 'login.kontrol.php';
require 'yetki.kontrol.php';
require 'sayfa.ust.php'; ?>

<div class='row text-center'>
  <h1 class='alert alert-danger'>My Users</h1>
</div>

<table class="table table-secondary table-bordered table-striped">
  <thead>
    <tr>

      <th>Name</th>
      <th>Email</th>
      <th>Delete User</th>
    </tr>
  </thead>
  <tbody>




    <?php

    require_once('db.php');

    $SORGU = $DB->prepare("SELECT * FROM kullanicilar");
    $SORGU->execute();
    $kullanicilar = $SORGU->fetchAll(PDO::FETCH_ASSOC);
    //echo '<pre>'; print_r($users);

    foreach ($kullanicilar as $kullanici) {
      echo "
    <tr>
      <td>{$kullanici['adsoyad']}</td>
      <td>{$kullanici['eposta']}</td>
        <td><a href='delete.php?id={$kullanici['id']}' class='btn btn-danger btn-sm'>Delete</a></td>
   </tr> 
  ";
    }

    ?>

  </tbody>
</table>


<div class='text-center'>
  <a href='index.php' class='btn text-white' style='background-color: #0F2C59;'>MAIN PAGE</a>
</div>

<?php require 'sayfa.alt.php'; ?>