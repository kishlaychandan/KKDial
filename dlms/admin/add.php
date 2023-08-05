<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
    if(isset($_POST['submit']))
  {
// create table if not already created

// insert in faqs table

$sql = "INSERT INTO tblfaq (question, answer,created_at) VALUES (?, ?,?)";
$statement = $dbh->prepare($sql);
$statement->execute([
    $_POST["question"],
    $_POST["answer"],
    date("Y-m-d h:i:sa")
]);
  }
  
  // get all faqs from latest to oldest
?>