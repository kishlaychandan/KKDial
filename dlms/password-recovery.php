<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);

if(isset($_POST['submit']))
  {
    $secretKey = '6LelINQlAAAAACN_GN51xkPS8XvwcaFMkhhkhw9X';
        $captcha = $_POST['g-recaptcha-response'];

        if(!$captcha){
          echo '<script>alert("Please check the the captcha");
		  window.location="javascript:history.go(-1)";
		  </script>';
          exit;
        }
    $mobile=$_POST['contactnumber'];
    $inputpwd=md5($_POST['password']);
    $ip = $_SERVER['REMOTE_ADDR'];
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);
    if(intval($responseKeys["success"]) !== 1) {
        echo '<script>alert("Please check the the captcha");
      window.location="javascript:history.go(-1)";
      </script>';
    } else { 
  $sql ="SELECT ID FROM tbluser WHERE  MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbluser set Password=:newpassword where MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $inputpwd, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert(' Mobile no is invalid');</script>"; 
}
    }
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- Page Title -->
    <title>KKDial || Password Recovery</title>
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
   <?php include_once('includes/header.php');?>
    <!--============================= SUBPAGE HEADER BG =============================-->
    <section class="subpage-bg">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="titile-block title-block_subpage">
                        <h2 style= " color:#6037ac;font-family: Times New Roman, Times, serif;font-size:50px;text-align:center;">Password Recovery</h2>
                        <p><a href="index.php"> Home</a> / Password Recovery</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SUBPAGE HEADER BG -->
    <!--============================= CONTACT =============================-->
    <section class="main-block">
        <div class="container-fluid">

            <div class="row no-gutters justify-content-center">

                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-form">

                                <form method="post">
                                    <div class="form-group">
                                        <label>Registered Mobile Number</label>
                                        <input type="text" name="contactnumber" class="form-control" maxlength="10" pattern="[0-9]+" required="true" placeholder="Registered Mobile Number">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input placeholder="New password" type="password" tabindex="4" name="password" required="true" id="password" class="form-control add-listing_form">
                                    </div>
                                    <div class="g-recaptcha" data-sitekey="6LelINQlAAAAAGxnP20aeCQ9upDoIq_x7t2iLRjN"></div>
                              
                                    <div class="form-group">
                                        <button type="submit" class="btn-submit" id="js-contact-btn" name="submit">Reset</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END CONTACT -->
    <!--============================= FOOTER =============================-->
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