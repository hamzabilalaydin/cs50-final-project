<?php
require 'login.kontrol.php';
require 'sayfa.ust.php';
require_once('db.php');


// Check if the 'id' parameter is set in the URL
if(isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $user_id  =$_SESSION['id'];

    // Validate the book_id to prevent SQL injection (You should use prepared statements as you did before)
    // ...

    // Define your SQL DELETE statement
    $sql = "DELETE FROM review WHERE books_id = :book_id AND kullanici_id = :user_id";

    try {
        // Prepare and execute the SQL statement
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        // Check if the deletion was successful
        if ($stmt->rowCount() > 0) {
            // Redirect back to the page where the deletion was initiated
            header("Location: index.php");
            exit();
        } else {
            // Handle the case where no rows were affected (no matching record)
            echo "No records were deleted.";
        }
    } catch (PDOException $e) {
        // Handle any database errors here
        echo "Error: " . $e->getMessage();
    }
} else {
    // Handle the case where 'id' parameter is not set in the URL
    echo "Invalid request.";
}

  









require_once 'sayfa.alt.php'; ?>