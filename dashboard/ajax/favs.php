<?php include "functions.php"; ?>

<?php
if (isset($_POST['fav_id'])) {
  if (!empty($_POST['fav_id'])) {

    if (RemoveFromFav($_POST['fav_id'])) {
      echo "Removed From Favorites";
    } else {
      echo "Error Occurred!";
    }
  } else {
    echo "Error Occurred!";
  }
}
