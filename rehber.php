<?php
require 'login.kontrol.php';
require 'sayfa.ust.php';
?>


<div class="container mt-1">
  <div class="row text-center">
    </div>
    <h1 class="alert alert-primary">Telefon Rehberi</h1>
  
  <form>
    <p>
      İsim, birim veya telefon giriniz: <input type="text" id="isim_form" name="isim_form" autocomplete="off">
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
  </div>
  </table>

<div class='text-center'>
  </div>
  <a href='index.php' class='btn btn-warning'>ANASAYFAYA</a>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    var $isim_form = $('#isim_form');
    var $sonuc_tablosu = $('#sonuc_tablosu');

    $isim_form.on('input', function() {
      var arananMetin = $isim_form.val();
      if (arananMetin.trim() !== '') {
        $.ajax({
          url: 'ajax.php', 
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


<?php require_once 'sayfa.alt.php'; ?>