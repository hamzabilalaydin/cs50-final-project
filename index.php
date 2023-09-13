<?php
require 'login.kontrol.php';
require 'sayfa.ust.php';
require_once('db.php');
?>

<!-- YETKİLİ KİŞİLER MENÜSÜ -->
<?php if ($_SESSION['rol'] == 2) { ?>
  <div class='container'>
    <div class='row'>
      <div class='text-center'>
        <p><a href='list.php' class="btn" style='background-color: #FF9F9F'> Users </a></p>
      </div>
    </div>
  </div>
<?php } ?>

<?php 
$my_id = $_SESSION['id'];

$sql = "SELECT books.id, books.title , review.review FROM review JOIN books ON review.books_id = books.id WHERE kullanici_id = :kullanici_id";
$SORGU = $DB->prepare($sql);
$SORGU->bindParam(':kullanici_id',  $my_id);
$SORGU->execute();
$REVIEW = $SORGU->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- KULLANICILAR MENÜSÜ -->

    <div class='row text-center'>
      <p><a href='rehber.php' class="btn text-white" style='background-color: #0F2C59'> Search </a></p>
    </div>

  <?php
  foreach($REVIEW as $key => $my_review){
    // Generate unique IDs for each accordion item
    $accordion_id = "accordionItem" . $key;
    $collapse_id = "collapseItem" . $key;
    $title = $my_review['title'];
    $book_id = $my_review['id'];
    $review = nl2br($my_review['review']);
    
    echo "
    <div class='container'>
      <div class='row'>
        <div class='col-10 accordion mb-1'>
          <div class='accordion-item'style='background-color: #DAC0A3'>
            <h2 class='accordion-header'>
              <button style='background-color: #E2C799; color: #0F2C59' class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#$collapse_id' aria-expanded='false' aria-controls='$collapse_id'>
                <b>{$title}</b>
              </button>
            </h2>
            <div id='$collapse_id' class='accordion-collapse collapse' style='color: #0F2C59' data-bs-parent='#$accordion_id'>
              <div class='accordion-body'>{$review}</div>
            </div>
          </div>
        </div>
        <div class='col-2 p-2'>
          <a href='revise.php?id={$book_id}' class='btn ms-2 btn-secondary text-end'>Update</a>
          <a href='' class='btn ms-2 text-end text-white' style='background-color: #0F2C59;'>Delete</a>
        </div>
      </div>
    </div>
    ";
  }
  ?>

  
<?php require_once 'sayfa.alt.php'; ?>

