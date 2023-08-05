<?php include('includes/dbconnection.php');?>
<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['lssemsuid']==0)) {
echo "<script>alert('Please login for add listing.');</script>";
echo "<script>window.location.href ='logout.php'</script>";
  } else{
    
?>
<!--  -->
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Page Title -->
        <title>KKDial|| Listed</title>
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
        <style type="text/css">
            .error{
     font-size: 12px;
    color: red;
}
        </style>
    </head>
    <body>
    <?php include_once('includes/header.php');?>
  
        
        <!--============================= SUBPAGE HEADER BG =============================-->
        <section class="subpage-bg">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="titile-block title-block_subpage">
                            <h2 style= " color:#6037ac;font-family: Times New Roman, Times, serif;font-size:50px;text-align:center;">Add Listing</h2>
                            <p> <a href="index.php"> Home</a> / Add Listing</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// SUBPAGE HEADER BG -->
        <!--============================= ADD LISTING =============================-->
        <section class="main-block">
            <div class="container-fluid">
            <script src="/dlms/ckeditor/ckeditor.js"></script>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="listing-wrap">
                            <form method="post" enctype="multipart/form-data" id="my-form" action="">
                                <!-- General Information -->
                                <div class="listing-title">
                                    <span class="ti-files"></span>
                                    <h4 style= "font-family: Gill Sans, Times, serif;font-size:30px;text-align:center;">General Information</h4>
                                    <p>Write Something General Information About Your Listing</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa-solid fa-store"></i>
                                            <label>Listing Title</label>
                                            <input type="text" class="form-control add-listing_form" name="listingtitle" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa-solid fa-pen"></i>
                                            <label>Keyword</label>
                                            <input type="text" class="form-control add-listing_form" name="keywords" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <i class="fa-solid fa-list"></i>
                                        <label>Category</label>
                                        <select class="form-control add-listing_form" name="category" required="true">
       <?php 

$sql2 = "SELECT * from   tblcategory ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->ID);?>"><?php echo htmlentities($row->Category);?></option>
 <?php } ?> 
    </select>
                                    </div>
                                </div>
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa fa-light fa-globe"></i>
                                            <label>Website</label>
                                            <input type="text" class="form-control add-listing_form" name="website">
                                        </div>
                                    </div>
                                </div>
                                <!--//End General Information -->
                                <!-- Add Location -->
                                <div class="listing-title">
                                    <span class="ti-location-pin"></span>
                                    <h4 style= "font-family: Gill Sans, Times, serif;font-size:30px;text-align:center;">Add Location</h4>
                                    <p>Write Something General Information About Your Listing</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa fa-address-book"></i>
                                            <label>Address</label>
                                            <input type="text" class="form-control add-listing_form" name="add" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa fa-address-book"></i>
                                            <label>Temporary Address</label>
                                            <input type="text" class="form-control add-listing_form" name="tadd" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa fa-city"></i>
                                            <label>City</label>
                                            <input type="text" class="form-control onlytext add-listing_form" name="city" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa fa-flag"></i>
                                            <label>State</label>
                                            <input type="text" class="form-control onlytext add-listing_form" name="state" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa fa-earth-americas"></i>
                                            <label>Country</label>
                                           <input type="text" class="form-control onlytext" name="country" pattern="[A-Za-z]+" required>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa fa-location-pin"></i>
                                            <label>Zip-Code</label>
                                            <input type="text" class="form-control add-listing_form" name="zipcode" id="user_pincode" required="true">
                                            <span id="Message2"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--//End Add Location -->
                                <!-- Full Details -->
                                <div class="listing-title">
                                    <span class="ti-location-pin"></span>
                                    <h4 style= "font-family: Gill Sans, Times, serif;font-size:30px;text-align:center;">Full Details</h4>
                                    <p>Write Something General Information About Your Listing</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa-solid fa-user"></i>
                                            <label>Owner Name</label>
                                            <input type="text" class="form-control add-listing_form" name="ownername" id="user_name"required="true">
                                            <span id="Message3"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa fa-envelope"></i>
                                            <label>Email</label>
                                            <input type="email" class="form-control add-listing_form" name="email" id="user_email" required="true">
                                            <span id="Message1"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa fa-phone"></i>
                                            <label>Phone</label>
                                            <input type="text" class="form-control add-listing_form" name="phone" id="user_phone" required="true" maxlength="10" pattern="[0-9]+">
                                            <span id="Message4"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa fa-light fa-globe"></i>
                                            <label>Website</label>
                                            <input type="text" class="form-control add-listing_form" name="comwebsite">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa-solid fa-user-tie"></i>
                                            <label>Owner Designation</label>
                                            <input type="text" class="form-control add-listing_form" name="ownerdesi" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa-sharp fa-solid fa-building"></i>
                                            <label>Company</label>
                                            <input type="text" class="form-control add-listing_form" name="company" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa-brands fa-facebook-f"></i>
                                            <label>Facebook Link</label>
                                            <input type="text" class="form-control add-listing_form" name="flink">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa-brands fa-twitter"></i>
                                            <label>Twitter User</label>
                                            <input type="text" class="form-control add-listing_form" name="twitterlink">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                            <label>Linked In</label>
                                            <input type="text" class="form-control add-listing_form" name="linkedin">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <label for="exampleFormControlTextarea1">Description</label>
                                            <textarea class="form-control add-listing_form" id="editor" rows="3" name="description" required="true"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--//End Full Details -->
                                <!-- Add Gallery -->
                                <div class="listing-title">
                                    <span class="ti-gallery"></span>
                                    <h4 style= "font-family: Gill Sans, Times, serif;font-size:30px;text-align:center;">Add featured Image</h4>
                                    <p>Write Something General Information About Your Listing</p>
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
                                <!--//End Add Gallery -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-wrap btn-wrap2">
                                            <button type="submit" class="btn btn-primary" name="submit" id="submit">SUBMIT LISTING</button>
                                        </div>
                                    </div>
                                </div>
                                <!--//End Opening Hours -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script> CKEDITOR.replace('editor');
            </script>
        </section>
        <!--//END ADD LISTING -->
        <?php include_once('includes/footer.php');?>
        <!-- jQuery, Bootstrap JS. -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/validate.js"></script>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js?ver=1.16.0'></script>
        <script>
          $('.onlytext').on('keydown', function(event) {
  const keyCode = event.which;
  
  if ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105)) {
    event.preventDefault();
  }
});


        </script>
        <script>
    jQuery.validator.addMethod(
  "name_regex",
  function (value, element) {
    return this.optional(element) || /^[A-z ]+$/i.test(value);
  },
  "Name with only a-Z only"
);
jQuery.validator.addMethod(
  "phone_regex",
  function (value, element) {
    return this.optional(element) || /^[0-9\.\-_]{10,30}$/i.test(value);
  },
  "Phone Number with only 0-9, Minlength: 10"
);
 jQuery.validator.addMethod(
  "pincode_regex",
  function (value, element) {
    return this.optional(element) || /^[1-9][0-9]{5}$/i.test(value);
  },
  "Enter valid pin of 6 digit"
);



$("#my-form").validate({
  rules: {
    name: {
      required: true,
      minlength: 3,
      name_regex: true
    },
    
    zipcode: {
      required: true,
      pincode_regex: true
    },
    
    email: {
      required: true,
      email: true
    },
    phone: {
      required: true,
      phone_regex: true,
      minlength: 10
    },
    keywords: {
      required: true,

    },
    country: {
      required: true,
       minlength: 3

    }
   
  },

  messages: {
    name: {
      required: "The name field is mandatory!"
    },
   
    email: {
      required: "The Email is required!",
      email: "Please enter a valid email address!"
    },
    phone: {
      required: "The phone field is mandatory!"
    },
    listingtitle: {
      required: "The listing field is mandatory!"
    },
    country: {
      required: "Enter valid Country"
    }
    
  },
  submitHandler: function (form) {
    form.submit();
  }
});

</script>


        <?php
        if(isset($_POST['submit']))
        {
        
        $lssemsuid=$_SESSION['lssemsuid'];
        $listingtitle=$_POST['listingtitle'];
        $keywords=$_POST['keywords'];
        $category=$_POST['category'];
        $website=$_POST['website'];
        $category=$_POST['category'];
        
        $add=$_POST['add'];
        $tadd=$_POST['tadd'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $country=$_POST['country'];
        
        $zipcode=$_POST['zipcode'];
        $ownername=$_POST['ownername'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $comwebsite=$_POST['comwebsite'];
        
        $ownerdesi=$_POST['ownerdesi'];
        $company=$_POST['company'];
        $flink=$_POST['flink'];
        $twitterlink=$_POST['twitterlink'];
        $googlelink=$_POST['googlelink'];
        
        $linkedin=$_POST['linkedin'];
        $description=$_POST['description'];
        
        $logo=$_FILES["logo"]["name"];
        $extension = substr($logo,strlen($logo)-4,strlen($logo));
        $allowed_extensions = array(".jpg","jpeg",".png",".gif");
        if(!in_array($extension,$allowed_extensions))
        {
        echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        }
        else
        {
        
        $logo=md5($logo).time().$extension;
        move_uploaded_file($_FILES["logo"]["tmp_name"],"images/".$logo);
        $sql="insert into tbllisting(UserID,ListingTitle,Keyword,Category,Website,Address,TemporaryAddress,City,State,Country,Zipcode,OwnerName,Email,Phone,CompanyWebsite,OwnerDesignation,Company,FacebookLink,TweeterLink,Googlepluslink,Linkedinlink,Description,Logo) values(:lssemsuid,:listingtitle,:keywords,:category,:website,:add,:tadd,:city,:state,:country,:zipcode,:ownername,:email,:phone,:comwebsite,:ownerdesi,:company,:flink,:twitterlink,:googlelink,:linkedin,:description,:logo)";
        $query=$dbh->prepare($sql);
        $query->bindParam(':lssemsuid',$lssemsuid,PDO::PARAM_STR);
        $query->bindParam(':listingtitle',$listingtitle,PDO::PARAM_STR);
        $query->bindParam(':keywords',$keywords,PDO::PARAM_STR);
        $query->bindParam(':category',$category,PDO::PARAM_STR);
        $query->bindParam(':website',$website,PDO::PARAM_STR);
        $query->bindParam(':add',$add,PDO::PARAM_STR);
        $query->bindParam(':tadd',$tadd,PDO::PARAM_STR);
        $query->bindParam(':city',$city,PDO::PARAM_STR);
        $query->bindParam(':state',$state,PDO::PARAM_STR);
        $query->bindParam(':country',$country,PDO::PARAM_STR);
        $query->bindParam(':zipcode',$zipcode,PDO::PARAM_STR);
        $query->bindParam(':ownername',$ownername,PDO::PARAM_STR);
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->bindParam(':phone',$phone,PDO::PARAM_STR);
        $query->bindParam(':comwebsite',$comwebsite,PDO::PARAM_STR);
        $query->bindParam(':ownerdesi',$ownerdesi,PDO::PARAM_STR);
        $query->bindParam(':company',$company,PDO::PARAM_STR);
        $query->bindParam(':flink',$flink,PDO::PARAM_STR);
        $query->bindParam(':twitterlink',$twitterlink,PDO::PARAM_STR);
        $query->bindParam(':googlelink',$googlelink,PDO::PARAM_STR);
        $query->bindParam(':linkedin',$linkedin,PDO::PARAM_STR);
        $query->bindParam(':description',$description,PDO::PARAM_STR);
        $query->bindParam(':logo',$logo,PDO::PARAM_STR);
        
        $query->execute();
        $LastInsertId=$dbh->lastInsertId();
        if ($LastInsertId>0) {
            echo '<script>alert("Listing Detail has been added.")</script>';
            echo "<script>window.location.href ='add-listing.php'</script>";
            }
            else
                    {
                    echo '<script>alert("Something Went Wrong. Please try again")</script>';
            }
        }
        }
        ?>
        
    </body>
</html><?php } ?>