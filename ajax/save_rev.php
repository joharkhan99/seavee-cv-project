<?php include "functions.php" ?>
<?php
if (isset($_POST['review_form_scrt'])) {

  if (!empty($_POST['review_textarea']) && !empty($_POST['review_rating']) && !empty($_POST['profile_id'])) {

    $review_rating = $_POST['review_rating'];
    $review_textarea = $_POST['review_textarea'];
    $profile_id = $_POST['profile_id'];


    if (AddReviewInfo($review_textarea, $review_rating, $profile_id)) {
      echo "Saved";
    } else {
      echo "Unexpected error occurred!0";
    }
  } else {
    echo "Please Fill All Fields0";
  }
}
