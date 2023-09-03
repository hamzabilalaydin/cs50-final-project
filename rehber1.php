<?php
require 'login.kontrol.php';
require 'sayfa.ust.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Telefon Rehberi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <div class="row text-center">
    <h1 class="alert alert-primary">Telefon Rehberi</h1>
  </div>
  <form>
    <p>
      İsim, birim veya telefon giriniz: <input type="text" id="isim_form" name="isim_form">
    </p>
  </form>
  <table class="table table-bordered table-striped" id="sonuc_tablosu" style="display: none;">
    <thead>
      <tr>
        <th>Adı Soyadı</th>
        <th>Unvanı</th>
        <th>Birimi</th>
        <th>Telefonu</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // PHP code to fetch and display initial search results, if needed
      ?>
    </tbody>
  </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    var $isim_form = $('#isim_form');
    var $sonuc_tablosu = $('#sonuc_tablosu');

    $isim_form.on('input', function() {
      var arananMetin = $isim_form.val();
      if (arananMetin.trim() !== '') {
        $.ajax({
          url: 'ajax.php', // Replace with the correct URL of your PHP file
          method: 'GET',
          data: { isim_form: arananMetin },
          success: function(data) {
            $sonuc_tablosu.find('tbody').html(data);
            $sonuc_tablosu.show(); // Display the results table
          }
        });
      } else {
        $sonuc_tablosu.hide(); // Hide the results table when input is cleared
      }
    });
  });
</script>

</body>
</html>

<?php require_once 'sayfa.alt.php'; ?>