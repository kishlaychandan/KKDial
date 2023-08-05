<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lssemsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$ofsmsaid=$_SESSION['lssemsaid'];
 $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
$sql="update tblpage set PageTitle=:pagetitle,PageDescription=:pagedes where  PageType='aboutus'";
$query=$dbh->prepare($sql);
$query->bindParam(':pagetitle',$pagetitle,PDO::PARAM_STR);
$query->bindParam(':pagedes',$pagedes,PDO::PARAM_STR);

$query->execute();
echo '<script>alert("About us has been updated")</script>';


  }
  ?>

<!DOCTYPE html>
<html>
<head>
  
  <title>KKDial| Login Details</title>
    
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include_once('includes/header.php');?>

 
<?php include_once('includes/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Login Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Login Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
    
        <?php
        // Fetch login details from logindata table
        $sql = "SELECT ld.name, ld.datetime, tu.FullName, tu.MobileNumber
                FROM logindata ld
                INNER JOIN tbluser tu ON ld.name = tu.MobileNumber
                ORDER BY ld.datetime DESC";

        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        // Display login details in a table
        if (!empty($results)) {
            echo '<div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Phone Number</th>
                                <th>Login Datetime</th>
                            </tr>
                        </thead>
                        <tbody>';

            foreach ($results as $result) {
                $username = $result['FullName'];
                $phoneNumber = $result['MobileNumber'];
                $loginDatetime = $result['datetime'];

                echo "<tr>
                        <td>$username</td>
                        <td>$phoneNumber</td>
                        <td>$loginDatetime</td>
                    </tr>";
            }

            echo '</tbody>
                </table>
            </div>';
        } else {
            // No login details found
            echo "No login details available.";
        }
        ?>
    </div><!-- /.container-fluid -->
</section>

<style>
    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background-color: #fff;
    }

    .table thead th {
        background-color: #f2f2f2;
        color: #333;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: none;
    }

    .table tbody tr {
        background-color: #fff;
        border-bottom: 1px solid #ddd;
    }

    .table tbody td {
        padding: 12px 15px;
        color: #555;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    @media (max-width: 767px) {
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    }
</style>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include_once('includes/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php }  ?>