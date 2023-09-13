<?php
require_once('db.php');

if (isset($_GET['isim_form'])) {
  $Aranan = $_GET['isim_form'];
  $Aranan = "%{$Aranan}%";
} else {
  $Aranan = "";
}

$sql = "SELECT * FROM books 
        WHERE 
          title LIKE :isim_form OR
          authors LIKE :isim_form
        LIMIT 50";
$SORGU = $DB->prepare($sql);
$SORGU->bindParam(':isim_form', $Aranan);
$SORGU->execute();
$books = $SORGU->fetchAll(PDO::FETCH_ASSOC);

foreach ($books as $book) {
  echo "
  <tr>
    <td>{$book['title']}</td>
    <td>{$book['authors']}</td>
    <td><a href='submit_review.php?id={$book['id']}' class='btn btn-warning btn-sm'>Add</a></td>
  </tr>
  ";
}
?>
