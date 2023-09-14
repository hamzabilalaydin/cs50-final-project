<?php
require 'login.kontrol.php';
require 'sayfa.ust.php';
require_once('db.php');

$user_id = $_SESSION['id'];
$book_id = $_GET['id'];

$my_sql = "SELECT review.review, books.title FROM review JOIN books ON books.id = review.books_id WHERE kullanici_id = :user_id AND books_id = :book_id";
$my_sorgu = $DB->prepare($my_sql);
$my_sorgu->bindParam(':user_id', $user_id);
$my_sorgu->bindParam(':book_id', $book_id);
$my_sorgu->execute();
$my_review = $my_sorgu->fetchAll(PDO::FETCH_ASSOC);
$old_review = $my_review[0]['review'];
$book_name = $my_review[0]['title'];

if(isset($_POST['submit_form'])){
    
    $user_id = $_SESSION['id'];
    $review = $_POST['submit_form'];
    $book_id = $_GET['id'];

    $sql = 'UPDATE review SET review = :review WHERE kullanici_id = :user_id AND books_id = :book_id';
    $SORGU = $DB->prepare($sql);
    
    $SORGU->bindParam(':user_id', $user_id);
    $SORGU->bindParam(':book_id', $book_id);
    $SORGU->bindParam(':review', $review);
    
    $SORGU->execute();

    header("location: login.php");
    die();
}
#$kullanicilar = $SORGU->fetchAll(PDO::FETCH_ASSOC);

echo "
<div class='text-center' style='color: #0F2C59;'> <h2><b>$book_name</b></h2> </div>
<br>
<div class='alert text-center' style='background-color: #FF9F9F' role='alert'>
<b> YOUR COMMENT </b>
</div>

<form method='POST'>
<div class='form-floating'>
<textarea class='form-control' name='submit_form' id='submit_form' style='background-color: #DAC0A3; height:300px;' placeholder='Leave a comment here' id='floatingTextarea2' style='height: 100px'>$old_review</textarea>
<label for='floatingTextarea2'><a style='color: #0F2C59;'>Your Comment</a></label>
</div>
<div class='d-grid mt-3 mb-1 gap-2'>
<input class='btn text-white' href='index.php' style='background-color: #0F2C59;' type='submit' value='Submit'>
</div>
</form>

";
    

require_once 'sayfa.alt.php'; ?>
