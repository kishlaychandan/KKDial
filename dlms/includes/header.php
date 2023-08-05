    <?php 
error_reporting(0);
include('includes/dbconnection.php');

//Code for Login
if(isset($_POST['signup']))
  {
    
    $fname=$_POST['fname'];
    $mobno=$_POST['mobno'];
   
    $password=md5($_POST['password']);

    $ret="select MobileNumber from tbluser where MobileNumber=:mobno";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':mobno', $mobno, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into tbluser(FullName,MobileNumber,Password)Values(:fname,:mobno,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('You have signup  Scuccessfully');</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again');</script>";
}
}
 else
{

echo "<script>alert('Mobile Number already exist. Please try again');</script>";
}
}
?>

<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Code for Login
if (isset($_POST['login'])) {
    $mobno = $_POST['mobno'];
    $password = md5($_POST['password']);
    $datetime = date('Y-m-d H:i:s');

    $sql = "INSERT INTO logindata (name, datetime) VALUES (:name, :datetime)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $mobno, PDO::PARAM_STR);
    $query->bindParam(':datetime', $datetime, PDO::PARAM_STR);
    $query->execute();

    $sql2 = "SELECT ID FROM tbluser WHERE MobileNumber=:mobno AND Password=:password";
    $query = $dbh->prepare($sql2);
    $query->bindParam(':mobno', $mobno, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['lssemsuid'] = $result->ID;
        }
        $_SESSION['login'] = $_POST['email'];
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
   <div class="nav-menu sticky-top">
        <div class="bg transition">
            <div class="container-fluid fixed">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand text-warning" href="index.php"><img src="images\Logo.jpg" alt="Restaurant Logo" style="max-width:200px" class="img-responsive"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
              </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link text-warning" href="index.php">Home</a>
                                    </li>

                                     <li class="nav-item">
                                        <a class="nav-link text-warning" href="about.php">About Us</a>
                                    </li>
                                       <li class="nav-item active">
                                        <a class="nav-link text-warning" href="listing.php">Listings</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link text-warning" href="contact.php">Contact Us</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link text-warning" href="classified.php">Classified</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link text-warning" href="testimonials.php">Testimonials</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link text-warning" href="support.php">Blog</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link text-warning" href="faq.php">FAQ's</a>
                                    </li>
                                   <?php if (strlen($_SESSION['lssemsuid']!=0)) {?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link text-warning" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My Account
                    <span class="ti-angle-down"></span>
                  </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="profile.php">Profile</a>
                                            <a class="dropdown-item" href="change-password.php">Change Password</a>
                                            <a class="dropdown-item" href="logout.php">Logout</a>
                                        </div>
                                    </li><?php } ?>
                                    <?php if (strlen($_SESSION['lssemsuid']==0)) {?>
                                    <li class="nav-item">
                                        <a class="nav-link text-warning" href="login.html" data-toggle="modal" data-target="#exampleModal">Login</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link text-warning" href="admin/login.php">Admin</a>
                                    </li>
                                    <?php } ?>
                                    
                                    <li><a href="add-listing.php" class="btn btn-outline-danger top-btn text-warning"><span class="ti-plus"></span> Add Listing</a></li>
                                   <?php if (strlen($_SESSION['lssemsuid']!=0)) {?>
                                    <li style="padding-left: 20px;"><a href="manage-listing.php" class="btn btn-outline-danger top-btn text-warning"><span class="ti-plus"></span> Manage Listing</a></li><?php } ?>
                                    
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <!-- Log In & Signup -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" style= " background-color:#FF8C00;">
            <div class="modal-content" style= " background-color:#FF8C00;">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"  style= " background-color:#6037ac;" id="login" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style= " background-color:#6037ac;" id="sign-up" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">SIGN UP</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="login">
                        <div class="modal-header">
                            <h5 class="modal-title">DLMS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span class="ti-close"></span>
        </button>
                        </div>
                        <div class="modal-body">
                            <form name="login" method="post">
                                <div class="form-group">
                                    
                                    <input placeholder="Mobile Number:" type="text"  required="true" name="mobno" id="mobno" class="form-control add-listing_form">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control add-listing_form" placeholder="Password" name="password" id="password" required="true">
                                </div>
                                <a href="password-recovery.php">Forgot Password</a>
                           
                        </div>
                      
                        <div class="modal-footer justify-content-center">
                            <button  style= " background-color:#6037ac;" type="submit" class="btn btn-primary" name="login" id="login">LOG IN</button>
                        </div> </form>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="sign-up">
                        <div class="modal-header">
                            <h5 class="modal-title">DLMS</h5>
                            <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                                    <span class="ti-close"></span>
        </button>
                        </div>
                        <div class="modal-body">
                            <form  method="post" onsubmit="return checkpass();">
                                <div class="form-group">
                                    
                                    <input placeholder="Full name:" type="text" tabindex="1" required='true' name="fname" class="form-control">
                                </div>
                                <div class="form-group">
                                    
                                    <input placeholder="Mobile:" type="text" tabindex="3" name="mobno" required="true" maxlength="10" pattern="[0-9]+" class="form-control add-listing_form">
                                </div>
                                <div class="form-group">
                                    <input placeholder="password" type="password" tabindex="4" name="password" required="true" id="password" class="form-control add-listing_form">
                                </div>
                                
                            
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit"  style= " background-color:#6037ac;" class="btn btn-primary" name="signup">CREATE ACCOUNT</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--// Log In & Signup -->
    <!--//END HEADER -->