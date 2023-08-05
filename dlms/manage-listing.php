<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lssemsuid']==0)) {
  header('location:logout.php');
  } else{

// Code for deleting product from cart
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tbllisting where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage-listing.php'</script>";     


}

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  
    <!-- Page Title -->
    <title>KKDial||Manage Listing</title>
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
</head>

<body>
    <?php include_once('includes/header.php');?>
    <!--============================= SUBPAGE HEADER BG =============================-->
    <section class="subpage-bg">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="titile-block title-block_subpage">
                        <h2 style= " color:#6037ac;font-family: Times New Roman, Times, serif;font-size:50px;text-align:center;">Manage Listing</h2>
                        <p><a href="index.php"> Home</a> / Manage Listing</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SUBPAGE HEADER BG -->
    <!--============================= CONTACT =============================-->
    <section class="main-block">
        <div class="container-fluid">
           
            <h3 style= "font-family: Gill Sans, Times, serif;font-size:30px; text-align:center; color:#e5a02a;" class="text-center pt-5 mb-5">Manage Listing</h3>
            <div class="row no-gutters justify-content-center">

                <div class="col-md-10 gray">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-form pl-4 py-4">

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr><th style= " color:#e5a02a;">#</th>
                                                    <th style= " color:#e5a02a;">Listing Title</th>
                                                    <th style= " color:#e5a02a;">Keyword</th>
                                                    <th style= " color:#e5a02a;">Email</th>
                                                    <th style= " color:#e5a02a;">Phone</th>
                                                    <th style= " color:#e5a02a;">Listing Date</th>
                                                    <th style= " color:#e5a02a;">Action</th>
                                                </tr>
                                </thead>


                                <tbody>
                                <?php 
$userid=$_SESSION['lssemsuid'];                                     
$ret="SELECT * from tbllisting where UserID=:userid";
$query = $dbh -> prepare($ret);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                                    <tr>
                                                        <td style= " color:#ffff;"><?php echo htmlentities($cnt);?></td>
                                                        <td style= " color:#ffff;"><?php  echo htmlentities($row->ListingTitle);?></td>
                                                        <td style= " color:#ffff;"><?php  echo htmlentities($row->Keyword);?></td><td style= " color:#ffff;"><?php  echo htmlentities($row->Email);?></td><td style= " color:#ffff;"><?php  echo htmlentities($row->Phone);?></td>
                                                        <td style= " color:#ffff;"><?php  echo htmlentities($row->ListingDate);?></td>
                                                        <td style= " color:#ffff;"><a href="edit-listing.php?editid=<?php echo htmlentities ($row->ID);?>"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: #ffffff;"></i> </a> | <a href="manage-listing.php?delid=<?php echo ($row->ID);?>" onclick="return confirm('Do you really want to Delete ?');"><i class="fa fa-trash" aria-hidden="true" style="color: #ffffff;"></i></a></td>
                                                        
                                                    </tr>
                                                   <?php $cnt=$cnt+1;}} ?> 
                              
                                </tbody>
                            </table>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END CONTACT -->
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

</html><?php }  ?>