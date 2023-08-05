<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['submit']))
{
    $secretKey = 'YOUR SECRET KEY';
        $captcha = $_POST['g-recaptcha-response'];

        if(!$captcha){
          echo '<script>alert("Please check the the captcha");
		  window.location="javascript:history.go(-1)";
		  </script>';
          exit;
        } 

    $name=$_POST['name'];
    $email=$_POST['email'];
    $mes=$_POST['message'];
    $message= 'Hello I am '.$name.' my Email is '.$email.'<br>'.$mes;
    $ip = $_SERVER['REMOTE_ADDR'];
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);

    if(intval($responseKeys["success"]) !== 1) {
        echo '<script>alert("Please check the the captcha");
      window.location="javascript:history.go(-1)";
      </script>';
    } else { 

        $sql= "insert into tblcontact(Name,Email,Message) value(:name,:email,:message)";
        $query=$dbh->prepare($sql);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':message',$message,PDO::PARAM_STR);
    $query->execute();
       $LastInsertId=$dbh->lastInsertId();
       if ($LastInsertId>0) {
        require "PHPMailer/Exception.php";
        require "PHPMailer/SMTP.php";
        require "PHPMailer/PHPMailer.php";
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = "gooogleceo0011@gmail.com";
            $mail->Password = "YOUR_PASSWORD";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
            $mail->Port = 587; 
            $mail->setFrom('gooogleceo0011@gmail.com', 'kishlay');
            $mail->addAddress('gooogleceo0011@gmail.com');
            $mail->addAddress('kishlaychandan00@gmail.com');
            $mail->isHTML(true);
            $mail->Subject = 'Thank You';
            $mail->Body = $message;
            $mail->AltBody = strip_tags($message);
            $mail->send();
            
        echo "<script>alert('Your message was sent successfully!.');</script>";
            echo "<script>window.location.href ='contact.php'</script>";
        } catch (Exception $e) {
            $error = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            echo '<script>alert("'.$error.'")</script>';
        }
        
       }
      else
        {
             echo '<script>alert("Something Went Wrong. Please try again")</script>';
        } 
    
      
    
    } 
    }
      ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- Page Title -->
    <title>KKDial || Contact Us</title>
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
                        <h2 style= " color:#6037ac;font-family: Times New Roman, Times, serif;font-size:50px;text-align:center;">Contact Us</h2>
                        <p><a href="index.php"> Home</a> / Contact</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SUBPAGE HEADER BG -->
    <!--============================= CONTACT =============================-->

    <section class="main-block">
        <div class="container-fluid">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="address-box">
                                <span class="fa fa-location-dot" style="color: #e5a02a;"></span>
                                <?php

$sql= "SELECT * from tblpage where PageType= 'contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $row)
{               ?>  
                                <h5 style= " color:#6037ac;">Address</h5>
                                <p><?php  echo $row->PageDescription;?></p>
                             </div>
                        </div>
                        <div class="col-md-4">
                            <div class="address-box">
                                <span class="fa fa-mobile-phone" style="color: #e5a02a;"></span>
                               
                                <h5 style= " color:#6037ac;">Contact Number</h5>
                                <p><?php  echo $row->MobileNumber;?></p>
                            </div>
                        </div>

                         <div class="col-md-4">
                            <div class="address-box">
                                <span class="fa fa-envelope" style="color: #e5a02a;"></span>
                                <h5 style= " color:#6037ac;">Email</h5>
                                <p><?php  echo $row->Email;?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><?php } ?>
            <div class="row">
                <div class="col-md-6">
                    <img src="/DLMS/dlms/images/Contact.jpg" style="width:100%">
                </div>
            <div class="col-md-6">
                <h2 class="text-center pt-5 mb-5" style= "font-family: Times New Roman, Times, serif;font-size:50px;">Send us a Message</h2>
                <div class="row no-gutters justify-content-center">
                    <div class="col-md-10 bg-light">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-form pl-4 py-4">
                                    <script src="/dlms/ckeditor/ckeditor.js"></script>
                                    <form method="post">
                                        <div class="form-group">
                                            <i class="fa-solid fa-user"></i>
                                            <label style="color: #e5a02a;">Name</label>
                                            <input type="text" name="name" class="form-control" required="true">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa-solid fa-envelope"></i>
                                            <label style="color: #e5a02a;">Email address</label>
                                            <input type="email" name="email" class="form-control" required="true">
                                        </div>
                                   
                                        <div class="form-group">
                                            <i class="fa-solid fa-comment"></i>
                                            <label style="color: #e5a02a;">Message</label>
                                            <textarea  id="editor" name="message" class="form-control" rows="3" required="true"></textarea>
                                        </div>
                                        <div class="g-recaptcha" data-sitekey="YOUR SITE KEY"></div>

                                        <div class="form-group">
                                            <button type="submit" class="btn-submit" id="js-contact-btn" name="submit">SEND MESSAGE</button>
                                        </div>
                                        <script> CKEDITOR.replace('editor');
                                        </script>
                                    
                                    </form>
                                </div>
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