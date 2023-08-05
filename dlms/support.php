<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- Page Title -->
    <title>KKDial || Support</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Hover Effects -->
    <link href="css/set1.css" rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel= "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
   <?php include_once('includes/header.php');?>
    <!--============================= SUBPAGE HEADER BG =============================-->
    <section class="subpage-bg">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="titile-block title-block_subpage">
                        <h2 style= " color:#6037ac;font-family: Times New Roman, Times, serif;font-size:50px;text-align:center;">Support</h2>
                        <p><a href="index.php"> Home</a> / Support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
        <div class="col-md-6">
                <div class="card" style="width: 30rem;">
                  <img src="/DLMS/dlms/images/login.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Getting Started</h5>
                     <p class="card-text">You can get started by logging in if you have an account or just by signing up if you don't have one.</p>
                     <a href="index.php" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 30rem;">
                   <img src="/DLMS/dlms/images/search.jpg" class="card-img-top" alt="...">
                   <div class="card-body">
                     <h5 class="card-title">How to find.</h5>
                     <p class="card-text">You can find the place you are looking for by just entering the category and the place. Get Your hands on Searching!!!</p>
                     <a href="index.php" class="btn btn-primary">Search</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="width: 30rem;">
                  <img src="/DLMS/dlms/images/add.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Adding Your Business</h5>
                     <p class="card-text">You can add your business into the portal by logging in and then filling up all the required details.</p>
                     <a href="add-listing.php" class="btn btn-primary">Add Listing</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 30rem;">
                  <img src="/DLMS/dlms/images/listing.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">All in One place</h5>
                     <p class="card-text">To see all the categories of the business that are listed in this portal, Click the following button!</p>
                     <a href="listing.php" class="btn btn-primary">Listings</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="width: 30rem;">
                  <img src="/DLMS/dlms/images/faq.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Got Questions?</h5>
                     <p class="card-text">If you have any questions, here's is the page where you can find the aswers for the most frequently asked questions</p>
                     <a href="faq.php" class="btn btn-primary">FAQ's</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card" style="width: 30rem;">
                  <img src="/DLMS/dlms/images/question1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Need Help?</h5>
                     <p class="card-text">If you are facing any issues or need any help regarding the services being provided by the portal, Write to US!</p>
                     <a href="contact.php" class="btn btn-primary">Write</a>
                    </div>
                </div>
            </div>
        </div>

    </div>  
        
       
    <?php include_once('includes/footer.php');?>



    <!-- jQuery, Bootstrap JS. -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="js/jquery-3.2.1.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/script.js"></script>
   <!-- Map JS (Please change the API key below. Read documentation for more info) -->
   <script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyDMTUkJAmi1ahsx9uCGSgmcSmqDTBF9ygg"></script>
   <!-- Validate JS -->
   <script src="js/validate.js"></script>
   <!-- Contact JS -->
   <script src="js/contact.js"></script>
</body>

</html>
