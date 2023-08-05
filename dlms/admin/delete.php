<?php
 
    // connect database
    include('includes/dbconnection.php');
    // $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
 
    // check if FAQ existed
    $sql = "SELECT * FROM tblfaq WHERE id = ?";
    $statement = $dbh->prepare($sql);
    $statement->execute([
        $_REQUEST["id"]
    ]);
    $faq = $statement->fetch();
 
    if (!$faq)
    {
        die("FAQ not found");
    }
 
    // delete from database
    $sql = "DELETE FROM tblfaq WHERE id = ?";
    $statement = $dbh->prepare($sql);
    $statement->execute([
        $_POST["id"]
    ]);
 
    // redirect to previous page
    header("Location: " . $_SERVER["HTTP_REFERER"]);
 
?>