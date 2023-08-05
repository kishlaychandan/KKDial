<style>
    .main-sidebar{
      background: #6037ac;
    }
  </style>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link" style="font-weight:bold; font-size:22px;">
    

      <span class="brand-text font-weight-light" style="color: #e5a02a;">KKDial | Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/download.png" class="img-circle elevation-2" alt="User Image" style="color: #e5a02a;">
        </div>
        <div class="info">
<?php
$aid=$_SESSION['lssemsaid'];
$sql="SELECT AdminName from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
          <a  style="color: #e5a02a;" href="admin-profile.php" class="d-block">Welcome : <?php  echo $row->AdminName;?></a>
          <?php $cnt=$cnt+1;}} ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i style="color: #e5a02a;" class="nav-icon fas fa-plus-square"></i>
              <p style="color: #e5a02a;">
                Admin Setting
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin-profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;" >Profile Update</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="change-password.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">Logout</p>
                </a>
              </li>
             </ul>
          </li>   
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt" style="color: #e5a02a;"></i>
              <p style="color: #e5a02a;">
                Dashboard
               </p>
            </a>
        
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy" style="color: #e5a02a;"></i>
              <p style="color: #e5a02a;">
                Service Category
                <i class="fas fa-angle-left right" style="color: #e5a02a;"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-category.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-category.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">Manage Category</p>
                </a>
              </li>
             </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy" style="color: #e5a02a;"></i>
              <p style="color: #e5a02a;">
                Classified
                <i class="fas fa-angle-left right" style="color: #e5a02a;"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-adtype.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">Add Classified</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-adtype.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">Manage Classified</p>
                </a>
              </li>
             </ul>
          </li>

           <li class="nav-item has-treeview menu-open">
            <a href="listing.php" class="nav-link">
              <i class="nav-icon fas fa-book" style="color: #e5a02a;"></i>
              <p style="color: #e5a02a;">
                View Listing
               </p>
            </a>
        
          </li>
          <li class="nav-item has-treeview">
            <a href="reg-users.php" class="nav-link">
              <i class="nav-icon fas fa-users" style="color: #e5a02a;"></i>
              <p style="color: #e5a02a;">
                Reg Users
               </p>
            </a>
        
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users" style="color: #e5a02a;"></i>
              <p style="color: #e5a02a;">
                  Review
                  <i class="right fas fa-angle-left" style="color: #e5a02a;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="all-review.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">All Review</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="accepted-review.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">Accepted Review</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="rejected-review.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">Rejected Review</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book" style="color: #e5a02a;"></i>
              <p style="color: #e5a02a;">
                Pages
                <i class="fas fa-angle-left right" style="color: #e5a02a;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="about-us.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="contact-us.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">Contact Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="support-p.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">Support</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="faq-p.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">FAQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="login-detail.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">Login details</p>
                </a>
              </li>
            </ul>
          </li>

       <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book" style="color: #e5a02a;"></i>
              <p style="color: #e5a02a;">
                Enquiry
                <i class="fas fa-angle-left right" style="color: #e5a02a;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="read-enquiry.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">Read Enquiry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="unread-enquiry.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: #e5a02a;"></i>
                  <p style="color: #e5a02a;">Unread Enquiry</p>
                </a>
              </li>
            
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>