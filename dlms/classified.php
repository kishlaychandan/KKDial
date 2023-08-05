<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- Page Title -->
    <title>KKDail|| About Us</title>
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
                        <h2 style= " color:#6037ac;font-family: Times New Roman, Times, serif;font-size:50px;text-align:center;">Classified</h2>
                        <p> <a href="index.php"> Home</a> / Classified</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="main-block">
            <div class="container-fluid">
                <div class="row" >
                    <div class = "col-md-6">
                <div class="card" style="width: 45rem;">
                  <img src="images\classified1.jpg" class="card-img-top" alt="...">
                    </div>
</div>
                    <div class="col-md-6">
                    <div class="card bg-light">
                        <div class="listing-wrap">
                        <script src="\KKDial\dlms\ckeditor\ckeditor.js"></script>
                            <form method="post" enctype="multipart/form-data" id="my-form" action="">
                            <div class="listing-title">
                                  <!--  <span class="ti-files"></span>-->
                                    <h3 style= "font-family: Gill Sans, Times, serif;font-size:30px;"><strong>Classified form</strong></h3>
                                </div>
                                <div class = "containers">
                                <i class="fa-solid fa-tags"></i> <label style="color: #e5a02a;"><strong>Select a type</strong></label>
                                </div>
                                <div class = "row">
                                    <div class = "col">
                                        <div class="form-group">
                                          <label style="color: #e5a02a;">Ad type *</label>
                                          <select class="form-control classified_form" name="adtype">
                                                <option class="options" value="all ads">all ads</option>
                                                <?php

                                                $sql2 = "SELECT * from   tbladtype ";
                                                $query2 = $dbh->prepare($sql2);
                                                $query2->execute();
                                                $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                                                foreach ($result2 as $row) {
                                                ?>
                                                    <option value="<?php echo htmlentities($row->ID); ?>"><?php echo htmlentities($row->Adtype); ?></option>
                                                    
                                                <?php } ?>
                                            </select>
                                        </div>
                                     </div>
                                </div>
                                <div class = "containers">
                                <i class="fa-solid fa-image"></i> <label style="color: #e5a02a;"><strong>Product Information</strong></label>
                                </div>
                                <div class = "row">
                                    <div class = "col">
                                        <div class="form-group">
                                          <label style="color: #e5a02a;">Category *</label>
                                          <select class="form-control classified_form" name="categories">
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
                                <div class = "row">
                                    <div class = "col">
                                        <div class="form-group">
                                          <label style="color: #e5a02a;">Listing Title *</label>
                                          <select class="form-control classified_form" name="lisingtitle">
                                                <option class="options" value="listingtitle">Listing Name</option>
                                                <?php

                                                $sql2 = "SELECT * from   tbllisting ";
                                                $query2 = $dbh->prepare($sql2);
                                                $query2->execute();
                                                $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                                                foreach ($result2 as $row) {
                                                ?>
                                                    <option value="<?php echo htmlentities($row->ID); ?>"><?php echo htmlentities($row->ListingTitle); ?></option>
                                                    
                                                <?php } ?>
                                            </select>
                                        </div>
                                     </div>
                                </div>
                                <div class = "row">
                                    <div class = "col">
                                        <div class="form-group">
                                          <label style="color: #e5a02a;">Title *</label>
                                          <input type="text" class="form-control classified_form" name="title">
                                        </div>
                                     </div>
                                </div>
                                     <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: #e5a02a;">Price type *</label>
                                            <select class="form-control classified_form" name="pricetype" required="true">
                                                <option>Fixed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: #e5a02a;">Price *</label>
                                            <input type="text" class="form-control classified_form" name="price" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="color: #e5a02a;">Description</label>
                                    <textarea  id="editor" name="description" class="form-control classified_form" rows="2" required="true"></textarea>
                                </div>
                                <div class = "containers">
                                <i class="fa-solid fa-camera"></i> <label style="color: #e5a02a;"><strong>Images</strong></label>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <div class="custom-file">
                                            <div class="add-gallery-text">
                                                <i class="ti-gallery"></i>
                                                <span>Drag &amp; Drop To Image</span>
                                            </div>
                                            
                                            <input type="file" class="custom-file-input" id="logo" name="logo" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-wrap btn-wrap2">
                                            <button type="submit" class="btn btn-primary" name="submit" id="submit">SUBMIT</button>
                                        </div>
                                    </div>
                                </div>
                                </div>  



                                <script> CKEDITOR.replace('editor');
                                        </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</section>







    <?php include_once('includes/footer.php');?>

    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>