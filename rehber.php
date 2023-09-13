<?php
require 'login.kontrol.php';
require 'sayfa.ust.php';
?>


<div class="container mt-1">
  <div class="row text-center">
    </div>
    <h1 class="alert text-center" style='color: #0F2C59'>Search For Whatever You Want</h1>
  
  <form class='text-center'>
    <p>
      <input class='shadow-lg' style='background-color: #DAC0A3; border-radius: 5px; border:none' type="text" id="isim_form" name="isim_form" autocomplete="off">
    </p>
  </form>
  <table class="table-border table table-secondary" id="sonuc_tablosu" style="background-color: #F8F0E5; display: none;">
    <thead>
      <tr>
        <th>Title</th>
        <th>Authors</th>
        <th>Add</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // PHP code to fetch and display initial search results, if needed
      ?>
    </tbody>
  </div>
  </table>
<br><br>
<div class='text-center text-end'>
  <a href='index.php' class='btn text-white' style='background-color:#0F2C59'>MAIN PAGE</a>
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