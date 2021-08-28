<div class="container-scroller">
  <?php
  $userkey = $_SESSION['userkey'];
  $role = $_SESSION['role'];
  if ($role == "candidate")
    $query = mysqli_query($connection, "SELECT * FROM users INNER JOIN personal_info ON users.userkey=personal_info.userkey WHERE users.userkey='$userkey'");
  else
    $query = mysqli_query($connection, "SELECT * FROM users INNER JOIN employee_info ON users.userkey=employee_info.employerkey WHERE users.userkey='$userkey'");
  $row = mysqli_fetch_assoc($query);
  ?>


  <!-- top nav partial:partials/_navbar.php -->
  <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
        <a class="navbar-brand brand-logo" href="index.php">
          <img src="../img/logo.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.php">
          <img src="../img/logo.png" alt="logo" />
        </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
      <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text">Welcome, <span class="text-black fw-bold"><?php echo $row['name'] ?></span></h1>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">

        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">

            <?php
            if (empty($row['image'])) {
              $image = explode("../", "../../profiles/default.png");
            } else {
              $image = explode("../", $row['image']);
            }
            ?>

            <img class="img-xs rounded-circle" src="../<?php echo $image[2] ?>" style="object-fit: cover;" alt="Profile image"> </a>


          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="../<?php echo $image[2] ?>" style="object-fit: cover;" alt="Profile image">

              <p class="mb-1 mt-3 font-weight-semibold"><?php echo $row['name'] ?></p>
              <p class="fw-light text-muted mb-0"><?php echo $row['email'] ?></p>
            </div>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My
              Profile</a>
            <!-- <a href="chat-users.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i>
              Messages</a> -->
            <a href="logout.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- sidebar partial:partials/_sidebar.php -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">

        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="mdi mdi-home"></i>
            <span class="menu-title">Home</span>
          </a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link" href="edit-profile.php">
            <i class="mdi mdi-account-edit"></i>
            <span class="menu-title">Edit Profile</span>
          </a>
        </li>

        <li class="nav-item mt-2">

          <?php
          if ($_SESSION['role'] == "employer") {
          ?>
            <a class="nav-link" href="favorites.php">
              <i class="mdi mdi-account-heart"></i>
              <span class="menu-title">Favorites</span>
            </a>
          <?php
          } else {
          ?>
            <a class="nav-link" href="reviews.php">
              <i class="mdi mdi-comment-account"></i>
              <span class="menu-title">Reviews</span>
            </a>
          <?php
          }
          ?>


        </li>

        <!-- <li class="nav-item mt-2">
          <a class="nav-link" href="chat-users.php">
            <i class="mdi mdi-message-text"></i>
            <span class="menu-title">Messages</span>
          </a>
        </li> -->

      </ul>
    </nav>