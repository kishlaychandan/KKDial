<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['review']))
  {
        $secretKey = 'YOUR-SECRET-KEY';
            $captcha = $_POST['g-recaptcha-response'];
    
            if(!$captcha){
              echo '<script>alert("Please check the the captcha");
              window.location="javascript:history.go(-1)";
              </script>';
              exit;
            } 
    $lid=$_GET['lid'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $review=$_POST['reviewmessage'];
    $ip = $_SERVER['REMOTE_ADDR'];
            $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
            $responseKeys = json_decode($response,true);
        
            if(intval($responseKeys["success"]) !== 1) {
                echo '<script>alert("Please check the the captcha");
              window.location="javascript:history.go(-1)";
              </script>';
            } else
    
$sql="insert into tblreview(ListingID,Name,Email,Subject,Message) values(:lid,:name,:email,:subject,:reviewmessage)";
$query=$dbh->prepare($sql);

$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':reviewmessage',$review,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('Your review was sent successfully!.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
    #call{
        position: fixed;
        height:50px;
        width:50px;
        bottom:60px;
        left:25px;
        z-index: 999;
    }
    #media{
        position:fixed;
        height:50px;
        width:50px;
        bottom:110px;
        left:25px;
        z-index: 999;
}
    
</style>
    <!-- Required meta tags -->
    <link rel= "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Page Title -->
    <title>KKDial || Listing Detail</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- line icons -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Swipper Slider -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Hover Effects -->
    <link href="css/set1.css" rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
<?php include_once('includes/header.php');?>
<br>
<br>
    <!--============================= BOOKING =============================-->
    <?php
$lid=intval($_GET['lid']);
$sql="SELECT * from  tbllisting 
join tblcategory on tblcategory.ID=tbllisting.Category
where tbllisting.ID=:lid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':lid', $lid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
<div class = "container">
    <div align="center">
        <!-- Swiper -->
        <img src="images/<?php echo $row->Logo;?>"  class= "img-fluid" height="400"  width="800" style="border: 2px solid #F5F5F5; border-radius: 4px;
  padding: 5px;">
             
      
    </div>
</div>

    <!--//END BOOKING -->
    <!--============================= RESERVE A SEAT =============================-->

    <section class="reserve-block">
        <div class="container p-3 m-8 bg-white text-dark card">
            <div class="row g-0">
                <div class="col">
                    <h2 style= "text-align: center;"><strong><?php echo $row->ListingTitle;?></strong></h2>
                    <p class="text-dark"><strong>Category : <?php echo $row->Category;?></strong></p><br><br>
                    <p class="reserve-description card-text text-dark"><?php echo $row->Description;?></p>
                </div> 
            </div>
        </div>
    </section>
    <!--//END RESERVE A SEAT -->
    <!--============================= BOOKING DETAILS =============================-->
    <section class="booking-details_wrap">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-6 responsive-wrap" style= " background-color:#FF8C00; ">
                <div class="p-5 m-3  mb-1" style= " background-color:#FF8C00; ">
                    <div class="booking-checkbox_wrap"style= " background-color:#FF8C00; ">
                       
                        <div class="booking-checkbox">
                           <h6><p class="text-dark"><i class="fa-sharp fa-solid fa-location-dot"></i><strong> Address :</strong><br> <?php echo $row->Address;?>.</p></h6>
                            
                            <h6><p class="text-dark"><strong><i class="fa-solid fa-envelope"></i> Email :<br></strong> <?php echo $row->Email;?>.</p></h6>
                            <h6><p class="text-dark"><strong><i class="fa-brands fa-facebook"></i> Facebook Link :<br></strong><?php echo $row->FacebookLink;?>.</p></h6>
                            <h6><p class="text-dark"><strong><i class="fa-brands fa-twitter"></i> Twitter Link :<br></strong> <?php echo $row->TweeterLink;?>.</p></h6>
                            <h6><p class="text-dark"><strong><i class="fa-brands fa-linkedin"></i> Linkedin :<br></strong> <?php echo $row->Linkedinlink;?>.</p></h6>
                            <h6><p class="text-dark"><i class="fa-brands fa-whatsapp"></i><strong> Whatsapp :</strong><br> <?php echo $row->Phone;?>.</p></h6>
                            

                            <hr>
                            
                        </div></div>
                        
                   </div></div>
                   <div class="col-md-6 responsive-wrap" style= "background-color:#6037ac">
                    <div class="booking-checkbox_wrap booking-your-review" style= " background-color:#6037ac; ">
                        <h5 class="text-dark">Get in touch</h5>
                        <hr> <form enctype="multipart/form-data" method="post">
                        <div class="customer-review_wrap">
                           <div class="your-comment-wrap">
                           <div class="form-group">
                           <i class="fa-solid fa-user"></i>
                              <label for="form-message">Name*</label>
                              <input type="text" id="name" name="name" required="true" class="form-control add-listing_form">
                            </div></div>
                                
                                <div class="your-comment-wrap">
                                <div class="form-group">
                                        <i class="fa fa-envelope"></i>
                                     <label for="form-message">Email*</label>
                                         <input type="text" id="email" name="email" required="true" class="form-control add-listing_form">
                                  
                                </div></div>
                                <div class="your-comment-wrap">
                                <div class="form-group">
                                <i class="fa-sharp fa-solid fa-comment"></i>
                                     <label for="form-message">Subject*</label>
                                         <input type="text" id="subject" name="subject" required="true" class="form-control add-listing_form"> 
                                </div></div>
                                <div class="your-comment-wrap">
                                    <div class="form-group">
                                <i class="fa-solid fa-message"></i>
                                     <label for="form-message">Message*</label>
                                     <textarea  rows="5" name="reviewmessage" required="true" class="form-control"></textarea>
                            
                                </div></div>
                                <div class="g-recaptcha" data-sitekey="YOUR-SITE-KEY"></div>
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="your-rating-btn" style="padding-top: 20px; ">
                                           <button class="btn text-white" style = "background-color:#FF8C00;" type="submit" name="review">Send message</button>
                                        </div>
                                    </div>
                                </div></div>
                            </div></form>
                        </div>
                        <div id="media">
    <a href="https://wa.me/91<?php echo $row->Phone;?>" id="whatsapp"><img src='wtsapp.png' width="50px" id="whatsapp"/></a>
</div>
<div id="call">
    <a href="tel:+91-<?php echo $row->Phone;?>"><img src="call.png" width="50px" id="whatsapp"/></a>
</div>
                    </div>
                    <div class="booking-checkbox_wrap my-4"></section>
                    <?php include_once('includes/footer.php');?>
  
  <!-- jQuery, Bootstrap JS. -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <!-- Map JS (Please change the API key below. Read documentation for more info) -->
  <script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyDMTUkJAmi1ahsx9uCGSgmcSmqDTBF9ygg"></script>

              <section>     <?php
$lid=$_GET['lid'];
                    
$ret="select * from tblreview where ListingID='$lid' && Status='Review Accept'";
$query1 = $dbh -> prepare($ret);
$query1-> bindParam(':lid', $lid, PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($results1 as $row1)
{               ?>   
                        <hr> 
                        <div class="customer-review_wrap">
                           

                            <div class="customer-img">
                                <img src="images/customer-img1.jpg" class="img-fluid" alt="#">
                                
                                <p><?php echo $row1->Name;?></p>
                                
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="customer-review">
                                        <h5 ><?php echo $row1->Name;?></h5>
                                      
                                        <p><?php echo $row1->DateofReview;?></p>
                                    </div>
                                   
                                </div>
                                <p class="customer-text" ><?php echo $row1->Message;?>. </p>
                              
                               
                            </div>
                        </div>
                        <hr>
                    
                    <?php $cnt=$cnt+1;}} ?></div>
                </div>
                <div class="col-md-4 responsive-wrap">
                    <div class="contact-info">
                       
                        <img src="images/map.jpg" class="img-fluid" alt="#">
                        <div class="address">
                            
                            <p><strong>Company Name: </strong><?php echo $row->Company;?></p>
                            <span class="icon-location-pin"></span><p><strong>Permanent Address: </strong><?php echo $row->Address;?></p>
                            <span class="icon-location-pin"></span><p><strong>Temporary Address: </strong><?php echo $row->TemporaryAddress;?></p>


                            <br>Country: <?php echo $row->Country;?><br>State: <?php echo $row->State;?> <br>City: <?php echo $row->City;?> <br>Zipcode: <?php echo $row->Zipcode;?>
                        </div>
                        <div class="address">
                            <span class="icon-screen-smartphone"></span>
                            <p> +<?php echo $row->Phone;?></p>
                        </div>
                        <div class="address">
                            <span class="fa fa-envelope"></span>
                            <p><?php echo $row->Email;?></p>
                        </div>
                        <div class="address">
                            <span class="icon-link"></span>
                            <p><?php echo $row->CompanyWebsite;?></p>
                        </div>
                        
                   
                    </div>
                    <div class="follow">
                        <div class="follow-img">
                            <img src="images/follow-img.jpg" class="img-fluid" alt="#">
                            <h6><?php echo $row->OwnerName;?></h6>
                            <span><?php echo $row->Country;?></span>
                        </div>
                        <ul class="d-flex">
                            <li class=" flex-fill">
                                <h6>Facebook</h6>
                                <span><a href="<?php echo $row->FacebookLink;?>" target="_blank"><?php echo $row->FacebookLink;?></a></span>
                            </li></ul>
                             <ul class="d-flex">
                            <li class=" flex-fill">
                                <h6>Tweeter</h6>
                                <span><a href="<?php echo $row->TweeterLink;?>" target="_blank"><?php echo $row->TweeterLink;?></a></span>
                            </li>
                           
                        </ul>
                         <ul class="d-flex">
                           
                            <li class=" flex-fill">
                                <h6>Linkdn</h6>
                                <span>
                                    <a href="<?php echo $row->Linkedinlink;?>" target="_blank"><?php echo $row->Linkedinlink;?></a>

                                </span>
                            </li></ul>
                             <ul class="d-flex">
                            <li class=" flex-fill">
                                <h6>Google Plus</h6>
                                <span>
                                    <a href="<?php echo $row->Googlepluslink;?>" target="_blank"><?php echo $row->Googlepluslink;?></a>

                                </span>
                            </li>
                         
                        </ul>
                      
                    </div><?php $cnt=$cnt+1;}}?>
                </div>
            </div>
        </div>
    </section>
    <!--//END BOOKING DETAILS -->
   <?php include_once('includes/footer.php');?>

    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Magnific popup JS -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- Swipper Slider JS -->
    <script src="js/swiper.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>
        if ($('.image-link').length) {
            $('.image-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
        if ($('.image-link2').length) {
            $('.image-link2').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
    </script>


</body>

</html><?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['review']))
  {
        $secretKey = '6LelINQlAAAAACN_GN51xkPS8XvwcaFMkhhkhw9X';
            $captcha = $_POST['g-recaptcha-response'];
    
            if(!$captcha){
              echo '<script>alert("Please check the the captcha");
              window.location="javascript:history.go(-1)";
              </script>';
              exit;
            } 
    $lid=$_GET['lid'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $review=$_POST['reviewmessage'];
    $ip = $_SERVER['REMOTE_ADDR'];
            $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
            $responseKeys = json_decode($response,true);
        
            if(intval($responseKeys["success"]) !== 1) {
                echo '<script>alert("Please check the the captcha");
              window.location="javascript:history.go(-1)";
              </script>';
            } else
    
$sql="insert into tblreview(ListingID,Name,Email,Subject,Message) values(:lid,:name,:email,:subject,:reviewmessage)";
$query=$dbh->prepare($sql);

$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':reviewmessage',$review,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('Your review was sent successfully!.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <link rel= "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Page Title -->
    <title>KKDial || Listing Detail</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- line icons -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Swipper Slider -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Hover Effects -->
    <link href="css/set1.css" rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
<?php include_once('includes/header.php');?>
<br>
<br>
    <!--============================= BOOKING =============================-->
    <?php
$lid=intval($_GET['lid']);
$sql="SELECT * from  tbllisting 
join tblcategory on tblcategory.ID=tbllisting.Category
where tbllisting.ID=:lid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':lid', $lid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
<div class = "container">
    <div align="center">
        <!-- Swiper -->
        <img src="images/<?php echo $row->Logo;?>"  class= "img-fluid" height="400"  width="800" style="border: 2px solid #F5F5F5; border-radius: 4px;
  padding: 5px;">
             
      
    </div>
</div>

    <!--//END BOOKING -->
    <!--============================= RESERVE A SEAT =============================-->

    <section class="reserve-block">
        <div class="container p-3 m-8 bg-white text-dark card">
            <div class="row g-0">
                <div class="col">
                    <h2 style= "text-align: center;"><strong><?php echo $row->ListingTitle;?></strong></h2>
                    <p class="text-dark"><strong>Category : <?php echo $row->Category;?></strong></p><br><br>
                    <p class="reserve-description card-text text-dark"><?php echo $row->Description;?></p>
                </div> 
            </div>
        </div>
    </section>
    <!--//END RESERVE A SEAT -->
    <!--============================= BOOKING DETAILS =============================-->
    <section class="booking-details_wrap">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-6 responsive-wrap" style= " background-color:#FF8C00; ">
                <div class="p-5 m-3  mb-1" style= " background-color:#FF8C00; ">
                    <div class="booking-checkbox_wrap"style= " background-color:#FF8C00; ">
                       
                        <div class="booking-checkbox">
                           <h6><p class="text-dark"><i class="fa-sharp fa-solid fa-location-dot"></i><strong> Address :</strong><br> <?php echo $row->Address;?>.</p></h6>
                            <h6><p class="text-dark"><i class="fa-brands fa-whatsapp"></i><strong> Whatsapp :</strong><br> <?php echo $row->Phone;?>.</p></h6>
                            <h6><p class="text-dark"><strong><i class="fa-solid fa-envelope"></i> Email :<br></strong> <?php echo $row->Email;?>.</p></h6>
                            <h6><p class="text-dark"><strong><i class="fa-brands fa-facebook"></i> Facebook Link :<br></strong><?php echo $row->FacebookLink;?>.</p></h6>
                            <h6><p class="text-dark"><strong><i class="fa-brands fa-twitter"></i> Twitter Link :<br></strong> <?php echo $row->TweeterLink;?>.</p></h6>
                            <h6><p class="text-dark"><strong><i class="fa-brands fa-linkedin"></i> Linkedin :<br></strong> <?php echo $row->Linkedinlink;?>.</p></h6>

                            <hr>
                        </div></div>
                        
                   </div></div>
    
                   <div class="col-md-6 responsive-wrap" style= "background-color:#6037ac">
                    <div class="booking-checkbox_wrap booking-your-review" style= " background-color:#6037ac; ">
                        <h5 class="text-dark">Get in touch</h5>
                        <hr> 
                        <script src="/dlms/ckeditor/ckeditor.js"></script>
                        <form enctype="multipart/form-data" method="post">
                        <div class="customer-review_wrap">
                           <div class="your-comment-wrap">
                           <div class="form-group">
                           <i class="fa-solid fa-user"></i>
                              <label for="form-message">Name*</label>
                              <input type="text" id="name" name="name" required="true" class="form-control add-listing_form">
                            </div></div>
                                
                                <div class="your-comment-wrap">
                                <div class="form-group">
                                        <i class="fa fa-envelope"></i>
                                     <label for="form-message">Email*</label>
                                         <input type="text" id="email" name="email" required="true" class="form-control add-listing_form">
                                  
                                </div></div>
                                <div class="your-comment-wrap">
                                <div class="form-group">
                                <i class="fa-sharp fa-solid fa-comment"></i>
                                     <label for="form-message">Subject*</label>
                                         <input type="text" id="subject" name="subject" required="true" class="form-control add-listing_form"> 
                                </div></div>
                                <div class="your-comment-wrap">
                                    <div class="form-group">
                                <i class="fa-solid fa-message"></i>
                                     <label for="form-message">Message*</label>
                                     <textarea id="editor" class="form-control" name="reviewmessage" rows="5" required="true" ></textarea>
                            
                                </div></div>
                                <div class="g-recaptcha" data-sitekey="YOUR-SITE-KEY"></div>
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="your-rating-btn" style="padding-top: 20px; ">
                                           <button class="btn text-white" style= " background-color:#6037ac;" type="submit" name="review">Send message</button>
                                        </div>
                                    </div>
                                </div></div>
                            </div>
                            <script> CKEDITOR.replace('editor');
                            </script>
                        </form>
                        </div>
                    </div>
                    <div class="booking-checkbox_wrap my-4"></section>
                    <?php include_once('includes/footer.php');?>
  
  <!-- jQuery, Bootstrap JS. -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <!-- Map JS (Please change the API key below. Read documentation for more info) -->
  <script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyDMTUkJAmi1ahsx9uCGSgmcSmqDTBF9ygg"></script>

              <section>     <?php
$lid=$_GET['lid'];
                    
$ret="select * from tblreview where ListingID='$lid' && Status='Review Accept'";
$query1 = $dbh -> prepare($ret);
$query1-> bindParam(':lid', $lid, PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($results1 as $row1)
{               ?>   
                        <hr> 
                        <div class="customer-review_wrap">
                           

                            <div class="customer-img">
                                <img src="images/customer-img1.jpg" class="img-fluid" alt="#">
                                
                                <p><?php echo $row1->Name;?></p>
                                
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="customer-review">
                                        <h5 ><?php echo $row1->Name;?></h5>
                                      
                                        <p><?php echo $row1->DateofReview;?></p>
                                    </div>
                                   
                                </div>
                                <p class="customer-text" ><?php echo $row1->Message;?>. </p>
                              
                               
                            </div>
                        </div>
                        <hr>
                    
                    <?php $cnt=$cnt+1;}} ?></div>
                </div>
                <div class="col-md-4 responsive-wrap">
                    <div class="contact-info">
                       
                        <img src="images/map.jpg" class="img-fluid" alt="#">
                        <div class="address">
                            
                            <p><strong>Company Name: </strong><?php echo $row->Company;?></p>
                            <span class="icon-location-pin"></span><p><strong>Permanent Address: </strong><?php echo $row->Address;?></p>
                            <span class="icon-location-pin"></span><p><strong>Temporary Address: </strong><?php echo $row->TemporaryAddress;?></p>


                            <br>Country: <?php echo $row->Country;?><br>State: <?php echo $row->State;?> <br>City: <?php echo $row->City;?> <br>Zipcode: <?php echo $row->Zipcode;?>
                        </div>
                        <div class="address">
                            <span class="icon-screen-smartphone"></span>
                            <p> +<?php echo $row->Phone;?></p>
                        </div>
                        <div class="address">
                            <span class="fa fa-envelope"></span>
                            <p><?php echo $row->Email;?></p>
                        </div>
                        <div class="address">
                            <span class="icon-link"></span>
                            <p><?php echo $row->CompanyWebsite;?></p>
                        </div>
                        
                   
                    </div>
                    <div class="follow">
                        <div class="follow-img">
                            <img src="images/follow-img.jpg" class="img-fluid" alt="#">
                            <h6><?php echo $row->OwnerName;?></h6>
                            <span><?php echo $row->Country;?></span>
                        </div>
                        <ul class="d-flex">
                            <li class=" flex-fill">
                                <h6>Facebook</h6>
                                <span><a href="<?php echo $row->FacebookLink;?>" target="_blank"><?php echo $row->FacebookLink;?></a></span>
                            </li></ul>
                             <ul class="d-flex">
                            <li class=" flex-fill">
                                <h6>Tweeter</h6>
                                <span><a href="<?php echo $row->TweeterLink;?>" target="_blank"><?php echo $row->TweeterLink;?></a></span>
                            </li>
                           
                        </ul>
                         <ul class="d-flex">
                           
                            <li class=" flex-fill">
                                <h6>Linkdn</h6>
                                <span>
                                    <a href="<?php echo $row->Linkedinlink;?>" target="_blank"><?php echo $row->Linkedinlink;?></a>

                                </span>
                            </li></ul>
                             <ul class="d-flex">
                            <li class=" flex-fill">
                                <h6>Google Plus</h6>
                                <span>
                                    <a href="<?php echo $row->Googlepluslink;?>" target="_blank"><?php echo $row->Googlepluslink;?></a>

                                </span>
                            </li>
                         
                        </ul>
                      
                    </div><?php $cnt=$cnt+1;}}?>
                </div>
            </div>
        </div>
    </section>
    <!--//END BOOKING DETAILS -->
   <?php include_once('includes/footer.php');?>

    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Magnific popup JS -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- Swipper Slider JS -->
    <script src="js/swiper.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>
        if ($('.image-link').length) {
            $('.image-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
        if ($('.image-link2').length) {
            $('.image-link2').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
    </script>


</body>

</html>