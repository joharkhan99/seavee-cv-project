<?php include "includes/header.php" ?>
<?php include "ajax/db.php" ?>
<?php
if (!isset($_SESSION['userkey']) || $_SESSION['role'] != "employer") {
  header("Location: ../login.php");
}
?>


<?php include "includes/nav.php" ?>


<!-- partial -->
<div class="main-panel" id="main_info_forms">
  <div class="content-wrapper">
    <!-- =================================================================================================== -->

    <div class="row text-center">

      <style>
        .col-md-4 .profile-card {
          position: relative;
        }

        .col-md-4 p {
          color: #6b6b6b;
        }

        .col-md-4 p i {
          margin-right: 5px;
        }

        .col-md-4 .profile-card {
          box-shadow: 0px 0px 15px #ccccccb8;
          background: white;
          border-radius: 5px;
          padding: 25px 10px;
          margin-bottom: 15px;
        }

        .add_to_fav {
          position: absolute;
          right: 3px;
          top: 3px;
        }

        .add_to_fav button i {
          color: purple;
        }

        .add_to_fav button {
          border: none;
          background: none;
          outline: none;
          font-size: 20px;
          border-radius: 50%;
          color: var(--main-color);
          transition: .3s;
        }
      </style>

      <?php
      $emp_key = $_SESSION['userkey'];
      $query = mysqli_query($connection, "SELECT * FROM favorites INNER JOIN users ON favorites.candidatekey=users.userkey INNER JOIN personal_info ON personal_info.userkey=favorites.candidatekey INNER JOIn profession_info ON profession_info.userkey=favorites.candidatekey INNER JOIN social_info ON social_info.userkey=favorites.candidatekey WHERE favorites.employerkey='$emp_key'");
      ?>

      <?php while ($row = mysqli_fetch_assoc($query)) : ?>
        <div class="col-md-4">
          <div class="profile-card">
            <?php $image_arr = explode('../', $row['image']); ?>

            <img src="<?php echo "../" . $image_arr[2]; ?>" alt="" style="width: 100px;height: 100px;border-radius: 50%;object-fit: cover;" class="img-circle mx-auto mb-3">
            <h3 class="mb-2">Kiran Acharya</h3>
            <div class="text-left mb-4">
              <p class="mb-2"><i class="fas fa-briefcase"></i> <?php echo $row['category'] ?></p>
              <p class="mb-2"><i class="fa fa-map-marker-alt"></i> <?php echo $row['city'] . ", " . $row['country'] ?></p>
              <p class="mb-1"><i class="fa fa-envelope"></i> <?php echo $row['email'] ?></p>
            </div>
            <div class="social-links justify-content-center">
              <?php if (!empty($row['linkedin'])) : ?>
                <a href="<?php echo $row['linkedin'] ?>" target="_blank" style="margin-right: 10px;font-size: 18px;"><i class="fab fa-linkedin-in"></i></a>
              <?php endif; ?>
              <?php if (!empty($row['twitter'])) : ?>
                <a href="<?php echo $row['twitter'] ?>" target="_blank" style="margin-right: 10px;font-size: 18px;"><i class="fab fa-twitter"></i></a>
              <?php endif; ?>
              <?php if (!empty($row['facebook'])) : ?>
                <a href="<?php echo $row['facebook'] ?>" target="_blank" style="margin-right: 10px;font-size: 18px;"><i class="fab fa-facebook-f"></i></a>
              <?php endif; ?>
              <?php if (!empty($row['insta'])) : ?>
                <a href="<?php echo $row['insta'] ?>" target="_blank" style="margin-right: 10px;font-size: 18px;"><i class="fab fa-instagram"></i></a>
              <?php endif; ?>
              <?php if (!empty($row['git'])) : ?>
                <a href="<?php echo $row['git'] ?>" target="_blank" style="margin-right: 10px;font-size: 18px;"><i class="fab fa-github"></i></a>
              <?php endif; ?>
              <?php if (!empty($row['dribble'])) : ?>
                <a href="<?php echo $row['dribble'] ?>" target="_blank" style="margin-right: 10px;font-size: 18px;"><i class="fab fa-dribbble"></i></a>
              <?php endif; ?>
              <?php if (!empty($row['behance'])) : ?>
                <a href="<?php echo $row['behance'] ?>" target="_blank" style="margin-right: 10px;font-size: 18px;"><i class="fab fa-behance"></i></a>
              <?php endif; ?>
            </div>
            <a href="javascript:void(0)" class="btn btn-success w-100 mt-4">Message</a>
            <a href="javascript:void(0)" class="btn btn-primary w-100 mt-2">View Profile</a>

            <div class="add_to_fav">
              <form method="POST" class="remove_form">
                <input type="hidden" name="fav_id" value="<?php echo $row['fav_id'] ?>">
                <button title="remove from favorites" type="submit"><i class="fas fa-heart"></i></button>
              </form>
            </div>

          </div>
        </div>

      <?php endwhile; ?>

      <!-- =================================================================================================== -->

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

<script>
  $(".remove_form").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "ajax/favs.php",
      type: 'POST',
      data: formData,
      beforeSend: function() {
        showAlert('Please wait...')
      },
      success: function(data) {
        showAlert(data);
        setTimeout(() => {
          $("#main_info_forms").load(" #main_info_forms > *");
        }, 1000);
      },
      cache: false,
      contentType: false,
      processData: false
    });
  });
</script>

</body>

</html>