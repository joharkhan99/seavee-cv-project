<header class="_page">
  <!-- big screen nav -->
  <nav class="navbar navbar-expand-lg" aria-label="Eighth navbar example">
    <div class="container-lg">

      <a class="navbar-brand" href="index.php">
        SeaVee
      </a>

      <div class="collapse navbar-collapse" id="navbarsExample07">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="categories.php">Explore</a>
          </li>

          <?php if (!isset($_SESSION['userkey'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link join" href="registration.php">Join</a>
            </li>
          <?php endif; ?>
          <?php if (isset($_SESSION['userkey'])) : ?>
            <li class="nav-item">
              <a class="nav-link" title="dashboard" href="dashboard/"><i class="far fa-user-circle"></i></a>
            </li>
          <?php endif; ?>

        </ul>
      </div>
    </div>
  </nav>
  <!-- ./big screen nav -->

  <!-- mobnav -->
  <div class="mobile-nav">
    <div id="body-overlay"></div>

    <nav class="real-menu" role="navigation">
      <div class="nav_header">
        <?php if (!isset($_SESSION['userkey'])) { ?>
          <a href="registration.php">Join SeaVi</a>
        <?php } else { ?>
          <a href="dashboard/">Dashboard</a>
        <?php } ?>

      </div>
      <ul>
        <li><a href="login.php">Sign in</a></li>
        <li>
          <button class="dropdown-btn">
            Browse Categories
            <i class="fas fa-angle-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="categories.php">Data Scientist</a>
            <a href="categories.php">App Developer</a>
            <a href="categories.php">Game Developer</a>
            <a href="categories.php">UX/UI Designer</a>
            <a href="categories.php">Book Cover Designer</a>
            <a href="categories.php">Data Entry Specialist</a>
            <a href="categories.php">Engineer</a>
            <a href="categories.php">Lawyer</a>
            <a href="categories.php">Doctor</a>
            <a href="categories.php">Social Media Manager</a>
          </div>
        </li>
        <li><a href="categories.php">Explore</a></li>
      </ul>
      <div class="nav_header">
        <h6>General</h6>
      </div>
      <ul>
        <li><a href="index.php">Home</a></li>
        <!-- <li><a href="javascript:void(0)">About</a></li> -->
      </ul>
    </nav>

    <button id="open-mob-menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</header>