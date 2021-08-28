<?php include "includes/header.php" ?>
<?php include "ajax/db.php" ?>
<?php
if (!isset($_SESSION['userkey']) || $_SESSION['role'] != "candidate") {
  header("Location: ../login.php");
}
?>


<?php include "includes/nav.php" ?>

<?php
$userkey = $_SESSION['userkey'];
$query = mysqli_query($connection, "SELECT * FROM reviews INNER JOIN users ON reviews.employerkey=users.userkey WHERE reviews.userkey='$userkey'");
?>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row reviews">

      <div class="col-md-12 mb-5 comp_heading">
        <h4 class="mb-0 py-2">People Who Reviewed On Your Profile</h4>
      </div>

      <?php while ($row = mysqli_fetch_assoc($query)) : ?>

        <div class="col-md-4">
          <div class="review">

            <div class="img">
              <img src="../img/person/p13.jpg" alt="">
            </div>
            <div class="rating">
              <?php for ($j = 0; $j < 5; $j++) {
                $_g = "";
                if (!empty($row['rating']) && $j < $row["rating"]) {
                  $_g = "_g";
                }
              ?>

                <i class="typcn typcn-star-full-outline icon <?php echo $_g ?>"></i>
              <?php } ?>


            </div>
            <div class="text">
              <?php echo $row['text'] ?>
            </div>
            <div class="name"><?php echo $row['name'] ?></div>
            <div class="comp_name"><?php //echo $row['company'] 
                                    ?></div>

            <div class="time"><?php

                              $datetime = $row['created_at'];

                              $dt = new DateTime($datetime);
                              echo $dt->format('F jS Y \a\t g:ia');
                              ?></div>
          </div>
        </div>

      <?php endwhile; ?>



    </div>
  </div>
  <!-- content-wrapper ends -->
</div>
<!-- content-wrapper ends -->







<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<?php include "includes/footer.php" ?>

</body>

</html>