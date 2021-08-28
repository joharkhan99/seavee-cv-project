<?php include "db.php" ?>
<?php
if (isset($_POST['search_query']) && !empty($_POST['search_query'])) {

  $search = mysqli_real_escape_string($connection, $_POST['search_query']);

  $query = mysqli_query($connection, "SELECT * FROM profession_info INNER JOIN personal_info ON profession_info.userkey=personal_info.userkey INNER JOIN users ON profession_info.userkey=users.userkey INNER JOIN about ON profession_info.userkey=about.userkey WHERE category LIKE '%$search%'");

  // print_r(mysqli_fetch_assoc($query));

  $output = "";
  // $stars="";

  while ($row = mysqli_fetch_assoc($query)) {
    $image = explode("../", $row['image']);

    $userkey = $row['userkey'];
    $query3 = mysqli_query($connection, "SELECT * FROM reviews WHERE userkey='$userkey'");
    $stars = 0;
    while ($reviews = mysqli_fetch_assoc($query3)) {
      $stars += $reviews['rating'];
    }
    $stars = $stars / mysqli_num_rows($query3);



    $output .= '                    
      <div class="row cv_card">
        <div class="head">
            <div class="cv_img">
                <img src="' . $image[2] . '" alt="">
            </div>
        </div>
        <div class="details">
            <div class="add_to_fav">

                <?php if ($_SESSION["role"] == "employer") : ?>
                    <form method="POST" id="fav_form" name="fav_form">
                        <input type="hidden" name="fav_id" id="fav_id" value="' . $row['userkey'] . '">
                        <button title="add to Favorites"><i class="far fa-heart"></i></button>
                    </form>
                <?php endif; ?>


            </div>
            <div class="bio">
                <h2 class="name">' . ucwords($row['name']) . '</h2>
                <div class="designation">' . ucwords(str_replace("_", " ", $row['category'])) . '</div>
            </div>
            <p class="description">
            ' . $row['short_desc'] . '
            </p>

            <div class="footer">
                <span class="rating" title="Rating"><i class="fas fa-star me-sm-0"></i> ' . (int)$stars . '.0</span>
                <span class="s_range" title="Salary Range"><i class="fas fa-hand-holding-usd me-sm-0"></i> <b>' . $row['salary_range'] . '</b></span>
                <span class="exp" title="Experience"><i class="fas fa-briefcase me-sm-1"></i> <b>' . $row['experience'] . ' Year(s)</b></span>
                <a href="profile.php?profile_id=' . $row['userkey'] . '" class="view_profile" id="view_profile">View Profile</a>
            </div>

        </div>
    </div>';
  }

  if (empty($output)) {
    echo "<h4 class='text-center' style='font-size: 15px;
    margin-top: 80px;
    color: #777777;'>No candidate found!<h4>";
  }

  echo $output;


  if (!$query) {
    echo mysqli_error($connection);
  }
}
?>