<?php include "db.php" ?>
<?php session_start(); ?>

<?php
function confirmQuery($result)
{
  global $connection;
  if (!$result) {
    die('Failed: ' . mysqli_error($connection));
  }
}


function emailExists($email)
{
  global $connection;
  if (!empty($email)) {
    $query = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    if (mysqli_num_rows($result) > 0)   //means exist
      return true;
    else
      return false;
  }
}

function generate_key($email)
{
  global $connection;
  if (!empty($email)) {

    $user_key = md5(uniqid($email, true));
    return $user_key;
  }
}

function AddReviewInfo($review_textarea, $review_rating, $profile_id)
{
  global $connection;
  $review_rating = mysqli_real_escape_string($connection, $review_rating);
  $review_textarea = mysqli_real_escape_string($connection, $review_textarea);
  $profile_id = mysqli_real_escape_string($connection, $profile_id);

  $key = $_SESSION['userkey'];

  $query = mysqli_query($connection, "INSERT INTO reviews(userkey,employerkey,rating,text) VALUES('$profile_id','$key','$review_rating','$review_textarea')");
  if ($query) {
    return true;
  } else {
    return false;
  }
}

function loginUser($email, $password)
{
  global $connection;
  if (!empty($email) && !empty($password) && emailExists($email)) {
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    $row = mysqli_fetch_assoc($result);
    $db_email = $row['email'];
    $db_pass = $row['password'];

    $verifyPass = password_verify($password, $db_pass);

    if ($email == $db_email && $verifyPass) {
      $_SESSION['userkey'] = $row['userkey'];
      $_SESSION['role'] = $row['role'];
      UpdateStatus('online');
      return true;
    } else {
      $_SESSION['userkey'] = '';
      $_SESSION['role'] = '';
      return false;
    }
  }
}

function UpdateStatus($status)
{
  global $connection;
  $key = $_SESSION['userkey'];
  $query = mysqli_query($connection, "UPDATE users SET message_status='$status' WHERE userkey='$key'");
}

function registerUser($name, $email, $password)
{
  global $connection;
  if (!empty($name) && !empty($email) && !empty($password)) {

    $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
    $user_key = generate_key($email);

    $query = "INSERT INTO users(name,email,password,role, profile_status,user_created_at,userkey) VALUES('$name','$email','$password','candidate','incomplete',now(),'$user_key')";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
  }
}

function registerUser2($name, $email, $password)
{
  global $connection;
  if (!empty($name) && !empty($email) && !empty($password)) {

    $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

    $query = "INSERT INTO users(name,email,password,role, profile_status,created_at) VALUES('$name','$email','$password','employer','incomplete',now())";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
  }
}
?>