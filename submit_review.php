<?php
require 'login.kontrol.php';
require 'sayfa.ust.php';
require_once('db.php');


if(isset($_POST['submit_form'])){
    
    $review = $_POST['submit_form'];
    $user_id = $_SESSION['id'];
    $book_id = $_GET['id'];
    
    $sql = 'INSERT INTO review (kullanici_id, books_id, review) VALUES (:user_id, :book_id, :review)';
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
<div class='text-center' style='color: #0F2C59;'> <h2><b>$title</b></h2> </div>
<br><br>
<div class='alert text-center' style='background-color: #FF9F9F' role='alert'>
<b> YOUR COMMENT </b>
</div>

<form method='POST'>
<div class='form-floating'>
<textarea class='form-control' name='submit_form' id='submit_form' style='background-color: #DAC0A3; height:300px;' placeholder='Leave a comment here' id='floatingTextarea2' style='height: 100px'></textarea>
<label for='floatingTextarea2'><a style='color: #0F2C59;'>Your Comment</a></label>
</div>
<div class='d-grid mt-3 mb-1 gap-2'>
<input class='btn text-white' href='index.php' style='background-color: #0F2C59;' type='submit' value='Submit'>
</div>
</form>

";


require_once 'sayfa.alt.php'; ?>