<?php
session_start();
include('includes/dbconnection.php');

$sql = "SELECT r.*, l.ListingTitle, l.logo FROM tblreview r INNER JOIN tbllisting l ON r.ListingId = l.ID";
$statement = $dbh->prepare($sql);
$statement->execute();
$reviews = $statement->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Listings and Reviews</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />
    <link href="css/set1.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include_once('includes/header.php');?>
    <section>
        <div class="container" style="margin-top: 50px; margin-bottom: 50px;">
            <div class="row">
                <?php foreach ($reviews as $key => $review): ?>
                    <?php if ($key % 3 == 0): ?>
                        </div><div class="row">
                    <?php endif; ?>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="images/<?php echo $review['logo']; ?>" class="img-fluid" height="100" width="300" style="border: 2px solid #F5F5F5; border-radius: 4px;" alt="Listing Image">
                                <h5 class="card-title"><?php echo htmlentities($review['ListingTitle']); ?></h5>
                                <p class="card-text"><?php echo $review['Message']; ?></p>
                                <footer class="blockquote-footer"><?php echo $review['Name']; ?></footer>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php include_once('includes/footer.php');?>
</body>
</html>
