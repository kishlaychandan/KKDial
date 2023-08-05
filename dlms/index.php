<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Page Title -->
    <title>Directory Listing Management System|| Home Page</title>
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
    <!-- Font icons -->
    <script src="https://kit.fontawesome.com/6b30dee39b.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--============================= HEADER =============================-->
    <?php include_once('includes/header.php');
    
    $icons = array(
        1 => 'fa-burger',
        2 => 'fa-city',
        3 => 'fa-home',
        4=>'fa-wifi',
        5 => 'fa-newspaper',
        6 => 'fa-car',
        7 => 'fa-truck',
        8=>'fa-sharp fa-light fa-person-chalkboard',
        9=>'fa-solid fa-dumbbell',
        // 10
        11=>'fa-sharp fa-light fa-building-columns',
        12=>'fa-sharp fa-light fa-plug-circle-bolt',
        13=>'fa-sharp fa-light fa-plug-circle-bolt',
        14=>'fa-sharp fa-light fa-screwdriver-wrench',
        15=>'fa-broom',
        16=>'fa-brush',
        17=>'fa-bag-shopping',
        18=>'fa-user-doctor',
        19=>'fa-wheelchair-move',
        20=>'fa-sharp fa-light fa-user-nurse',
        21=>"fa-solid fa-jug-detergent",
        22=>'fa-light fa-seedling',
        23=>'fa-flower',
        24=>'fa-stretcher',
        25=>'fa-arrow-right',
        26=>'fa-mobile-phone',
        27=> 'fa-sharp fa-light fa-buildings',
        // add more categories and icons as needed
        );
       
       ?>
    
    <!--============================= MAIN TITLE =============================-->
    <section class="hero-wrap d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="hero-title">
                    <h1>What’s your plan today?</h1>
                    <h3>Find out perfect place to hangout in your city from 
                    <?php 
                    $sql ="SELECT ID from tblcategory ";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $totalcat=$query->rowCount();
                    echo htmlentities($totalcat);
                    ?>
                    categories and
                    <?php $sql ="SELECT ID from tbllisting ";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $totallisting=$query->rowCount();
                    echo htmlentities($totallisting);?>
                    listings </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form name="search" action="search-listing.php" method="post">
                        <div class="search-box">
                            <div class="row">
                                <div class="col-md-6 search-box_line">
                                    <div class="search-box1">
                                        <div class="search-box-title">
                                            <label>What?</label><br>
                                            <select class="search-form" name="categories">
                                                <option class="options" value="all-categories">all categories</option>
                                                <?php

                                                $sql2 = "SELECT * from   tblcategory ";
                                                $query2 = $dbh->prepare($sql2);
                                                $query2->execute();
                                                $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                                                foreach ($result2 as $row) {
                                                ?>
                                                    <option value="<?php echo htmlentities($row->ID); ?>"><?php echo htmlentities($row->Category); ?></option>
                                                    
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="search-box2">
                                        <div class="search-box-title">
                                            <label>Where?</label><br>

                                            <input class="search-form" type="text" name="location" style="height:55px;" required="true" placeholder="Eg: Gulbarga">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-search">
                            <button class="btn btn-primary"  style= " background-color:#FF8C00;" type="submit" name="search">
                                <h2>Search →</h2>
                            </button>

                        </div>
                    </form>
                    <p class="search-bottom-title">By using this website, you are agreeing to our <a href="#"> terms and conditions</a></p>
                </div>
            </div>
        </div>
    </section>
    <!--//END MAIN TITLE -->





    <!--============================= ADD LISTING =============================-->
    <!-- category -->
    <section class="featured-wrap">
        <div class="container-fluid container-subpage">
            <div class="row">
                <div class="col-md-12 responsive-wrap">
                  <div class="row detail-filter-wrap">

                  </div>
                    <div class="map-responsive-wrap">
                        <a class="map-icon btn btn-block" href="#"><i class="icon-location-pin"></i> <small>Category</small></a>
                    </div>
                    <div class="container-fluid">
                        <div class="row detail-filter-wrap">
                            <?php
                            $sql = "SELECT * from  tblcategory";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $row) { ?>
                                <div class="col-md-2 card-2">
                                <div class="card">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <h5 class="card-title text-center">
                                             <span class="fa <?php echo $icons[$row->ID]; ?> center fa-2x" style="color: #e5a02a; display: block; margin: 0 auto;"></span><br>
                                              <a href="viewlisting.php?lid=<?php echo $row->ID; ?>" style="color: #6037ac; text-align: center;"><?php echo $row->Category; ?></a>
        </h5>
    </div>
</div>

</div>
                                <?php }
                            } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- mini category -->
    <section class="featured-wrap">
        <div class="container-fluid  col-md-6 responsive-wrap">
            <div class="category-home">
                <div class="container-fluid">
                    <h3>Popular category</h3>
                </div>
                <div class="row-md-6" >
                    <?php
                    
                    $sql = "SELECT * from  tblcategory";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $row) {           ?>
                        <span >
                            <a href="viewlisting.php?lid=<?php echo $row->ID; ?>" style= " color:#6037ac;"><?php echo $row->Category; ?>
                              &nbsp;|&nbsp;
                            </a>
                    
                        </span>
                        <?php }
                    } ?>
                </div>    
            </div>
        </div>
    </section>

<div>
    <?php
// Display section

// Check if the 'search_keyword' cookie is set
if(isset($_COOKIE['search_keyword'])) {
    $keyword = $_COOKIE['search_keyword'];

    // Split the keyword into an array using a space as the delimiter
    $keywords = explode(' ', $keyword);

    // Display the keywords in a point-wise format
    echo '<ul>';
    foreach($keywords as $key) {
        echo '<li>' . htmlentities($key) . '</li>';
    }
    echo '</ul>';
}
?>
</div>





    <section class="main-block">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="titile-block">
                        <h2>Reach Millions of People</h2>
                        <p>Add your business infront of millions and earn 3x profits from our tool</p>
                    </div>
                    <div class="btn-wrap btn-wrap2">
                        <a href="add-listing.php" class="btn btn-simple"  style= " background-color:#FF8C00;">Add your Listing →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END ADD LISTING -->
    <?php include_once('includes/footer.php'); ?>
    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>